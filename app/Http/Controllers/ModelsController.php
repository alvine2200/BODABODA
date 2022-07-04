<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Requests\Storerequest;
use App\Http\Requests\Applicationrequest;

class ModelsController extends Controller
{
    public function models()
    {
        return view ('user.models');
    }

    public function individual()
    {
        return view ('user.individualmodel');
    }

    public function apply()
    {
        return view('user.apply');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function contact_form(Storerequest $request, Contact $contact){

        $validated=$request->validated();

        $contact::firstOrCreate($validated);



        return back()->with('success','Form is successfully sent, Thank you');

    }

    public function application_form(Applicationrequest $request, Application $application)
    {

        $input = $request->all();
        $readyinput=collect($input)->except('headshot', 'fullbody', 'sideway','_token')->all();

        if ($request->hasfile('headshot')) {
            $file = $request->file('headshot');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $headshot = time() . '.' . $extension;
            $file->move('uploads/photos/', $headshot);
            $readyinput['headshot'] = $headshot;

        }


        if ($request->hasfile('fullbody')) {
            $file = $request->file('fullbody');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fullbody = time() . '.' . $extension;
            $file->move('uploads/photos/', $fullbody);
            $readyinput['fullbody'] = $fullbody;

        }

        if ($request->hasfile('sideway')) {
            $file = $request->file('sideway');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $sideway = time() . '.' . $extension;
            $file->move('uploads/photos/', $sideway);
            $readyinput['sideway'] = $sideway;
            
        }       

        $application::firstOrCreate($readyinput);

        return back()->with('success','Form submitted successfully');

    }





}
