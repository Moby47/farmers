
@extends('layouts.app2')

@section('title','Manage Posts')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">

        
 


<div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Post
                    </div>
                    <div class="panel-body">
                        <hr>
                       
             <!--ajax load-->

 <span class='ref-data-mp'></span>

  
 
 <div class='div-data-mp'>
 

 <span class='load-data-mp'></span> 


    
</div>       
<!--ajax load-->         



                 </div>
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