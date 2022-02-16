<?php

namespace App\Api\Services\Operational;

use App\Models\Camera;
use App\Models\RtsScript;
use App\Models\RtsScriptCamera;
use Illuminate\Http\Request;

class CameraService
{
    public Camera $model;

    public function __construct()
    {
        $this->model = new Camera();
    }

    /**
     * 每次同步都清空数据库，与rts_script关联时使用channel_code
     *
     * @param  Request  $request
     *
     * @return mixed
     */
    public function sync(Request $request)
    {
        $this->model->where('id','>',0)->delete();

        $now     = now();
        $cameras = [];
        foreach ($request->all() as $device) {
            foreach ($device['units'] as $unit) {
                if ($unit['unitType'] != 1){
                    continue;
                }
                foreach ($unit['channels'] as $channel) {
                    $cameras[] = [
                        'code'           => $device['code'],
                        'name'           => $device['name'],
                        'status'         => $device['status'],
                        'unit_type'      => $unit['unitType'],
                        'unit_seq'       => $unit['unitSeq'],
                        'channel_code'   => $channel['channelCode'],
                        'channel_name'   => $channel['channelName'],
                        'channel_seq'    => $channel['channelSeq'],
                        'channel_status' => $channel['status'],
                        'created_at'     => $now,
                        'updated_at'     => $now,
                    ];
                }
            }
        }

        $this->linkRtsScript($cameras);

        return $this->model->insert($cameras);
    }

    private function linkRtsScript($cameras)
    {
        RtsScriptCamera::query()->where('rts_script_id','>',0)->delete();

        $rtsScripts = RtsScript::all();

        $links = [];

        foreach ($rtsScripts as $rtsScript) {
            foreach ($cameras as $camera){
                if (
                    ($rtsScript->machine_number == 'CQB' && $camera['code'] == '1000014')
                    || ($rtsScript->machine_number == '25M Range' && $camera['code'] == '1000013')
                ){
                    $links[] = [
                        'rts_script_id'=>$rtsScript->id,
                        'channel_code'=>$camera['channel_code'],
                    ];
                }
            }
        }

        RtsScriptCamera::query()->insert($links);

    }
}
