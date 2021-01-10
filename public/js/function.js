 $(document).ready(function () {

  var btn = $('#button');
    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });
 
    $('#loadmore').hide();
    //user profile
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
//end user profile

     $(document).on('click', '.submitregister', function(){
          Swal.fire({
          title: 'Are you sure?',
          text: "All data above are true",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          }).then((result) => {
          if (result.value) {

          $('#registerform').submit();

          }
        })
     });

     //notif count back to 0
    $(document).on('click', '.notifs', function(){
      $('.notif_count').text('0');
        $.ajax({
          url:'/reset-notif-count',
          type: "GET",
          dataType:"json",

          success:function(data)
          {
            // alert(data.success);
            
          }
      });
    });

$(document).on('click', '.alisinangread', function(){
  $(".diparead").removeAttr("style");

  $.ajax({
          url:'/mark-all-read',
          type: "GET",
          dataType:"json",

          success:function(data)
          {
            // alert(data.success);
            
          }
      });

});
   
     

});

// function submitForm() {

// }


function do_resize(textbox) {

 var maxrows=10; 
  var txt=textbox.value;
  var cols=textbox.cols;

 var arraytxt=txt.split('\n');
  var rows=arraytxt.length; 

 for (i=0;i<arraytxt.length;i++) 
  rows+=parseInt(arraytxt[i].length/cols);

 if (rows>maxrows) textbox.rows=maxrows;
  else textbox.rows=rows;

 }

 //for video
var videos = document.querySelectorAll('video');
for(var i=0; i<videos.length; i++)
   videos[i].addEventListener('play', function(){pauseAll(this)}, true);

function pauseAll(elem){
  for(var i=0; i<videos.length; i++){
    //Is this the one we want to play?
    if(videos[i] == elem) continue;
    //Have we already played it && is it already paused?
    if(videos[i].played.length > 0 && !videos[i].paused){
    // Then pause it now
      videos[i].pause();
    }
   }
  }


// var mybutton = document.getElementById("gototopbutton");

// // When the user scrolls down 20px from the top of the document, show the button
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//     mybutton.style.display = "block";
//   } else {
//     mybutton.style.display = "none";
//   }
// }

// // When the user clicks on the button, scroll to the top of the document
// function topFunction() {
//   document.body.scrollTop = 0;
//   document.documentElement.scrollTop = 0;
// }
