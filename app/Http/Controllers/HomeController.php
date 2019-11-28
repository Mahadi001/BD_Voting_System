<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Political_Parties;
use App\Correction;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $corrections = BirthCertificate::where('bid',auth()->user()->bid )->first();
        $view = BirthCertificate::where('bid',auth()->user()->bid )->first();
        return view('voter.correction.view', compact('corrections', 'view'));
    }

}
