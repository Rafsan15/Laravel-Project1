<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
   // protected $redirectTo = 'chef.index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->action('Chef\ChefController@index');
        }
    }
    public function UserLogin()
    {

        if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
            if(auth()->user()->isChef()){
                return redirect()->action('Chef\ChefController@index');
            }
            if(auth()->user()->isUser()){
               // dd(Auth::id());
                return redirect()->action('User\UserController@UserProfile',Auth::id());
            }


        }
        else{
            return "User Name & Password are wrong";
        }

    }
}
