<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsChef
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
        if(!session()->isStarted()) session()->start();
        if(session()->get('idUserRole', 1) == 1){
            return redirect()->route('resep.list')->withErrors([
                'msg' => "Daftar menjadi chef dulu",
            ]);
        }
        
        return $next($request);
    }
}
