@include('userpage.cssassets')
<body>

<!-- Main content -->

@include('userpage.mainnav')
<div class="main-content">
  @include('userpage.secondnav')
   
    <!-- Header -->
  
    <div class="header  pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" style="margin-top: -25px">
         YDA - Laguna / {{ $pagename }}
        </div>
      </div>
    </div>
    <!-- Page content -->
    @foreach($user as $user)

    <div class="container mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile shadow">
             <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Change Username <i class="material-icons text-sm text-dark pull-right">email</i></h3>
                </div>
              </div>
            </div>
            <div class="card-body">
             <form id="updateUsername" method="POST">
                @csrf
               <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="username">Username</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" id="username" placeholder="Username" value="{{ $user->username }}" type="text" required name="username">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-sm text-dark">email</i></span>
                          </div>
                        </div>
                        <small class="text-danger h5" id="usernamevalidator"></small>
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-sm btn-icon btn-3 btn-primary right btn-submit"  disabled>
                      <span class="btn-inner--text">Save username</span>
                    </button>
                  </div>
                </div>
             </form>
            </div>
          </div>
          <br>
          <div class="card card-profile shadow">
             <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Change Password <i class="material-icons text-sm text-dark pull-right">lock</i></h3>
                </div>
              </div>
            </div>
            <div class="card-body">
             <form id="updatepassword" method="POST">
                @csrf
               <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="old-password">Old Password</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" id="old-password" name="old_password" placeholder="Old Password" type="password"  required>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-sm text-dark">lock</i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">New Password</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" placeholder="New Password" type="password"  name="password" required>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-sm text-dark">lock</i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Confirm</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" placeholder="Confirm" type="password"  name="password_confirmation" required>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-sm text-dark">lock</i></span>
                          </div>
                        </div>
                        <small class="text-danger h5" id="passwordvalidator"></small>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-icon btn-3 btn-primary right btn-submit"  disabled>
                      <span class="btn-inner--text">Save password</span>
                    </button>
                    {{-- <a class="text-sm forgot_password text-blue w-100" >Forgot password?</a> --}}
                  </div>
                </div>
             </form>
            </div>
          </div>
          <div class="card-header bg-white border-0" id="resetpassword" style="display: none;">
            
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-white shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Manage Account <i class="far fa-address-card pull-right" ></i></h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form id="updateprofileInfo" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">Personal information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="first-name">First name</label>
                        <input type="text" id="first-name" class="form-control form-control-alternative" value="{{ $user->first_name }}" placeholder="First name" name="first_name" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="last-name">Last name</label>
                        <input type="text" id="last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{ $user->last_name }}" name="last_name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="middle-name">Middle name</label>
                        <input type="text" id="middle-name" class="form-control form-control-alternative" placeholder="Middlename" value="{{ $user->middle_name }}" name="middle_name" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="nick-name">Nick name</label>
                        <input type="text" id="nick-name" class="form-control form-control-alternative" placeholder="Nick name" value="{{ $user->nick_name }}" name="nick_name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                     <div class="form-group">
                      <label class="form-control-label">Gender</label>
                       <select class="form-control" required name="gender">
                        <option value="{{ $user->gender }}" selected="">{{ $user->gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                     </div>
                    </div>
                   <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-control-label">Civil Status</label>
                       <select class="form-control" name="civil_status" required>
                         <option selected="" value="{{ $user->civil_status }}">{{ $user->civil_status }}</option>
                         <option value="Single">Single</option>
                         <option value="Married">Married</option>
                         <option value="Divorced">Divorced</option>
                         <option value="Separated">Separated</option>
                         <option value="Widowed">Widowed</option>
                       </select>
                    </div>
                   </div>
                   <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="age">Age</label>
                        <input type="text" id="age" class="form-control form-control-alternative" placeholder="Age" name="age" value="{{ \Carbon\Carbon::parse($user->birthdate)->age}}  years old" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="birth-date">Birthdate</label>
                        <input type="date" id="birth-name" class="form-control form-control-alternative" placeholder="First name" name="birthdate" value="{{ \Carbon\Carbon::parse($user->birthdate)->format('Y-m-d')}}" required>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="birth-place">Birthplace</label>
                        <input type="text" id="birth-place" class="form-control form-control-alternative" placeholder="Birthplace" name="birthplace" value="{{ $user->birthplace }}" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-lg-6">
                    <div class="form-group">
                      <label>Telephone number</label>
                        <input id="telephone_number" type="tel" class="form-control form-control-alternative " name="telephone_number" value="{{ $user->telephone_number}}"  autocomplete="telephone_number" autofocus placeholder="Telephone number">
                     </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label>Citizenship</label>
                        <input id="citizenship" type="text" class="form-control form-control-alternative  " name="citizenship" value="{{ $user->citizenship }}"  autocomplete="citizenship" autofocus placeholder="Citizenship" required>
                     </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact Information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Contact Number</label>
                        <input type="text"  class="form-control form-control-alternative" placeholder="Contact" value="{{ $user->contact }}" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Contact"  value="{{ $user->email }}" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Location</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label">Town / Municipality </label>
                          <select class="form-control input-group-alternative mb-3 " name="town" id="town" required autocomplete="town" autofocus>
                            @foreach($user->tbl_address as $address)
                            <option  selected="" value="{{  $address->tbl_barangay->tbl_town->id }}" >{{  $address->tbl_barangay->tbl_town->town_name }}</option>
                            @endforeach

                            @foreach($towns as $town)
                            <option value="{{ $town->id }}">{{ $town->town_name }}</option>
                            @endforeach

                          </select>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label">Barangay </label>
                          <select class="form-control input-group-alternative mb-3" name="barangay" id="barangay" required autocomplete="barangay" autofocus>
                           @foreach($user->tbl_address as $address)
                            <option selected="" value="{{  $address->tbl_barangay->id }}">{{  $address->tbl_barangay->barangay_name }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                     <div class="form-group">
                      <label class="form-control-label" for="input-province">Province</label>
                       <select class="form-control" >
                        <option disabled="" selected="Laguna">Laguna</option>
                      </select>
                     </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                       <label class="form-control-label" for="work">Work</label>
                       <input type="text" id="work" class="form-control form-control-alternative" placeholder="Work" name="work" value="{{ $user->work }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                       <label class="form-control-label" for="work-position">Work Position</label>
                       <input type="text" id="work-position" class="form-control form-control-alternative" placeholder="Work Position" name="work_position" value="{{ $user->work_position }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                       <label class="form-control-label" for="input-school">School</label>
                       <input type="text" id="input-school" class="form-control form-control-alternative" placeholder="School" name="school" value="{{ $user->school }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                       <label class="form-control-label" for="bio">Bio</label>
                       <textarea id="bio" rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..." name="bio">{{ $user->bio }}</textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-icon btn-3 btn-primary right btn-sm btn-submit" type="button" disabled>
                      <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                      <span class="btn-inner--text ">Save information</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><br><br>
      
   
      <!-- Footer -->
      @include('userpage.footer')
    </div>
     @endforeach
  </div>

@include('userpage.scriptassets')
<script src="{{ asset('/js/account_setting.js') }}"></script>
@include('userpage.modals.modal_loader')


@if(Session::has('success'))
  <script type="text/javascript">
    toastr.success('Personal information successfully updated.', 'Successfully!', {timeOut:3000, progressBar:true});
  </script>
@endif
@if(Session::has('success_username'))
  <script type="text/javascript">
    toastr.success('Username successfully updated.', 'Successfully!', {timeOut:3000, progressBar:true});
  </script>
@endif
@if(Session::has('success_password'))
  <script type="text/javascript">
    toastr.success('Password successfully updated.', 'Successfully!', {timeOut:3000, progressBar:true});
  </script>
@endif
</body>
</html>

