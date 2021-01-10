<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>
  
  @if(Route::is('login')) 
    Login
  @else
  {{ $pagename }}
  @endif
  </title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta name="description" content="Youth Development Affairs Office of Laguna">
  <meta name="author" content="Inan Celis">
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="{{ $fb_share_link['title'] }}" />
  <meta property="og:description" content="{{ $fb_share_link['description'] }}" />
  <meta property="og:url" content="http://ydalaguna.co/{{ $fb_share_link['url'] }}" />
  <meta property="og:site_name" content="YDA Laguna" />
  <meta property="article:section" content="All News" />
  <meta property="article:published_time" content="{{ $fb_share_link['published_time'] }}" />
  <meta property="article:modified_time" content="{{ $fb_share_link['modified_time'] }}" />
  <meta property="og:updated_time" content="{{ $fb_share_link['updated_time'] }}" />
  <meta property="og:image" content="http://ydalaguna.co/public/announcement_images/{{ $fb_share_link['image'] }}" />
  <meta property="og:image:secure_url" content="http://ydalaguna.co/public/announcement_images/{{ $fb_share_link['image'] }}" />
  <meta property="og:image:width" content="1500" />
  <meta property="og:image:height" content="927" />
  <link rel="icon" type="image/png" href="{{ asset('/pageicon/yda.png') }}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Icons -->
  <link href="{{ asset('/assets/vendor/nucleo/css/nucleo.css') }} " rel="stylesheet">
  <link href="{{ asset('/assets/vendor/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link href="{{ asset('/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <link href="{{ asset('/css/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/ownstyle.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/toastr.css') }}">
  <style type="text/css">
    div.sticky{
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      z-index: 1;
    }
    
    .social-button{
      background: lightgray;
      padding: 2px;
      border: 1px solid black;
    }
  
    .cover{
      background-image: url({{ asset('/images/pgl.jpg') }}); min-height: 100%;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: center center;
      filter: black; /* IE5+ */
      -webkit-filter: grayscale(1); /* Webkit Nightlies & Chrome Canary */
      -webkit-transition: all .8s ease-in-out; 
      width: 100%
      height:100px;

      }
      .desc{
        text-align: justify;
        text-justify: inter-word;
      }
      .contactInfo{
        padding-bottom: 10px;
      }
      .bgicon{
        background-color: gray;
      }
      .hr{
        position: relative;  
        border: none; 
        height: 2px; 
        background: white; 
        margin-bottom: 50px; 
        width: 100%;
      }
      
  </style>

</head>
<body class="bg-white" >
<a id="button"></a>
    <div class="main-content"> 
    <!-- Navbar -->
    <div class="sticky">
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-primary">
    <div class="container ">
       <a class="" href="/">
        <div class="row">
          <img src="{{ asset('/pageicon/yda.png') }}" height="45px" width="45px" />
          <b class="text-white" >Youth Development <br> Affairs</b>
        </div>
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a class="navbar-brand " href="/">
                <img src="{{ asset('/pageicon/yda.png') }}"/> <b class="text-dark">Youth Development Affairs</b>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav  ml-lg-auto">
          @auth
            <li class="nav-item">
                <a href="/home" class="nav-link">
                  <span class="nav-link-inner--text">Feeds</span>
                </a>
              </li>
            @endauth
            <li class="nav-item">
                <a href="/announcement" class="nav-link">
                  <span class="nav-link-inner--text">Announcement</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                 <a href="#" class="nav-link"id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="nav-link-inner--text">Registration</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="/anilag-color-run/register">Anilag Color Run</a>
                    <a class="dropdown-item" href="/anilag-cosplay/register">Anilag Cosplay</a>
                    <div class="dropdown-divider"></div>
                    @auth
                    <a class="dropdown-item" href="/home">All event</a>
                    @else
                    <a class="dropdown-item" href="/login">All Events</a>
                    @endauth
                    
                </div>
              </li>
	      
	           @guest
	           	<li class="nav-item">
                <a href="/register" class="nav-link">
                  <span class="nav-link-inner--text">Sign Up</span>
                </a>
              </li>
              @endguest
            </ul>
	           
            <hr class="d-lg-none">
              <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://www.facebook.com/ShoutboxxLaguna/" target="_blank" data-toggle="tooltip" title="" data-original-title="Like us on Facebook">
                    <i class="fab fa-facebook-square"></i>
                    <span class="nav-link-inner--text d-lg-none">Facebook</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://www.instagram.com/shoutboxxlaguna/?fbclid=IwAR3GTBhiuvpjtkIeL4truHy0avG0CQlhZvdhOct9F9whVndGtHx9huz2opU" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Instagram">
                    <i class="fab fa-instagram"></i>
                    <span class="nav-link-inner--text d-lg-none">Instagram</span>
                  </a>
                </li>


          @guest
            <li class="nav-item  ml-lg-4">
              <a href="/login" class="btn btn-neutral btn-icon">
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            @else
            <li class="nav-item d-md-none">
              <a class="nav-link nav-link-icon" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form2').submit();"> &nbsp;
               <i class="ni ni-user-run"></i>
              <span class="nav-link-inner--text d-lg-none">{{ __('Logout') }}</span>
             </a>
              <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
            </li>
            <ul class="navbar-nav align-items-center d-none d-md-flex">
              <li class="nav-item dropdown notif_fetch">

                 @include('userpage.includes.notification_div')

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                   <div class="media align-items-center " >
                      @if(isset(Auth::user()->profile_picture) && Auth::user()->profile_picture !="none")
                      <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase; border: 2px solid white">
                       <img alt="Image placeholder" src="{{ asset('profile_picture') }}/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
                       </span>
                       @else
                       <span class="avatar avatar-sm rounded-circle {{ Auth::user()->color_profile }}" style="text-transform: uppercase; border: 2px solid white">
                       {{ Str::limit(Auth::user()->first_name ,1,'').Str::limit(Auth::user()->last_name ,1,'') }}
                       </span>
                      @endif
                   </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                   <div class=" dropdown-header noti-title">
                     <h4 class="text-overflow m-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                     <label class="text-overflow m-0 text-blue">{{ Auth::user()->email }}</label><br>
                   </div>
                   <a href="/profile/{{ Auth::user()->username }}" class="dropdown-item">
                     <i class="ni ni-single-02"></i>
                     <span>My profile</span>
                   </a>
                   <a href="/account-setting" class="dropdown-item">
                     <i class="fas fa-user-cog"></i>
                     <span>Account Settings</span>
                   </a>
                   <div class="dropdown-divider "></div>
                   <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form1').submit();"> &nbsp;
                     <i class="ni ni-user-run text-dark"></i>
                     <span class="text-dark">{{ __('Logout') }}</span>
                   </a>
                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                </div>
              </li>
            </ul>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  </div>
    
  @yield('content')
   
  </div>
 <!-- Footer -->
  <footer class="py-5 bg-dark " id="footer-main">
    <div class="container">
      <div class="row align-items-center  ">
        <div class="col-xl-6">
           <h2 class="text-primary">Contact Info.</h2>
          <div class="text-white contactInfo">
            <div class="icon icon-shape bgicon rounded-circle text-white mb-3">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <label class="">Laguna Provincial Capitol</label>
          </div>
          <div class="text-white contactInfo">
            <div class="icon icon-shape bgicon rounded-circle text-white mb-3">
              <i class="fas fa-phone"></i>
            </div>
            <label class="">Call (049) 501-1810</label>
          </div>
          <div class="text-white contactInfo">
            <div class="icon icon-shape bgicon rounded-circle text-white mb-3">
              <i class="far fa-envelope"></i>
            </div>
            <label ><a href="mailto:ydalaguna17@yahoo.com" class="text-white">ydalaguna17@yahoo.com</a></label>
          </div>
        </div>
        <div class="col-xl-6">
          <h2 class="text-primary">About the Office</h2>
          <div class="text-white text-sm">
            We are the Youth Development Affairs Office of Laguna. Through our volunteerism, advocacy and programs, we embody each aspiration, hope and dreams of the youth. We are the constant voice of change,we act, we lead, we are relentless.
          </div>
          <div class="social my-3">
            <div class="icon icon-shape bg-primary ">
              <a href="https://www.facebook.com/ShoutboxxLaguna/" target="_blank">
                <i class="fab fa-facebook-f  text-white"></i>
              </a>
            </div>
            <div class="icon icon-shape bg-info ">
              <a href="https://twitter.com/ShoutboxxYDA" target="_blank">
                <i class="fab fa-twitter  text-white"></i>
              </a>
            </div>
            <div class="icon icon-shape bg-danger ">
              <a href="https://www.youtube.com/channel/UCoVC-R5bu7rEaJ7LGrFVdoA?fbclid=IwAR0ignb-Wc7Pwb9A5S9VEZsSyxMkWH8vLmJ57qNCTt6ucvkZWkQ1G8FoQRM" target="_blank">
                <i class="fas fa-play text-white"></i>
              </a>
            </div>
            <div class="icon icon-shape bg-warning ">
              <a href="https://www.instagram.com/shoutboxxlaguna/?fbclid=IwAR3g6s9y9ptkK-aiturqx1TQ3GdaFhlSRA_MDLSwHrASrLVLvI9S-yjVrRU" target="_blank">
                <i class="fab fa-instagram text-white"></i>
              </a>
            </div>
          </div>
          <div class="my-3">
            <h2 class="text-primary">Developers</h2>
            <div>
              <a href="https://www.facebook.com/INAN.454" target="_blank" class="text-white"> Ferdinand Celis</a>
            </div>
            <div>
              <a href="https://www.facebook.com/aldrin.delera.3" target="_blank" class="text-white"> Aldrin Delera</a>
            </div>
            <div>
              <a href="https://www.facebook.com/hannadelacueva" target="_blank" class="text-white"> Hanagene Dela Cueva</a>
            </div>
          </div>
        </div>
        
        <div class="col-xl-12 my-1">
          <hr class="hr">
          <div class="copyright text-center  text-muted  text-white">
            <a class="text-center align-items-center" href="https://laguna.gov.ph/" target="_blank">
              <img src="{{ asset('/pageicon/lagunalogo.png') }}"/ height="75px" width="75px">
            </a>
            <a class="text-center align-items-center" href="/">
              <img src="{{ asset('/pageicon/yda.png') }}" height="80px" width="80px"><br> 
            </a>
            <b class="text-white">Youth Development Affairs Office of Laguna</b>
            <div class="text-sm text-primary">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>.
              All Rights Reserved
            </div>
          </div>
          
        </div>


      </div>
    </div> 
  </footer>
 <!-- Argon Scripts -->
  <!-- Core --> 
  <script type="text/javascript" src="{{ asset('/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script type="text/javascript" src="{{ asset('/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script type="text/javascript" src="{{ asset('/assets/js/argon.js?v=1.0.0') }}"></script>
  <script src="{{ asset('/admin_assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/datatables.min.js') }}"></script>
  <script src="{{ asset('/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('/js/function.js') }}"></script>
{{--   <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script> --}}
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  @include('userpage.includes.notification')
  <script src="{{ asset('/js/toastr.js') }}"></script>
  <script src="{{ asset('/js/announcement.js') }}"></script>
  
</body>

<script type="text/javascript">
$(document).ready(function(){

    $(document).on('change', '#town', function(){

        var id = $(this).val(); 
        $.ajax({
            url:"/register/"+id,
            dataType:"json",
            success:function(html){
              // alert(html.data);
              $('#barangay').html(html.data);
            }
        });

    });


    var btn = $('#button');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });

  $('#picture').on('change',function(e){
    
    if(this.files[0].type.indexOf("image")==-1){
        Swal.fire({
        title: 'Error',
        text: 'Invalid type, accept image only', 
        type: 'error',
        confirmButtonColor: '#ff4444',
        confirmButtonText: 'OK'
        });
        $('#picture').val('');
        return false;
    } 

  });

  });

</script>
</html>
