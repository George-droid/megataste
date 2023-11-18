<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CustomAuthController extends Controller
{
    //
    public function login()
    {
        return view('be.auth.login');
    }

    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //dd(Auth::user()->role);
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
        
        return redirect("login")->withErrors('Login details are not valid');

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('dashboard');
    }

    public function dashboard()
    {
        return view('be.dashboard');
    }
    public function menus()
    {
        return view('be.menus');
    }
    public function dishes()
    {
        return view('be.dishes');
    }
    public function orders()
    {
        return view('be.orders');
    }
}
