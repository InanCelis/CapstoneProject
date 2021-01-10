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
       <a href="{{ URL::previous() }}" class="btn btn-primary my-2"> Back</a>
       <div class="row">
            <div class="col-md-12">
	            <div class="card shadow container">
	               @foreach($accreditation as $accreditation)
	               <label class="description text-right display-3 my-2"> Date Registered : {{ \Carbon\Carbon::parse($accreditation->created_at)->format('M d, Y h:i A')}}</label>
	               	@if($accreditation->status == 0)
	               	<div class="my-2">
	               		<strong>Status:</strong> <label class="text-danger">Pending Applicant</label>
	               	</div>
	               	@elseif($accreditation->status == 1)
	               		<div class="my-2">
	               		<strong>Status:</strong> <label class="text-success">Accredited</label>
	               		</div>
	               		<label class="description display-3"> Date Accredited : {{ $accreditation->date_accredited }}</label>
          						<label class="description display-3"> Date of Expiration : {{ $accreditation->date_of_expiration }}</label>
          					@elseif($accreditation->status == 2)
          	               		<div class="my-2">
          	               		<strong>Status:</strong> <label class="text-danger">Expired</label>
          	               		</div>
          	               		<label class="description display-3"> Date Accredited : {{ $accreditation->date_accredited }}</label>
          						<label class="description display-3"> Date of Expiration : {{ $accreditation->date_of_expiration }}</label>
          					@elseif($accreditation->status == 3)
          	               		<div class="my-2">
          	               		<strong>Status:</strong> <label class="text-danger">For Approval</label>
          	               		</div>
          	               		<label class="description display-3"> Date Accredited : {{ $accreditation->date_accredited }}</label>
          						<label class="description display-3"> Date of Expiration : {{ $accreditation->date_of_expiration }}</label>
          					@elseif($accreditation->status == 4)
	               		<div class="my-2">
	               		<strong class="text-danger">This organization is in archive list</strong>
	               		</div>
	               	@endif


              		  <a href="{{ asset('/accreditation_file') }}/{{ $accreditation->logo }}" class="text-center my-3">
	                    <img src="{{ asset('/accreditation_file') }}/{{ $accreditation->logo }}" height="100px" width="100px">
	                    <br>
	                  </a>
	                <div class="row">
		             	<div class="col-md-4"></div>
		             	<div class="col-md-4">
		             		<h2 class="text-center text-dark">{{ $accreditation->name }}</h2>
		             	</div>
		             	<div class="col-md-4"></div>
	             	</div>

	             	<div class="container row text-center">
	             		<div class="col-md-6">
	             			<strong>President:</strong> 
	             			{{ $accreditation->user->first_name }} {{ $accreditation->user->last_name }}
	             			<br>
	             			<strong>Contact no.:</strong> 
	             			{{ $accreditation->user->contact }}
	             			<br>
	             			<strong>Email:</strong> 
	             			{{ $accreditation->user->email }}
	             		</div>
	             		<div class="col-md-6">
	             			<strong>Town / Origin:</strong> {{ $accreditation->town }} <br>
	             			<strong>Type of Org:</strong> {{ $accreditation->type }} <br>
	             			<strong>Number of Members:</strong> <b class="text-success">{{ $accreditation->member }} </b>Members <br>
	             		</div>
	             	</div>
	             	<div class="container my-3">
	             		<h3 class="my-2 text-center">Files</h3><br>
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
                             </div>
                          </div>
                          
                        </div>
	             	</div>
	               @endforeach
	            </div>
            </div>
        </div>
    </div>
    <br>
  </div>
  
   
   @include('admin.scriptassets') 
   <script src="{{ asset('/js/accreditation.js') }}"></script>
   @include('userpage.modals.modal_loader')

</body>
</html>




