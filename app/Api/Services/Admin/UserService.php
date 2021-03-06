<?php

namespace App\Api\Services\Admin;

use App\Api\Transformers\Auth\LoginTransformer;
use App\Models\Card;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Api\Transformers\Admin\User\IndexTransformer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
     * @return Builder|Collection|Model|null
     */
    public function show(Request $request)
    {
        $user = $this->model->newQuery()->with(['unit:id,name','card:id,number','modes:id,name'])
            ->findOrFail($request->id,['id','name','nric','unit_id','card_id','status','created_at']);
        $user->only_arr = (new LoginTransformer($user))->onlyARR();

        return $user;
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $modeId  = $request->input('mode_id');
        $status  = $request->input('status');

        $page    = $request->input('page', 1);
        $limit   = $request->input('limit', 10);
        $offset  = ($page - 1) * $limit;

        $condition = $this->model
            ->when(is_numeric($modeId), fn($query) => $query->whereHas('modes', fn($subQuery) => $subQuery->whereId($modeId)))
            ->when(is_numeric($status), fn($query) => $query->whereStatus($status))
            ->when($keyword,fn($query)=>$query->where(fn($subQuery) => $subQuery->where('name','LIKE',"%$keyword%")->orWhere('nric','LIKE',"%$keyword%")));

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
     * @return array
     */
    public function store(Request $request)
    {
        $user = $this->model->create([
            'name'     => $request->name,
            'nric'     => $request->nric,
            'email'    => sprintf("%s", time().'_'.Factory::create()->email),
            'password' => bcrypt($request->password),
            'unit_id'  => $request->unit_id,
            'status'   => $request->status,
        ]);

        $user->modes()->sync(
            $this->syncModesWithPivot($request->only_arr,$request->mode_ids)
        );

        return $user->only(['id','name']);
    }

    /**
     * @param  Request  $request
     *
     * @return User|User[]|Collection|Model|null
     */
    public function update(Request $request)
    {
        $user = $this->model->find($request->id);

        $user->fill($request->only(['name','nric','unit_id','status']))->save();

        $user->modes()->sync(
            $this->syncModesWithPivot($request->only_arr,$request->mode_ids)
        );

        return $user->only(['id','name','nric']);
    }

    /**
     * @param $onlyARR
     * @param $modeIds
     *
     * @return array|array[]
     */
    private function syncModesWithPivot($onlyARR,$modeIds)
    {
        if ($onlyARR){
            return [1 => ['abilities'=>json_encode(['After Action Review'])]];
        }else{
            $modes = [];
            foreach ($modeIds as $modeId) {
                $modes[$modeId] = ['abilities' => json_encode(['*'])];
            }
            return $modes;
        }
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

    /**
     * @param  Request  $request
     *
     * @return User|User[]|array|Collection|Model|null
     * @throws ValidationException
     */
    public function changePassword(Request $request)
    {
        $user = $this->model->find($request->id);
        // ???????????????
        if ( ! Hash::check($request->old_password, $user->password)) {
            throw ValidationException::withMessages(['name' => ['The provided credentials are incorrect']]);
        }

        $user->fill(['password'=>bcrypt($request->password)])->save();

        return $user->only(['id','name','nric']);
    }
}
