<?php

namespace App\Http\Middleware;

use App\Enum\RoleEnum;
use Closure;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveAccount
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->is_active === 0) {
          Auth::logout();
          return redirect()->route('login')->with('status', 'تم إلغاء حسابك');
        }
        return $next($request);
    }
}
