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
			<span class="agile-breadcrumbs">
			<a href="/"><i class="fa fa-home home_1"></i></a> / 
			<a href="">Advert</a> / 
			<span>Details</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2 class='wrap'>{{ $ads->title}}</h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">{{$ads->school}}</a>
						 <i class="glyphicon glyphicon-time"></i> {{$ads->created_at->diffforhumans()}} </p>
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="/storage/ads_images/{{$ads->banner}}">
								<img src="/storage/ads_images/{{$ads->banner}}" alt="{{$ads->description}}" title="{{$ads->description}}" />
							</li>
							
						</ul>
					</div>
					
					<div class="product-details">
						<h4><span class="w3layouts-agileinfo">Views </span> :   {{$ads->views}}<div class="clearfix"></div></h4>
						<h4><span class="w3layouts-agileinfo">Summary</span> :  <p class='wrap'>{{$ads->description}}</p><div class="clearfix"></div></h4>
						
					
					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
					
						<div class="condition">
							<p class="p-price">Visit Us</p>
							<h5>
									@if($ads->link)
									<a href="http://{{$ads->link}}" target="_blank" class='wrap'>{{$ads->link}}</a>
									@else
									<p class="">Unavailable</p>
									@endif
								</h5>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
								<p class="p-price">All Adverts</p>
								<h4><a href="/all-student-adverts" class="btn aqua white">Here</a></h4>
								<div class="clearfix"></div>
							</div>
						<div class="itemtype">
							<p class="p-price">All Posts</p>
							<h4><a href="{{route('center')}}" class="btn aqua white">Here</a></h4>
							<div class="clearfix"></div>
						</div>
						@guest
						<div class="itemtype">
							<p class="p-price"><a href="/login">Login to Unlock This Features</a></p>
							<h4><button class="btn btn-danger white" disabled><span class="fa fa-star"></span></button></h4>
							<div class="clearfix"></div>
						</div>
						@else
						
						@if(Auth::user()->id == $ads->user_id)
						
						<div class="itemtype remove">
								<p class="p-price">Add to Favourites</p>
							<label class="label aqua">Posted By You</label>
								<div class="clearfix"></div>
							</div>

						@else
						
						@if(Auth::user()->status == 1)

						@else
						<div class="itemtype remove">
								<p class="p-price">Add to Favourites</p>
								<form method="POST" action="" >
									<input type="hidden" value="{{$ads->id}}" name="id" class='i'/>
									<input type="hidden" value="{{$ads->banner}}" name="banner" class='b'/>
								<h4><button class="btn aqua white fav_ad_butt" ><span class="fa fa-star"></span></button></h4>
							{{csrf_field()}}
							</form>
								<div class="clearfix"></div>
							</div>
							@endif
						
						@endif


						@endguest


						@if(Auth::check())

						@if( Auth()->user()->id == $ads->user_id)

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
								<h4><button class="btn btn-danger repadmodal" data-id='{{$ads->id}}' data-title='{{$ads->title}}'>
									<span class='fa fa-bug'></span></button></h4>
								<div class="clearfix"></div>
							</div>
							@endif
						@endif

						@else

						<div class="itemtype">
								<p class="p-price"><a href="/login">Login to Unlock This Feature</a></p>
								<h4><button class="btn btn-danger repmodal" disabled>
									<span class='fa fa-bug'></span></button></h4>
								<div class="clearfix"></div>
							</div>

							@endif
						
							<div class="itemtype">
									<b>	<p class="">Share Ad</p> </b><br>
										
									<div class="sharethis-inline-share-buttons"></div>
										
										<div class="clearfix"></div>
									</div>

					</div>


					<div class="interested text-center">
						<h4>Interested?<small class="white"> Contact Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i><a class='white btn btn-success custom-btn' href="tel:{{$ads->phone}}">{{$ads->phone}}</a></p>
						<p>OR</p>
						<br>
						<a href="mailto:{{$ads->mail}}" class="btn btn-success" >Send Mail</a>
						<a href="sms:+234{{substr($ads->phone,1,11)}}?body=Hello" class="btn btn-success">SMS</a>
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

<!--box-->	<div class="select-box">

    <!-- ads -->
    <div class='col-md-12  back-white'>
			<h4 class='page-header text-center extra'>  Other Adverts On DStreet </h4>
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

		</div><!--box end-->
		
	</div>
	<!--//single-page-->
	<!--footer section start-->		
			<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		





	

<!-- ...........................report modal....................-->		
<div class="container">
		<!-- Modal -->
		<div class="modal fade" id="repad" role="dialog">
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
	  <button type="submit" class="btn btn-warning btn-warng1 repadbtn" >
		  <span class="glyphicon glyphicon-send tag_02 loadbtn"></span> Send Complaint </button>&nbsp;
								  {{csrf_field()}}
							  </form>
						  </div>
			  </div>
			  <div class="modal-footer f">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
			
		  </div>
		</div>
		
	  </div>
	<!-- ...........................report modal....................-->	
	


  
  

		@endsection

