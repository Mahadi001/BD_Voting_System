@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Phone') }}</div>

                <div class="card-body">
                    @if (session('otpresent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh Login pin has been sent to your phone.') }}
                        </div>
                    @endif
                        <div class="text-center mb-4">
                            {{ __('Before proceeding, please check your phone for login pin.') }}
                            {{ __('If you did not receive the pin just wait 1 minute and then') }},
                            <form class="d-inline" method="POST" action="{{ route('otp.send') }}">
                                @csrf
                                <input type="hidden" name="nid" value="{{ request()->nid }}" />
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to resend pin') }}</button>.
                            </form>
                        </div>
                    
                    


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="nid" value="{{ request()->nid }}" />
                        <div class="form-group row">
                            <label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation PIN') }}</label>
                            <div class="col-md-6">
                                <input id="pin" type="pin" class="form-control @error('pin') is-invalid @enderror" name="pin" value="{{ old('pin') }}" required autocomplete="pin" autofocus>
                                @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection