<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;

class CertificateController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = BirthCertificate::all();
        return view('admin.certificate.lists')->with('certificates', $certificates);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificate.create');
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

        $certificate = new BirthCertificate;
        $certificate->fname = $request->input('fname');
        $certificate->mname = $request->input('mname');
        $certificate->lname = $request->input('lname');
        $certificate->birthPlace = $request->input('birthPlace');
        $certificate->birthCountry = $request->input('birthCountry');
        $certificate->dateOfBirth = $request->input('dateOfBirth');
        $certificate->fathername = $request->input('fathername');
        $certificate->mothername = $request->input('mothername');
        $certificate->height = $request->input('height');
        $certificate->eyesColor = $request->input('eyesColor');
        $certificate->sex = $request->input('sex');
        $certificate->telephone = $request->input('telephone');
        $certificate->mobile = $request->input('mobile');
        $certificate->emergencyContact = $request->input('emergencyContact');
        $certificate->address = $request->input('address');
        $certificate->address2 = $request->input('address2');
        $certificate->country = $request->input('country');
        $certificate->state = $request->input('state');
        $certificate->zip = $request->input('zip');
        $certificate->save();
        return redirect('/certificate')->with('success', 'Birth Certificate Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificate = BirthCertificate::find($id);
        return view('admin.certificate.show')->with('certificate', $certificate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = BirthCertificate::find($id);
        return view('admin.certificate.edit')->with('certificate', $certificate);
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

        $certificate = BirthCertificate::find($id);
        $certificate->fname = $request->input('fname');
        $certificate->mname = $request->input('mname');
        $certificate->lname = $request->input('lname');
        $certificate->birthPlace = $request->input('birthPlace');
        $certificate->birthCountry = $request->input('birthCountry');
        $certificate->dateOfBirth = $request->input('dateOfBirth');
        $certificate->fathername = $request->input('fathername');
        $certificate->mothername = $request->input('mothername');
        $certificate->height = $request->input('height');
        $certificate->eyesColor = $request->input('eyesColor');
        $certificate->sex = $request->input('sex');
        $certificate->telephone = $request->input('telephone');
        $certificate->mobile = $request->input('mobile');
        $certificate->emergencyContact = $request->input('emergencyContact');
        $certificate->address = $request->input('address');
        $certificate->address2 = $request->input('address2');
        $certificate->country = $request->input('country');
        $certificate->state = $request->input('state');
        $certificate->zip = $request->input('zip');
        $certificate->save();
        return redirect('/certificate')->with('success', 'Birth Certificate Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = BirthCertificate::find($id);
        $certificate->delete();
        return redirect('/certificate')->with('success', 'Certificate Removed');
    }
}
