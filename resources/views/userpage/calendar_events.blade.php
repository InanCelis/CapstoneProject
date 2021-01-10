@include('userpage.cssassets')
<body>

<!-- Main content -->

@include('userpage.mainnav')
<div class="main-content">
  @include('userpage.secondnav')
   
    <!-- Header -->
    <div class="header  pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body" style="margin-top: -35px">
         YDA - Laguna / {{ $pagename }}
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      {{-- upcoming --}}
      <h2>Events {{ $currentyear = date('Y') }}</h2>
      <h4>Upcoming Events</h4>
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-2 ">
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
                  </div>
                </div>
              </div>
          </div> 
        </div>
        <div class="col-xl-4 order-xl-2 mb-2 ">
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
                  </div>
                </div>
              </div>
          </div> 
        </div>
        <div class="col-xl-4 order-xl-2 mb-2 ">
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
                  </div>
                </div>
              </div>
          </div> 
        </div>
      </div>

      {{-- past --}}
      <hr class="my-4">
      <h4>Past Events</h4>
      <div class="row">
        <div class="col-xl-6 order-xl-2 mb-2 ">
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
                  </div>
                </div>
              </div>
          </div> 
         </div>
        <div class="col-xl-6 order-xl-2 mb-2 ">
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