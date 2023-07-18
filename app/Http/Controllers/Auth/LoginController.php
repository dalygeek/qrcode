<?php

namespace App\Http\Controllers\Auth;

use auth;
use App\User;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $existingUser = User::where('email', $user->email)->first();
         if($existingUser){
        //     // log them in
             auth()->login($existingUser, true);
             return redirect('/');
         } else {
         $newuser=User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->token,
           
        ]);
        auth()->login($newuser, true);
        return redirect('/');
        }
        
        
    }

    
    public function facebookredirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebbokhandleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $existingUser = User::where('email', $user->email)->first();
         if($existingUser){
        //     // log them in
             auth()->login($existingUser, true);
             return redirect('/');
         } else {
         $newuser=User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->token,
           
        ]);
        auth()->login($newuser, true);
        return redirect('/');
        }


}
}
