
<div class="modal-body" >
  

@if($sorry != '')

  <h3>Edit Comment <a  class="pull-right text-dark " data-dismiss="modal"><i class="fas fa-times"></i></a></h3>
  <div class="alert alert-danger" role="alert">
    <strong>Opps!</strong> {{ $sorry }}
</div>


  @else

  <h3>Edit Comment <a  class="pull-right text-dark modal_edit_post_dismiss" {{-- data-dismiss="modal" --}}><i class="fas fa-times"></i></a></h3>
  <hr class="my--1">
  <br>
  <div class="media align-items-center line">
     @if(isset(Auth::user()->profile_picture) && Auth::user()->profile_picture !="none")
      <span class="avatar avatar-sm rounded-circle" style="text-transform: uppercase;">
       <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ Auth::user()->profile_picture }}" height="35px" width="35px">
       </span>
       @else
       <span class="avatar avatar-sm rounded-circle {{ Auth::user()->color_profile }}" style="text-transform: uppercase;">
       {{ Str::limit(Auth::user()->first_name ,1,'').Str::limit(Auth::user()->last_name ,1,'') }}
       </span>
      @endif
    <div class="media-body">
      <form id="saveChangesComment"  method="POST">
        @csrf

      @foreach($comment_data as $comment)
        <textarea class="form-control" id="edit_comment_content" name="edit_comment_content" placeholder="Leave a comment.." rows="2" required>{{ $comment->post_comment }}</textarea>
	  @endforeach

        <button type="submit" class="saveChangesComment btn btn-default btn-sm pull-right btn-submit">Save Changes</button>
      </form>
    </div>
  </div>
  {{-- <form>
  	@foreach($comment_data as $comment)
  		<textarea>{{ $comment->post_comment }}</textarea>
  	@endforeach
  </form> --}}

@endif
</div>


<script type="text/javascript">
	var comment_id = {{ $comment_id }};

	$('#saveChangesComment').on('submit', function(event)
	 {
	 	event.preventDefault();
	 	var comment_content = document.getElementById('edit_comment_content').value;

	 	if(comment_content == '')
	 	{
	 	   Swal.fire({
            title: 'Sorry',
            text: "Comment can't save without content.", 
            type: 'warning',
            confirmButtonColor: '#ff4444',
            confirmButtonText: 'OK'
            })
	 	}
	 	else
	 	{
      $('#modal_loader').modal('show');
	 		$.ajax(
		    {
              url:"/update_comment/" + comment_id,
              method:"POST",
              data: new FormData(this),
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
              success:function(data)
              {
               if(data.errors)
               {
                for(var count = 0; count < data.errors.length; count++)
                {
                  Swal.fire({
                  title: 'Warning',
                  text: data.errors[count], 
                  type: 'warning',
                  confirmButtonColor: '#ff4444',
                  confirmButtonText: 'OK'
                  })
                  
                }
               }
               if(data.success)
               {
               	$('.discard').modal('hide');
               	$('#heart_and_comment_content').html('');  
                $('#modal_loader').modal('show');
                    //reload comment
                  $.ajax({
                        url:'/get_heart_comment/' + post_id,
                        type: "GET",
                        dataType:"html",
                        
                    })
                    .done(function(data){
                      $('#heart_and_comment_content').html('');
                      $('#heart_and_comment_content').html(data);    
                      $('#modal_loader').modal('hide');  
                    })
                    .fail(function(){

                    });
                }
               if(data.sorry)
               {
                Swal.fire({
                  title: "Sorry!",
                  text:  data.sorry,
                  type: 'error',
                  confirmButtonColor: '#ff4444',
                  confirmButtonText: 'OK'
                  })
               }
                 $('#modal_loader').modal('hide');
              }
		    })
	 	}

	 });
</script>