<?php

namespace App\Api\Services\Operational;

use App\Models\RtsScript;
use App\Models\RtsScriptCamera;
use App\Models\RtsScriptDoor;
use App\Models\Scenario;
use App\Models\Training;
use Illuminate\Http\Request;

class RtsScriptService
{
    public RtsScript $model;

    public function __construct()
    {
        $this->model = new RtsScript();
    }

    /**
     *
     * @return array
     */
    public function index($machineNumber)
    {
        return $this->model->where('machine_number',$machineNumber)->with(['doors:id,door_id,description','cameras'])->get();
    }

    public function sync(Request $request)
    {
        $this->model->where('machine_number',$request->machine_number)->forceDelete();
        $data = [];
        foreach ($request->all() as $item) {
            $data[] = [
                'machine_number' => $request->machine_number,//列表的Ranges->RangeName
                'range_name'     => $item['RangeName'],//列表的Ranges->RangeName
                'index'          => $item['Index'] ?? $item['ScenarioID'],
                'name'           => $item['Name'],//列表的Ranges->Scenarios->Name
                'scenario_id'    => $item['ScenarioID'],
                'scenario_name'  => $item['ScenarioName'],
                'steps'          => json_encode($item['Steps']),
                'participants'   => json_encode($item['Participants']),
                'created_at'     => now()->format("Y-m-d H:i:s"),
                'updated_at'     => now()->format("Y-m-d H:i:s"),
            ];
        }

        $this->model->newQuery()->insert($data);

        $this->clearExpiredScripts();

        return count($data);
    }

    /**
     * @return bool
     */
    private function clearExpiredScripts()
    {
        $existedScripts = $this->model->newQuery()->pluck('index');
        if (!$existedScripts->count()){
            return true;
        }

        $scenarios = Scenario::query()->whereNotIn('rts_script_index',$existedScripts)->with('audios','lights')->get();
        foreach ($scenarios as $scenario) {
            $scenario->audios()->sync([]);
            $scenario->lights()->sync([]);
            $scenario->forceDelete();
        }

        RtsScriptCamera::whereNotIn('rts_script_index',$existedScripts)->delete();
        RtsScriptDoor::whereNotIn('rts_script_index',$existedScripts)->delete();
        Training::whereNotIn('rts_script_index',$existedScripts)->delete();

        return true;
    }
}
