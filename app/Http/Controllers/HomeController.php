<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $certificate = BirthCertificate::with(['district','upazilla','rmo','union'])->where('bid', auth()->user()->bid )->first();
        return view('voter.dashboard', compact('certificate'));
    }

}
