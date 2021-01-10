<div class="modal-header bg-default">
    <h4 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-history"></i> SMS history year {{ $year }}</h4>
    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
<div class="modal-body container-fluid">
  <div class="table-responsive" style="max-height: 500px;">
    <table class="table align-items-center" id="smshistorytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">User</th>
                <th scope="col">Date sent</th>
                <th scope="col">Event</th>
                <th scope="col">View details</th>
            </tr>
        </thead>
        <tbody class="list">
          @php $count = 1; @endphp
          @foreach($smshistory as $histroy)
	        <tr>
	        	<td>{{ $count++ }}.</td>
	        	<th scope="row">
                <a href="/profile/{{ $histroy->user->username }}"  data-toggle="tooltip" data-placement="top" title="View Profile">
                 <div class="media align-items-center">
                   @if(isset($histroy->user->profile_picture) && $histroy->user->profile_picture !="none")
                      <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
                       <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $histroy->user->profile_picture }}" height="35px" width="35px">
                       </span>
                       @else
                       <span class="avatar avatar-sm rounded-circle {{ $histroy->user->color_profile }}" style="text-transform: uppercase;">
                       {{ Str::limit($histroy->user->first_name ,1,'').Str::limit($histroy->user->last_name ,1,'') }}
                       </span>
                      @endif
                   <div class="media-body">
                      <span class="mb-0 text-sm text-dark">&nbsp; {{ $histroy->user->first_name }} {{ $histroy->user->last_name }}</span>
                   </div>
                 </div>
                 </a>
               </th>
               <td>
	               {{ \Carbon\Carbon::parse($histroy->created_at)->format('M d, Y h:i A')}}
	           </td>
	           <th scope="row">{{ $histroy->tbl_event->event_name }}</th>
	           <td class="text-center"><button type="button" class="btn btn-primary btn-sm viewsmsdetail" id="{{ $histroy->id }}"><i class="fas fa-eye"></i> View </button></td>
	        </tr>
          @endforeach  
            
        </tbody>
    </table>
   </div>
</div>

{{-- sms view detail --}}
   <div class="modal fade discard" id="viewdetail"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content" id="detailcontent">
            
          </div>
     </div>
   </div> 


<script type="text/javascript">
	$('#smshistorytable').DataTable();

  $(document).on('click', '.viewsmsdetail', function()
  {
    var id = $(this).attr('id');
    $('#detailcontent').html('');  
    $('#modal_loader').modal('show');
   $.ajax({
            url:'/sms-history-detail/' + id,
            type: "GET",
            dataType:"html",
            
        })

        .done(function(data){
          $('#detailcontent').html('');
          $('#detailcontent').html(data);    
          $('#viewdetail').modal('show');
          $('#modal_loader').modal('hide');           

        })

        .fail(function(){


        });

  });
</script>