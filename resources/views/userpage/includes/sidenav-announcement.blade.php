 <div class="card-body">
@if(count($announcement))
  @foreach($announcement as $announcement)
     <a href="/announcement/view/{{ $announcement->url }}">
      <div class="row">
        <div class="col-5">
          <img class="card-img-top w-100" height="150px" src="{{ asset('/announcement_images') }}/{{ $announcement->picture }}" alt="Image placeholder">
        </div>
        <div class="col-7">
          <h1 class="card-title h3">{{ $announcement->title }}</h1>
         <p class="card-text my--1 text-sm text-dark">{!! str_limit( nl2br($announcement->description), 60) !!}</p>
         <h5 class="text-muted">{{ \Carbon\Carbon::parse($announcement->updated_at)->format('M d, Y h:i A')}}</h5>
        </div>
      </div>
     </a>
      <hr class="my-2">
  @endforeach
  
  <a href="/announcement" class="card-title text-right">View All</a>
  @else
    <h3>No Announcement</h3>
@endif
</div>
