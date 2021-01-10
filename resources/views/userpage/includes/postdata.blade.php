

      <div class="card card-stats posts">
        <br>  
       <div class="row">
         <div class="col-10">
          <div class="media align-items-center">&nbsp;&nbsp;&nbsp;
           <span class="avatar avatar-md rounded-circle {{ $post->user->color_profile }}">
             @if(isset($post->user->profile_picture ) &&  $post->user->profile_picture )
             <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $post->user->profile_picture}}" height="50px" width="50px">
             @else
             {{ Str::limit($post->user->first_name ,1,'').Str::limit($post->user->last_name ,1,'') }}
             @endif
            </span>
              <div class="media-body  d-lg-block">
                <span class="mb-0 text-md  font-weight-bold text-dark"><b><a href="">&nbsp;{{ $post->user->first_name }} {{ $post->user->last_name }}</a></b>
                </span><br>
                <h5>&nbsp;{{ \Carbon\Carbon::parse($post->updated_at)->format('F d, Y h:i A')}}</h5>
                <small>&nbsp;{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->updated_at))->diffForHumans() }}</small>
              </div>
           </div>
          </div>
          <div class="col-2 text-center">
            <ul class="navbar-nav align-items-center d-lg-block d-md-flex">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <div class="media-body ml-2 d-lg-block d-lg-block">
                     <i class="fas fa-ellipsis-v"></i>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                  @if($post->user_id == auth()->id())
                  <a class="dropdown-item" id="{{ $post->id }}">
                    <i class="ni ni-single-02"></i>
                    <span>View Profile</span>
                  </a>
                  <a class="dropdown-item d-block" id="{{ $post->id }}">
                    <i class="material-icons">edit</i>
                    <span>Edit Post</span>
                  </a>
                  <a class="dropdown-item d-block deletepost" id="{{ $post->id }}">
                    <i class="material-icons">delete</i>
                    <span>Remove Post</span>
                  </a>
                  @else
                  <a class="dropdown-item" id="{{ $post->id }}">
                    <i class="ni ni-single-02"></i>
                    <span>View Profile</span>
                  </a>
                  <a class="dropdown-item d-block" id="{{ $post->id }}">
                    <i class="material-icons">report</i>
                    <span>Report Post</span>
                  </a>
                  @endif

                </div>
              </li>
            </ul>
          </div>
        </div><br>
       <div class="card-text ">
          <label class="text-sm">&nbsp;&nbsp;
            &nbsp;{{ $post->post_description }}
          </label>
       </div>
       <div class="card">
        {{-- //videos --}}
        @foreach($post->tbl_post_video as $video)
          <video src="/post_videos/{{$video->post_videos}}"  controls  class="embed-responsive" >
          </video><br>
        @endforeach

        {{-- carousel photo --}}
        <div id="indicators{{ $post->id }}" class="carousel slide" data-ride="carousel" data-interval="false">
          <ol class="carousel-indicators">
            @foreach($post->tbl_post_image as $image)
            <li data-target="#indicators{{ $post->id }}" data-slide-to="{{ $loop->index }}"></li>
            @endforeach
          </ol>

          <div class="carousel-inner">
            @foreach($post->tbl_post_image as $image)
            <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
              <img class="d-block w-100" src="{{ asset('/post_images') }}/{{ $image->post_image }}">
            </div>
            @endforeach
           
          </div>
          <a class="carousel-control-prev" href="#indicators{{ $post->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#indicators{{ $post->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br>
        <div class="row">
          <div class="col-12 ">
                &emsp; <a href="#" class="text-danger"><i class="material-icons ">favorite</i></a>
                &emsp; <a href="#" class="text-default"><i class="material-icons">comment</i></a>
              </div>
        </div>
        <div class="card-text ">
          <h5>&emsp;&nbsp;<a href="#" data-toggle="modal" data-target="#myModal">1,023 hearts <b class="text-dark">|</b> 19 comments </a>  </h5>
        </div>
       </div> 
      </div>

      <br>

