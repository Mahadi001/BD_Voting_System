@extends('layouts.user')
@section('user-content')

<div class="container">
      <div class="py-5 text-center">
        <h2>Apply for Correction Birth Certificate</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class=" mb-3">
        {{Form::label('bid', 'Birth Certificate Id')}}
        {{Form::text('bid', $certificate->bid, [ 'readonly'=>'readonly', 'class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
        {!! Form::open(['route' => ['correction.apply'], 'method' => 'POST', 'id'=>'form']) !!} 
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
        {{Form::text('address2', $certificate->address2, ['class' => 'form-control', 'placeholder' => 'Present Address'])}}
      </div>

      <div class="row">

        <div class="col-md-4 mb-3">
            <label for="division">Division</label>
            <select name="division" id="division" class="form-control">
                <option value="" >select division</option>
                @foreach($divisions as $division)
                    <option value="{{$division->id}}" @if($certificate->division_id == $division->id) {{'selected'}} @endif> {{$division->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="district">District</label>
          <select name="district" id="district" class="form-control">
              <option value="{{$certificate->district->id}}" >{{$certificate->district->name}}</option>
          </select>
      </div>
        <div class="col-md-4 mb-3">
          <label for="upazilla">Upazilla</label>
          <select name="upazilla" id="upazilla" class="form-control">
            <option value="{{$certificate->upazilla->id}}" >{{$certificate->upazilla->name}}</option>
          </select>
      </div>
      
      <div class="col-md-6 mb-3">
          <label>RMO Type</label>
          <div>
              <div class="form-check form-check-inline">
                  <input name="rmo" @if($certificate->rmo_type == 'polli'){{'checked'}}@endif value="polli" id="polli" class="form-check-input" type="radio">
                  <label class="form-check-label" for="polli">polli</label>
                </div>
                <div class="form-check form-check-inline">
                  <input name="rmo" @if($certificate->rmo_type == 'city'){{'checked'}}@endif value="city"  id="city" class="form-check-input" type="radio" >
                  <label class="form-check-label" for="city">city</label>
                </div>
          </div>
      </div>
      <div class="col-md-6 mb-3">
          <label>Selected RMO</label>
          <select class="form-control" name="municipality" id="rmoOption" >
            <option value="{{$certificate->rmo->id}}" >{{$certificate->rmo->name}}</option>
          </select>
      </div>
     
      <div class="col-md-12 mb-3">
          <label for="unionORward">Union/ Ward</label>
          <select name="unionORward" id="unionORward" class="form-control">
            <option value="{{$certificate->union->id}}" >{{$certificate->union->name}}</option>
          </select>
      </div>
     
      <input type="hidden" name="constituencies_id" value="" id="constituencies"/>

      <hr class="mb-4">
      {{Form::submit('Submit', ['class' => 'btn btn-primary col-md-2 col-xs-2 col1 center-block'])}}
      {!! Form::close() !!}
      </div>
    </div>
    </div>


    
@endsection
@push('script')
<script>
  $(document).ready(function () {
      $("#division").change( function () {
          var division = $(this).val();
          $.ajax({
              type: "GET",
              url: "{{route('division_to_district')}}",
              data: { division: division },
              beforeSend: function(){
                $("#district").html('');
                $("#upazilla").html('');
                $("#constituencies").val('');
                $("#unionORward").html('');
                $("#rmoOption").html('');
                $("input[type=radio][name=rmo]").prop("checked", false);
              }
          }).done(function (data) {
              console.log(data);
              $("#district").html(data.districts);
          });
      
      });
      $("#district").change( function () {
          var district = $(this).val();
          $.ajax({
              type: "GET",
              url: "{{route('district_to_upazilla')}}",
              data: { district: district }
          }).done(function (data) {
              console.log(data);
              $("#upazilla").html(data.upazila);
          });
      });
      $("#unionORward").change( function () {
          var union = $(this).val();
          $.ajax({
              type: "GET",
              url: "{{route('union_to_constituencies')}}",
              data: { union: union }
          }).done(function (data) {
              console.log(data);
              $("#constituencies").val(data);
          });
      });

      $("input[type=radio][name=rmo]").change( function () {
          var rmo = $(this).val();
          var division = $("#division").val();
          var district = $("#district").val();
          var upazila  = $("#upazilla").val();
          
          $.ajax({
              type: "GET",
              url: "{{route('division_district_upazilla_rmo_to_union')}}",
              data: { division: division, district: district, upazila: upazila, rmo: rmo }
          }).done(function (data) {
              console.log(data);
              $("#unionORward").html(data.unionsHtmls);
              $("#rmoOption").html("");
              if(data.rmoHtml){
                  $("#rmoOption").html(data.rmoHtml);
              }
          });
      });


  });
  </script>

@endpush
  