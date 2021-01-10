@extends('layouts.app')

@section('content')
 <div class="main-content">
    <!-- Header -->
   <br>

    <div class="container-fluid">
    	<div class="row ">
    		@foreach($currenturl as $url)
	    		<div class="col-md-7 one">
	    			<h1 class=" display-3">{{ $url->title }}</h1>
	    			@auth	
	    			<div class="action_button padding-1"> 
		    		    @if(Auth::user()->usertype == 1)
		    		    <a href="/announcement/edit/{{ $url->id }}" class="text-right btn btn-success pull-right text-white btn-sm">Edit</a>
			    		    @if($url->status == 1)
			    		    <a class="text-right btn btn-danger pull-right text-white btn-sm movetoarchive" id="{{ $url->id }}">Move to archive</a>
			    		    @endif
			    		    @if($url->status == 0)
			    		    <a class="text-right btn btn-danger pull-right text-white btn-sm restore" id="{{ $url->id }}">Restore</a>
			    		    @endif
		    		    @endif
	    		    </div>
	    		    @endauth
	    			<div class="social-button">
		    			<div class="fb-share-button" 
                        data-href="http://ydalaguna.co/{{ $fb_share_link['url'] }}" 
                        data-layout="button_count" data-size="large">
                    	</div>

		            </div>

	    		    <img class="card-img-top" src="{{ asset('/announcement_images') }}/{{ $url->picture }}" alt="Image placeholder">
	    		    
				    <!-- Card body -->
				    <div class="card-body">
				    	<small class="text-muted">{{ \Carbon\Carbon::parse($url->updated_at)->format('M d, Y h:i A')}}</small>
					   <p class="card-text mt-4"> {!! nl2br($url->description) !!}</p>
				    </div>

				    <div id="fb-root w-100"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
					<div class="fb-comments w-100 col-12" data-href="http://ydalaguna.co/announcement/view/{{ $url->url }}" data-width="" data-numposts="5"></div>    
		    	</div>
	    	@endforeach

    		<div class="col-md-5 two">
    			<strong class="h2">Latest Announcement:</strong>
    			<hr class="my-3">
			    <!-- Card body -->
			    @if(count($announcement))
			  	  @include('userpage.includes.sidenav-announcement')
			    @else
			      <center><h3>No announcement.</h3></center>
			    @endif
			    <hr class="my-3">

    		</div>
    	</div>
    </div>
   
  </div>

@endsection