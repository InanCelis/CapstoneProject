@extends('layouts.app')

@section('content')
 <div class="main-content">
    <!-- Header -->
    <br>
    <center><h1>Archive Announcement</h1></center>
    @if(session('success'))
    <center>
    	<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <span class="alert-icon"><i class="fas fa-check"></i></span>
		    <span class="alert-text"><strong>Successfully!</strong> {{ session('success') }}</span>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		        <span aria-hidden="true">&times;</span>
		    </button>
		</div>
   </center> 
   @endif
    <br>
    <div class="container-fluid"> 
    	@auth
    	@if(Auth::user()->usertype == 1)
    	<div class="my-3">
    		<a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
    		
    	</div>
    	@endif
    	@endauth
    	
    	@if(count($announcement))
    	<div class="row" id="fetchannouncement">

    		@include('userpage.includes.announcement')

    	</div>
    	<center>
    		<h4><i class="fas fa-circle-notch fa-spin text-lg" id="loadings" style="display: none;"></i></h4>
    		<button class="btn btn-default seemorearchive my-2">See more archive announcement</button>
    	</center>
    	@else
    	<center><h2>No archive announcement.</h2></center>
    	@endif
    </div>
   
  </div>

@endsection