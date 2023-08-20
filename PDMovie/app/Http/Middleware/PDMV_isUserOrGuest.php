<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class PDMV_isUserOrGuest
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
        
        if(!Session()->has('loginId') || (Session::get('inforUser')['acctype_id']=="3") ){
            return $next($request);
        } else if((Session::get('inforUser')['acctype_id']=="1" ||Session::get('inforUser')['acctype_id']=="2")){
            return redirect("/admin/dashboard");
        }
    }
}
