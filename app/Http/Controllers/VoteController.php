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
use App\Vote;

class VoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin', ['only' => ['show']]);
        $this->middleware('auth:web', ['only' => ['voteList','votePlace']]);
    }


    public function voteList(){

        $eletions = Election::with([
            'details', 
            'details.candidates', 
            'details.candidates.party'
        ])->where('date', '>', date('Y-m-d') )->get();

        foreach($eletions as $i=>$eletion){
            foreach($eletion->details as $key=>$details){
                if($details->zone_type == 'constituencies'){
                    $zone = unserialize($details->zone);
                    if(!in_array(auth()->user()->constituencies_id, $zone)){
                        unset($eletion->details[$key]);
                    }
                }
                elseif($details->zone_type == 'rmo'){
                    $zone = unserialize($details->zone);
                    if(!in_array(auth()->user()->rmo_id, $zone)){
                        unset($eletion->details[$key]);
                    }
                }
                elseif($details->zone_type == 'ward' ){
                    $zone = unserialize($details->zone);
                    if(!in_array(auth()->user()->union_id, $zone)){
                        unset($eletion->details[$key]);
                    }
                }
                elseif($details->zone_type == 'union'){
                    if( Rmo::find( auth()->user()->rmo_id )->type  != 'polli' ){
                        $zone = unserialize($details->zone);
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
        //return $eletions;

        return view('voter.vote.election', compact('eletions'));
    }

    public function votePlace(Request $request){
        
        $vote = new Vote;
        $vote->user_id = auth()->user()->id;
        $vote->candidate_id = $request->candidate;
        $vote->election_id = $request->election;
        $vote->election_detail_id = $request->election_detail;
        $vote->position_id = $request->position_id;
        $vote->subadmin_id = $request->subadmin_id;
        $vote->save();
        return redirect()->back()->with('success', 'successfully vote');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vote.index');
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
        $corrections = BirthCertificate::where('bid', auth()->user()->bid )->first();
        // $view = BirthCertificate::find($id);
        return view('voter.candidates', compact('corrections'));
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

    public function view($id)
    {
        //
    }
}
