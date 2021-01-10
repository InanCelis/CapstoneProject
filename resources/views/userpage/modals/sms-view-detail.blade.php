<div class="modal-header bg-primary">
    <h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-envelope-open-text"></i> Sms Details </h4>
    <button type="button" class="close " id="history">
       <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
<div class="modal-body container-fluid">
	@foreach($smsdetail as $detail)
		<center><b>{{ $detail->tbl_event->event_name }}</b></center>
		<br>
		<small class="pull-right">Date Sent: {{ \Carbon\Carbon::parse($detail->created_at)->format('M d, Y h:i A')}}</small><br>
		<small>From: {{ $detail->from }}</small><br>
		<small>To: {{ $detail->user->first_name }} {{ $detail->user->last_name }} </small><br>
		<small>{{ $detail->user->contact }}</small> <br><br>

		<small>Message:</small>
		<div class="text-sm bg-secondary" style="overflow-y: auto; max-height:220px;">
			{!! nl2br($detail->message) !!}
		</div>
		<br>
	@endforeach
</div>

<script type="text/javascript">
  $(document).on('click', '#history', function()
  {
  	$('#viewdetail').modal('hide');

  });
</script>