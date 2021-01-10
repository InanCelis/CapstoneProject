@include('admin.cssassets')
<body >
  <!-- Sidenav -->
  @include('userpage.mainnav')
  <!-- Main content -->
  <div class="main-content">
     @include('userpage.secondnav')
    <!-- Header -->
    <div class="header pb-1 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="header-body" style="margin-top: -25px">
           YDA - Laguna / {{ $pagename }} 
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid " style="z-index: -1">
      <div class="nav-wrapper row">
        <ul class="nav nav-pills nav-fill flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item"> 
                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#event" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-users mr-2"></i>User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-pencil-alt mr-2"></i>Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="far fa-file-pdf mr-2"></i>PDF</a>
            </li>
        </ul>
      </div>
      <div class="card shadow my--2">
          <div class="card-body">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade w-100 show active" id="event" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill  flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-user-shield mr-2"></i>Admin User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-users-cog mr-2"></i>Normal User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-user-times mr-2"></i>Not Verified User</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="card shadow my--4">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="table-responsive container">
                                      <div class="my-3">
                                        <i class="fas fa-user-shield mr-2"></i>Admin User
                                      </div>
                                      <table class="table align-items-center" id="adminuserTable">
                                          <thead class="thead-light">
                                              <tr>
                                                  <th scope="col">Date Created</th>
                                                  <th scope="col">User</th>
                                                  <th scope="col">Contact</th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($users->where('usertype', 1) as $admin)
                                                <tr>
                                                  <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('M d, Y h:i A')}}</td>
                                                  <th scope="row">
                                                     <a href="/profile/{{ $admin->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                                     <div class="media align-items-center">
                                                        @if(isset($admin->profile_picture) && $admin->profile_picture !="none")
                                                          <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                                           <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $admin->profile_picture }}" height="35px" width="35px">
                                                           </span>
                                                           @else
                                                           <span class="avatar avatar-sm rounded-circle {{ $admin->color_profile }}" style="text-transform: uppercase;">
                                                           {{ Str::limit($admin->first_name ,1,'').Str::limit($admin->last_name ,1,'') }}
                                                           </span>
                                                          @endif
                                                        <div class="media-body">
                                                          <span class="mb-0 text-sm text-dark">&nbsp; {{ $admin->first_name }} {{ $admin->last_name }}</span>
                                                        </div>
                                                     </div>
                                                     </a>
                                                   </th>
                                                   <td>{{ $admin->contact }} <br> {{ $admin->email }}</td>
                                                   <td>
                                                    <label class="custom-toggle">
                                                        <input type="checkbox" class="user_status" id="{{ $admin->id }}" @if($admin->status == 1) checked @else  @endif>
                                                        <span class="custom-toggle-slider rounded-circle" data-label-off="close" data-label-on="open"></span>
                                                    </label>
                                                  </td>
                                                  <td class="text-right">
                                                     <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                          <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                                          <a class="dropdown-item makenormaluser" id="{{ $admin->id }}"><i class="fas fa-users-cog mr-2"></i>Make as normal user</a>
                                                        </div>
                                                     </div>
                                                   </td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                     </div>
                                    
                                </div>

                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="table-responsive container">
                                      <div class="my-3">
                                        <i class="fas fa-users-cog mr-2"></i>Normal User
                                      </div>
                                      <table class="table align-items-center" id="normaluserTable">
                                          <thead class="thead-light">
                                              <tr>
                                                  <th scope="col">Date Created</th>
                                                  <th scope="col">User</th>
                                                  <th scope="col">Contact</th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody >
                                             @foreach($users->where('usertype', 0)->where('number_verified', 1) as $normaluser)
                                                <tr>
                                                  <td>{{ \Carbon\Carbon::parse($normaluser->created_at)->format('M d, Y h:i A')}}</td>
                                                  <th scope="row">
                                                     <a href="/profile/{{ $normaluser->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                                     <div class="media align-items-center">
                                                        @if(isset($normaluser->profile_picture) && $normaluser->profile_picture !="none")
                                                          <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                                           <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $normaluser->profile_picture }}" height="35px" width="35px">
                                                           </span>
                                                           @else
                                                           <span class="avatar avatar-sm rounded-circle {{ $normaluser->color_profile }}" style="text-transform: uppercase;">
                                                           {{ Str::limit($normaluser->first_name ,1,'').Str::limit($normaluser->last_name ,1,'') }}
                                                           </span>
                                                          @endif
                                                        <div class="media-body">
                                                          <span class="mb-0 text-sm text-dark">&nbsp; {{ $normaluser->first_name }} {{ $normaluser->last_name }}</span>
                                                        </div>
                                                     </div>
                                                     </a>
                                                   </th>
                                                   <td>{{ $normaluser->contact }} <br> {{ $normaluser->email }}</td>
                                                   <td>
                                                    <label class="custom-toggle">
                                                        <input type="checkbox" class="user_status" id="{{ $normaluser->id }}" @if($normaluser->status == 1) checked @else  @endif>
                                                        <span class="custom-toggle-slider rounded-circle" data-label-off="close" data-label-on="open"></span>
                                                    </label>
                                                  </td>
                                                  <td class="text-right">
                                                     <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                          <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                                          <a class="dropdown-item makeadmin" id="{{ $normaluser->id }}"><i class="fas fa-user-shield mr-2"></i>Make as admin user</a>
                                                        </div>
                                                     </div>
                                                   </td>
                                                </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                     </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                  <div class="table-responsive container">
                                      <div class="my-3">
                                        <i class="fas fa-user-times mr-2"></i>Not Verified User
                                      </div>
                                      <table class="table align-items-center ">
                                          <thead class="thead-light">
                                              <tr>
                                                  <th scope="col">Date Created</th>
                                                  <th scope="col">User</th>
                                                  <th scope="col">Contact</th>
                                              </tr>
                                          </thead>
                                          <tbody >
                                             @foreach($users->where('usertype', 0)->where('number_verified', 0) as $normaluser)
                                                <tr>
                                                  <td>{{ \Carbon\Carbon::parse($normaluser->created_at)->format('M d, Y h:i A')}}</td>
                                                  <th scope="row">
                                                     <a href="/profile/{{ $normaluser->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                                                     <div class="media align-items-center">
                                                        @if(isset($normaluser->profile_picture) && $normaluser->profile_picture !="none")
                                                          <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                                           <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $normaluser->profile_picture }}" height="35px" width="35px">
                                                           </span>
                                                           @else
                                                           <span class="avatar avatar-sm rounded-circle {{ $normaluser->color_profile }}" style="text-transform: uppercase;">
                                                           {{ Str::limit($normaluser->first_name ,1,'').Str::limit($normaluser->last_name ,1,'') }}
                                                           </span>
                                                          @endif
                                                        <div class="media-body">
                                                          <span class="mb-0 text-sm text-dark">&nbsp; {{ $normaluser->first_name }} {{ $normaluser->last_name }}</span>
                                                        </div>
                                                     </div>
                                                     </a>
                                                   </th>
                                                   <td>{{ $normaluser->contact }} <br> {{ $normaluser->email }}</td>
                                                   
                                                  
                                                </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                     </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


 

                  <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    <h3>Events</h3>
                    <div class="row">

                      <div class="col-md-4 order-xl-2">
                        <div class="form-group">
                          <label for="year"><b>Year Fetch</b></label>
                          <form id="changeyear" method="POST">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                
                                <input class="yearfetch form-control" name="year" value="{{ $year }}" type="text" id="year" required readonly>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm pull-right">Change</button>
                          </form>
                        </div>
                        <hr class="my-5">
                      </div>

                      <div class="col-md-8 order-xl-1">
                       <div class="table-responsive container">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">No.</th>
                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($event as $event)
                                  <tr>
                                    <td>{{ $event->id }}.</td>
                                    <th class="description"> {{ $event->event_name }}</th>
                                    <td>
                                      <label class="custom-toggle">
                                          <input type="checkbox" class="event_id" id="{{ $event->id }}" @if($event->event_status == 'open') checked @else  @endif>
                                          <span class="custom-toggle-slider rounded-circle" data-label-off="close" data-label-on="open"></span>
                                      </label>
                                    </td>
                                  </tr>
                               @endforeach
                            </tbody>
                         </table>
                       </div>
                      </div>
                    </div>
                      
                  </div>




                  <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                      
                      <div class="row">
                        <div class="col-md-6">
                          <form id="ydaheadsubmit" method="POST">
                            @csrf
                            <b>YDA Head</b>
                            @foreach($ydahead as $head)
                             <div class="form-group">
                              <label for="name" class="text-sm">Name</label>
                                <input id="name" type="text" class="form-control form-control-alternative " name="name" value="{{ $head->name }}" onkeyup="this.value = this.value.toUpperCase();" autofocus placeholder="Name" required>
                             </div>
                             <div class="form-group">
                              <label for="name" class="text-sm">Position</label>
                                <input id="name" type="text" class="form-control form-control-alternative " name="position" value="{{ $head->position }}" autofocus placeholder="Position" required>
                             </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary btn-sm pull-right">update</button>
                          </form>


                          <form class="pt-5" id="changepdfheader" action="POST">
                            @csrf
                            <b>PDF Header</b>
                             <div class="form-group">
                              <label for="name" class="text-sm">Change picture</label>
                                <input id="name" type="file" class="form-control form-control-alternative " name="image" autofocus placeholder="Position" accept="image/*" required>
                             </div>
                   
                            <button type="submit" class="btn btn-primary btn-sm pull-right btn-submit">Change</button>
                          </form>
                        </div>

                        <div class="col-md-6" >
                          <b>PDF Preview</b>
                          <div id="preview">
                            <iframe src="{{ $pdf }}"  width="100%" height="500px">
                            </iframe>
                          </div>
                        </div>
                      </div>

                      
                  </div>




              </div>
          </div>
      </div>



     </div>
  </div>
  <script src="{{ asset('/js/setting.js') }}"></script>
  @include('admin.scriptassets') 
  @include('userpage.modals.modal_loader')
</body>
</html>
