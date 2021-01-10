$(document).ready(function () {

  $('.btn-submit').prop('disabled', false);


//close reset
$(document).on('click', '.closereset', function(){
  $('#resetpassword').css('display', 'none');
  $('.forgot_password').prop('disabled', false);          


});
 

//show reset password
$(document).on('click', '.forgot_password', function(){
  var user_id = $('#logged-id').val();
  $('#modal_loader').modal('show');
  $('#resetpassword').css('display', 'block');
  $.ajax({
            url:'/get_auth_to_reset_password/' + user_id,
            type: "GET",
            dataType:"html",
          
            
        })

        .done(function(data){
          $('#resetpassword').html('');
          $('#resetpassword').html(data);
          $('#modal_loader').modal('hide');
          $('.forgot_password').prop('disabled', true);          

        })

        .fail(function(data){
          $('#resetpassword').css('display', 'none');
          $('#modal_loader').modal('hide');

        });
})



//get all barangay according to selected town
$(document).on('change', '#town', function(){

	    var id = $(this).val();

      
	    $.ajax({
	        url:"/get_brgy/"+id,
	        dataType:"json",
	        success:function(html){
	          // alert(html.data);
	          $('#barangay').html(html.data);
	        }

	    });

	});



//updating password
$('#updatepassword').on('submit', function(event)
 {
  event.preventDefault();
  $('#modal_loader').modal('show');
  $('#passwordvalidator').html('');
  var user_id = $('#logged-id').val();
  $('.btn-submit').prop('disabled', true);
  $.ajax({
      url:"/update_password/" + user_id,
      method:"POST",
      data: new FormData(this),
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
      
      success:function(data)
      {
       $('.btn-submit').prop('disabled', false);
       if(data.errors)
       {
        for(var count = 0; count < data.errors.length; count++)
        {
          $('#passwordvalidator').html('');
          $('#passwordvalidator').html(data.errors[count]);
          
        }
       }
       if(data.mali)
       {
        $('#passwordvalidator').html('');
        $('#passwordvalidator').html(data.mali);
       }
       if(data.success)
       {
        window.location.reload(true);
       }
       if(data.sorry)
       {
        Swal.fire({
          title: "Sorry!",
          text:  data.sorry,
          type: 'error',
          confirmButtonColor: '#ff4444',
          confirmButtonText: 'OK'
          })
        }
         $('#modal_loader').modal('hide');
      }
})
 });


//updating username
$('#updateUsername').on('submit', function(event)
  {
    event.preventDefault();
    $('.btn-submit').prop('disabled', true);
    var user_id = $('#logged-id').val();
    $('#modal_loader').modal('show');
    $('#usernamevalidator').html('');
    $.ajax({
              url:"/update_username/" + user_id,
              method:"POST",
              data: new FormData(this),
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
             
              success:function(data)
              {
               $('.btn-submit').prop('disabled', false);
               if(data.errors)
               {
                for(var count = 0; count < data.errors.length; count++)
                {
                  $('#usernamevalidator').html('');
                  $('#usernamevalidator').html(data.errors[count]);
                  
                }
               }
               if(data.success)
               {
                window.location.reload(true);
               }
               if(data.sorry)
               {
                Swal.fire({
                  title: "Sorry!",
                  text:  data.sorry,
                  type: 'error',
                  confirmButtonColor: '#ff4444',
                  confirmButtonText: 'OK'
                  })
               }
                 $('#modal_loader').modal('hide');
              }
        })

  });




// updating user info
	$('#updateprofileInfo').on('submit', function(event)
	{
	  event.preventDefault();
    $('.btn-submit').prop('disabled', true);
	  var user_id = $('#logged-id').val();
    $('#modal_loader').modal('show');
	 $.ajax({
              url:"/update_info/" + user_id,
              method:"POST",
              data: new FormData(this),
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
              success:function(data)
              {
               $('.btn-submit').prop('disabled', false);
               if(data.errors)
               {
                for(var count = 0; count < data.errors.length; count++)
                {
                  Swal.fire({
                  title: 'Warning',
                  text: data.errors[count], 
                  type: 'warning',
                  confirmButtonColor: '#ff4444',
                  confirmButtonText: 'OK'
                  })
                  
                }
               }
               if(data.success)
               {
                window.location.reload(true);
               }
               if(data.sorry)
               {
                Swal.fire({
                  title: "Sorry!",
                  text:  data.sorry,
                  type: 'error',
                  confirmButtonColor: '#ff4444',
                  confirmButtonText: 'OK'
                  })
               }
                 $('#modal_loader').modal('hide');
              }
		    })

	});

});