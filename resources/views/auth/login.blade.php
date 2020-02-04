@extends('layouts.auth')

@section('content')
<div class="text-center">
    <p class="mb-2">
        <i class="fa fa-2x fa-circle-notch text-primary"></i>
    </p>
    <h1 class="h4 mb-1">
        Sign In
    </h1>
    <h2 class="h6 font-w400 text-muted mb-3">
        A perfect match for your project
    </h2>
</div>

  <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="py-3">
      <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg form-control-alt"
         name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail login">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg form-control-alt"
        name="password" required autocomplete="current-password" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group">
          <div class="d-md-flex align-items-md-center justify-content-md-between">
              <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label font-w400" for="remember">{{ __('Remember Me') }}</label>
              </div>
              <div class="py-2">
                @if (Route::has('password.request'))
                  <a class="font-size-sm" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif
              </div>
          </div>
      </div>
    </div>
    <div class="form-group row justify-content-center mb-0">
        <div class="col-md-6 col-xl-5">
            <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
            </button>
        </div>
    </div>

  </form>

@endsection
