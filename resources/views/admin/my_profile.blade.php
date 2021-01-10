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
    <br>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="/pageicon/Hmm.jpg" class="rounded-circle" height="150px" width="150px">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-left border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-primary mr-4 float-right">Change Profile</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Posts</span>
                    </div>
                    <div>
                      <span class="heading">4</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  Inan Celis<span class="font-weight-light">, 27</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Pagsanjan, Laguna
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4" />
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="#">Show more</a>
              </div>
            </div>
          </div><br><br>
          <div class="card card-stats mb-3 mb-xl-0  " style="margin-top: -25px">
            <div class="card-header bg-transparent " >
              <h3 class="mb-0"><i class="ni ni-image text-info"></i> Photos of Inan</h3>
              </div>
                <div>
                  <center>
                    <a href=""><img src="/pageicon/yeah.jpg" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/pageicon/drin.jpg" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/pageicon/hanna.jpg" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/pageicon/hanna.jpg" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/pageicon/yeah.jpg" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/pageicon/Hmm.jpg" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/images/lagunalogo.png" class="profileimg" height="104px" width="104px"></a>
                    <a href=""><img src="/images/tesda.png" class="profileimg" height="104px" width="104px"></a>
                  </center>
                </div>
                

            </div>
        </div>
        <div class="col-xl-8 order-xl-1 ">
            <div class="card card-stats mb-4 mb-xl-0  " style="margin-top: -25px">
              <div class="card-header bg-transparent " >
              <h3 class="mb-0">Create Post</h3>
              </div>
                <form>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-auto">
                         <span class="avatar avatar-sm rounded-circle ">
                         <img alt="Image placeholder" src="/pageicon/yda.png" height="35px" width="35px">
                        </span>
                      </div>
                      <div class="col">
                        <textarea class="form-control form-control-post no-border" id="exampleFormControlTextarea1" rows="2" placeholder="What's on your mind, Inan?"></textarea>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm text-right">
                      <button class="btn btn-icon btn-3  btn-outline-default " type="button">
                        <span class="btn-inner--icon"><i class="ni ni-image text-success"></i></span>
                        <span class="btn-inner--text">Photo</span>
                      </button>
                      <button class="btn btn-icon btn-3  btn-outline-default " type="button">
                        <span class="btn-inner--icon"><i class="material-icons text-sm text-red">video_library</i></span>
                        <span class="btn-inner--text">Video</span>
                      </button>
                      <button class="btn btn-icon btn-3 btn-primary text-right " type="button">
                        <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                        <span class="btn-inner--text">Post</span>
                      </button>
                    </p>
                  </div>
                </form>
            </div>
              <h4>My post</h4>
              <div class="card card-stats">
                <br>
                 <div class="row">
                   <div class="col-10">
                    <div class="media align-items-center">&nbsp;&nbsp;&nbsp;
                      <span class="avatar avatar-md rounded-circle">
                        <a href=""><img alt="Image placeholder" src="/pageicon/yda.png" height="50px" width="50px"></a>
                      </span>
                        <div class="media-body  d-lg-block">
                          <span class="mb-0 text-md  font-weight-bold text-dark"><b><a href="">&nbsp;Inan Celis</a></b> 
                            <a class="pull-right" href="./examples/yda.png">
                            </a>
                          </span><br>
                          <h5>&nbsp;September 4 , 2019 at 8:30pm</h5>
                        </div>
                     </div>
                    </div>
                    <div class="col-2 text-center">
                        <ul class="navbar-nav align-items-center d-lg-block d-md-flex">
                          <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <div class="media align-items-center">
                                <div class="media-body ml-2 d-lg-block d-lg-block">
                                 <i class="material-icons">expand_more</i>
                                </div>
                              </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                              
                              <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>View Profile</span>
                              </a>
                              <a href="./examples/profile.html" class="dropdown-item d-block">
                                <i class="material-icons">create</i>
                                <span>Edit Post</span>
                              </a>
                              
                            </div>
                          </li>
                        </ul>
                     </div>
                  </div>
                   <br>
                    <div class="card-text ">
                      <label>&nbsp;&nbsp;
                        Happy Birthday Inan more bithday to comes. 🎉🍻
                      </label>
                    </div>
                    <div class="card">
                      <img src="/pageicon/Hmm.jpg" alt="Avatar" class="embed-responsive">
                      <br>
                      <div class="row">
                        <div class="col-6 text-center">
                          <a href="#" class="text-danger"><i class="material-icons">favorite</i> <b>256</b></a>
                        </div>
                        <div class="col-6 text-center">
                          <a href="#" class="text-default"><i class="material-icons">comment</i> <b>90</b></a>
                        </div>
                      </div>
                    </div>    
                </div><br>
               <div class="card card-stats">
                <br>
                 <div class="row">
                   <div class="col-10">
                    <div class="media align-items-center">&nbsp;&nbsp;&nbsp;
                      <span class="avatar avatar-md rounded-circle">
                        <a href=""><img alt="Image placeholder" src="/pageicon/yda.png" height="50px" width="50px"></a>
                      </span>
                        <div class="media-body  d-lg-block">
                          <span class="mb-0 text-md  font-weight-bold text-dark"><b><a href="">&nbsp;Inan Celis</a></b> 
                            <a class="pull-right" href="./examples/icons.html">
                            </a>
                          </span><br>
                          <h5>&nbsp;September 4 , 2019 at 8:30pm</h5>
                        </div>
                     </div>
                    </div>
                    <div class="col-2 text-center">
                        <ul class="navbar-nav align-items-center d-lg-block d-md-flex">
                          <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <div class="media align-items-center">
                                <div class="media-body ml-2 d-lg-block d-lg-block">
                                 <i class="material-icons">expand_more</i>
                                </div>
                              </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                              
                              <a href="./examples/profile.html" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>View Profile</span>
                              </a>
                              <a href="./examples/profile.html" class="dropdown-item d-block">
                                <i class="material-icons">create</i>
                                <span>Edit Post</span>
                              </a>
                              
                            </div>
                          </li>
                        </ul>
                     </div>
                  </div>
                   <br>
                    <div class="card-text ">
                      <label>&nbsp;&nbsp;
                        Hello Inan Celis.. <br>
                        <button class="btn btn-default" data-toggle="sweet-alert" data-sweet-alert="question" onclick="alert()">Question</button>
                      </label>
                    </div>
                    <div class="card">
                      
                      <br>
                      <div class="row">
                        <div class="col-6 text-center">
                          <a href="#" class="text-default"><i class="material-icons">favorite_border</i> <b>107</b></a>
                        </div>
                        <div class="col-6 text-center">
                          <a href="#" class="text-default"><i class="material-icons">comment</i> <b>3</b></a>
                        </div>
                      </div>
                    </div>    
              </div>
        </div>
      </div>
    
    </div>
  </div>

@include('admin.scriptassets')
</body>
</html>
