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
         {{-- newsfeed --}}
         <div class="feeds" id="feeds">
          @include('userpage.includes.feeds')
         </div>
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