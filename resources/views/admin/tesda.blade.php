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
             YDA - Laguna / Training / {{ $pagename }} 
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
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($tesda->where('tesda_status', 1))) }}</span>
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
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">Number of batches</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($batches)) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                              <i class="fas fa-group"></i>
                           </div>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
               <div class="col-xl-3 col-lg-6">
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">Completed trainees</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($tesda->where('tesda_status', 3))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                              <i class="fas fa-check"></i>
                           </div>
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
               <div class="col-xl-3 col-lg-6">
                 <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0">Unfinish trainees</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($tesda->where('tesda_status', 2))) }}</span>
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
           <div class="row">
              <div class="col-md-12">
                <div class="card shadow">
                   <div class="card-header border-0">
                     <h2 class="mb-0">
                        Batches
                        <button type="button" class="btn btn-sm btn-primary pull-right h3" data-toggle="modal" data-target="#addbatch"><i class="fas fa-plus"></i> Add batch</button>
                     </h2>
                     
                   </div>
                   <div class="table-responsive container">
                     <table class="table align-items-center " id="batchestable">
                        <thead class="thead-light">
                          <tr class="text-center">
                             <th scope="col">No.</th>
                             <th scope="col">Batch Name</th>
                             <th scope="col">Schedule</th>
                             <th scope="col">Status</th>
                             <th scope="col">Created Date</th>
                             <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @php $bacth_count = 1 @endphp
                          @foreach($batches as $batch)
                            <tr>
                              <td>{{ $bacth_count++ }}.</td>
                              <td>{{ $batch->batch_name }}</td>
                              @if($batch->schedule == 1)
                                <td>Weekend</td>
                                @else
                                <td>Weekdays</td>
                              @endif
                              @if($batch->status == 1)
                                <td class="text-white"><label class="bg-danger">unfinish session </label></td>
                                @else
                                <td class="text-white"><label class="bg-success">session completed </label></td>
                              @endif
                              
                              <td>{{ \Carbon\Carbon::parse($batch->created_at)->format('M d, Y h:i A')}}</td>
                              <td class="text-center">
                               <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                    <a class="dropdown-item editbatch" id="{{ $batch->id }}"><i class="fas fa-pencil-alt text-info"></i>Edit</a>
                                    <a class="dropdown-item deletebatch" id="{{ $batch->id }}" ><i class="fas fa-trash-alt text-danger"></i>Delete</a>
                                    <hr class="my-1">
                                    <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Mark as</small>
                                    @if($batch->status == 1)
                                    <a class="dropdown-item mark-completed text-success" id="{{ $batch->id }}">- Session completed</a>
                                    @endif
                                    @if($batch->status == 2)
                                    <a class="dropdown-item mark-unfinish text-danger" id="{{ $batch->id }}">- Unfinish session</a>
                                    @endif
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
              <div class="col-md-6">
                <div class="card shadow">
                   <div class="card-header border-0">
                     <h2 class="mb-0">
                        Weekend
                        <label class="pull-right h3">Applicant: 
                          <strong class="text-danger">
                            {{ number_format(count($tesda->where('tesda_status', 1)->where('schedule', 'Weekend'))) }} 
                          </strong>
                        </label>
                     </h2>
                     <span class="badge badge-dot">
                        <i class="bg-default"></i> pending
                     </span>
                   </div>
                   <div class="table-responsive container">
                     <table class="table align-items-center " id="weekendtable">
                        <thead class="thead-light">
                          <tr>
                             <th scope="col">No.</th>
                             <th scope="col">User</th>
                             <th scope="col">Date Registered</th>
                             <th scope="col">Remark</th>
                             <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $weekendcount = 1; @endphp
                          @foreach($tesda->where('tesda_status', 1)->where('schedule', 'Weekend') as $weekend)
                            <tr>
                              <td>{{ $weekendcount++ }}.</td>
                              <th scope="row">
                               <a href="/profile/{{ $weekend->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                               <div class="media align-items-center">
                                  @if(isset($weekend->user->profile_picture) && $weekend->user->profile_picture !="none")
                                    <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                     <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $weekend->user->profile_picture }}" height="35px" width="35px">
                                     </span>
                                     @else
                                     <span class="avatar avatar-sm rounded-circle {{ $weekend->user->color_profile }}" style="text-transform: uppercase;">
                                     {{ Str::limit($weekend->user->first_name ,1,'').Str::limit($weekend->user->last_name ,1,'') }}
                                     </span>
                                    @endif
                                  <div class="media-body">
                                    <span class="mb-0 text-sm text-dark">&nbsp; {{ $weekend->user->first_name }} {{ $weekend->user->last_name }}</span>
                                  </div>
                               </div>
                               </a>
                              </th>
                              <td>{{ \Carbon\Carbon::parse($weekend->created_at)->format('M d, Y h:i A')}}</td>
                              <td>
                                <label data-toggle="tooltip" data-placement="top" title="{{ $weekend->remarks }}">{{ str_limit($weekend->remarks, 10)}}
                                </label>
                              </td>
                              <td class="text-right">
                               <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                    <a class="dropdown-item" href="/admin/pdf/it-training-program-form/{{ $weekend->user->id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                    <a class="dropdown-item tesda_remark" id="{{ $weekend->user->id }}"><i class="fas fa-marker"></i>Add remarks</a>
                                    <a class="dropdown-item addtobatch" id="{{ $weekend->user->id }}"><i class="fas fa-users"></i>Add to batch</a>
                                    <hr class="my-1">
                                    <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                    <a class="dropdown-item move-archive" id="{{ $weekend->user->id }}"><i class="fas fa-archive"></i> Archived </a>
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
              <div class="col-md-6">
                <div class="card shadow">
                   <div class="card-header border-0">
                     <h2 class="mb-0">
                        Weekdays
                        <label class="pull-right h3">Applicant: 
                          <strong class="text-danger">
                          {{ number_format(count($tesda->where('tesda_status', 1)->where('schedule', 'Weekdays'))) }} 
                          </strong>
                        </label>
                     </h2>
                     <span class="badge badge-dot">
                        <i class="bg-default"></i> pending
                     </span>
                   </div>
                   <div class="table-responsive container">
                     <table class="table align-items-center " id="weekdaystable">
                        <thead class="thead-light">
                          <tr>
                             <th scope="col">No.</th>
                             <th scope="col">User</th>
                             <th scope="col">Date Registered</th>
                             <th scope="col">Remark</th>
                             <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $weekdayscount = 1; @endphp
                          @foreach($tesda->where('tesda_status', 1)->where('schedule', 'Weekdays') as $weekdays)
                            <tr>
                              <td>{{ $weekdayscount++ }}.</td>
                              <th scope="row">
                               <a href="/profile/{{ $weekdays->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                               <div class="media align-items-center">
                                  @if(isset($weekdays->user->profile_picture) && $weekdays->user->profile_picture !="none")
                                    <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                     <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $weekdays->user->profile_picture }}" height="35px" width="35px">
                                     </span>
                                     @else
                                     <span class="avatar avatar-sm rounded-circle {{ $weekdays->user->color_profile }}" style="text-transform: uppercase;">
                                     {{ Str::limit($weekdays->user->first_name ,1,'').Str::limit($weekdays->user->last_name ,1,'') }}
                                     </span>
                                    @endif
                                  <div class="media-body">
                                    <span class="mb-0 text-sm text-dark">&nbsp; {{ $weekdays->user->first_name }} {{ $weekdays->user->last_name }}</span>
                                  </div>
                               </div>
                               </a>
                              </th>
                              <td>{{ \Carbon\Carbon::parse($weekdays->created_at)->format('M d, Y h:i A')}}</td>
                              <td>
                                <label data-toggle="tooltip" data-placement="top" title="{{ $weekdays->remarks }}">{{ str_limit($weekdays->remarks, 10)}}
                                </label>
                              </td>
                              <td class="text-right">
                               <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                    <a class="dropdown-item" href="/admin/pdf/it-training-program-form/{{ $weekdays->user->id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                    <a class="dropdown-item tesda_remark" id="{{ $weekdays->user->id }}"><i class="fas fa-marker"></i>Add remarks</a>
                                    <a class="dropdown-item addtobatch" id="{{ $weekdays->user->id }}"><i class="fas fa-users"></i>Add to batch</a>
                                    
                                    <hr class="my-1">
                                    <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                    <a class="dropdown-item move-archive" id="{{ $weekdays->user->id }}"><i class="fas fa-archive"></i> Archived </a>
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
                     <h2 class="mb-0">
                        Choose Batch
                     </h2>
                     <div class="col-md-12">
                      <div class="form-group" id="allbatch">
                          <select class="form-control input-group-alternative mb-3 bg-dark" name="batches" id="batches" required autocomplete="bacth" autofocus required>
                            <option disabled="" selected="" value="">- Batch -</option>
                            @foreach($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                           @endforeach
                          </select>
                      </div>
                    </div>
                   </div>
                   <div class="table-responsive container " id="fetchmember">
                     
                   </div>
                </div>
              </div>
           </div>
           <br><br>
        </div>
     </div>
  

     <!-- ADD BATCH -->
  <div class="modal fade" id="addbatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Add New Batch</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_bacth" method="POST">
          <div class="modal-body ">
             @csrf
             <div class="col-md-12">
               <div class="form-group">
                  <label class="form-control-label" for="batch_name">Batch Name</label>
                  <div class="input-group input-group-alternative mb-4">
                    <input class="form-control form-control-alternative" id="batch_name" name="batch_name" placeholder="Batch Name" type="text" required>
                  </div>
               </div>
               <div class="form-group">
                  <label class="form-control-label" for="input-school-name"> Schedule</label>
                  <div class="custom-control custom-radio mb-4">
                    <input name="schedule" class="custom-control-input" id="weekend" type="radio" value="1" required>
                    <label class="custom-control-label" for="weekend">Weekend</label> 
                  </div>
                  <div class="custom-control custom-radio mb-4">
                    <input name="schedule" class="custom-control-input" id="weekdays" type="radio" value="2" required>
                    <label class="custom-control-label" for="weekdays">Weekdays</label>
                  </div>
               </div>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm btn-submit"><i class="ni ni-send"></i> save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

{{--show edit batch --}}
<div class="modal fade" id="show_batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="show_batch_content">
         
      </div>
   </div>
</div> 

{{--show edit batch --}}
<div class="modal fade" id="edit_batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="batch_content">
         
      </div>
   </div>
</div> 



    <!-- ADD remark -->
  <div class="modal fade bg-dark" id="addremark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Add remark</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_remark" method="POST">
          <div class="modal-body ">
             @csrf
             <input type="hidden" name="" id="tesdauserid">
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

 
   @include('userpage.modals.modal_loader')
   @include('admin.scriptassets')
   <script src="{{ asset('/js/tesda.js') }}"></script>




</body>
</html>

