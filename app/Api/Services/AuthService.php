<?php

namespace App\Api\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Api\Transformers\Auth\LoginTransformer;

class AuthService
{
    public User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $user = $this->model->with(['modes:id,name'])->whereName($request->name)->first();

        // unit不匹配
        if ($user->unit_id != $request->unit_id) {
            throw ValidationException::withMessages(["unit_id" => ["Unit does not match the user"]]);
        }

        // mode不匹配
        if ( ! $user->modes || ! $user->modes->contains($request->mode)) {
            throw ValidationException::withMessages(["mode" => ["This user does not have this mode permission"]]);
        }

        // 密码不正确
        if ( ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['name' => ['The provided credentials are incorrect']]);
        }

        if ($user->status != User::STATUS_ACTIVE){
            throw ValidationException::withMessages(['name' => ['Account to be disabled, please contact the administrator']]);
        }

        //return new LoginTransformer::transform($user);
        return (new LoginTransformer($user))->transform();
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function loginWithCard(Request $request)
    {
        $request->user->tokens()->delete();

        $abilities = $request->user->modes->pluck('name')->toArray();

        return $request->user->createToken($request->user->name,$abilities)->plainTextToken;
    }
}
