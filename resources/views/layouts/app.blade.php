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
 



</body>


 @include('includes.js')

</html>