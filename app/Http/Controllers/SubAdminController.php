<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;

class SubAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:subAdmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('layouts.political_party');
    }    

}
