<?php

namespace App\Http\Services;

use App\Http\Transformers\Administrator\ProfileTransformer;
use App\Models\Administrator;

class AdministratorService
{
    public Administrator $model;

    public function __construct()
    {
        $this->model = new Administrator();
    }

    public function profile($id)
    {
        return (new ProfileTransformer())->transform(
            $this->model->find($id)
        );
    }

}
