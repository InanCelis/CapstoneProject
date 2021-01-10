
{{-- addnew member in existing tbl_event_registration --}}
<script type="text/javascript">
  $(document).ready(function () 
  {
    //add new member
      $('#add_new_member').on('submit', function(event){
            event.preventDefault();
            $('#addnewicon').removeClass('ni ni-send');
            $('#addnewicon').addClass('fas fa-spinner fa-spin');
            $('.btn-submit').prop('disabled', true);

            $.ajax({
            url:"{{ route('addnewmember_bandanilag')}}",
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
              Swal.fire({
                title: 'Thank You',
                text:  data.success,
                type: 'success',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'OK'
                })
             }
             if(data.sorry)
             {
              Swal.fire({
                title: 'Sorry',
                text:  data.sorry,
                type: 'error',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                })
             }
                $("#reload").load(location.href + " #reload");
                $('#addnewicon').removeClass('fas fa-spinner fa-spin');
                $('#addnewicon').addClass('ni ni-send');
                $('#add_new_member')[0].reset();
                $('#add_member_modal').modal('hide');
                $(".table").load(location.href + " .table");
                $('.btn-submit').prop('disabled', false);
            }
           })
        });
 
    //update member  
    $('#update_member').on('submit', function(event){
            event.preventDefault();
            $('#editnewicon').removeClass('ni ni-send');
            $('#editnewicon').addClass('fas fa-spinner fa-spin');
            $('.btn-submit').prop('disabled', true);
            $.ajax({
            url:"{{ route('updatemember_bandanilag')}}",
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
              Swal.fire({
                title: 'Thank You',
                text:  data.success,
                type: 'success',
                confirmButtonColor: '#00C851',
                confirmButtonText: 'OK'
                })
             }
             if(data.sorry)
             {
              Swal.fire({
                title: "You can't edit this member",
                text:  data.sorry,
                type: 'error',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                })
             }
                $("#reload").load(location.href + " #reload");
                $('#editnewicon').removeClass('fas fa-spinner fa-spin');
                $('#editnewicon').addClass('ni ni-send');
                $('#update_member')[0].reset();
                $('#update_member_modal').modal('hide');
                $(".table").load(location.href + " .table");
                $('.btn-submit').prop('disabled', false);
            }
           })
        });
  
      

//delete member
    var member_id;
    $(document).on('click', '.deletemember', function(){
      member_id = $(this).attr('id');
      var csrf_token = $('meta[name="_token"]').attr('content');
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
        if (result.value) {

          // alert(member_id);
        $.ajax({
           url: "/bandanilag/" + member_id + "/delete",
           type: "POST",
           dataType:"json",
           data:{'_token' : csrf_token},
           success:function(data)
           {
            if(data.success)
             {
              Swal.fire(
              'Deleted!',
              'One member has been deleted.',
              'success'
              ) 
              $(".table").load(location.href + " .table");
             }
             if(data.sorry)
             {
              Swal.fire({
                title: "Cant't remove",
                text:  data.sorry,
                type: 'error',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                })
             }
           }
          });
         }
      })
     });

//fetch in modal
$(document).on('click', '.editmember', function(){
  var id = $(this).attr('id');
  $.ajax({
   url:"/bandanilag/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#edit_member_name').val(html.data.member_name);
    $('#store_image').html("<img src={{ URL::to('/') }}/user_id_picture/" + html.data.member_id_picture + " width='150px' height='150px' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.member_id_picture+"' />");
    $('#hidden_id').val(html.data.id);
    $('#update_member_modal').modal('show');
   }
  })
 });


});
</script>

<!-- Bandanilag Add member Modal -->
<div class="modal fade " id="add_member_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user text-info"></i> Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add_new_member" method="POST" enctype="multipart/form-data">
        @csrf
        
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h4>Member Name</h4>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-4">
                <input class="form-control form-control-alternative" placeholder="Name of Person" type="text" name="new_member_name" id="member_name" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4>ID Picture</h4>
            <div class="form-group">
              <input class="form-control form-control-alternative" placeholder="Name of Person" accept="image/*" type="file" name="new_member_id_picture" id="member_image"  required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-icon btn-3 btn-default btn-sm btn-submit" >
            <span class="btn-inner--icon"><i class="ni ni-send" id="addnewicon"></i></span>
            <span class="btn-inner--text"> Submit</span>
        </button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Bandanilag update member Modal -->
<div class="modal fade " id="update_member_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user text-info"></i> Edit Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="update_member" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hidden_id" id="hidden_id">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h4>Member Name</h4>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-4">
                <input class="form-control form-control-alternative" placeholder="Name of Person" type="text" name="member_name" id="edit_member_name" >
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <h4>Current ID Picture</h4>
            <div class="form-group">
              <span id="store_image"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4>ID Picture</h4>
            <div class="form-group">
              <input class="form-control form-control-alternative" placeholder="Name of Person" accept="image/*" type="file" name="id_picture" id="id_picture">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-icon btn-3 btn-default btn-sm btn-submit" >
            <span class="btn-inner--icon"><i class="ni ni-send" id="editnewicon"></i></span>
            <span class="btn-inner--text"> Update</span>
        </button>
      </div>
      </form>
    </div>
  </div>
</div>