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
       
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-header border-0">
                 <h2 class="mb-0">
                    AUDIT TRAILS
                 </h2>
               </div>
               <div class="table-responsive container">
                 <table class="table" id="myTable">
                    <thead class="thead-light">
                      <tr>
                         <th>Date</th>
						 <th >Admin</th>
						 <th>Action Message</th>
                      </tr>
                    </thead>
                    <tbody>
                  		@foreach($audits as $audit)
                  			<tr>
                  				<td>{{ \Carbon\Carbon::parse($audit->created_at)->format('d/m/Y h:i A')}}</td>
                  				<td>{{ $audit->user->first_name }} {{ $audit->user->last_name }}</td>
                  				<td>{!! nl2br($audit->action_message) !!}</td>
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
  


   <script type="text/javascript">
   	$(document).ready( function () {
	    $('#myTable').DataTable({
	    	"order": [[ 1, "desc" ]], //or asc 
	    	"columnDefs" : [{"targets":1, "type":"date"}],
	    });
	});
   </script>
 	
   @include('admin.scriptassets') 
   


</body>
</html>

