<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Consultation,User};
use Auth;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with('user')->with('profession')
        ->where('consultation_id', Auth::id())
        ->get();

        return view('consultant.dashboard',compact('consultations'));
    } 
}
 