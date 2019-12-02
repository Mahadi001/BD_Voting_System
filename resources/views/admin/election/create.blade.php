@extends('layouts.dashboard')
@section('admin-content')
<div class="container">
      <div class="py-5 text-center">
        <h2>Election Create Form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
        {!! Form::open(['action' => 'CandidateController@store', 'method' => 'POST']) !!} 
        
      <div class="mb-3">
        {{Form::label('date', 'Date')}}
        {{ Form::date('date', null,['class' => 'form-control']) }}
      </div>
      <div class="row">
          <div class="col-md-6 mb-3">
              {{Form::label('start', 'Start')}}
              {{ Form::time('start', null,['class' => 'form-control']) }}
          </div>
          <div class="col-md-6 mb-3">
              {{Form::label('end', 'End')}}
              {{ Form::time('end', null,['class' => 'form-control']) }}
          </div>
        </div>
        <hr class="mb-4">
        <div class="mb-3">
            {{Form::label('election_type', 'Election type')}}
            {{ Form::select('election_type',[ '0' => 'Select', 'Perlament'=>'Perlament','City'=>'City','Union'=>'Union'], null,['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            {{Form::label('position', 'Position')}}
            {{ Form::select('position',[ '0' => 'Select'], null,['class' => 'form-control']) }}
        </div>
        <div id="area" class="mb-3" >
            
        </div>
        <a href="javascript:void(0)" class="btn btn-success" id="add">add</a>

        <div>
            <table border="1" id="preview">
                
            </table>
        </div>
        
      <hr class="mb-4">
  
      <a href="javascript:void(0)" id="store" class="btn btn-primary col-md-2 col-xs-2 col1 center-block">submit</a>
      </div>
    </div>
    </div>
 
    
@endsection
@push('script')
<script>
		$(document).ready(function () {
            $("body").on("click", "#division", function() {
                var division = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{route('division_to_district')}}",
                    data: { division: division }
                }).done(function (data) {
                    console.log(data);
					$("#district").html(data.districts);
                });
              
            });
            $("body").on("click", "#district", function () {
                var district = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{route('district_to_upazilla')}}",
                    data: { district: district }
                }).done(function (data) {
                    console.log(data);
					$("#upazila").html(data.upazila);
                });
            });
			$("body").on("click", "#upazila", function () {
				var upazila = $(this).val();
				var division = $("#division").val();
                var district = $("#district").val();
                var rmo      = $("#rmo").val();
				
                $.ajax({
                    type: "GET",
                    url: "{{route('division_district_upazilla_rmo_to_union')}}",
                    data: { division: division, district: district, upazila: upazila, rmo: rmo}
                }).done(function (data) {
                    console.log(data);
                    $("#zone").html(data.unionsHtmls);
                    
                });
            });

            $("body").on("click", "#city", function () {
				var rmo = $(this).val();
				
                $.ajax({
                    type: "GET",
                    url: "{{route('city_to_ward')}}",
                    data: { rmo: rmo }
                }).done(function (data) {
                    console.log(data);
                    $("#zone").html(data);
                    
                });
            });


            $("#election_type").change( function () {
                var election_type = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('election_type_to_position') }}",
                    data: { election_type: election_type }
                }).done(function (data) {
                    console.log(data);
                    //$("#area").html(data.area);
                    $("#position").html(data);
                });
            });
            $("#position").change( function () {
                var position = $(this).val();
                var type = $("#election_type").val();
                $.ajax({
                    type: "GET",
                    url: "{{route('election_type_position_to_zone')}}",
                    data: { election_type: type, position: position },
                    beforeSend: function() {
                        $("#area").html("");
                    }
                }).done(function (data) {
                    console.log(data);
                    $("#area").html(data.zone);
                });
            });


            var storeData = []; 
            $("#add").click( function () {
                var election_type = $("#election_type").val();
                var position = $("#position").val();
                var zone = $("#zone").val();

                if( zone ) {
                    //$("#storeForm").append(appendHtml);
                    storeData.push( { election_type: election_type, position_id: position, zone_id: zone } );
                    var zoneImplode = $("#zone option:selected").map(function(){ return $(this).text() }).get().join(", ");
                    var appendHtml = "<tr><td>"+ $("#position  option:selected").text() +"</td><td>"+ zoneImplode +"</td></tr>";
                    $("#preview").append(appendHtml);
                }
            });

            $("#store").click( function () {
                console.log(storeData);
                var election_type = $("#election_type").val();
                var date = $("#date").val();
                var start = $("#start").val();
                var end = $("#end").val();
                $.ajax({
                    type: "POST",
                    url: "{{route('election.store')}}",
                    data: { election_type: election_type, date: date, start: start, end: end, details: storeData, _token: '{{ csrf_token() }}' },
                    beforeSend: function() {
                        
                    }
                }).done(function (data) {
                    console.log(data);
                    alert('success');
                    location.reload();
                });

            });



		});
		</script>
@endpush