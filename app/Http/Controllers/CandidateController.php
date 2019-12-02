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
use App\SubAdmin;
use App\CandidateRequest;
use App\Position;
use App\Election;

class CandidateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['only' => ['index']]);
        $this->middleware('auth:web',['only' => ['apply','store']]);
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
        $birthCert = BirthCertificate::where('bid', auth()->user()->bid )->first();
        $parties = ['0'=>'select party'];
        foreach(SubAdmin::all() as $party){
            $parties[ $party->id  ] = $party->name;
        }

        //return date('Y-m-d');
        $eletions = Election::with('details')->where('date', '>', date('Y-m-d') )->get();


        return view('voter.candidate.apply', compact('birthCert','parties','eletions'));
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
        $position = Position::find($request->position);

        $candidateRequest = new CandidateRequest;
        $candidateRequest->fullname = $request->fullname;
        $candidateRequest->user_id = auth()->user()->id;
        //$candidateRequest->election_id = $request->;
        $candidateRequest->election_type = $request->election_type;
        $candidateRequest->position_id = $request->position;
        $candidateRequest->position_name = $position->name;
        $candidateRequest->subadmin_id = $request->party;
        $candidateRequest->division_id = auth()->user()->division_id;
        $candidateRequest->district_id = auth()->user()->district_id;
        $candidateRequest->upazilla_id = auth()->user()->upazilla_id;
        $candidateRequest->union_id = auth()->user()->union_id;
        $candidateRequest->rmo_id = auth()->user()->rmo_id;
        $candidateRequest->constituencies_id = auth()->user()->constituencies_id;
        $candidateRequest->save();

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
