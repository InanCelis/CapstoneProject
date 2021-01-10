@include('admin.cssassets')
<body>

<!-- Main content -->

@include('admin.mainnav')
<div class="main-content">
  @include('admin.secondnav')
   
    <!-- Header -->
    <div class="header  pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" style="margin-top: -35px">
         YDA - Laguna / {{ $adminpagename }}
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
                <h3 class="mb-0">Create Post</h3>
                </div>
                  <form>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-auto">
                           <span class="avatar avatar-sm rounded-circle ">
                           <img alt="Image placeholder" src="/pageicon/yeah.jpg" height="35px" width="35px">
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
              <h4>News feed</h4>
              <div class="card card-stats">
                <br>
                 <div class="row">
                   <div class="col-10">
                    <div class="media align-items-center">&nbsp;&nbsp;&nbsp;
                      <span class="avatar avatar-md rounded-circle">
                        <a href=""><img alt="Image placeholder" src="/pageicon/hanna.jpg" height="50px" width="50px"></a>
                      </span>
                        <div class="media-body  d-lg-block">
                          <span class="mb-0 text-md  font-weight-bold text-dark"><b><a href="">&nbsp;Hanna Dela Cueva</a></b> 
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
                    <div class="card-text">
                      <label>&nbsp;&nbsp;
                        Happy Birthday Inan more bithday to comes. 🎉🍻
                      </label>
                    </div>
                    <div class="card">
                      <video controls preload="metadata" allowfullscreen class="embed-responsive">
                        <source src="/videos/aldrin (1).mp4" type="video/mp4">
                      </video>
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
                        <a href=""><img alt="Image placeholder" src="/pageicon/drin.jpg" height="50px" width="50px"></a>
                      </span>
                        <div class="media-body  d-lg-block">
                          <span class="mb-0 text-md  font-weight-bold text-dark"><b><a href="">&nbsp;Aldrin Delera</a></b> 
                            <a class="pull-right" href="./examples/icons.html">
                            </a>
                          </span><br>
                          <h5>&nbsp;September 1 , 2019 at 8:30pm</h5>
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
                        Happy Weekend for all. <br>
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
        <div class="col-xl-5 order-xl-2 mb-5 mb-xl-0 d-lg-block d-none">
          <h4>Calendar Events  {{ $currentyear = date('Y') }}</h4>
               <h2>Events <b id="eventyear">{{ $currentyear = date('Y') }}</b></h2>
                <h4>Upcoming Events</h4>
                <div class="row">
                  <div class="col-xl-12 order-xl-2 mb-2 ">
                    <div class="card ">
                        <div class="card-body" style=" padding: 10px;">
                          <div class="row">
                            <div class="col-3" >
                             <center style="border: 1px solid green; border-top: 10px solid green;">
                               Sep <br>
                              <label><b>10</b></label>
                             </center> 
                            </div>
                            <div class="col-9">
                               <h4 class="title" style="color: black; font-weight: bold;">Anilag Laguna Gay Queen Screening</h4>
                               <h5 style="color: green;"><i class="far fa-clock"></i> 6:00pm - 1:00am</h5>
                               <h5 ><i class="fas fa-map-marker-alt"></i> Provincial Capitol of Laguna</h5>
                               <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               sit amet, consectetur adipisicing elit.</small>
                                <hr class="my-2">
                                <div class="text-right">
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="far fa-edit"></i></a> &nbsp;
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fas fa-calendar-times text-red"></i></a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 order-xl-2 mb-2 ">
                    <div class="card ">
                        <div class="card-body" style=" padding: 10px;">
                          <div class="row">
                            <div class="col-3" >
                             <center style="border: 1px solid orange; border-top: 10px solid orange;">
                               Sep <br>
                              <label><b>10</b></label>
                             </center> 
                            </div>
                            <div class="col-9">
                               <h4 class="title" style="color: black; font-weight: bold;">Anilag Laguna Gay Queen Screening</h4>
                               <h5 style="color: orange;"> <i class="far fa-clock"></i> 6:00pm - 1:00am</h5>
                               <h5 ><i class="fas fa-map-marker-alt"></i> Provincial Capitol of Laguna</h5>
                               <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               sit amet, consectetur adipisicing elit.</small>
                               <hr class="my-2">
                                <div class="text-right">
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="far fa-edit"></i></a> &nbsp;
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fas fa-calendar-times text-red"></i></a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 order-xl-2 mb-2 ">
                    <div class="card ">
                        <div class="card-body" style=" padding: 10px;">
                          <div class="row">
                            <div class="col-3" >
                             <center style="border: 1px solid violet; border-top: 10px solid violet;">
                               Oct <br>
                              <label><b>11</b></label>
                             </center> 
                            </div>
                            <div class="col-9">
                               <h4 class="title" style="color: black; font-weight: bold;">Laguna Gay Queen Photoshoot</h4>
                               <h5 style="color: violet;"> <i class="far fa-clock"></i> 6:00pm - 1:00am</h5>
                               <h5 ><i class="fas fa-map-marker-alt"></i> Provincial Capitol of Laguna</h5>
                               <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small>
                               <hr class="my-2">
                                <div class="text-right">
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="far fa-edit"></i></a> &nbsp;
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fas fa-calendar-times text-red"></i></a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div> 
                  </div>
                </div>

                <hr class="my-4">
                 <h4>Past Events</h4>
                <div class="row">
                  <div class="col-xl-12 order-xl-2 mb-2 ">
                    <div class="card ">
                        <div class="card-body" style="border: 1px solid red; border-left: 10px solid red; padding: 10px;">
                          <div class="row">
                            <div class="col-3" >
                             <center>
                               Sep <br>
                              <label><b>03</b></label>
                             </center> 
                            </div>
                            <div class="col-9">
                               <h4 class="title" style="color: black; font-weight: bold;">Anilag Laguna Gay Queen Screening</h4>
                               <h5 style="color: red;"> <i class="far fa-clock"></i> 6:00pm - 1:00am</h5>
                               <h5 ><i class="fas fa-map-marker-alt"></i> Provincial Capitol of Laguna</h5>
                               <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small>
                               <hr class="my-2">
                                <div class="text-right">
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="far fa-edit"></i></a> &nbsp;
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fas fa-calendar-times text-red"></i></a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div> 
                   </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 order-xl-2 mb-2 ">
                    <div class="card ">
                        <div class="card-body" style="border: 1px solid orange; border-left: 10px solid orange; padding: 10px;">
                          <div class="row">
                            <div class="col-3" >
                             <center>
                               Feb <br>
                              <label><b>10</b></label>
                             </center> 
                            </div>
                            <div class="col-9">
                               <h4 class="title" style="color: black; font-weight: bold;">Laguna Gay Queen Photoshoot</h4>
                               <h5 style="color: orange;"> <i class="far fa-clock"></i> 6:00pm - 1:00am</h5>
                               <h5 ><i class="fas fa-map-marker-alt"></i> Provincial Capitol of Laguna</h5>
                               <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small>
                               <hr class="my-2">
                                <div class="text-right">
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="far fa-edit"></i></a> &nbsp;
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fas fa-calendar-times text-red"></i></a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 order-xl-2 mb-2 ">
                    <div class="card ">
                        <div class="card-body" style="border: 1px solid blue; border-left: 10px solid blue; padding: 10px;">
                          <div class="row">
                            <div class="col-3" >
                             <center>
                               Feb <br>
                              <label><b>10</b></label>
                             </center> 
                            </div>
                            <div class="col-9">
                               <h4 class="title" style="color: black; font-weight: bold;">Laguna Gay Queen Photoshoot</h4>
                               <h5 style="color: blue;"> <i class="far fa-clock"></i> 6:00pm - 1:00am</h5>
                               <h5 ><i class="fas fa-map-marker-alt"></i> Provincial Capitol of Laguna</h5>
                               <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small>
                               <hr class="my-2">
                                <div class="text-right">
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="far fa-edit"></i></a> &nbsp;
                                 <a href="" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fas fa-calendar-times text-red"></i></a>
                                </div>
                            </div>
                          </div>
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