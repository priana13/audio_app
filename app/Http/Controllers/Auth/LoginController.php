<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    // public function googleCallback()
    // {
    //     $user = Socialite::driver('google')->stateless()->user();
    
    //     // Lakukan sesuatu dengan data pengguna yang diterima
    
    //     return response()->json([
    //         'user' => $user,
    //     ]);
    // }


    public function redirectToGoogle()
    {      

        return Socialite::driver('google')->redirect();
    }

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        $response = Http::post('https://www.googleapis.com/oauth2/v4/token', [
            'code' => $_GET['code'], // Ganti $code dengan kode otorisasi yang Anda tangkap sebelumnya
            'client_id' => config('app.google.client_id'),
            'client_secret' => config('app.google.client_secret'),
            'redirect_uri' => config('app.google.redirect'),
            'grant_type' => 'authorization_code',
        ]);
      
        
        if ($response->successful()) {
            // Token akses berhasil diterima
            $accessToken = $response->json()['access_token'];

            return $accessToken;
        
            // Lakukan sesuatu dengan token akses
        } else {
            // Terjadi kesalahan dalam permintaan ke endpoint
            $errorMessage = $response->json()['error_description'];

            return $errorMessage;
        
            // Lakukan penanganan kesalahan
        }

        

        // try {
        //     $user = Socialite::driver('google')->user();
        //     $finduser = User::where('google_id', $user->id)->first();
            
        //     if ($finduser) {
        //         Auth::login($finduser);
        //         return redirect()->intended('/');
        //     } else {
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'google_id' => $user->id,
        //             'password' => Hash::make("123456"),
        //         ]);

        //         Auth::login($newUser);

        //         return redirect()->intended('/dashboard');
        //     }

        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }


}
