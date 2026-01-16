<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/admin/articles');
        }
        return back()->with('error','Login gagal');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
