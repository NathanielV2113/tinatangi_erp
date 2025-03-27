<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        /*
        * 1 = Admin
        * 2 = HR
        * 3 = Finance
        * 4 = SupplyChainMngt
        * 5 = Bar
        * 6 = Kitchen
        * 7 = Server
        */

        $authUserRole = Auth::user()->role;

        switch($role){
            case 'admin':
                if($authUserRole == 1){
                    return $next($request);
                }
                break;
            case 'hr':
                if($authUserRole == 2){
                    return $next($request);
                }
            case 'cpa':
                if($authUserRole == 3){
                    return $next($request);
                }
            case 'inv':
                if($authUserRole == 4){
                    return $next($request);
                }
            case 'bar':
                if($authUserRole == 5){
                    return $next($request);
                }
            case 'kitchen':
                if($authUserRole == 6){
                    return $next($request);
                }
            case 'server':
                if($authUserRole == 7){
                    return $next($request);
                }
        }

        switch($authUserRole) {
            case 1:
                return redirect()->route('admin');
            case 2:
                return redirect()->route('hr');
        }

        return redirect()->route('login');
    }
}
