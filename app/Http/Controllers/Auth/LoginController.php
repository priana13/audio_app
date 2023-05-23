<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


        /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function authenticate(Request $request)
    {            

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {

            // Revoke the token that was used to authenticate the current request...
            // $request->user()->currentAccessToken()->delete();
            $request->user()->tokens()->delete();
          
            $token = $request->user()->createToken($request->user()->name);          
            
            return response()->json([
                'token' => $token->plainTextToken,
                'user' => auth()->user()

            ], 200);

        }
 
        return response()->json(['error' => 'Invalid credentials'], 401);
    }


    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
    
        // Lakukan sesuatu dengan data pengguna yang diterima
    
        return response()->json([
            'user' => $user,
        ]);
    }

}
