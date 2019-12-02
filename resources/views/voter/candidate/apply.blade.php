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
        {!! Form::open(['action' => 'CandidateController@store', 'method' => 'POST']) !!} 
        @csrf
      <div class="mb-3">
        {{Form::label('fullname', 'Fullname')}}
        {{Form::text('fullname', $birthCert->fname .' '. $birthCert->mname .' '. $birthCert->lname, ['class' => 'form-control', 'placeholder' => 'fullname'])}}
      </div>
      <hr class="mb-4">  
      <div class="row">
          <div class="col-md-6 mb-3">
            <label for="election">Election</label>
              <select name="election" id="election" class="form-control" >
                @foreach($eletions as $eletion)
                  <option value="{{ $eletion->id }}">{{ $eletion->election_type }}</option>
                @endforeach
              </select>
          </div>

          <div class="col-md-6 mb-3">
              {{Form::label('election_type', 'Election Type')}}
              {{ Form::select('election_type',[ '0' => 'Select', 'Perlament'=>'Perlament','City'=>'City','Union'=>'Union'], null,['class' => 'form-control']) }}
          </div>
          <div class="col-md-6 mb-3">
              {{Form::label('position', 'Position')}}
              {{ Form::select('position',[ '0' => 'Select'], null,['class' => 'form-control']) }}
          </div>
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
            
            $("#election_type").change( function () {
                var election_type = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('election_type_to_position') }}",
                    data: { election_type: election_type }
                }).done(function (data) {
                    console.log(data);
                    $("#position").html(data);
                });
            });

            $("#position").change( function () {
                var position = $(this).val();
                var type = $("#election_type").val();
                $.ajax({
                    type: "GET",
                    url: "{{route('election_type_position_to_user_election_area')}}",
                    data: { election_type: type, position: position },
                    beforeSend: function() {
                        $("#area").html("");
                    }
                }).done(function (data) {
                    console.log(data);
                    $("#electionArea").html(data);
                });
            });


		});
		</script>
@endpush