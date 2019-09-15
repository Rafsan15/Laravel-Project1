<?php

namespace App\Http\Controllers\App;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogInController extends Controller
{
    public function UserLoginForm()
    {
        return view("App/LogIn");
    }
    public function UserLoginData()
    {

//        if(Auth::attempt(['email'=>request('Email'),'password'=>request('Password')])){
//            return redirect()->action('Chef\ChefController@index');
//
//        }
//        else{
//            return "User Name & Password are wrong";
//        }

        $user = User::where('email', request('Email'))->first();
        //dd( request('Email'));
        if($user==null){
            return "User Name & Password are wrong";
        }
        if($user->password==\request('Password')){
            return redirect()->action('Chef\ChefController@index');
        }

    }
}
