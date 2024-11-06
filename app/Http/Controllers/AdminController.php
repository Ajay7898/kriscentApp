<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Consultation,User};
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with('user_consult')->with('profession')
        ->get();

        return view('admin.dashboard',compact('consultations'));
    } 

    
}
