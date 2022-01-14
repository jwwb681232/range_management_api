<?php

namespace App\Api\Services\Operational;

use App\Models\Scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ScenarioService
{
    public Scenario $model;

    public function __construct()
    {
        $this->model = new Scenario();
    }

    /**
     *
     * @return array
     */
    public function index()
    {
        return $this->model->with(['rtsScript', 'audios'])->get();
    }

    /**
     * @param  Request  $request
     *
     * @return Scenario
     * @throws Throwable
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $scenario = $this->model->newQuery()->create([
                'name'          => $request->name,
                'description'   => $request->description,
                'type'          => $request->type,
                'rts_script_id' => $request->rts_script_id,
            ]);

            $scenario->audios()->sync([
                $request->audio['id'] => collect($request->audio)->except('id')->toArray(),
            ]);

            return $scenario;
        });
    }
}
