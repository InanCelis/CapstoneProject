
<!-- Modal -->

    <form id="sendSMS" method="POST">
        @csrf
        <div class="modal-header bg-default">
            <h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-envelope"></i> Add New Text Message</h4>
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="modal-body container-fluid">
          <h3>{{ $event_name }}</h3>
          <div class="">
            <div class="row">
               <div class="col-lg-4 order-xl-2 mb-5 mb-xl-0">
                  <div class="form-group">
                     <label class="form-control-label location " for="from">From:</label>
                     <div class="input-group input-group-alternative mb-4">
                         <input class="form-control form-control-alternative bg-white" name="from" placeholder="Title" type="text" readonly value="YDA Laguna">
                     </div>
                  </div>
                  <div class="form-group ">
                    <h4 class="">Message:</h4>
                      <textarea class="form-control input-group-alternative text-dark description" rows="2" placeholder="Message" id="description" name="message" onkeyup="new do_resize(this);" cols="70" rows="3" ></textarea>
                 </div>
               </div>
               <div class="col-lg-8  order-xl-1" >
                  <h4 class="">To:</h4>
                     <div class="card shadow" style="max-height: 335px;">
                       <div class="card-header border-0">
                        <span class="badge badge-dot">
                          <b>Status: </b><i class="bg-warning"></i> on screening
                        </span>
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
                                   <th scope="col">Contact</th>
                               </tr>
                             </thead>
                          <tbody>
                            @foreach($event->where('event_registration_status', 2) as $event_2)
                               <tr class="content">
                                   <td>
                                    <div class="custom-control custom-checkbox mb-3">
                                       <input class="custom-control-input checkitem" name="SMSuser[]" id="{{ $event_2->user_id }}" type="checkbox" value="{{ $event_2->user_id }}">
                                       <label class="custom-control-label" for="{{ $event_2->user_id }}"></label>
                                    </div>
                                  </td>
                                  <th scope="row">
                                    <a href="/profile/{{ $event_2->user->username }}"  data-toggle="tooltip" data-placement="top" title="View Profile">
                                     <div class="media align-items-center">
                                       @if(isset($event_2->user->profile_picture) && $event_2->user->profile_picture !="none")
                                          <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                                           <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $event_2->user->profile_picture }}" height="35px" width="35px">
                                           </span>
                                           @else
                                           <span class="avatar avatar-sm rounded-circle {{ $event_2->user->color_profile }}" style="text-transform: uppercase;">
                                           {{ Str::limit($event_2->user->first_name ,1,'').Str::limit($event_2->user->last_name ,1,'') }}
                                           </span>
                                          @endif
                                       <div class="media-body">
                                          <span class="mb-0 text-sm text-dark">&nbsp; {{ $event_2->user->first_name }} {{ $event_2->user->last_name }}</span>
                                       </div>
                                     </div>
                                     </a>
                                   </th>
                                   <td>
                                     {{ $event_2->user->contact }}
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

        <div class="modal-footer my--3">
            <button type="submit" class="btn btn-success btn-rounded btn-submit"><i class="ni ni-send" id="subIcon"></i> Send</button>
        </div>
  </form>


<script type="text/javascript">
    $('#smstable').DataTable();
    
    $('#checkall').change(function(){
      $('.checkitem').prop('checked', $(this).prop('checked'));
    });

    $('.checkitem').change(function(){
      if($(this).prop('checked')==false){
        $('#checkall').prop('checked', false);
      }
      if($('.checkitem:checked').length == $('.checkitem').length){
        $('#checkall').prop('checked', true);
      }
    });




  //sending sms notification
    $('#sendSMS').on('submit', function(event){
      event.preventDefault();
      var event_id = {{ $event_id }};
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
          $('#modal_loader').modal('show');
          $('#subIcon').removeClass('ni ni-send');
          $('#subIcon').addClass('fas fa-spinner fa-spin');
          $.ajax({
          url:'/sendSMS/' + event_id,
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
            $('.checkitem').prop('checked', false);
            $('#description').val('');
            $('#modal_loader').modal('hide');
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
