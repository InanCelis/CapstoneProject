@include('userpage.cssassets')

<body class="body">

<!-- Main content -->

@include('userpage.mainnav')
<div class="main-content">
  @include('userpage.secondnav')
  
   <!-- Header -->
   <div class="header  pb-8 pt-5 pt-md-8"> 
     <div class="container-fluid">
      <div class="header-body" style="margin-top: -35px">
       YDA - Laguna / {{ $pagename }} / New Applicant<br>
      </div>
     </div>
   </div>
   <!-- Page content -->
   <div class="container-fluid mt--7"> 
     <div class="row">
      <div class="col-xl-12 order-xl-1 my--3">
        <div id="notice">
          @foreach($accreditation as $registered)
            @if($registered->remarks )
              <div class="card bg-white shadow">
                <div class="card-body">
                  <h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Remark notice:</h3>
                  <label class="text-dark text-sm"> {!! nl2br($registered->remarks) !!} </label> <br>

                  <a class="text-sm text-primary remove_accreditation_remarks" id="{{ $registered->id }}">Remove remarks</a>
                </div>
              </div>
            @endif
          @endforeach 
        </div>
        <div class="card bg-white shadow">
            <div class="card-body" id="refresh"> 
              
                @if(count($accreditation))
                  @foreach($user as $user_info)
                    @foreach($accreditation as $accreditation)
                    <h2>{{ $accreditation->name }}</h2>
                    @if($accreditation->status == 0)
                      <h2 class="heading-large text-center  mb-4">APPLICATION FOR ACCREDITATION</h2><br>
                      <form id="update_info" method="POST" enctype="multipart/form-data">
                          @csrf
                        <div id="reload">
                          <div class="row">
                              <div class="col-md-7">
                                <div class="form-group">
                                    <label class="form-control-label" for="organization">Name of Organization</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <input class="form-control form-control-alternative bg-white" placeholder="Name of Organization" type="text" name="name_of_organization" id="organization"  required  value="{{ $accreditation->name }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-full-name">President</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="material-icons text-dark">face</i></span>
                                      </div>
                                      <input class="form-control form-control-alternative bg-white" placeholder="President" type="text" readonly value="{{ $user_info->first_name }} {{ $user_info->last_name }}">
                                    </div>
                                </div>
                              </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">Contact number</label>
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
                                  <label class="form-control-label">Email</label>
                                  <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons text-dark">email</i></span>
                                    </div>
                                    <input class="form-control form-control-alternative bg-white" placeholder="Email" type="text" readonly  value="{{ $user_info->email }}">
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="town">Town/Origin</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <input class="form-control form-control-alternative bg-white" placeholder="Town/Origin" type="text" required  name="town" id="town" value="{{ $accreditation->town }}" >
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="type">Type of Organization</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <input class="form-control form-control-alternative bg-white" placeholder="Type of Organization" type="text" required  name="type_of_organization" id="type"  value="{{ $accreditation->type }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="members">Number of Members</label>
                                    <div class="input-group input-group-alternative mb-4">
                                      <input class="form-control form-control-alternative bg-white" placeholder="Number of Members" type="number"  required name="number_of_members" id="members"  value="{{ $accreditation->member }}">
                                    </div>
                                 </div>
                              </div>
                          </div>
                          <br>
                        <h4 class="my-2">Requirements: <p class="pull-right btn btn-sm btn-danger  text-sm text-white showinputreq" id="editbutton" style="cursor: pointer;">Edit Requirements</p></h4><br>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="intent">Letter of Intent</label> 
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->letter_of_intent }}" class="text-center">
                                    <i class="{{ $icons[substr($accreditation->letter_of_intent, + 16)] }} display-3"></i> 
                                    <br><small>{{ $accreditation->letter_of_intent }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements" style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Letter of Intent" type="file" name="letter_of_intent" id="intent" >
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="organizational_structure">Organizational Structure</label>
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->organizational_structure }}" class="text-center">
                                    <i class="{{ $icons[substr($accreditation->organizational_structure, + 16)] }} display-3"></i> 
                                    <br><small>{{ $accreditation->organizational_structure }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements" style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Organizational Structure" type="file" name="organizational_structure" id="organizational_structure" >
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="roster_of_members">Roster of Members</label>
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->roster_of_member }}" class="text-center">
                                    <i class="{{ $icons[substr($accreditation->roster_of_member, + 16)] }} display-3"></i> 
                                    <br><small>{{ $accreditation->roster_of_member }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements"   style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Roster of Members" type="file" name="roster_of_members" id="roster_of_members" >
                                </div>
                             </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="organizational_profile">Organizational Profile</label>
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->organizational_profile }}" class="text-center">
                                    <i class="{{ $icons[substr($accreditation->organizational_profile, + 16)] }} display-3"></i> 
                                    <br><small>{{ $accreditation->organizational_profile }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements"  style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Organizational Profile" type="file" name="organizational_profile" id="organizational_profile" >
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="bylaws">Bylaws</label>
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->bylaws }}" class="text-center">
                                    <i class="{{ $icons[substr($accreditation->bylaws, + 16)] }} display-3"></i> 
                                    <br><small>{{ $accreditation->bylaws }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements"  style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Bylaws" type="file" name="bylaws" id="bylaws" >
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="prog_and_proj">Prog. and Proj. for existing year</label>
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->program_and_project }}" class="text-center">
                                    <i class="{{ $icons[substr($accreditation->program_and_project, + 16)] }} display-3"></i> 
                                    <br><small>{{ $accreditation->program_and_project }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements"  style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Prog. and Proj. for existing year" type="file" name="prog_and_proj" id="prog_and_proj" >
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="logo">Logo of Organization</label>
                                <div class="text-center bg-secondary">
                                  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->logo }}" class="text-center">
                                    <img src="{{ asset('/accreditation_file') }}/{{ $accreditation->logo }}" height="70px" width="70px">
                                    <br><small>{{ $accreditation->logo }}</small>
                                  </a>
                                </div>
                                <div class="input-group input-group-alternative mb-4 edit_requirements"  style="display: none">
                                  <input class="form-control form-control-alternative bg-white lamanngfile" placeholder="Logo" type="file" accept="image/*" name="logo" id="logo" >
                                </div>
                             </div>
                          </div>
                        </div>
                        <br>
                          <button type="submit" class="btn btn-icon btn-3 btn-primary pull-right btn-submit" type="button">
                            <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                            <span class="btn-inner--text">Update Registration</span>
                          </button>
                       </div>
                      </form>
                      @elseif($accreditation->status == 1)
                         @include('userpage.includes.accreditation_message')

                      @elseif($accreditation->status == 2)

                      @include('userpage.includes.accreditation_message')
                       <h2 class="text-danger"><strong>Warning:</strong> <small>Accreditation expired. You need to renew your requirements.</small> </h2>

                      @elseif($accreditation->status == 3)
                        <h2 class="text-danger"><strong>Notice:</strong> <small>Your renewal application is for approval</small> </h2>

                      @elseif($accreditation->status == 4)
                        <h2 class="text-danger"><strong>Warning:</strong> <small>Application Denied.</small> </h2>
                
                        
                    @endif
                      
                    @endforeach
                  @endforeach






                @else
                  
                  @foreach($user as $user_info)
                    <h2 class="heading-large text-center  mb-4">APPLICATION FOR ACCREDITATION</h2><br>
                    <form id="add_accreditation" method="POST" enctype="multipart/form-data">
                      @csrf
                     <div id="reload">
                      <div class="row">
                          <div class="col-md-7">
                            <div class="form-group">
                                <label class="form-control-label" for="organization">Name of Organization</label>
                                <div class="input-group input-group-alternative mb-4">
                                  <input class="form-control form-control-alternative bg-white" placeholder="Name of Organization" type="text" name="name_of_organization" id="organization" required>
                                </div>
                             </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-control-label" for="input-full-name">President</label>
                                <div class="input-group input-group-alternative mb-4">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="material-icons text-dark">face</i></span>
                                  </div>
                                  <input class="form-control form-control-alternative bg-white" placeholder="President" type="text" readonly value="{{ $user_info->first_name }} {{ $user_info->last_name }}">
                                </div>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-control-label">Contact number</label>
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
                              <label class="form-control-label">Email</label>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="town">Town/Origin</label>
                                <div class="input-group input-group-alternative mb-4">
                                  <input class="form-control form-control-alternative bg-white" placeholder="Town/Origin" type="text" name="town" id="town" required>
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="type">Type of Organization</label>
                                <div class="input-group input-group-alternative mb-4">
                                  <input class="form-control form-control-alternative bg-white" placeholder="Type of Organization" type="text" name="type_of_organization" id="type" required>
                                </div>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="members">Number of Members</label>
                                <div class="input-group input-group-alternative mb-4">
                                  <input class="form-control form-control-alternative bg-white" placeholder="Number of Members" type="number" name="number_of_members" id="members" required>
                                </div>
                             </div>
                          </div>
                      </div>
                      <h4 class="my-2">Requirements:</h4><br>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="intent">Letter of Intent</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Letter of Intent" type="file" name="letter_of_intent" id="intent" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="organizational_structure">Organizational Structure</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Organizational Structure" type="file" name="organizational_structure" id="organizational_structure" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="roster_of_members">Roster of Members</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Roster of Members" type="file" name="roster_of_members" id="roster_of_members" required>
                              </div>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="organizational_profile">Organizational Profile</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Organizational Profile" type="file" name="organizational_profile" id="organizational_profile" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="bylaws">Bylaws</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Bylaws" type="file" name="bylaws" id="bylaws" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="prog_and_proj">Prog. and Proj. for existing year</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Prog. and Proj. for existing year" type="file" name="prog_and_proj" id="prog_and_proj" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="form-control-label" for="logo">Logo of Organization</label>
                              <div class="input-group input-group-alternative mb-4">
                                <input class="form-control form-control-alternative bg-white" placeholder="Logo" type="file" accept="image/*" name="logo" id="logo" required>
                              </div>
                           </div>
                        </div><br>
                        <button type="submit" class="btn btn-icon btn-3 btn-primary right btn-submit" type="button">
                          <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                          <span class="btn-inner--text">Submit Registration</span>
                        </button>
                      </div>
                     </div>
                    </form>
                  
                  @endforeach
                @endif
        
              
            </div>
        </div>
      </div>
     </div>
   
     <!-- Footer -->
     @include('userpage.footer')
   </div>
  </div>


@include('userpage.scriptassets')
<script src="{{ asset('/js/accreditation.js') }}"></script>
{{-- loading --}}
@include('userpage.modals.modal_loader')


</body>
</html>