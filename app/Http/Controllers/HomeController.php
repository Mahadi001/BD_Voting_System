<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Political_Parties;


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
        // $certificate = BirthCertificate::where('bid',auth()->user()->bid )->first();
        // $certificate = BirthCertificate::all();
        return view('layouts.user-dashboard');
    }

}
