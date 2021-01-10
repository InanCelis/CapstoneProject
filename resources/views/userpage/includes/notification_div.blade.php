


     <a class="nav-link pr-0 notifs" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <div class="media align-items-center">
                <div class="media-body ml-2 d-lg-block">
                     <i class="ni ni-bell-55 text-dark"></i> <span class="badge bg-red text-white pull-right notif_count">{{ number_format(count($notifications->where('status', 1))) }}</span>
                </div>
         </div>
     </a>
     <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
            @if(count($notifications))
                <div class="px-3 py-3 row">
                    <h6 class="text-sm text-muted m-0 col-6">Notifications</h6>
                    <a href="javascript:" class="text-right col-6 text-primary font-weight-bold text-sm card-title alisinangread">Mark all as read</a>
                </div>
                <!-- List group -->
                
                <div class="list-group list-group-flush my--3" style="overflow-y: auto; max-height: 400px;">

                   @include('userpage.includes.notif_content')

                </div>
                <!-- View all -->
                <a href="/notifications" class="dropdown-item text-center text-primary font-weight-bold my-3">View all</a>

                @else
                <h6 class="text-sm text-muted m-0 my-3 text-center">No Notification.</h6>
                @endif
         </div>

