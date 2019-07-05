
@extends('layouts.app2')

@section('title','Ads History')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

      @include('includes2.nav')
      
        </nav>
        <div id="page-wrapper">
       <div class="graphs">
         <div class="xs">
          
        <div class="col-md-12 inbox_right">
            <div class="Compose-Message">               
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Overview
                    </div>
                    <div class="panel-body">
                        <hr>
                       
                        <span class='ref-data-gen'></span>

  
 
                        <div class='div-data-gen'>
                        
                      
                        <span class='load-data-gen'></span> 
                      
                       
                           
                       </div>            



                 </div>
              </div>
         </div>
         <div class="clearfix"> </div>
   </div>
    <div class="copy_layout">
         @include('includes2.footer')
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->








     <!--Modal for delete running ad -->

<div id="admodal" class="modal fade" role="dialog">
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
    
                                    <button type="submit" data-dismiss="modal" class="btn btn-primary delad-btn" ><i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                    
                                    <input name="id" type="hidden" class="id"/>
                                          <!--spoofing-->
                                         <input name="_method" type="hidden" value="DELETE"/>
                                            {{csrf_field()}}
    
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
    <!-- Modal for delete running ad-->


@endsection