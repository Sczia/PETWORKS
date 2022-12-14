<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                if (Auth::guard('admin')->check() &&  Auth::guard('admin')->user()->status == "Active") {
                    return redirect()->route('admin.index');
                }
                return route('admin.user.login.form');
            }

        }
    }
}
