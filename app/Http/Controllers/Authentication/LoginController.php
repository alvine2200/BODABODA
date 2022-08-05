<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use App\Models\Support;
use App\Models\Application;
use App\Models\Transaction;
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

            $queries= Support::all()->count();
            $user_queries=Support::where('user_id',Auth::user()->id)->count();
            $users = User::all()->count();            
            $transactions=Transaction::all()->count();
            $user_transactions=Transaction::where('phone_number',$user->phone)->count();
            $application=Application::all()->count();
            $user_application=Application::where('user_id',Auth::user()->id)->count();
            return view('dashboards.admin',compact('users','queries','user_queries','application','user_application','transactions','user_transactions'));
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

        return redirect('');
    }

}
