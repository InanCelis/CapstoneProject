$(document).ready(function () {

	$(document).on('click', '.movetoarchive', function(){

		var id = $(this).attr('id');
		var csrf_token = $('meta[name="_token"]').attr('content');
        Swal.fire({
        title: 'Are you sure?',
        text: "This announcement will not show to public.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, move it!',
        }).then((result) => {
        if (result.value) {

        $.ajax({
            url:"/announcement/movetoarchive/"+id,
            type: "GET",
            data:{'_token' : csrf_token},
            success:function(data){
        
              if (data.success) 
              {
              	toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                $(".action_button").load(location.href + " .action_button");
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

	$(document).on('click', '.restore', function(){

		var id = $(this).attr('id');
		var csrf_token = $('meta[name="_token"]').attr('content');
        Swal.fire({
        title: 'Are you sure?',
        text: "This announcement will show to public.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, restore it!',
        }).then((result) => {
        if (result.value) {

        $.ajax({
            url:"/announcement/restore/"+id,
            type: "GET",
            data:{'_token' : csrf_token},
            success:function(data){
        
              if (data.success) 
              {
              	toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                $(".action_button").load(location.href + " .action_button");
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

	var page = 1;
	$(document).on('click', '.seemoreannouncement', function(){
		page = page + 1;
        $('#loadings').show();
        $.ajax({ 
        url:'/fetch/announcement?page='+page,
        success:function(data)
        {
          if(data == "")
          {
            $('.seemoreannouncement').text('No more announcement');
            $('.seemoreannouncement').prop('disabled', true);
            $('#loadings').hide();
          }
          else
          {
            $('#fetchannouncement').append(data);
            $('#loadings').hide();
          }
          
        }
      });

	});

	var page = 1;
	$(document).on('click', '.seemorearchive', function(){
		page = page + 1;
        $('#loadings').show();
        $.ajax({ 
        url:'/fetch/announcement/archive?page='+page,
        success:function(data)
        {
          if(data == "")
          {
            $('.seemorearchive').text('No more archive announcement');
            $('.seemorearchive').prop('disabled', true);
            $('#loadings').hide();
          }
          else
          {
            $('#fetchannouncement').append(data);
            $('#loadings').hide();
          }
          
        }
      });

	});

	
});