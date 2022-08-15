<?php

namespace App\Http\Controllers\Authentication;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    public function index()
    {
        $user_id=User::findOrFail(Auth::user()->id);
        $application=DB::table('applications')->where('user_id',Auth::user()->id)->first();
        return view('profile.index', compact('user_id','application'));
    }

    public function post_avatar(Request $request)
    {
        $request->validate([
            'avatar'=>'required|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $avatar=User::findOrFail(Auth::user()->id);

        if($request->hasFile('avatar'))
        {
            $file=$request->file('avatar');
            $name=uniqid().$file->getClientOriginalName();
            $file->move('User/profiles',$name);
        }
        $avatar->avatar=$name;
        $avatar->update();

        return back()->with('success','Profile picture added successfully');

    }

    public function update_profile(Request $request)
    {
        $validated=$request->validate([
            'fullname'=>'string',
            'username'=> 'required|string|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'id_number'=> 'required|string',
            'county'=> 'required|string',
            'subcounty'=> 'required|string',
            'location'=> 'required|string',
            'district'=> 'required|string',
            'village'=> 'required|string',
            'email'=> 'required|email|exists:users,email',
            'phone'=> 'required|string|min:10',
            'avatar'=>'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $avatar=User::findOrFail(Auth::user()->id);

        if($request->hasFile('avatar'))
        {
            $file=$request->file('avatar');
            $name=uniqid().$file->getClientOriginalName();
            $file->move('User/profiles',$name);

        $avatar->avatar=$name;
        $avatar->fullname=$validated['fullname'];
        $avatar->username=$validated['username'];
        $avatar->id_number=$validated['id_number'];
        $avatar->email=$validated['email'];
        $avatar->county=$validated['county'];
        $avatar->subcounty=$validated['subcounty'];
        $avatar->location=$validated['location'];
        $avatar->district=$validated['district'];
        $avatar->village=$validated['village'];
        $avatar->phone=$validated['phone'];
        $avatar->update();

        return back()->with('success','Profile picture updated successfully');
      }

      if($request->hasFile('avatar') == null)
      {
        $avatar->avatar=$avatar['avatar'];
        $avatar->fullname=$validated['fullname'];
        $avatar->username=$validated['username'];
        $avatar->id_number=$validated['id_number'];
        $avatar->email=$validated['email'];
        $avatar->county=$validated['county'];
        $avatar->subcounty=$validated['subcounty'];
        $avatar->location=$validated['location'];
        $avatar->district=$validated['district'];
        $avatar->village=$validated['village'];
        $avatar->phone=$validated['phone'];
        $avatar->update();

        return back()->with('success','Profile picture updated successfully');
      }


    }

    public function change_password(Request $request)
    {
        $valid=$request->validate([
            'password_confirmation'=>'min:6|max:20|required',
            'password'=>'required|confirmed',
        ]);

        $user= Auth::user()->id;
        $user_present=User::findOrFail($user);
        $password=$valid['password'];

        if(Hash::check($password,$user_present->password))
        {
            return back()->with('warning','You cant use your Immediate password');
        }

        $user_present->password=Hash::make($password);
        $user_present->update();

        return back()->with('success','Password Changed successfully, Login with the new password');
    }


    public function forgotPassword(Request $request)
    {
        return view('password.forgot_password');
    }

    public function forgotPasswordStore(Request $request)
    {
        $validated=$request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token=Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.forget-password-email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have emailed your password reset link');
    }

    public function ResetPassword($token)
    {
        return view('mail.forget_password_link', array('token' => $token));
    }

    public function ResetPasswordStore(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $update = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete password_resets record
        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('login')->with('success', 'Your password has been successfully changed!');
    }

}
