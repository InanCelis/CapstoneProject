@include('admin.cssassets')

<body>
  <!-- Sidenav -->
  @include('admin.mainnav')
  <!-- Main content -->
  <div class="main-content">
    @include('admin.secondnav')
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="header-body" style="margin-top: -25px">
           YDA - Laguna / {{ $adminpagename }} 
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 ">
        <h2>Notifications</h2>
        <h5><a href="">Mark all as read</a></h5>
        <hr class="my-2">
        <div style="background:#E5E8E8; ">
          <div class="row">
            <div class="col-10">
              <a href="" class="text-dark">
               <div class="media align-items-center">
                &nbsp;&nbsp;
                <i class="fas fa-circle text-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"> </i> 
                &nbsp;&nbsp;
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/pageicon/drin.jpg" height="35px" width="35px">
                </span>
                <div class="media-body ml-2 d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Aldrin Delera</span> <label class="text-sm">commented on your post</label><br>
                  <i class="material-icons text-success text-sm">comment</i> <small>September 4, 2019 at 12:29pm</small>
                </div>
               </div>
             </a>
            </div>
            <div class="col-2">
              <div class="text-right">
                <a href="" class="text-dark"><i class="material-icons text-md" data-toggle="tooltip" data-placement="top" title="Delete">close</i></a>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-0 thick-1">
        <div class="">
          <div class="row">
            <div class="col-10">
              <a href="" class="text-dark">
               <div class="media align-items-center">
                &nbsp;&nbsp;
                <i class="far fa-circle text-sm" data-toggle="tooltip" data-placement="top" title="Mark as unread"> </i> 
                &nbsp;&nbsp;
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/pageicon/yda.png" height="35px" width="35px">
                </span>
                <div class="media-body ml-2 d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">YDA</span> <label class="text-sm">and 10 other people hearted your post.</label><br>
                  <i class="material-icons text-red text-sm">favorite</i> <small>September 4, 2019 at 12:29pm</small>
                </div>
               </div>
             </a>
            </div>
            <div class="col-2">
              <div class="text-right">
                <a href="" class="text-dark"><i class="material-icons text-md" data-toggle="tooltip" data-placement="top" title="Delete">close</i></a>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-0 thick-1">
        <div style="background:#E5E8E8; ">
          <div class="row">
            <div class="col-10">
              <a href="" class="text-dark">
               <div class="media align-items-center">
                &nbsp;&nbsp;
                <i class="fas fa-circle text-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"> </i> 
                &nbsp;&nbsp;
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/pageicon/yeah.jpg" height="35px" width="35px">
                </span>
                <div class="media-body ml-2  d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Inan Celis</span> <label class="text-sm">commented on your post</label><br>
                  <i class="material-icons text-success text-sm">comment</i> <small>September 4, 2019 at 12:29pm</small>
                </div>
               </div>
             </a>
            </div>
            <div class="col-2">
              <div class="text-right">
                <a href="" class="text-dark"><i class="material-icons text-md" data-toggle="tooltip" data-placement="top" title="Delete">close</i></a>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-0 thick-1">
        </div>
      </div>
     </div>
  </div>
  
  @include('admin.scriptassets') 
</body>
</html>

