<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Correction;
use App\Pending;

class CorrectionController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['view', 'edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendings = Pending::get();
        return view('voter.correction.admin-lists', compact('pendings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $corrections = BirthCertificate::find($id);
        $view = BirthCertificate::find($id);
        return view('voter.correction.view', compact('view', 'corrections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bid' => 'required',
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

        $pending = new Pending;
        $pending->bid = $request->input('bid');
        $pending->fname = $request->input('fname');
        $pending->mname = $request->input('mname');
        $pending->lname = $request->input('lname');
        $pending->birthPlace = $request->input('birthPlace');
        $pending->birthCountry = $request->input('birthCountry');
        $pending->dateOfBirth = $request->input('dateOfBirth');
        $pending->fathername = $request->input('fathername');
        $pending->mothername = $request->input('mothername');
        $pending->height = $request->input('height');
        $pending->eyesColor = $request->input('eyesColor');
        $pending->sex = $request->input('sex');
        $pending->telephone = $request->input('telephone');
        $pending->mobile = $request->input('mobile');
        $pending->emergencyContact = $request->input('emergencyContact');
        $pending->address = $request->input('address');
        $pending->address2 = $request->input('address2');
        $pending->country = $request->input('country');
        $pending->state = $request->input('state');
        $pending->zip = $request->input('zip');
        $pending->save();
        return redirect('/home')->with('success', 'Update request is sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pending = Pending::find($id);
        return view('voter.correction.admin-show', compact('pending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corrections = BirthCertificate::find($id);
        return view('voter.correction.edit', compact('corrections'));
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
        $pending = Pending::find($id);
        $bcert = BirthCertificate::where('bid', $pending->bid)->firstOrFail();
        $bcert->fname = $pending->fname;
        $bcert->mname = $pending->mname;
        $bcert->lname = $pending->lname;
        $bcert->birthPlace = $pending->birthPlace;
        $bcert->birthCountry = $pending->birthCountry;
        $bcert->dateOfBirth = $pending->dateOfBirth;
        $bcert->fathername = $pending->fathername;
        $bcert->mothername = $pending->mothername;
        $bcert->height = $pending->height;
        $bcert->eyesColor = $pending->eyesColor;
        $bcert->sex = $pending->sex;
        $bcert->telephone = $pending->telephone;
        $bcert->mobile = $pending->mobile;
        $bcert->emergencyContact = $pending->emergencyContact;
        $bcert->address = $pending->address;
        $bcert->address2 = $pending->address2;
        $bcert->country = $pending->country;
        $bcert->state = $pending->state;
        $bcert->zip = $pending->zip;
        $bcert->save();
        $pending->delete();
        return redirect('/correction')->with('success', 'Correction Approved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pending = Pending::find($id);
        $pending->delete();
        return redirect('/correction')->with('success', 'Request Removed');
    }
}
