<?php

namespace App\Api\Services\Operational;

use App\Models\Scenario;

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
        return $this->model->get();
    }

}
