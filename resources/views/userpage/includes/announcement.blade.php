@foreach($announcement as $announcement)
	<div class="col-md-4">
	  <a href="/announcement/view/{{ $announcement->url }}">
	    <img class="card-img-top" src="{{ asset('/announcement_images') }}/{{ $announcement->picture }}" height="250px" alt="Image placeholder">
	    <!-- Card body -->
	    <div class="card-body">
		   <h5 class="h2 card-title mb-0">{{ $announcement->title }}</h5>
		   <small class="text-muted"> {{ \Carbon\Carbon::parse($announcement->updated_at)->format('M d, Y h:i A')}}</small>
		   <p class="card-text text-dark"> {!! str_limit( nl2br($announcement->description), 60) !!}</p>
			<p class="btn btn-link px-0">View article</p>
	    </div>
	 </a>
	</div>
@endforeach