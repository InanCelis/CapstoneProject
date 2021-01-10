 <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-black" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-black text-uppercase d-none d-lg-inline-block" href="./index.html"><h2>{{ $pagename }}  {{ session('userId') }}</h2></a>
        <!-- Form -->
        <form class="navbar-search navbar-search-light form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search Person" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                   <i class="ni ni-bell-55 text-dark"></i> <span class="badge bg-red text-white pull-right">2</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
               <h5 class="text-overflow m-0">Notifications </h5>
               <label class="tex-right"><a href=""> <br> Mark as all read</a></label>
              </div>
              <div class="dropdown-divider"></div>
              <div style="background:#E5E8E8; ">
              <a href="/Myprofile" class="dropdown-item">
               <div class="media align-items-center">
                <i class="fas fa-circle text-sm" data-toggle="tooltip" data-placement="bottom" title="Mark as read"> </i> &nbsp;&nbsp;
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/pageicon/yda.png" height="35px" width="35px">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Inan Celis</span> <label>and 10 other people hearted your post.</label><br>
                  <i class="material-icons text-red text-sm">favorite</i> <small>September 4, 2019 at 12:29pm</small>
                </div>
               </div>
              </a>
              </div>
              <div >
              <a href="/Myprofile" class="dropdown-item">
               <div class="media align-items-center">
                <i class="far fa-circle text-sm" data-toggle="tooltip" data-placement="bottom" title="Mark as unread"> </i> &nbsp;&nbsp;
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/pageicon/drin.jpg" height="35px" width="35px">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Aldrin Delera</span> <label>commented on your post</label><br>
                  <i class="material-icons text-success text-sm">comment</i> <small>September 4, 2019 at 12:29pm</small>
                </div>
               </div>
              </a>
              </div>
              <div style="background: #E5E8E8;">
              <a href="/Myprofile" class="dropdown-item">
               <div class="media align-items-center">
                <i class="fas fa-circle text-sm" data-toggle="tooltip" data-placement="bottom" title="Mark as read"> </i> &nbsp;&nbsp;
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/pageicon/yeah.jpg" height="35px" width="35px">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Inan Celis</span> <label>commented on your post</label><br>
                  <i class="material-icons text-success text-sm">comment</i> <small>September 4, 2019 at 12:29pm</small>
                </div>
               </div>
              </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                @if(isset(Auth::user()->profile_picture) && Auth::user()->profile_picture !="none")
                  <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                   <img alt="Image placeholder" src="/profile_picture/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
                   </span>
                   @else
                   <span class="avatar avatar-sm rounded-circle {{ Auth::user()->color_profile }}" style="text-transform: uppercase;">
                   {{ Str::limit(Auth::user()->first_name ,1,'').Str::limit(Auth::user()->last_name ,1,'') }}
                   </span>
                  @endif
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0 text-blue">{{ Auth::user()->email }}</h6>
                <h5 class="text-overflow m-0">Manage Account!</h5>
              </div>
              <a href="/Myprofile" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="/Account_Setting" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Account Setting</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> &nbsp;
              <i class="ni ni-user-run text-dark"></i>
              <span class="text-dark">{{ __('Logout') }}</span>
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>