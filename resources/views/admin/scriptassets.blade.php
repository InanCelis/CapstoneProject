  
 <!-- Argon Scripts -->
  <!-- Core -->
  <script type="text/javascript" src="{{ asset('/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script type="text/javascript" src="{{ asset('/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- Argon JS -->
  <script type="text/javascript" src="{{ asset('/assets/js/argon.js?v=1.0.0') }}"></script>
  <script src="{{ asset('/js/datatables.min.js') }}"></script>
  <script src="{{ asset('/js/sweetalert2.js') }}"></script>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script src="{{ asset('/js/function.js') }}"></script>
  <script src="{{ asset('/js/toastr.js') }}"></script>
  <script src="{{ asset('/js/sms.js') }}"></script>
  @include('userpage.includes.notification')
  @include('userpage.modals.addeventremark')

  <script type="text/javascript">  
  //sample datatable
   $(document).ready(function() {
       
     //event DATATABLE
     $('.table').DataTable();
 
   
   

    $('#videos').hide();
    $('#btn_video').click(function () {
      $('#btn_photo').removeClass('active');
      $('#btn_video').addClass('active');
      $('#videos').addClass('active').show();
      $('#photo').removeClass('active').hide();
    });

    $('#btn_photo').click(function () {
      $('#btn_photo').addClass('active');
      $('#btn_video').removeClass('active');
      $('#videos').removeClass('active').hide();
      $('#photo').addClass('active').show();
    });

       $('#loading').hide();
       $('#filteryearsubmit').click(function() {
       $('#loading').show();
       var filteryear = document.getElementById('filteryear').value;
       var res = document.getElementById('eventyear').innerHTML = filteryear;


    });


 
 




});

//end of jQuery
</script>
