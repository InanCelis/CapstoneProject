function update1(){

	document.getElementById('updatenum').value = "1";
}

function update2(){

	document.getElementById('updatenum').value = "2"; 
}

function update3(){

	document.getElementById('updatenum').value = "3";
}

function update4(){

	document.getElementById('updatenum').value = "4";
}

$(document).ready(function () {
	

	$(document).on('click', '.update-status', function(){
		var id = $(this).attr('id');
		var updatenum = $('#updatenum').val();
		var csrf_token = $('meta[name="_token"]').attr('content');

		if(updatenum == 1 || updatenum == 2 || updatenum == 3 || updatenum == 4)
		{
			$('#modal_loader').modal('show');
			$.ajax({
		        url:'/update-applicant-status/' + id + '/' + updatenum,
		        type: "GET",
	            dataType:"json",
	            data:{'_token' : csrf_token},
		        success:function(data)
		        {
		          if(data.success){
		    //       	
					  toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
	           		  $("#pendingTable").load(location.href + " #pendingTable");
	           		  $("#ScreeningTable").load(location.href + " #ScreeningTable");
	           		  $("#pasokTable").load(location.href + " #pasokTable");
	           		  $("#ligwakTable").load(location.href + " #ligwakTable");
	           		  $("#counting").load(location.href + " #counting");
	           		  $('#modal_loader').modal('hide');
	     
		          }

		          else if(data.error)
		          {
			           toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
		          }
		          
		        }
	    	});
		}
		else
		{
			toastr.error('Something went wrong', 'Warning!', {timeOut:3000, progressBar:true});
		}
	});


	$(document).on('click', '.addeventremark', function(){

	  var id = $(this).attr('id');
	  $('#eventid').val(id);
	  $('#addeventremark').modal('show');


	});

	$('#add_event_remark').on('submit', function(event){
		event.preventDefault();
		var event_id = $('#eventid').val();
	  	$('.btn-submit').prop('disabled', false);
	  	$('.btn-submit').prop('disabled', true);
	    $('#modal_loader').modal('show');
	  	 $.ajax({
	      url:'/add-event-remark/' + event_id,
	      method:"POST",
	      data: new FormData(this),
	      contentType: false,
	      cache:false,
	      processData: false,
	      dataType:"json",
	      success:function(data)
	      {
	       if(data.errors)
	       {
	          for(var counts = 0; counts < data.errors.length; counts++)
	          {
	            Swal.fire({
	            title: 'Warning',
	            text: data.errors[counts], 
	            type: 'warning',
	            confirmButtonColor: '#ff4444',
	            confirmButtonText: 'OK'
	            })
	          }
	        }
	        if(data.success)
	        {
	          $('#add_event_remark')[0].reset();
	          $('#addeventremark').modal('hide');

	          toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
	          $("#pendingTable").load(location.href + " #pendingTable");
	          
	        }
	        if(data.error)
	        {
	           toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
	        }

	      

	       $('.btn-submit').prop('disabled', false);
	       $('#modal_loader').modal('hide');
	       

	      }
	    });

	});


	//remove remarks
$(document).on('click', '.remove_event_remarks', function(){
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You can't retrieve this remarks!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, remove it!',
      }).then((result) => {
      if (result.value) {
        
      var csrf_token = $('meta[name="_token"]').attr('content');
      var id = $(this).attr('id');


      $.ajax({
          url:'/remove_event_remarks/' + id,
          type: "GET",
          dataType:"json",
          data:{'_token' : csrf_token},

          success:function(data)
          {
          	if (data.success) 
          	{
          		$("#notice").load(location.href + " #notice");
          	}
          
            if(data.error)
	        {
	           toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
	        }
          }
        });
       }
    })
    
  });

	

});

