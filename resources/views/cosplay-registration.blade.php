@extends('layouts.app')

@section('content')
 <div class="main-content">
    <!-- Header -->
   <br>
    <div class="container">
      @if($event_status == 'open')
    	<div class="row ">
    		<div class="col-md-1"></div>

    		<div class="col-md-10">
    			<div class="text-center">
            <label class="text-sm">ENTRY APPLICATION FORM</label>
            <h2>ANILAG COSPLAY COMPETITION</h2>   
          </div><br>
          @if(session('success'))
            <center>
              <div class="alert alert-success" role="alert">
                <strong>Successfully!</strong> {{ session('success') }}
            </div>
           </center>
           @endif
           @if(session('closed'))
            <center>
              <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong> {{ session('closed') }}
            </div>
           </center>
           @endif
           @if(session('error'))
            <center>
              <div class="alert alert-danger" role="alert">
                <strong>Sorry!</strong> {{ session('error') }}
            </div>
           </center>
           @endif
    			<form action="{{ route('cosplay_register') }}" method="POST" enctype="multipart/form-data" id="registerform">
    				@csrf
            @auth
              @foreach($user as $user)
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="first_name">Firstname</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="first_name" placeholder="Firstname" type="text" name="first_name" value="{{ $user->first_name}}"  readonly >
                    </div>
                    @if($errors->has('first_name'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('first_name') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="last_name">Lastname</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="last_name" placeholder="Lastname" type="text" name="last_name" value="{{ $user->last_name }}"  readonly >
                    </div>
                    @if($errors->has('last_name'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('last_name') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="nick_name">Nickname</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="nick_name" placeholder="Nickname" type="text" name="nick_name" value="{{ $user->nick_name }}"  readonly >
                    </div>
                    @if($errors->has('nick_name'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('nick_name') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
              </div>
              @foreach($user->tbl_address as $address)
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label " for="barangay">Barangay</label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control form-control-alternative bg-white" id="barangay" placeholder="Barangay" type="text" name="barangay"  value="{{ $address->tbl_barangay->barangay_name }}"  readonly >
                      </div>
                      @if($errors->has('barangay'))
                      <span class="my--5" role="">
                        <strong class="text-danger text-sm">{{ $errors->first('barangay') }}</strong>
                      </span>
                     @endif
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label " for="municipality">Municipality</label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control form-control-alternative bg-white" id="municipality" placeholder="Municipality" type="text" name="municipality" value="{{ $address->tbl_barangay->tbl_town->town_name }}"  readonly >
                      </div>
                      @if($errors->has('municipality'))
                      <span class="my--5" role="">
                        <strong class="text-danger text-sm">{{ $errors->first('municipality') }}</strong>
                      </span>
                     @endif
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label " for="province">Province</label>
                      <div class="input-group input-group-alternative mb-4">
                        <input class="form-control form-control-alternative bg-white" id="province" placeholder="Province" type="text" name="province" value="Laguna"  readonly >
                      </div>
                      @if($errors->has('province'))
                      <span class="my--5" role="">
                        <strong class="text-danger text-sm">{{ $errors->first('province') }}</strong>
                      </span>
                     @endif
                   </div>
                  </div>
                </div>
              @endforeach
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label " for="contact">Contact</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="contact" placeholder="Contact" type="number" name="contact" value="{{ str_replace('+63','0',$user->contact) }}"  readonly >
                    </div>
                    @if($errors->has('contact'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('contact') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label " for="birthdate">Birthdate</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="birthdate" placeholder="Birthdate" type="date" name="birthdate" value="{{ $user->birthdate }}"  readonly >
                    </div>
                    @if($errors->has('birthdate'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('birthdate') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label " for="birthplace">Birthplace</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="birthplace" placeholder="Birthplace" type="text" name="birthplace" value="{{ $user->birthplace }}"  readonly >
                    </div>
                    @if($errors->has('birthplace'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('birthplace') }}</strong>
                    </span>
                   @endif
                 </div>
                 
                </div>
              </div>
              @endforeach
            @else
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="first_name">Firstname</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="first_name" placeholder="Firstname" type="text" name="first_name" value="{{ old('first_name') }}"  >
                    </div>
                    @if($errors->has('first_name'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('first_name') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="last_name">Lastname</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="last_name" placeholder="Lastname" type="text" name="last_name" value="{{ old('last_name') }}"  >
                    </div>
                    @if($errors->has('last_name'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('last_name') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="nick_name">Nickname</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="nick_name" placeholder="Nickname" type="text" name="nick_name" value="{{ old('nick_name') }}"  >
                    </div>
                    @if($errors->has('nick_name'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('nick_name') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="barangay">Barangay</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="barangay" placeholder="Barangay" type="text" name="barangay"  value="{{ old('barangay') }}"  >
                    </div>
                    @if($errors->has('barangay'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('barangay') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="municipality">Municipality</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="municipality" placeholder="Municipality" type="text" name="municipality" value="{{ old('municipality') }}"  >
                    </div>
                    @if($errors->has('municipality'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('municipality') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label " for="province">Province</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="province" placeholder="Province" type="text" name="province" value="{{ old('province') }}"  >
                    </div>
                    @if($errors->has('province'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('province') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label " for="contact">Contact</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="contact" placeholder="Contact" type="number" name="contact" value="{{ old('contact') }}"  >
                    </div>
                    @if($errors->has('contact'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('contact') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label " for="birthdate">Birthdate</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="birthdate" placeholder="Birthdate" type="date" name="birthdate" value="{{ old('birthdate') }}"  >
                    </div>
                    @if($errors->has('birthdate'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('birthdate') }}</strong>
                    </span>
                   @endif
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label " for="birthplace">Birthplace</label>
                    <div class="input-group input-group-alternative mb-4">
                      <input class="form-control form-control-alternative bg-white" id="birthplace" placeholder="Birthplace" type="text" name="birthplace" value="{{ old('birthplace') }}"  >
                    </div>
                    @if($errors->has('birthplace'))
                    <span class="my--5" role="">
                      <strong class="text-danger text-sm">{{ $errors->first('birthplace') }}</strong>
                    </span>
                   @endif
                 </div>
                 
                </div>
              </div>
            @endauth
      				<br>
               

             <button type="button" class="btn btn-danger pull-right submitregister"><i class="ni ni-send"></i> Register</button>
             <a href="{{ URL::previous() }}" class="btn btn-secondary "> Back</a>
    			</form>
    			<br><br>
    		</div>

    		<div class="col-md-1"></div>
    	</div>
      @else
        @include('userpage.includes.registration-close')
        <br>
      @endif
    </div>
   
  </div>

@endsection