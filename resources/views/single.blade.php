@extends('layouts.app')

@section('title', $meta.' '.'on DStreet'.' - Buy, Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

@section('meta', $meta.' '.'on DStreet'.' - Buy cheap stuff, sell, swap or advertise items - services for free to students in campus - Universities in Nigeria')

@section('content')
	
	
	<!-- header -->
	 <header>
        @include('includes.header')
	</header>
	<!-- //header -->
	<!-- breadcrumbs -->
	<div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs">
			<a href="/"><i class="fa fa-home home_1"></i></a> / 
			<a href="">Post</a> / 
			<span>Details</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2 class='wrap'>{{$post->title}}</h2>

					@include('layouts.error')

					<p> <i class="glyphicon glyphicon-map-marker"></i><i>{{$post->school}}</i>, <i>{{$post->category}}</i>| Added {{$post->created_at->diffforhumans()}} </p>
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="/storage/post_images/{{$post->image_1}}">
								<img src="/storage/post_images/{{$post->image_1}}" alt="{{$post->title}}" title="{{$post->description}}" />
							</li>
							<li data-thumb="/storage/post_images/{{$post->image_2}}">
								<img src="/storage/post_images/{{$post->image_2}}" alt="{{$post->title}}" title="{{$post->description}}"/>
							</li>
							<li data-thumb="/storage/post_images/{{$post->image_3}}">
								<img src="/storage/post_images/{{$post->image_3}}" alt="{{$post->title}}" title="{{$post->description}}"/>
							</li>
							<li data-thumb="/storage/post_images/{{$post->image_4}}">
								<img src="/storage/post_images/{{$post->image_4}}" alt="{{$post->title}}" title="{{$post->description}}"/>
							</li>
						</ul>
					</div>
					
					<div class="product-details ">
						<h4><span class="w3layouts-agileinfo">Views</span> : {{$post->sold}}<div class="clearfix"></div></h4>
						<h4><span class="w3layouts-agileinfo">Summary</span> :   <p class='wrap' >{{$post->description}}</p><div class="clearfix"></div></h4>
						
					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">

						<!--important-->
						@if(Cache::has('msg'))
							
						@else
						@if($locator == 5000)
						@else
						<div class="product-price">
									<p class="p-price">Seller</p>
									<h4 class="rate text-uppercase">{{$seller}}</h4>
									<div class="clearfix"></div>
								</div>
								@endif
								@endif
						<div class="product-price">
								
								@if($post->price == 0)
							<p class="p-price">Type</p>
							<h3 class="rate">*Swap</h3>
							@elseif($post->price == 47)
							<p class="p-price">Type</p>
							<h4 class="rate text-primary">*Contact me for price</h4>
							@else
							<p class="p-price">Price</p>
							<h3 class="rate"><strike>N</strike>{{number_format($post->price)}}</h3>
							@endif

							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">Condition</p>
							<h5>
								<?php
                         if($post->status=="very_ok"){
                            echo "Very Ok";
                         }elseif($post->status=="very_very_ok"){
                            echo "Very Very Ok";
                         }else{
                             echo "Ok";
                         }
                        ?>
							</h5>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h5>{{$post->category}}</h5>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Go To</p>
							<h4><a href="{{route('center')}}" class="btn aqua white">All Posts</a></h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
								<p class="p-price">Sort By</p>
								<h4><a href="/buy-by-categories/Mobile-phone-tablet#parentVerticalTab1" class="btn aqua white">Category</a></h4>
								<div class="clearfix"></div>
							</div>
						@guest
						<div class="itemtype">
							<p class="p-price"><a href="/message-user/{{$post->id}}">Login to Unlock This Feature</a></p>
							<h4><button class="btn btn-danger white" disabled><span class="fa fa-star"></span></button></h4>
							<div class="clearfix"></div>
						</div>
						@else
						
						@if( Auth::user()->id !=  $post->user_id)

						@if(Auth::check())
						@if ( Auth::user()->status == 1)

						@else
						<div class="itemtype remove">
							<p class="p-price">Add to Favourites</p>
							<form method="" action="">
								<input type="hidden" value="{{$post->id}}" name="id" class='i'/>
								<input type="hidden" value="{{$post->title}}" name="title" class='t'/>
								<input type="hidden" value="{{$post->image_1}}" name="img1" class='i1'/>
								
							<h4><button class="btn aqua white fav_butt" type="submit"><span class="fa fa-star"></span></button></h4>
						{{csrf_field()}}
						</form>
							<div class="clearfix"></div>
						</div>
						@endif
						@endif

						@else
						
						<div class="itemtype remove">
							<p class="p-price">Add to Favourites</p>
						<label class="label aqua">Posted By You</label>
							<div class="clearfix"></div>
						</div>
						

						@endif

						@endguest
				
						@if(Auth::check())

						@if( Auth()->user()->id == $post->user_id)

						<div class="itemtype remove">
								<p class="p-price">Report Post</p>
							<label class="label aqua">Posted By You</label>
								<div class="clearfix"></div>
							</div>

						@else

						@if( Auth()->user()->status == 1 )

						@else
						<div class="itemtype">
								<p class="p-price">Report Post</p>
								<h4><button class="btn btn-danger repmodal" data-id='{{$post->id}}' data-title='{{$post->title}}'>
									<span class='fa fa-bug'></span></button></h4>
								<div class="clearfix"></div>
							</div>
							@endif
						@endif

						@else

						<div class="itemtype">
								<p class="p-price"><a href="/message-user/{{$post->id}}">Login to Unlock This Feature</a></p>
								<h4><button class="btn btn-danger repmodal" disabled>
									<span class='fa fa-bug'></span></button></h4>
								<div class="clearfix"></div>
							</div>

							@endif
						
							<div class="itemtype">
								<b>	<p class="">Share Item</p> </b><br>
									
								<div class="sharethis-inline-share-buttons"></div>
									
									<div class="clearfix"></div>
								</div>
							

					</div>

					<div class="interested text-center">
						<h4>Interested?<small> Contact Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i><a class='white btn btn-success custom-btn' href='tel:{{$post->number}}'>{{$post->number}}</a></p>
						
						
						@guest
						<p>OR</p>
						<br>
						@if($locator == 5000)
						@else
						<a href="/message-user/{{$post->id}}" class="btn btn-success">Chat</a>
						@endif
						<a href="sms:+234{{substr($post->number,1,11)}}?body=Hello" class="btn btn-success">SMS</a>

						@if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false)
						<!--webview-->
					@else
						<a href="intent://send/+234{{substr($post->number,1,11)}}#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end" class="btn btn-success">Whatsapp</a>
						@endif
						
						@else

						@if( Auth::user()->id ==  $post->user_id)
						<label class="label">Posted By You</label>
						@else

						@if(Auth::check())
						@if ( Auth::user()->status == 1)

						@else
						<p>OR</p>
						<br>
						
						@if($locator == 5000)
						@else
						<button class='btn btn-success message'  data-userid="{{$post->user_id}}" data-title="{{$post->title}}" data-myid="{{Auth()->user()->id}}" data-name="{{Auth()->user()->name}}" >Chat</button>
						@endif
						<a href="sms:+234{{substr($post->number,1,11)}}?body=Hello" class="btn btn-success">SMS</a>
						<a href="intent://send/+234{{substr($post->number,1,11)}}#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end" class="btn btn-success">Whatsapp</a>
					@endif
						@endif
							@endif

						@endguest

					
					
					</div>


						<div class="tips">
						<h4>Safety Tips for Buyers</h4>
							<ol>
								<li><a href="#">Make transactions in a public place.</a></li>
								<li><a href="#">Do not pay before delivery.</a></li>
							</ol>
						</div>
				</div>
			<div class="clearfix"></div>
	
			</div>
			

<!--other post buy seller or related -->

	<!--box-->	<div class="select-box">



		@if(count($personal)>3)

		<div class='text-center'>
		<h4 class='page-header'>Other Posts By 
			<!--important-->
			@if(Cache::has('msg'))
			Seller				
			@else
			@if($locator == 5000)
						@else
			<span class="text-capitalize">{{$seller}}</span>
			@endif
		@endif
		</h4>
			</div>

		@foreach($personal as $per)
			 <!--start loop -->     <div class="col-md-4 w3ls-portfolio-left">

                         <!--img -->   <div class="portfolio-img event-img">
								<a href="/buy-product/{{$per->id}}">
							    <img src="/storage/post_images/{{$per->image_1}}"
								 class="img-responsive size" alt="{{$per->title}}" title='{{$per->title}}'>
								</a>
                                <div class="over-image"></div>
                         <!--img -->    </div>

                          <!--txt -->   <div class="portfolio-description">
								<h4><a href="/buy-product/{{$per->id}}" class='white'>{{substr($per->title,0,9)}}..</a></h4>
								
								 <a href="/buy-product/{{$per->id}}" class='btn blue white'>
									 Explore
								 </a>
								 <p class='white'> {{substr($per->school,0,17)}}.. 
									 |  {{$per->created_at->diffforhumans()}}</p>
                               
                        <!--txt-->    </div>
                            <div class="clearfix"> </div>
				<!--end loop-->    </div>
				@endforeach
				@else
				<!-- backup plan-->
				@if(count($related)>0)

				<div class='text-center'>
				
						<h4 class='page-header'>Others In Your School</h4>
							</div>

				@foreach($related as $r)
				 <!--start loop -->     <div class="col-md-4 w3ls-portfolio-left">

                          <!--img -->   <div class="portfolio-img event-img">
								<a href="/buy-product/{{$r->id}}">
									<img src="/storage/post_images/{{$r->image_1}}"
									 class="img-responsive size" alt="{{$r->title}}" title='{{$r->title}}'>
									</a>
									<div class="over-image"></div>
							 <!--img -->    </div>
	
							  <!--txt -->   <div class="portfolio-description">
									<h4><a href="/buy-product/{{$r->id}}" class='white'>{{substr($r->title,0,9)}}..</a></h4>
									
									 <a href="/buy-product/{{$r->id}}" class='btn blue white'>
										 Explore
									 </a>
									 <p class='white'> {{substr($r->school,0,17)}}.. 
										 |  {{$r->created_at->diffforhumans()}}</p>
								   
							<!--txt-->    </div>
					   <div class="clearfix"> </div>
		   <!--end loop-->    </div>
		   @endforeach
		   @else
			<div class='alert alert-info text-center'>
				No Related Posts Now,
				@if(Auth()->check())
				<a href='/post' class='link'>Click To Create One</a>
				@else
				<a href='/goto-post' class='link'>Click To Create One</a>
				@endif
			</div>
		   @endif
				<!-- backup plan -->
			@endif


				
				<div class="clearfix"></div>
		<!--box-->	</div>

		<!--other post buy seller or related -->

		</div>

		

	</div>
	<!--//single-page-->
	<!--footer section start-->		
			<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		



		
	


   





 <!-- ...........................message modal....................-->		
 <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="msgggg" role="dialog">
          <div class="modal-dialog modal-lg">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title h">Send Message</h4>
              </div>
              <div class="modal-body b">
					<p class='wait text-center'></p> 
                      <div class="wthree-help">
                              <form action="" method="">
								
																	<input type='hidden' id='title' name="title" class="title"/>
																	<input type='hidden' id='myid' name="slave" class="slave"/>
																	<input type='hidden' id='userid'  name="master" class="master"/>
																	<input type='hidden' id='name' name="name" class="name"/>
								
											<textarea placeholder="Type Here" name="Message" class="Message" required="">{{old('Message')}}</textarea>
																						
                                      <hr>
                                    <button type="submit" class="btn btn-warning btn-warng1 mess"><span class="glyphicon glyphicon-send tag_02 load3"></span> Send </a>&nbsp;
                                  {{csrf_field()}}
                              </form>
                          </div>
              </div>
            <!--  <div class="modal-footer f">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>-->
            </div>
            
          </div>
        </div>
        
      </div>
  <!-- ...........................message modal....................-->	









    <!-- ...........................report modal....................-->		
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="rep" role="dialog">
      <div class="modal-dialog modal-lg">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title h">Item Report</h4>
          </div>
          <div class="modal-body b">
				<p class='wait text-center'></p> 
                  <div class="wthree-help">
                          <form action="" method="" class='report'>

							<table class='table table-hover table-striped'>
								<tr>
									<td><input value='Fraud' type='radio' checked='checked' name='repoption' class='option'/></td>
									<td>Fraud</td>
								</tr>
								<tr>
										<td><input value='Duplicate Item' type='radio' name='repoption' class='option'/></td>
										<td>Duplicate Item</td>
								</tr>
								<tr>
										<td><input value='Inappropriate Item' type='radio' name='repoption' class='option'/></td>
										<td>Inappropriate Item</td>
								</tr>
								<tr>
										<td><input value='Other' type='radio' name='repoption' class='option'/></td>
										<td>Other</td>
								</tr>
							</table>

                                <textarea placeholder="Comment" name="comment" class='comment' >{{old('Info')}}</textarea>
						   <input type="hidden" name='id' class='id'/>
						   <input type="hidden" name='title' class='t'/>
						   <input type="hidden" name='check' class='c'/>
                                  <hr>
  <button type="submit" class="btn btn-warning btn-warng1 repbtn" >
	  <span class="glyphicon glyphicon-send tag_02 loadbtn"></span> Send Complaint </button>&nbsp;
                              {{csrf_field()}}
                          </form>
                      </div>
          </div>
         <!-- <div class="modal-footer f">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>-->
        </div>
        
      </div>
    </div>
    
  </div>
<!-- ...........................report modal....................-->	


		@endsection

