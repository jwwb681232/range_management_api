<?php

namespace App\Api\Services\Operational;

use App\Models\RtsScript;

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
        return $this->model->get();
    }

}
