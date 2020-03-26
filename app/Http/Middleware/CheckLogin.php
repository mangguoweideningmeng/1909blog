<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $adminuser=$request->session()->get('adminuser');
        //dump($adminuser);
        if (!$adminuser) {
            //判断cookie内是否有登录信息有把cookie存入session
            $adminuser=$request->cookie('adminuser');
            //dd($adminuser);
            if ($adminuser) {
                session(['adminuser'=>$adminuser]);
            }else{

            }
            return redirect('/login');
        }
        return $next($request);
    }
}
