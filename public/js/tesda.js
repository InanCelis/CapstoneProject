$(document).ready(function () {

  $(document).on('click', '.mark-completed', function(){
    var id = $(this).attr('id');
    var csrf_token = $('meta[name="_token"]').attr('content');

    $.ajax({
      url:'/mark-completed/' + id,
      type: "GET",
      dataType:"json",
      data:{'_token' : csrf_token},

      success:function(data)
      { 
        if(data.success){
  //        
            toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
            
            $("#batchestable").load(location.href + " #batchestable");
            $("#counting").load(location.href + " #counting");
            $("#allbatch").load(location.href + " #allbatch");
 
        }

        else if(data.error)
        {
           toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
        }
        
      }
    });

  });

  $(document).on('click', '.mark-unfinish', function(){
    var id = $(this).attr('id');
    var csrf_token = $('meta[name="_token"]').attr('content');

    $.ajax({
      url:'/mark-unfinish/' + id,
      type: "GET",
      dataType:"json",
      data:{'_token' : csrf_token},

      success:function(data)
      {
        if(data.success){
  //        
            toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
            
            $("#batchestable").load(location.href + " #batchestable");
            $("#counting").load(location.href + " #counting");
            $("#allbatch").load(location.href + " #allbatch");
 
        }

        else if(data.error)
        {
           toastr.error(data.error, 'Warning!', {timeOut:8000, progressBar:true});
        }
        
      }
    });
 
  });
  
  $(document).on('click', '.deletebatch', function(){
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You can't retrieve this group!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        }).then((result) => {
        if (result.value) {
          var id = $(this).attr('id');
          var csrf_token = $('meta[name="_token"]').attr('content');
        $.ajax({
            url:'/delete-batch/' + id,
            type: "GET",
            dataType:"json",
            data:{'_token' : csrf_token},

            success:function(data)
            {
              if(data.success){
        //        
                  toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                  
                  $("#batchestable").load(location.href + " #batchestable");
                  $("#counting").load(location.href + " #counting");
                  $("#allbatch").load(location.href + " #allbatch");
       
              }

              else if(data.error)
              {
                 toastr.error(data.error, 'Warning!', {timeOut:8000, progressBar:true});
              }
              
            }
          });
         }
      })
    
  });

  $(document).on('click', '.editbatch', function(){
    var id = $(this).attr('id');

    $('#batch_content').html('');  
    $('#modal_loader').modal('show');

      $.ajax({
        url:'/edit-batch/' + id,
        type: "GET",
        dataType:"html",
            
        })

        .done(function(data){
          $('#batch_content').html('');
          $('#batch_content').html(data);    
          $('#edit_batch').modal('show');
          $('#modal_loader').modal('hide');   
          $("#allbatch").load(location.href + " #allbatch");


        })

        .fail(function(){


        });

  });

$(document).on('click', '.addtobatch', function(){
    var id = $(this).attr('id');
    $('#show_batch_content').html('');  
    $('#modal_loader').modal('show');
 
      $.ajax({
        url:'/show-batch/' + id,
        type: "GET",
        dataType:"html",
            
        })

        .done(function(data){
          $('#show_batch_content').html('');
          $('#show_batch_content').html(data);    
          $('#show_batch').modal('show');
          $('#modal_loader').modal('hide');   

        })

        .fail(function(){


        });
});






//show add remark modal
 $(document).on('click', '.tesda_remark', function(){
  var id = $(this).attr('id');
  
  $('#tesdauserid').val(id);

  $('#addremark').modal('show');

 });




 //add remark 
$('#add_remark').on('submit', function(event){
  event.preventDefault();
  var userid = $('#tesdauserid').val();
  $('.btn-submit').prop('disabled', true);
  $('#modal_loader').modal('show');
    $.ajax({
      url:'/add-remark/' + userid,
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
          $('#add_remark')[0].reset();
          $('#addremark').modal('hide');

          toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
          $("#weekdaystable").load(location.href + " #weekdaystable");
          $("#weekendtable").load(location.href + " #weekendtable");
          $("#memberfetch").load(location.href + " #memberfetch");
          $("#fetchmember").load(location.href + " #fetchmember");
          
          
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

$(document).on('click', '.restore', function(){
  Swal.fire({ 
    title: 'Are you sure?',
    text: "Do you want to restore this apllicant?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, restore it!',
    }).then((result) => {
    if (result.value) {
      var id = $(this).attr('id');
      var csrf_token = $('meta[name="_token"]').attr('content');
        $.ajax({
              url:'/tesda-restore/' + id,
              type: "GET",
              dataType:"json",
              data:{'_token' : csrf_token},

              success:function(data)
              {

                if(data.success)
                {

                    toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                   
                    $("#counting").load(location.href + " #counting");
                    $("#weekdaystable").load(location.href + " #weekdaystable");
                    $("#weekendtable").load(location.href + " #weekendtable");
                }

                else if(data.error)
                {
                   toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
                }
                
              }
          });
      }
  })

});


$(document).on('click', '.move-archive', function(){

    Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to move it in archive list?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, move it!',
    }).then((result) => {
    if (result.value) {
      var id = $(this).attr('id');
      var csrf_token = $('meta[name="_token"]').attr('content');
        $.ajax({
              url:'/tesda-move-archive/' + id,
              type: "GET",
              dataType:"json",
              data:{'_token' : csrf_token},

              success:function(data)
              {

                if(data.success)
                {

                    toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
                   
                    $("#counting").load(location.href + " #counting");
                    $("#weekdaystable").load(location.href + " #weekdaystable");
                    $("#weekendtable").load(location.href + " #weekendtable");
                }

                else if(data.error)
                {
                   toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
                }
                
              }
          });
     }
  })
});





//adding batch
	$('#add_bacth').on('submit', function(event){
    event.preventDefault();
    $('.btn-submit').prop('disabled', true);
    $('#modal_loader').modal('show');

    $.ajax({
      url:'/add-batch',
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
          $('#add_bacth')[0].reset();
          $('#addbatch').modal('hide');

          toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
          $("#batchestable").load(location.href + " #batchestable");
          $("#counting").load(location.href + " #counting");
          $("#allbatch").load(location.href + " #allbatch");
          
        }
       $('.btn-submit').prop('disabled', false);
       $('#modal_loader').modal('hide');
       

      }
    });
  });


//user register training
 $('#add_training').on('submit', function(event){
 	event.preventDefault();
 	$('.btn-submit').prop('disabled', true);
  $('#subIcon').removeClass('ni ni-send');
  $('#subIcon').addClass('fas fa-spinner fa-spin');
      $.ajax({
      url:'/add-training',
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
       	  Swal.fire({
           title: 'Thank You',
           text:  data.success,
           type: 'success',
           confirmButtonColor: '#00C851',
           confirmButtonText: 'OK'
           })
       } 

      	   $("#notice").load(location.href + " #notice");
       	   $('.btn-submit').prop('disabled', false);
           $('#subIcon').removeClass('fas fa-spinner fa-spin');
           $('#subIcon').addClass('ni ni-send');
           $('html, body').animate({scrollTop:0}, '300');
          
           
      }
    });  
  });



 //remove remarks
$(document).on('click', '.remove_remarks', function(){
    
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
          url:'/remove-remarks',
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


  //fetchmember
  $(document).on('change', '#batches', function(){

        var id = $(this).val();

        // 
        $.ajax({
            url:"/fetchmember/"+id,
            success:function(data){
        
              if (data.error) 
              {
                Swal.fire({
                 title: 'Warning',
                 text: data.error, 
                 type: 'warning',
                 confirmButtonColor: '#ff4444',
                 confirmButtonText: 'OK'
                })
              }
              else 
              {
                $('#fetchmember').html(data);
               
              }
            }
        });

    });

  $(document).on('click', '.movepending', function(){
    var id = $(this).attr('id');
    $.ajax({
        url:"/pending/"+id,
        success:function(data){
         if(data.success)
         {
            toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
            $("#fetchmember").load(location.href + " #fetchmember");
            $("#counting").load(location.href + " #counting");
            $("#weekendtable").load(location.href + " #weekendtable");
            $("#weekdaystable").load(location.href + " #weekdaystable");
             


         }

         if(data.error)
         {
           toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
         }
        }
    });

  });

 $(document).on('click', '.changestatus', function(){
   var id = $(this).attr('id');
   $.ajax({
        url:"/memberchangestatus/"+id,
        success:function(data){
         if(data.success)
         {
            toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
            $("#fetchmember").load(location.href + " #fetchmember");
            $("#counting").load(location.href + " #counting");
         }

         if(data.error)
         {
           toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
           
         }
        }
    });
 });
  

});