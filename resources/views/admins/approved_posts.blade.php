
@extends('layouts.app2')

@section('title','Approved Posts')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">

        
    <div class="content_bottom">
     <div class="col-md-6 span_3">
      <div class="bs-example1" data-example-id="contextual-table">

            <div class='text-center'> <span class='load-search '></span></div>
        <form>
       <input type='text' class='form-control search' name='search' placeholder='Search by title'/> 
      {{csrf_field()}}
        </form>

       </div>
     </div>
     
    <div class="clearfix"> </div>
      </div>
        



      <div class="content_bottom">
            <div class="col-md-12 span_3">
             <div class="bs-example1" data-example-id="contextual-table">
       
               <div class='div-search-app'>
               </div>
       
       
              </div>
            </div>
            
           <div class="clearfix"> </div>
             </div>









<div class="panel panel-default">
                    <div class="panel-heading">
                       Running Posts  
                    </div>
                    <div class="panel-body">
                        <hr>
                       
             <!--ajax load-->

 <span class='ref-data-app'></span>
 
 <div class='div-data-app'>
 
 <span class='load-data-app'></span> 
 
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