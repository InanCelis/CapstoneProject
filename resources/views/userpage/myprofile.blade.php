@include('userpage.cssassets')

<body>

<!-- Main content -->
@foreach($usernames as $user)
 {{-- {{ $user->first_name }} {{ $user->last_name }} --}}
@endforeach 
@include('userpage.mainnav')
<div class="main-content my--3">
  @include('userpage.secondnav')
  
     <!-- Header -->
     <div class="header  pb-8 pt-5 pt-md-8">
       <div class="container-fluid">
          <div class="header-body" style="margin-top: -25px">
           YDA - Laguna / My Profile / {{ $pagename }}
          </div>
       </div>
     </div> 
     <br>
     <!-- Page content -->
     <div class="container-fluid mt--7">
       <div class="row " >
          <div class="col-xl-5 order-xl-2 mb-5 mb-xl-0 ">
            <div class="sticky">
              <div class="card my--5 card-profile shadow ">
                  @if($user->id == auth()->id())
                  <div class="container">
                      <div class="dropdown">
                        <a href="#" class="btn btn-sm my-1 btn-secondary dropdown-toggle " data-toggle="dropdown" id="navbarDropdownMenuLink2">
                            <i class="fas fa-circle text-{{ substr($user->color_profile, 3) }}"></i> Change Color 
                        </a>
                        <i class="fas fa-question-circle text-sm text-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Color changes will display if you have no profile picture"></i>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li>
                                <a class="dropdown-item colorcode" id="bg-default">
                                  <i class="fas fa-circle text-default"></i> Bg-default
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item colorcode" id="bg-primary">
                                  <i class="fas fa-circle text-primary"></i> Bg-primary
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item colorcode" id="bg-info">
                                  <i class="fas fa-circle text-info"></i> Bg-info
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item colorcode" id="bg-success">
                                  <i class="fas fa-circle text-success"></i> Bg-success
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item colorcode" id="bg-danger">
                                  <i class="fas fa-circle text-danger"></i> Bg-danger
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item colorcode" id="bg-warning">
                                  <i class="fas fa-circle text-warning"></i> Bg-warning
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item colorcode" id="bg-dark">
                                  <i class="fas fa-circle text-dark"></i> Bg-dark
                                </a>
                            </li>
                        </ul>
                      </div>
                      <a href="/account-setting" class="pull-right  my-1" ><i class="fas fa-user-cog text-dark text-lg" data-toggle="tooltip" data-placement="top" title="Account Settings"></i></a>
                  </div>
                  @else
                  <br>
                  @endif
                 
                 <div class="text-center">
                  <i class="fas fa-spinner fa-spin" id="profileloader" style="display: none;"></i>
                   @if(isset($user->profile_picture ) &&  $user->profile_picture !="none")
                   <form id="changeprofilesubmit" method="POST" enctype="multipart/form-data">
                    @csrf
                       <div class="profileImage">
                         <span class="rounded-circle clearprofile" id="originalprofile">
                            <a href="{{ asset('/profile_picture') }}/{{ $user->profile_picture}}">
                              <img alt="Image placeholder" class="rounded-circle" src="{{ asset('/profile_picture') }}/{{ $user->profile_picture}}" height="150px" width="150px">
                            </a>
                          @if($user->id == auth()->id())
                            <a id="{{ auth()->id() }}" class="bg-white text-danger text-sm clearprofilebtn rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Clear/Remove profile picture"><i class="fas fa-close"></i></a>
                          @endif
                        </span>
                       </div> 
                        @if($user->id == auth()->id())
                            <div class="button_profile">
                              <span class="btn btn-sm btn-icon btn-3 btn-default btn-file" id="photobutton">
                                  <span class="btn-inner--icon"><i class="ni ni-image text-success"></i></span>
                                  <input type="file" accept="image/*" name="profile_image" id="profile_image" title="">
                                  <span class="btn-inner--text">Change profile</span>
                              </span>
                            </div>
                        @endif
                      
                    </form>
                    @else
                    <form id="changeprofilesubmit" method="POST" enctype="multipart/form-data">
                      @csrf
                       <div class="profileImage">
                         <br><br>
                         <span  class="rounded-circle text-xl text-white  {{ $user->color_profile }}" id="originalprofile" style="padding: 55px; ">
                         {{ Str::limit($user->first_name ,1,'').Str::limit($user->last_name ,1,'') }} 
                         </span>
                        </div><br>
                         
                        @if($user->id == auth()->id())
                          <div class="button_profile">
                          <span class="btn btn-sm btn-icon btn-3 btn-default btn-file" id="photobutton">
                              <span class="btn-inner--icon"><i class="ni ni-image text-success"></i></span>
                              <input type="file" accept="image/*" name="profile_image" id="profile_image" title="">
                              <span class="btn-inner--text">Add profile</span>
                          </span>
                          {{-- <button class="btn btn-primary btn-sm">Save</button> --}}
                          </div>
                        @endif
                      
                    </form>
                   @endif
                 
                 </div>
                 <div class="card-body my--4">
                   <div class="row">
                      <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                           <div>
                             <span class="heading">{{ count($post) }}</span>
                             <span class="description">Posts</span>
                           </div>
                           <div>
                             <span class="heading">{{ $countimages->count() }}</span>
                             <span class="description">Photos</span>
                           </div>
                           <div>
                             <span class="heading">{{ $countvideos->count() }}</span>
                             <span class="description">Videos</span>
                           </div>
                        </div>
                      </div>
                   </div>
                   <div class="text-center">
                      <h2>
                        {{ $user->first_name }} {{ $user->last_name }}<span class="font-weight-light">, {{ \Carbon\Carbon::parse($user->birthdate)->age}}</span>
                      </h2>
                      <div class="h4 font-weight-300">
                        <i class="ni location_pin mr-2"></i>
                        @foreach($user->tbl_address as $address)
                          Brgy. {{ $address->tbl_barangay->barangay_name }}, {{ $address->tbl_barangay->tbl_town->town_name }} Laguna
                        @endforeach
                      </div>
                      <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>
                        @if($user->work)
                          {{ $user->work }}
                        @else
                          Add work
                        @endif
                         - 
                        @if($user->work)
                          {{ $user->work_position }}
                        @else
                          Add work position
                        @endif
                      </div>
                      <div>
                        <i class="ni education_hat mr-2"></i>
                        @if($user->school)
                          {{ $user->school }}
                        @else
                          Add your school name
                        @endif
                      </div>
                      <hr class="my-2" />
                      <h4>Bio</h4>
                      <p>
                        @if($user->bio)
                          {{ $user->bio }}
                        @else
                          Add bio
                        @endif
                      </p>
                      
                   </div>
                 </div>
              </div>
              <div class="card card-stats mb-3 mb-xl-0 my-6">

                 <div class="nav-wrapper bg-light">
                      <ul class="nav nav-pills nav-fill flex-md-row " id="tabs-icons-text" role="tablist">
                           <li class="nav-item ">
                                <a class="nav-link  active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-image mr-2"></i>Photos</a>
                           </li>
                           <li class="nav-item ">
                                <a class="nav-link " id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-button-play mr-2"></i>Videos</a>
                           </li>
                      </ul>
                 </div>
                 <div class="card shadow">
                      <div class="card-body">
                           <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active " id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" >
                                     <h4><i class="ni ni-image mr-2"></i>Photo's of {{ $user->nick_name }} 
                                      @if($user->id == auth()->id())<label onclick="function hello(){document.body.scrollTop = 0; document.documentElement.scrollTop = 0;}" for="images" class="text-sm text-info pull-right">Add Photo</label>
                                      @endif
                                     </h4>
                                     <center>
                                          @if(count($countimages) == 0)
                                            <h3>no photos.</h3>
                                          @else
                                          <div class="row w-100" style="overflow-x: auto; max-height: 400px;">
                                            @foreach($countimages as $photo)
                                              <div class="col-4 profile_images" style="padding: 2px;">
                                              <a href="{{ asset('/post_images') }}/{{ $photo->post_image }}"><img src="{{ asset('/post_images') }}/{{ $photo->post_image }}" height="100px" class="w-100" ></a>
                                              </div>
                                            @endforeach
                                          </div>
                                          @endif
                                      </center>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                      <h4><i class="ni ni-image mr-2"></i>Video's of {{ $user->nick_name }} 
                                        @if($user->id == auth()->id())<label onclick="function hello(){document.body.scrollTop = 0; document.documentElement.scrollTop = 0;}" for="video" class="text-sm text-info pull-right">Add Video</label>
                                        @endif
                                       </h4>
                                       <center>
                                          @if(count($countvideos) == 0)
                                            <h3>no videos.</h3>
                                          @else
                                          <div class="row w-100" style="overflow-x: auto; max-height: 400px;">
                                            @foreach($countvideos as $vid)
                                              <div class="col-6" style="padding: 2px;">
                                                <video src="{{ asset('/post_videos') }}/{{$vid->post_videos}}"  controls  class="embed-responsive" >
                                                </video>
                                              </div>
                                            @endforeach
                                          </div>
                                          @endif
                                       </center>
                                </div>
                           </div>
                      </div>
                 </div>
              </div>
            </div>
          </div>
        
          {{-- <div class="col-xl-7 order-xl-1 "> --}}
          <!-- Card stats -->
            <div class="col-xl-7 order-xl-1">
               @if($userid == auth()->id())
                 <div class="card card-stats mb-4 mb-xl-0  " style="margin-top: -50px; ">
                    <div class="card-header bg-transparent " >
                      <h3 class="mb-0"><i class="far fa-edit"></i> Create Post</h3>
                    </div>

                      <form id="addpost" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="card-body">
                           <div class="row">
                              <div class="col-auto">
                                
                                @if(isset(Auth::user()->profile_picture) && Auth::user()->profile_picture !="none")
                                <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                 <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
                                 </span>
                                 @else
                                 <span class="avatar avatar-sm rounded-circle {{ Auth::user()->color_profile }}" style="text-transform: uppercase;">
                                 {{ Str::limit(Auth::user()->first_name ,1,'').Str::limit(Auth::user()->last_name ,1,'') }}
                                 </span>
                                @endif
                                
                              </div>
                              <div class="col">
                                <textarea class="form-control form-control-post description" id="description" onkeyup="new do_resize(this);" cols="70" rows="1" name="description" placeholder="Write something here, {{ Auth::user()->nick_name  }}"></textarea>
                              </div>               
                           </div>
                           <br>
                           <div class="row imagepost">
                              <table class="table-responsive">
                                <tr id="photos">

                                   <td id="photo_spinner" style="display: none;">
                                     &emsp;<i class="fas fa-spinner fa-spin text-right"></i>
                                   </td>
                                </tr>
                              </table>
                           </div>
                           <div class="mt-3 mb-0 text-muted text-sm text-right">
                            <span class="btn btn-sm btn-icon btn-3  btn-outline-default btn-file" id="photobutton">
                                <span class="btn-inner--icon"><i class="ni ni-image text-success"></i></span>
                                <input type="file" accept="image/*" name="image[]" id="images" title="" multiple>
                                <span class="btn-inner--text">Photo</span>
                            </span>
                            <span class="btn  btn-sm btn-icon btn-3  btn-outline-default btn-file" id="videobutton">
                                <span class="btn-inner--icon"><i class="material-icons text-sm text-red">video_library</i></span>
                                <input type="file" accept="video/*" name="video" id="video" >
                                <span class="btn-inner--text">Video</span>
                            </span>
                              <button class="btn btn-sm btn-icon btn-3 btn-primary text-right submitpost" type="submit" disabled>
                                <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                <span class="btn-inner--text">Post</span>
                              </button>
                           </div>
                         </div>
                      </form>
                    </div>
                    
                    <center>
                      <p class="text-dark" id="progressbarloading">
                      Loading <i class="fas fa-spinner fa-spin"></i>
                      <img src="{{ asset('/images/postloader.gif') }}" class="w-100">
                    </p>
                 </center><br>
               @endif
            <h4>Posts</h4>
            {{-- newsfeed --}}
            <div class="feeds" id="feeds">
              @include('userpage.includes.feeds')
            </div>

             <center>
                    <p class="text-dark" id="loadmore">
                    <img src="{{ asset('/images/inan.gif') }}" class="w-100">
                 </p>
             </center><br>
            </div>
       </div>
       
   
       <!-- Footer -->
       @include('userpage.footer')
     </div>
  </div>



@include('userpage.scriptassets')
<script src="{{ asset('/js/home.js') }}"></script>
<script src="{{ asset('/js/profile.js') }}"></script>

<!-- Modal -->
{{-- view hearts and comment in this modal --}}
<div class="modal fade" id="actionpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" id="heart_and_comment_content">
               
          </div>
     </div>
</div> 


{{-- edit post in this modal --}}
<div class="modal fade discard" id="FetchEditPost" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
          <div class="modal-content" id="post_edit_content">
            
          </div>
     </div>
</div> 

<div class="modal fade discard" id="FetchEditcomment" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content" id="comment_edit_content">
            
          </div>
     </div>
</div> 

{{-- loading --}}
@include('userpage.modals.modal_loader')

</body>
</html>