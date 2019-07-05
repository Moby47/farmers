
@extends('layouts.app2')

@section('title','Show Admins')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">


  <!-- left start-->

          <div class="col-md-4 span_8">
              <div class="activity_box">
               <div class="scrollbar" id="style-2">
                   <span class='text'></span>
                  @if (count($admins)>0)

                  @foreach($admins as $ad)
<!-- loop me-->
                 <div class="activity-row">
                      <div class="col-xs-1"><i class="fa fa-user text-info"></i> </div>
                      <div class="col-xs-8 activity-desc">
                      <h5><a href="#" class='btn btn-primary white admin' data-id='{{$ad->id}}'> {{$ad->name}}</a></h5>
                         <p>Joined</p>
                      <h6>{{$ad->created_at->diffforhumans()}}</h6>
                      </div>
                      <div class="clearfix"> </div>
                       </div>
<!-- loop me-->

              @endforeach
              <h5 class="center-block">{{$admins->links()}}</h5> 
                  
              @else
        <div class="alert alert-info">
                               <h5 class="text-center">No Admin</h5>
                         </div>
              @endif

                   </div>
                 </div>
           </div>
      
           <!-- left end-->


    <div class="content_bottom">
     <div class="col-md-7 span_3">
      <div class="bs-example1" data-example-id="contextual-table">

          <div class='text-center'> <span class='load'></span></div> 

    <span class='info'><!--house intel to be loaded-->  
 <div class='table-responsive'>
        <table class='table table-hover table-striped table-bordered table-hover'>
    
          <tr>
            <th>NAME</th>
            <th>E MAIL</th>
            <th>PHONE NUMBER</th>
            <th>SCHOOL</th>
          </tr>
    
          <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
          </tr>
    
        </table>
    
        </div><!--responsive div end-->
      </span><!--house intel to be loaded-->  


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