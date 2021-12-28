<?php

namespace App\Http\Middleware;

use Closure;

class EnableCors
{
    protected $allowOrigin = [
        'production' => [
            '*',
        ],
        'develop'    => [
            '*',
        ],
        'local'      => [
            '*',
        ],
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $origin = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
        if (in_array('*', $this->allowOrigin[config('app.env')])
            || in_array($origin, $this->allowOrigin[config('app.env')])
        ) {
            $response->header('Access-Control-Allow-Origin', $origin);
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN, x-requested-with');
            $response->header('Access-Control-Expose-Headers', 'Authorization');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS, DELETE');
            $response->header('Access-Control-Allow-Credentials', 'true');
        }
        return $response;
    }
}
