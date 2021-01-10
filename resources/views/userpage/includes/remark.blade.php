@foreach($registeruser as $registered)
	@if($registered->remarks )
		<div class="card bg-white shadow">
			<div class="card-body">
				<h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Remark notice:</h3>
				<label class="text-dark text-sm"> {!! nl2br($registered->remarks) !!} </label> <br>

				<a class="text-sm text-primary remove_event_remarks" id="{{ $registered->id }}">Remove remarks</a>
			</div>
		</div>
	@endif
@endforeach 