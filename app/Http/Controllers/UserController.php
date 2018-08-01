<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base\User;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function auth(Request $request)
    {
        $user = User::where('username', $request->username)
                        ->first();

        if($user){
            if (Hash::check($request->password, $user->password)) {
                $key = env('JWT_KEY');
                $exp = env('JWT_EXP');

                $token = array(
                    'exp' => time() + $exp,
                    'nbf' => time(),
                    'id' => $user->id
                );

                $jwt = JWT::encode($token, $key);

                return response()->json(['access_token' => $jwt, 'expired_in' => $exp]);
            } else {
                return response()->json(['error' => 'Invalid Username/Password'], 401);
            } 
        } else {
            return response()->json(['error' => 'Invalid Username/Password'], 401);
        }
        
    }
    //
}
