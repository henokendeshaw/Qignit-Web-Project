<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   

    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|Unique:users',
            'password' => 'required|min:4'
        ]);
        $user = new User([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('welcome');
    }
    public function getSignin()
    {
        return view('user.signin');
    }

    public function getProfile()
    {
        return view('user.profile');
    }
    
    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

       if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
       {
           return redirect()->route('profile');
       }
       return redirect()->back();


    }
    


}
