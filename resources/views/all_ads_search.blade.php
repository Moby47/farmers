
@extends('layouts.app')

@section('title','All Advertisements in Nigerian Campuses - Universities. Buy, Sell, Swap or Advertise to Students Using Dstreet Online Classisfied Website')

@section('meta', 'Dstreet is an online market place to buy cheap stuff, sell, swap or advertise items - services for free to students in campus - Universities in Nigeria')

@section('content')
	
	
	<!-- header -->
	 <header>
        @include('includes.header')
	</header>
	<!-- //header -->
	<!-- breadcrumbs -->
	<div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>Adverts Search</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Faq -->
	<div class="faq main-grid-border">
		<div class="container">

<!--search ad-->
        <form method='GET' action='{{route('ad_search')}}'>
        <div class="search-product ads-list">
              <br>
                <div class="">
                    <div id="custom-search-input">
                    <div class="input-group">

                        <input type="text" class="form-control input-lg" placeholder="Find AD"  name="ad_search">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg search" type="submit">
                                <i class="glyphicon glyphicon-search cus-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
            </div>
            {{csrf_field()}}
</form>
<!--search ad-->

            <br>
            <hr>

        <!-- ............................................................... -->
<div class="col-md-12 container-fluid well"> <!-- all post parent-->


    <div class="w3l-popular-ads-info">


        <!--dynamic-->

        @if(count($all_ads)>0)

        <div class="alert alert-info text-center">
                <h5> Showing {{count($all_ads)}} Ad(s) Found For <span class='text-success'>{{$query}}</span></h5>
         </div>

        @foreach($all_ads as $p)
<!--start loop -->     <div class="col-md-4 w3ls-portfolio-left">
<!--img -->   <div class="portfolio-img event-img">
        <a href="/buy-ad/{{$p->id}}">
<img src="/storage/ads_images/{{$p->banner}}" class="img-responsive size" alt="{{$p->title}}" title='{{$p->description}}'>
<div class="over-image"></div>
<!--img -->    </div>

  <!--txt -->   <div class="portfolio-description">
        <h4>{{substr($p->title,0,8)}}..</a></h4>
         <a href="/buy-ad/{{$p->id}}" class='btn blue white'>
             Explore
         </a>
         <p class='white'> {{substr($p->school,0,17) }} |  <i class="fa fa-eye"> </i> {{$p->views}}
             |  {{$p->created_at->diffforhumans()}}</p>
 <!--txt-->     </div>
 
<div class="clearfix"> </div>
<!--end loop-->    </div>

@endforeach
             
<div class="clearfix"> </div>

<div class='text-center'>
{{$all_ads->links()}}
</div>
                     @else

<div class="alert alert-info text-center">
<a href='/ads' class='text-danger '>No Result Found For <b class='text-primary'>{{$query}}</b>, Click Here To Place Your Ad Now!</a></h5>
        </div>

             @endif

<!--needed last divs-->
<div class="clearfix"> </div>
</div>






               </div><!-- all post parent-->
 <!-- ............................................................... -->

     

 
             
    
	</div>
	<!-- // Faq -->
	<!--footer section start-->		
		<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		




       


		@endsection