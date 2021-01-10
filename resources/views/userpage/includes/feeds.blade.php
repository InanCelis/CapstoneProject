        @foreach($post as $post)
              <div class="card card-stats posts" id="divpost{{ $post->id }}">
                  <br>  
                 <div class="row">
                   <div class="col-10">
                     <div class="media align-items-center col-12">
                       <a href="/profile/{{ $post->user->username }}">
                        <span class="avatar avatar-md rounded-circle {{ $post->user->color_profile }}">
                           @if(isset($post->user->profile_picture ) &&  $post->user->profile_picture !="none")
                           <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $post->user->profile_picture}}" height="50px" width="50px">
                           @else
                           {{ Str::limit($post->user->first_name ,1,'').Str::limit($post->user->last_name ,1,'') }}
                           @endif
                          </span>
                       </a>
                          <div class="media-body  d-lg-block">
                            <span class="mb-0 text-md  font-weight-bold text-dark"><a href="/profile/{{ $post->user->username }}">{{ $post->user->first_name }} {{ $post->user->last_name }}</a> <small>@if($post->user->usertype == 1)<i class="fas fa-user-lock"></i> <b>Admin </b> @endif </small>
                            </span><br>
                            <h5>&nbsp; {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y h:i A')}}</h5>
                            <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->updated_at))->diffForHumans() }}</small> 
                          </div>
                      </div>
                     </div>
                     <div class="col-2 text-center">
                       <ul class="navbar-nav align-items-center d-lg-block d-md-flex">
                          <li class="nav-item dropdown">
                            <a class="nav-link pr-0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <div class="media align-items-center">
                                 <div class="media-body ml-2 d-lg-block d-lg-block">
                                  <i class="fas fa-ellipsis-v"></i>
                                 </div>
                               </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                               @if($post->user_id == auth()->id() || auth()->user()->usertype == 1)
                               <a href="/profile/{{ $post->user->username }}" class="dropdown-item" id="{{ $post->id }}">
                                 <i class="ni ni-single-02"></i>
                                 <span>View Profile</span>
                               </a>
                               <a class="dropdown-item d-block showEditPostModal" id="{{ $post->id }}">
                                 <i class="material-icons">edit</i>
                                 <span>Edit Post</span>
                               </a>
                               <a class="dropdown-item d-block deletepost" id="{{ $post->id }}">
                                 <i class="material-icons">delete</i>
                                 <span>Remove Post</span>
                               </a>
                               @else
                               <a href="/profile/{{ $post->user->username }}" class="dropdown-item" id="{{ $post->id }}">
                                 <i class="ni ni-single-02"></i>
                                 <span>View Profile</span>
                               </a>
                               {{-- <a class="dropdown-item d-block" id="{{ $post->id }}">
                                 <i class="material-icons">report</i>
                                 <span>Report Post</span>
                               </a> --}}
                               @endif

                            </div>
                          </li>
                       </ul>
                     </div>
                  </div><br>
                 <div class="card-text ">
                     <label class="text-sm col-12 more" id="{{ $post->id }}">
                       {!! nl2br($post->post_description) !!}
                     </label>
                 </div>
                 <div class="card">
                  {{-- //videos --}}
                  @foreach($post->tbl_post_video as $video)
                     <video src="{{ asset('/post_videos') }}/{{$video->post_videos}}" style="max-height: 350px;"   controls  class="embed-responsive" >
                     </video><br>       
                  @endforeach

                  
           @if(count($post->tbl_post_image) == 1)
             @foreach($post->tbl_post_image as $image)
             <a href="{{ asset('/post_images') }}/{{ $image->post_image }}">
              <img class="d-block w-100" style="max-height: 400px;" src="{{ asset('/post_images') }}/{{ $image->post_image }}">
             </a><br>
             @endforeach

             @else
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
                        <a href="{{ asset('/post_images') }}/{{ $image->post_image }}">
                          <img class="d-block w-100" style="max-height: 400px;" src="{{ asset('/post_images') }}/{{ $image->post_image }}">
                        </a>
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
                  </div><br>
                @endif
                 <div class="">
                  <div class="row">
                     <div class="col-12 ">

                       @if($post->isAuthUserLikedPost())
                            &emsp; <a href="javascript:" id="{{ $post->id }}" class="like text-danger unheart {{ $post->id }}"><i class="material-icons">favorite</i></a>
                       @else
                            &emsp; <a href="javascript:" id="{{ $post->id }}" class="like text-gray heart {{ $post->id }}"><i class="material-icons">favorite</i></a>
                       @endif
                            &emsp; <a href="javascript:" id="{{ $post->id }}" class="text-default get_heart_comment"><i class="material-icons">comment</i></a>
                     </div>
                   </div>
                  @php $count_heart = 0; $count_comment = 0; @endphp
                  @foreach($post->tbl_post_heart as $heart) @php $count_heart++; @endphp @endforeach
                  @foreach($post->tbl_post_comment as $comment) 
                  @php 
                  if($comment->status != 2)
                  {
                     $count_comment++; 
                  }
                  
                  @endphp 
                  @endforeach
                 
                     <div class="card-text action_section text-sm">
                        <a href="javascript:" id="{{ $post->id }}" class="get_heart_comment">
                          <div class="row my-0">
                            <div class="col-4 border-right text-center ">
                               @if($count_heart > 1)  
                                      &emsp;<label class="heartcount text" id="heart{{ $post->id }}">{{ number_format($count_heart) }} hearts </label>
                               @elseif($count_heart == 1)
                                      &emsp;<label class="heartcount text" id="heart{{ $post->id }}">{{ number_format($count_heart) }} heart  </label>
                               @else
                                    &emsp;<label class="heartcount" id="heart{{ $post->id }}"></label>
                               @endif
                                 
                             </div>
                             <div class="col">
                             
                                @if($count_comment > 1)  
                                      <label class="commentcount" id="comment{{ $post->id }}">{{ number_format($count_comment) }} comments </label>
                                @elseif($count_comment == 1) 
                                      <label class="commentcount" id="comment{{ $post->id }}">{{ number_format($count_comment) }} comment </label>
                                @else
                                      <label class="commentcount" id="comment{{ $post->id }}"></label>
                                @endif
                           
                            </div>
                          </div>
                       </a>
                     </div>


                   </div>
                  </div> 
                </div>
                <br>
        @endforeach
