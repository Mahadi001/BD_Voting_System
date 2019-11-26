@extends('layouts.dashboard')
@section('admin-content')
<div class="container">
        <div class="py-5 text-center">
          <h2>Create Vote</h2>
          <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
  
        
        <div class="row">
          <div class="col-md-12 order-md-1">
          {!! Form::open(['action' => 'CertificateController@store', 'method' => 'POST']) !!} 
          
        <div class="mb-3">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <hr class="mb-4">
              
      <div class="mb-3">
        {{Form::label('political__parties', 'Location')}}
      </div>
    <div class="row">
      <div class="col-md-6 mb-3">
          {{Form::label('division', 'Division')}}
          {{Form::select('division', ['B' => 'Bangladesh'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
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
          {{Form::label('district', 'District')}}
          {{Form::select('district', ['D' => 'Dhaka'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}
      </div>
    </div>

    <hr class="mb-4">

    <div class="mb-3">
      {{Form::label('political__parties', 'Select Political Parties')}}
    </div>
    <div class="mb-3">
            {{Form::radio('name', 'value')}}
            {{Form::label('name', 'Name' )}}
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
        <div class="row">
          <div class="col-md-6 mb-3">
            {{Form::label('starting_date', 'Starting Date')}}
            {{Form::date('starting_date', '', ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
          </div>
          <div class="col-md-6 mb-3">
            {{Form::label('ending_date', 'Ending Date')}}
            {{Form::date('ending_date', '', ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
          </div>
        </div>
        <div class="row">
                <div class="col-md-6 mb-3">
                  {{Form::label('starting_time', 'Starting Time')}}
                  {{Form::time('starting_time', '', ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
                </div>
                <div class="col-md-6 mb-3">
                  {{Form::label('ending_time', 'Ending Time')}}
                  {{Form::time('ending_time', '', ['class' => 'form-control', 'placeholder' => '\Carbon\Carbon::now()'])}}
                </div>
              </div>
        <hr class="mb-4">
        {{Form::submit('Submit', ['class' => 'btn btn-primary col-md-2 col-xs-2 col1 center-block'])}}
        {!! Form::close() !!}
        </div>
      </div>
      </div>
  
  
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
      </script>
@endsection