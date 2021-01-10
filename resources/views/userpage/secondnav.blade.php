 <!-- Top navbar -->
     <nav class="navbar navbar-top navbar-expand-md navbar-white" id="navbar-main">
       <div class="container-fluid">
          <!-- Brand -->
          <a class="h4 mb-0 text-black text-uppercase d-none d-lg-inline-block" href="./index.html"><h2>{{ $pagename }}</h2></a>
          <!-- Form -->
          <form class="navbar-search navbar-search-light form-inline mr-3 d-none d-md-flex ml-lg-auto" action="/search" method="GET">
            <div class="form-group mb-0">
               <div class="input-group input-group-alternative">
                 <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                 </div>
               <input type="search" class="form-control" name="q" placeholder="Search..." aria-label="Search" value="{{ request()->input('q') }}" autocomplete="off">
               </div>
            </div>
          </form>
          <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown notif_fetch">
              @include('userpage.includes.notification_div')

            </li>
            <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </div>
                 </div>
               </a>
               <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                 <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0 text-blue">{{ Auth::user()->email }}</h6>
                    <h5 class="text-overflow m-0">Manage Account</h5>
                 </div>
                 <a href="/profile/{{ Auth::user()->username }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                 </a>
                 <a href="/account-setting" class="dropdown-item">
                    <i class="fas fa-user-cog"></i>
                    <span>Account Settings</span>
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

   