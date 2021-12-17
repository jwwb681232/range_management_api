<?php

namespace App\Api\Services;

use App\Api\Transformers\Auth\LoginTransformer;
use App\CacheKeys;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        $user = $this->model->with(['modes:id'])->whereName($request->name)->first();

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

        return LoginTransformer::transform($user);
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function loginWithCard(Request $request)
    {
        $request->user->tokens()->delete();

        return $request->user->createToken($request->user->name)->plainTextToken;
    }
}
