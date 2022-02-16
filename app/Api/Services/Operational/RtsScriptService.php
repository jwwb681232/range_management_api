<?php

namespace App\Api\Services\Operational;

use App\Models\RtsScript;
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
    public function index()
    {
        return $this->model->with(['doors:id,door_id,description','cameras'])->get();
    }

    public function sync(Request $request)
    {
        $this->model->where('machine_number',$request->machine_number)->forceDelete();
        $data = [];
        foreach ($request->all() as $item) {
            $data[] = [
                'machine_number' => $request->machine_number,//列表的Ranges->RangeName
                'range_name'     => $item['RangeName'],//列表的Ranges->RangeName
                'index'          => $item['ScenarioID'],
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

        return count($data);
    }
}
