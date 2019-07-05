

@extends('layouts.app')

@section('title','Feedbacks - Buy, Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

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
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>Feedback</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Feedback -->
	<div class="feedback main-grid-border">
		<div class="container">
			<h2 class="w3-head">Leave a Review</h2>
			<div class="feed-back">
				<h3>Tell us what you think of us</h3>
				<p>Having a good experience in Dstreet? Your Positive reviews are vital to us. Thank you.</p>

				

				<div class="feed-back-form">
					<form method="" action="">

						@include('layouts.error')

					<span>User Email</span>
					
							<input type="text" placeholder="Email" name="Email" class='email' value="{{old('Email')}}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
							<span>What's your story?</span>
							<textarea name="Review" class='review' placeholder="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" >{{old('Review')}}</textarea>
							<input type="submit" value="submit" class="blue review-btn"><span class='load'></span>
							{{csrf_field()}}
						</form>
				</div>
			</div>
			
<hr>
			<div class="happy-clients">
					<div class="container">
						<div class="happy-clients-head text-center wow fadeInRight" data-wow-delay="0.4s">
						<h3>Reviews</h3>
						</div>
						<div class="happy-clients-grids rev">
							
							
							@if(count($reviews)>0)
	
							@foreach($reviews as $rev)
							<div class="col-md-6 happy-clients-grid wow bounceIn " data-wow-delay="0.4s">
								
								<div class="client-info">
									<p><img src="images/open-quatation.jpg" class="open" alt="" />{{$rev->message}}.<img src="images/close-quatation.jpg" class="closeq" alt="" /></p>
									<h4>{{$rev->created_at->diffforhumans()}}</h4>
								</div>
								<div class="clearfix"></div>
							</div>
							@endforeach
							@else
	
							 <div class="label">
								   <h5 class="text-center ">No Review at the Moment</h5>
							 </div>
								
							@endif
							
						
							<div class="clearfix"></div>
						</div>
					</div>
				</div>



		</div>	
	</div>
	<!-- // Feedback -->
	
	<!--footer section start-->		
		<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		





		@endsection