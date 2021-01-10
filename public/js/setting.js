$(document).ready(function () {

	$('.yearfetch').datepicker({
         minViewMode: 2,
         format: 'yyyy'
 	});



  $(document).on('click', '.user_status', function(){
    var id = $(this).attr('id');
    $('#modal_loader').modal('show');
    $.ajax({
        url:"/user_status/"+id,
        type:"GET",
        success:function(data){ 
          $('#modal_loader').modal('hide');
          if(data.success)
          {
            toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
          }
          if(data.error)
          {
            toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});

          }

        }
    });


  });

  $(document).on('click', '.makeadmin', function(){
    var id = $(this).attr('id');

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to make this user as an admin. The user can access all data from the office!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        }).then((result) => {
        if (result.value) {
          // $('#modal_loader').modal('show');
          $.ajax({
            url:"/makeadmin/"+id,
            type:"GET",
            success:function(data){ 
              $('#modal_loader').modal('hide');
              if(data.success)
              {
                
                
                $("#adminuserTable").load(location.href + " #adminuserTable");
                $("#normaluserTable").load(location.href + " #normaluserTable");
                toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
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

  $(document).on('click', '.makenormaluser', function(){
    var id = $(this).attr('id');

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want this admin to be a normal user? The user will have limited access within the website.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        }).then((result) => {
        if (result.value) {
          // $('#modal_loader').modal('show');
          $.ajax({
            url:"/makenormaluser/"+id,
            type:"GET",
            success:function(data){ 
              $('#modal_loader').modal('hide');
              if(data.success)
              {
                
                
                $("#adminuserTable").load(location.href + " #adminuserTable");
                $("#normaluserTable").load(location.href + " #normaluserTable");
                toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
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


//event close or open
	$(document).on('click', '.event_id', function(){
		var id = $(this).attr('id');
    $('#modal_loader').modal('show');
		$.ajax({
        url:"/update_event_status/"+id,
        type:"GET",
        success:function(data){
          $('#modal_loader').modal('hide');
          if(data.success)
          {
          	toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
          }
          if(data.error)
          {
          	toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});

          }

        }
    });
	});

//change header picture in event pdf
	$(document).on('submit', '#changepdfheader', function(event){
		event.preventDefault();
		$('.btn-submit').prop('disabled', false);
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');
		$.ajax({
            url:"/updatepdfheader",
            type:"POST",
            data: new FormData(this),
          	contentType: false,
           	cache:false,
           	processData: false,
           	dataType:"json",
            success:function(data){
              
              if(data.success)
              {
              	toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
              	$("#preview").load(location.href + " #preview");
              	$('#changepdfheader')[0].reset();

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


	$(document).on('submit', '#ydaheadsubmit', function(event){
		event.preventDefault();

		$.ajax({
            url:"/updateydahead",
            type:"POST",
            data: new FormData(this),
          	contentType: false,
           	cache:false,
           	processData: false,
           	dataType:"json",
              success:function(data){
                
                if(data.success)
                {
                	toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                	$("#preview").load(location.href + " #preview");
                }
                if(data.error)
                {
                	toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});

                }

              }
          });
	});


	$(document).on('submit', '#changeyear', function(event){
		event.preventDefault();

		$.ajax({
          url:"/changeyear",
          type:"POST",
          data: new FormData(this),
        	contentType: false,
         	cache:false,
         	processData: false,
         	dataType:"json",
            success:function(data){
              
              if(data.success)
              {
              	toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
              }
              if(data.error)
              {
              	toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});

              }

            }
        });
	});
 



});