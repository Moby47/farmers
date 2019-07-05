@extends('layouts.app2')

@section('title','Ads Meter')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">

        
    <div class="content_bottom">
     <div class="col-md-12 span_3">
      <div class="bs-example1" data-example-id="contextual-table">

       

         <!--ajax load-->

 <span class='ref-data-ex'></span>

  
 
 <div class='div-data-ex'>
 

 <span class='load-data-ex'></span> 


    
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











       <!-- Modal for expire -->
       <div id="exmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Are You Sure?</h3>
                        
                        <div class="modal-footer ">
                            <div class='text-center'><!--center-->
                                <form>
                                        <input type="hidden"  name="id" class='i' value="">
                                        <input type="hidden"  name="title" class='t' value="">
    
                                        <button type="submit"  class="btn btn-primary expire" >
                                            <i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                        
    
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <span class='glyphicon glyphicon-remove'></span> Cancel
                                                    </button>                                  
                                          </form>
                               
                        </div><!--center-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal for expire -->
  

@endsection


       
       
       