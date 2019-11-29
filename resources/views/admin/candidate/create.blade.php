@extends('layouts.user-dashboard')
@section('user-content')
<div class="container">
      <div class="py-5 text-center">
        <h2>Apply for Candidate</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
        {!! Form::open(['action' => 'CandidateController@store', 'method' => 'POST']) !!} 
        
      <div class="mb-3">
        {{Form::label('fullname', 'Fullname')}}
        {{Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'fullname'])}}
      </div>
      <hr class="mb-4">  
      
      <div class="mb-3">
          {{Form::label('political__parties', 'Location')}}
        </div>
      <div class="row">
        <div class="col-md-6 mb-3">
            {{Form::label('division', 'Division')}}
            {{Form::select('division', $divisions, null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
        <div class="col-md-6 mb-3">
            {{Form::label('district', 'District')}}
            {{Form::select('district', ['D' => 'Dhaka'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6 mb-3">
            {{Form::label('subdistrict', 'Upazilla/Thana')}}
            {{Form::select('subdistrict', ['B' => 'Bangladesh'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
        <div class="col-md-6 mb-3">
            {{Form::label('subDistrict', 'Sub District')}}
            {{Form::select('subDistrict', ['D' => 'Dhaka'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
      </div>

      <hr class="mb-4">

      <div class="mb-3">
        {{Form::label('political__parties', 'Select Political Parties')}}
      </div>
      <div class="mb-3">
        @if (count($political_parties) > 0)
            @foreach ($political_parties as $political_party)
              {{Form::radio('name', 'value')}}
              {{Form::label('name', $political_party->name)}}
            @endforeach
        @else
          <p>no data found</p>
        @endif
      </div>

      <hr class="mb-4">
      <div class="mb-3">
        {{Form::label('parliaments', 'Select Election Type')}}
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
            {{Form::label('election_type', 'Election Type')}}
            {{Form::select('election_type', ['B' => 'Bangladesh'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
        <div class="col-md-6 mb-3">
            {{Form::label('position', 'Position')}}
            {{Form::select('position', ['D' => 'Dhaka'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
       </div>
      <hr class="mb-4">
      {{Form::submit('Apply', ['class' => 'btn btn-primary col-md-2 col-xs-2 col1 center-block'])}}
      {{-- {!! Form::close() !!} --}}
      </div>
    </div>
    </div>
@endsection
  