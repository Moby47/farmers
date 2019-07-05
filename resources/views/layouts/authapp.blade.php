<!DOCTYPE html>
<html lang="en">

<head>  
    
        <title>Dstreet - @yield('title')</title>
        
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- bootstrap-select-CSS -->
<link rel="stylesheet" href="{{ asset('visitor_css/bootstrap-select.css') }}">

<!-- Custom CSS -->
<link href="{{ asset('user_css/style.css') }}" rel='stylesheet' type='text/css' />


<!--toastr-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  

 <!-- fontawesome-CSS -->
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
<!--tab icon -->
<link rel="icon" href="{{ asset('images/icon.png') }}">
<!--tab icon -->
<!--busy load-->
<link href="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.css" rel="stylesheet">
    
<style>
.logo{
    width:20%;
}
.reg{
    display:none;
}

.logo-size{
    height: 70px;
}

.white{
    color:white !important;
}

.link{
    text-decoration:underline !important; 
}

.google{
    margin-top: 4% !important;
    background-color: #ea4335 !important;
}

.margin-up{
    margin-top: 4% !important;
}

.ash{
    background-color: grey !important;
}

.back{
   background: url(../../images/bg.jpg)no-repeat !important;
  background-size:cover;
  -webkit-background-size:cover;
  -moz-background-size:cover;
  -o-background-size:cover;
  -ms-background-size:cover;
  min-height:850px;
}
    </style>
</head>

<body>

@yield('content')

</body>


<!-- jQuery -->
<script src="{{ asset('user_js/jquery.min.js') }}"></script>
 <!-- Latest compiled bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- bootstrap-select-js -->
  <script src="{{ asset('visitor_js/bootstrap-select.js') }}"></script>

<!--toastr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


 <!--busyload-->
 <script src="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.js"></script>

 <!-- loader for a tags on web view-->
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false) { 
//yes Webview
echo "<script>
        $('a').click(function(){
            $.ajax({

beforeSend:function(){
 //busy load after
 $.busyLoadFull('show', { 
                spinner: 'accordion',
                background: 'rgba(3, 80, 150, 0.45)'
            });        
  },
complete:function(){
  //busy load after
  $.busyLoadFull('hide', { 
                spinner: 'accordion',
                background: 'rgba(3, 80, 150, 0.45)'
            });
                    },
success: function(data) {
},//success data end
}); //ajax end
        });
        </script>";
}else{
echo '';
}
?>

  <script>

      //phone number validation
$('.numval').on('keyup', function(){
var con = $('.numval').val();
if($('.numval').val().length > 11){
    $('.numerr').html('Number must be 11 e.g 08012345678');
}else if($('.numval').val().length < 11){
    $('.numerr').html('Number must be 11 e.g 08012345678');
}else{
    $('.numerr').html(' ');
}
});

</script>

    <script>
     

/*
setInterval(function(){
    var online = navigator.onLine;
    if(online){
         //online
         $("#checkbox1, .name, .email, .phone, #password-confirm, .pass").prop('disabled',false);
        $('#online').html('');
    }else{
        //offline
        $("#checkbox1, .name, .email, .phone, #password-confirm, .pass").prop('disabled',true);
        $('#online').html('No Internet Connection!');
    }
  
},1000)

*/
    </script>


</html>

