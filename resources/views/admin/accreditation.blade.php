@include('admin.cssassets')

<body >
  <!-- Sidenav -->
  @include('userpage.mainnav')
  <!-- Main content -->
  <div class="main-content">
     @include('userpage.secondnav')
     <!-- Header -->
     <div class="header pb-8 pt-5 pt-md-8"> 
       <div class="container-fluid">
          <div class="header-body">
            <div class="header-body" style="margin-top: -25px">
             YDA - Laguna / Accreditation / {{ $pagename }}
            </div>
          </div>
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--7">
       <h2 class="text-right">{{ $pagename }}</h2>
       <div class="row" id="counting"> 
           <!-- Card stats --><br>
            <div class="col-xl-3 col-lg-6" >
               <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
                 <div class="card-body">
                    <div class="row">
                      <div class="col">
                         <h5 class="card-title text-uppercase text-muted mb-0">Pending Applicants</h5>
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($accreditation->where('status', 0))) }}</span>
                      </div>
                      <div class="col-auto">
                         <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                           <i class="fas fa-user-clock"></i>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
            </div>
            
            <div class="col-xl-3 col-lg-6">
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #2dce89">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">Accredited</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($accreditation->where('status', 1))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                              <i class="fas fa-group"></i>
                           </div>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
               <div class="col-xl-3 col-lg-6">
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #f5365c">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">For Renewal / Expired</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($accreditation->where('status', 2))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                              <i class="fas fa-exclamation-triangle"></i>
                           </div>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
               <div class="col-xl-3 col-lg-6">
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #5e72e4">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">For Approval of Renewal</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($accreditation->where('status', 3))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                              <i class="fas fa-user-check"></i>
                           </div>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
           </div>
           <br>
            <input type="hidden" id="updatenum" value="">
           <div class="nav-wrapper my--4">
                <ul class="nav nav-pills nav-fill " id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active text-dark" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-user-clock mr-2"></i>Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 text-dark" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-group mr-2"></i>Accredited</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 text-dark" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-exclamation-triangle mr-2"></i>For Renewal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 text-dark" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="fas fa-user-check mr-2"></i>For Approval</a>
                    </li>
                </ul>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                            <div class="row my--3">
                             <div class="card-header border-0">
                               <h3 class="mb-0">
                                  <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                                    <i class="fas fa-user-clock"></i>
                                  </div> 
                                  Pending Applicants
                               </h3>
                             </div>
                             <div class="table-responsive container">
                               <table class="table align-items-center " id="pendingaccreditation">
                                  <thead class="thead-light">
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Name of Organization</th>
                                       <th scope="col">President</th>
                                       <th scope="col">Town/Origin</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Date Registered</th>
                                       <th scope="col">Action</th>
                                       
                                    </tr>
                                  </thead>
                                  <tbody>
                                @php $count1 = 1; @endphp
                               @foreach($accreditation->where('status', 0) as $accreditation_0)
                                  
                                    <tr>
                                       <td>{{ $count1++ }}.</td>
                                       <td>{{ $accreditation_0->name }}</td>
                                       <th scope="row">
                                         <a href="/profile/{{ $accreditation_0->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                         <div class="media align-items-center">
                                            @if(isset($accreditation_0->user->profile_picture) && $accreditation_0->user->profile_picture !="none")
                                              <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                               <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $accreditation_0->user->profile_picture }}" height="35px" width="35px">
                                               </span>
                                               @else
                                               <span class="avatar avatar-sm rounded-circle {{ $accreditation_0->user->color_profile }}" style="text-transform: uppercase;">
                                               {{ Str::limit($accreditation_0->user->first_name ,1,'').Str::limit($accreditation_0->user->last_name ,1,'') }}
                                               </span>
                                              @endif
                                            <div class="media-body">
                                              <span class="mb-0 text-sm text-dark">&nbsp; {{ $accreditation_0->user->first_name }} {{ $accreditation_0->user->last_name }}</span>
                                            </div>
                                         </div>
                                         </a>
                                       </th>
                                       <td>{{ $accreditation_0->town }}</td>
                                       <td>{{ $accreditation_0->type }}</td>
                                       <td>
                                         {{ \Carbon\Carbon::parse($accreditation_0->created_at)->format('M d, Y h:i A')}}
                                       </td>
                                       
                                     
                                       <td class="text-right">
                                         <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                              <a class="dropdown-item" href="/admin/accreditation/view/{{ $accreditation_0->id }}"><i class="far fa-eye text-success"></i>View</a>
                                              <a class="dropdown-item accred_remark" id="{{ $accreditation_0->user_id }}"><i class="fas fa-marker"></i>Add remarks</a> 
                                              <hr class="my-1">
                                              <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                              <a onclick="updateto_1()" class="dropdown-item update-stat" id="{{ $accreditation_0->user_id }}" ><i class="fas fa-group mr-2"></i> Accredited List</a>
                                              <a onclick="updateto_4()" class="dropdown-item update-stat" id="{{ $accreditation_0->user_id }}"><i class="fas fa-archive"></i> Archived </a>
                                            </div>
                                         </div>
                                       </td>
                                    </tr>
                               @endforeach

                                  </tbody>
                               </table>
                             </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <div class="row my--3">
                             <div class="card-header border-0">
                               <h3 class="mb-0">
                                  <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-group"></i>
                                 </div>
                                  Accredited
                               </h3>
                             </div>
                             <div class="table-responsive container">
                               <table class="table align-items-center " id="accredited">
                                  <thead class="thead-light">
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Name of Organization</th>
                                       <th scope="col">President</th>
                                       <th scope="col">Town/Origin</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Members</th>
                                       <th scope="col">Date Accredited</th>
                                       <th scope="col">Date of Expiration</th>
                                       <th scope="col">Action</th>
                                       
                                    </tr>
                                  </thead>
                                  <tbody>
                                @php $count1 = 1; @endphp
                               @foreach($accreditation->where('status', 1)->sortBy('date_of_expiration') as $accreditation_1)
                                  
                                    <tr>
                                       <td>{{ $count1++ }}.</td>
                                       <td>{{ $accreditation_1->name }}</td>
                                       <th scope="row">
                                         <a href="/profile/{{ $accreditation_1->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                         <div class="media align-items-center">
                                            @if(isset($accreditation_1->user->profile_picture) && $accreditation_1->user->profile_picture !="none")
                                              <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                               <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $accreditation_1->user->profile_picture }}" height="35px" width="35px">
                                               </span>
                                               @else
                                               <span class="avatar avatar-sm rounded-circle {{ $accreditation_1->user->color_profile }}" style="text-transform: uppercase;">
                                               {{ Str::limit($accreditation_1->user->first_name ,1,'').Str::limit($accreditation_1->user->last_name ,1,'') }}
                                               </span>
                                              @endif
                                            <div class="media-body">
                                              <span class="mb-0 text-sm text-dark">&nbsp; {{ $accreditation_1->user->first_name }} {{ $accreditation_1->user->last_name }}</span>
                                            </div>
                                         </div>
                                         </a>
                                       </th>
                                       <td>{{ $accreditation_1->town }}</td>
                                       <td>{{ $accreditation_1->type }}</td>
                                       <td class="text-center">{{ $accreditation_1->member}}</td>
                                       <td class="text-center">{{ $accreditation_1->date_accredited }}</td>
                                       <td class="text-center">{{ $accreditation_1->date_of_expiration }}</td>
                                       
                                     
                                       <td class="text-right">
                                         <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                              <a class="dropdown-item" href="/admin/accreditation/view/{{ $accreditation_1->id }}"><i class="far fa-eye text-success"></i>View</a>
                                              <a class="dropdown-item accred_remark" id="{{ $accreditation_1->user_id }}"><i class="fas fa-marker"></i>Add remarks</a> 
                                              <hr class="my-1">
                                              <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                              <a onclick="updateto_0()" class="dropdown-item update-stat" id="{{ $accreditation_1->user_id }}" ><i class="fas fa-user-clock"></i> Pending</a>
                                              <a onclick="updateto_2()" class="dropdown-item update-stat" id="{{ $accreditation_1->user_id }}" ><i class="fas fa-exclamation-triangle"></i> For Renewal</a>
                                              <a onclick="updateto_4()" class="dropdown-item update-stat" id="{{ $accreditation_1->user_id }}"><i class="fas fa-archive"></i> Archived </a>
                                            </div>
                                         </div>
                                       </td>
                                    </tr>
                               @endforeach

                                  </tbody>
                               </table>
                             </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                            <div class="row my--3">
                             <div class="card-header border-0">
                               <h3 class="mb-0">
                                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-exclamation-triangle"></i>
                                 </div>
                                  For Renewal / Expired
                               </h3>
                             </div>
                             <div class="table-responsive container">
                               <table class="table align-items-center " id="expired">
                                  <thead class="thead-light">
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Name of Organization</th>
                                       <th scope="col">President</th>
                                       <th scope="col">Town/Origin</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Members</th>
                                       <th scope="col">Date Accredited</th>
                                       <th scope="col">Date of Expiration</th>
                                       <th scope="col">Action</th>
                                       
                                    </tr>
                                  </thead>
                                  <tbody>
                                @php $count1 = 1; @endphp
                               @foreach($accreditation->where('status', 2)->sortBy('date_of_expiration') as $accreditation_2)
                                  
                                    <tr>
                                       <td>{{ $count1++ }}.</td>
                                       <td>{{ $accreditation_2->name }}</td>
                                       <th scope="row">
                                         <a href="/profile/{{ $accreditation_2->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                         <div class="media align-items-center">
                                            @if(isset($accreditation_2->user->profile_picture) && $accreditation_2->user->profile_picture !="none")
                                              <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                               <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $accreditation_2->user->profile_picture }}" height="35px" width="35px">
                                               </span>
                                               @else
                                               <span class="avatar avatar-sm rounded-circle {{ $accreditation_2->user->color_profile }}" style="text-transform: uppercase;">
                                               {{ Str::limit($accreditation_2->user->first_name ,1,'').Str::limit($accreditation_2->user->last_name ,1,'') }}
                                               </span>
                                              @endif
                                            <div class="media-body">
                                              <span class="mb-0 text-sm text-dark">&nbsp; {{ $accreditation_2->user->first_name }} {{ $accreditation_2->user->last_name }}</span>
                                            </div>
                                         </div>
                                         </a>
                                       </th>
                                       <td>{{ $accreditation_2->town }}</td>
                                       <td>{{ $accreditation_2->type }}</td>
                                       <td class="text-center">{{ $accreditation_2->member}}</td>
                                       <td class="text-center">{{ $accreditation_2->date_accredited }}</td>
                                       <td class="text-center">{{ $accreditation_2->date_of_expiration }}</td>
                                       
                                     
                                       <td class="text-right">
                                         <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                              <a class="dropdown-item" href="/admin/accreditation/view/{{ $accreditation_2->id }}"><i class="far fa-eye text-success"></i>View</a>
                                              <a class="dropdown-item accred_remark" id="{{ $accreditation_2->user_id }}"><i class="fas fa-marker"></i>Add remarks</a> 
                                              <hr class="my-1">
                                              <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                              <a onclick="updateto_1()" class="dropdown-item update-stat" id="{{ $accreditation_2->user_id }}" ><i class="fas fa-group mr-2"></i> Accredited List</a>
                                              <a onclick="updateto_4()" class="dropdown-item update-stat" id="{{ $accreditation_2->user_id }}"><i class="fas fa-archive"></i> Archived </a>
                                            </div>
                                         </div>
                                       </td>
                                    </tr>
                               @endforeach

                                  </tbody>
                               </table>
                             </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                         <div class="row my--3">
                           <div class="card-header border-0">
                             <h3 class="mb-0">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                For Approval of Renewal
                             </h3>
                           </div>
                           <div class="table-responsive container">
                             <table class="table align-items-center " id="approval">
                                <thead class="thead-light">
                                  <tr>
                                     <th scope="col">No.</th>
                                     <th scope="col">Name of Organization</th>
                                     <th scope="col">President</th>
                                     <th scope="col">Town/Origin</th>
                                     <th scope="col">Type</th>
                                     <th scope="col">Members</th>
                                     <th scope="col">Date Renewed</th>
                                     <th scope="col">Date Accredited</th>
                                     <th scope="col">Date of Expiration</th>
                                     <th scope="col">Action</th>
                                     
                                  </tr>
                                </thead>
                                <tbody>
                              @php $count1 = 1; @endphp
                             @foreach($accreditation->where('status', 3)->sortBy('updated_at') as $accreditation_3)
                                
                                  <tr>
                                     <td>{{ $count1++ }}.</td>
                                     <td>{{ $accreditation_3->name }}</td>
                                     <th scope="row">
                                       <a href="/profile/{{ $accreditation_3->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                       <div class="media align-items-center">
                                          @if(isset($accreditation_3->user->profile_picture) && $accreditation_3->user->profile_picture !="none")
                                            <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                             <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $accreditation_3->user->profile_picture }}" height="35px" width="35px">
                                             </span>
                                             @else
                                             <span class="avatar avatar-sm rounded-circle {{ $accreditation_3->user->color_profile }}" style="text-transform: uppercase;">
                                             {{ Str::limit($accreditation_3->user->first_name ,1,'').Str::limit($accreditation_3->user->last_name ,1,'') }}
                                             </span>
                                            @endif
                                          <div class="media-body">
                                            <span class="mb-0 text-sm text-dark">&nbsp; {{ $accreditation_3->user->first_name }} {{ $accreditation_3->user->last_name }}</span>
                                          </div>
                                       </div>
                                       </a>
                                     </th>
                                     <td>{{ $accreditation_3->town }}</td>
                                     <td>{{ $accreditation_3->type }}</td>
                                     <td class="text-center">{{ $accreditation_3->member}}</td>
                                     <td class="text-center">{{ \Carbon\Carbon::parse($accreditation_3->updated)->format('M d, Y h:i A')}}</td>
                                     <td class="text-center">{{ $accreditation_3->date_accredited }}</td>
                                     <td class="text-center">{{ $accreditation_3->date_of_expiration }}</td>
                                     
                                   
                                     <td class="text-right">
                                       <div class="dropdown">
                                          <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                            <a class="dropdown-item" href="/admin/accreditation/view/{{ $accreditation_3->id }}"><i class="far fa-eye text-success"></i>View</a>
                                            <a class="dropdown-item accred_remark" id="{{ $accreditation_3->user_id }}"><i class="fas fa-marker"></i>Add remarks</a> 
                                            <hr class="my-1">
                                            <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                            <a onclick="updateto_1()" class="dropdown-item update-stat" id="{{ $accreditation_3->user_id }}" ><i class="fas fa-group mr-2"></i> Accredited List</a>
                                            <a onclick="updateto_4()" class="dropdown-item update-stat" id="{{ $accreditation_3->user_id }}"><i class="fas fa-archive"></i> Archived </a>
                                          </div>
                                       </div>
                                     </td>
                                  </tr>
                             @endforeach

                                </tbody>
                             </table>
                           </div>
                         </div>
                        </div>
                    </div>
                </div>
            </div><br>
       
        </div>
     </div>
  
     <!-- ADD remark -->
  <div class="modal fade bg-dark" id="accred_remark_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Add remark</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="remark_accred" method="POST">
          <div class="modal-body ">
             @csrf
             <input type="hidden" name="" id="accred_userid">
             <div class="row">
               <div class="col-lg-12">
                 <div class="form-group">
                  <label class="form-control-label" for="input-school">Remark</label>
                  <textarea rows="8 " class="form-control form-control-alternative" name="remark" placeholder="Remark" required></textarea>
                 </div>
               </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm btn-submit"><i class="ni ni-send"></i> send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
   @include('admin.scriptassets') 
   <script src="{{ asset('/js/accreditation.js') }}"></script>
   @include('userpage.modals.modal_loader')

</body>
</html>




