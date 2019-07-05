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
          
            
            
           
        </ul>
    </div>
    <!-- //Slider -->


    
    
    <!-- content-starts-here //houses all-->
    <div class="main-content">

     

<!-- ..................*****************............... -->
            <div class="w3l-popular-ads">  
                  
  
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
                                
                                <p class='white'> {{substr($p->school,0,22) }} <br>
                                    <i class="fa fa-clock-o"> </i>  {{$p->created_at->diffforhumans()}}</p>
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
                                   Ok
                                </a>
                                @else
                                <h4><a href="#">Admin Account</a></h4>
                               <!-- <p>Post Disabled</p>-->
                                 
                                @endif


                                @else
                                <h4><a href="{{route('goto_post')}}">Post For Free</a></h4>
                               
                                <a href="{{route('goto_post')}}" class='btn blue white'>
                                   Ok
                                </a>
                               @endif 
                              <!--  <p>Posting Is Easy</p>-->
                            
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

               

                
                
               

                <div class="clearfix"></div>
        </div>
    </div>


<!-- ...............by category................................-->





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


        
   
   