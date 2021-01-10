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
           YDA - Laguna / Training / {{ $pagename }}
          </div>
       </div>
     </div>
     <!-- Page content -->

     @foreach($user as $users)

      
     <div class="container-fluid mt--7" >
      <div id="notice">
      @if($registered_tesda-> count() > 0)
        <div class="card bg-white shadow">
          <div class="card-body">
            <h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Important notice:</h3>
            <a href="{{ route('tesda.pdf') }}" target="_blank" class="btn btn-sm  btn-dark" ><i class="far fa-file-pdf text-danger"></i> PDF Application Form</a><br> <small>Please download this form </small> 
          </div>
        </div>
      @endif

        @foreach($registered_tesda as $tesda)
         @if($tesda->remarks)
          <div class="card bg-white shadow">
            <div class="card-body">
              <h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Remark notice:</h3>
              <label class="text-dark text-sm"> {!! nl2br($tesda->remarks) !!} </label> <br>

              <a class="text-sm text-primary remove_remarks">Remove remarks</a>
            </div>
          </div>
         @endif
        @endforeach
      </div>
       <div class="row" >
          <div class="col-xl-12 order-xl-1" > 
            <div class="card bg-white shadow" >
               <div class="card-header bg-white border-0">
                 <img src="{{ asset('/images/tesda.png') }}" height="50px" width="50px">
                 <img src="{{ asset('/images/lagunalogo.png') }}" height="50px" width="50px">
                 <img src="{{ asset('/images/yda.png') }}" height="50px" width="50px">
                 <img src="{{ asset('/images/misl.png') }}" height="60px" width="50px">
                 <hr class="my-2">
                  <h2>Registration Form</h2>
               </div>
               <div class="card-body" >
                 <form id="add_training" method="POST" enctype="multipart/form-data">
                  @csrf
                    <h6 class="heading-small mb-4"><strong>Personal information</strong></h6>
                    <div class="pl-lg-4">
                      <div class="row">
                         <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Last name</label>
                              <input type="text" id="input-username" class="form-control form-control-alternative"  value="{{ $users->last_name }}" disabled>
                           </div>
                         </div>
                         <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-first-name">First name</label>
                              <input type="text" id="input-first-name"  class="form-control form-control-alternative" disabled value="{{ $users->first_name }}">
                           </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-middle-name">Middle name</label>
                              <input type="text" id="input-middle-name" class="form-control form-control-alternative"  value="{{ $users->middle_name }}" disabled>
                           </div>
                         </div>
                         <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-last-name">Sex</label>
                              <input type="text" id="input-last-name" class="form-control form-control-alternative"  value="{{ $users->gender }}" disabled>
                           </div>
                         </div>
                      </div>
                       @foreach($users->tbl_address as $address)
                        <div class="row">
                           <div class="col-lg-12">
                             <div class="form-group">
                                <label class="form-control-label" for="input-address-name">Address</label>
                                <input type="text" id="input-address-name" class="form-control form-control-alternative" placeholder="First name" value="Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna" disabled>
                             </div>
                           </div>
                        </div>
                      @endforeach
                      <div class="row">
                         <div class="col-lg-8">
                           <div class="form-group">
                              <label class="form-control-label" for="input-birthdate">Birthdate</label>
                              <input type="text" id="input-birthdate" class="form-control form-control-alternative" value="{{ $users->birthdate}}" disabled>
                           </div>
                         </div>
                         <div class="col-lg-4">
                           <div class="form-group">
                              <label class="form-control-label" for="input-age">Age</label>
                              <input type="text" id="input-age" class="form-control form-control-alternative" value="{{ \Carbon\Carbon::parse($users->birthdate)->age}}  years old" disabled>
                           </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-lg-12">
                           <div class="form-group">
                              <label class="form-control-label" for="input-birth-place">Place of Birth</label>
                              <input type="text" id="input-birth-place" class="form-control form-control-alternative" placeholder="First name" value="{{ $users->birthplace }}" disabled>
                           </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-contact">Contact number</label>
                              <input type="text" id="input-contact" class="form-control form-control-alternative" value="{{ $users->contact }}" disabled>
                           </div>
                         </div>
                         <div class="col-lg-6">
                           <div class="form-group">
                              <label class="form-control-label" for="input-civil-status">Civil Status</label>
                              <input type="text" id="input-civil-status" class="form-control form-control-alternative" value="{{ $users->civil_status }}" disabled>
                           </div>
                         </div>
                      </div>
                    </div>
                    <div id="reload">
                    @if($registered_tesda -> count() > 0)
                      @foreach($registered_tesda as $tesda)
                        <hr class="my-4" />
                        <h6 class="heading-small mb-4"><strong>Educational Background</strong></h6>
                        <div class="pl-lg-4">
                          {{-- elementary --}}
                          <label class="heading-small text-muted mb-4"><b><u>Primary / Elementary</u></b>  </label>
                          <div class="row">
                             <div class="col-lg-6">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-elem-name">Name of School</label>
                                  <input type="text" id="input-elem-name" class="form-control form-control-alternative" placeholder="Name of School" name="elementary_name" value="{{ $tesda->elementary_name }}">
                               </div>
                             </div>
                             
                             <div class="col-lg-2">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-elem-year">Year Graduated</label>
                                  <input type="number" min="1900" max="2099" step="1" id="input-elem-year" class="form-control form-control-alternative" placeholder="Year" name="elementary_year" value="{{ $tesda->elementary_year }}">
                               </div>
                             </div>
                             <div class="col-lg-4">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-elem-acad">Academic Honor Recieved</label>
                                  <input type="text" id="input-elem-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="elementary_academic" value="{{ $tesda->elementary_academic }}">
                               </div>
                             </div>
                          </div>
                          {{-- highschool --}}
                          <label class="heading-small text-muted mb-4"><b><u>Secondary / Highschool</u></b>  </label>
                          <div class="row">
                             <div class="col-lg-6">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-sec-name">Name of School</label>
                                  <input type="text" id="input-sec-name" class="form-control form-control-alternative" placeholder="Name of School" name="secondary_name" value="{{ $tesda->secondary_name }}">
                               </div>
                             </div>
                             <div class="col-lg-2">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-sec-year">Year Graduated</label>
                                  <input type="number" min="1900" max="2099" step="1" id="input-sec-year" class="form-control form-control-alternative" placeholder="Year" name="secondary_year" value="{{ $tesda->secondary_year }}">
                               </div>
                             </div>
                             <div class="col-lg-4">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-sec-acad">Academic Honor Recieved</label>
                                  <input type="text" id="input-sec-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="secondary_academic" value="{{ $tesda->secondary_academic }}">
                               </div>
                             </div>
                          </div>
                          {{-- vocational --}}
                          <label class="heading-small text-muted mb-4"><b><u>Vocational Course</u></b>  </label>
                          <div class="row">
                             <div class="col-lg-6">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-voc-name">Name of School</label>
                                  <input type="text" id="input-voc-name" class="form-control form-control-alternative" placeholder="Name of School" name="vocational_name" value="{{ $tesda->vocational_name }}">
                               </div>
                             </div>
                             <div class="col-lg-2">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-voc-year">Year Graduated</label>
                                  <input type="number" min="1900" max="2099" step="1" id="input-voc-year" class="form-control form-control-alternative" placeholder="Year" name="vocational_year" value="{{ $tesda->vocational_year }}">
                               </div>
                             </div>
                             <div class="col-lg-4">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-voc-acad">Academic Honor Recieved</label>
                                  <input type="text" id="input-voc-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="vocational_academic" value="{{ $tesda->vocational_academic }}">
                               </div>
                             </div>
                          </div>
                          {{-- college --}}
                          <label class="heading-small text-muted mb-4"><b><u>College</u></b>  </label>
                          <div class="row">
                             <div class="col-lg-6">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-college-name">Name of School</label>
                                  <input type="text" id="input-college-name" class="form-control form-control-alternative" placeholder="Name of School" name="college_name" value="{{ $tesda->college_name }}">
                               </div>
                             </div>
                             <div class="col-lg-2">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-college-year">Year Graduated</label>
                                  <input type="number" min="1900" max="2099" step="1" id="input-college-year" class="form-control form-control-alternative" placeholder="Year" name="college_year" value="{{ $tesda->college_year }}">
                               </div>
                             </div>
                             <div class="col-lg-4">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-college-acad">Academic Honor Recieved</label>
                                  <input type="text" id="input-college-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="college_academic" value="{{ $tesda->college_academic }}">
                               </div>
                             </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small mb-4"><strong>Emergency Information</strong></h6>
                        <div class="pl-lg-4">
                          <div class="row">
                             <div class="col-lg-5">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-contact-person">Name of Person to be contact</label>
                                  <input type="text" id="input-contact-person" class="form-control form-control-alternative" placeholder="Name of Person to be contact" name="contact_person" required value="{{ $tesda->contact_person }}">
                               </div>
                             </div>
                             <div class="col-lg-7">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-contact-address">His/Her Address</label>
                                  <input type="text" id="input-contact-address" class="form-control form-control-alternative" placeholder="His/Her Address" name="contact_address" required value="{{ $tesda->contact_address }}">
                               </div>
                             </div>
                          </div>
                        </div>
                         <hr class="my-4" />
                        <h6 class="heading-small mb-4"><strong>Questions</strong></h6>
                        <div class="pl-lg-4">
                          <div class="row">
                             <div class="col-lg-12">
                               <div class="form-group">
                                  <label class="form-control-label" for="input-school-name">Are you student or an out-of-school youth? (Ikaw ba ay isang estudyante o isang hindi na nag-aaral na kabataan?)</label>
                                  <div class="custom-control custom-radio mb-4">
                                    <input name="student_or_out_of_school" class="custom-control-input" id="student" type="radio" value="Student" required {{ ($tesda->student=="Student")? "checked" : "" }}>
                                    <label class="custom-control-label" for="student">Student (Estudyante)</label> 
                                  </div>
                                  <div class="custom-control custom-radio mb-4">
                                    <input name="student_or_out_of_school" class="custom-control-input" id="outofschool" type="radio" value="Out of School" required {{ ($tesda->student=="Out of School")? "checked" : "" }}>
                                    <label class="custom-control-label" for="outofschool">Out of School (Hindi na nag-aaral)</label>
                                  </div>
                               </div>
                             </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small mb-4"><strong>Computer Background</strong></h6>
                        <div class="pl-lg-4">
                          <label class="heading-small text-muted mb-4"><b>5 Being the highest and 1 being the lowest / 5 pinaka mataas at 1 pinaka mababa.</b>  </label>
                          <div class="row">
                           <div class="col-lg-4">
                             <div class="form-group">
                               <label class="form-control-label" for="input-ms-office">Microsoft Office</label>
                                <select class="form-control" name="microsoft_office" id="input-ms-office" required>
                                   <option value="5" {{ ($tesda->microsoft_office=="5")? "selected" : "" }}>5</option>
                                   <option value="4" {{ ($tesda->microsoft_office=="4")? "selected" : "" }}>4</option>
                                   <option value="3" {{ ($tesda->microsoft_office=="3")? "selected" : "" }}>3</option>
                                   <option value="2" {{ ($tesda->microsoft_office=="2")? "selected" : "" }}>2</option>
                                   <option value="1" {{ ($tesda->microsoft_office=="1")? "selected" : "" }}>1</option>
                                </select>
                             </div>
                           </div>
                           <div class="col-lg-4">
                             <div class="form-group">
                               <label class="form-control-label" for="input-excel">Microsoft Excel</label>
                                <select class="form-control" name="microsoft_excel" id="input-excel" required>
                                   <option value="5" {{ ($tesda->microsoft_excel=="5")? "selected" : "" }}>5</option>
                                   <option value="4" {{ ($tesda->microsoft_excel=="4")? "selected" : "" }}>4</option>
                                   <option value="3" {{ ($tesda->microsoft_excel=="3")? "selected" : "" }}>3</option>
                                   <option value="2" {{ ($tesda->microsoft_excel=="2")? "selected" : "" }}>2</option>
                                   <option value="1" {{ ($tesda->microsoft_excel=="1")? "selected" : "" }}>1</option>
                                </select>
                             </div>
                           </div>
                           <div class="col-lg-4">
                             <div class="form-group">
                               <label class="form-control-label" for="input-powerpoint">Powerpoint Presentation</label>
                                <select class="form-control" name="powerpoint" id="input-powerpoint" required>
                                   <option value="5" {{ ($tesda->powerpoint=="5")? "selected" : "" }}>5</option>
                                   <option value="4" {{ ($tesda->powerpoint=="4")? "selected" : "" }}>4</option>
                                   <option value="3" {{ ($tesda->powerpoint=="3")? "selected" : "" }}>3</option>
                                   <option value="2" {{ ($tesda->powerpoint=="2")? "selected" : "" }}>2</option>
                                   <option value="1" {{ ($tesda->powerpoint=="1")? "selected" : "" }}>1</option>
                                </select>
                             </div>
                           </div>
                          </div>
                          <div class="row">
                             <div class="col-lg-6">
                             <div class="form-group">
                               <label class="form-control-label" for="input-photoshop">Adobe Photoshop</label>
                                <select class="form-control" name="adobe_photoshop" id="input-photoshop" required>
                                   <option value="5" {{ ($tesda->adobe_photoshop=="5")? "selected" : "" }}>5</option>
                                   <option value="4" {{ ($tesda->adobe_photoshop=="4")? "selected" : "" }}>4</option>
                                   <option value="3" {{ ($tesda->adobe_photoshop=="3")? "selected" : "" }}>3</option>
                                   <option value="2" {{ ($tesda->adobe_photoshop=="2")? "selected" : "" }}>2</option>
                                   <option value="1" {{ ($tesda->adobe_photoshop=="1")? "selected" : "" }}>1</option>
                                </select>
                             </div>
                           </div>
                           <div class="col-lg-6">
                             <div class="form-group">
                               <label class="form-control-label" for="input-adobe-premiere">Adobe Premiere</label>
                                <select class="form-control" name="adobe_premiere" id="input-adobe-premiere" required>
                                   <option value="5" {{ ($tesda->adobe_premiere=="5")? "selected" : "" }}>5</option>
                                   <option value="4" {{ ($tesda->adobe_premiere=="4")? "selected" : "" }}>4</option>
                                   <option value="3" {{ ($tesda->adobe_premiere=="3")? "selected" : "" }}>3</option>
                                   <option value="2" {{ ($tesda->adobe_premiere=="2")? "selected" : "" }}>2</option>
                                   <option value="1" {{ ($tesda->adobe_premiere=="1")? "selected" : "" }}>1</option>
                                </select>
                             </div>
                           </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small mb-4"><strong>Others</strong></h6>
                        <div class="pl-lg-4">
                          <div class="row">
                             <div class="col-lg-12">
                               <div class="form-group">
                                <label class="form-control-label" for="input-school">others please specify</label>
                                <textarea rows="2" maxlength="70" class="form-control form-control-alternative" name="other_specify" placeholder="others please specify">{{ $tesda->other_specify }}</textarea>
                               </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-lg-5">
                              <div class="form-group">
                                <label class="form-control-label" for="user_picture">Picture(2x2 white background and formal)</label>
                                <div class="input-group input-group-alternative mb-4">
                                  <input class="form-control form-control-alternative bg-white"  type="file" accept="image/*"  id="user_picture" name="picture" >
                                </div>
                             </div>
                               <div class="form-group">
                                  <label class="form-control-label" for="user_picture">Picture(2x2 white background and formal)</label><br>
                                  <a href="{{ asset('/tesda_pictures') }}/{{ $tesda->user_picture }}">
                                   <img src="{{ asset('/tesda_pictures') }}/{{ $tesda->user_picture }}" height="100px" width="100px" style="border: 1px solid gray"></a>
                               </div>
                               <div class="form-group">
                                  <label class="form-control-label" for="input-school-name">Choose preffered schedule</label>
                                  <div class="custom-control custom-radio mb-4">
                                    <input name="schedule" class="custom-control-input" id="weekend" type="radio" value="Weekend" required {{ ($tesda->schedule=="Weekend")? "checked" : "" }}>
                                    <label class="custom-control-label" for="weekend">Weekend</label> 
                                  </div>
                                  <div class="custom-control custom-radio mb-4">
                                    <input name="schedule" class="custom-control-input" id="weekdays" type="radio" value="Weekdays" required {{ ($tesda->schedule=="Weekdays")? "checked" : "" }}>
                                    <label class="custom-control-label" for="weekdays">Weekdays</label>
                                  </div>
                               </div>
                             </div>
                             <div class="col-lg-7" id="tesdabutton">
                              <br><br>
                              @if($tesda->tesda_status == 1)
                               <button type="submit" class="btn btn-icon btn-3 btn-primary right btn-submit" type="button">
                                 <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                                 <span class="btn-inner--text">Update Info</span>
                               </button>
                               @endif
                            </div>
                          </div>
                        </div>
                      @endforeach
                     @else
                     @include('userpage.includes.tesda-extension')
                    @endif  
                    </div>
                 </form>
               </div>
            </div>
          </div>
       </div><br>
  
   
       <!-- Footer -->
      @include('userpage.footer')
     </div>
     @endforeach
  </div>



@include('userpage.scriptassets')
<script src="{{ asset('/js/tesda.js') }}"></script>
</body>
</html>