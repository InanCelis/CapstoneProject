@include('admin.cssassets')
<body >
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
         <!-- Card stats -->
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Posts</h5>
                    <span class="h2 font-weight-bold mb-0">{{ number_format(count($posts))  }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                      <i class="fas fa-address-card"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Admin User</h5>
                      <span class="h2 font-weight-bold mb-0">{{ number_format(count($users->where('usertype', 1)->where('status', 1))) }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                       <i class="fas fa-user-shield "></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Normal User</h5>
                      <span class="h2 font-weight-bold mb-0">{{ number_format(count($users->where('usertype', 0)->where('status', 1))) }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users-cog"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Blocked Users</h5>
                      <span class="h2 font-weight-bold mb-0">{{ number_format(count($users->where('status', 0))) }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-user-lock"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>

         <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill " id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Daily</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Monthly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Anual</a>
                </li>
            </ul>
        </div>
        <div class="card shadow bg-secondary my--3">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                      <center><h1>DAILY REPORT</h1></center>
                      <h3>Select Date</h3>
                      <form id="submitdaily" method="POST">
                        @csrf
                        <div class="input-group bg-success">
                            <div class="input-group-prepend "> 
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58 text-success"></i></span>
                            </div>
                            <input class="daily form-control" name="day" value="{{ date('Y-m-d') }}" type="text" id="day" required readonly>
                        </div> 
                      </form>
                      <div class="dailyshow">
                        @include('userpage.includes.daily')
                      </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                      <center><h1>MONTHLY REPORT</h1></center>
                      <h3>Select Date</h3>
                      <form id="submitmonthly" method="POST">
                        @csrf
                        <div class="input-group bg-success">
                            <div class="input-group-prepend "> 
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58 text-success"></i></span>
                            </div>
                            <input class="monthly form-control" name="month" value="{{ date('Y-m') }}" type="text" id="month" required readonly>
                        </div>
                      </form> 
                      <div class="monthlyshow">
                        @include('userpage.includes.monthly')
                      </div>
                    </div> 

                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                      <center><h1>ANUAL REPORT</h1></center>
                      <h3>Select Year</h3>
                      <form id="submitanual" method="POST">
                        @csrf
                        <div class="input-group bg-success">
                            <div class="input-group-prepend "> 
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58 text-success"></i></span>
                            </div>
                            <input class="yearly form-control" name="year" value="{{ date('Y') }}" type="text" id="year" required readonly>
                        </div>
                      </form>
                      <div class="anualshow">
                        @include('userpage.includes.anual')
                      </div>
                    </div>

                </div>
            </div>
        </div>
      


     </div>
  </div>
  
  @include('admin.scriptassets') 
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
</body>
</html>
