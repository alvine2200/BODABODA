<?php

namespace App\Http\Controllers\User;

use App\Models\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $forums=Forum::where('status', 'approved')->latest()->paginate(9);
        return view ('user.index', compact('forums'));
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
