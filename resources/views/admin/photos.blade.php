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
        <div class="col-xl-3 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
             <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3>Add New</h3>
                  <div class="btn-group " role="group" aria-label="Basic example">
                    <a class="btn btn-default text-white"> <i class="fas fa-photo"></i> Photo</a>
                    <a  class="btn btn-dark text-white"><i class="fas fa-play"></i> Video</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-9 order-xl-1">
          <div class="card bg-white shadow">
            <div class="card-body">
              <!-- Tab links -->
              <h3><i class="fas fa-images text-xl"></i> Gallery</h3>
              <div class="tab">
                <button class="tablink active" id="btn_photo">Photos</button>
                <button class="tablinks " id="btn_video" >Videos</button>
              </div>

              <!-- Tab content -->
              <div id="photo" class="tabcontent">
                <h3>Photos</h3>
                  <center>
                    <a href=""><img src="/pageicon/yeah.jpg" class="profileimg" height="145px" width="145px"></a>
                    <a href=""><img src="/pageicon/drin.jpg" class="profileimg" height="145px" width="145px"></a>
                    <a href=""><img src="/pageicon/Hmm.jpg" class="profileimg" height="145px" width="145px"></a>
                    <a href=""><img src="/pageicon/hanna.jpg" class="profileimg" height="145px" width="145px"></a>

                    <a href=""><img src="/pageicon/hanna.jpg" class="profileimg" height="145px" width="145px"></a>
                  </center>
               
              </div>
              <div id="videos" class="tabcontent">
                <h3>Videos</h3>
                <center>
                  <div class="container">
                  <div class="row">
                  <div class="col-lg-6">
                  <video width="290" height="170" controls>  
                    <source src="/videos/aldrin (1).mp4" type="video/mp4">  
                    Your browser does not support the video tag.
                  </video>
                   <h4>September 4, 2019 at 8:00 PM</h4>
                  </div >
                  <div class="col-lg-6">
                  <video width="290" height="170" controls>  
                    <source src="/videos/aldrin (1).mp4" type="video/mp4">  
                    Your browser does not support the video tag.
                  </video>
                   <h4>September 4, 2019 at 8:00 PM</h4>
                  </div>
                  <div class="col-lg-6">
                  <video width="290" height="170" controls>  
                    <source src="/videos/aldrin.mp4" type="video/mp4">  
                    Your browser does not support the video tag.
                  </video>
                   <h4>September 4, 2019 at 8:00 PM</h4>
                  </div>
                  <div class="col-lg-6">
                  <video width="290" height="170" controls>  
                    <source src="/videos/aldrin.mp4" type="video/mp4">  
                    Your browser does not support the video tag.
                  </video>
                   <h4>September 4, 2019 at 8:00 PM</h4>
                  </div>
                  </div>
                  </div>
                </center>

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
