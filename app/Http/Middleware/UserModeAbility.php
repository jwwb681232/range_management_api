<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class UserModeAbility
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $pathMode = Str::ucfirst($request->segment(2));
        if (!$request->user()->modes->pluck('name')->contains($pathMode)){
            throw new AuthenticationException();
        }
        return $next($request);
    }
}
