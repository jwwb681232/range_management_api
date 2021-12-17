<?php

use App\Models\User;
use Illuminate\Http\JsonResponse;

if ( ! function_exists('apiReturn')) {
    /**
     * @param  mixed  $data
     * @param  int  $code
     * @param  string  $status
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function apiReturn(
        mixed $data,
        string $message = "success",
        int $code = 200,
        string $status = 'success'
    ): JsonResponse {
        return response()->json(compact('status', 'code', 'message', 'data'), $code);
    }
}

if ( ! function_exists('originTempToken')) {

    /**
     * @param  User  $user
     *
     * @return string
     */
    function originTempToken(User $user): string
    {
        return base64_encode($user->id.';'.$user->name.';'.base64_encode($user->id.';'.$user->name));
    }
}

if ( ! function_exists('tempToken')) {

    /**
     * @param  User  $user
     *
     * @return string
     */
    function tempToken(User $user): string
    {
        return bcrypt(base64_encode($user->id.';'.$user->name.';'.base64_encode($user->id.';'.$user->name)));
    }
}

