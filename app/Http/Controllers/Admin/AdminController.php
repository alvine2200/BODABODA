<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Forum;
use App\Models\Support;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $users = User::all();
        $users = User::where('status', 'activated')->get();
        $queries = Support::all();
        $user_queries = Support::where('user_id', Auth::user()->id)->get();
        $transactions = Transaction::all();
        $user_transactions = Transaction::where('phone_number', Auth::user()->phone)->get();
        $application = Application::all();
        $user_application = Application::where('user_id', Auth::user()->id)->get();
        $forums = Forum::all();
        $user_forums = Forum::where('user_id', Auth::user()->id)->get();
        return view('dashboards.admin', compact('users', 'forums', 'user_forums', 'queries', 'user_queries', 'application', 'user_application', 'transactions', 'user_transactions'));
    }
    public function get_all_applications()
    {
        $applications = Application::all();
        return view('admin.applications')->with('applications', $applications);
    }

    public function approve_driving_school_status($id)
    {
        $approve = Application::findOrFail($id);
        if ($approve) {
            $approve->driving_school_status = 'pass';
            $approve->update();
            return back()->with('success', 'Driving school Successfully Approved');
        }
    }

    public function approve_generate_card($id)
    {
        $approve = Application::findOrFail($id);
        if ($approve) {
            $approve->generate_card = 'Yes';
            $approve->update();
            return back()->with('success', 'Approval for card generation is a success');
        }
    }

    public function view_application($id)
    {
        $view = Application::with(['users'])->findOrFail($id);
        return view('admin.view_application', compact('view'));
    }

    public function users()
    {
        $users = User::all();
        // $users = User::where('status', 'activated')->get();
        return view('admin.users_index')->with('users', $users);
    }

    public function view_user($id)
    {
        $user_id = User::findOrFail($id);
        $application = DB::table('applications')->where('user_id', $id)->first();
        return view('admin.view_user', compact('user_id', 'application'));
    }

    public function delete_users($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return back()->with('success', 'User deleted successfully');
    }


    public function deactivate($id)
    {
        $deactivate = User::findOrFail($id);
        $deactivate->status = 'deactivated';
        $deactivate->update();
        return back()->with('success', 'User Deactivation is a success');
    }

    public function activate($id)
    {
        $activate = User::findOrFail($id);
        $activate->status = 'Activated';
        $activate->update();
        return back()->with('success', 'User Activation is a success');
    }
}
