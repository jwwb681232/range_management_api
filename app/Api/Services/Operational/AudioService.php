<?php

namespace App\Api\Services\Operational;

use App\Models\Audio;
use Illuminate\Http\Request;
use App\Api\Transformers\Operational\Audio\IndexTransformer;

class AudioService
{
    public Audio $model;

    public function __construct()
    {
        $this->model = new Audio();
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        return IndexTransformer::transform(
            $this->model->get()
        );
    }

}
