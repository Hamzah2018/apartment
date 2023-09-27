<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VerfiyIsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role !== 'admin'){
            // return redirect(route('/home'));
            // Auth::logout();
            return redirect()->route('admin.dashboardboker');
        }
        return $next($request);
    }
}
