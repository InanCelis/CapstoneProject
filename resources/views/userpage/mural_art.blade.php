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
             YDA - Laguna / Event Registration / {{ $pagename }}
            </div>
        </div>
      </div>
       
      <!-- Page content -->
      <div class="container-fluid mt--7 reload">
       <div class="laman">
       @if($event_status == 'open')
         <div id="notice">
            {{-- status bar --}}
            @include('userpage.includes.status_bar')
            
            @if($event_user_status-> count() > 0)
              <div class="card bg-white shadow">
                <div class="card-body">
                   <h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Important notice:</h3>
                   <a href="{{ route('mural-art.pdf') }}" target="_blank" class="btn btn-sm  btn-dark" ><i class="far fa-file-pdf text-danger"></i> PDF Application Form</a><br> <small>Congratulations! Please click the button to download your form and bring it on the audition time. This will disappear when the admin removes it.</small> 
                </div>
              </div>
            @endif

            @include('userpage.includes.remark')
            
         </div>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
              <div class="card bg-white shadow">
                  <div class="card-body">

                    @foreach($user as $user_info)
                    <form id="mural_form" method="POST" enctype="multipart/form-data">
                        @csrf
                     <input type="hidden" name="form_name" id="form_name" value=" {{ __('#mural_form') }}">
                     <input type="hidden" name="route_name" id="route_name" value=" {{ route('mural-art.store')}}">
                        <div class="row">
                         <div class="col-lg-12">
                          <center>
                              <label class="heading-large text-center  mb-4">ENTRY APPLICATION FORM</label>
                              <h2 class="heading-large text-center  mb-4">3D MURAL ART COMPETITION</h2>
                          </center>
                         </div>
                        </div>
                        <div class="pl-lg-4">
                          <div class="row">
                              <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Full name</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">face</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Fullname" type="text" readonly value="{{ $user_info->first_name }} {{ $user_info->middle_name }} {{ $user_info->last_name }}">
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Nickname</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">face</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Nickname" type="text" readonly value="{{ $user_info->nick_name }}">
                                    </div>
                                </div>
                              </div>
                          </div>

                          @foreach($user_info->tbl_address as $address)
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Address</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">place</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Address" type="text" readonly value="Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna">
                                    </div>
                                </div>
                              </div>
                          </div>
                          @endforeach

                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Contact number</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">phone</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Contact number" type="text" readonly value="{{ $user_info->contact }}">
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Email</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">email</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Email" type="text" readonly value="{{ $user_info->email }}">
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-7">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Birthdate</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">date_range </i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Birthdate" type="text" readonly  id="birthdate" value="{{ $user_info->birthdate}}">
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Age</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">cake </i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Age" type="text" readonly id="age" value="{{ \Carbon\Carbon::parse($user_info->birthdate)->age}}  years old">

                                      <p id="age"></p>
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">Birthplace</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">place</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="Birthplace" type="text" readonly required value="{{ $user_info->birthplace }}">
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              
                              <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">ID Picture</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <input class="form-control form-control-alternative bg-white" accept="image/*" type="file" readonly id="id_picture" name="id_picture" required>
                                    </div>
                                </div>

                                <table class="table table-responsive">
                                      @foreach($registeruser as $registered)
                                    <tr>
                                      <th>Your ID</th>
                                      <th>Date Registered</th>
                                    </tr>
                                    <tr>
                                      <td>
                                          <a href="{{ asset('/user_id_picture') }}/{{ $registered->id_picture }}">
                                          <img src="{{ asset('/user_id_picture') }}/{{ $registered->id_picture }}" height="150px" width="140px" style="border: 1px solid gray"></a>
                                      </td>
                                      <td>
                                           {{ \Carbon\Carbon::parse($registered->created_at)->format('D - F d, Y h:i A')}}<br>
                                           {{ \Carbon\Carbon::createFromTimeStamp(strtotime($registered->created_at))->diffForHumans() }}
                                      </td>
                                      @endforeach
                                    </tr>
                                </table>
                                <br>
                                
                              </div>
                              <button type="submit" class="btn btn-icon btn-3 btn-danger right btn-submit" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                                <span class="btn-inner--text">Submit Registration</span>
                              </button>
                          </div>
                        </div>
                    </form>
                    @endforeach
                  </div>
              </div>
            </div>
        </div>
        @else
         @include('userpage.includes.registration-close')
         <br>
       @endif
    </div>
      
        <!-- Footer -->
        @include('userpage.footer')
      </div>
  </div>



@include('userpage.scriptassets')
<script src="{{ asset('/js/update-applicant-status.js') }}"></script>
</body>
</html>
