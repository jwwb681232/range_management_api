<?php

namespace App\Api\Services;

use App\Models\Mode;
use Illuminate\Database\Eloquent\Collection;

class ModeService
{
    public Mode $model;

    public function __construct()
    {
        $this->model = new Mode();
    }

    /**
     * @return Mode[]|Collection
     */
    public function index()
    {
        return $this->model->get(['id','name']);
    }

}
