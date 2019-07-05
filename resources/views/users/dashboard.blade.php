
@extends('layouts.app2')

@section('title','Dashboard')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

      @include('includes2.nav')
      
        </nav>


        <div id="page-wrapper">
          
        <div class="graphs ">
        @if($postdrive == 1)
        <div class='alert alert-info text-center'>
          <a href='{{route('post-page')}}' class='proceed'>Click Here to Continue to<span class='text-danger'> Post Creation</span></a>
        </div>
        @endif
        @if($addrive == 1)
        <div class='alert alert-info text-center'>
          <a href='/ads' class='proceed'>Click Here to Continue to<span class='text-danger'> Ad Placement</span></a>
        </div>
        @endif
        @if($reqdrive == 1)
        <div class='alert alert-info text-center'>
          <a href='{{route('request-page')}}' class='proceed'>Click Here to Continue to<span class='text-danger'> Make Requests</span></a>
        </div>
        @endif
        @if($msgdrive == 1)
        <div class='alert alert-info text-center'>
          <a href='/buy-product/{{$id}}' class='proceed'>Click Here to Continue Your<span class='text-danger'> Previous Action</span></a>
        </div>
        @endif
          
        @if(Cache::has('claim'))
        <div class='alert alert-info text-center'>
          <a href='/claim-dstreet-promo' class='proceed'>Click Here to Claim Airtime</a>
        </div>
        @else
        <div class='alert alert-success text-center'>
            <a href='/claim-dstreet-promo' class='proceed'>Claim Promo Airtime on DStreet </a>
          </div>
        @endif

     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                  <a href="/manage-post">  <i class="pull-left fa fa-bullhorn icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$total_p}}</strong></h5>
                      <span>All Posts</span></a>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                  <a href="/manage-post">  <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$total_s}}</strong></h5>
                      <span>Total Sales</span></a>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                  <i class="pull-left fa fa-bell user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$premium_ads}}</strong></h5>
                      <span>Premium Ads</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-envelope dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$totalmailbox}}</strong></h5>
                      <span>Mailbox</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
      
         <!-- ads -->
    <div class='col-md-12 well back-white'>
            <h4 class='page-header text-center extra'>  Adverts In Your School </h4>
           
            @if(count($sch_ad)>0)

           @foreach($sch_ad as $p)
           <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
                <!--img -->   <div class="portfolio-img event-img">
                   <a href="/buy-ad/{{$p->id}}">
                          <img src="/storage/ads_images/{{$p->banner}}"
                       class="img-responsive ad-size" alt="{{$p->title}}" title='{{$p->description}}'>
                   </a>
                       <div class="over-image"></div>
                <!--img -->    </div>

                 <!--txt -->   <div class="portfolio-description padup">
                    @mobile
                    <p class='white'> {{substr($p->title,0,16)}}...</p>
                    @elsemobile
                    <p class='white'> {{substr($p->title,0,21)}}...</p>
                    @endmobile
                       <a href="/buy-ad/{{$p->id}}" class='btn btn-default'>
                           Explore
                       </a>
                       @mobile
                       <p class='white'> {{substr($p->school,0,16)}}...</p>
                       @elsemobile
                       <p class='white'> {{substr($p->school,0,16)}}...</p>
                       @endmobile
                       

                       @if($p->link)
                       <p><a href='http://{{$p->link}}' class='white' target= '_blank'> Visit Our Webite </a></p>
                       @else
                       @mobile
                    <p class='white'> {{substr($p->description,0,10)}}...</p>
                    @elsemobile
                    <p class='white'> {{substr($p->description,0,22)}}...</p>
                    @endmobile
                       @endif
               <!--txt-->     </div>
                   <div class="clearfix"> </div>
            <!--end-->    </div>
            @endforeach
           
            @else
 
           <div class="alert alert-info">
              <h5 class="text-center">No Advert From Your School Now, <a href="/ads" class='text-danger'>Click to Place Your Ad</a></h5>
              </div>
           @endif
         
             <!--my sch ads -->   <div class="text-center">
                <div class='clearfix'></div>
                
                <form action='{{route('myads')}}' class="form-horizontal" role="form">
                    
              <input name='sch' type='hidden' value='{{Auth()->user()->school}}'/>
              <button class='btn btn-default' type="submit">
                  View All Ads In MySchool
                </button>    
     
              {{csrf_field()}}
              </form>
       <!-- my sch ads-->     </div>


         </div><!--panel end-->
         <!-- ads -->


     
         <div class="clearfix"> </div>



              <!-- ads -->
    <div class='col-md-12 well back-white'>
        <h4 class='page-header text-center extra'>  Adverts On DStreet </h4>
        @if(count($sch_ad_all)>0)

        @foreach($sch_ad_all as $s)
        <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
             <!--img -->   <div class="portfolio-img event-img">
                <a href="/buy-ad/{{$s->id}}">
                       <img src="/storage/ads_images/{{$s->banner}}"
                    class="img-responsive ad-size" alt="{{$s->title}}" title='{{$s->description}}'>
                </a>
                    <div class="over-image"></div>
             <!--img -->    </div>

             <!--txt -->   <div class="portfolio-description padup">
               @mobile
                <p class='white'> {{substr($s->title,0,16)}}...</p>
                @elsemobile
                <p class='white'> {{substr($s->title,0,16)}}...</p>
                @endmobile
                <a href="/buy-ad/{{$s->id}}" class='btn btn-default'>
                    Explore
                </a>
                @mobile
                <p class='white'> {{substr($s->school,0,16)}}...</p>
                @elsemobile
                <p class='white'> {{substr($s->school,0,16)}}...</p>
                @endmobile
                @if($s->link)
                <p><a href='http://{{$s->link}}' class='white' target= '_blank'> Visit Our Website </a></p>
                @else
                @mobile
                <p class='white'> {{substr($s->description,0,10)}}...</p>
                @elsemobile
                <p class='white'> {{substr($s->description,0,22)}}...</p>
                @endmobile
                    @endif
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



         

		<div class="copy">
           @include('includes2.footer')
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->






@endsection

