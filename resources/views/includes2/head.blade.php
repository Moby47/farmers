<title>Dashboard .....</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

     <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- bootstrap-select-CSS -->
<link rel="stylesheet" href="{{ asset('visitor_css/bootstrap-select.css') }}">

<!-- Custom CSS -->
<link href="{{ asset('user_css/style.css') }}" rel='stylesheet' type='text/css' />

  <!-- fontawesome-CSS -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
<!-- Nav CSS -->
<link href="{{ asset('user_css/custom.css') }}" rel="stylesheet">

<!--busy load-->
<link href="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.css" rel="stylesheet">
    

@if(\route::current()->getname()=='ad-page')
 <!-- jquery ui css-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endif

 <!--toastr-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
            
<!--tab icon -->
<link rel="icon" href="{{ asset('images/icon.png') }}">

@if(\route::current()->getname()=='ad-page')
<!--color picker -->
<link rel='stylesheet' href="{{ asset('spectrum/spectrum.css') }}" />
@endif

 