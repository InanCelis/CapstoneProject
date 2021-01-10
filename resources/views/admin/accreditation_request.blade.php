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
            <div class="col-xl-4 col-lg-6" >
               <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
                 <div class="card-body">
                    <div class="row">
                      <div class="col">
                         <h5 class="card-title text-uppercase text-muted mb-0">Pending Requests</h5>
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($req->where('status', 0))) }}</span>
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
            <div class="col-xl-4 col-lg-6">
               <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #2dce89">
                  <div class="card-body">
                    <div class="row">
                       <div class="col">
                         <h5 class="card-title text-uppercase text-muted mb-0">Approved Requests</h5>
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($req->where('status', 1))) }}</span>
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
            <div class="col-xl-4 col-lg-6">
               <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #f5365c">
                  <div class="card-body">
                    <div class="row">
                       <div class="col">
                         <h5 class="card-title text-uppercase text-muted mb-0">Archive Requests</h5>
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($req->where('status', 2))) }}</span>
                       </div>
                       <div class="col-auto">
                         <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-archive"></i>
                         </div>
                       </div>
                    </div>
                  </div>
               </div>
            </div>
          </div>
          <br>
          <input type="hidden" id="updaterequestnum" value="">
            <div class="nav-wrapper my--4">
                <ul class="nav nav-pills nav-fill " id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active text-dark" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-user-clock mr-2"></i>Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 text-dark" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-check mr-2"></i>Approved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 text-dark" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-archive mr-2"></i>Archive</a>
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
                                  Pending Requests
                               </h3>
                               <span class="badge badge-dot">
                                <i class="bg-default"></i> pending
                               </span>
                             </div>
                             <div class="table-responsive container">
                               <table class="table align-items-center" id="pendingreqtable">
                                  <thead class="thead-light">
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Date Request</th>
                                       <th scope="col">Organization</th>
                                       <th scope="col">Message</th>
                                       <th scope="col">Feedback</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php $count1 = 1; @endphp
                                    @foreach($req->where('status', 0) as $req_0)
                                      <tr>
                                        <td>{{ $count1++ }}.</td>
                                        <td>{{ \Carbon\Carbon::parse($req_0->created_at)->format('M d, Y h:i A')}}</td>
                                        <td>
                                        @foreach($req_0->user->tbl_accreditation as $acc)
                                          <a href="/accreditation/organization/{{ str_random(100) }}/{{ $acc->id }}/{{ str_random(100) }}" data-toggle="tooltip" data-placement="top" title="View organization" class="text-center">
                                            <img src="{{ asset('/accreditation_file') }}/{{ $acc->logo }}" height="30px" width="30px"> {{ $acc->name }}
                                          </a>
                                        @endforeach
                                        </td>
                                        <td><p class="text-sm" title="{{ $req_0->message }}">{{ str_limit( $req_0->message, 20) }}</p></td>
                                        <td><p class="text-sm" id="specific_{{ $req_0->id }}" title="{{ $req_0->feedback }}">{{ str_limit( $req_0->feedback, 20) }}</p></td>
                                         
                                        <td class="text-right">
                                         <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                              <a class="viewmessage dropdown-item " id="{{ $req_0->id }}"><i class="fas fa-marker"></i>Add Feedback</a> 
                                              <hr class="my-1">
                                              <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Move to</small>
                                              <a onclick="updaterequestto_1()" class="dropdown-item updaterequest" id="{{ $req_0->id }}" ><i class="fas fa-check mr-2"></i> Approved</a>
                                              <a onclick="updaterequestto_2()" class="dropdown-item updaterequest" id="{{ $req_0->id }}"><i class="fas fa-archive"></i> Archived </a>
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
                                    <i class="fas fa-check"></i>
                                 </div>
                                  Approved  Requests
                               </h3>
                               <span class="badge badge-dot">
                                <i class="bg-success"></i> approved
                               </span>
                             </div>
                             <div class="table-responsive container">
                               <table class="table align-items-center " id="approvetable">
                                  <thead class="thead-light">
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Date Approved</th>
                                       <th scope="col">Organization</th>
                                       <th scope="col">Message</th>
                                       <th scope="col">Feedback</th>
                                       <th scope="col">Action</th>
                                       
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php $count1 = 1; @endphp
                                    @foreach($req->where('status', 1)->sortByDesc('updated_at') as $req_1)
                                      <tr>
                                        <td>{{ $count1++ }}.</td>
                                        <td>{{ \Carbon\Carbon::parse($req_1->updated_at)->format('M d, Y h:i A')}}</td>
                                        <td>
                                        @foreach($req_1->user->tbl_accreditation as $acc)
                                          <a href="/accreditation/organization/{{ str_random(100) }}/{{ $acc->id }}/{{ str_random(100) }}" data-toggle="tooltip" data-placement="top" title="View organization" class="text-center">
                                            <img src="{{ asset('/accreditation_file') }}/{{ $acc->logo }}" height="30px" width="30px"> {{ $acc->name }}
                                          </a>
                                        @endforeach
                                        </td>
                                        <td><p class="text-sm" title="{{ $req_1->message }}">{{ str_limit( $req_1->message, 20) }}</p></td>
                                        <td><p class="text-sm" title="{{ $req_1->feedback }}">{{ str_limit( $req_1->feedback, 20) }}</p></td>
                                         
                                        <td class="text-right">
                                         <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                              <a onclick="updaterequestto_0()" class="dropdown-item updaterequest" id="{{ $req_1->id }}" ><i class="fas fa-user-clock mr-2"></i> Pending</a>
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
                                    <i class="fas fa-archive"></i>
                                 </div>
                                  Archive Requests
                               </h3>
                               <span class="badge badge-dot">
                                <i class="bg-danger"></i> archive / disapproved
                               </span>
                             </div>
                             <div class="table-responsive container">
                               <table class="table align-items-center " id="archivetable">
                                  <thead class="thead-light">
                                    <tr>
                                       <th scope="col">No.</th>
                                       <th scope="col">Date disapproved</th>
                                       <th scope="col">Organization</th>
                                       <th scope="col">Message</th>
                                       <th scope="col">Feedback</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php $count1 = 1; @endphp
                                    @foreach($req->where('status', 2)->sortByDesc('updated_at') as $req_2)
                                      <tr>
                                        <td>{{ $count1++ }}.</td>
                                        <td>{{ \Carbon\Carbon::parse($req_2->updated_at)->format('M d, Y h:i A')}}</td>
                                        <td>
                                        @foreach($req_2->user->tbl_accreditation as $acc)
                                          <a href="/accreditation/organization/{{ str_random(100) }}/{{ $acc->id }}/{{ str_random(100) }}" data-toggle="tooltip" data-placement="top" title="View organization" class="text-center">
                                            <img src="{{ asset('/accreditation_file') }}/{{ $acc->logo }}" height="30px" width="30px"> {{ $acc->name }}
                                          </a>
                                        @endforeach
                                        </td>
                                        <td><p class="text-sm" title="{{ $req_2->message }}">{{ str_limit( $req_2->message, 20) }}</p></td>
                                        <td><p class="text-sm" title="{{ $req_2->feedback }}">{{ str_limit( $req_2->feedback, 20) }}</p></td>
                                         
                                        <td class="text-right">
                                         <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                      
                                              <a onclick="updaterequestto_0()" class="dropdown-item updaterequest" id="{{ $req_2->id }}" ><i class="fas fa-user-clock mr-2"></i> Pending</a>
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
  </div>
  
  {{-- view detail  --}}
<div class="modal fade" id="viewdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="messagecontent">

    </div>
  </div>
</div>
    

  
   @include('admin.scriptassets') 
   <script src="{{ asset('/js/accreditation.js') }}"></script>
   @include('userpage.modals.modal_loader')




</body>
</html>

