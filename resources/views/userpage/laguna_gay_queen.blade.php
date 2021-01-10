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
      <div class="container-fluid mt--7">
         <div class="laman">
           @if($event_status == 'open')
             <div id="notice"> 
               {{-- status bar --}}
               @include('userpage.includes.status_bar')
               
               @if($event_user_status-> count() > 0)
                  <div class="card bg-white shadow">
                    <div class="card-body">
                      <h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Important notice:</h3>
                      <a href="{{ route('gay_queen.pdf') }}" target="_blank" class="btn btn-sm  btn-dark" ><i class="far fa-file-pdf text-danger"></i> PDF Application Form</a><br> <small>Congratulations! Please click the button to download your form and bring it on the audition time. This will disappear when the admin removes it.</small> 
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
                          <form id="laguna_gay_queen" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="form_name" id="form_name" value=" {{ __('#laguna_gay_queen') }}">
                              <input type="hidden" name="route_name" id="route_name" value=" {{ route('laguna-gay-queen.store')}}">
                              <div class="row">
                               <div class="col-lg-12">
                                <center>
                                    <label class="heading-large text-center  mb-4">ENTRY APPLICATION FORM</label>
                                    <h2 class="heading-large text-center  mb-4">LAGUNA GAY QUEEN {{ $currentyear = date('Y') }}</h2>
                                </center>
                               </div>
                              </div>
                              <div class="pl-lg-4" id="reload">
                                <div class="row">
                                    <div class="col-md-8">
                                      <div class="form-group">
                                          <label class="form-control-label" for="input-full-name">Full name</label>
                                          <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons text-dark">face</i></span>
                                            </div>
                                            <input class="form-control form-control-alternative " placeholder="Fullname" type="text" readonly value="{{ $user_info->first_name }} {{ $user_info->middle_name }} {{ $user_info->last_name }}">
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
                                            <input class="form-control form-control-alternative " placeholder="Fullname" type="text" readonly value="{{ $user_info->nick_name }}">
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
                                                <input class="form-control form-control-alternative " placeholder="Address" type="text" readonly value="Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna">
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
                                            <input class="form-control form-control-alternative " placeholder="Contact number" type="text" readonly value="{{ $user_info->contact }}">
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
                                            <input class="form-control form-control-alternative " placeholder="Email" type="text" readonly value="{{ $user_info->email }}">
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
                                            <input class="form-control form-control-alternative " placeholder="Birthdate" type="text" readonly value="{{ $user_info->birthdate}}">
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
                                            <input class="form-control form-control-alternative " placeholder="Age" type="text" readonly value="{{ \Carbon\Carbon::parse($user_info->birthdate)->age}}  years old">
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
                                            <input class="form-control form-control-alternative " placeholder="Birthplace" type="text" readonly required value="{{ $user_info->birthplace }}">
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="form-control-label" for="input-full-name">Tel. no. <i class="material-icons text-sm text-default" data-toggle="tooltip" data-placement="bottom" title="If this field is not applicable, please go to Account Settings.">info</i></label>
                                          <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons text-dark">phone</i></span>
                                            </div>
                                            <input class="form-control form-control-alternative" placeholder="Tel. no." type="text"  required value="{{ $user_info->telephone_number }}" readonly>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="form-control-label" for="input-full-name">Citizenship</label>
                                          <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons text-dark">flag</i></span>
                                            </div>
                                            <input class="form-control form-control-alternative" placeholder="Citizenship" type="text"  required value="{{ $user_info->citizenship }}" readonly>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                  
                                @if($registeruser -> count() > 0)
                                @foreach($registeruser as $registered)
                                    <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Height</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Height" type="number" step="any" required value="{{ $registered->height }}" name="height" id="height">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text bg-dark rounded-right text-white">cm</span>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Weight</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Weight" type="number" step="any"  required value="{{ $registered->weight }}" name="weight" id="weight">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text bg-dark rounded-right text-white">kg</span>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Color of Hair</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Color of Hair" type="text"  required value="{{ $registered->color_of_hair }}" name="color_of_hair" id="color_of_hair">
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Color of Eyes</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Color of Eyes" type="text"  required value="{{ $registered->color_of_eyes }}" name="color_of_eyes" id="color_of_eyes">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Special Hobbies/Talent</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Special Hobbies/Talent" type="text"  required value="{{ $registered->special_hobbies }}" name="special_hobbies" id="special_hobbies">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Occupation <i class="material-icons text-sm text-default" data-toggle="tooltip" data-placement="bottom" title="If this field is not applicable, please go to Account Settings.">info</i></label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Occupation" type="text"   value="{{ $user_info->work }}" readonly>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Employer</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Employer" type="text"  value="{{ $registered->employer }}" name="employer" id="employer">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">School <i class="material-icons text-sm text-default" data-toggle="tooltip" data-placement="bottom" title="If this field is not applicable, please go to Account Settings.">info</i></label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="School " type="text"   value="{{ $user_info->school }}" readonly>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Degree</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Degree" type="text"   value="{{ $registered->degree }}" name="degree" id="degree">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Father's name</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Father's name" type="text"   value="{{ $registered->father_name }}"  name="father_name" id="father_name">
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Occupation</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Occupation" type="text"   value="{{ $registered->father_occupation }}" name="father_occupation" id="father_occupation">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Mother's name</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Mother's name" type="text"   value="{{ $registered->mother_name }}" name="mother_name" id="mother_name">
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Occupation</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <input class="form-control form-control-alternative" placeholder="Occupation" type="text"   value="{{ $registered->mother_occupation }}" name="mother_occupation" id="mother_occupation">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                           <label class="form-control-label" for="input-school">Why do you wish to join LAGUNA GAY QUEEN {{ $currentyear }}?</label>
                                           <textarea rows="2" class="form-control form-control-alternative" placeholder="Why do you wish to join LAGUNA GAY QUEEN {{ $currentyear }}?" name="wish_to_join" id="wish_to_join">{{ $registered->wish_to_join }}</textarea>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                     <div class="col-md-8">
                                      <div class="form-group">
                                          <label class="form-control-label" for="input-full-name">ID Picture</label>
                                          <div class="input-group input-group-alternative mb-4">
                                            <input required class="form-control form-control-alternative bg-white"  type="file" readonly id="id_picture" name="id_picture" >
                                          </div>
                                       </div>

                                       <table class="table table-responsive">
                                           
                                          <tr>
                                            <th>Your ID</th>
                                            <th>Date Registered</th>
                                          </tr>
                                          <tr>
                                            <td>
                                                <a href="{{ asset('/user_id_picture') }}/{{ $registered->id_picture }}">
                                                <img src="{{ asset('/user_id_picture') }}/{{ $registered->id_picture }}" height="150px" width="140px" style="border: 1px solid gray">
                                                </a>
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($registered->created_at)->format('D - F d, Y h:i A')}}<br>
                                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($registered->created_at))->diffForHumans() }}
                                            </td>
                                          </tr>
                                      </table>
                                      
                                     </div><br><br>
                                      <button type="submit" class="btn btn-icon btn-3 btn-danger right btn-submit" type="button">
                                          <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                                          <span class="btn-inner--text">Update Registration</span>
                                      </button>
                                    </div>
                               @endforeach
                               @else
                                @include('userpage.includes.pageant')


                               @endif
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


