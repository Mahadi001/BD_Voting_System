<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BirthCertificate;
use App\Political_Parties;
use App\Divisions;
use App\Districts;
use App\Upazilla;
use App\Union;
use App\Rmo;
use App\Constituencies;

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

    public function apply(Request $request)
    {

        $divisions = [];

        $collection = Divisions::select('id','name')->get();

        foreach($collection as $value){
            $divisions[  $value->id  ] =  $value->name;
        }

        $stmt = Districts::where('did', $request->division)->get();
        $districts = '<option value="" >select</option>';
    
        foreach($stmt as $value){
            $districts .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        $stmt = Upazilla::where('district_id', $request->district)->get();
        $upazilas = '<option value="" >select</option>';
    
        foreach($stmt as $value){
            $upazilas .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        $unions = Union::with('rmo')->where([
            ['division_id', $request->division],
            ['district_id', $request->district],
            ['upazilla_id', $request->upazila],
            ['rmo_type', $request->rmo]
        ])->get();
    
        $rmoHtmls = '';
        if($unions != '[]' ){
            $rmo = $unions->unique('rmo')->pluck('rmo');
            $rmoHtmls = '<select name="municipality" id="municipality" >';
            foreach($rmo as $value){
                $rmoHtmls .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
            }
            $rmoHtmls .= '</select>';
        }
        
        $unionsHtmls = '<option value="" >select</option>';
        foreach($unions as $value){
            $unionsHtmls .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        $corrections = BirthCertificate::where('bid', auth()->user()->bid )->first();
        $political_parties = Political_Parties::all();
        return view('admin.candidate.create', compact('political_parties', 'divisions','corrections','districts','upazilas','unionsHtmls','rmoHtmls'));
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
