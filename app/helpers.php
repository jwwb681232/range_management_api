<?php

use Illuminate\Http\JsonResponse;

if ( ! function_exists('apiReturn')) {
    /**
     * @param  array  $data
     * @param  int  $code
     * @param  string  $status
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function apiReturn(array $data = [], string $message = "success", int $code = 200, string $status = 'success'): JsonResponse
    {
        return response()->json(compact('status', 'code', 'message', 'data'),$code);
    }
}
