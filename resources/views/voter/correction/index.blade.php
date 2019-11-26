@extends('layouts.user-dashboard')
@section('user-content')
<div class="container">
    <div class="py-5 text-center">
      <h2>Birth Certificate Correction Form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    <div class="row">
      <div class="col-md-12 order-md-1">
      {!! Form::open(['method' => 'POST']) !!} 
      <div class="row">
      <div class="col-md-4 mb-3">
      {{Form::label('fname', 'First Name')}}
      {{Form::text('fname', $corrections, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
      </div>
      <div class="col-md-4 mb-3">
      {{Form::label('mname', 'Middle Name')}}
      {{Form::text('mname', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
      </div>
      <div class="col-md-4 mb-3">
      {{Form::label('lname', 'Last Name')}}
      {{Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('birthPlace', 'Place of Birth')}}
          {{Form::text('birthPlace', '', ['class' => 'form-control', 'placeholder' => 'Place of Birth'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('birthCountry', 'Country of Birth')}}
          {{Form::text('birthCountry', '', ['class' => 'form-control', 'placeholder' => 'Country of Birth'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('dateOfBirth', 'Date of Birth')}}
          {{Form::date('dateOfBirth', '', ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
      </div>
      </div>
      <hr class="mb-4">

      
      <div class="mb-3">
        {{Form::label('fathername', 'Full Name Of Father')}}
        {{Form::text('fathername', '', ['class' => 'form-control', 'placeholder' => 'Father Name'])}}
      </div>

      <div class="mb-3">
        {{Form::label('mothername', 'Full Name Of Mother')}}
        {{Form::text('mothername', '', ['class' => 'form-control', 'placeholder' => 'Mother Name'])}}
      </div>

      <hr class="mb-4">
  
      <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('height', 'Height')}}
          {{Form::text('height', '', ['class' => 'form-control', 'placeholder' => 'height'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('eyesColor', 'Color of eyes')}}
          {{Form::text('eyesColor', '', ['class' => 'form-control', 'placeholder' => 'Eyes color'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('sex', 'Sex')}}
          {{Form::text('sex', '', ['class' => 'form-control', 'placeholder' => 'Sex'])}}
      </div>
      </div>

      <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('telephone', 'Telephone')}}
          {{Form::text('telephone', '', ['class' => 'form-control', 'placeholder' => 'telephone number'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('mobile', 'Mobile')}}
          {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => 'mobile number'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('emergencyContact', 'Emergency Contact')}}
          {{Form::text('emergencyContact', '', ['class' => 'form-control', 'placeholder' => 'emergency contact'])}}
      </div>
      </div>

      <hr class="mb-4">

      <div class="mb-3">
        {{Form::label('address', 'Permanent Address')}}
        {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Permanent Address'])}}
      </div>

      <div class="mb-3">
        {{Form::label('address2', 'Present Address')}}
        {{Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Present Address'])}}
      </div>

      <div class="row">
      <div class="col-md-4 mb-3">
          {{Form::label('country', 'Country')}}
          {{Form::select('country', ['ind'=>'india','bd'=>'bangladesh'],  '', ['class' => 'form-control', 'placeholder' => 'Choose'])}}
      </div>

      <div class="col-md-4 mb-3">
          {{Form::label('state', 'State')}}
          {{Form::select('state', ['dk'=>'dhaka','bd'=>'bang'],  '', ['class' => 'form-control', 'placeholder' => 'Choose'])}}
      </div>
      <div class="col-md-4 mb-3">
          {{Form::label('zip', 'Zip code')}}
          {{Form::text('zip', '', ['class' => 'form-control', 'placeholder' => 'zip'])}}
          </div>
      </div>

      <hr class="mb-4">
          {{Form::hidden('_method','PUT')}}
          {{Form::submit('Request for Update', ['class' => 'btn btn-primary col-md-2 col-xs-2 col1 center-block'])}}
      {!! Form::close()!!}
      </div>
    </div>
  </div>

{{-- 
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/vendor/holder.min.js"></script>
  
  <script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker();
    });
</script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script> --}}
@endsection