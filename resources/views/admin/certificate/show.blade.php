@extends('layouts.dashboard')
@section('admin-content')
    <div class="container">
      <div class="py-5 text-center">
        <h2>Birth Certificate form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="{{$certificate->fname}}" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                  <label for="middleName">Middle name</label>
                  <input type="text" class="form-control" id="middleName" placeholder="" value="{{$certificate->mname}}" required="">
                  <div class="invalid-feedback">
                    Valid Middle name is required.
                  </div>
                </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="{{$certificate->lname}}" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="birthPlace">Place of Birth</label>
                  <input type="text" class="form-control" placeholder="" value="{{$certificate->birthPlace}}" required="">
                  <div class="invalid-feedback">
                    Valid Birth Place is required.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="birthCountry">Country of Birth</label>
                    <input type="text" class="form-control" placeholder="" value="{{$certificate->birthCountry}}" required="">
                    <div class="invalid-feedback">
                      Valid Country of Birth is required.
                    </div>
                  </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                      <label for="dateOfBirth">Date of Birth</label>
                          <input type='text' class="form-control" value="{{$certificate->dateOfBirth}}" id='datetimepicker4' />
                    </div>
                </div>
              </div>
  
              <hr class="mb-4">

            
            <div class="mb-3">
              <label for="fathername">Full Name Of Father</label>
              <input type="text" class="form-control" value="{{$certificate->fathername}}" placeholder="">
              <div class="invalid-feedback">
                Please enter Full Name Of your Father.
              </div>
            </div>

            <div class="mb-3">
              <label for="mothername">Full Name Of Mother</label>
              <input type="text" class="form-control" value="{{$certificate->mothername}}" placeholder="">
              <div class="invalid-feedback">
                Please enter Full Name Of your Mother.
              </div>
            </div>

              
            <hr class="mb-4">


              <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="height">Height</label>
                    <input type="text" class="form-control" placeholder="" value="{{$certificate->height}}" required="">
                    <div class="invalid-feedback">
                      Valid Height is required.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="eyesColor">Color of eyes</label>
                    <input type="text" class="form-control" id="eyesColor" placeholder="" value="{{$certificate->eyesColor}}" required="">
                    <div class="invalid-feedback">
                      Valid Color of eyes is required.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="sex">Sex</label>
                    <input type="text" class="form-control" id="sex" placeholder="" value="{{$certificate->sex}}" required="">
                    <div class="invalid-feedback">
                      Valid Sex is required.
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="telephone">Telephone<span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="telephone" placeholder="" value="{{$certificate->telephone}}" required="">
                      <div class="invalid-feedback">
                        Valid Telephone is required.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" id="mobile" placeholder="" value="{{$certificate->mobile}}" required="">
                      <div class="invalid-feedback">
                        Valid Mobile is required.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="emergencyContact">Emergency Contact</label>
                      <input type="text" class="form-control" id="emergencyContact" placeholder="" value="{{$certificate->emergencyContact}}" required="">
                      <div class="invalid-feedback">
                        Valid Emergency Contact is required.
                      </div>
                    </div>
                  </div>

                  
            <hr class="mb-4">

            <div class="mb-3">
              <label for="address">Permanent Address</label>
              <input type="text" class="form-control" value="{{$certificate->address}}" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Present Address</label>
              <input type="text" class="form-control" value="{{$certificate->address2}}">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <div class="mb-3">
                    <input type="text" class="form-control" value="{{$certificate->country}}">
                </div>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <input type="text" class="form-control" value="{{$certificate->state}}">
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" value="{{$certificate->zip}}" required="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button onclick="myFunction()" class="btn btn-success btn-lg center-block" type="submit">Print</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        function myFunction() {
            window.print();
        }
    </script>
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