<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;

class AuthBearerMiddleware
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
            return response()->json(['error' => 'Authorization Bearer is required'], 400);
        }

        $arr_auth = explode('Bearer ', $authorization);

        if(!isset($arr_auth[1])){
            return response()->json(['error' => 'Authorization Bearer is required'], 400);
        }
        
        $key = env('JWT_KEY');

        try {
            $decoded = JWT::decode($arr_auth[1], $key, array('HS256'));
            $request->userid = $decoded->id;
        } 

        catch (\Exception $e) {
            return response()->json(['error' => 'Authorization failed, Invalid/Expired Token'], 401);
        }

        return $next($request);
    }
}
