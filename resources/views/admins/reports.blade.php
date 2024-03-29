
@extends('layouts.app2')

@section('title','Reported Posts & Ads')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">



<!-- ...........................a div ..........................-->
        
    <div class="content_bottom">
     <div class="col-md-12 span_3">
      <div class="bs-example1" data-example-id="contextual-table">
<h4>Reported Posts</h4>

@if(session('msg'))
<div class='alert alert-info text-center'>
  {{session('msg')}}
</div>
@endif

    <!--ajax load-->

 <span class='post-load'></span>

 <div class='div-data'>


</div>       
<!--ajax load-->

       </div>
     </div>
     
    <div class="clearfix"> </div>
      </div>
        
<!-- ...........................a div ..........................-->






<!-- ...........................a div ..........................-->
      <div class="content_bottom">
            <div class="col-md-12 span_3">
             <div class="bs-example1" data-example-id="contextual-table">
                    <h4>Reported Ads</h4>

                    @if(session('msg2'))
                    <div class='alert alert-info'>
                      {{session('msg2')}}
                    </div>
                    @endif

           <!--ajax load-->
       
           <span class='ad-load'></span>

           <div class='div-data2'>
          
          
          </div>        
       <!--ajax load-->
       
              </div>
            </div>
            
           <div class="clearfix"> </div>
             </div>

  <!-- ...........................a div ..........................-->


     <div class="copy_layout">
        @include("includes3.footer")   
        </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->






@endsection