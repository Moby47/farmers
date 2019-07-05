
@extends('layouts.app')

@section('title','Item Categories to Buy. Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

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
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>Categories</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">


                
			<div class="col-md-12 container-fluid"><!-- container-->


                <br>
                
                <!-- Categories -->
                    <!--Vertical Tab-->
                    <div class="categories-section main-grid-border">
                            <div class="container">
                                <h2 class="w3-head">Categories</h2>
                                <div class="category-list">
                                    <div id="parentVerticalTab">
                                        <div class="agileits-tab_nav">
                                        <ul class="resp-tabs-list hor_1">
                                            <li>Mobile Phones &amp; Tablets</li>
                                            <li>Electronics &amp; Appliances</li>
                                            <li>Swap Items</li>
                                            <li>Computers &amp; Accessories</li>
                                            <li>Furniture</li>
                                            <li>Pets</li>
                                            <li>Books, Sports &amp; Hobbies</li>
                                            <li>Fashion</li>
                                            <li>Lodging &amp; Accomodations</li>
                                            <li>Services</li>
                                            <li>Cosmetics &amp; Beauty</li>
                                         
                                            <li>Others</li>
                                            <li>Cryptocurrency</li>
                                        </ul>
                                            <a class="w3ls-ads" href="{{route('center')}}">Find all Posts</a>
                                        </div>
                                        <div class="resp-tabs-container hor_1">
                                            <span class="active total text-center" style="display:block;"> (Select title below to see post)</span>
                                            
                                               
                                          <!-- mobile-->
                                                <div><!--tab container-->
                                            

                                            <div class='tab1'>
                                               
                                                    <div class='text-center'> 
                                                            <b class='load1x'></b>
                                                            <b class='load11x'></b>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                            <!-- mobile-->


                                            <!-- electronic-->
                                            <div><!--tab container-->
                                                  
                                               
                                            <div class='tab2'>

                                                    <div class='text-center'> 
                                                            <b class='load2'></b>
                                                            <i class='load22'></i>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                            <!-- electronic-->


                                            <!-- swap-->
                                            <div><!--tab container-->
                                                  
                                               
                                            <div class='tab3'>

                                                    <div class='text-center'> 
                                                            <b class='load3'></b>
                                                            <i class='load33'></i>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                            <!-- swap-->
                                           

                                        <!-- computer-->
                                        <div><!--tab container-->
                                                  
                                            
                                        <div class='tab4'>

                                                <div class='text-center'> 
                                                        <b class='load4'></b>
                                                        <i class='load44'></i>
                                                        </div>
                                            
                                        </div>
                                    </div><!--tab container-->
                                            <!-- computer-->


                                            <!-- furniture-->
                                            <div><!--tab container-->
                                                  
                                              








                                            <div class='tab5'>

                                                    <div class='text-center'> 
                                                            <b class='load5'></b>
                                                            <i class='load55'></i>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                            <!-- Furniture-->


                                           <!-- pet-->
                                           <div><!--tab container-->
                                                  
                                           
                                           <div class='tab6'>

                                                <div class='text-center'> 
                                                        <b class='load6'></b>
                                                        <i class='load66'></i>
                                                        </div>
                                            
                                        </div>
                                    </div><!--tab container-->
                                        <!-- pet-->


                                            <!-- books sports hobbies-->
                                            <div><!--tab container-->
                                                  
                                                
                                            <div class='tab7'>

                                                    <div class='text-center'> 
                                                            <b class='load7'></b>
                                                            <i class='load77'></i>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                            <!-- books sports hobbies-->


                                            <!-- Fashion-->
                                            <div><!--tab container-->
                                                  
                                               
                                            <div class='tab8'>

                                                    <div class='text-center'> 
                                                            <b class='load8'></b>
                                                            <i class='load88'></i>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                            <!-- Fashion-->

                                            
                                          <!-- housing-->
                                          <div><!--tab container-->
                                                  
                                           
                                          <div class='tab9'>

                                                <div class='text-center'> 
                                                        <b class='load9'></b>
                                                        <i class='load99'></i>
                                                        </div>
                                            
                                        </div>
                                    </div><!--tab container-->
                                        <!-- housing-->


                                            <!-- service-->
                                            <div><!--tab container-->
                                                  
                                               
                                            <div class='tab10'>

                                                    <div class='text-center'> 
                                                            <b class='load10'></b>
                                                            <i class='load1010'></i>
                                                            </div>
                                                
                                            </div>
                                        </div><!--tab container-->
                                        <!-- service-->


                                                   <!-- cosmetics-->
                                                   <div><!--tab container-->
                                                  
                                                  
                                                   <div class='tab11'>

                                                        <div class='text-center'> 
                                                                <b class='load11'></b>
                                                                <i class='load1111'></i>
                                                                </div>
                                                    
                                                </div>
                                            </div><!--tab container-->
                                    <!-- cosmetics-->




                                    

                                           <!-- others-->
                                           <div><!--tab container-->
                                                  
                                           
                                           <div class='tab12'>

                                                <div class='text-center'> 
                                                        <b class='load12'></b>
                                                        <i class='load1212'></i>
                                                        </div>
                                            
                                        </div>
                                    </div><!--tab container-->
                                    <!-- others-->



 <!-- crypto-->
 <div><!--tab container-->
                                                  
   

<div class='tab13'>

    <div class='text-center'> 
            <b class='load13'></b>
            <b class='load1313'></b>
            </div>

</div>
</div><!--tab container-->
<!-- crypto-->



                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                                    <br>

				</div><!-- container -->
			








					</div>
				</div>
				</div>
				<div class="clearfix"></div>
            </div>
            
<!--box-->	<div class="select-box">


     <!-- ads -->
     <div class='col-md-12  back-white'>
			<h4 class='page-header text-center extra'>  Adverts On DStreet </h4>
			@if(count($more)>0)
	
			@foreach($more as $s)
			<!--start -->     <div class="col-md-4 w3ls-portfolio-left">
				 <!--img -->   <div class="portfolio-img event-img">
					<a href="/buy-ad/{{$s->id}}">
						   <img src="/storage/ads_images/{{$s->banner}}"
						class="img-responsive ad-size" alt="{{$s->title}}" title='{{$s->description}}' id='ad-size2'>
					</a>
						<div class="over-image"></div>
				 <!--img -->    </div>
	
				 <!--txt -->   <div class="portfolio-description padup">
				   @mobile
					<p class='white'> {{substr($s->title,0,14)}}..</p>
					@elsemobile
					<p class='white'> {{substr($s->title,0,22)}}..</p>
					@endmobile
					
					@mobile
					<p class='white'> {{substr($s->school,0,21)}}...</p>
					@elsemobile
					<p class='white'> {{substr($s->school,0,22)}}...</p>
					@endmobile
				<!--txt-->     </div>
					<div class="clearfix"> </div>
			 <!--end-->    </div>
			 @endforeach
	
		   @else
	
		   <div class="alert alert-info">
			  <h5 class="text-center">No Advert On The Street Now, <a href="/ads" class='text-danger'>Click to Place Your Ad</a></h5>
			  </div>
		   @endif
	
	
					 
	<!--all ads -->   <div class="text-center">
					   <div class='clearfix'></div>
		<a href="/all-student-adverts" class='btn btn-default'>
		  View All Ads
	  </a>
	 
	<!-- all ads-->     </div>
		 </div><!--panel end-->
		 <!-- ads -->


<div class="clearfix"></div>
<!--box-->	</div>

		</div>	
	</div>
	<!-- // Products -->
	<!--footer section start-->		
			<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		






		




		@endsection