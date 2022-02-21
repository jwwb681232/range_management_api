<?php

namespace App\Api\Services\Operational;

use App\Models\Light;
use Illuminate\Http\Request;

class LightService
{
    public Light $model;

    public function __construct()
    {
        $this->model = new Light();
    }

    public function index()
    {
        return $this->model->all(['id','number','name']);
    }

    public function sync(Request $request)
    {
        $this->model->where('id','>',0)->delete();

        $now    = now();
        $lights = [];
        foreach ($request->all() as $deck) {
            foreach ($deck['areas'] as $area) {
                $lights[] = [
                    'id'         => $area['number'],
                    'deck'       => $deck['name'],
                    'number'     => $area['number'],
                    'name'       => $area['name'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        $this->model->insert($lights);

        return $lights;
    }

}
