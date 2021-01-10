@include('userpage.cssassets')

<body class="body">

<!-- Main content -->

@include('userpage.mainnav')
<div class="main-content">
  @include('userpage.secondnav')
   
   <!-- Header -->
   <div class="header  pb-8 pt-5 pt-md-8">
     <div class="container-fluid">
      <div class="header-body" style="margin-top: -35px">
       {{ $pagename }}<br>
      </div>
     </div>
   </div>
   <!-- Page content -->
   <div class="container-fluid mt--7">
     <div class="row">
       <!-- Card stats -->
       <div class="col-xl-5 order-xl-2 mb-5 mb-xl-0" style="margin-top: -25px" >
         <h2>People</h2>
         @if(count($users) > 0)
              @foreach($users as $searchuser) 
              <div class="container col-12">
               <div class="card card-body">
                <ul class="list-group list-group-flush list my--3">
                    <li class="list-group-item px-0">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                        <a href="/profile/{{ $searchuser->username }}">
                          <span class="avatar avatar-md rounded-circle {{ $searchuser->color_profile }}">
                             @if(isset($searchuser->profile_picture ) &&  $searchuser->profile_picture !="none")
                               <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $searchuser->profile_picture}}" height="50px" width="50px">
                             @else
                               {{ Str::limit($searchuser->first_name ,1,'').Str::limit($searchuser->last_name ,1,'') }}
                             @endif
                          </span>
                         </a>
                        </div>
                        <div class="col ml--2">
                          <h4 class="mb-0">
                            <a href="/profile/{{ $searchuser->username }}">{{ $searchuser->first_name }} {{ $searchuser->last_name }}</a>
                          </h4>
                          <small>{{ $searchuser->email }}</small>
                        </div>
                        <div class="col-auto order-xl-2 d-lg-block text-center">
                          <a href="/profile/{{ $searchuser->username }}"  class="btn btn-sm btn-primary">View Profile</a>
                        </div>
                      </div>
                    </li>
                 </ul>
               </div>
              </div>

              @endforeach
        
        @else
        <center><h2>No People.</h2></center>
        @endif
      </div>
      <div class="col-xl-7 order-xl-1 mb-5 mb-xl-0 " style="margin-top: -25px">
         <h2>Posts</h2>
         <br>
         {{-- newsfeed --}}
         @if(count($post) > 0)
         <div class="feeds" id="feeds" style="margin-top: -25px">
          @include('userpage.includes.feeds')
         </div>
          @else
          <center><h2>No Post.</h2></center>
         @endif
      </div>
      
     </div>
   
   </div>
  </div>


@include('userpage.scriptassets')
<script src="{{ asset('/js/home.js') }}"></script>



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