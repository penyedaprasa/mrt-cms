@extends('layouts.auth')

@section('content')
<div class="text-center">
    <p class="mb-2">
        <i class="fa fa-2x fa-circle-notch text-primary"></i>
    </p>
    <h1 class="h4 mb-1">
        {{ __('Register') }}
    </h1>
    <h2 class="h6 font-w400 text-muted mb-3">
        Register New User
    </h2>
</div>

<form class="js-validation-signup" method="POST" action="{{ route('register') }}">
    @csrf
<div class="py-3">
    <div class="form-group">
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror form-control-lg form-control-alt"
       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your name">

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg form-control-alt"
       name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your E-mail">

      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg form-control-alt"
       name="password" required autocomplete="new-password" placeholder="Your password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
        <input id="password-confirm" type="password" class="form-control form-control-lg form-control-alt" name="password_confirmation"
        required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
    </div>


    <div class="form-group">
      <div class="d-md-flex align-items-md-center justify-content-md-between">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
              <label class="custom-control-label font-w400" for="signup-terms">I agree to Terms &amp; Conditions</label>
          </div>
          <div class="py-2">
              <a class="font-size-sm" href="javascript:void(0)" data-toggle="modal" data-target="#one-signup-terms">View Terms</a>
          </div>
      </div>
  </div>
  <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary btn-block btn-success">
            <i class="fa fa-fw fa-plus mr-1"></i>  {{ __('Register') }}
          </button>
      </div>
  </div>
</div>
</form>
@endsection
