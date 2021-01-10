<div class="modal-header ">
    <h3 class="modal-title" id="exampleModalLabel">{{ $sched }} Batch</h3>
    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="movetobatch" method="POST">
 @csrf
 <div class="modal-body">
  <div class="col-md-12">
	  <div class="form-group">
	      <select class="form-control input-group-alternative mb-3" name="batch" id="batch" required autocomplete="bacth" autofocus required>
	        <option disabled="" selected="" value="">- Batch -</option>
	        @foreach($batch as $batch)
	        <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
	       @endforeach
	      </select>
	  </div>
	</div>
 </div>
 <div class="modal-footer">
	<button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary btn-sm btn-submit"><i class="ni ni-send"></i> move</button>
 </div>
</form>

<script type="text/javascript">
	$('#movetobatch').on('submit', function(event){
   		event.preventDefault();
   		var id ={{ $id }};
   		$('.btn-submit').prop('disabled', true);
        $('#modal_loader').modal('show');
   		$.ajax({
	    url:'/move-batch/' + id,
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
			  $('#show_batch').modal('hide');
			  $("#weekendtable").load(location.href + " #weekendtable");
			  $("#weekdaystable").load(location.href + " #weekdaystable");
              $("#counting").load(location.href + " #counting");
         	  $("#allbatch").load(location.href + " #allbatch");
         	  $("#fetchmember").load(location.href + " #fetchmember");

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

