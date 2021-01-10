@extends('layouts.app')

@section('content')
 <div class="main-content">
    <!-- Header -->
   <br>
    <div class="container">
    	<div class="row ">
    		<div class="col-md-2"></div>

      @foreach($announcement as $announcement)
    		<div class="col-md-8">
    			<h2>Update Announcement</h2>
    			<form action="/announcement/edit/{{ $announcement->id }}" method="POST" enctype="multipart/form-data">
    				@csrf
    				<div class="form-group">
                      <label class="form-control-label " for="title">Title</label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control form-control-alternative bg-white" id="title" placeholder="Title" type="text" name="title" maxlength="50" value="{{ $announcement->title }}" required >
                      </div>
                      @if($errors->has('title'))
                      <span class="my--5" role="">
                        <strong class="text-danger text-sm">{{ $errors->first('title') }}</strong>
                      </span>
                     @endif
                   </div>


                   <div class="form-group">
                      <label class="form-control-label " for="picture">Change picture</label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control form-control-alternative bg-white" id="picture"  accept="image/*" type="file" name="picture">
                      </div>
                      @if($errors->has('picture'))
                      <span class="my--5" role="">
                        <strong class="text-danger text-sm">{{ $errors->first('picture') }}</strong>
                      </span>
                     @endif
                     <img src="{{ asset('/announcement_images') }}/{{ $announcement->picture }}" height="200px">
                   </div>
                   <div class="form-group">
	                 <label class="form-control-label" for="input-school">Description</label>
	                 <textarea rows="2" class="form-control form-control-alternative" name="description" placeholder="Description" onkeyup="new do_resize(this);" cols="70" rows="10" required>{{ $announcement->description }}</textarea>

	                  @if($errors->has('description'))
                      <span class="my--5" role="">
                        <strong class="text-danger text-sm">{{ $errors->first('description') }}</strong>
                      </span>
                     @endif
                   </div>

                   <button type="submit" class="btn btn-danger pull-right"><i class="ni ni-send"></i> Save Changes</button>
                   <a href="{{ URL::previous() }}" class="btn btn-secondary "> Back</a>
    			</form>
    			<br><br>
    		</div>
      @endforeach

    		<div class="col-md-2"></div>
    		

    	</div>
    </div>
   
  </div>

@endsection