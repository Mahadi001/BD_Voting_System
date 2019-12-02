<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisions;
use App\Districts;
use App\Upazilla;
use App\Union;
use App\Rmo;
use App\Constituencies;
use App\Position;

class AjaxController extends Controller
{

    public function division()
    {
        $divisions = Divisions::all();
	
        $html = '
            <select name="division" id="division" >
                <option value="" >select division</option>
                ';
                foreach($divisions as $division){
                    $html .= '<option value="'.$division->id.'"> '.$division->name.' </option>';
                }
        $html .='
            </select><br>
            <select name="district" id="district" >
                <option value="" >select district</option>
            </select><br>
            <select name="upazila" id="upazila" >
                <option value="" >select upazila</option>
            </select><br>
            RMO: 
            <input type="radio" name="rmo" value="polli" id="polli"/>polli
            <input type="radio" name="rmo" value="city"  id="city"/>city
            <br>
            <span id="rmoOption"></span>
            <select name="unionORward" id="unionORward" >
                <option value="" >select union/ward</option>
            </select><br>
            
            <script src="'. asset('js/jquery.min.js') .'" ></script>
            <script>
            $(document).ready(function () {
                $("#division").change( function () {
                    var division = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: "'. route('division_to_district') .'",
                        data: { division: division }
                    }).done(function (data) {
                        console.log(data);
                        $("#district").html(data.districts);
                    });
                
                });
                $("#district").change( function () {
                    var district = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: "'. route('district_to_upazilla') .'",
                        data: { district: district }
                    }).done(function (data) {
                        console.log(data);
                        $("#upazila").html(data.upazila);
                    });
                });

                $("input[type=radio][name=rmo]").change( function () {
                    var rmo = $(this).val();
                    var division = $("#division").val();
                    var district = $("#district").val();
                    var upazila  = $("#upazila").val();
                    
                    $.ajax({
                        type: "GET",
                        url: "'. route('division_district_upazilla_rmo_to_union') .'",
                        data: { division: division, district: district, upazila: upazila, rmo: rmo }
                    }).done(function (data) {
                        console.log(data);
                        $("#unionORward").html(data.unionsHtml);
                        $("#rmoOption").html("");
                        if(data.rmoHtml){
                            $("#rmoOption").html(data.rmoHtml);
                        }
                    });
                });


            });
            </script>
            
        ';
        return $html;
    }

    public function district(Request $request)
    {
        $stmt = Districts::where('did', $request->division)->get();
        $districts = '<option value="" >select</option>';
    
        foreach($stmt as $value){
            $districts .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        return compact('districts');
    }

    public function upazilla(Request $request)
    {
        $stmt = Upazilla::where('district_id', $request->district)->get();
        $upazila = '<option value="" >select</option>';
    
        foreach($stmt as $value){
            $upazila .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        return compact('upazila');
    }

    public function union(Request $request)
    {
        $unions = Union::with('rmo')->where([
            ['division_id', $request->division],
            ['district_id', $request->district],
            ['upazilla_id', $request->upazila],
            ['rmo_type', $request->rmo]
        ])->get();
    
        $rmoHtml = '';
        if($unions != '[]' ){
            $rmo = $unions->unique('rmo')->pluck('rmo');
            $rmoHtml = '<select name="municipality" id="municipality" >';
            foreach($rmo as $value){
                $rmoHtml .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
            }
            $rmoHtml .= '</select>';
        }
        
        $unionsHtmls = '<option value="0" >select Union</option>';
        foreach($unions as $value){
            $unionsHtmls .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
    
        return compact('unionsHtmls', 'rmoHtml');
    }

    public function election_type_position_to_zone(Request $request){

        $position = Position::find($request->position);
        if($request->election_type == 'Perlament'){
            $zone = '<label for="zone">Constituencies</label><select name="zone[]" id="zone" class="form-control" multiple>';
            foreach(Constituencies::all() as $value){
                $zone .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
            }
            $zone .= '</select>';
        } 
        elseif($request->election_type == 'City'){
            if( $position->range == 'rmo' ){
                $zone = '<label for="zone">City Corporation</label><select class="form-control" name="zone[]" id="zone" multiple>';
                foreach(Rmo::where('type','city')->get() as $value){
                    $zone .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
                }
                $zone .= '</select>';
            }
            elseif( $position->range == 'ward' ){
                $zone = '<label for="zone">City Corporation</label><select class="form-control" name="city" id="city" ><option value="" >select city</option>';
                foreach(Rmo::where('type','city')->get() as $value){
                    $zone .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
                }
                $zone .= '</select>
                        <label for="zone">Ward</label>
                        <select name="zone[]" id="zone" class="form-control" multiple>
                            <option value="" >select ward</option>
                        </select>';
            }
        }
        elseif($request->election_type == 'Union'){

            $divisions = Divisions::all();
                $zone = '<label for="zone">Division</label><select class="form-control" name="division" id="division" ><option value="" >select division</option>';
                foreach($divisions as $value){
                    $zone .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
                }
                $zone .= '</select>
                <input name="rmo" id="rmo" type="hidden" value="polli" />

                <label for="zone">District</label>
                <select name="district" id="district" class="form-control">
                    <option value="" >select district</option>
                </select>
                <label for="zone">Upazilla</label>
                <select name="upazila" id="upazila" class="form-control">
                    <option value="" >select upazila</option>
                </select>
                <label for="zone">Union</label>
                <select name="zone[]" id="zone" multiple class="form-control">
                </select>';
        }
        return compact('zone');
    }
    
    public function city_to_ward(Request $request){
        $union = Union::with('rmo')->where('rmo_id', $request->rmo)->get();
        $unions = '';
        foreach($union as $value){
            $unions .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        return $unions;
    }

    public function election_type_to_position(Request $request){
        $position = Position::where('election_type', $request->election_type)->get();
        $positions = '<option value="" >select</option>';
        foreach($position as $value){
            $positions .= '<option value="'. $value->id .'" >'. $value->name .'</option>';
        }
        return $positions;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
