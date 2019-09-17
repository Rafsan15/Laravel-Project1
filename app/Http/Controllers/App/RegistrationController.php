<?php

namespace App\Http\Controllers\App;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function LandingPage()
    {
        return view("welcome");
    }

    public function UserRegisterForm()
{
    return view("App/Registration");
}

    public function UserRegisterData(UserRequest $request)
    {


//        dd(encrypt(request('Password')));
        User::create([
            'name'=>request('Name'),
            'email'=>request('Email'),
            'password'=>encrypt(request('Password')),
            'location'=>request('Location'),
            'phone'=>request('Phone'),
            'status'=>"Chef"
        ]);
        return redirect()->action('App\LogInController@UserLoginForm');
    }

    public function UserProfilePicture()
    {
        $image=request('Image')->store('users');
      //  dd($image);
        $user=User::find(Auth::id());
        $user->update([
            'name'=>$user->name,
            'email'=>$user->email,
            'password'=>$user->password,
            'location'=>$user->location,
            'phone'=>$user->phone,
            'status'=>$user->status,
            'profile_picture'=>$image,

        ]);
        if(auth()->user()->isUser()){
            // dd(Auth::id());
            return redirect()->action('User\UserController@UserProfile',Auth::id());
        }
        return redirect()->action('Chef\ChefController@index');


    }

    public function UserUpdateForm()
    {
        $user=User::find(Auth::id());
      // dd(Auth::password());

       // $pass=decrypt($user->password);
        return view('App.updateProfile',compact('user'));

    }

    public function UserUpdateData(UserRequest $request)
    {

        $user=User::find(Auth::id());
        $user->update([
            'name'=>request('Name'),
            'email'=>request('Email'),
            'password'=>request('Password'),
            'location'=>request('Location'),
            'phone'=>request('Phone'),
            'status'=>$user->status,
            'profile_picture'=>$user->profile_picture,

        ]);

        if(auth()->user()->isUser()){
            // dd(Auth::id());
            return redirect()->action('User\UserController@UserProfile',Auth::id());
        }
        return redirect()->action('Chef\ChefController@index');
    }

}
