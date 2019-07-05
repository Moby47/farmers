<!--
@extends('layouts.app')

@section('title','Contact Us - Online Classified Website to Buy - Sell in Nigerian Campus - University')

@section('meta','Contact Dstreet, an online market place to buy, sell, swap items or advertise products - services in all campuses - Universities in Nigeria')

@section('content')
	
	
	<!-- header --
	 <header>
        @include('includes.header')
	</header>
	
	<!-- //header --
	<!-- breadcrumbs --
	<div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs"><a href="index.html"><i class="fa fa-home home_1"></i></a> / <span>Contact</span></span>
		</div>
	</div>
	<!-- //breadcrumbs --
	<!-- contact --
	<div class="contact main-grid-border">
		<div class="container">
			<h2 class="w3-head text-center">Contact Us</h2>
			<section id="hire">    
			<form id="filldetails" action="{{route('contact')}}" method="post">
					
					<div class="field name-box">
						<input type="text" name="Name" placeholder="Who Are You?" />
						<label>Name</label>
						<span class="ss-icon">check</span>
				  </div>

					  <div class="field email-box">
							<input type="text" name="Email" placeholder="example@email.com" />
							<label>Email</label>
							<span class="ss-icon">check</span>
					  </div>
					  
					  <div class="field msg-box">
							<textarea id="msg" rows="4" name='Message' placeholder="Your message goes here..."></textarea>
							<label>Your Msg</label>
							<span class="ss-icon">check</span>
					  </div>

					 <!--  
					<div class="field phonenum-box">
							<input type="text" name="tel" placeholder="Phone Number"/>
							<label>Phone</label>
							<span class="ss-icon">check</span>
					  </div>--
					  {{csrf_field()}}
					  <button class='btn aqua white contact-us '> <span class='load-us'></span> Send</button>
			  </form>
			
			</section>
			
		
		</div>	
		<!-- address --
		<div class="container">
			<div class="agileits-get-us">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Lagos, Nigeria</li>
					<li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:+2348035562231">+2348035562231</a></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info2dstreet@gmail.com"> info2dstreet@gmail.com</a></li>
				</ul>
			</div>
		</div>
		<!-- //address --
		
	</div>

	<!-- // contact --
	<!--footer section start--
		<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		





-->


		@endsection