<?php

namespace App\Http\Middleware;

use App\Tools\Tools;
use Closure;

use Auth;

class MustOnAdmin
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
        $routeName = $request->route()->getName();

        if (Auth::check()) {
            if (Auth::user()->can($routeName) || 1) {
                return $next($request);
            }
            return view('admin.layouts.stop');
        }
        return Tools::notifyTo('请先登录 ~','error','/admin');
    }
}
