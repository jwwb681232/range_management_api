<?php

namespace App\Api\Services;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

class UnitService
{
    public Unit $model;

    public function __construct()
    {
        $this->model = new Unit();
    }

    /**
     * @return Unit[]|Collection
     */
    public function index()
    {
        return $this->model->get(['id','name']);
    }

}
