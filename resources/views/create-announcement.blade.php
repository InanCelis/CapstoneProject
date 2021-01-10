@extends('layouts.app')

@section('content')
 <div class="main-content">
    <!-- Header -->
   <br>
    <div class="container">
    	<div class="row ">
    		<div class="col-md-2"></div>

    		<div class="col-md-8">
    			<h2>Create Announcement</h2>
    			<form action="{{ route('create.announcement') }}" method="POST" enctype="multipart/form-data">
    				@csrf
			        <div class="form-group">
                  <label class="form-control-label " for="title"> Title</label>
                  <div class="input-group input-group-alternative mb-4">
                    <input class="form-control form-control-alternative bg-white" id="title" placeholder="Title" type="text" name="title" maxlength="50" value="{{ old('title') }}" required >
                  </div>
                  @if($errors->has('title'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
              </div>
             <div class="form-group">
                <label class="form-control-label " for="picture">Picture</label>
                  <div class="input-group input-group-alternative mb-4">
                    <input class="form-control form-control-alternative bg-white" id="picture"  accept="image/*" type="file" name="picture" value="{{ old('picture') }}"  required>
                  </div>
                @if($errors->has('picture'))
                  <span class="my--5" role="">
                    <strong class="text-danger text-sm">{{ $errors->first('picture') }}</strong>
                  </span>
               @endif
             </div>
             <div class="form-group">
               <label class="form-control-label" for="input-school">Description</label>
               <textarea rows="2" class="form-control form-control-alternative" name="description" placeholder="Description" onkeyup="new do_resize(this);" cols="70" rows="10" required>{{ old('description') }}</textarea>

                @if($errors->has('description'))
                  <span class="my--5" role="">
                    <strong class="text-danger text-sm">{{ $errors->first('description') }}</strong>
                  </span>
                @endif
              </div>

               <button type="submit" class="btn btn-danger pull-right"><i class="ni ni-send"></i> Submit</button>
               <a href="{{ URL::previous() }}" class="btn btn-secondary "> Back</a>
    			</form>
    			<br><br>
    		</div>

    		<div class="col-md-2"></div>
    		

    	</div>
    </div>
   
  </div>

@endsection