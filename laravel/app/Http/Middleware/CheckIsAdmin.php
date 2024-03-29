<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user     = Auth::user();
        $is_admin = $user->isAdmin();

        if(!$is_admin){
            session()->flash('warning', 'У вас нет прав администратора!');
            return redirect()->route('index');
        }

        return $next($request);
    }
}
