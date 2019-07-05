@extends('layouts.app')

@section('title', 'Buy, Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

@section('meta', 'Dstreet is an online market place to buy cheap stuff, sell, swap or advertise items - services for free to students in campus - Universities in Nigeria')

@section('content')


   
    <!-- header -->
    <header>
    @include('includes.header')
    </header>
    <!-- //header -->

    <!-- Slider -->
    <div class="slider">
        <ul class="rslides" id="slider">
                <li>
                        <div class="w3ls-slide-text">
                            <h3>DStreet Airtime give-away</h3>
                            @if(Auth()->check())
                            <a href="/claim-dstreet-promo" class="w3layouts-explore">Claim!!</a>
                           @else
                           <a href="/login-to-claim" class="w3layouts-explore">Claim!!</a>
                           @endif
                        </div>
                    </li>
             <li>
                 <div class="w3ls-slide-text">
                    <h3>Welcome to DStreet</h3>
                 <a href="{{route('center')}}" class="w3layouts-explore">Start</a>
                </div>
                
            </li>
        	 <li>
                 <div class="w3ls-slide-text">
                    <h3>Find the Best Deals</h3>
                    <a href="{{route('center')}}" class="w3layouts-explore">Explore</a>
                </div>
                
            </li>
            <li>
                <div class="w3ls-slide-text">
                    <h3>Get low price Items</h3>
                    <a href="{{route('center')}}" class="w3layouts-explore">Find</a>
                </div>
                
            </li>
            <li>
                <div class="w3ls-slide-text">
                    <h3>Find and Swap items</h3>
                    <a href="{{route('howto')}}" class="w3layouts-explore">How?</a>
                </div>
                
            </li>
            <li>
                <div class="w3ls-slide-text">
                    <h3>Sell on DStreet</h3>
                    @if(Auth()->check())
                <a href="{{route('post-page')}}" class="w3layouts-explore">Ok</a>
                   @else
                   <a href="{{route('goto_post')}}" class="w3layouts-explore">Ok</a>
                   @endif
                </div>
            </li>
            <li>
                    <div class="w3ls-slide-text">
                        <h3>Stay ontop of Dstreet?</h3>
                        @if(Auth()->check())
                    <a href="/ads" class="w3layouts-explore">Yes</a>
                       @else
                       <a href="/goto-ad" class="w3layouts-explore">Yes</a>
                       @endif
                    </div>
                </li>
            
            
           
        </ul>
    </div>
    <!-- //Slider -->


    
    
    <!-- content-starts-here //houses all-->
    <div class="main-content">

     

<!-- ..................*****************............... -->
            <div class="w3l-popular-ads">  
                   <!-- request marquee -->
        @if(count($req) >0)
        @foreach ($req as $r)
        <marquee><a href='{{route("reqqq")}}'>A request from {{$r->school}} was made {{$r->created_at->diffforhumans()}} [ {{$r->request}} ] (Click To Respond)</a></marquee>
        @endforeach
        @else

@if(Auth()->check())

@if ( Auth::user()->status == 1)
<marquee>Admin Account Has Limited Features </marquee>
@else
  <marquee><a href='{{route('request-page')}}'>Click Here To Make A Request Now! Someone Has What You Need..</a></marquee>
  @endif
  
      @else
      <marquee><a href='{{route('goto_req')}}'>Click Here To Make A Request Now! Someone Has What You Need..</a></marquee>
      @endif
      
        @endif
  <!-- request marquee -->
  
             <h3><span class="black">Latest Posts</h3>
                     <div class="w3l-popular-ads-info">

                            @if(count($post)>0)
                        @foreach($post as $p)
                    <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
                         <!--img -->   <div class="portfolio-img event-img">
                            <a href="/buy-product/{{str_replace(' ','-',$p->title)}}">
                                   <img src="/storage/post_images/{{$p->image_1}}"
                                class="img-responsive size" alt="{{$p->title}}" title='{{$p->description}}'>
                            </a>
                                <div class="over-image"></div>
                         <!--img -->    </div>

                          <!--txt -->   <div class="portfolio-description">
                               <h5 class='text-uppercase'><a href="/buy-product/{{str_replace(' ','-',$p->title)}}" class='white'>{{substr($p->title,0,14)}}..</a></h5>
                               <p >{{substr($p->description,0,20)}}...</p><!-- title-11 des-13-->
                                <a href="/buy-product/{{str_replace(' ','-',$p->title)}}" class='btn blue white'>
                                    View
                                </a>
                                
                                <p class='white'> {{substr($p->school,0,22) }} |  <i class="fa fa-eye"> </i> {{$p->sold}}
                                    | <i class="fa fa-clock-o"> </i>  {{$p->created_at->diffforhumans()}}</p>
                        <!--txt-->     </div>
                            <div class="clearfix"> </div>
                     <!--end-->    </div>
                     @endforeach
 <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
                         <!--img -->   <div class="portfolio-img event-img">
                                <img src="/storage/post_images/noimage.jpg"
                                 class="img-responsive size" alt="">
                                <div class="over-image"></div>
                         <!--img -->    </div>

                          <!--txt -->   <div class="portfolio-description"><i>
                              @if(Auth()->check())

                              @if(Auth()->user()->status == 0)
                               <h4><a href="{{route('post-page')}}">Post For Free</a></h4>
                               <p>Click To Create a Post</p>
                                <a href="{{route('post-page')}}" class='btn blue white'>
                                   Now!
                                </a>
                                @else
                                <h4><a href="#">Admin Account</a></h4>
                               <!-- <p>Post Disabled</p>-->
                                 
                                @endif


                                @else
                                <h4><a href="{{route('goto_post')}}">Post For Free</a></h4>
                               
                                <a href="{{route('goto_post')}}" class='btn blue white'>
                                   Now!
                                </a>
                               @endif 
                              <!--  <p>Posting Is Easy</p>-->
                                <p><a href='{{route('howto')}}'>Learn How</a></p>
                        <!--txt-->   </i>  </div>
                            <div class="clearfix"> </div>
                     <!--end-->    </div>
      @else

                        <div class="alert alert-info">
                               <h5 class="text-center">No Posts Found On Dstreet.
                                   @if(Auth()->check()) 
                                   
                                   @if ( Auth()->user()->status == 1)

                                   @else
                                   <a href='{{route('post-page')}}' class='text-danger'>Click Here To Create</a>
                                   @endif

                                   @else
                                   <a href='/goto-ad' class='text-danger'>Click Here To Create</a>
                                   @endif
                                </h5>
                         </div>

                        @endif
                     <!--needed last divs-->
                        <div class="clearfix"> </div>
                     </div>
                 </div>

                 <div class="text-center">
                        <a href='{{route('center')}}' class='btn blue white'>All Posts</a>
       </div>
                <!-- ..................*****************............... -->
      
        

<!-- .......................section end........................................ -->


<!-- ...............by category................................-->

<div class="w3-categories">
       
        <h3><span class="black">Categories</h3>
            <div class="container">

                <div class="col-md-3">
                    <div class="focus-grid w3layouts-boder1">
                        <a class="btn-8" href="/buy-by-categories/Mobile-phone-tablet#parentVerticalTab1">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-mobile"></i></div>
                                    <h4 class="clrchg">Mobile Phones..</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="focus-grid w3layouts-boder2">	
                    <a class="btn-8" href="/buy-by-categories/Electronics-Appliances#parentVerticalTab2">
                        <div class="focus-border">
                            <div class="focus-layout">
                                <div class="focus-image"><i class="fa fa-gamepad"></i></div>
                                <h4 class="clrchg"> Electronics-Appliances</h4>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
                <div class="col-md-3">
                <div class="focus-grid w3layouts-boder3">
                    <a class="btn-8" href="/buy-by-categories/Swap-Items#parentVerticalTab3">
                        <div class="focus-border">
                            <div class="focus-layout">
                                <div class="focus-image"><i class="fa fa-comments"></i></div>
                                <h4 class="clrchg">Swap Items</h4>
                            </div>
                        </div>
                    </a>
                </div>	
                </div>
                <div class="col-md-3">
                <div class="focus-grid w3layouts-boder4">
                    <a class="btn-8" href="/buy-by-categories/Computers-Accessories#parentVerticalTab4">
                        <div class="focus-border">
                            <div class="focus-layout">
                                <div class="focus-image"><i class="fa fa-laptop"></i></div>
                                <h4 class="clrchg">Computers-Accessories</h4>
                            </div>
                        </div>
                    </a>
                </div>	
                </div>

                <div class="container text-center"><!--colapse con-->
                   
                      
  <button type="button" class="btn blue white shift-up custom-btn" data-toggle="collapse" data-target="#demo">More Categories</button>
                        <div id="demo" class="collapse">

                            <!--con-->
                            <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder5">
                                        <a class="btn-8" href="/buy-by-categories/Furniture#parentVerticalTab5">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
                                                    <h4 class="clrchg">Furniture</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>
                            <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder6">
                                        <a class="btn-8" href="/buy-by-categories/Pets#parentVerticalTab6">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-paw"></i></div>
                                                    <h4 class="clrchg">Pets</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>	
                                    </div>
                                    <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder7">
                                        <a class="btn-8" href="/buy-by-categories/Books-Sports-Hobbies#parentVerticalTab7">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-book"></i></div>
                                                    <h4 class="clrchg">Books, Sports-Hobbies</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>	
                                    </div>
                                    <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder8">
                                        <a class="btn-8" href="/buy-by-categories/Fashion#parentVerticalTab8">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-star"></i></div>
                                                    <h4 class="clrchg">Fashion</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>	
                                    </div>
                                    <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder9">
                                        <a class="btn-8" href="/buy-by-categories/Lodging-Accomodations#parentVerticalTab9">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-home"></i></div>
                                                    <h4 class="clrchg">Housing</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>	
                                    </div>
                                    <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder10">
                                        <a class="btn-8" href="/buy-by-categories/Services#parentVerticalTab10">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-briefcase"></i></div>
                                                    <h4 class="clrchg">Services</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder11">
                                        <a class="btn-8" href="/buy-by-categories/Cosmetics-Beauty#parentVerticalTab11">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-female"></i></div>
                                                    <h4 class="clrchg">Cosmetics-Beauty</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="focus-grid w3layouts-boder12">
                                        <a class="btn-8" href="/buy-by-categories/Others#parentVerticalTab12">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="fa fa-lightbulb-o"></i></div>
                                                    <h4 class="clrchg">Others</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    </div>
                     
                                    <div class="col-md-3">
                                        <div class="focus-grid w3layouts-boder12">
                                            <a class="btn-8" href="/buy-by-categories/Cryptocurrency#parentVerticalTab13">
                                                <div class="focus-border">
                                                    <div class="focus-layout">
                                                        <div class="focus-image"><i class="fa fa-usd"></i></div>
                                                        <h4 class="clrchg">Currency</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        </div>
                            <!--con-->

                        </div>
                      </div><!--colapse con-->

                
                
               

                <div class="clearfix"></div>
        </div>
    </div>


<!-- ...............by category................................-->




        <!-- most-popular-ads -->
        <div class="trending-ads">
				<div class="container">
				<!-- slider -->
				<div class="agile-trend-ads">
					<h2 class="black ">Adverts</h2>
							<ul id="flexiselDemo3">



                                <!--............... set 1 ................. -->
								<li>
                                    @if (count($ads1)>0)

                                    @foreach($ads1 as $set1)
									<div class="col-md-3 biseller-column">
										<a href="/buy-ad/{{$set1->id}}" >
                                            <img src="storage/ads_images/{{$set1->banner}}" alt="{{$set1->description}}" 
                                            title="{{$set1->banner}}" class='ad_size'/>
											<span class="price">Premium</span>
										</a> 
										<div class="w3-ad-info">
											<h5>{{substr($set1->title,0,15)}}</h5>
											<span>{{$set1->created_at->diffforhumans()}}</span>
										</div>
                                    </div>
                                    @endforeach
                                    @else
                                     <div class="alert alert-info">
                                         @if(Auth::check())
                               <h5 class="text-center">No Advert Available In your School Now. 
                                @if ( Auth()->user()->status == 1)

                                @else
                                <a href="/ads"> <span class='text-danger'>Click to Place now!</span> </a></h5>
                                @endif


                               @else
                               <h5 class="text-center"><a href="/goto-ad">No Advert Available. 
                                <span class='text-danger'>Click to Place now!</span></a></h5>
                               @endif
                                  </div>
                             @endif
                                </li>
                                   <!--............... set 1 ................. -->



                                      <!--............... set 2 ................. -->
								<li>
									 @if (count($ads1)>0)

                                    @foreach($ads1 as $set2)
									<div class="col-md-3 biseller-column">
										<a href="/buy-ad/{{$set2->id}}" >
                                            <img src="/storage/ads_images/{{$set2->banner}}" alt="{{$set2->description}}" 
                                            title="{{$set2->banner}}" class='ad_size'/>
											<span class="price">Premium</span>
										</a> 
										<div class="w3-ad-info">
											<h5>{{substr($set2->title,0,15)}}</h5>
											<span>{{$set2->created_at->diffforhumans()}}</span>
										</div>
                                    </div>
                                    @endforeach
                                    @else
                                     <div class="alert alert-info">
                                            @if(Auth::check())
                                            <h5 class="text-center">No Advert Available In your School Now. 
                                                @if ( Auth()->user()->status == 1)

                                                @else
                                                <a href="/ads"> <span class='text-danger'>Click to Place now!</span> </a></h5>
                                                @endif
                                               @else
                                               <h5 class="text-center"><a href="/goto-ad">No Advert Available. 
                                                <span class='text-danger'>Click to Place now!</span></a></h5>
                                               @endif
                                </div>
                             @endif
                                </li>
                                   <!--............... set 2 ................. -->





                                      <!--............... set 3 ................. -->
								<li>
									 @if (count($ads1)>0)

                                    @foreach($ads1 as $set3)
									<div class="col-md-3 biseller-column">
										<a href="/buy-ad/{{$set3->id}}" >
                                            <img src="/storage/ads_images/{{$set3->banner}}" alt="{{$set3->description}}" 
                                            title="{{$set3->banner}}" class='ad_size'/>
											<span class="price">Premium</span>
										</a> 
										<div class="w3-ad-info">
											<h5>{{substr($set3->title,0,15)}}</h5>
											<span>{{$set3->created_at->diffforhumans()}}</span>
										</div>
                                    </div>
                                    @endforeach
                                    @else
                                     <div class="alert alert-info">
                                  @if(Auth::check())
                                  <h5 class="text-center">No Advert Available In your School Now. 
                                        @if ( Auth()->user()->status == 1)

                                        @else
                                        <a href="/ads"> <span class='text-danger'>Click to Place now!</span> </a></h5>
                                        @endif
                                       @else
                                   <h5 class="text-center"><a href="/goto-ad">No Advert Available. 
                                    <span class='text-danger'>Click to Place now!</span></a></h5>
                                   @endif
                                  </div>
                             @endif
                                </li>
                                   <!--............... set 3 ................. -->


                                    <!--............... set 4 ................. -->
								<li>
									 @if (count($ads1)>0)

                                    @foreach($ads1 as $set4)
									<div class="col-md-3 biseller-column">
										<a href="/buy-ad/{{$set4->id}}" >
                                            <img src="/storage/ads_images/{{$set4->banner}}" alt="{{$set4->description}}" 
                                            title="{{$set4->banner}}" class='ad_size'/>
											<span class="price">Premium</span>
										</a> 
										<div class="w3-ad-info">
											<h5>{{substr($set4->title,0,15)}}</h5>
											<span>{{$set4->created_at->diffforhumans()}}</span>
										</div>
                                    </div>
                                    @endforeach
                                    @else
                                     <div class="alert alert-info">
                                 @if(Auth::check())
                                 <h5 class="text-center">No Advert Available In your School Now. 
                                        @if ( Auth()->user()->status == 1)

                                        @else
                                        <a href="/ads"> <span class='text-danger'>Click to Place now!</span> </a></h5>
                                        @endif
                                       @else
                                   <h5 class="text-center"><a href="/goto-ad">No Advert Available. 
                                    <span class='text-danger'>Click to Place now!</span></a></h5>
                                   @endif
                                  </div>
                             @endif
                                </li>
                                   <!--............... set 4 ................. -->

                                   

                                

                              
						</ul>
					</div>   
			</div>
		<!-- //slider -->		

        <div class='text-center'><!--view all-->
            @guest
            <a href='/all-student-adverts' class='btn blue white '>All Adverts</a>
            @else
             <!-- Trigger the modal for ad section to view -->
    <button type="button" class="btn blue white custom-btn" id='mybtn'>All Adverts</button>
            @endguest
            </div><!--butt--><!--view all-->   

    </div><!--ad sec end-->
            
    <?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
?>

@if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false) 
<!--And webview-->
@else
	<!-- mobile app -->
    <div class="agile-info-mobile-app blue-shade">
        <div class="container">
            <div class="col-md-5 w3-app-left">
                <a href="/dstreet-for-android"><img src="/images/app.png" alt=""></a>
            </div>
            <div class="col-md-7 w3-app-right">
                <h3>DStreet! Bringing <span class='text-aqua'>DHustle</span> to your mobile screen.</h3>
                <p><span class='text-aqua'>B</span>uy, <span class='text-aqua'>S</span>ell, <span class='text-aqua'>S</span>wap.<br>
                   Request for <span class='text-aqua'>Scarce</span> items.<br> 
                   Make <span class='text-aqua'>Cash</span> from Student Projects.<br>
                    Get help for your <span class='text-aqua'>Project</span>.</p>
                <div class="agileits-dwld-app">
                    <h6>Download DApp : 
                      <!--  <a href="#" disabled='True'><i class="fa fa-apple"></i></a>
                        <a href="#"><i class="fa fa-windows"></i></a>-->
                        <a href="/dstreet-for-android"><i class="fa fa-android"></i></a>
                    </h6>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //mobile app -->
@endif



</div><!--main content end-->




<!--footer section start-->
    <footer>
       @include('includes.footer')
    </footer>
    <!--footer section end-->





<!-- ...........................advert direction modal....................-->	

<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Target Where?</h4>
						</div>
						<div class="">

                                <form action='{{route('myads')}}' class="form-horizontal" role="form">
                                    @if(Auth::check())
                     <input name='sch' type='hidden' value='{{Auth()->user()->school}}'/>
                                    @endif
											<div class='text-center'>
                                                    @if(Auth::check()) 	
                                       @if(Auth()->user()->status ==0)         
										<button type="submit" class="btn aqua white">
												 My School
										</button>
                                        @endif
                                        @endif
                                        
              <a href='/all-student-adverts' class='btn aqua white'>All Schools</a>
												
									</div>
									{{csrf_field()}}
			</form>
			
							<!--	<div class="modal-footer">
										<button type="button" class="btn blue white" data-dismiss="modal">
												<span class='glyphicon glyphicon-remove'></span> Close
										</button>
								</div>-->
						</div>
				</div>
		</div>
</div>












<!-- ...........................advert direction modal....................-->		




@endsection


        
   
   