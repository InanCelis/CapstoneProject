@include('userpage.cssassets')

<body class="body">

<!-- Main content -->

@include('userpage.mainnav')
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
                  <h4 class="my-3 text-center"><u>ROSTER OF MEMBERS</u></h4>
                  <div class="table-responsive container"> 
                     <table class="table align-items-center " id="member">
                        <thead class="thead-light">
                          <tr>
                             <th scope="col">Name</th>
                             <th scope="col">Contact no.</th>
                             <th scope="col">Position</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($accreditation->tbl_organization_member as $member )
                            <tr>
                            <td>{{ $member->fullname }}</td>
                            <td>{{ $member->contact }}</td>
                            <td>{{ $member->position }}</td>
                          @endforeach
                        </tbody>
                     </table>
                   </div>
	              
	             @endforeach
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




