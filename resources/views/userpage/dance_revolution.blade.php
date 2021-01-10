@include('userpage.cssassets')
<body >

<!-- Main content -->

@include('userpage.mainnav')
<div class="main-content">
  @include('userpage.secondnav')
   
       <!-- Header -->
       <div class="header  pb-8 pt-5 pt-md-8">
         <div class="container-fluid">
              <div class="header-body" style="margin-top: -25px">
               YDA - Laguna / Event Registration / {{ $pagename }}
              </div>
         </div>
       </div>
       
       <!-- Page content -->
       <div class="container-fluid mt--7" >
        <div class="laman">
         @if($event_status == 'open')
         <div id="notice"> 
            {{-- status bar --}}
            @include('userpage.includes.status_bar')
            
            @if($event_user_status-> count() > 0)
              <div class="card bg-white shadow">
                <div class="card-body">
                   <h3 class="text-danger"> <i class="fas fa-exclamation-triangle"></i> Important notice:</h3>
                   <a href="{{ route('dance_revolution.pdf') }}" target="_blank" class="btn btn-sm  btn-dark" ><i class="far fa-file-pdf text-danger"></i> PDF Application Form</a><br> <small>Congratulations! Please click the button to download the form and bring it on the audition time. This will disappear when the admin removes it.</small> 
                </div>
              </div>
            @endif

            @include('userpage.includes.remark')
            
         </div>
         
         <div class="row">
              <div class="col-xl-12 order-xl-1">
                  <div class="card bg-white shadow">
                     <div class="card-body">
                         <form id="dance_revolution" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="form_name" id="form_name" value="{{ __('#dance_revolution') }}">
                              <input type="hidden" name="route_name" id="route_name" value=" {{ route('dance-revolution.store')}}">
                              <div class="row">
                               <div class="col-lg-12">
                                <center>
                                     <label class="heading-large text-center  mb-4">ENTRY APPLICATION FORM</label>
                                     <h2 class="heading-large text-center  mb-4">DANCE REVOLUTION (Inter-Collegiate Dance Battle)</h2>
                                </center>
                               </div>
                              </div>
                        
                     <div class="pl-lg-4" id="reload">
                     @if($registeruser -> count() > 0)
                        @foreach($registeruser as $registered)
                              @foreach($user as $user_info)
                                <div class="row">
                                     <div class="col-md-7">
                                       <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Name of Group</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="material-icons text-dark">group</i></span>
                                                </div>
                                                <input class="form-control form-control-alternative" placeholder="Name of Group" type="text" name="name_of_group" id="name_of_group" required value="{{ $registered->name_of_group }}">
                                            </div>
                                       </div>
                                     </div>
                                 

                                     @foreach($user_info->tbl_address as $address)
                                     <div class="col-md-5">
                                       <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Municipality/City</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="material-icons text-dark">place</i></span>
                                                </div>
                                                <input class="form-control form-control-alternative " placeholder="Municipality/City" type="text" readonly value="{{ $address->tbl_barangay->tbl_town->town_name }}, Laguna">
                                            </div>
                                       </div>
                                     </div>
                                     @endforeach
                                </div>
                                <div class="row">
                                     <div class="col-md-4">
                                       <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Contact Person</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="material-icons text-dark">person</i></span>
                                                </div>
                                                <input class="form-control form-control-alternative" placeholder="Contact Person" type="text" readonly value="{{ $user_info->first_name }} {{ $user_info->middle_name }} {{ $user_info->last_name }}">
                                            </div>
                                       </div>
                                     </div>
                                     <div class="col-md-4">
                                       <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Contact number</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="material-icons text-dark">phone</i></span>
                                                </div>
                                                <input class="form-control form-control-alternative" placeholder="Contact number" type="text" readonly value="{{ $user_info->contact }}">
                                            </div>
                                       </div>
                                     </div>
                                     <div class="col-md-4">
                                       <div class="form-group">
                                            <label class="form-control-label" for="input-full-name">Email</label>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="material-icons text-dark">email</i></span>
                                                </div>
                                                <input class="form-control form-control-alternative" placeholder="Email" type="text" readonly value="{{ $user_info->email }}">
                                            </div>
                                       </div>
                                     </div>
                                </div>
                                <br>
                                <div class="row">
                                     <button type="submit" class="btn btn-icon btn-3 btn-danger" type="button">
                                       <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                                       <span class="btn-inner--text"> Update Group Name</span>
                                     </button>
                                </div>
                                @endforeach
                                <hr class="my-4" />
                                <small>
                                <h6 class="heading-small mb-1">Date registered</h6>
                                     {{ \Carbon\Carbon::parse($registered->created_at)->format('D - F d, Y h:i A')}}<br>
                                     {{ \Carbon\Carbon::createFromTimeStamp(strtotime($registered->created_at))->diffForHumans() }}
                                </small>
                                <br><br>
                                <h4 class=" text-muted">Members</h4>
                                <h4 class=" text-muted"><p class="btn btn-sm btn-default" data-toggle="modal" data-target="#add_member_modal"><i class=" fa fa-plus"></i> Add new member</p></h4>

                                 <table class="table table-responsive">
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>ID Picture</th>
                                                <th>Action</th>
                                            </tr>
                                          
                                            @foreach($registered->tbl_event_member as $member)
                                            
                                            <tr>
                                                <td>{{ $membercount++ }}</td>
                                                <td>{{ $member->member_name }}</td>
                                                <td>
                                                   <a href="{{ asset('/user_id_picture') }}/{{ $member->member_id_picture }}">
                                                   <img src="{{ asset('/user_id_picture') }}/{{ $member->member_id_picture }}" height="40px" width="40px" style="border: 1px solid gray"></a>
                                                </td>
                                                <td>
                                                   <a class="editmember btn btn-sm btn-round btn-success text-white" id="{{ $member->id }}" data-toggle="tooltip" data-placement="bottom" title="Edit member"><i class="fa fa-pen"></i></a>
                                                   <a class="deletemember btn btn-sm btn-round btn-danger text-white" id="{{ $member->id }}" data-toggle="tooltip" data-placement="bottom" title="Delete this member"><i class="fa fa-close"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                     </table> 
                          @endforeach
                          @else

                          @include('userpage.includes.groupevent')

                          @endif
                              </div>
                          
                         </form>
                     </div>
                  </div>
              </div>
         </div>
          @else
            @include('userpage.includes.registration-close')
            <br>
          @endif
        </div>
         <!-- Footer -->
         @include('userpage.footer')
       </div>
  </div>



@include('userpage.scriptassets')
<script src="{{ asset('/js/update-applicant-status.js') }}"></script>

<script type="text/javascript">
  // Add new input with associated 'remove' link when 'add' button is clicked.

var count =0;
$('.add_member').click(function(e) 
{
       e.preventDefault();
  
if(count<=18)
{
       $(".member_list").append(
       '<div class="row">'
       + '<a href="#" class="remove_project_file pull-right badge text-danger "><i class="fa fa-times"></i> remove</a>'
       +'<div class="col-md-6">'
       +       '<h4>Member Name</h4>'
       +       '<div class="form-group">'
       +         '<div class="input-group input-group-alternative mb-4">'
       +            '<input class="form-control form-control-alternative" placeholder="Name of Person" type="text" name="member_name[]" id="member_name[]"  required>'
       +        '</div>'
       +   ' </div>'
       + '</div>'
       +' <div class="col-md-5">'
       +       '<h4>ID Picture</h4>'
       +   '<div class="form-group">'
       +        '<input class="form-control form-control-alternative" placeholder="Name of Person" accept="image/*" type="file" name="member_image[]" id="member_image[]" required>'
       
       +   '</div>'
       + '</div>'
       
       + '</div>');

  count++;
}
else
{
  Swal.fire({
   title: 'Sorry you cannot add',
   text:  'Member maximum of 7 person only',
   type: 'error',
   confirmButtonColor: '#ff4444',
   confirmButtonText: 'OK'
   })
}

});

// Remove parent of 'remove' link when link is clicked.
$('.member_list').on('click', '.remove_project_file', function(e) 
{
       e.preventDefault();
       count--;
       
       $(this).parent().remove();

});

</script>
@include('userpage.includes.dance_revolution_member_cruds')

</body>
</html>