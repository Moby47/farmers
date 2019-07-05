
@extends('layouts.app')

@section('title','FAQ And Help - Buy, Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

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
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>Help</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Faq -->
	<div class="faq main-grid-border">
		<div class="container">
			
				<h2 class="w3-head">Frequently asked Questions (FAQ)</h2>
				<div class="container col-md-6">

			<dl class="faq-list">
				@if (count($faq)>0)
				<ul id="list" class="list-group">
				@foreach ($faq as $f)
				
				<li class="list-group-item list-group-item-info"><h5>Q</h5></li>
				<li class="list-group-item"><h5>{{$f->question}}</h5></li>
				
				<br>
				<li class="list-group-item list-group-item-success"><h5>A</h5></li>
				<li class="list-group-item">{{$f->answer}}</li>
				<br>

				@endforeach
				<ul>
					{{$faq->links()}}
				@else

				 <div class="alert alert-info">
                               <h5 class="text-center">No Question Found</h5>
                         </div>
				@endif
				
			
          </dl>

		</div>	

	</div><!-- col-md-6-->

	</div>
	<!-- // Faq -->
	<!--footer section start-->		
		<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		






		@endsection