<?php

namespace App\Api\Services\Admin;

use App\Api\Transformers\Admin\Unit\IndexTransformer;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitService
{
    public Unit $model;

    public function __construct()
    {
        $this->model = new Unit();
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        $page   = $request->input('page', 1);
        $limit  = $request->input('limit', 10);
        $status = $request->input('status');
        $offset = ($page - 1) * $limit;

        $condition = $this->model
            ->when(is_int($status), fn($query) => $query->whereStatus($status));

        $data['count']     = $condition->count();
        $data['page']      = $page;
        $data['limit']     = $limit;
        $data['countPage'] = ceil($data['count'] / $limit);

        $data['list'] = IndexTransformer::transform(
            $condition->offset($offset)->limit($limit)->get()
        );

        return $data;
    }

}
