<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request, User $user)
    {
        $validated=$request->validated();
        $validated['slug']=Str::slug($validated['username']);

        $validated['password']=bcrypt($validated['password']);

        $user::firstOrCreate($validated);

        return redirect('/login')->with('success','Registration is a success, login Now');
    }
}
