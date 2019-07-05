
@extends('layouts.app2')

@section('title','Activity Log')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">


 <div class="content_bottom">
     <div class="col-md-8 span_3">
      <div class="bs-example1" data-example-id="contextual-table">

        <form>
       <input type="text" placeholder="Search" name='search' class='form-control ans_border search-log' id='steal'/>
          {{csrf_field()}}
       </div>
     </div>
     
    <div class="clearfix"> </div>
      </div>

        
    <div class="content_bottom">
     <div class="col-md-12 span_3">
      <div class="bs-example1" data-example-id="contextual-table">

    <!--ajax load-->

 <span class='ref-data-log'></span>

 <span class='load-data-log'></span> 
 
 <div class='div-data-log'>


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