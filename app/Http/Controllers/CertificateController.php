<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Divisions;
use App\User;

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
        $divisions = Divisions::all();
        return view('admin.certificate.create',compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
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
            'address2' => 'required'
        ]);

        $certificate = new BirthCertificate;
        $certificate->bid = rand(111111111, 999999999);
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
        
        $certificate->division_id = $request->division;
        $certificate->district_id = $request->district;
        $certificate->upazilla_id = $request->upazilla;
        $certificate->union_id = $request->unionORward;
        $certificate->rmo_type = $request->rmo;
        $certificate->rmo_id = $request->municipality;
        $certificate->constituencies_id = $request->constituencies_id;

        $certificate->save();
        return redirect()->back()->with('success', 'Birth Certificate Created');
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
        $divisions = Divisions::all();
        $certificate = BirthCertificate::with(['district','upazilla','rmo','union'])->find($id);
        return view('admin.certificate.edit', compact('certificate','divisions'));
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
        //return $request->all();
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
            'address2' => 'required'
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
        
        $certificate->division_id = $request->division;
        $certificate->district_id = $request->district;
        $certificate->upazilla_id = $request->upazilla;
        $certificate->union_id = $request->unionORward;
        $certificate->rmo_type = $request->rmo;
        $certificate->rmo_id = $request->municipality;
        $certificate->constituencies_id = $request->constituencies_id;

        $certificate->save();

        $user = User::where('bid',$certificate->bid)->first();
        if($user){
            $user->division_id = $request->division;
            $user->district_id = $request->district;
            $user->upazilla_id = $request->upazilla;
            $user->union_id = $request->unionORward;
            $user->rmo_id = $request->municipality;
            $user->constituencies_id = $request->constituencies_id;
            $user->save();
        }
        
        return redirect()->back()->with('success', 'Birth Certificate Updated');
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
