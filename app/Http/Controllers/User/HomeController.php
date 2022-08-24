<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function show_post($slug)
    {
        $post=Forum::with(['users'])->where('slug',$slug)->first();
        return view('user.post',compact('post'));
    }

    public function search(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'fullname' =>'required|string',
            'id_number'=>'required|integer',
            'location'=>'required|string',
            'county'=>'required|string',
            'subcounty'=>'required|string',
            'location'=>'required|string',
        ]);
        if($validator->fails())
        {
            return back()->with('errors',$validator->errors()->first());
        }
        $users=User::where('fullname','like','%'.$request->field.'%')
                    ->orWhere('id_number','like','%'.$request->field.'%')
                    ->orWhere('location','like','%'.$request->field.'%')
                    ->orWhere('county','like','%'.$request->field.'%')
                    ->orWhere('subcounty','like','%'.$request->field.'%')
                    ->orWhere('location','like','%'.$request->field.'%')->get();
        
        return view('admin.users_index',compact('users'));
    }
}
