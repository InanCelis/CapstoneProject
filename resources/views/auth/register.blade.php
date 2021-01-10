@extends('layouts.app')

@section('content')

<!-- Header -->
    <div class="header bg-dark py-7 py-lg-8">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <br>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-8"> 
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-3">
              <div class="col-lg-5 col-md-6">
                <h1 class="text-dark">Register Account!</h1>
                <p class="text-lead text-dark">This information will let us know more about you.</p>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-2">
                
              <form role="form" method="POST" action="{{ route('register') }}">
                 @csrf
                 <h2><b>Note: </b><label class="h4 mr-2"> All fields marked with an asterisk (<b class="text-danger">*</b>) are required. </label></h2>
                <div class="text-muted mt-2 mb-4"><h2>Personal Information</h2></div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>First name<b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First name">

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label>Middle name<b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus placeholder="Middle name">

                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                   <div class="col-md-4">
                    <div class="form-group">
                      <label>Last name<b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last  name">

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-md-4">
                    <div class="form-group">
                      <label>Nickname<b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="nick_name" type="text" class="form-control @error('nick_name') is-invalid @enderror" name="nick_name" value="{{ old('nick_name') }}" required autocomplete="nick_name" autofocus placeholder="Nickname">

                            @error('nick_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Gender<b class="text-danger">*</b></label>
                          <select class="form-control input-group-alternative mb-3  @error('gender') is-invalid @enderror" name="gender" id="gender"  autocomplete="gender" autofocus required="">
                            <option disabled="" selected="">- Gender -</option>
                            <option value="Male" @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
                            <option value="Female" @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                          </select>
                          @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Civil Status <b class="text-danger">*</b></label>
                          <select class="form-control input-group-alternative mb-3  @error('civil_status') is-invalid @enderror" name="civil_status" id="civil_status" required autocomplete="civil_status" autofocus>
                            <option disabled="" selected="">- Civil Status -</option>
                            <option value="Single" @if (old('civil_status') == "Single") {{ 'selected' }} @endif>Single</option>
                            <option value="Married" @if (old('civil_status') == "Married") {{ 'selected' }} @endif>Married</option>
                            <option value="Divorced" @if (old('civil_status') == "Divorced") {{ 'selected' }} @endif>Divorced</option>
                            <option value="Separated" @if (old('civil_status') == "Separated") {{ 'selected' }} @endif>Separated</option>
                            <option value="Widowed" @if (old('civil_status') == "Widowed") {{ 'selected' }} @endif>Widowed</option>
                          </select>
                          @error('civil_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Birthdate<b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus placeholder="Birthdate">

                            @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                   
                    <div class="col-md-6">
                     <div class="form-group">
                      <label>Birth Place<b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ old('birthplace') }}" required autocomplete="birthplace" autofocus placeholder="Birth Place">

                            @error('birthplace')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                  </div>
                 

                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label>Telephone number</label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="telephone_number" type="tel" class="form-control @error('telephone_number') is-invalid @enderror" name="telephone_number" value="{{ old('telephone_number') }}"  autocomplete="telephone_number" autofocus placeholder="Telephone number">

                            @error('telephone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Citizenship <b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="citizenship" type="text" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" value="{{ old('citizenship') }}" required autocomplete="citizenship" autofocus placeholder="Citizenship">

                            @error('citizenship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                     </div>
                    </div>
                  </div>
                  <div class="text-muted  mt-2 mb-4"><h2>Contact Information</h2></div>
                  <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                      <label>Contact number <b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus placeholder="+639xxxxxxxxx" maxlength="13">

                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(session('existingnumber'))
                               <span  class="invalid-feedback" role="alert">{{ session('existingnumber') }}</span>
                            @endif
                      </div>
                     </div>
                    </div>
                    <div class="col-md-6">
                     <div class="form-group">
                      <label>Email <b class="text-danger">*</b></label>
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    </div>
                  </div>

                  <div class="text-muted  mt-2 mb-4"><h2>Location</h2></div>
                  <div class="row">
                   <div class="col-md-4">
                    <div class="form-group">
                      <label>Province</label>
                      <div class="input-group input-group-alternative mb-3">
                        <input id="province" type="text" class="form-control" name="province" value="Laguna" required  autofocus disabled ="">
                      </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Town / Municipality <b class="text-danger">*</b></label>
                          <select class="form-control input-group-alternative mb-3  @error('town') is-invalid @enderror" name="town" id="town" required autocomplete="town" autofocus>
                            <option disabled="" selected="">- Town / Municipality -</option>
                            @foreach($towns as $town)
                            <option value="{{ $town -> id }}">{{ $town -> town_name }}</option>
                            @endforeach
                          </select>
                          @error('town')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Barangay <b class="text-danger">*</b></label>
                          <select class="form-control input-group-alternative mb-3  @error('barangay') is-invalid @enderror" name="barangay" id="barangay" required autocomplete="barangay" autofocus>
                           
                          </select>
                          
                          @error('barangay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                  </div>

                <div class="text-muted  mt-2 mb-4"><h2>Account(<b class="text-danger">*</b>)</h2></div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" placeholder="Username" value="{{ old('username') }}">

                        @error('username')
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" value="{{ old('password') }}">

                        @error('password')
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
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                  </div>
                </div>
                
                {{-- <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div> --}}
                
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">{{ __('Register') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
