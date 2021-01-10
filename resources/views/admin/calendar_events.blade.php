@include('admin.cssassets')
<body class="bg-white">
  <!-- Sidenav -->
  @include('admin.mainnav')
  <!-- Main content -->
  <div class="main-content ">
    @include('admin.secondnav')
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
       {{-- <center><div class="lds-roller " id="loading"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center> --}}
      <div class="row">
         <!-- Card stats -->
         <div class="col-xl-12">
           <div class="row">
             <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
            <form>
              <h2>Add Event</h2>
             <div class="row">
               <div class="col-md-12">
                <div class="form-group ">
                 <h4>Event Title</h4>
                  <textarea class="form-control input-group-alternative text-dark text-md" id="exampleFormControlTextarea1" rows="2" placeholder="Event Title" required></textarea>
                </div>
               </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="input-daterange datepicker row align-items-center">
                  <div class="col">
                    <h4>Start date</h4>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control bg-white" placeholder="Start date" id="start"  type="text" value="{{ date('m/d/Y') }}" readonly>
                        </div>
                     </div>
                    </div>
                    <div class="col">
                      <h4>End date</h4>
                      <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control bg-white" placeholder="End date"  id="end" type="text" value="{{ date('m/d/Y') }}" readonly>
                          </div>
                      </div>
                     </div>
                 </div>
                </div>
               </div>
               <div class="row">
                <div class="col-md-12">
                 <div class=" row align-items-center">
                 <div class="col">
                   <div class="form-group">
                      <label class="form-control-label" for="input-full-name">Start time</label>
                      <div class="input-group input-group-alternative mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input class="form-control form-control-alternative bg-white" placeholder="Start time" type="time" >
                      </div>
                    </div>
                  </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">End time</label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                          </div>
                          <input class="form-control form-control-alternative bg-white" placeholder="End time" type="time" >
                        </div>
                      </div>
                    </div>
                   </div>
                  </div>
                </div>
                <div class="row">
                   <div class="col-lg-5  col-lg-offset-7">
                    <div class="form-group ">
                      <label class="form-control-label" for="example-color-input">Color Design</label>
                       <input class="form-control input-group-alternative avatar bg-white rounded-circle" type="color"  value="#000000" id="example-color-input">
                    </div>
                   </div>
                  </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-full-name">Event location</label>
                      <div class="input-group input-group-alternative mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input class="form-control form-control-alternative bg-white" placeholder="Event location" type="text" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                   <div class="form-group ">
                   <h4>Description</h4>
                    <textarea class="form-control input-group-alternative text-dark text-md" id="exampleFormControlTextarea1" rows="4" placeholder="Description" required></textarea>
                  </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <button type="submit" id="calendarsubmit" class="btn btn-icon btn-3 btn-primary text-right" type="button">
                      <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                      <span class="btn-inner--text">Save</span>
                    </button>
                  </div>
                </div>
              </form>
             </div>
             <hr class="my-4">
             <div class="col-xl-6 order-xl-1 ">
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
     </div>
  </div>
  
  @include('admin.scriptassets') 
</body>
</html>




