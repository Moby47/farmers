
@extends('layouts.app')

@section('title','How To Run Dstreet - Buy, Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

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
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>How it Works</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- How it works -->
		<div class="work-section">
			<div class="container">
				<h2 class="w3-head">How To Run DStreet</h2>
					<div class="work-section-head text-center">
						<p>No need printing on paper and looking for space on an already full notice board to post your ads or defacing an innocent wall with your posts, just post on Dstreet!</p>
						<p>	Find what you need. Buy what you want.  It's fast, easy and free to create a post.</p>
					</div>
					<div class="work-section-grids text-center">
						<div class="col-md-3 work-section-grid">
							<i class="fa fa-pencil-square-o"></i>
							<h4>Create post</h4>
							<p>
								@guest
								<a href='/goto-post' class='link'>Post</a>
								@else
								<a href='/post' class='link'>Post</a>
								@endguest
								 free adverts on Dstreet / sell in your Nigerian Campus quickly...</p>
							<span class="arrow1"><img src="/images/arrow1.png" alt="sell product" /></span>
						</div>
						<div class="col-md-3 work-section-grid">
							<i class="fa fa-eye"></i>
							<h4>Find an Item</h4>
							<p><a href='{{route('center')}}' class='link'>Find</a> cheap stuff easily to buy or swap in or around your School in Nigeria...</p>
							<span class="arrow2"><img src="/images/arrow2.png" alt="find product" /></span>
						</div>
						<div class="col-md-3 work-section-grid">
							<i class="fa fa-phone"></i>
							<h4>Contact the Seller</h4>
							<p>Explore Dstreet. Find that contact to make that sweet deal in your University...</p>
							<span class="arrow1"><img src="/images/arrow1.png" alt="buy product" /></span>
						</div>
						<div class="col-md-3 work-section-grid">
							<i class="fa fa-money"></i>
							<h4>Make Transactions</h4>
							<p>Close the deal and walk away with what you need in your school...</p>
						</div>
						<div class="clearfix"></div>
						<a class="work custom-btn" href="{{route('center')}}">Get started Now</a>
					</div>
				</div>
		</div>	
		
	<!-- // How it works -->
	<!--footer section start-->		
		<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		








  


		@endsection