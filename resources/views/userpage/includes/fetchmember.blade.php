<div id="memberfetch">

  <button type="button" class="btn btn-md btn-default pull-right btn-sm" data-toggle="modal" data-target="#tesdamodal">
  Send SMS
  </button>

  @foreach($batches as $batch)
  <h1 class="text-primary">{{ $batch->batch_name }}</h1>
      @if($batch->schedule == 1)
      <h2>Weekend</h2>
      @else
      <h2>Weekdays</h2>
      @endif
  @endforeach

  <table class="table align-items-center " id="membertable">
      <thead class="thead-light">
        <tr>
             <th scope="col">No.</th>
             <th scope="col">User</th>
             <th scope="col">Sms Status</th>
             <th scope="col">Status</th>
             <th scope="col">Date Registered</th>
             <th scope="col">Remark</th>
             <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $count = 1; @endphp
        @foreach($tesda as $member)
            <tr id="user_{{$member->user_id}}">
              <td>{{ $count++ }}.</td>
              <th scope="row">
               <a href="/profile/{{ $member->user->username }}" data-toggle="tooltip" data-placement="top" title="View Profile">
               <div class="media align-items-center">
                    @if(isset($member->user->profile_picture) && $member->user->profile_picture !="none")
                        <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                         <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $member->user->profile_picture }}" height="35px" width="35px">
                         </span>
                         @else
                         <span class="avatar avatar-sm rounded-circle {{ $member->user->color_profile }}" style="text-transform: uppercase;">
                         {{ Str::limit($member->user->first_name ,1,'').Str::limit($member->user->last_name ,1,'') }}
                         </span>
                        @endif
                    <div class="media-body">
                        <span class="mb-0 text-sm text-dark">&nbsp; {{ $member->user->first_name }} {{ $member->user->last_name }}</span>
                    </div>
               </div>
               </a>
              </th>
              @if($member->sms_status == 1)
                  <td class="text-center"><i class="fas fa-times-circle text-lg text-danger"></i></td>
              @endif
              @if($member->sms_status == 2)
                  <td class="text-center"><i class="fas fa-check-circle text-lg text-success"></i></td>
              @endif
              @if($member->tesda_status == 2)
                  <td class="text-white"><label class="bg-danger">unfinish session </label></td>
              @endif
              @if($member->tesda_status == 3)
                  <td class="text-white"><label class="bg-success">session completed </label></td>
              @endif
              <td>{{ \Carbon\Carbon::parse($member->created_at)->format('M d, Y h:i A')}}</td>
              <td>
                  <label data-toggle="tooltip" data-placement="top" title="{{ $member->remarks }}">{{ str_limit($member->remarks, 10)}}
                  </label>
              </td>
              <td class="text-right">
               <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <h5 class="navbar-heading text-muted"><center>Action</center></h5>
                        <a class="dropdown-item" href="/admin/pdf/it-training-program-form/{{ $member->user->id }}" target="_blank"><i class="far fa-file-pdf text-success"></i>View pdf</a>
                        <a class="dropdown-item tesda_remark" id="{{ $member->user->id }}"><i class="fas fa-marker"></i>Add remarks</a>
                        @if($member->tesda_status != 3)
                          <a class="dropdown-item movepending" id="{{ $member->user->id }}"><i class="fas fa-user-clock"></i>Move to pending</a>
                        @endif
                        <hr class="my-1">
                        <small>&nbsp;<i class="far fa-question-circle text-dark"></i> Mark as</small>
                          @if($member->tesda_status == 2)
                          <a class="dropdown-item changestatus text-success" id="{{ $member->user_id }}">- completed</a>
                          @endif
                          @if($member->tesda_status == 3)
                          <a class="dropdown-item changestatus text-danger" id="{{ $member->user_id }}">- unfinish </a>
                          @endif
                    </div>
               </div>
             </td>
            </tr>
        @endforeach
      </tbody>
  </table>

</div>

<!-- Modal -->
<div class="modal fade" id="tesdamodal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-default">
            <h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-envelope"></i> Send Text Message</h4>
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <form id="sendtesdaSMS" method="POST">
          @csrf
            <div class="modal-body container-fluid">
                  <div class="">
                    <div class="row">
                         <div class="col-lg-4 order-xl-2 mb-5 mb-xl-0">
                              
                              <div class="form-group ">
                                <h4 class="">Message:</h4>
                                    <textarea class="form-control input-group-alternative text-dark description" rows="2" placeholder="Message" id="description" name="message" onkeyup="new do_resize(this);" cols="70" rows="3" ></textarea>
                           </div>
                         </div>
                         <div class="col-lg-8  order-xl-1" >
                              <h4 class="">To:</h4>
                                 <div class="card shadow" style="max-height: 335px;">
                                     <div class="card-header border-0">
                                      <h1 class="text-primary">{{ $batch->batch_name }}</h1>
                                      </div>
                                      <div class="table-responsive container">
                                       <table class="table align-items-center " id="smstable">
                                           <thead class="thead-light">
                                                 <tr>
                                                       <th scope="col">
                                                        <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                                            <input class="custom-control-input" id="checkall" type="checkbox">
                                                            <label class="custom-control-label" for="checkall"></label>
                                                        </div>
                                                       </th>
                                                       <th scope="col">User</th>
                                                       <th scope="col">Sms Status</th>
                                                       <th scope="col">Contact</th>
                                                       
                                                 </tr>
                                             </thead>
                                          <tbody>
                                            @foreach($tesda as $member)
                                                 <tr class="content">
                                                       <td>
                                                        <div class="custom-control custom-checkbox mb-3">
                                                             <input class="custom-control-input checkitems" name="SMSuser[]" id="user{{ $member->user_id }}" type="checkbox" value="{{ $member->user_id }}">
                                                             <label class="custom-control-label" for="user{{ $member->user_id }}"></label>
                                                        </div>
                                                      </td>
                                                      <th scope="row">
                                                        <a href="/profile/{{ $member->user->username }}"  data-toggle="tooltip" data-placement="top" title="View Profile">
                                                         <div class="media align-items-center">
                                                             @if(isset($member->user->profile_picture) && $member->user->profile_picture !="none")
                                                                  <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                                                   <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $member->user->profile_picture }}" height="35px" width="35px">
                                                                   </span>
                                                                   @else
                                                                   <span class="avatar avatar-sm rounded-circle {{ $member->user->color_profile }}" style="text-transform: uppercase;">
                                                                   {{ Str::limit($member->user->first_name ,1,'').Str::limit($member->user->last_name ,1,'') }}
                                                                   </span>
                                                                  @endif
                                                             <div class="media-body">
                                                                  <span class="mb-0 text-sm text-dark">&nbsp; {{ $member->user->first_name }} {{ $member->user->last_name }}</span>
                                                             </div>
                                                         </div>
                                                         </a>
                                                       </th>
                                                       @if($member->sms_status == 1)
                                                          <td class="text-center"><i class="fas fa-times-circle text-lg text-danger"></i></td>
                                                      @endif
                                                      @if($member->sms_status == 2)
                                                          <td class="text-center"><i class="fas fa-check-circle text-lg text-success"></i></td>
                                                      @endif
                                                       <td>
                                                         {{ $member->user->contact }}
                                                       </td>

                                                 </tr>
                                            @endforeach
                                          </tbody>
                                       </table>
                                      </div>
                                 </div>
                         </div>
                    </div>
                   </div>
            </div>
            <div class="modal-footer">
              <div class="modal-footer my--3">
                <button type="submit" class="btn btn-success btn-rounded btn-submit"><i class="ni ni-send" id="subIcon"></i> Send</button>
            </div>
            </div>
        </form>
      </div>
  </div>
</div>
<script type="text/javascript">
  $('#membertable').dataTable();
  


  $('#checkall').change(function(){
      $('.checkitems').prop('checked', $(this).prop('checked'));
    });

    $('.checkitems').change(function(){
      if($(this).prop('checked')==false){
        $('#checkall').prop('checked', false);
      }
      if($('.checkitems:checked').length == $('.checkitems').length){
        $('#checkall').prop('checked', true);
      }
    });
  
  //sending sms notification 
    $('#sendtesdaSMS').on('submit', function(event){
      event.preventDefault();

      var batch_id = {{ $id }};
      var count_checked = $("[name='SMSuser[]']:checked").length;
      var message = $('#description').val();
      $('.btn-submit').prop('disabled', true);
      if(count_checked == 0) 
      {
          toastr.error('Please select atleast one user to send message.', 'Warning!', {timeOut:3000, progressBar:true});
          $('.btn-submit').prop('disabled', false);
          return false;
      }
      else if(message == "")
      {
          toastr.error('No message.', 'Warning!', {timeOut:3000, progressBar:true});
          $('.btn-submit').prop('disabled', false);
      }
      else
      {
          $('#subIcon').removeClass('ni ni-send');
          $('#subIcon').addClass('fas fa-spinner fa-spin');
          $('#modal_loader').modal('show');
          $.ajax({
          url:'/sendtesdaSMS/' + batch_id,
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            $('#subIcon').removeClass('fas fa-spinner fa-spin');
            $('#subIcon').addClass('ni ni-send');
              
           if(data.success)
           {
            $('#checkall').prop('checked', false);
            $('.checkitems').prop('checked', false);
            $('#description').val('');
            $('#modal_loader').modal('hide');
            $('#tesdamodal').modal('hide');
            $("#fetchmember").load(location.href + " #fetchmember");
            $('.btn-submit').prop('disabled', false);
            toastr.success(data.success, 'Successfully!', {timeOut:3000, progressBar:true});
           }
           if(data.error)
           {
            $('#modal_loader').modal('hide');
            $('.btn-submit').prop('disabled', false);
            toastr.error(data.error, 'Warning!', {timeOut:3000, progressBar:true});
           }
          }
         })
        // toastr.success('Message Sent', 'Successfully!', {timeOut:3000, progressBar:true});
      }
    });
</script>