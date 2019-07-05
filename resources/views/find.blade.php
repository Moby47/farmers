
@extends('layouts.app')

@section('title','Find Item to Buy. Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

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
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>Find Posts</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">

				@if(session('deact'))
				<div class='alert alert-danger text-center'> {{session('deact')}}</div>
				 @endif

				 @if(session('sold'))
				 <div class='alert alert-info text-center'> {{session('sold')}}</div>
				  @endif
				  
				  @if(session('unveri'))
				 <div class='alert alert-info text-center'> {{session('unveri')}}</div>
				  @endif
				  
				   @if(session('none'))
				 <div class='alert alert-info text-center'> {{session('none')}}</div>
				  @endif
					<!-- search area end -->
				<div class="select-box">

					<!-- school search -->
						<div class="select-city-for-local-ads ads-list">
							<label>Select School</label>
								<select name="School" id='school' class="school_select selectpicker show-tick" data-live-search="true" >
									
										<option>Showing Active Schools</option>
										@foreach($pcount as $p)       
													<option value='{{$p->school}}'>{{$p->school}} ({{$p->total}} post(s)) </option>
													@endforeach
									
									</select> 
										<br><span class='load1'></span> <span class='wait'></span>
						</div>
						
					<!-- school search -->


						<!-- category search -->
						<div class="browse-category ads-list">
							<label>Browse Categories</label>
							<select name="Category" id='cat' class="cat_select selectpicker show-tick" data-live-search="true" >
									@foreach($ccount as $c)       
									<option value='{{$c->category}}'> {{$c->category}} - {{$c->total}} post(s)</option>
									@endforeach
							</select>
							<br><span class='load2cat'></span><span class='catwait'></span>
						</div>
						<!-- category search -->


<!-- custom search -->

						<div class="search-product ads-list">
							<label>Search For a Post</label>
							<div class="">
								<div id="custom-search-input">
								<div class="input-group">

										@if (Auth::check())
									<input type="text" class="form-control input-lg" placeholder="Search Dstreet" id='keyword' name="Search">
									<span class="input-group-btn">
										<button class="btn btn-info btn-lg search-btn" type="button">
											<i class="glyphicon glyphicon-search"></i>
										</button>
									</span>
									@else
									<input type="text" class="form-control input-lg" placeholder="Search Dstreet" id='keyword' name="Search">
									<span class="input-group-btn">
										<button class="btn btn-info btn-lg search" type="button">
											<i class="glyphicon glyphicon-search cus-search"></i>
										</button>
									</span>
									@endif

								</div>
							</div>
							</div>
						</div>

						<!-- custom search -->

						<div class="clearfix"></div>
					</div>
					
					<!-- search area end -->

				<span class='load-text'></span>
				<span class='load-spin-find'></span>
				<span class='pload'></span>	
				<span class='p2load'></span>	
				<span class='loadtxt'></span>

				



			<div class="col-md-12 change"><!-- load sch search rec lower section-->

				</div><!-- lower section -->
			
				<div class="col-md-12 change2"><!-- load cat search rec lower section-->

				</div><!-- lower section -->
		
				<div class="col-md-12 change3"><!--load cus search rec lower section-->

				</div><!-- lower section -->








					</div>
				</div>
				</div>
				<div class="clearfix"></div>
				
			</div>
		</div>	
	</div>
	<!-- // Products -->
	<!--footer section start-->		
			<footer>
       @include('includes.footer')
    </footer>
        <!--footer section end-->
		
		






		<!-- show  number Modal-->
<div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Phone Number</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        
								<input type="hidden" class="form-control" id="number" >
								
								<h4 class='callme text-center'></h4>

					</form>
					
                   <!-- <div class="modal-footer">
                        <button type="button" class="btn blue white" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <!--show-->








			<!--ask where to search-->
<div id="selectModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Search Where?</h4>
						</div>
						<div class="">
								<form class="form-horizontal" role="form">
										
													
											<div class='text-center'>	
										<button type="button" class="btn aqua white priv">
												<span class='loadx'></span> My School
										</button>
										<button type="button" class="btn aqua white search" >
												<span class="load3"></span> All Schools
										</button>
									</div>
									{{csrf_field()}}
			</form>
			<p class='allwait text-center'></p>
							<!--	<div class="modal-footer">
										<button type="button" class="btn blue white" data-dismiss="modal">
												<span class='glyphicon glyphicon-remove'></span> Close
										</button>
								</div>-->
						</div>
				</div>
		</div>
</div>

<!--ask where to search-->






<!-- show  timed filter-->
<div id="filterModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Filter Search?</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal filter-form" role="form" >

				
				
				<select class='form-control form-group fsch selectpicker show-tick' id='fsch' data-live-search="true" name='filsch'>
					<option>--Select School (Showing Only Schools With Post(s))--</option>
										@foreach($pcount as $p)       
													<option value='{{$p->school}}'>  {{$p->school}} </option>
													@endforeach
				</select>
				<div class='text-center'>
					<br>
						<h3>&</h3>
						<br>
							</div>
				<select class='form-control form-group fcat selectpicker show-tick' id='fcat' data-live-search="true" name='filcat'>
					<option>--Select Category--</option>
					@foreach($ccount as $c)    
				
					<option value='{{$c->category}}'> {{$c->category}} </option>
					@endforeach
					</select>

					<div class='text-center'>
						<br>
				<button class='btn blue white filtersearch'>Filter</button>
				<button class='btn btn-danger' data-dismiss="modal">Close</button>
					</div>

				</form>
				
			   <!-- <div class="modal-footer">
					<button type="button" class="btn blue white" data-dismiss="modal">
						<span class='glyphicon glyphicon-remove'></span> Close
					</button>
				</div>-->
			</div>
		</div>
	</div>
</div>

<!--timed filter-->









		@endsection