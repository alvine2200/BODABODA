<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class DompdfController extends Controller
{
    public function index($id)
    {
        $user=User::findOrFail($id);
        $application=Application::where('user_id',$user->id)->first();
        $pdf=Pdf::loadView('license.pdf',compact('user','application'));
        return $pdf->download('license.pdf');
    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        $application=Application::where('user_id',$user->id)->first();
        $pdf=Pdf::loadView('Driving-license.pdf',compact('user','application'));
        return $pdf->stream();
    }


}
