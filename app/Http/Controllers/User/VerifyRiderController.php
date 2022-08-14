<?php

namespace App\Http\Controllers\User;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyRiderController extends Controller
{
    public function index()
    {
        return view('user.verify');
    }

    public function search(Request $request)
    {
        $validated=$request->validate([
            'field'=>'required|string|numeric',
        ]);

        $field=$validated['field'];
        $search=Application::with(['users'])
                             ->where('application_number','LIKE',"%{$field}%")
                             ->where('generate_card','=','Yes')->first();
        if($search)
        {
            return view('license.search',compact('search'))->with('found','Yes, Model Exists...');
        }
        else{
            return back()->with('fail','Not found');
        }

    }




}
