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
       YDA - Laguna / {{ $pagename }}<br>
      </div>
     </div>
   </div>
   <!-- Page content -->
   <div class="container-fluid mt--7">
     <div class="row">
       <!-- Card stats -->
      <div class="col-xl-7 order-xl-2 mb-5 mb-xl-0 ">
         <div class="card card-stats mb-4 mb-xl-0  " style="margin-top: -25px">
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
                 <img alt="Image placeholder" src="{{ asset('profile_picture') }}/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
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
         <h4>News feed</h4>
          <button class="btn btn-icon btn-3 btn-sm btn-default text-right " type="button" id="latest">
           <span class="btn-inner--icon"><i class="far fa-clock text-warning"></i></span>
           <span class="btn-inner--text">Latest</span>
          </button>
          <button class="btn btn-icon btn-3 btn-sm btn-outline-default" type="button" id="heartsmost">
           <span class="btn-inner--icon"><i class="material-icons text-sm text-red">favorite</i></span>
           <span class="btn-inner--text">Most Hearted</span>
          </button>
          <button class="btn btn-icon btn-3 btn-sm btn-outline-default " type="button" id="commentsmost">
           <span class="btn-inner--icon"><i class="material-icons text-sm text-success">comment</i></span>
           <span class="btn-inner--text">Most Commented</span>
          </button>
          <br>
          
         <center>
          <p class="text-dark" id="progressbarloading">
          Loading <i class="fas fa-spinner fa-spin"></i>
          <img src="{{ asset('/images/postloader.gif') }}" class="w-100">
         </p><br>
           <h4>
            <i class="fas fa-circle-notch fa-spin text-lg" id="lodingfeeds" style="display: none;"></i>
           </h4>
         </center> 

         {{-- newsfeed --}}
         <div class="feeds" id="feeds">
          @include('userpage.includes.feeds')
         </div>

         <center>
          <p class="text-dark" id="loadmore">
          <img src="{{ asset('/images/inan.gif') }}" class="w-100">
         </p>

         <button class="flexible btn btn-default btn-sm" id="loading-button"> Load More</button>
        </center>
       
       
      </div>
      <div class="col-xl-5 order-xl-2 my--4 mb-5 mb-xl-0 d-lg-block d-none">
        <h4>Latest Announcement</h4>
        <div class="sticky card ">
          @include('userpage.includes.sidenav-announcement')
        </div>
         
      </div>
     </div>
   
     <!-- Footer -->
     @include('userpage.footer')
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