<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/index');
       }
        return to_route('auth.login')->withErrors([
            'email'=>"Email ou le mot de passe invalides"
        
        ])->onlyInput('email');
    }

    
}
