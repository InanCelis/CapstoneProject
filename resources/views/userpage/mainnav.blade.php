<a id="button"></a>
 
 <!-- Sidenav -->
 @if(Auth::user()->usertype != 0)
   <nav class="navbar navbar-vertical fixed-left bg-gradient-default navbar-expand-md navbar-dark bg-black" id="sidenav-main">
  @else
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
 @endif
     <div class="container-fluid">
       <!-- Toggler -->
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
       </button>
       <!-- Brand -->
       <a href="/" class="navbar-brand pt-0">
        <center><img src="{{ asset('/pageicon/yda.png') }}" class="navbar-brand-img" alt="...">
          @if(Auth::user()->usertype != 0)
          <b><br> <h4 class="text-white">Youth Development <br> Affairs Office <br>of Laguna</h4>  </b>
          @else
          <b><br> <h4>Youth Development <br> Affairs Office <br>of Laguna</h4>  </b>
          @endif
        </center> 
       </a>
       <input type="hidden" id="logged-id" value="{{ auth()->id() }}">
       <!-- User -->
       <ul class="nav align-items-center d-md-none">

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <div class="media align-items-center ">
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
       <!-- Collapse -->
       <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
               <div class="col-6 collapse-brand">
                 <a href="/">
                  <center> <img src="{{ asset('/pageicon/yda.png') }}"><b class="text-dark">Youth Development Affairs</b></center>
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
          <form class="mt-4 mb-3 d-md-none" action="/search" method="GET">
            <div class="input-group input-group-rounded input-group-merge">
               <input type="search" class="form-control form-control-rounded form-control-prepended" name="q" placeholder="Search Person" aria-label="Search" value="{{ request()->input('q') }} " autocomplete="off">
               <div class="input-group-prepend">
                 <div class="input-group-text">
                    <span class="fa fa-search"></span>
                 </div>
               </div>
            </div>
          </form>
          <!-- Navigation -->
        {{-- admin event-menu --}}
        @if(Auth::user()->usertype == 1)
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/dashboard">
                <i class="ni ni-tv-2 text-info"></i> Dashboard
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/home">
                <i class="far fa-newspaper text-primary"></i>News feed
              </a>
            </li>
            <li class="nav-item active"> 
              <a class="nav-link " href="#event-menu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards"> 
                <i class="fas fa-pencil-alt text-danger"></i>
                <span class="nav-link-text">Event Registration</span> 
              </a> 
              <div class="collapse" id="event-menu" style=""> 
                <ul class="nav nav-sm flex-column"> 
                  <li class="nav-item"> 
                    <a href="/admin/mural-art" class="nav-link">3D Mural Art
                    </a> 
                  </li>
                  <li class="nav-item"> 
                    <a href="/admin/anilag-color-run" class="nav-link">Anilag Color Run</a> 
                  </li>  
                  <li class="nav-item"> 
                    <a href="/admin/anilag-cosplay" class="nav-link">Anilag Cosplay</a> 
                  </li> 
                <li class="nav-item active"> 
                  <a class="nav-link " href="#event-menu" data-toggle="collapse" role="button" aria-expanded="false">
                    <span class="nav-link-text">Anilag Singing Idol</span> 
                  </a> 
                  <div class="collapse" id="event-menu" style=""> 
                    <ul class="nav nav-sm flex-column"> 
                      <li class="nav-item"> 
                        <a href="/admin/anilag-singing-idol-kid-editions" class="nav-link">Kid Editions</a> 
                      </li> 
                      <li class="nav-item"> 
                        <a href="/admin/anilag-singing-idol-open-category" class="nav-link">Open Category</a> 
                      </li>  
                     
                  </div> 
                </li>
                  <li class="nav-item"> 
                    <a href="/admin/bandanilag" class="nav-link">Bandanilag</a> 
                  </li>
                  <li class="nav-item"> 
                    <a href="/admin/dance-revolution" class="nav-link">Dance Revolution</a> 
                  </li>
                  <li class="nav-item"> 
                    <a href="/admin/laguna-gay-queen" class="nav-link">Laguna Gay Queen</a> 
                  </li>
                  <li class="nav-item"> 
                    <a href="/admin/laguna-lesbian-king" class="nav-link">Laguna Lesbian King</a> 
                  </li> 
                  <li class="nav-item"> 
                    <a href="/admin/mardi-gay-queen" class="nav-link">Mardi Gay Queen</a> 
                  </li> 
                  <li class="nav-item"> 
                    <a href="/admin/water-color-competition" class="nav-link">Water Color Competition</a> 
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
                    <a href="/admin/it-training-program" class="nav-link">IT Training Program</a> 
                  </li>
                  <li class="nav-item"> 
                    <a href="/admin/it-training-program/archive" class="nav-link">Archive</a> 
                  </li>
                </ul> 
              </div> 
            </li>
            
            <li class="nav-item active">
              <a class="nav-link" href="/announcement">
                <i class="fa fa-bullhorn text-orange"></i> Announcement
              </a>
            </li>
            <li class="nav-item active"> 
               <a class="nav-link" href="#accreditation" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards"> 
                 <i class="fas fa-sitemap text-primary"></i> 
                 <span class="nav-link-text">Accreditation</span> 
               </a> 
               <div class="collapse" id="accreditation" style=""> 
                 <ul class="nav nav-sm flex-column">
                    <li class="nav-item"> 
                      <a href="/accreditation/accredited-organizations" class="nav-link">Accredited Organization</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/admin/accreditation/record" class="nav-link">Records</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/admin/accreditation/request" class="nav-link">Requests</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/admin/accreditation/archive" class="nav-link">Archive</a> 
                    </li>
                    
                 </ul> 
               </div> 
            </li>
            <li class="nav-item active" id="notif_fetch">
              <a class="nav-link notifs" href="/audit-trails">
                <i class="fas fa-history"></i> Audit Trails
              </a>
            </li>
            <li class="nav-item active" id="notif_fetch">
              <a class="nav-link notifs" href="/notifications">
                <i class="ni ni-bell-55 text-yellow"></i> Notification
                <span class="badge bg-red text-white pull-right notif_count">{{ number_format(count($notifications->where('status', 1))) }}</span>
              </a>
            </li>
            
          </ul>

        {{-- user menu --}}
        @else
          <ul class="navbar-nav my--3">

            <li class="nav-item active">
               <a class="nav-link" href="/home">
                 <i class="far fa-newspaper text-primary"></i>News feed
               </a>
            </li>
            <li class="nav-item active"> 
               <a class="nav-link " href="#event-menu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards"> 
                 <i class="fas fa-pencil-alt text-danger"></i>
                 <span class="nav-link-text">Event Registration</span> 
               </a> 
               <div class="collapse" id="event-menu" style=""> 
                 <ul class="nav nav-sm flex-column"> 
                    <li class="nav-item"> 
                      <a href="/mural-art" class="nav-link">3D Mural Art</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/anilag-color-run/register" class="nav-link">Anilag Color Run</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/anilag-cosplay/register" class="nav-link">Anilag Cosplay</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/anilag-singing-idol" class="nav-link">Anilag Singing Idol</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/bandanilag" class="nav-link">Bandanilag</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/dance-revolution" class="nav-link">Dance Revolution</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/laguna-gay-queen" class="nav-link">Laguna Gay Queen</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/laguna-lesbian-king" class="nav-link">Laguna Lesbian King</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/mardi-gay" class="nav-link">Mardi Gay Queen</a> 
                    </li> 
                    <li class="nav-item"> 
                      <a href="/water-color-competition" class="nav-link">Water Color Competition</a> 
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
                      <a href="/it-training-program" class="nav-link">IT Training Program</a> 
                    </li>
                 </ul> 
               </div> 
            </li>
            
            <li class="nav-item active">
               <a class="nav-link" href="/announcement">
                 <i class="fa fa-bullhorn text-orange"></i> Announcement
               </a>
            </li>
            <li class="nav-item active"> 
               <a class="nav-link" href="#accreditation" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards"> 
                 <i class="fas fa-sitemap text-primary"></i> 
                 <span class="nav-link-text">Accreditation</span> 
               </a> 
               <div class="collapse" id="accreditation" style=""> 
                 <ul class="nav nav-sm flex-column"> 
                    <li class="nav-item"> 
                      <a href="/accreditation/new-applicant" class="nav-link">New Applicant</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/accreditation/renewal" class="nav-link">Renewal</a> 
                    </li>
                    <li class="nav-item"> 
                      <a href="/accreditation/accredited-organizations" class="nav-link">Accredited Organization</a> 
                    </li>
                 </ul> 
               </div> 
            </li>
            <li class="nav-item active" id="notif_fetch">
               <a class="nav-link notifs" href="/notifications">
                 <i class="ni ni-bell-55 text-dark"></i> Notification
                 <span class="badge bg-red text-white pull-right notif_count">{{ number_format(count($notifications->where('status', 1))) }}</span>
               </a>
            </li>
          </ul>
          @endif
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading text-muted">Manage Account</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
               <a class="nav-link" href="/account-setting">
                 <i class="fas fa-user-cog"></i>Account Settings
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/profile/{{ Auth::user()->username }}">
                 <i class="ni ni-single-02"></i> My profie
               </a>
            </li>
            @if(Auth::user()->usertype == 1)
            <li class="nav-item">
            <a class="nav-link" href="/settings">
              <i class="fas fa-cogs"></i> Settings
            </a>
            </li>
            @endif
            <li class="nav-item">
             <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form2').submit();"> &nbsp;
               <i class="ni ni-user-run"></i>
               {{ __('Logout') }}
             </a>
              <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
            </li>
          </ul>
       </div>
     </div>
  </nav>
