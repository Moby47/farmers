<!DOCTYPE html>
<html lang="en">

<head>  
        <!-- meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- //meta tags -->

        <title> @yield('title')</title>

         <!-- meta tags -->
   <meta name="description" content="@yield('meta')"/>

   <meta name="keywords" content="buy, sell, swap, school, university, campus, advert, advertise, post, marketplace, nigeria"/>

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- //meta tags -->
        
 @include('includes.head')

</head>

<body>
<!-- Navigation -->
@include('includes.nav')
    <!-- //Navigation -->


@yield('content')
 


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5b092b0810b99c7b36d453f7/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>


 @include('includes.js')

</html>