        <div class="modal-body">
           <h3> <a  class="pull-right text-dark" data-dismiss="modal"><i class="fas fa-times"></i></a></h3>
          <div class="tabs">

            <div class="tab-2  scrolltab1">
              <label for="tab2-1" class="text-dark"><i class="material-icons text-sm text-red">favorite</i> Hearts</label>
              <input id="tab2-1" name="tabs-two" type="radio" >
             
                <div class="numberofheart">
                  @if(count($heartdata) == 0)
                    <center><h3>No heart.</h3></center>
                  @else
                  @if(count($heartdata) > 1)
                    <b>{{ number_format(count($heartdata)) }} Hearts </b>
                   @else
                    <b>{{ number_format(count($heartdata)) }} Heart </b>
                  @endif

                  <div class="card-body">
                    <ul class="list-group list-group-flush list my--3">
                    @foreach($heartdata as $heartdata  ) 
                        <li class="list-group-item px-0">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <!-- Avatar -->
                            <a href="/profile/{{ $heartdata->user->username }}">
                              <span class="avatar avatar-md rounded-circle {{ $heartdata->user->color_profile }}">
                                 @if(isset($heartdata->user->profile_picture ) &&  $heartdata->user->profile_picture !="none")
                                   <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $heartdata->user->profile_picture}}" height="50px" width="50px">
                                 @else
                                   {{ Str::limit($heartdata->user->first_name ,1,'').Str::limit($heartdata->user->last_name ,1,'') }}
                                 @endif
                              </span>
                             </a>
                            </div>
                            <div class="col ml--2">
                              <h4 class="mb-0">
                                <a href="/profile/{{ $heartdata->user->username }}">{{ $heartdata->user->first_name }} {{ $heartdata->user->last_name }}</a>
                              </h4>
                              <small>{{ $heartdata->user->email }}</small>
                            </div>
                            <div class="col-auto order-xl-2 d-lg-block d-none">
                              <a href="/profile/{{ $heartdata->user->username }}"  class="btn btn-sm btn-primary">View Profile</a>
                            </div>
                          </div>
                        </li>
                    @endforeach

                  </ul>
                </div>

                  @endif
                </div>
             
            </div>
            <div class="tab-2 scrolltab2">
              <label for="tab2-2" class="text-dark"><i class="material-icons text-sm text-success">comment</i> Comments</label>
              <input id="tab2-2" name="tabs-two" type="radio" checked="checked">
              <div>
                <!-- Comments -->
                
                 
              <div class="mb-1 commenthere">

                @if(count($commentdata) == 0)
                  <center><h3 class="nocomment">No comment.</h3></center>
                  @else
                      @if(count($commentdata) > 1)
                       <b class="countcomment">{{ number_format(count($commentdata)) }} Comments </b>
                       @else
                       <b class="countcomment">{{ number_format(count($commentdata)) }} Comment </b>
                      @endif
                      <center><h3 class="nocomment" style="display: none;">No comment.</h3></center>
                      <br><br>
                @foreach($commentdata as $commentdata)
                <div id="commentsection{{ $commentdata->id }}">
                   <div class="media media-comment">
                    <a href="/profile/{{ $commentdata->user->username }}">
                      <span class="avatar avatar-md rounded-circle {{ $commentdata->user->color_profile }}">
                         @if(isset($commentdata->user->profile_picture ) &&  $commentdata->user->profile_picture !="none" )
                           <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $commentdata->user->profile_picture}}" height="50px" width="50px">
                         @else
                           {{ Str::limit($commentdata->user->first_name ,1,'').Str::limit($commentdata->user->last_name ,1,'') }}
                         @endif
                      </span>
                     </a>
                      <div class="media-body">
                        <div class="media-comment-text">
                          <h6 class="h5 mt-0">&nbsp; 
                            <a href="/profile/{{ $commentdata->user->username }}">{{ $commentdata->user->first_name }} {{ $commentdata->user->last_name }}</a>
                            @if($commentdata->user->usertype == 1)
                              <i class="fas fa-user-lock"></i> <b>Admin </b>
                            @endif
                          </h6>
                          
                          <p class="text-sm ">
                              {!! nl2br(e($commentdata->post_comment)) !!}
                         </p>
                        </div>
                         <div class="other">
                           <small>{{ \Carbon\Carbon::parse($commentdata->updated_at)->format('F d, Y h:i A')}}</small>
                           <small class="pull-right">

                            @if($commentdata->user_id == auth()->id() && $commentdata->tbl_post_id == $post_id)
                               <a  data-toggle="tooltip" data-placement="top" title="Edit comment"><i class="material-icons text-sm text-dark  editcomment" id="{{ $commentdata->id }}">edit</i></a>
                               <a  data-toggle="tooltip" data-placement="top" title="Delete comment"><i class="material-icons text-sm text-dark commentdelete" id="{{ $commentdata->id }}">delete</i></a>
                            @endif
                            @if($commentdata->tbl_post->user_id == auth()->id()  && $commentdata->user_id != auth()->id())
                               <a  data-toggle="tooltip" data-placement="top" title="Delete comment"><i class="material-icons text-sm text-dark commentdelete" id="{{ $commentdata->id }}">delete</i></a>
                            @endif
                            
                          </small><br>
                           <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($commentdata->updated_at))->diffForHumans() }}</small>
                         </div>
                      </div>
                    </div>
                    <hr>
                  </div>
                    
                  @endforeach 
                </div>
             @endif
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer" >
         {{--  comment box --}}
            <div class="mb-1 w-100 commentbox">
                  <div class="media align-items-center line" style="margin-top: -45px;">
                     @if(isset(Auth::user()->profile_picture) && Auth::user()->profile_picture !="none")
                      <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                       <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
                       </span>
                       @else
                       <span class="avatar avatar-sm rounded-circle {{ Auth::user()->color_profile }}" style="text-transform: uppercase;">
                       {{ Str::limit(Auth::user()->first_name ,1,'').Str::limit(Auth::user()->last_name ,1,'') }}
                       </span> 
                      @endif
                    <div class="media-body">
                      <form id="addcomment"  method="POST">
                        @csrf
                        <textarea class="form-control" id="commentcontent" name="comment_content" placeholder="Leave a comment.." rows="2" required></textarea>
                        <button type="submit" class="sendcomment btn btn-default btn-sm pull-right btn-submit">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div> 

            <script type="text/javascript">
               
               var post_id = "{{ $post_id }}";
               $(document).ready(function(){
                

                //ADDING COMMENT
                $('#addcomment').on('submit', function(event){
                  $('.btn-submit').prop('disabled', true);
                  event.preventDefault();
                  var commentcontent = document.getElementById('commentcontent').value;
                  

                  if(commentcontent == '')
                  {
                    Swal.fire({
                      title: 'Opps!',
                      text: "No message to send", 
                      type: 'error',
                      confirmButtonColor: '#ff4444',
                      confirmButtonText: 'OK'
                      });
                      $('.btn-submit').prop('disabled', false);
                  }
                  else
                  {
                    $('#modal_loader').modal('show');
                    $.ajax({
                      url:"/sendMessage/" + post_id,
                      method:"POST",
                      data: new FormData(this),
                      contentType: false,
                      cache:false,
                      processData: false,
                      dataType:"json",
                      success:function(data) 
                      {
                        // alert(JSON.stringify(data.comment));

                        // alert(data.comment);
                       $('.btn-submit').prop('disabled', false);
                       $('#modal_loader').modal('hide');
                       if(data.errors)
                       {
                        for(var count = 0; count < data.errors.length; count++)
                        {
                          Swal.fire({
                          title: 'Warning',
                          text: data.errors[count], 
                          type: 'warning',
                          confirmButtonColor: '#ff4444',
                          confirmButtonText: 'OK'
                          })
                          
                        }
                       }
                       if(data.success)
                       {
                        if(data.allcomment > 1)
                        {
                          $('#comment'+post_id).html(data.allcomment + " comments");
                        }
                        else if(data.allcomment == 1)
                        {
                          $('#comment'+post_id).show();
                          $('#comment'+post_id).html(data.allcomment + " comment");
                        }
                        if(data.allcomment == 0)
                        {
                          $('#comment'+post_id).hide();
                        }
                        $('#addcomment')[0].reset();

                         reloadcomment();
                       }
                       if(data.sorry)
                       {
                        Swal.fire({
                          title: "You can't comment!",
                          text:  data.sorry,
                          type: 'error',
                          confirmButtonColor: '#ff4444',
                          confirmButtonText: 'OK'
                          })

                       }
                          
                      }
                     })
                  }                 
                });

              $(document).on('click', '.commentdelete', function()
              {
                var comment_id = $(this).attr('id');
                var csrf_token = $('meta[name="_token"]').attr('content');
                Swal.fire({
                title: 'Are you sure?',
                text: "You can't retrieve this comment!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!',
                }).then((result) => {
                if (result.value) {

                        $.ajax({
                          url:'/deleteMessage/' + comment_id + '/' + post_id,
                          type: "POST",
                          dataType:"json",
                          data:{'_token' : csrf_token},
                          success:function(data)
                          {
                           if(data.success)
                           {
                              if(data.allcomment > 1)
                              {
                                $('#comment'+post_id).html(data.allcomment + " comments");
                                $('.countcomment').html(data.allcomment + " comments");
                                
                              }
                              else if(data.allcomment == 1)
                              {
                                $('#comment'+post_id).show();
                                $('#comment'+post_id).html(data.allcomment + " comment");
                                $('.countcomment').html(data.allcomment + " comment");

                              }
                              if(data.allcomment == 0)
                              {
                                $('#comment'+post_id).hide();
                                $('.nocomment').css('display', 'block');
                                $('.countcomment').hide();
                              }

                              $('#commentsection'+ comment_id).hide();
                              
                           }
                           if(data.sorry)
                           {
                            Swal.fire({
                              title: "Opps!",
                              text:  data.sorry,
                              type: 'error',
                              confirmButtonColor: '#ff4444',
                              confirmButtonText: 'OK'
                              })
                           }   
                          }
                      })
                    }
                  })

              });


              
               //REALOAD COMMENT MODAL
                function reloadcomment()
                  {
                    
                    $('#heart_and_comment_content').html('');  
                    $('#modal_loader').modal('show');
                        //reload comment
                      $.ajax({
                            url:'/get_heart_comment/' + post_id,
                            type: "GET",
                            dataType:"html",
                            
                        })
                        .done(function(data){
                          $('#heart_and_comment_content').html('');
                          $('#heart_and_comment_content').html(data);    
                          $('#modal_loader').modal('hide');  
                        })
                        .fail(function(){

                        });
                  }
               });




              
                //hide comment box
                $('.scrolltab1').on('click', function(){
                  $('.commentbox').hide();
                });

                //show comment box
                $('.scrolltab2').on('click', function(){
                  $('.commentbox').show();
                });

            </script>