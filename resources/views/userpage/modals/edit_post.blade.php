<div class="modal-body" >
@if($sorry != '')

  <h3>Edit Comment <a  class="pull-right text-dark " data-dismiss="modal"><i class="fas fa-times"></i></a></h3>
  <div class="alert alert-danger" role="alert">
    <strong>Opps!</strong> {{ $sorry }}
  </div>

@else
  <h3>Edit Post <a  class="pull-right text-dark modal_edit_post_dismiss" {{-- data-dismiss="modal" --}}><i class="fas fa-times"></i></a></h3>
  <hr class="my--1">
  <form  id="editpost" method="POST" enctype="multipart/form-data">
  	@csrf
    @foreach($postdata as $post)
    	<div class="posts" >
	          <br>  
	         <div class="row">
	           <div class="col-10">
	            <div class="media align-items-center col-12">
                <a href="/profile/{{ $post->user->username }}">
  	             <span class="avatar avatar-md rounded-circle {{ $post->user->color_profile }}">
  	               @if(isset($post->user->profile_picture ) &&  $post->user->profile_picture !="none" )
  	               <img alt="Image placeholder" src="{{ asset('/profile_picture') }}/{{ $post->user->profile_picture}}" height="50px" width="50px">
  	               @else
  	               {{ Str::limit($post->user->first_name ,1,'').Str::limit($post->user->last_name ,1,'') }}
  	               @endif
  	              </span>
                 </a>
	                <div class="media-body  d-lg-block">
	                  <span class="mb-0 text-md  font-weight-bold text-dark"><b><a href="/profile/{{ $post->user->username }}">{{ $post->user->first_name }} {{ $post->user->last_name }}</a></b>
	                  </span><br>
	                  <h5>&nbsp;{{ \Carbon\Carbon::parse($post->updated_at)->format('F d, Y h:i A')}}</h5>
	                  <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->updated_at))->diffForHumans() }}</small>
	                </div>
	             </div>
	            </div>
	          </div><br>
	          
		         <div class="card-text ">
		            <label class="text-sm col-12">
		            	<textarea class="form-control form-control-post description" id="edit_description" onkeyup="new do_resize(this);" cols="70" name="edit_description" placeholder="Say Something about this post..">{{ str_replace('<br />', '\n', $post->post_description)}}</textarea>
		            </label>
		         </div>
		    
	        	<hr class="my-1">
	          {{-- //videos --}}

	          <table class="table-responsive">
	            <tr id="editphotos">
	              <td id="photo_spinner_edit" style="display: none;">
	                &emsp;<i class="fas fa-spinner fa-spin text-right"></i>
	              </td>
	             @foreach($post->tbl_post_video as $video)
	         	  @if($video->post_videos)
	               <td class="posteditcontent">
	               	 <video src="/post_videos/{{$video->post_videos}}"  id="output" height="100px" width="100px" ></video>
	               </td>
	              @endif
	             @endforeach
	             @foreach($post->tbl_post_image as $image)
	              @if($image->post_image)
					<td class="posteditcontent">
					  <img src="{{ asset('/post_images') }}/{{ $image->post_image }}" height="100px" width="100px" id="imgsource">
					</td>
				  @endif
	             @endforeach

	            </tr>
               </table>

	        </div>
      @endforeach
    	<br>
         <span class="btn btn-sm btn-icon btn-3  btn-outline-default btn-file" id="editphotobutton">
            <span class="btn-inner--icon"><i class="ni ni-image text-success"></i></span>
            <input type="file" accept="image/*" name="image[]" id="editimages" title="" multiple>
            <span class="btn-inner--text">Photo</span>
         </span>
         <span class="btn  btn-sm btn-icon btn-3  btn-outline-default btn-file" id="editvideobutton">
            <span class="btn-inner--icon"><i class="material-icons text-sm text-red">video_library</i></span>
            <input type="file" accept="video/*" name="video" id="editvideo" >
            <span class="btn-inner--text">Video</span>
         </span>
        
    	<button type="submit" class="save_edit_post btn btn-default btn-sm pull-right">Save Changes</button>
  </form>
  @endif
</div>


<script type="text/javascript">
var post_id = "{{ $post_id }}";

	

 $(document).ready(function(){

 var count = 0;
//add images
$('#editimages').on('change',function(e){

   $('#photo_spinner_edit').css('display', 'block');
   var verifyimagevalue =  $('#editimages').val();
   var files = e.target.files;
   count = 0;
   $('.posteditcontent').remove();
   if (verifyimagevalue != '')
   {
          if(this.files[0].type.indexOf("image")==-1){
                Swal.fire({
                title: 'Error',
                text: 'Invalid type, accept image only', 
                type: 'error',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                });
                $('#photo_spinner_edit').css('display', 'none');
                return false;
            }   
           if(this.files[0].size>10048576){
                Swal.fire({
                title: 'Error',
                text: 'Image Size should not be greater than 10 MB', 
                type: 'error',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                });
                $('#photo_spinner_edit').css('display', 'none');
                return false;
            }
          
          
       
          for( var i=0; i<files.length / files.length; i++)
          {

             if(count >=10){
                Swal.fire({
                title: 'Sorry',
                text: 'Maximum of 10 image only!', 
                type: 'warning',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                });
             }
             else
             {  

                $.each(files, function(i, file){

                  var reader = new FileReader();
                  reader.readAsDataURL(file);
                  reader.onload = function(z){
                  count++;
                    var template ='<td class="posteditcontent">' +
                                    '<img src="'+z.target.result+'" height="100px" width="100px" id="imgsource">'+
                                  '</td>';

                    $('#editphotos').append(template);
                    $('#photo_spinner_edit').css('display', 'none');
                    // $('.submitpost').attr('disabled',false);

                  };

                });
              }
            }  


        $('#editvideobutton').hide();
        
      }
      else{

        count = 0;
        // $('.submitpost').attr('disabled',true);
        $('#editvideobutton').show();
        $('#editphotobutton').show();
        $('.posteditcontent').remove();
        $('#photo_spinner_edit').css('display', 'none');
      }
    });


$('#editvideo').on('change',function(e, file){
  $('.posteditcontent').remove();
  if(this.files[0].type.indexOf("video")==-1){
        Swal.fire({
        title: 'Error',
        text: 'Invalid type, accept video only', 
        type: 'error',
        confirmButtonColor: '#ff4444',
        confirmButtonText: 'OK'
        });
        $('#photo_spinner_edit').css('display', 'none');
        return false;
    }
    if(this.files[0].size>100000000){
        Swal.fire({
        title: 'Error',
        text: 'Image Size should not be greater than 1 MB', 
        type: 'error',
        confirmButtonColor: '#ff4444',
        confirmButtonText: 'OK'
        });
        $('#photo_spinner_edit').css('display', 'none');
        return false;
      }  

   $('#photo_spinner_edit').css('display', 'block');
    var video = $('#editvideo')[0].files;
    var reader = new FileReader();
    reader.onload = function(z){
      count++;
      var output = '<td class="posteditcontent">'+
                      '<a  class="pull-right btn-danger btn-sm text-light" title="remove video" id="editremovevideo"><i class="fas fa-times"></i></a>'+
                      '<video src="'+reader.result+'" id="output" height="100px" width="100px"></video>'+
                    '</td>';
      
      $('#editphotos').append(output);
      $('#photo_spinner_edit').css('display', 'none');
      
    };
    reader.readAsDataURL(event.target.files[0]);
    $('#editvideobutton').hide();
    $('#editphotobutton').hide();
    

    });


$(document).on('click', '#editremovevideo', function(){
    var postdescription =  document.getElementById("description").value;
    var videodata =  document.getElementById("editvideo").value = '';

    count = 0;
   
    $('#editvideobutton').show();
    $('#editphotobutton').show();
    $('.posteditcontent').remove();
    $('#photo_spinner').css('display', 'none');
});

//update post

	$('#editpost').on('submit', function(event)
	 {
	    event.preventDefault();
	    
       var description = document.getElementById('edit_description').value;
       var editimages = document.getElementById('editimages').value;
       var editvideo = document.getElementById('editvideo').value;


       if(description == '' && editimages == '' && editvideo =='')
       {
      	Swal.fire({
            title: 'Sorry',
            text: "Post can't save without content.", 
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
              url:"/updatepost/" + post_id,
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
               	window.location.reload(true);
               }
               if(data.sorry)
               {
                Swal.fire({
                  title: "You can't edit this post!",
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
	


	

   });
</script>