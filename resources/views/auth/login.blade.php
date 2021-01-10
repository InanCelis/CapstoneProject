@extends('layouts.app')

@section('content')
<!-- Header -->
    <div class="header bg-gradient-dark py-7 py-lg-8">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class=" bg-transparent pb-2 my-4">
              <div class="text-center">
                <h1 class="text-dark">Login</h1>
                <p class="text-lead">Welcome! Let's get started!</p>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-2">
              <center>
                @if(session('error'))
                <strong class="text-danger text-sm">{{ session('error') }}</strong>
                @endif
                @if(session('success'))
                <strong class="text-success text-sm">{{ session('success') }}</strong>
                @endif
                
              </center>
              <form role="form" method="POST" action="{{ route('login') }}" >
                @csrf
              
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror  " placeholder="Email or Username" type="text" id="username" required autocomplete="email" autofocus name="username" value="{{ old('username') }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input  placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember">
                        <span class="text-muted">Remember Me</span>
                      </label>
                
                        @if (Route::has('password.request'))
                        <a class="btn btn-link my--2 pull-right" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">{{ __('Login') }}</button><br>
                </div><br>
                <div class="text-sm text-center">
                      <label>New User?</label>
                      <a href="/register" class="control-label ">
                        <span class="text-primary"><u>Register</u></span>
                      </a>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
