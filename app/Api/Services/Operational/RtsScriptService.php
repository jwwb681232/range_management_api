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
        return $this->model->with('doors:id,door_id,description')->get();
    }

    public function sync(Request $request)
    {
        $script = $this->model->find($request->index);
        if (!$script){
            return $this->model->newQuery()->create([
                'range_name'    => $request->RangeName,//列表的Ranges->RangeName
                'index'         => $request->index,
                'name'          => $request->Name,//列表的Ranges->Scenarios->Name
                'scenario_id'   => $request->ScenarioID,
                'scenario_name' => $request->ScenarioName,
                'steps'         => $request->Steps,
                'participants'  => $request->Participants,
            ]);
        }

        $this->model->whereIndex($request->index)->update([
            'range_name'    => $request->RangeName,//列表的Ranges->RangeName
            'name'          => $request->Name,//列表的Ranges->Scenarios->Name
            'scenario_id'   => $request->ScenarioID,
            'scenario_name' => $request->ScenarioName,
            'steps'         => $request->Steps,
            'participants'  => $request->Participants,
        ]);

        return $script;
    }
}
