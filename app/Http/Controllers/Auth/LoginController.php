<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return inertia('Auth/Login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->all())){
            $request->session()->regenerate();
            return redirect('/articles');
        } else {
            return back()->withErrors([
                'email' => 'The credentials are invalid'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/articles');
    }
}
