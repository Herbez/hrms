@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label>Email *</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" class="form-control p_input @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group align-items-center justify-content-between">

                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        &nbsp;&nbsp;{{ __('Remember Me') }}

                    @if (Route::has('password.request'))
                        <a class="ml-4 text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Forgot your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Login') }}</button>
                </div>

                <p class="sign-up">Don't have an Account?
                    @if (Route::has('register'))
                        <a class="text-decoration-none" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    @endif
                </p>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection
