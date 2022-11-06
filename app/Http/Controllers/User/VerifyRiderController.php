<?php

namespace App\Http\Controllers\User;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class VerifyRiderController extends Controller
{
    public function index()
    {
        return view('user.verify');
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'field' => 'required|string|numeric',
        ]);

        $field = $validated['field'];
        $application = Application::with(['users'])
            ->where('application_number', 'LIKE', "%{$field}%")
            ->where('generate_card', '=', 'Yes')->first();
        if (!$application) {
            return back()->with('fail', 'Rider Not Found');
        } else {
            $user = User::where('id', $application->user_id)->first();
            if ($user->status === "activated") {
                return back()->with('success', 'Rider found and is active');
            } else {
                return back()->with('deactivated', 'Rider is deactivated');
            }
        }
    }
}
