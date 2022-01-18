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
    public function index($type)
    {
        return $this->model
            ->when($type, fn($query) => $query->whereType($type))
            ->with(['rtsScript', 'audios', 'lights'])->get();
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
            $scenario = $this->model->create([
                'name'              => $request->name,
                'description'       => $request->description,
                'rts_script_detail' => $request->rts_script_detail,
                'audio_detail'      => $request->audio_detail,
                'light_detail'      => $request->light_detail,
                'type'              => $request->type,
                'rts_script_id'     => $request->rts_script_id,
            ]);

            $scenario->audios()->sync(
                collect($request->audio)
                ->keyBy('id')
                ->transform(fn($item) => collect($item)->except('id'))->toArray()
            );

            $scenario->lights()->sync(
                collect($request->light)
                ->keyBy('id')
                ->transform(fn($item) => collect($item)->except('id'))->toArray()
            );

            return $scenario;
        });
    }

    /**
     * @param  Request  $request
     *
     * @return Scenario
     * @throws Throwable
     */
    public function update(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $scenario = $this->model->newQuery()->findOrFail($request->id);

            $scenario->name              = $request->name;
            $scenario->description       = $request->description;
            $scenario->rts_script_detail = $request->rts_script_detail;
            $scenario->audio_detail      = $request->audio_detail;
            $scenario->light_detail      = $request->light_detail;
            $scenario->type              = $request->type;
            $scenario->rts_script_id     = $request->rts_script_id;
            $scenario->save();

            $scenario->audios()->sync(
                collect($request->audio)
                ->keyBy('id')
                ->transform(fn($item) => collect($item)->except('id'))->toArray()
            );

            $scenario->lights()->sync(
                collect($request->light)
                ->keyBy('id')
                ->transform(fn($item) => collect($item)->except('id'))->toArray()
            );

            return $scenario;
        });
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
