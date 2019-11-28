@extends('layouts.dashboard')
@section('admin-content')

    <div class="container">
      <div class="py-5 text-center">
        <h2>Birth Certificate form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
        {!! Form::open(['action' => ['CertificateController@update', $certificate->id], 'method' => 'POST']) !!} 
        <div class="mb-3">
          {{Form::label('bid', 'Birth Certificate Id')}}
          {{Form::text('bid', $certificate->bid, ['class' => 'form-control', 'placeholder' => 'Birth Certificate Id'])}}
        </div>
        <hr class="mb-4">
        <div class="row">
        <div class="col-md-4 mb-3">
        {{Form::label('fname', 'First Name')}}
        {{Form::text('fname', $certificate->fname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="col-md-4 mb-3">
        {{Form::label('mname', 'Middle Name')}}
        {{Form::text('mname', $certificate->mname, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
        </div>
        <div class="col-md-4 mb-3">
        {{Form::label('lname', 'Last Name')}}
        {{Form::text('lname', $certificate->lname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
        </div>
     </div>
     <div class="row">
        <div class="col-md-4 mb-3">
            {{Form::label('birthPlace', 'Place of Birth')}}
            {{Form::text('birthPlace', $certificate->birthPlace, ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('birthCountry', 'Country of Birth')}}
            {{Form::text('birthCountry', $certificate->birthCountry, ['class' => 'form-control', 'placeholder' => 'Country of Birth'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('dateOfBirth', 'Date of Birth')}}
            {{Form::date('dateOfBirth', $certificate->dateOfBirth, ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
        </div>
        </div>
        <hr class="mb-4">

        
        <div class="mb-3">
          {{Form::label('fathername', 'Full Name Of Father')}}
          {{Form::text('fathername', $certificate->fathername, ['class' => 'form-control', 'placeholder' => 'Father Name'])}}
        </div>

        <div class="mb-3">
          {{Form::label('mothername', 'Full Name Of Mother')}}
          {{Form::text('mothername', $certificate->mothername, ['class' => 'form-control', 'placeholder' => 'Mother Name'])}}
        </div>

        <hr class="mb-4">
    
        <div class="row">
        <div class="col-md-4 mb-3">
            {{Form::label('height', 'Height')}}
            {{Form::text('height', $certificate->height, ['class' => 'form-control', 'placeholder' => 'height'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('eyesColor', 'Color of eyes')}}
            {{Form::text('eyesColor', $certificate->eyesColor, ['class' => 'form-control', 'placeholder' => 'Eyes color'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('sex', 'Sex')}}
            {{Form::text('sex', $certificate->sex, ['class' => 'form-control', 'placeholder' => 'Sex'])}}
        </div>
        </div>

        <div class="row">
        <div class="col-md-4 mb-3">
            {{Form::label('telephone', 'Telephone')}}
            {{Form::text('telephone', $certificate->telephone, ['class' => 'form-control', 'placeholder' => 'telephone number'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('mobile', 'Mobile')}}
            {{Form::text('mobile', $certificate->mobile, ['class' => 'form-control', 'placeholder' => 'mobile number'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('emergencyContact', 'Emergency Contact')}}
            {{Form::text('emergencyContact', $certificate->emergencyContact, ['class' => 'form-control', 'placeholder' => 'emergency contact'])}}
        </div>
        </div>

        <hr class="mb-4">

        <div class="mb-3">
          {{Form::label('address', 'Permanent Address')}}
          {{Form::text('address', $certificate->address, ['class' => 'form-control', 'placeholder' => 'Permanent Address'])}}
        </div>

        <div class="mb-3">
          {{Form::label('address2', 'Present Address')}}
          {{Form::text('address2', $certificate->address2 , ['class' => 'form-control', 'placeholder' => 'Present Address'])}}
        </div>

        <div class="row">
        <div class="col-md-4 mb-3">
            {{Form::label('country', 'Country')}}
            {{Form::select('country', ['ind'=>'india','bd'=>'bangladesh'],  $certificate->country, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>

        <div class="col-md-4 mb-3">
            {{Form::label('state', 'State')}}
            {{Form::select('state', ['dk'=>'dhaka','bd'=>'bang'],  $certificate->state, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
        </div>
        <div class="col-md-4 mb-3">
            {{Form::label('zip', 'Zip code')}}
            {{Form::text('zip', $certificate->zip, ['class' => 'form-control', 'placeholder' => 'zip'])}}
            </div>
        </div>

        <hr class="mb-4">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary col-md-2 col-xs-2 col1 center-block'])}}
        {!! Form::close()!!}
        </div>
      </div>
    </div>
@endsection
  