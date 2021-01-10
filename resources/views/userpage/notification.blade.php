@include('userpage.cssassets')
<body>
  <!-- Sidenav -->
  @include('userpage.mainnav')
  <!-- Main content -->
  <div class="main-content">
    @include('userpage.secondnav') 
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="header-body" style="margin-top: -25px">
           YDA - Laguna / {{ $pagename }} 
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 ">
          <div class="notif_fetchinall">
            @if(count($notifications))
                <div class="px-3 py-3 row">
                    <h6 class="text-sm text-muted m-0 col-6">Notifications</h6>
                    <a href="javascript:" class="text-right col-6 text-primary font-weight-bold text-sm card-title alisinangread">Mark all as read</a>
                </div>
                <div id="showmorenotif">

                 @include('userpage.includes.notif_content')

                </div><br>
                <div class="text-center">
                  <h4><i class="fas fa-circle-notch fa-spin text-lg" id="loadings" style="display: none;"></i></h4>
                  <button class="btn btn-dark btn-sm seemorenotif my-2">See more</button>
                </div>
            @else
              <h2 class="text-muted m-0 my-3 text-center">No Notification.</h2>
            @endif
          </div>
        </div>
      </div>

      @include('userpage.footer')
     </div>
  </div>



@include('userpage.scriptassets') 
<script src="{{ asset('/js/home.js') }}"></script>

</body>
</html>