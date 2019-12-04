<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Correction;
use App\Pending;
use App\Divisions;
use App\User;

class CorrectionController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin', ['only' => ['index','approved']]);
        $this->middleware('auth:web', ['only' => ['apply', 'view']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corrections = Correction::all();
        return view('admin.correction.lists', compact('corrections'));
    }

    public function show($id)
    {
        $certificate = Correction::find($id);
        return view('admin.correction.show', compact('certificate'));
    }

    public function approved(Request $request,$correction_id){
        
        $correction = Correction::find($correction_id);

        $certificate = BirthCertificate::where('bid', $correction->bid)->first();
        $certificate->fname = $correction->fname;
        $certificate->mname = $correction->mname;
        $certificate->lname = $correction->lname;
        $certificate->birthPlace = $correction->birthPlace;
        $certificate->birthCountry = $correction->birthCountry;
        $certificate->dateOfBirth = $correction->dateOfBirth;
        $certificate->fathername = $correction->fathername;
        $certificate->mothername = $correction->mothername;
        $certificate->height = $correction->height;
        $certificate->eyesColor = $correction->eyesColor;
        $certificate->sex = $correction->sex;
        $certificate->telephone = $correction->telephone;
        $certificate->mobile = $correction->mobile;
        $certificate->emergencyContact = $correction->emergencyContact;
        $certificate->address = $correction->address;
        $certificate->address2 = $correction->address2;
        $certificate->division_id = $correction->division_id;
        $certificate->district_id = $correction->district_id;
        $certificate->upazilla_id = $correction->upazilla_id;
        $certificate->union_id = $correction->union_id;
        $certificate->rmo_type = $correction->rmo_type;
        $certificate->rmo_id = $correction->rmo_id;
        $certificate->constituencies_id = $correction->constituencies_id;
        $certificate->save();

        $user = User::where('bid',$correction->bid)->first();
        $user->division_id = $correction->division_id;
        $user->district_id = $correction->district_id;
        $user->upazilla_id = $correction->upazilla_id;
        $user->union_id = $correction->union_id;
        $user->rmo_id = $correction->rmo_id;
        $user->constituencies_id = $correction->constituencies_id;
        $user->save();

        $correction->delete();

        return redirect( route('correction.index') )->with('success', 'Birth Certificate Correction Approved');
    }

    public function view()
    {
        $divisions = Divisions::all();
        $certificate = BirthCertificate::with(['district','upazilla','rmo','union'])->where('bid', auth()->user()->bid )->first();
        return view('voter.correctionApply', compact('certificate','divisions'));
    }

    public function apply(Request $request){
        
        $this->validate($request, [
            'fname' => 'required|string',
            'mname' => 'required|string',
            'lname' => 'required|string',
            'birthPlace' => 'required|string',
            'birthCountry' => 'required|string',
            'dateOfBirth' => 'required|date',
            'fathername' => 'required|string',
            'mothername' => 'required|string',
            'height' => 'required|string',
            'eyesColor' => 'required|string',
            'sex' => 'required|string',
            'telephone' => 'required|string',
            'mobile' => 'required|string',
            'emergencyContact' => 'required|string',
            'address' => 'required|string',
            'address2' => 'required|string',
            'division' => 'required',
            "district" => 'required',
            "upazilla" => 'required',
            "rmo" => 'required',
            "municipality" => 'required',
            "unionORward" => 'required',
            "constituencies_id" => 'required'
        ]);
        
        if(Correction::where('bid', auth()->user()->bid)->count() > 0 ){
            return redirect()->back()->withError('You have already applyed for the correction');
        }
        $certificate = new Correction;
        $certificate->bid = auth()->user()->bid;
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

        // update user next time

        return redirect()->back()->with('success', 'Birth Certificate Correction applyed');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   

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
