<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function index()
    {   
        $user_id=User::findOrFail(Auth::user()->id);
        return view('profile.index', compact('user_id'));
    }

    public function post_avatar(Request $request)
    {
        $validated=$request->validated([
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


}
