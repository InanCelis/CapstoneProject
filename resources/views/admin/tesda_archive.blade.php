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
       <h2 class="text-left">{{ $pagename }}</h2>
       <div class="row" >
           <!-- Card stats --><br>
          <div class="col-xl-3 col-lg-6" >
             <div class="card card-stats mb-4 mb-xl-0" style="border-top: 3px solid #172b4d">
               <div class="card-body">
                  <div class="row">
                    <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Applicants in archived</h5>
                       <span class="h2 font-weight-bold mb-0" id="counting">{{ number_format(count($tesda->where('tesda_status', 4))) }}</span>
                    </div>
                    <div class="col-auto">
                       <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                         <i class="fas fa-archive"></i>
                       </div>
                    </div>
                  </div>
               </div>
             </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-header border-0">
                 <h2 class="mb-0">
                    Archive
                 </h2>
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
                      @foreach($tesda as $tesda)
                        <tr>
                          <td>{{ $weekdayscount++ }}.</td>
                          <th scope="row">
                           <a href="/profile/{{ $tesda->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
                           <div class="media align-items-center">
                              @if(isset($tesda->user->profile_picture) && $tesda->user->profile_picture !="none")
                                <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                 <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $tesda->user->profile_picture }}" height="35px" width="35px">
                                 </span>
                                 @else
                                 <span class="avatar avatar-sm rounded-circle {{ $tesda->user->color_profile }}" style="text-transform: uppercase;">
                                 {{ Str::limit($tesda->user->first_name ,1,'').Str::limit($tesda->user->last_name ,1,'') }}
                                 </span>
                                @endif
                              <div class="media-body">
                                <span class="mb-0 text-sm text-dark">&nbsp; {{ $tesda->user->first_name }} {{ $tesda->user->last_name }}</span>
                              </div>
                           </div>
                           </a>
                          </th>
                          <td>{{ \Carbon\Carbon::parse($tesda->created_at)->format('M d, Y h:i A')}}</td>
                          <td>
                            <label data-toggle="tooltip" data-placement="top" title="{{ $tesda->remarks }}">{{ str_limit($tesda->remarks, 10)}}
                            </label>
                          </td>
                          <td class="text-right">
                           <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                                <a class="dropdown-item" href="/admin/pdf/it-training-program-form/{{ $tesda->user->id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                                <a class="dropdown-item restore" id="{{ $tesda->user->id }}"><i class="far fa-arrow-alt-circle-up"></i>Restore </a>
                              
                                
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
  </div>
  

    

 
   @include('userpage.modals.modal_loader')
   @include('admin.scriptassets')
   <script src="{{ asset('/js/tesda.js') }}"></script>





</body>
</html>

