<?php

namespace App\Api\Services\Operational;

use App\Models\Door;
use Illuminate\Http\Request;

class DoorService
{
    public Door $model;

    public function __construct()
    {
        $this->model = new Door();
    }

    public function index()
    {
        return $this->model->all(['id','number','name']);
    }

    public function sync(Request $request)
    {
        $doors = [];
        foreach ($request->all() as $item) {
            $doors[] = $this->model->updateOrCreate(['door_id'=>$item['Id']],['code'=>$item['Code'],'description'=>$item['Description'],'reader_no'=>$item['ReaderNo'],'controller_id'=>$item['ControllerId']]);
        }

        return $doors;
    }

}
