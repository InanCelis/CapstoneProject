
<script type="text/javascript">
	  $(document).ready(function () {
	  	// toastr["info"]("<div class='notif'><img src='/profile_picture/1200449464.jpg' height='50px' width='50px'> <a href=''> You Have 6 New Notfications !</a></div>");

	  	@guest
	  	var auth_id ='';
	  	@else
	  	var auth_id = {{ auth()->id() }};
	  	@endguest
	  	// Enable pusher logging - don't include this in production

	      // Pusher.logToConsole = true;
	      var pusher = new Pusher('48f0f97a38291da60ae4', {
	        cluster: 'ap2',
	        forceTLS: true
	      });
 
	      var channel = pusher.subscribe('my-channel');
	      channel.bind('my-event', function(data) {

	      	if(data.message.announcement)
	      	{
	      		toastr.warning('Announcement <br> <a href="/announcement/view/'+data.message.announcement+'" class="text-sm text-primary">redirect to page</a>' , 'New!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
	      	}

	      	@guest

	      	@else
	      	if(auth_id != '')
	      	{

	      		if (data.message.code == 'comment') {
	      		if ({{ auth()->id() }} != data.message.from_id) {
	      			if ({{ auth()->id() }} == data.message.to_id) {

	      				toastr.info(data.message.from_fullname+' <br> '+data.message.comment_message+' ' , 'New notification!', {timeOut:3000, progressBar:true});

						$(".notif_fetch").load(location.href + " .notif_fetch");
	      				$("#notif_fetch").load(location.href + " #notif_fetch");
	      				$(".notif_fetchinall").load(location.href + " .notif_fetchinall");
	      				
	      			}

	      		}
	      	}


	      	if (data.message.code == 'also_commented') {
	      		if ({{ auth()->id() }} != data.message.from_id) {
	      			if ({{ auth()->id() }} == data.message.to_id) {

	      				toastr.info(data.message.from_fullname+' <br> '+data.message.comment_message+' ' , 'New notification!', {timeOut:3000, progressBar:true});

						$(".notif_fetch").load(location.href + " .notif_fetch");
	      				$("#notif_fetch").load(location.href + " #notif_fetch");
	      				$(".notif_fetchinall").load(location.href + " .notif_fetchinall");
	      			}

	      		}
	      	}

	      		if(data.message.hearts == auth_id)
	      		{	
	      			toastr.info(data.message.from+' '+' hearts your post.' , 'New notification!', {timeOut:3000, progressBar:true});
	      			$(".notif_fetch").load(location.href + " .notif_fetch");
	      			$("#notif_fetch").load(location.href + " #notif_fetch");
	      			$(".notif_fetchinall").load(location.href + " .notif_fetchinall");
	      			
	      		}
	      		if(data.message.unhearts == auth_id)
	      		{	
	      
	      			$(".notif_fetch").load(location.href + " .notif_fetch");
	      			$("#notif_fetch").load(location.href + " #notif_fetch");
	      			$(".notif_fetchinall").load(location.href + " .notif_fetchinall");
	      			
	      		}

	      		if(data.message.blocked == auth_id)
	      		{
	      			window.location.reload(true);
	      		}


	      		if({{ auth()->user()->usertype }} == 1)
		     	{
		     		
		     		if(data.message.event)
		     		{
		     			var sound = new Audio('sounds/insight.mp3');
		     			sound.play();
		     			toastr.info(data.message.event , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     			$("#pendingTable").load(location.href + " #pendingTable");
		           		$("#ScreeningTable").load(location.href + " #ScreeningTable");
		           		$("#pasokTable").load(location.href + " #pasokTable");
		           		$("#ligwakTable").load(location.href + " #ligwakTable");
		           		$("#counting").load(location.href + " #counting");
		           		


		     		}
		     		if(data.message.tesda)
		     		{
		     			var sound = new Audio('sounds/insight.mp3');
		     			sound.play();
		     			toastr.info(data.message.tesda , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     			$("#counting").load(location.href + " #counting");
		     			$("#weekdaystable").load(location.href + " #weekdaystable");
		     			$("#weekendtable").load(location.href + " #weekendtable");

		     		}

		     		if(data.message.accreditation)
		     		{
		     			var sound = new Audio('sounds/insight.mp3');
		     			sound.play();
		     			toastr.info(data.message.accreditation , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     			$("#counting").load(location.href + " #counting");
		     			$("#pendingaccreditation").load(location.href + " #pendingaccreditation");
		     			$("#approval").load(location.href + " #approval");
		     			
		     		}
		     	}

		     	if({{ auth()->user()->usertype }} == 0)
		     	{
		     		if(data.message.remark == auth_id)
		     		{
		     		toastr.info('Admin sent you a remark about IT training program <br> <a href="/it-training-program" class="text-sm text-danger">redirect to page</a>' , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     		 $("#notice").load(location.href + " #notice");
		     		}

		     		if(data.message.move == auth_id)
		     		{
		     		  $("#tesdabutton").load(location.href + " #tesdabutton");
		     		}

		     		if(data.message.eventstatus == auth_id)
		     		{
		     		  $("#notice").load(location.href + " #notice");
		     		}
		     		if (data.message.eventremark == auth_id) 
		     		{
		     		  toastr.info('Admin sent you a remark in event that you were registered.' , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     		  $("#notice").load(location.href + " #notice");
		     		}
		     		if(data.message.accreditation_remark == auth_id)
		     		{
		     			toastr.info('Admin sent you a remark in Accreditation.' , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     		  $("#notice").load(location.href + " #notice");
		     		}
		     		if(data.message.accreditationstatus == auth_id)
		     		{
		     			toastr.info('Check Accreditation page.' , 'Notification!', {timeOut: 0, extendedTimeOut: 0,tapToDismiss: false, closeButton: true});
		     			
		     			$("#refresh").load(location.href + " #refresh");
		     		}
		     	}
	        
	      	}

	      	@endguest
		     	
	      });

	  });  
</script>