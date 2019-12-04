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
use App\Candidate;

class CandidateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web',['only' => ['apply','store']]);
        $this->middleware('auth:admin',['only' => ['index','requestListforAdmin','requestApprovalByEc']]);
        $this->middleware('auth:subAdmin',['only' => ['requestList','requestApproval']]);
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
    public function requestList(Request $request)
    {
        $candidateRequest = CandidateRequest::with(['election','electionDetail'])->where('subadmin_id', auth()->user()->id)->get();

        foreach($candidateRequest as $i=>$value){
            $details = $value->electionDetail;
                $zone = unserialize($details->zone);
                if($details->zone_type == 'constituencies'){
                    $details->zone = Constituencies::find($value->constituencies_id)->name;
                }
                elseif($details->zone_type == 'rmo'){
                    $details->zone = Rmo::find($value->rmo_id)->name;
                }
                elseif($details->zone_type == 'ward'){
                    $details->zone = Rmo::find($value->rmo_id)->name .' > '. Union::find($value->union_id)->name;
                }
                elseif($details->zone_type == 'union'){
                    $union = Union::with(['division', 'district','upazilla', 'rmo'])->find($value->union_id);
                    $details->zone = $union->division->name .' > '. $union->district->name .' > '. $union->upazilla->name .' > '. $union->name;
                }
            
        }
        
        return view('political_party.candidate.requestList', compact('candidateRequest'));
    }


    
    public function requestListforAdmin(Request $request)
    {
        $candidateRequest = CandidateRequest::with(['election','electionDetail'])->where('approved_by_party', 1)->get();

        foreach($candidateRequest as $i=>$value){
            $details = $value->electionDetail;
                $zone = unserialize($details->zone);
                if($details->zone_type == 'constituencies'){
                    $details->zone = Constituencies::find($value->constituencies_id)->name;
                }
                elseif($details->zone_type == 'rmo'){
                    $details->zone = Rmo::find($value->rmo_id)->name;
                }
                elseif($details->zone_type == 'ward'){
                    $details->zone = Rmo::find($value->rmo_id)->name .' > '. Union::find($value->union_id)->name;
                }
                elseif($details->zone_type == 'union'){
                    $union = Union::with(['division', 'district','upazilla', 'rmo'])->find($value->union_id);
                    $details->zone = $union->division->name .' > '. $union->district->name .' > '. $union->upazilla->name .' > '. $union->name;
                }
            
        }
        
        return view('admin.candidate.requestList', compact('candidateRequest'));
    }




    public function requestApprovalByEc(Request $request,$id){
        $candidateRequest = CandidateRequest::find($id);
        $candidateRequest->approved_by_ec = 1;
        $candidateRequest->save();

        $candidate = new Candidate;
        $candidate->fullname = $candidateRequest->fullname;
        $candidate->user_id = $candidateRequest->user_id;
        $candidate->election_id = $candidateRequest->election_id;
        $candidate->election_type = $candidateRequest->election_type;
        $candidate->election_detail = $candidateRequest->election_detail;
        $candidate->position_id = $candidateRequest->position_id;
        $candidate->position_name = $candidateRequest->position_name;
        $candidate->subadmin_id = $candidateRequest->subadmin_id;
        $candidate->division_id = $candidateRequest->division_id;
        $candidate->district_id = $candidateRequest->district_id;
        $candidate->upazilla_id = $candidateRequest->upazilla_id;
        $candidate->union_id = $candidateRequest->union_id;
        $candidate->rmo_id = $candidateRequest->rmo_id;
        $candidate->constituencies_id = $candidateRequest->constituencies_id;
        $candidate->save();


        return redirect()->back()->with('success', 'successfully approved candidate');
    }


    public function requestApproval(Request $request,$id){
        $candidate = CandidateRequest::find($id);
        $candidate->approved_by_party = 1;
        $candidate->save();
        return redirect()->back()->with('success', 'successfully approved candidate');
    }

    public function apply(Request $request)
    {
        $birthCert = BirthCertificate::where('bid', auth()->user()->bid )->first();
        $parties = [''=>'select party'];
        foreach(SubAdmin::all() as $party){
            $parties[ $party->id  ] = $party->name;
        }

        $eletions = Election::with('details')->where('date', '>', date('Y-m-d') )->get();

        foreach($eletions as $i=>$eletion){
            foreach($eletion->details as $key=>$details){
                $zone = unserialize($details->zone);
                if($details->zone_type == 'constituencies'){
                    if(!in_array(auth()->user()->constituencies_id, $zone)){
                        unset($eletion->details[$key]);
                    }
                }
                elseif($details->zone_type == 'rmo'){
                    if(!in_array(auth()->user()->rmo_id, $zone)){
                        unset($eletion->details[$key]);
                    }
                }
                elseif($details->zone_type == 'ward' ){
                    if(!in_array(auth()->user()->union_id, $zone)){
                        unset($eletion->details[$key]);
                    }
                }
                elseif($details->zone_type == 'union'){
                    if( Rmo::find( auth()->user()->rmo_id )->type  != 'polli' ){
                        if(!in_array(auth()->user()->union_id, $zone)){
                            unset($eletion->details[$key]);
                        }
                    }
                }
            }
            if($eletion->details == '[]'){
                unset($eletions[$i]);
            }
        }

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
        $this->validate($request,[
            'fullname' => 'required|string',
            'election' => 'required|integer',
            'position' => 'required|integer',
            'election_detail' => 'required|integer',
            'party' => 'required|integer'
        ]);

        $check = CandidateRequest::where([['election_id',$request->election],['user_id',auth()->user()->id]])->count();
        if($check>0){
            return redirect()->back()->withError('you\'re already apllyed');
        }

        $position = Position::find($request->position);
        $election = Election::find($request->election);

        $candidateRequest = new CandidateRequest;
        $candidateRequest->fullname = $request->fullname;
        $candidateRequest->user_id = auth()->user()->id;
        $candidateRequest->election_id = $request->election;
        $candidateRequest->election_type = $election->election_type;
        $candidateRequest->election_detail = $request->election_detail;
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

        return redirect()->back()->with('success', 'successfully apllyed');

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
        $candidate = CandidateRequest::find($id);
        $candidate->delete();
        return redirect()->back()->with('success', 'successfully deleted candidate request');
    }
}
