@include('userpage.cssassets')
<body>

<!-- Main content -->

@include('userpage.mainnav')
<div class="main-content">
  @include('userpage.secondnav')
   
    <!-- Header -->
    <div class="header  pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" style="margin-top: -25px">
         YDA - Laguna / {{ $pagename }}
        </div>
      </div>
    </div>
   
    <!-- Page content -->

    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
          <div class="card bg-white shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h2 class="mb-0">STORY</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="card">
                <center><img src="/pageicon/yda.png" alt="Avatar" height="200px" width="200px"></center>
                <h2 class="text-muted mb-4">Our Story</h2>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>We are the Youth Development Affairs Office of Laguna. Through our volunteerism,  advocacy and programs, we embody each aspiration, hope and dreams of the youth. We are the constant voice of change,we act, we lead, we are relentless.. </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <hr class="my-4" />
            </div>
          </div>
        </div>
        <div class="col-xl-6 order-xl-1">
          <div class="card bg-white shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">BUSINESS INFO</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <label class="title"><i class="fas fa-flag text-info"></i> Founded on February 1, 2017</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <h3 class="title"><i class="far fa-compass"></i> Mission</h3>
                      <label class="text-sm">We are committed to empowering the youth of Laguna through massive implementation of creative and developmental programs that fosters better youth participation in nation building.</label>
                    </div>
                  </div>
                </div><br>
                <div class="row align-items-center">
                 <div class="col-12">
                  <h3 class="mb-0">CONTACT INFO</h3>
                 </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <label class="title text-sm"><i class="material-icons text-sm text-success">phone</i> Call (049) 501-1810</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <h3 class="title text-sm"><i class="fab fa-facebook-messenger text-sm text-info"></i> <a href="https://m.me/ShoutboxxLaguna?fbclid=IwAR1VYPxr-FIW21HESLMFB7SH9tk0OSBbFMIHVBWpxq1oHYEIZhT8wwEdPks"><u> m.me/ShoutboxxLaguna</u> </a><i class="fa fa-info-circle text-default" data-toggle="tooltip" data-placement="top" title="M.me link is a shortened URL that people can use to go
                       directly into a Messenger conversation."></i> </h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <label class="title text-sm"><i class="material-icons text-sm text-red">mail</i> <a href="mailto:ydalaguna2019@gmail.com?__xts__="><u>ydalaguna2019@gmail.com</u></a></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <label class="title text-sm"><i class="fab fa-twitter"></i> @ShoutBoxxLaguna</label>
                    </div>
                  </div>
                 </div>
                </div><br>
                <div class="row align-items-center">
                 <div class="col-12">
                  <h3 class="mb-0">MORE INFO</h3>
                 </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <h3 class="title"><i class="fa fa-info-circle text-default"></i> About</h3>
                      <label class="text-sm"> We are committed to empowering the youth of Laguna through massive implementation of creative and developmental programs that fosters better youth participation in nation building.</label>
                    </div>
                  </div>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      
   
      <!-- Footer -->
      @include('userpage.footer')
    </div>
  </div>

@include('userpage.scriptassets')
</body>
</html>

