
@extends('layouts.app')

@section('title','Requests Made By Users - Buy, Sell, Swap or Advertise to Students in Nigerian Campuses - Universities Using Dstreet Online Classisfied Website')

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
			<span class="agile-breadcrumbs"><a href="/"><i class="fa fa-home home_1"></i></a> / <span>Requests</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Faq -->
	<div class="faq main-grid-border">
		<div class="container">
			
			<h2 class="w3-head">Quick Requests</h2>
            
	<!--box-->	<div class="select-box">



    <!-- search request -->
    <form method='GET' action='{{route('search_req')}}'>
            <div class="search-product ads-list">
                    <label>Search Requests on Dstreet </label>
                    <div class="">
                        <div id="custom-search-input">
                        <div class="input-group">
    
                            <input type="text" class="form-control input-lg" placeholder="'Title' or 'School'"  name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg search" type="submit">
                                    <i class="glyphicon glyphicon-search cus-search"></i>
                                </button>
                            </span>

                        </div>
                    </div>
                    </div>
                </div>
                {{csrf_field()}}
    </form>

        <!-- search Requests-->


    
                    <div class="clearfix"></div>
            <!--box-->	</div>
@if(session('em'))
<div class='alert alert-info text-center text-danger'>
{{session('em')}}
</div>
@endif
            <a href='/view-requests' class='btn'><span class='fa fa-refresh'> Refresh Requests</span></a>

            @if(count($req)>0)
            <table class="table table-hover table-striped table-bordered">
                <th>Info</th>
                <th>Request</th>
                <th>Action</th>
                @foreach($req as $r)
                <tr> 

                    <td>{{$r->name}} from {{$r->school}}
                            made a request {{$r->created_at->diffforhumans()}}</td>
                    <td>{{$r->request}}</td>
                    <td> 
                        <button class="btn blue white display " data-num="{{$r->number}}">Call</button>
                        @if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false)
              <!--webview-->
          @else
						<a href="intent://send/+234{{substr($r->number,1,11)}}#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end" class="btn blue white arrange">
                            Whatsapp</a>
                            @endif
                         
                    </td>
                </tr>
               
                @endforeach
                <table>

                    {{$req->links()}}
            @else

            <div class="alert alert-info">
                              @if(Auth()->check())
                              <h5 class="text-center">No Request Currently On Dstreet 
                                    <a href='{{route('request-page')}}' class='text-danger'>Click Here To Make a Request</a></h5>
                                    @else
                                    <h5 class="text-center">No Request Currently On Dstreet 
                                            <a href='{{route('goto_req')}}'  class='text-danger'>Click Here To Make a Request</a></h5>
                                    @endif
                         </div>

            @endif


            <!--box-->	<div class="select-box">


     <!-- ads -->
     <div class='col-md-12  back-white'>
        <h4 class='page-header text-center extra'>  Adverts On DStreet </h4>
        @if(count($more)>0)

        @foreach($more as $s)
        <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
             <!--img -->   <div class="portfolio-img event-img">
                <a href="/buy-ad/{{$s->id}}">
                       <img src="/storage/ads_images/{{$s->banner}}" id='ad-size2'
                    class="img-responsive ad-size" alt="{{$s->title}}" title='{{$s->description}}'>
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
	<!-- // Faq -->
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
                    
                  <!--  <div class="modal-footer">
                        <button type="button" class="btn blue white" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    
    <!--show-->
    
    
     
     
     
             @endsection
		


