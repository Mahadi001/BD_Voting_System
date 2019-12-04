<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;
use App\ElectionDetail;
use App\Constituencies;
use App\Position;
use App\Rmo;
use App\Union;

class ElectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin', ['only' => ['index', 'create', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();
        return view('admin.election.lists', compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.election.create');
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
            'name' => 'required|string',
            'election_type' => 'required|string',
            'date' => 'required|date',
            'start' => 'required',
            'end' => 'required',
            'details' => 'required|array'
        ]);

        $election = new Election;
        $election->name = $request->name;
        $election->election_type = $request->election_type;
        $election->date = $request->date;
        $election->start = $request->start;
        $election->end = $request->end;
        $election->save();
        
        foreach($request->details as $detail){

            $postion = Position::find($detail['position_id']);

            $electionDetail = new ElectionDetail;
            $electionDetail->election_id = $election->id;
            $electionDetail->position = $postion->id;
            $electionDetail->position_name = $postion->name;
            $electionDetail->zone_type = $postion->range;
            $electionDetail->zone = serialize( $detail['zone_id'] );
            $electionDetail->save();

        }

        return $election;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $election = Election::with('details')->find($id);

            foreach($election->details as $key=>$details){
                $zone = unserialize($details->zone);
                if($details->zone_type == 'constituencies'){
                   
                    $details->zone = Constituencies::whereIn('id',$zone)->pluck('name');
                    
                }
                elseif($details->zone_type == 'rmo'){
                    $details->zone = Rmo::whereIn('id',$zone)->pluck('name');
                }
                elseif($details->zone_type == 'ward' || $details->zone_type == 'union'){
                    $details->zone = Union::whereIn('id',$zone)->pluck('name');
                }
            }
        
        return view('admin.election.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }
}
