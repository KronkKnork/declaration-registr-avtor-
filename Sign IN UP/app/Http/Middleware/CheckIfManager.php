<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfManager
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
        $user = $request->user();

        if (!$user->isManager()) {
            return redirect('/manager');
        }

        if (!isset($user)) {
            return redirect('/home');
        }

        return $next($request);

//        $user = $request->user();
//
//        if (!isset($user)) {
//            return redirect('/login');
//        }
//        //Request::only('is_manager')
//        if (!$user->is_manger == 1) {
//            return redirect('/manager');
//        }
//
//        return redirect('/home');
    }
}
