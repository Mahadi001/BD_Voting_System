@extends('layouts.dashboard')
@section('admin-content')
<div class="container">
      <div class="py-5 text-center">
        <h2>Election Create Form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

{{-- 
                  
      <div class="col-md-4 mb-3">
        {{Form::label('fname', 'First Name')}}
        {{Form::text('fname', $certificate->fname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
        </div> --}}


      <div class="row">
        <div class="col-md-12 order-md-1"> 

      <div class="row">
        <div class="col-md-6 mb-3">
            {{Form::label('name', 'Name')}}
            {{ Form::text('name', $election->name,['class' => 'form-control']) }}
        </div>
        <div class="col-md-6 mb-3">
            {{Form::label('date', 'Date')}}
            {{ Form::date('date', $election->date,['class' => 'form-control']) }}
          </div>
      </div>


      <div class="row">
          <div class="col-md-6 mb-3">
              {{Form::label('start', 'Start Time')}}
              {{Form::text('date', $election->start, ['class' => 'form-control'])}}
          </div>
          <div class="col-md-6 mb-3">
              {{Form::label('end', 'End Time')}}
              {{ Form::text('end', $election->end,['class' => 'form-control']) }}
          </div>
        </div>
        <div class="mb-3">
            {{Form::label('election_type', 'Election type')}}
            {{ Form::text('end', $election->election_type,['class' => 'form-control']) }}
        </div>
        <hr class="mb-4">
        <div id="area" class="mb-3" >
        </div>
        <div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Position Name</th>
                <th scope="col">Zone Type</th>
                <th scope="col">Zone</th>
              </tr>
            </thead>
            <tbody>

              @foreach($election->details as $details)
              <tr>
                <th scope="row">1</th>
                <td>{{$details->position_name}}</td>
                <td>{{ $details->zone_type}}</td>
                <td>{{ $details->zone}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
            <table border="1" id="preview">
                
            </table>
        </div>
        
      <hr class="mb-4">
      </div>
    </div>
    </div>
 
    
@endsection
