<?php

namespace App\Api\Transformers\Auth;

use App\CacheKeys;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class LoginTransformer
{
    public static function transform(User $user)
    {
        Cache::put(CacheKeys::tempToken($user->id), tempToken($user), 60);

        return [
            'id'      => $user->id,
            'name'    => $user->name,
            'unit_id' => $user->unit_id,
            'modes'   => $user->modes->pluck('id'),
        ];
    }
}
