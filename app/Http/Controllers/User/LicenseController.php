<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LicenseController extends Controller
{
    public function index(Request $request, $id)
    {
        $user=User::findOrFail($id);
        return view('license.index',compact('user'));
    }
}
