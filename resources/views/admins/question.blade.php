@extends('layouts.app2')

@section('title','FAQ')

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
         <h4> RESPOND TO QUESTION(S)</h4>  <span class='load'></span>
       

       <!--ajax load-->

 <span class='ref-data-q'></span>
 
 <div class='div-data-q'>
 

 <span class='load-data-q'></span> 

    
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