<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            Auth::login($user);

            return view('dashboards.admin');
        }
        else
        {
            return back()->with('errors','Login failed, try again');
        }
    }

    public function logout_user()
    {
        $user=Auth::user();
        Auth::logout($user);

        return redirect('/login');
    }

}
