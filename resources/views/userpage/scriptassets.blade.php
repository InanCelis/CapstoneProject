 <!-- Argon Scripts -->
  <!-- Core -->
  <script type="text/javascript" src="{{ asset('/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script type="text/javascript" src="{{ asset('/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script type="text/javascript" src="{{ asset('/assets/js/argon.js?v=1.0.0') }}"></script>
  <script src="{{ asset('/admin_assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/datatables.min.js') }}"></script>
  <script src="{{ asset('/js/sweetalert2.js') }}"></script>
{{--   <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script> --}}
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script src="{{ asset('/js/function.js') }}"></script>
  <script src="{{ asset('/js/toastr.js') }}"></script> 
  @include('userpage.includes.notification')
  <script type="text/javascript">
  
  $(document).ready(function () {
 
     
  //pag add ng data sa mga event
  var form_name = $('#form_name').val();
  var route_name = $('#route_name').val();


  $(form_name).on('submit', function(event){
          event.preventDefault();
          $.ajax({
          url:route_name,
          method:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          beforeSend:function(){
            $('#subIcon').removeClass('ni ni-send');
            $('#subIcon').addClass('fas fa-spinner fa-spin');
            $('.btn-submit').prop('disabled', true);
           },
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
            $("#reload").load(location.href + " #reload"); 
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
               $('#subIcon').removeClass('fas fa-spinner fa-spin');
               $('#subIcon').addClass('ni ni-send');
               $('#id_picture').val('');
               $(".table").load(location.href + " .table");
               $('.btn-submit').prop('disabled', false);
               $("#notice").load(location.href + " #notice");
               
               
               
          }
        })
       
     });




  });

  </script>
 
