<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty(auth()->user()) && auth()->user()->role == 1){
            return $next($request);
        }
        return redirect()->route('auth.login.get')
                    ->withErrors(['Bạn không có quyền truy cập trang này']);
    }
}
