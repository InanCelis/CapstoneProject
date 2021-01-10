@include('admin.cssassets')

<body>

<!-- Main content -->

@include('admin.mainnav')
<div class="main-content">
  @include('admin.secondnav')
   
    <!-- Header -->
    <div class="header  pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" style="margin-top: -25px">
         YDA - Laguna / {{ $adminpagename }}
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
             <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Change Username</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
             <form>
               <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Username</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" placeholder="Username" type="text" required="">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">email</i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-icon btn-3 btn-primary right" type="button">
                      <span class="btn-inner--text">Change Username</span>
                    </button>
                  </div>
                </div>
             </form>
            </div>
          </div>
          <br>
          <div class="card card-profile shadow">
             <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Change Password</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
             <form>
               <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Old Password</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" placeholder="Old Password" type="password" required="">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">lock</i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">New Password</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" placeholder="New Password" type="password" >
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">lock</i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Confirm</label>
                        <div class="input-group input-group-alternative mb-4">
                          <input class="form-control form-control-alternative" placeholder="Confirm" type="password" >
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">lock</i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-icon btn-3 btn-primary right" type="button">
                      <span class="btn-inner--text">Change Password</span>
                    </button>
                  </div>
                </div>
             </form>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-white shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Manage Account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Personal information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                   
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact Information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-contact">Contact Number</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="text" id="input-email" class="form-control form-control-alternative" placeholder="First name" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Address -->
               
                <hr class="my-4" />
                <div class="pl-lg-4">
                  <div class="row">
                    <button type="submit" class="btn btn-icon btn-3 btn-primary right" type="button">
                      <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                      <span class="btn-inner--text">Confirm update</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><br><br>
      
    </div>
  </div>

@include('admin.scriptassets')
</body>
</html>
