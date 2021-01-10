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
       YDA - Laguna / Accreditation / {{ $pagename }} <br>
      </div>
     </div>
   </div>
   <!-- Page content -->
   <div class="container-fluid mt--7"> 
     <div class="row">
      <div class="col-md-12">
        <div class="card bg-white shadow">
            <div class="card-body"> 
              @if(count($accreditation))
                <div class="table-responsive container">
                  <h2>ACCREDITED ORGANIZATION</h2>
                   <table class="table align-items-center " id="accredited">
                      <thead class="thead-light">
                        <tr>
                           <th scope="col">Logo</th>
                           <th scope="col">Name of Organization</th>
                           <th scope="col">President</th>
                           <th scope="col">Town/Origin</th>
                           <th scope="col">Type</th>
                           <th scope="col">Members</th>
                        </tr>
                      </thead>
                      <tbody>
                   @foreach($accreditation->where('status', 1)->sortBy('date_of_expiration') as $accreditation_1)
                      
                        <tr>
                           <td>
                              <a href="/accreditation/organization/{{ str_random(100) }}/{{ $accreditation_1->id }}/{{ str_random(100) }}" data-toggle="tooltip" data-placement="top" title="View organization" class="text-center">
                                <img src="{{ asset('/accreditation_file') }}/{{ $accreditation_1->logo }}" height="50px" width="50px">
                              </a>
                            </td>
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
                           
                        </tr>
                   @endforeach
                      </tbody>
                   </table>
                 </div>
                @else
                <h3 class="text-center">No Organization.</h3>
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