<?php

namespace App\Api\Services\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Api\Transformers\Admin\Unit\IndexTransformer;

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
        $keyword = $request->input('keyword');
        $status  = $request->input('status');

        $page    = $request->input('page', 1);
        $limit   = $request->input('limit', 10);
        $offset  = ($page - 1) * $limit;

        $condition = $this->model
            ->when(is_numeric($status), fn($query) => $query->whereStatus($status))
            ->when($keyword,fn($query)=>$query->where('name','LIKE',"%$keyword%"));

        $data['count']     = $condition->count();
        $data['page']      = $page;
        $data['limit']     = $limit;
        $data['countPage'] = ceil($data['count'] / $limit);

        $data['list'] = IndexTransformer::transform(
            $condition->offset($offset)->limit($limit)->get()
        );

        return $data;
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function store(Request $request)
    {
        return $this->model->create($request->all())->only(['id','name','status']);
    }

    /**
     * @param  Request  $request
     *
     * @return Unit|Unit[]|Collection|Model|null
     */
    public function update(Request $request)
    {
        $unit = $this->model->find($request->id);
        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->save();

        return $unit->only(['id','name','status']);
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
