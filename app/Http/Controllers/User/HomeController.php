<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view ('user.index');
    }

    public function login_form()
    {
        return view('user.login');
    }

    public function register_form()
    {
        return view('user.register');
    }

}
