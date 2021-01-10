$(document).ready(function () {

	$(document).on('click', '.clearprofilebtn', function() {
		var id = $(this).attr('id');
		var csrf_token = $('meta[name="_token"]').attr('content');
		Swal.fire({
          title: '<h2>Are you sure?</h2>',
          text: "Do you want to remove your profile?",
          type: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: 'gray',
          cancelButtonText: "Cancel",
          confirmButtonText: 'Remove',
          width: '450px',
          }).then((result) => {
          if (result.value) {
            $.ajax({
             url: "/remove-profile/" + id,
             type: "POST",
             dataType:"json",
             data:{'_token' : csrf_token},
             success:function(data)
             {
               if(data.success)
                {
                 window.location.reload(true);
                }
                if(data.sorry)
                {
                 Swal.fire({
                    title: "Cant't remove",
                    text:  data.sorry,
                    type: 'error',
                    confirmButtonColor: '#ff4444',
                    confirmButtonText: 'OK'
                    })
                }
             }
            })
           }
       })
	})


	$(document).on('click', '.colorcode', function(){
	  var colorcode = $(this).attr('id');
	  var user_id = $('#logged-id').val();
	  var csrf_token = $('meta[name="_token"]').attr('content');

	  if(colorcode == "bg-default" || colorcode == "bg-primary" || colorcode == "bg-info" || colorcode == "bg-success" || colorcode == "bg-danger" || colorcode == "bg-warning" || colorcode == "bg-dark")
	  {
	  	$.ajax({
             url: "/change-profile-color/" + user_id + '/' + colorcode,
             type: "POST",
             dataType:"json",
             data:{'_token' : csrf_token},
             success:function(data)
             {
               if(data.success)
                {
                 window.location.reload(true);
                }
                if(data.sorry)
                {
                 Swal.fire({
                    title: "Opps!",
                    text:  data.sorry,
                    type: 'error',
                    confirmButtonColor: '#ff4444',
                    confirmButtonText: 'OK'
                    })
                }
             }
            })
	  }
	  else
	  {
	  	 Swal.fire({
          title: "Opps!",
          text:  "Invalid Color",
          type: 'error',
          confirmButtonColor: '#ff4444',
          confirmButtonText: 'OK'
          })
	  }
	});


$('#profile_image').on('change',function(e){
    $('#aaa').remove();
    var image = $('#profile_image').val();
    
    $('#profileloader').css('display', 'block');
    if(image == '')
    {
      $('#aaa').remove();
      $('#profileloader').css('display', 'none');
      $('#originalprofile').show();
      $('.profileko').hide();
    }
    else
    {
      $('#originalprofile').hide();
      $('.profileko').hide();
      $('#originalprofile').hide();
      $('.button_profile').append('<div id="aaa">'+
                         '<button type="submit" class="btn btn-primary btn-sm">Save</button>' +
                        '<button class="btn btn-gray btn-sm" id="cancelprofile">Cancel</button>' +
                        '</div>');

      var reader = new FileReader();
      reader.onload = function(){
      var output ='<div class="profileko">' +
                    '<span class="rounded-circle profileko" >' +
                    '<img src="'+reader.result+'" class="rounded-circle" height="150px" width="150px" id="imgsource">'+
                    '</span>'+
                   '</div>';

                  
      $('.profileImage').append(output);
      $('#profileloader').css('display', 'none');
      };
      reader.readAsDataURL(event.target.files[0]);

    }
});

$(document).on('click', '#cancelprofile', function(){
      $('#profile_image').val('');
      $('#aaa').remove();
      $('#profileloader').css('display', 'none');
      $('#originalprofile').show();
      $('.profileko').hide();
});

$('#changeprofilesubmit').on('submit', function(event){

  event.preventDefault();
  $('#modal_loader').modal('show');
  var user_id = $('#logged-id').val();
  $.ajax({
    url:"/update-profile-pic/" + user_id,
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