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
             YDA - Laguna / Event Registration / {{ $pagename }} 
            </div>
          </div>
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--7">
       <h2 class="text-right">{{ $pagename }} {{ $year }}</h2>
       <div class="row" id="counting"> 
           <!-- Card stats --><br>
            <div class="col-xl-3 col-lg-6" >
               <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
                 <div class="card-body">
                    <div class="row">
                      <div class="col">
                         <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($event->where('event_registration_status', 1))) }}</span>
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
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #fb6340">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">For Screening / Audition</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($event->where('event_registration_status', 2))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                              <i class="far fa-clock"></i>
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
                           <h5 class="card-title text-uppercase text-muted mb-0">Passed</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($event->where('event_registration_status', 3))) }}</span>
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
                           <h5 class="card-title text-uppercase text-muted mb-0">Failed</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($event->where('event_registration_status', 4))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                              <i class="fas fa-times"></i>
                           </div>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
           </div>
           <br>
           <input type="hidden" id="updatenum" value="">
           {{-- table --}}
           <h3>{{ $pagename }} {{ $year}} Record List</h3>
            <div class="row">
              <div class="col-md-12">
                <div class="card shadow">
                   <div class="card-header border-0">
                     <h3 class="mb-0">
                        <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                          <i class="fas fa-user-clock"></i>
                        </div> 
                        Pending 
                     </h3>
                   </div>
                   <div class="table-responsive container">
                     <table class="table align-items-center " id="pendingTable">
                        <thead class="thead-light">
                          <tr>
                             <th scope="col">No.</th>
                             <th scope="col">User</th>
                             <th scope="col">Municipality</th>
                             <th scope="col">Date Registered</th>
                             <th scope="col">Status</th>
                             <th scope="col">Action</th>
                             
                          </tr>
                        </thead>
                        <tbody>
                      @php $count1 = 1; @endphp
                     @foreach($event->where('event_registration_status', 1) as $event_1)
                        
                          <tr>
                             <td>{{ $count1++ }}.</td>
                             <th scope="row">
                               <a href="/profile/{{ $event_1->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                               <div class="media align-items-center">
                                  @if(isset($event_1->user->profile_picture) && $event_1->user->profile_picture !="none")
                                    <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                     <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $event_1->user->profile_picture }}" height="35px" width="35px">
                                     </span>
                                     @else
                                     <span class="avatar avatar-sm rounded-circle {{ $event_1->user->color_profile }}" style="text-transform: uppercase;">
                                     {{ Str::limit($event_1->user->first_name ,1,'').Str::limit($event_1->user->last_name ,1,'') }}
                                     </span>
                                    @endif
                                  <div class="media-body">
                                    <span class="mb-0 text-sm text-dark">&nbsp; {{ $event_1->user->first_name }} {{ $event_1->user->last_name }}</span>
                                  </div>
                               </div>
                               </a>
                             </th>
                             <td>
                               @foreach($event_1->user->tbl_address as $address)
                                  {{ $address->tbl_barangay->tbl_town->town_name }}
                               @endforeach
                             </td>
                             <td>
                               {{ \Carbon\Carbon::parse($event_1->created_at)->format('M d, Y h:i A')}}
                             </td>
                             <td>
                               <span class="badge badge-dot">
                                  <i class="bg-default"></i> pending
                               </span>
                             </td>
                           
                             <td class="text-right">
                               <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                    <a class="dropdown-item" href="/admin/pdf/mural-art/{{ $event_1->user_id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                    <a class="dropdown-item" href="{{ asset('user_id_picture') }}/{{ $event_1->id_picture }}"><i class="far fa-id-card"></i>View ID</a>
                                    <a class="dropdown-item addeventremark" id="{{ $event_1->id }}"><i class="fas fa-marker"></i>Add remarks</a>
                                    <hr class="my-1">
                                    <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                    <a onclick="update2()" class="dropdown-item update-status" id="{{ $event_1->id }}" >- For audition List</a>
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
        <br>

           <div class="row">
             <div class="col-md-12">
            <div class="card shadow">
               <div class="card-header border-0">
                <!-- Button trigger modal -->
                <a href="/admin/generate-report/event/for-screening/1" target="_blank" class="btn btn-success pull-right"><i class="fas fa-table"></i> Generate Report</a>

                 <h3 class="mb-0">
                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <i class="far fa-clock"></i>
                    </div> 
                  For Screening / Audition
                 </h3>
                 
               </div>
               <div class="table-responsive container">
                 <table class="table align-items-center " id="ScreeningTable">
                    <thead class="thead-light">
                      <tr>
                         <th scope="col">No.</th>
                         <th scope="col">User</th>
                         <th scope="col">Municipality</th>
                         <th scope="col">Date Registered</th>
                         <th scope="col">Status</th>
                         <th scope="col">Action</th>
                         
                      </tr>
                    </thead>
                    <tbody>

                  @php $count2 = 1; @endphp
                 @foreach($event->where('event_registration_status', 2) as $event_2)
                    
                      <tr>
                         <td>{{ $count2++ }}.</td>
                         <th scope="row">
                           <a href="/profile/{{ $event_2->user->username }}"  data-toggle="tooltip" data-placement="top" title="View Profile">
                           <div class="media align-items-center">
                              @if(isset($event_2->user->profile_picture) && $event_2->user->profile_picture !="none")
                                <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                 <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $event_2->user->profile_picture }}" height="35px" width="35px">
                                 </span>
                                 @else
                                 <span class="avatar avatar-sm rounded-circle {{ $event_2->user->color_profile }}" style="text-transform: uppercase;">
                                 {{ Str::limit($event_2->user->first_name ,1,'').Str::limit($event_2->user->last_name ,1,'') }}
                                 </span>
                                @endif
                              <div class="media-body">
                                <span class="mb-0 text-sm text-dark">&nbsp; {{ $event_2->user->first_name }} {{ $event_2->user->last_name }}</span>
                              </div>
                           </div>
                           </a>
                         </th>
                         <td>
                           @foreach($event_2->user->tbl_address as $address)
                              {{ $address->tbl_barangay->tbl_town->town_name }}
                           @endforeach
                         </td>
                         <td>
                           {{ \Carbon\Carbon::parse($event_2->created_at)->format('M d, Y h:i A')}}
                         </td>
                         <td>
                           <span class="badge badge-dot">
                              <i class="bg-warning"></i> on screening
                           </span>
                         </td>
                       
                         <td class="text-right">
                           <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                <a class="dropdown-item" href="/admin/pdf/mural-art/{{ $event_2->user_id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                <a class="dropdown-item" href="{{ asset('user_id_picture') }}/{{ $event_2->id_picture }}"><i class="far fa-id-card"></i>View ID</a>
                                <hr class="my-1">
                                <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                <a onclick="update1()" class="dropdown-item update-status"  id="{{ $event_2->id }}">- Pending List</a>
                                <hr class="my-1">
                                <a onclick="update3()" class="dropdown-item update-status"  id="{{ $event_2->id }}">- Passed List</a>
                                <a onclick="update4()" class="dropdown-item update-status"  id="{{ $event_2->id }}">- Failed List</a>
                              </div>
                           </div>
                         </td>
                      </tr>
                    
                 @endforeach

                    </tbody>
                 </table>
                 <button type="button" class="btn btn-sm  bg-gradient-default text-white showsmsmodal" id="1">
                    <i class="fas fa-plus"></i>
                    Add New Text Message
                 </button>
                 <a href="javascript:" class="showsmshistory">
                  <h4 class="text-right text-primary"><i class="fas fa-eye"></i> SMS history of the year {{ $year }}</h4>
                </a>
                 
               </div>
            </div>
          </div>
        </div>
       
        <br>
           <div class="row">
             <div class="col-md-12">
            <div class="card shadow"> 
               <div class="card-header border-0">
                
                <a href="/admin/generate-report/event/contestant/1" target="_blank" class="btn btn-success pull-right"><i class="fas fa-table"></i> Generate Report</a>

                 <h3 class="mb-0">
                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                      <i class="fas fa-group"></i>
                    </div> 
                      Passed
                 </h3>
               </div>
               <div class="table-responsive container">
                 <table class="table align-items-center " id="pasokTable">
                    <thead class="thead-light">
                      <tr>
                         <th scope="col">No.</th>
                         <th scope="col">User</th>
                         <th scope="col">Municipality</th>
                         <th scope="col">Date Registered</th>
                         <th scope="col">Status</th>
                         <th scope="col">Action</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                  @php $count3 = 1; @endphp
                  @foreach($event->where('event_registration_status', 3) as $event_3)
                    
                      <tr>
                         <td>{{ $count3++ }}.</td>
                         <th scope="row">
                           <a href="/profile/{{ $event_3->user->username }}"  data-toggle="tooltip" data-placement="top" title="View Profile">
                           <div class="media align-items-center">
                              @if(isset($event_3->user->profile_picture) && $event_3->user->profile_picture !="none")
                                <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                 <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $event_3->user->profile_picture }}" height="35px" width="35px">
                                 </span>
                                 @else
                                 <span class="avatar avatar-sm rounded-circle {{ $event_3->user->color_profile }}" style="text-transform: uppercase;">
                                 {{ Str::limit($event_3->user->first_name ,1,'').Str::limit($event_3->user->last_name ,1,'') }}
                                 </span>
                                @endif
                              <div class="media-body">
                                <span class="mb-0 text-sm text-dark">&nbsp; {{ $event_3->user->first_name }} {{ $event_3->user->last_name }}</span>
                              </div>
                           </div>
                           </a>
                         </th>
                         <td>
                           @foreach($event_3->user->tbl_address as $address)
                              {{ $address->tbl_barangay->tbl_town->town_name }}
                           @endforeach
                         </td>
                         <td>
                           {{ \Carbon\Carbon::parse($event_3->created_at)->format('M d, Y h:i A')}}
                         </td>
                         <td>
                           <span class="badge badge-dot">
                              <i class="bg-success"></i> pasok
                           </span>
                         </td>
                       
                         <td class="text-right">
                           <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                <a class="dropdown-item" href="/admin/pdf/mural-art/{{ $event_3->user_id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                <a class="dropdown-item" href="{{ asset('user_id_picture') }}/{{ $event_3->id_picture }}"><i class="far fa-id-card"></i>View ID</a>
                                <hr class="my-1">
                                <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                <a onclick="update1()" class="dropdown-item update-status"  id="{{ $event_3->id }}">- Pending List</a>
                                <hr class="my-1">
                                <a onclick="update2()" class="dropdown-item update-status" id="{{ $event_3->id }}" >- For audition List</a>
                                <a onclick="update4()" class="dropdown-item update-status"  id="{{ $event_3->id }}">- Failed List</a>
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
        <br>
           <div class="row">
             <div class="col-md-12">
             <div class="card shadow">
               <div class="card-header border-0">
                 <h3 class="mb-0">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-times"></i>
                    </div> 
                      Failed
                 </h3>
               </div>
               <div class="table-responsive container">
                 <table class="table align-items-center " id="ligwakTable">
                    <thead class="thead-light">
                      <tr>
                         <th scope="col">No.</th>
                         <th scope="col">User</th>
                         <th scope="col">Municipality</th>
                         <th scope="col">Date Registered</th>
                         <th scope="col">Status</th>
                         <th scope="col">Action</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                  @php $count4 = 1; @endphp
                 @foreach($event->where('event_registration_status', 4) as $event_4)
                    
                      <tr>
                         <td>{{ $count4++ }}.</td>
                         <th scope="row">
                           <a href="/profile/{{ $event_4->user->username }}"  data-toggle="tooltip" data-placement="top" title="View Profile">
                           <div class="media align-items-center">
                              @if(isset($event_4->user->profile_picture) && $event_4->user->profile_picture !="none")
                                <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                 <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $event_4->user->profile_picture }}" height="35px" width="35px">
                                 </span>
                                 @else
                                 <span class="avatar avatar-sm rounded-circle {{ $event_4->user->color_profile }}" style="text-transform: uppercase;">
                                 {{ Str::limit($event_4->user->first_name ,1,'').Str::limit($event_4->user->last_name ,1,'') }}
                                 </span>
                                @endif
                              <div class="media-body">
                                <span class="mb-0 text-sm text-dark">&nbsp; {{ $event_4->user->first_name }} {{ $event_4->user->last_name }}</span>
                              </div>
                           </div>
                           </a>
                         </th>
                         <td>
                           @foreach($event_4->user->tbl_address as $address)
                              {{ $address->tbl_barangay->tbl_town->town_name }}
                           @endforeach
                         </td>
                         <td>
                           {{ \Carbon\Carbon::parse($event_4->created_at)->format('M d, Y h:i A')}}
                         </td>
                         <td>
                           <span class="badge badge-dot">
                              <i class="bg-danger"></i> Failed
                           </span>
                         </td>
                       
                         <td class="text-right">
                           <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                <a class="dropdown-item" href="/admin/pdf/mural-art/{{ $event_4->user_id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                <a class="dropdown-item" href="{{ asset('user_id_picture') }}/{{ $event_4->id_picture }}"><i class="far fa-id-card"></i>View ID</a>
                                <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                <a onclick="update1()" class="dropdown-item update-status"  id="{{ $event_4->id }}">- Pending List</a>
                                <hr class="my-1">
                                <a onclick="update2()" class="dropdown-item update-status" id="{{ $event_4->id }}" >- For audition List</a>
                                <a onclick="update3()" class="dropdown-item update-status"  id="{{ $event_4->id }}">- Passed List</a>
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
           <br>
        </div>
     </div>
  
   @include('userpage.includes.sms-modal')
   @include('admin.scriptassets') 
   @include('userpage.modals.modal_loader')
   

  <script src="{{ asset('/js/update-applicant-status.js') }}"></script>
</body>
</html>




