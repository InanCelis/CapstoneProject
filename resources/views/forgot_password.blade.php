@foreach($user as $user)

<div class="row align-items-center">
     <div class="col-12">
       <h3 class="mb-0 h3">Get a code to Reset Password</h3>
       <hr class="my-2">
     </div>
  </div>
  
  
  <label class="px-0">
       <div class="row align-items-center">
          <div class="col-auto"> 
            <!-- Avatar -->
          <a href="/profile/{{ $user->username }}">
            <span class="avatar avatar-md rounded-circle {{ $user->color_profile }}">
                @if(isset($user->profile_picture ) &&  $user->profile_picture !="none")
                  <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $user->profile_picture}}" height="50px" width="50px">
                @else
                  {{ Str::limit($user->first_name ,1,'').Str::limit($user->last_name ,1,'') }}
                @endif
            </span>
           </a>
          </div>
          <div class="col ml--2">
            <h4 class="mb-0">
               {{ $user->first_name }} {{ $user->last_name }}
            </h4>
          </div>
       </div>
     </label>
     <hr class="my-1">
     <h5>How do you want to get the code to reset your password?</h5>
     <hr class="my-1">
  <form>
     <small class="h5"><i class="far fa-envelope"></i> Send via email</small>
     <div class="custom-control custom-radio mb-1">
       <input name="custom-radio-2" class="custom-control-input text-sm" id="emailRadio" checked="" type="radio">
       <label class="custom-control-label" for="emailRadio">
       @php
          $parts = explode('@', $user->email);
           echo substr($parts[0], 0, min(1, strlen($parts[0])-1)) . str_repeat('*', max(1, strlen($parts[0]) - 1)) . '@' . $parts[1];
       @endphp
     </label>
     </div>
     <hr class="my-1">
     <small class="h5"><i class="fas fa-mobile-alt"></i> Send via SMS</small>
     <div class="custom-control custom-radio mb-1">
       <input name="custom-radio-2" class="custom-control-input text-sm" id="phoneRadio" type="radio" value="1">
       <label class="custom-control-label" for="phoneRadio">{{ substr($user->contact, 0, 2) . '*******' . substr($user->contact,  -2) }}</label>
     </div>
     <hr class="my-1"><br>
     <button type="submit" class="btn btn-sm btn-icon btn-3 btn-primary pull-right btn-submit">
       <span class="btn-inner--text">Send code</span>
     </button>
     <button class="btn btn-sm btn-icon btn-3 btn-gray pull-right closereset" type="button">
       <span class="btn-inner--text">Close</span>
     </button>
     <br>
  </form>

  @endforeach