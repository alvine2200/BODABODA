<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function get_all_applications()
    {
        $applications=Application::all();
        return view('admin.applications')->with('applications',$applications);
    }

    public function approve_driving_school_status($id)
    {
        $approve=Application::findOrFail($id);
        if($approve)
        {
            $approve->driving_school_status='pass';
            $approve->update();
            return back()->with('success','Driving school Successfully Approved');
        }
        
    }

    public function approve_generate_card($id)
    {
        $approve=Application::findOrFail($id);
        if($approve)
        {
            $approve->generate_card='Yes';
            $approve->update();
            return back()->with('success','Approval for card generation is a success');
        }
        
    }

    public function view_application($id)
    {
        $view=Application::with(['users'])->findOrFail($id);
        return view('admin.view_application',compact('view'));
    }






}
