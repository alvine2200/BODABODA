<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Forum;
use App\Models\Support;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all()->count();
        $queries= Support::all()->count();
        $user_queries=Support::where('user_id',Auth::user()->id)->count();
        $transactions=Transaction::all()->count();
        $application=Application::all()->count();
        return view('dashboards.admin',compact('users','queries','user_queries','application','transactions'));
    }
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

    public function users()
    {
        $users=User::all();
        return view('admin.users_index')->with('users',$users);
    }

    public function delete_users($id)
    {
        $users=User::findOrFail($id);
        $users->delete();
        return back()->with('success','User deleted successfully');
    }

    
}
