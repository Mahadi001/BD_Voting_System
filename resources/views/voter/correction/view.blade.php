@extends('layouts.user-dashboard')
@section('user-content')

<div class="container">
    <div class="py-5 text-center">
      <h2>Birth Certificate form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    <div class="row">
      <div class="col-md-12 order-md-1">
      <div class="mb-3">
        {{Form::label('bid', 'Birth Certificate Id')}}
        {{Form::text('bid', $view->bid, ['class' => 'form-control', 'placeholder' => 'Birth Certificate Id'])}}
      </div>
      <hr class="mb-4">
      <div class="row">
      <div class="col-md-4 mb-3">
      {{Form::label('fname', 'First Name')}}
      {{Form::text('fname', $view->fname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
      </div>
      <div class="col-md-4 mb-3">
      {{Form::label('mname', 'Middle Name')}}
      {{Form::text('mname', $view->mname, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
      </div>
      <div class="col-md-4 mb-3">
      {{Form::label('lname', 'Last Name')}}
      {{Form::text('lname', $view->lname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('birthPlace', 'Place of Birth')}}
          {{Form::text('birthPlace', $view->birthPlace, ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('birthCountry', 'Country of Birth')}}
          {{Form::text('birthCountry', $view->birthCountry, ['class' => 'form-control', 'placeholder' => 'Country of Birth'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('dateOfBirth', 'Date of Birth')}}
          {{Form::date('dateOfBirth', $view->dateOfBirth, ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
      </div>
      </div>
      <hr class="mb-4">

      
      <div class="mb-3">
        {{Form::label('fathername', 'Full Name Of Father')}}
        {{Form::text('fathername', $view->fathername, ['class' => 'form-control', 'placeholder' => 'Father Name'])}}
      </div>

      <div class="mb-3">
        {{Form::label('mothername', 'Full Name Of Mother')}}
        {{Form::text('mothername', $view->mothername, ['class' => 'form-control', 'placeholder' => 'Mother Name'])}}
      </div>

      <hr class="mb-4">
  
      <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('height', 'Height')}}
          {{Form::text('height', $view->height, ['class' => 'form-control', 'placeholder' => 'height'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('eyesColor', 'Color of eyes')}}
          {{Form::text('eyesColor', $view->eyesColor, ['class' => 'form-control', 'placeholder' => 'Eyes color'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('sex', 'Sex')}}
          {{Form::text('sex', $view->sex, ['class' => 'form-control', 'placeholder' => 'Sex'])}}
      </div>
      </div>

      <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('telephone', 'Telephone')}}
          {{Form::text('telephone', $view->telephone, ['class' => 'form-control', 'placeholder' => 'telephone number'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('mobile', 'Mobile')}}
          {{Form::text('mobile', $view->mobile, ['class' => 'form-control', 'placeholder' => 'mobile number'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('emergencyContact', 'Emergency Contact')}}
          {{Form::text('emergencyContact', $view->emergencyContact, ['class' => 'form-control', 'placeholder' => 'emergency contact'])}}
      </div>
      </div>

      <hr class="mb-4">

      <div class="mb-3">
        {{Form::label('address', 'Permanent Address')}}
        {{Form::text('address', $view->address, ['class' => 'form-control', 'placeholder' => 'Permanent Address'])}}
      </div>

      <div class="mb-3">
        {{Form::label('address2', 'Present Address')}}
        {{Form::text('address2', $view->address2 , ['class' => 'form-control', 'placeholder' => 'Present Address'])}}
      </div>

      <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('country', 'Country')}}
          {{Form::select('country', ['ind'=>'india','bd'=>'bangladesh'],  $view->country, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
      </div>

      <div class="col-md-4 mb-3">
          {{Form::label('state', 'State')}}
          {{Form::select('state', ['d'=>'dhaka','bd'=>'bang'],  $view->state, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('zip', 'Zip code')}}
          {{Form::text('zip', $view->zip, ['class' => 'form-control', 'placeholder' => 'zip'])}}
          </div>
      </div>

      <hr class="mb-4">
      </div>
    </div>
  </div>


  @endsection