<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RiderController extends Controller
{
    public function application()
    {
        $application=Application::where('user_id',Auth::user()->id)->first();
         $status=Transaction::where('phone_number',$application->users->phone)->first();
         if($status)
         {
            $application->transaction_status='paid';
             $application->update();
            
         }

         if($application->driving_school_status == 'pass' && $application->transaction_status == 'paid')
         {
            $application->generate_card='Yes';
            $application->update();
         }
        return view('user.application',compact('application'));
    }

    public function store_application(Request $request, Application $application)
    {
        $validator=Validator::make($request->all(),[
            'dob'=>'required|date|before_or_equal:-18 years',
            'national_id_copy' =>'mimes:jpeg,jpg,png,gif|required|max:10240',
            'driving_school_certificate' =>'mimes:jpeg,jpg,png,gif|required|max:10240'
        ]);

        if($validator->fails()) {
            return back()->with('errors',$validator->errors());
        }

        $validation=$request->only('national_id_copy','dob','user_id','driving_school_certificate','application_number');

        $uniqueId= mt_rand(10000000,999999999);
        $validation['application_number']=$uniqueId;

        if($request->hasfile('national_id_copy'))
        {
            $file= $request->file('national_id_copy');
            $name=$file->getClientOriginalName();
            $national=uniqid().$name;
            $file->move('pictures/applications',$national);
            $validation['national_id_copy']=$national;
        }

        if($request->hasfile('driving_school_certificate'))
        {
            $file= $request->file('driving_school_certificate');
            $name=$file->getClientOriginalName();
            $certificate=uniqid().$name;
            $file->move('pictures/applications',$certificate);
            $validation['driving_school_certificate']=$certificate;
        }
        $validation['user_id']=Auth::user()->id;
        $application::create($validation);
        return back()->with('success','Applied successfully');
    }

    public function delete_applications($id)
    {
        $user=User::findOrFail(Auth::user()->id);
        $user->applications()->findOrFail($id)->delete();
        return back()->with('success','Application deleted successfully');
    }

    public function show_application($id)
    {
        //will write code later

    }


}
