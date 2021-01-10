<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>{{ $pagename }} - Youth Development Affairs Office</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="_token" content="{{ csrf_token() }}">
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
  <link href="{{ asset('/assets/vendor/nucleo/css/nucleo.css ') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link href="{{ asset('/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <link href="{{ asset('/css/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/ownstyle.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/toastr.css') }}">
  
  
</head>
 