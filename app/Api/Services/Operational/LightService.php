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
        $lights = [];
        foreach ($request->all() as $item) {
            $lights[] = $this->model->updateOrCreate(['number'=>$item['number']],['name'=>$item['name'],"id"=>$item['number']]);
        }

        return $lights;
    }

}
