@extends('layouts.user')
@section('user-content')
<div class="container">
      <div class="py-5 text-center">
        <h2>Apply for Candidate</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        <h2>Election Area: <span id="electionArea"></span></h2>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
        {!! Form::open(['action' => 'CandidateController@store', 'method' => 'POST', 'id'=>"form"]) !!} 
        @csrf
      <div class="mb-3">
        {{Form::label('fullname', 'Fullname')}}
        {{Form::text('fullname', $birthCert->fname .' '. $birthCert->mname .' '. $birthCert->lname, ['class' => 'form-control','readonly'=>'readonly', 'placeholder' => 'fullname'])}}
      </div>
      <hr class="mb-4">  
      <div class="row">
          <div class="col-md-6 mb-3">
            <label for="election">Election</label>
              
              <select name="election" id="election" class="form-control" >
                  <option value="" >Select Election</option>
                @foreach($eletions as $eletion)
                  <option value="{{ $eletion->id }}">{{ $eletion->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-md-6 mb-3">
            {{Form::label('position', 'Position')}}
            {{ Form::select('position',[ '0' => 'Select'], null,['class' => 'form-control']) }}
          </div>


          {{-- <div class="col-md-6 mb-3">
              {{Form::label('election_type', 'Election Type')}}
              {{ Form::select('election_type',[ '0' => 'Select', 'Perlament'=>'Perlament','City'=>'City','Union'=>'Union'], null,['class' => 'form-control']) }}
          </div>
          <div class="col-md-6 mb-3">
              {{Form::label('position', 'Position')}}
              {{ Form::select('position',[ '0' => 'Select'], null,['class' => 'form-control']) }}
          </div> --}}
      </div>
      <div class="mb-3">
        {{Form::label('party', 'Political Party')}}
        {{ Form::select('party',$parties, null,['class' => 'form-control']) }}
    </div>

      <hr class="mb-4">
      {{Form::submit('Apply', ['class' => 'btn btn-primary col-md-2 col-xs-2 col1 center-block'])}}

      </div>
    </div>
    </div>
@endsection
@push('script')
<script>
		$(document).ready(function () {
            
            $("#election").change( function () {
                var election = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('election_to_position') }}",
                    data: { election: election }
                }).done(function (data) {
                    console.log(data);
                    $("#position").html(data);
                });
            });
            
            $("#position").change( function () {
                var position = $(this).val();
                var electionDetailsId = $("#position option:selected").data("edid");

                var type = $("#election_type").val();
                $.ajax({
                    type: "GET",
                    url: "{{route('election_detail_position_to_user_election_area')}}",
                    data: { election_type: type, position: position, edid: electionDetailsId },
                    beforeSend: function() {
                        $("#form").append('<input type="hidden" name="election_detail" value="'+ electionDetailsId +'" />');
                        $("#electionArea").html("");
                    }
                }).done(function (data) {
                    console.log(data);
                    $("#electionArea").html(data);
                });
            });


		});
		</script>
@endpush