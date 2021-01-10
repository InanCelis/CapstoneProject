<!DOCTYPE html>
<html>
<head>
  <title>{{ $pagename }} - Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Inan Celis">
  <meta property="og:image" content="http://ydalaguna.co/{{ asset('/pageicon/yda.png') }}" />
  <meta property="og:image:secure_url" content="http://ydalaguna.co/{{ asset('/pageicon/yda.png') }}" />
  <meta property="og:title" content="YOUTH DEVELOPMENT AFFAIRS OFFICE OF LAGUNA" />
  <meta property="og:image:width" content="1500" />
  <link rel="icon" type="image/png" href="{{ asset('/pageicon/yda.png') }}">
  <!-- Fonts --> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Icons -->
  <link href="{{ asset('/assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link href="{{ asset('/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <link href="{{ asset('/css/datatables.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/ownstyle.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/toastr.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  

<style type="text/css">
  ::-webkit-scrollbar {
width: 5px;
height: 12px;
}

::-webkit-scrollbar-track {
box-shadow: inset 0 0 10px lightgray;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
border-radius: 10px;
background: lightgray; 
box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

::-webkit-scrollbar-thumb:hover {
background: black;
}

.form-control-post {
    border: 0;
}

.no-border {
    border: 0;
    box-shadow: none;
    overflow:hidden;
}
.profileimg:hover{
opacity: 0.7;
}

.right{
  position: absolute;
  bottom: 10px;
  right: 20px;
}


 .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;   
    cursor: inherit;
    display: block;
}
.thick-1{
  height: 2px;
  color: black;
}
img {
  object-fit: cover;
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;

  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;

}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
  display: block;

}

/* Style the tab content */
.tabcontent {
  /*display: none;*/
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}

video{
  object-fit: cover;
}


</style>

</head>