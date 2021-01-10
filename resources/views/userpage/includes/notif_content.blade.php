 @foreach ($notifications as $notification)
    <a href="/{{ $notification->user->username }}/posts/{{ $notification->tbl_post->post_url }}" class="list-group-item list-group-item-action diparead"  @if($notification->unread == 1) style="background-color: rgba(100, 100, 100, 0.1);" @else @endif>
         <div class="row align-items-center">
             <div class="col-auto">
                <span class="avatar avatar-md rounded-circle {{ $notification->user->color_profile }}">
                       @if(isset($notification->user->profile_picture ) &&  $notification->user->profile_picture !="none")
                       <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $notification->user->profile_picture}}" height="50px" width="50px">
                       @else
                       {{ Str::limit($notification->user->first_name ,1,'').Str::limit($notification->user->last_name ,1,'') }}
                       @endif
                </span>
             </div>
             <div class="col ml--2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                             <h4 class="mb-0 text-sm">{{ $notification->user->first_name }} {{ $notification->user->last_name }}</h4>
                        </div>
                        <div class="text-right text-muted">
                             <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</small>
                        </div>
                    </div>
                    @if($notification->notif_type == 1)
                        <p class="text-sm mb-0">{{ $notification->message }} : "{{ str_limit($notification->tbl_post->post_description, 60)}}".</p>
                        <i class="fas fa-heart text-red text-sm"></i>
                        <small>{{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y h:i A')}}</small>

                    @else
                        @if($notification->tbl_post->user_id == auth()->id())
                            <p class="text-sm mb-0">{{ $notification->message }}</p>
                            <i class="fas fa-comment-alt text-success text-sm"></i>
                            <small>{{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y h:i A')}}</small>

                        @else
                            <p class="text-sm mb-0">{{ $notification->message }} on <strong>{{ $notification->tbl_post->user->first_name }} {{ $notification->tbl_post->user->last_name }}</strong> post.</p>
                            <i class="fas fa-comment-alt text-success text-sm"></i>
                            <small>{{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y h:i A')}}</small>
                        @endif
                    
                    @endif
             </div>
         </div>
    </a>
@endforeach