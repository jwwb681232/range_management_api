<?php

namespace App\Api\Services\Operational;

use App\Models\Scenario;
use App\Models\Training;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TrainingService
{
    public Training $model;
    public $type = [
        'manual'   => [3],
        'scenario' => [1, 2]
    ];

    public function __construct()
    {
        $this->model = new Training();
    }

    public function detail($id)
    {
        return $this->model->newQuery()
            ->with('rtsScript', fn($query) => $query->with('cameras')->select(['id', 'machine_number', 'index', 'name']))
            ->with('scenario')
            ->find($id);
    }

    public function latestTime()
    {
        $manual   = $this->model->whereIn('type', $this->type['manual'])->orderByDesc('start_at')->first();
        $scenario = $this->model->whereIn('type', $this->type['scenario'])->orderByDesc('start_at')->first();

        return [
            'manual'   => $manual ? Carbon::parse($manual->start_at)->format('H:i d M Y') : '',
            'scenario' => $scenario ? Carbon::parse($scenario->start_at)->format('H:i d M Y') : '',
        ];
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function mode(Request $request)
    {
        $date = $request->input('date');

        return $this->model
            ->when($date, function ($query) use ($date) {
                $between = [Carbon::parse($date), Carbon::parse($date)->addDay()];

                return $query->whereBetween('start_at', $between);
            })
            ->whereIn('type', $this->type[$request->mode])
            ->selectRaw("DATE_FORMAT(start_at,'%Y-%m-%d') days")
            ->groupBy('days')
            ->pluck('days')
            ->map(fn($item) => ['semantic'=>Carbon::parse($item)->format("d M Y"),'date'=>Carbon::parse($item)->format("Y-m-d")]);
    }

    /**
     * @param  Request  $request
     *
     * @return Builder[]|Collection
     */
    public function date(Request $request)
    {
        $dateBetween = [Carbon::parse($request->date), Carbon::parse($request->date)->addDay()];

        return $this->model
            ->whereBetween('start_at', $dateBetween)
            ->whereIn('type', $this->type[$request->mode])
            ->with('rtsScript', fn($query) => $query->with('cameras')->select(['id', 'machine_number', 'index', 'name']))
            ->get();
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
            'firing_detail' => $request->firing_detail,
            'total_hits'    => $request->total_hits,
            'trainees'      => $request->trainees,
        ];

        return $this->model->create($data);
    }
}