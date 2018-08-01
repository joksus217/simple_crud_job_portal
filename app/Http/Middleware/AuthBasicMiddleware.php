<?php

namespace App\Http\Middleware;

use Closure;

class AuthBasicMiddleware
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
        $authorization = $request->header('authorization');

        if($authorization == null){
            return response()->json(['error' => 'Authorization Basic is required'], 400);
        }

        $arr_auth = explode('Basic ', $authorization);

        if(!isset($arr_auth[1])){
            return response()->json(['error' => 'Authorization Basic is required'], 400);
        }
        
        $upass = base64_decode($arr_auth[1]);

        $arr_upass = explode(':', $upass);

        if(!isset($arr_upass[1])){
            return response()->json(['error' => 'Authorization Basic is required'], 400);
        }

        $request->username = $arr_upass[0];
        $request->password = $arr_upass[1];

        return $next($request);
    }
}
