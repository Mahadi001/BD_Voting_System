<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Political_Parties;
use App\Divisions;

class CandidateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['except' => ['apply']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = [];

        $collection = Divisions::select('id','name')->get();

        foreach($collection as $value){
            $divisions[  $value->id  ] =  $value->name;
        }

        $political_parties = Political_Parties::all();
        $candidates = BirthCertificate::all();
        return view('admin.candidate.lists', compact('divisions','political_parties') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function apply()
    {

        $divisions = [];

        $collection = Divisions::select('id','name')->get();

        foreach($collection as $value){
            $divisions[  $value->id  ] =  $value->name;
        }
        $corrections = BirthCertificate::where('bid', auth()->user()->bid )->first();
        $political_parties = Political_Parties::all();
        return view('admin.candidate.create', compact('political_parties', 'divisions','corrections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
