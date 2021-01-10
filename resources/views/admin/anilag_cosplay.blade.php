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
                         <h5 class="card-title text-uppercase text-muted mb-0">Registered</h5>
                         <span class="h2 font-weight-bold mb-0">{{ number_format(count($event)) }}</span>
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
                           <h5 class="card-title text-uppercase text-muted mb-0">Verified</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($event->where('status', 1))) }}</span>
                         </div>
                         <div class="col-auto">
                           <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                              <i class="fas fa-user-check"></i>
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
                           <h5 class="card-title text-uppercase text-muted mb-0">Not Verified</h5>
                           <span class="h2 font-weight-bold mb-0">{{ number_format(count($event->where('status', 0))) }}</span>
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
               <div class="col-xl-3 col-lg-6">
                 <div class=" card-stats mb-4 mb-xl-0 bg-secondary" >
                    <div class="card-body">
                      <div class="row">
                         <div class="col">
                           <h5 class="card-title text-uppercase text-muted mb-0"></h5>
                           <span class="h2 font-weight-bold mb-0"></span>
                         </div>
                         <div class="col-auto">
                           
                         </div>
                      </div>
                    </div>
                 </div>
               </div>
           </div><br>
           {{-- table --}}
           <h3>{{ $pagename }} {{ $year}} Record list</h3>
           <div class="row">
            <div class="col-md-12">
              <div class="card shadow">
                 <div class="card-header border-0">
                   <h3 class="mb-0">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-times"></i>
                      </div> 
                        Not Verified
                   </h3>
                 </div>
                 <div class="table-responsive container">
                     <table class="table align-items-center " id="ScreeningTable">
                        <thead class="thead-light">
                          <tr>
                             <th scope="col">No.</th>
                             <th scope="col">Name</th>
                             <th scope="col">Address</th>
                             <th scope="col">Date Registered</th>
                             <th scope="col">Status</th>
                             <th scope="col">Action</th>
                             
                          </tr>
                        </thead>
                        <tbody>
                      @php $count1 = 1; @endphp
                     @foreach($event->where('status', 0) as $event_2)
                        
                          <tr>
                             <td>{{ $count1++ }}.</td>
                             <th class="text-dark">{{ $event_2->first_name }} {{ $event_2->last_name }}</th>
                             <td>{{ $event_2->barangay }} {{ $event_2->municipality }}, {{ $event_2->province }}</td>
                             <td>
                               {{ \Carbon\Carbon::parse($event_2->created_at)->format('M d, Y h:i A')}}
                             </td>
                             <td class="text-white"><label class="bg-danger">not verified</label></td>
                             <td class="text-right">
                               <div class="dropdown">
                                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="/admin/pdf/anilag-cosplay/{{ $event_2->id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
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
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                         <i class="fas fa-user-check"></i>
                      </div> 
                      Verified
                   </h3>
                 </div>
                 <div class="table-responsive container">
                   <table class="table align-items-center " id="pendingTable">
                      <thead class="thead-light">
                        <tr>
                           <th scope="col">No.</th>
                           <th scope="col">Name</th>
                           <th scope="col">Address</th>
                           <th scope="col">Date Registered</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                    @php $count1 = 1; @endphp
                   @foreach($event->where('status', 1) as $event_1)
                      
                        <tr>
                           <td>{{ $count1++ }}.</td>
                           <th class="text-dark">{{ $event_1->first_name }} {{ $event_1->last_name }}</th>
                           <td>{{ $event_1->barangay }} {{ $event_1->municipality }}, {{ $event_1->province }}</td>
                           <td>
                             {{ \Carbon\Carbon::parse($event_1->created_at)->format('M d, Y h:i A')}}
                           </td>
                           <td class="text-white"><label class="bg-success">verified</label></td>
                           <td class="text-right">
                             <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  <a class="dropdown-item" href="/admin/pdf/anilag-cosplay/{{ $event_1->id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
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
  
   @include('userpage.includes.sms-modal')
   @include('userpage.modals.modal_loader')
   @include('admin.scriptassets') 
  <script src="{{ asset('/js/update-applicant-status.js') }}"></script>
</body>
</html>



