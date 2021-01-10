  <button onclick="topFunction()" id="gototopbutton" class="btn btn-md btn-dark" title="Go to top"><i class="fas fa-arrow-up"></i></button>
 <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left bg-gradient-default navbar-expand-md navbar-dark bg-black" id="sidenav-main">
    
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0 ">
        <center><img src="{{ asset('/pageicon/yda.png') }}" class="navbar-brand-img" alt="...">
          <b><br> <h4 class="text-white">Youth Development <br> Affairs Office <br>of Laguna</h4>  </b></center>
       </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              @if(isset(Auth::user()->profile_picture) && Auth::user()->profile_picture !="none")
              <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
               <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
               </span>
               @else
               <span class="avatar avatar-sm rounded-circle {{ Auth::user()->color_profile }}" style="text-transform: uppercase;">
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
            <a href="/Myprofile" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="/Account_Setting" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Account Setting</span>
            </a>
            <div class="dropdown-divider "></div>
            <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> &nbsp;
              <i class="ni ni-user-run text-dark"></i>
              <span class="text-dark">{{ __('Logout') }}</span>
            </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
              </form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse text-light" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
               <center> <img src="{{ asset('/pageicon/yda.png') }}"><b> YDA - Laguna </b> </center>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search Person" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
              <i class="ni ni-tv-2 text-info"></i> Dashboard
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/Newsfeed">
              <i class="material-icons text-primary">dynamic_feed</i>News feed
            </a>
          </li>
          <li class="nav-item active"> 
            <a class="nav-link " href="#event-menu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards"> 
              <i class="material-icons text-red">create</i>
              <span class="nav-link-text">Event Registration</span> 
            </a> 
            <div class="collapse" id="event-menu" style=""> 
              <ul class="nav nav-sm flex-column"> 
                <li class="nav-item"> 
                  <a href="/admin/mural-art" class="nav-link">3D Mural Art
                   <span class="badge bg-red text-white text-right">4</span>
                  </a> 
                </li>
                <li class="nav-item"> 
                  <a href="/admin/Anilag_Color_Run" class="nav-link">Anilag Color Run</a> 
                </li>  
                <li class="nav-item"> 
                  <a href="/admin/Anilag_Cosplay" class="nav-link">Anilag Cosplay</a> 
                </li> 
              <li class="nav-item active"> 
                <a class="nav-link " href="#event-menu" data-toggle="collapse" role="button" aria-expanded="false">
                  <span class="nav-link-text">Anilag Singing Idol</span> 
                </a> 
                <div class="collapse" id="event-menu" style=""> 
                  <ul class="nav nav-sm flex-column"> 
                    <li class="nav-item"> 
                      <a href="/admin/Anilag_Singing_Idol_Kid" class="nav-link">Kid Editions</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/admin/Anilag_Singing_Idol_Open" class="nav-link">Open Category</a> 
                    </li>  
                   
                </div> 
              </li>
                <li class="nav-item"> 
                  <a href="/admin/Bandilag" class="nav-link">Bandilag</a> 
                </li>
                <li class="nav-item"> 
                  <a href="/admin/Dance_Revolution" class="nav-link">Dance Revolution</a> 
                </li>
                <li class="nav-item"> 
                  <a href="/admin/Laguna_Gay_Queen" class="nav-link">Laguna Gay Queen</a> 
                </li>
                <li class="nav-item"> 
                  <a href="/admin/Laguna_Lesbian_King" class="nav-link">Laguna Lesbian King</a> 
                </li> 
                <li class="nav-item"> 
                  <a href="/admin/Mardi_Gay_Queen" class="nav-link">Mardi Gay Queen</a> 
                </li> 
                <li class="nav-item"> 
                  <a href="/admin/Water_Color_Competition" class="nav-link">Water Color Competition</a> 
                </li> 
              </ul> 
            </div> 
          </li>
          <li class="nav-item active"> 
            <a class="nav-link" href="#tesda-menu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards"> 
              <i class="fas fa-chalkboard-teacher text-success"></i> 
              <span class="nav-link-text">Training</span> 
            </a> 
            <div class="collapse" id="tesda-menu" style=""> 
              <ul class="nav nav-sm flex-column"> 
                <li class="nav-item"> 
                  <a href="/tesda" class="nav-link">IT Training Program</a> 
                </li>
              </ul> 
            </div> 
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="#">
              <i class="fa fa-bullhorn text-orange"></i> Announcement
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/admin/Calendar_Events">
              <i class="ni ni-calendar-grid-58 text-blue"></i> Calendar Events
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/admin/notification">
              <i class="ni ni-bell-55 text-yellow"></i> Notification
              <span class="badge bg-red text-white">2</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Manage Account</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="/admin/Account_Setting">
              <i class="ni ni-settings-gear-65"></i>Account Settings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/Myprofile">
              <i class="ni ni-single-02"></i> My profie
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/Photos">
              <i class="ni ni-album-2"></i> Photos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/About">
              <i class="fas fa-info-circle"></i> About
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> &nbsp;
              <i class="ni ni-user-run text-white"></i>
              <span class="text-white">{{ __('Logout') }}</span>
            </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
              </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

