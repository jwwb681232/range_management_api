<?php

namespace App\Api\Transformers\Auth;

use App\CacheKeys;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class LoginTransformer
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function transform()
    {
        Cache::put(CacheKeys::tempToken($this->user->id), tempToken($this->user), 60);

        return [
            'id'             => $this->user->id,
            'name'           => $this->user->name,
            'unit_id'        => $this->user->unit_id,
            'modes'          => $this->user->modes->pluck('id'),
            'only_arr_token' => $this->onlyARR() ? $this->token() : '',
        ];
    }

    public function onlyARR()
    {
        $mode = $this->user->modes->where('id', 1)->first();

        if ( ! in_array("*", json_decode($mode->pivot->abilities))) {
            return true;
        } else {
            return false;
        }
    }

    private function token()
    {
        $this->user->tokens()->delete();
        $modes = $this->user->modes->pluck('name')->toArray();

        return $this->user->createToken($this->user->name, $modes)->plainTextToken;
    }
}
