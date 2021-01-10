
$(document).ready(function () {





$(document).on('click', '#latest', function(){

  $('#latest').removeClass('btn-outline-default');
  $('#latest').addClass('btn-default');
  $('#heartsmost').addClass('btn-outline-default');
  $('#heartsmost').removeClass('btn-default');
  $('#commentsmost').addClass('btn-outline-default');
  $('#commentsmost').removeClass('btn-default');
  
  $('#lodingfeeds').show();

  $('#feeds').html('');
    $.ajax({ 
      url:'/showlatest/',
      success:function(data)
      { 
       
       $('#feeds').html(data);
       $('#lodingfeeds').hide();
       $('#loading-button').show();
      }
    });
  


});

$(document).on('click', '#heartsmost', function(){

  $('#latest').addClass('btn-outline-default');
  $('#latest').removeClass('btn-default');
  $('#heartsmost').removeClass('btn-outline-default');
  $('#heartsmost').addClass('btn-default');
  $('#commentsmost').addClass('btn-outline-default');
  $('#commentsmost').removeClass('btn-default');
  $('#loading-button').hide();
  $('#feeds').html('');
  $('#lodingfeeds').show();  
    $.ajax({ 
      url:'/showheartmost/',
      success:function(data)
      {
        
       $('#feeds').html(data);
       $('#lodingfeeds').hide();
      }
    });

});


$(document).on('click', '#commentsmost', function(){

  $('#latest').addClass('btn-outline-default');
  $('#latest').removeClass('btn-default');
  $('#heartsmost').addClass('btn-outline-default');
  $('#heartsmost').removeClass('btn-default');
  $('#commentsmost').removeClass('btn-outline-default');
  $('#commentsmost').addClass('btn-default');
  $('#loading-button').hide();
  $('#feeds').html('');
  $('#lodingfeeds').show();  

  $.ajax({ 
      url:'/showcommentsmost/',
      success:function(data)
      {
        
       $('#feeds').html(data);
       $('#lodingfeeds').hide();
      }
    });


});


    // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Read more";
    var lesstext = "Show less";
    

    $('.more').each(function() {
      var showChar = 400;
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });



  //newsfeed action
$('.submitpost').attr('disabled',true);
$('#progressbarloading').hide();

//post image function

var count = 0;
//add images
$('#images').on('change',function(e){
   $('#photo_spinner').css('display', 'block');
   var verifyimagevalue =  $('#images').val();
   var files = e.target.files;
   count = 0;
   $('.childtd').remove();
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
                $('#photo_spinner').css('display', 'none');
                document.getElementById("images").value = '';
                return false;
            } 
          
          // var images = $('#images')[0].files;
       
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
                    var template ='<td class="childtd">' +
                                    '<img src="'+z.target.result+'" height="100px" width="100px" id="imgsource">'+
                                  '</td>';

                    $('#photos').append(template);
                    $('#photo_spinner').css('display', 'none');
                    $('.submitpost').attr('disabled',false);

                  };

                });
              }
            }  


        $('#videobutton').hide();
        
      }
      else{

        count = 0;
        $('.submitpost').attr('disabled',true);
        $('#videobutton').show();
        $('#photobutton').show();
        $('.childtd').remove();
        $('#photo_spinner').css('display', 'none');
      }
    });

//add video
$('#video').on('change',function(e, file){

  if(this.files[0].type.indexOf("video")==-1){
        Swal.fire({
        title: 'Error',
        text: 'Invalid type, accept video only', 
        type: 'error',
        confirmButtonColor: '#ff4444',
        confirmButtonText: 'OK'
        });
        $('#photo_spinner').css('display', 'none');
        document.getElementById("video").value = '';
        return false;
    }
      

   $('#photo_spinner').css('display', 'block');
    var video = $('#video')[0].files;
    var reader = new FileReader();
    reader.onload = function(z){
      count++;
      var output = '<td class="childtd">'+
                      '<a  class="pull-right btn-danger btn-sm text-light" title="remove video" id="removevideo"><i class="fas fa-times"></i></a>'+
                      '<video src="'+reader.result+'" id="output" height="100px" width="100px"></video>'+
                    '</td>';
      
      $('#photos').append(output);
      $('#photo_spinner').css('display', 'none');
      $('.submitpost').attr('disabled',false);
    };
    reader.readAsDataURL(event.target.files[0]);
    $('#photobutton').hide();
    $('#videobutton').hide();
    

    });

$(document).on('click', '#removevideo', function(){
    var postdescription =  document.getElementById("description").value;
    var videodata =  document.getElementById("video").value = '';

    count = 0;
    if(postdescription == ''){
        $('.submitpost').attr('disabled',true);
      }
      else{
        $('.submitpost').attr('disabled',false);
      }
   
    $('#videobutton').show();
    $('#photobutton').show();
    $('.childtd').remove();
    $('#photo_spinner').css('display', 'none');
});

$('#description').keyup(function(){

  var postdescription =  document.getElementById("description").value;
  if(count == 0){
     
      $('#videobutton').show();
      $('#photobutton').show();
      
      if(postdescription == ''){
        $('.submitpost').attr('disabled',true);
      }
      else{
        $('.submitpost').attr('disabled',false);
      }
    }
      
 });


  //adding post
  $('#addpost').on('submit', function(event){

    $.ajaxSetup({
 
        headers: {
         
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         
        }
         
      });
        event.preventDefault();
        var des = $('#description').val();
        var img = $('#image').val();
        var vid = $('#video').val();

        if(count >10)
        {
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
            $.ajax({
            url:'/insertpost',
            method:"POST",
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            beforeSend:function(){
              $('.submitpost').attr('disabled',true);
              $('#addpost')[0].reset();
              $('#videobutton').show();
              $('#photobutton').show();
              // document.querySelectorAll('.childtd').forEach(e => e.remove());
              $('.childtd').remove();
              $('#progressbarloading').show();
              count = 0;
             },
            success:function(data)
            {
             
             if(data.errors)
             {
              
              for(var counts = 0; counts < data.errors.length; counts++)
              {
                Swal.fire({
                title: 'Warning',
                text: data.errors[counts], 
                type: 'warning',
                confirmButtonColor: '#ff4444',
                confirmButtonText: 'OK'
                })
              }
              $(".feeds").load(location.href + " .feeds");
              $('#progressbarloading').hide();
             }
             if(data.success)
             {
              
              $(".feeds").load(location.href + " .feeds");
              $('#progressbarloading').hide();
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
              $(".feeds").load(location.href + " .feeds");
              $('#progressbarloading').hide();
             }
                
            }
           })
        }
      
    });
  

   //deletepost
    var post_id;
    $(document).on('click', '.deletepost', function(){
      post_id = $(this).attr('id');
      var csrf_token = $('meta[name="_token"]').attr('content');
        Swal.fire({
        title: 'Are you sure?',
        text: "You can't retrieve this post!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        }).then((result) => {
        if (result.value) {

        $.ajax({
           url: "/postdelete/" + post_id,
           type: "POST",
           dataType:"json",
           data:{'_token' : csrf_token},
           success:function(data)
           {
            if(data.success)
             {
              Swal.fire(
              'Deleted!',
              'Your post has been removed.',
              'success'
              ) 
             // $(".feeds").load(location.href + " .feeds");
             // window.location.reload(true);
             $('#divpost'+post_id).remove();
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
          })
         }
      })
     });
 
 
 


// var page = 1;
//  $(window).scroll(function() {
//    if($(window).scrollTop() + $(document).height() == $(window).height()) {
//        alert("bottom!");
//    }
// });


//heart the post
$(document).on('click', '.heart', function(){

  var post_id = $(this).attr('id');
  $('.'+ post_id).removeClass('text-gray heart');
  $('.'+ post_id).addClass('text-danger unheart');
  var csrf_token = $('meta[name="_token"]').attr('content');
  $.ajax({
            url:'/heart_post/' + post_id,
            type: "POST",
            dataType:"json",
            data:{'_token' : csrf_token},
            success:function(data)
            {
             if(data.success)
             {
              
              if(data.allheart > 1)
              {
                $('#heart'+post_id).html(data.allheart + " hearts");
              }
              else if(data.allheart == 1)
              {
                $('#heart'+post_id).show();
                $('#heart'+post_id).html(data.allheart + " heart");
              }
              if(data.allheart == 0)
              {
                $('#heart'+post_id).hide();
              }
              
             }   
            }
        })
});

//unheart the post
$(document).on('click', '.unheart', function()
{
  var post_id = $(this).attr('id');
  var csrf_token = $('meta[name="_token"]').attr('content');
  $('.'+ post_id).addClass('text-gray heart');
  $('.'+ post_id).removeClass('text-danger unheart');
  $.ajax({
            url:'/unheart_post/' + post_id,
            type: "POST",
            dataType:"json",
            data:{'_token' : csrf_token},
            success:function(data)
            {
             if(data.success)
             {
              if(data.allheart > 1)
              {
                $('#heart'+post_id).html(data.allheart + " hearts");
              }
              else if(data.allheart == 1)
              {
                $('#heart'+post_id).show();
                $('#heart'+post_id).html(data.allheart + " heart");

              }

              if(data.allheart == 0)
              {
                $('#heart'+post_id).hide();
              }

             }   
            }
        })
    });


  //get post hearts and comments
  $(document).on('click', '.get_heart_comment', function()
  {
     $('#heart_and_comment_content').html('');  
     $('#modal_loader').modal('show');
     var post_id = $(this).attr('id');
      $.ajax({
            url:'/get_heart_comment/' + post_id,
            type: "GET",
            dataType:"html",
            
        })

        .done(function(data){
          $('#heart_and_comment_content').html('');
          $('#heart_and_comment_content').html(data);    
          $('#actionpost').modal('show');
          $('#modal_loader').modal('hide');           

        })

        .fail(function(){


        });
  });

  $(document).on('click', '.showEditPostModal', function()
  {
      $('#post_edit_content').html('');
      var post_id = $(this).attr('id');
      $('#modal_loader').modal('show');


      $.ajax({
            url:'/get_post/' + post_id,
            type: "GET",
            dataType:"html",

            success:function(data)
            {
              
              $('#post_edit_content').html('');
              $('#post_edit_content').html(data);    
              $('#FetchEditPost').modal('show');
              $('#modal_loader').modal('hide');
              
                
            }
            
        });

        


  });


//fetch comment to edit
$(document).on('click', '.editcomment', function()
{
  var edit_comment_id = $(this).attr('id');
  $('#modal_loader').modal('show');

  $.ajax({
        url:'/get_comment/' + edit_comment_id,
        type: "GET",
        dataType:"html",

        success:function(data)
        {
          $('#comment_edit_content').html('');
          $('#comment_edit_content').html(data);    
          $('#FetchEditcomment').modal('show');
          $('#modal_loader').modal('hide');
          
        }
      
        
    });

});


//discard changes
$(document).on('click', '.modal_edit_post_dismiss', function(){
  Swal.fire({
        title: '<h2>Discard Changes?</h2>',
        text: "If you discard now, you'll lose any changes you've made.",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: 'gray',
        cancelButtonText: "Keep editing",
        confirmButtonText: 'Discard',
        width: '450px',
        }).then((result) => {
        if (result.value) {
          $('.discard').modal('hide');
         }
      })

});
  var page = 1;

  $(document).on('click', '.flexible', function(){
        page = page + 1;
        $('#loadmore').show();
        $.ajax({ 
        url:'/fetch/post?page='+page,
        success:function(data)
        {
          if(data == "")
          {
            $('#loading-button').text('No more post');
            $('#loading-button').prop('disabled', true);
            $('#loadmore').hide();
          }
          else
          {
            $('#feeds').append(data);
            $('#loadmore').hide();
          }
          
        }
      });
    });


  var page = 1;
    $(document).on('click', '.seemorenotif', function(){
      $('#loadings').show();
      page = page + 1;
      $.ajax({ 
          url:'/fetch/notification?page='+page,
          success:function(data)
          {
            if(data == "")
            {
              $('.seemorenotif').text('No more notification');
              $('.seemorenotif').prop('disabled', true);
              $('#loadings').hide();
            }
            else
            {
              $('#showmorenotif').append(data);
              $('#loadings').hide();
            }
            
          }
        });
    });


});





