<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminMiddleware
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
         $role_id =  Auth::User();
         $isAdmin = false;

        if($role_id['role_id'] == 1 || $role_id['role_id'] == 2 || $role_id['role_id'] == 3 || $role_id['role_id'] == 4){
            $isAdmin = true;
        }else{
            return redirect()->to('/');
        }

        if( !$isAdmin )
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->to('/')->with('message','Sorry, You Are Unauthorized Person to access...');
            }
        }
        return $next($request);
    }
}
