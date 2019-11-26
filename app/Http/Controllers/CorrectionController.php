<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Correction;

class CorrectionController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $corrections = BirthCertificate::all();
        return view('voter.correction.lists')->with('corrections', $corrections);
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
        // $certificate = BirthCertificate::find($id);
        // return view('admin.certificate.show')->with('certificate', $certificate);
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
        $this->validate($request, [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'birthPlace' => 'required',
            'birthCountry' => 'required',
            'dateOfBirth' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'height' => 'required',
            'eyesColor' => 'required',
            'sex' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'emergencyContact' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

        $correction = BirthCertificate::find($id);
        $correction->fname = $request->input('fname');
        $correction->mname = $request->input('mname');
        $correction->lname = $request->input('lname');
        $correction->birthPlace = $request->input('birthPlace');
        $correction->birthCountry = $request->input('birthCountry');
        $correction->dateOfBirth = $request->input('dateOfBirth');
        $correction->fathername = $request->input('fathername');
        $correction->mothername = $request->input('mothername');
        $correction->height = $request->input('height');
        $correction->eyesColor = $request->input('eyesColor');
        $correction->sex = $request->input('sex');
        $correction->telephone = $request->input('telephone');
        $correction->mobile = $request->input('mobile');
        $correction->emergencyContact = $request->input('emergencyContact');
        $correction->address = $request->input('address');
        $correction->address2 = $request->input('address2');
        $correction->country = $request->input('country');
        $correction->state = $request->input('state');
        $correction->zip = $request->input('zip');
        $correction->save();
        return redirect('/correction')->with('success', 'Form Submitted for Correction');
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
