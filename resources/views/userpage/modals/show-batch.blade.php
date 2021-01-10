<div class="modal-header ">
    <h3 class="modal-title" id="exampleModalLabel">Update Batch</h3>
    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
	@foreach($batch as $batch)
		<form id="update_batch" method="POST">
		     @csrf
		     <div class="col-md-12">
		       <div class="form-group">
		          <label class="form-control-label" for="batch_name">Batch Name</label>
		          <div class="input-group input-group-alternative mb-4">
		            <input class="form-control form-control-alternative" id="batch_names" name="batch_names" placeholder="Batch Name" type="text" required value="{{ $batch->batch_name }}">
		          </div>
		       </div>

		       @if(count($tesda)  == 0)
			       <div class="form-group">
			          <label class="form-control-label" for="input-school-name"> Schedule</label>
			          <div class="custom-control custom-radio mb-4">
			            <input name="schedules" class="custom-control-input" id="weekends" type="radio" value="1" required {{ ($batch->schedule==1)? "checked" : "" }}>
			            <label class="custom-control-label" for="weekends" >Weekend</label> 
			          </div>
			          <div class="custom-control custom-radio mb-4">
			            <input name="schedules" class="custom-control-input" id="weekdayss" type="radio" value="2" required {{ ($batch->schedule==2)? "checked" : "" }}>
			            <label class="custom-control-label" for="weekdayss" >Weekdays</label>
			          </div>
			       </div>
			       @else
			       <p class="text-sm h3"><strong class="text-danger">Notice:</strong> This batch has connection so you can edit batch name only.</p>
			    @endif
		     </div>
		  <div class="modal-footer">
		    <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
		    <button type="submit" class="btn btn-primary btn-sm btn-submit"><i class="ni ni-send"></i> update</button>
		  </div>
		</form>
	@endforeach
</div>

<script type="text/javascript">
	$('#update_batch').on('submit', function(event){
    event.preventDefault();
    var id = {{ $id }} ;
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');
	$.ajax({
	    url:'/update-batch/' + id,
	    method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
	    success:function(data)
	    {
	      if(data.success){
	      	
			  toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
			  $('.btn-submit').prop('disabled', false);
			  $('#modal_loader').modal('hide');   
			  $('#edit_batch').modal('hide');
			  $("#batchestable").load(location.href + " #batchestable");
              $("#counting").load(location.href + " #counting");
              $("#allbatch").load(location.href + " #allbatch");
	      }

	      else if(data.error)
	      {	
	           Swal.fire({
                title: 'Warning',
                text: data.error, 
                type: 'warning',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                })
	           $('.btn-submit').prop('disabled', false);
			   $('#modal_loader').modal('hide'); 
	      }
	      
	    }
	});

	});
	
</script>