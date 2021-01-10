//accreditation status
function updateto_0(){

	document.getElementById('updatenum').value = "0";

}

function updateto_1(){

	document.getElementById('updatenum').value = "1";
	
}
 
function updateto_2(){

	document.getElementById('updatenum').value = "2";
	
}

function updateto_4(){

	document.getElementById('updatenum').value = "4";
	
}
 


//accreditation request status
function updaterequestto_0(){

  document.getElementById('updaterequestnum').value = "0";

}

function updaterequestto_1(){

  document.getElementById('updaterequestnum').value = "1";

}

function updaterequestto_2(){

  document.getElementById('updaterequestnum').value = "2";

}




$(document).ready(function () {
   $('.table').DataTable();

  $('#add_request').on('submit', function(event){
    event.preventDefault();
    $('#modal_loader').modal('show');
    Swal.fire({
          title: 'Are you sure?',
          text: "to send this request, this will not be editable anymore once submitted",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          }).then((result) => {
          if (result.value) {
             $('.btn-submit').prop('disabled', true);
              $.ajax({
                  url:"/add-request-accreditation",
                  method:"POST",
                  data: new FormData(this),
                  contentType: false,
                  cache:false,
                  processData: false,
                  dataType:"json",
                  success:function(data)
                  {
                   $('.btn-submit').prop('disabled', false);
                   $('#modal_loader').modal('hide');
                   if(data.success)
                   {
                    $('#requestmodal').modal('hide');
                    $('#add_request')[0].reset();
                    $(".requestlist").load(location.href + " .requestlist");
                    toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                   }

                   if(data.error)
                   {
                    toastr.error(data.error, 'Opps!', {timeOut:3000, progressBar:true});
                   }

                  }
            })

          }
        })

  });

  $('#add_organization_member').on('submit', function(event){
    event.preventDefault();
    $('#modal_loader').modal('show');
    $('.btn-submit').prop('disabled', true);
        $.ajax({
            url:"/add-member-organization",
            method:"POST",
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
             $('.btn-submit').prop('disabled', false);
             $('#modal_loader').modal('hide');


             if(data.success)
             {
              $('#add_organization_member')[0].reset();
              $(".requestlist").load(location.href + " .requestlist");
              toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
             }

             if(data.error)
             {
              toastr.error(data.error, 'Opps!', {timeOut:3000, progressBar:true});
             }

            }
      })

  });

//view accreditation message
  $(document).on('click', '.viewmessage', function(){
    var id = $(this).attr('id');
    $('#messagecontent').html('');
    $('#modal_loader').modal('show');
     $.ajax({
        url:'/view-accreditation-detail/' + id,
        type: "GET",
        dataType:"html",
        success:function(data){
          $('#messagecontent').html('');
          $('#messagecontent').html(data);    
          $('#viewdetail').modal('show');
          $('#modal_loader').modal('hide');  
        }
            
      });
  });


  $(document).on('click', '.deletemember', function(){
    var id = $(this).attr('id')
    $('#modal_loader').modal('show');

    Swal.fire({
      title: 'Are you sure?',
      text: "do you want to delete this member",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      }).then((result) => {
      if (result.value) {

        $.ajax({
          url:'/remove-oraganization-member/' + id,
          type: "GET",
          success:function(data){
             $('.btn-submit').prop('disabled', false);
             $('#modal_loader').modal('hide');


             if(data.success)
             {
             
              $(".requestlist").load(location.href + " .requestlist");
              toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
             }

             if(data.error)
             {
              toastr.error(data.error, 'Opps!', {timeOut:3000, progressBar:true});
             }
          }
              
        });
      }
    })
     


  });
  



  $(document).on('click', '.updaterequest', function(){
    var id = $(this).attr('id');
    $('#modal_loader').modal('show');
    var updatenum = $('#updaterequestnum').val();
    var csrf_token = $('meta[name="_token"]').attr('content');

    if(updatenum == 0 || updatenum == 1 || updatenum == 2)
    {
      $.ajax({
          url:'/update-request-status/' + id + '/' + updatenum,
          type: "GET",
            dataType:"json",
            data:{'_token' : csrf_token},
          success:function(data)
          {
            if(data.success)
            {       
                toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                $("#pendingreqtable").load(location.href + " #pendingreqtable");
                $("#approvetable").load(location.href + " #approvetable");
                $("#archivetable").load(location.href + " #archivetable");
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

	//update status of accrediation
	$(document).on('click', '.update-stat', function(){
		var id = $(this).attr('id');
		var updatenum = $('#updatenum').val();
		var csrf_token = $('meta[name="_token"]').attr('content');

		if(updatenum == 0 || updatenum == 1 || updatenum == 2 || updatenum == 4)
		{
			Swal.fire({
		      title: 'Are you sure?',
		      text: "to make this action, it will notify to the user's involved",
		      type: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Yes',
		      }).then((result) => {
		      if (result.value) {
              $('#modal_loader').modal('show');
			      	$.ajax({
				        url:'/update-accreditation-status/' + id + '/' + updatenum,
				        type: "GET",
			            dataType:"json",
			            data:{'_token' : csrf_token},
				        success:function(data)
				        {
				          if(data.success)
				          {      	
							  toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
			           		  $("#pendingaccreditation").load(location.href + " #pendingaccreditation");
			           		  $("#accredited").load(location.href + " #accredited");
			           		  $("#expired").load(location.href + " #expired");
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
		    })
			
		}
		else
		{
			toastr.error('Something went wrong', 'Warning!', {timeOut:3000, progressBar:true});
		}
	});

	//register new applicant
	$('#add_accreditation').on('submit', function(event){
		event.preventDefault();
    $('#subIcon').removeClass('ni ni-send');
    $('#subIcon').addClass('fas fa-spinner fa-spin');
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');
		$.ajax({
          url:'/accreditation/new-applicant',
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
            
            
               Swal.fire({
               title: 'Warning',
               text: data.errors, 
               type: 'warning',
               confirmButtonColor: '#ff4444',
               confirmButtonText: 'OK'
               })
           
           }
           else if(data.success)
           {
            Swal.fire({
               title: 'Successfully!',
               text:  data.success,
               type: 'success',
               confirmButtonColor: '#00C851',
               confirmButtonText: 'OK'
               })
            $("#refresh").load(location.href + " #refresh");
           }
         
               $('#subIcon').removeClass('fas fa-spinner fa-spin');
               $('#subIcon').addClass('ni ni-send');
               $('.btn-submit').prop('disabled', false);
               $('#modal_loader').modal('hide');
               
               
               
          }
        })
	});
	
	$(document).on('click', '.showinputreq', function(){
		$('.edit_requirements').show();
		$('#editbutton').text('Cancel');
		$('#editbutton').removeClass('showinputreq');
    $('#editbutton').addClass('cancel');

	});

	$(document).on('click', '.cancel', function(){
		$('.edit_requirements').hide();
		$('#editbutton').text('Edit Requirements');
		$('#editbutton').addClass('showinputreq');
    $('#editbutton').removeClass('cancel');
    $('.lamanngfile').val('');
	});

	$(document).on('click', '.accred_remark', function(){

		var id = $(this).attr('id');
  
  		$('#accred_userid').val(id);

 		$('#accred_remark_modal').modal('show');
	});
	
	//add remark 
	$('#remark_accred').on('submit', function(event){
	  event.preventDefault();
	  var userid = $('#accred_userid').val();
	  $('.btn-submit').prop('disabled', false);
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');
	    $.ajax({
	      url:'/add-remark-accreditation/' + userid,
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
	          $('#remark_accred')[0].reset();
	          $('#accred_remark_modal').modal('hide');

	          toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
	          
	          
	          
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


	//update info accreditation
	$('#update_info').on('submit', function(event){
		event.preventDefault();
    $('#subIcon').removeClass('ni ni-send');
    $('#subIcon').addClass('fas fa-spinner fa-spin');
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');
		$.ajax({
          url:'/update_accreditation',
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
               Swal.fire({
               title: 'Warning',
               text: data.errors, 
               type: 'warning',
               confirmButtonColor: '#ff4444',
               confirmButtonText: 'OK'
               })
           
           }
           else if(data.success)
           {
            Swal.fire({
               title: 'Successfully!',
               text:  data.success,
               type: 'success',
               confirmButtonColor: '#00C851',
               confirmButtonText: 'OK'
               })
            $("#reload").load(location.href + " #reload");
           }
           
               $('#subIcon').removeClass('fas fa-spinner fa-spin');
               $('#subIcon').addClass('ni ni-send');
               $('.btn-submit').prop('disabled', false);
               $('#modal_loader').modal('hide');
               
               
               
          }
        })

	});

	//renew registration
	$('#renewal_accreditation').on('submit', function(event){
		event.preventDefault();
    $('#subIcon').removeClass('ni ni-send');
    $('#subIcon').addClass('fas fa-spinner fa-spin');
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');
		$.ajax({
          url:'/accreditation/renewal',
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
            
            
               Swal.fire({
               title: 'Warning',
               text: data.errors, 
               type: 'warning',
               confirmButtonColor: '#ff4444',
               confirmButtonText: 'OK'
               })
           
           }
           else if(data.success)
           {
            Swal.fire({
               title: 'Successfully!',
               text:  data.success,
               type: 'success',
               confirmButtonColor: '#00C851',
               confirmButtonText: 'OK'
               })
            $("#reload").load(location.href + " #reload");
           }
           
               $('#subIcon').removeClass('fas fa-spinner fa-spin');
               $('#subIcon').addClass('ni ni-send');
               $('.btn-submit').prop('disabled', false);
               $('#modal_loader').modal('hide');
               
               
               
          }
        })

	});

 //remove remarks
$(document).on('click', '.remove_accreditation_remarks', function(){
    
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
      $.ajax({
          url:'/remove-accreditation-remarks',
          type: "GET",
          dataType:"json",
          data:{'_token' : csrf_token},

          success:function(data)
          {

           $("#notice").load(location.href + " #notice");
            
          }
        });
       }
    })
    
  });
	
  $('#add_feedback').on('submit', function(event){
      event.preventDefault();
      var id = $('#req_id').val();
      $('#modal_loader').modal('show');

      $('.btn-submit').prop('disabled', true);
        $.ajax({
            url:"/add-feedback",
            method:"POST",
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
              $('.btn-submit').prop('disabled', false);
              $('#modal_loader').modal('hide');
            
             if(data.success)
             {
              toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
              $('#viewdetail').modal('hide');
              $("#specific_"+id).load(location.href + " #specific_"+id);
             }

             if(data.error)
             {
              toastr.error(data.error, 'Opps!', {timeOut:3000, progressBar:true});
             }

            }
        })
  });

});
