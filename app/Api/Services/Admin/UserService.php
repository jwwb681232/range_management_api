<?php

namespace App\Api\Services\Admin;

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Api\Transformers\Admin\User\IndexTransformer;

class UserService
{
    public User $model;

    public function __construct()
    {
        $this->model = new User();
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
            $condition->with(['unit:id,name','modes:id,name'])->offset($offset)->limit($limit)->get()
        );

        return $data;
    }

    /**
     * @param  Request  $request
     *
     * @return Model|User
     */
    public function store(Request $request)
    {
        $user = $this->model->create([
            'name'     => $request->name,
            'email'    => sprintf("%s", time().'_'.Factory::create()->email),
            'password' => bcrypt($request->password),
            'unit_id'  => $request->unit_id,
            'status'   => $request->status,
        ]);

        $user->modes()->sync($request->mode_ids);

        return $user;
    }

    /**
     * @param  Request  $request
     *
     * @return User|User[]|Collection|Model|null
     */
    public function update(Request $request)
    {
        $user = $this->model->find($request->id);

        $user->fill($request->only(['name','unit_id','status']))->save();

        $user->modes()->sync($request->mode_ids);

        return $user;
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
