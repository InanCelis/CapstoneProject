<h2 class="text-success">Your organization is already accredited</h2>
<label class="description display-3"> Date Accredited : {{ $accreditation->date_accredited }}</label><br>
<label class="description display-3"> Date of Expiration : {{ $accreditation->date_of_expiration }}</label><br>


@if($accreditation->status == 1)
<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#requestmodal"><i class="fas fa-plus"></i> Add request</button>

<div class="requestlist">
	@if(count($acc_request))
		<div class="table-responsive container my-5">
			<h2>REQUESTS</h2>
		   <table class="table align-items-center " id="requesttable"> 
		      <thead class="thead-light">
		        <tr>
		           <th scope="col">Date Request</th>
		           <th scope="col">Message</th>
		           <th scope="col">Feedback</th>
		           <th scope="col">Status</th>
		           <th scope="col">Action</th>
		        </tr>
		      </thead>
		      <tbody>
		      	@foreach($acc_request as $req )
			      	<tr>
			    		<td>{{ \Carbon\Carbon::parse($req->created_at)->format('M d, Y h:i A')}}</td>
			    		<td><p class="text-sm" title="{{ $req->message }}">{{ str_limit( $req->message, 20) }}</p></td>
			    		<td><p class="text-sm" title="{{ $req->feedback }}">{{ str_limit( $req->feedback, 20) }}</p></td>
			    		@if($req->status == 0)
                <td class="text-danger">PENDING</td>
			    		@elseif($req->status == 1)
			    			<td class="text-success">APPROVED</td>
              @else
                <td class="text-warning">DISAPPROVED</td>
			    		@endif
			    		<td><a class="viewmessage btn btn-sm btn-round btn-success text-white" id="{{ $req->id }}" data-toggle="tooltip" data-placement="bottom" title="view"><i class="fa fa-eye"></i></a></td>
			        </tr>
		        @endforeach
		      </tbody>
		   </table>
		 </div>
	 @endif

	 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmember"><i class="fas fa-plus"></i> Add member</button>
	@if(count($organization_member))
		<div class="table-responsive container my-5">
			<h2>ORGANIZATION MEMBERS</h2>
		   <table class="table align-items-center " id="member">
		      <thead class="thead-light">
		        <tr>
		           <th scope="col">Date Added</th>
		           <th scope="col">Name</th>
		           <th scope="col">Contact no.</th>
		           <th scope="col">Position</th>
		           <th scope="col">Action</th>
		        </tr>
		      </thead>
		      <tbody>
		      	@foreach($organization_member as $member )
			      	<tr>
			    		<td>{{ \Carbon\Carbon::parse($member->created_at)->format('M d, Y h:i A')}}</td>
			    		<td>{{ $member->fullname }}</td>
			    		<td>{{ $member->contact }}</td>
			    		<td>{{ $member->position }}</td>
			    		<td><a class="deletemember btn btn-sm btn-round btn-danger text-white" id="{{ $member->id }}" data-toggle="tooltip" data-placement="bottom" title="remove"><i class="fa fa-trash"></i></a></td>
			        </tr>
		        @endforeach
		      </tbody>
		   </table>
		 </div>
	 @endif

	

 </div>

<!-- add request -->
<div class="modal fade" id="requestmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="add_request" method="POST">
          <div class="modal-body ">
             @csrf
             <div class="row">
               <div class="col-lg-12">
                 <div class="form-group">
                  <label class="form-control-label" for="input-school">Request Message</label>
                  <textarea rows="8 " class="form-control form-control-alternative" name="message_request" placeholder="Request Message" ></textarea>
                 </div>
               </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm btn-submit"><i class="ni ni-send"></i> send</button>
          </div>
        </form>
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



<!-- add member -->
<div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="add_organization_member" method="POST">
          <div class="modal-body ">
             @csrf
             <div class="row">
               <div class="col-lg-12">
                 <div class="form-group">
                  <label class="form-control-label">Full name</label>
                  <input type="text" class="form-control form-control-alternative" name="fullname" required>
                 </div>
                 <div class="form-group">
                  <label class="form-control-label">Contact number</label>
                  <input type="number" class="form-control form-control-alternative" name="contact" required>
                 </div>
                 <div class="form-group">
                  <label class="form-control-label">Position</label>
                  <input type="text" class="form-control form-control-alternative" name="position" required>
                 </div>
               </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm btn-submit"><i class="ni ni-send"></i> Add</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endif