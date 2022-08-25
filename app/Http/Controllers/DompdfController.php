<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class DompdfController extends Controller
{
    public function index($id)
    {
        $user=User::findOrFail($id);

        $application=Application::with(['users'])
                                ->where('user_id',$user->id)->first();

        $pdf=Pdf::loadView('license.pdf',compact('application'));
        return $pdf->download('license.pdf');
    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        $application=Application::where('user_id',$user->id)->first();
        $pdf=Pdf::loadView('license.pdf',compact('user','application'));
        return $pdf->stream();
    }

    public function user_report()
    {
        $user=User::all();
        $pdf=Pdf::loadView('user.download_users', compact('user'));
        return $pdf->download('users_reports.pdf');
    }

    public function individual_report($id)
    {
        $user=User::findOrFail($id);
        $application=Application::where('user_id',$id)->first();
        $transaction=Transaction::where('phone_number',$user->phone)->latest()->first();
        $pdf=Pdf::loadView('user.user_report', compact('user','application','transaction'));
        return $pdf->download('individual_report.pdf');
    }

}
