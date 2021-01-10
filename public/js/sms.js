$(document).ready(function () {

	$(document).on('click', '.showsmsmodal', function()
	{
		var event_id = $(this).attr('id');
		$('#SMScontent').html('');  
    $('#modal_loader').modal('show');

    	$.ajax({
            url:'/send-sms-notification/' + event_id,
            type: "GET",
            dataType:"html",
            
        })

        .done(function(data){
          $('#SMScontent').html('');
          $('#SMScontent').html(data);    
          $('#addSMS').modal('show');
          $('#modal_loader').modal('hide');           

        })

        .fail(function(){


        });
	});

	$(document).on('click', '.showsmshistory', function()
	{
		
		$('#smshistorycontent').html('');  
    $('#modal_loader').modal('show');

    	$.ajax({
            url:'/sms-history/',
            type: "GET",
            dataType:"html",
            
        })

        .done(function(data){
          $('#smshistorycontent').html('');
          $('#smshistorycontent').html(data);    
          $('#smshistory').modal('show');
          $('#modal_loader').modal('hide');           

        })

        .fail(function(){


        });
	});

});