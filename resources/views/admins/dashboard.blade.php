
@extends('layouts.app2')

@section('title','Dashboard')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>

        <div id="page-wrapper">
        <div class="graphs">
            <span class='bull'></span>
     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bullhorn icon-rounded"></i>
                    <div class="stats">
                      <h5><strong class='load-post'>{{$tpost}}</strong></h5>
                      <span>Running Post(s)</span> 
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bullhorn user1 icon-rounded"></i>
                    <div class="stats">
                    <h5><strong class='load-pend'>{{$ppost}}</strong></h5>
                      <span>Pending Posts(s)</span> 
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong class='load-user'>{{$users}}</strong></h5>
                      <span>Total User(s)</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-user dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong class='load-admin'>{{$admins}}</strong></h5>
                      <span>Total Admin(s)</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
      



      <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-shopping-cart icon-rounded"></i>
                    <div class="stats">
                      <h5><strong class='load-sold'>{{$sold}}</strong></h5>
                      <span>Total Sold</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong class='load-ad_cash'>{{$adsum}}</strong></h5>
                      <span>Total Ads Cash</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-question user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong class='load-question'>{{$faq}}</strong></h5>
                      <span>New Q(s)</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bug dollar1 icon-rounded"></i>
                    <div class="stats">
                    <h5><strong class='load-report'>{{$repo}}</strong></h5>
                      <span>Report(s)</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>



<!-- new -->
      <div class="col_3">
          <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                      <i class="pull-left fa fa-briefcase user1 icon-rounded"></i>
                      <div class="stats">
                        <h5><strong class='load-ad'>{{$tads}}</strong></h5>
                        <span>Running Ad(s)</span> 
                      </div>
                  </div>
            </div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-briefcase user1 icon-rounded"></i>
                    <div class="stats">
                    <h5><strong class='load-pendad'>{{$pads}}</strong></h5>
                      <span>Pending Ads </span>
                    </div>
                </div>
        	</div>
          <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                      <i class="pull-left fa fa-truck user2 icon-rounded"></i>
                      <div class="stats">
                      <h5><strong class='load-total-req'>{{$total_req}}</strong></h5>
                        <span>Total Request(s)</span>
                      </div>
                  </div>
            </div>
            <div class="col-md-3 widget">
              <div class="r3_counter_box">
                      <i class="pull-left fa fa-truck dollar1 icon-rounded"></i>
                      <div class="stats">
                      <h5><strong class='load-pending-req'>{{$reqq}}</strong></h5>
                        <span>Pending Requests(s)</span>
                      </div>
                  </div>
             </div>
            <div class="clearfix"> </div>
        </div>
  <!-- new -->

  <div class="col_1">
		    
		
			<div class="col-md-12 stats-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Ads Monitor</h4>
                </div>
                
                @include('layouts.error')

                <span class='load-data-interval'></span> 

                <div class="panel-body">
               
<!--ajax load-->
                    <span class='ref-data'></span>

  
 
                    <div class='div-data-stat'>
                    
                  
                    <span class='load-data'></span> 
                  
                   
                       
                   </div>  
<!--ajax load-->

                </div>
            </div>
            <div class="clearfix"> </div>
	  </div>



            
	 
    
		<div class="copy_layout">
        @include("includes3.footer")   
        </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->






@endsection