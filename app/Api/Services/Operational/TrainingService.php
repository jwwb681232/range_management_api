<?php

namespace App\Api\Services\Operational;

use App\Models\Scenario;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingService
{
    public Training $model;

    public function __construct()
    {
        $this->model = new Training();
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $scenario = Scenario::find($request->scenario_id);

        $data = [
            'type'          => $request->type,
            'scenario_id'   => $request->scenario_id,
            'rts_script_id' => $request->rts_script_id ?: $scenario->rts_script_id,
            'start_at'      => $request->start_at,
            'end_at'        => $request->end_at,
        ];

        return $this->model->create($data);
    }
}
