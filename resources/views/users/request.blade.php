
@extends('layouts.app2')

@section('title','Requests')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

      @include('includes2.nav')
      
        </nav>
        <div id="page-wrapper">
       <div class="graphs">

         <!-- ads -->
    <div class="content_bottom">
    <!-- <div class="col-md-12 span_3">
      <div class="bs-example1" data-example-id="contextual-table">
       premium ad banner
       </div>
     </div>-->
     
    <div class="clearfix"> </div>
      </div>
        <!-- ads -->

        
         <div class="xs">
           <h3>Requests</h3>

           <div class="col-md-2 inbox_right">
              <div class="Compose-Message">               
                  <div class="panel panel-default">
                      <div class="panel-heading text-center">
                        New 
                      </div>
                      <div class="panel-body">
                       <div class='text-center'><!--center-->  
                    <button type='button' class='btn btn-primary' data-target='#request' data-toggle='modal'>Create</button>
                       </div><!--center-->
                        </div>
                   </div>
                </div>
           </div>

             <div class="col-md-10 email-list1">
              
                <span class='ref-data-req'></span>

  
 
                <div class='div-data-req'>
                
              
                <span class='load-data-req'></span> 
              
               
                   
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





<!-- ...........................request modal....................-->		
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="request" role="dialog">
      <div class="modal-dialog modal-lg">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title h">Make a Request</h4>
          </div>
          <div class="modal-body b">
                  <div class="wthree-help">
                          <form action="" method="">
                                <textarea placeholder="Type Request" name="Description" class='des form-control' >{{old('Message')}}</textarea>
                           
                                  <hr>
                                <button type="button" class="btn btn-warning btn-warng1 reqq"><span class='load'></span><span class="glyphicon glyphicon-send tag_02"></span> Send </button> &nbsp;
                              {{csrf_field()}}
                              <span class='wait'></span>
                          </form>
                      </div>
          </div>
          <div class="modal-footer f">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
<!-- ...........................request modal....................-->	






<!-- Modal for delete req -->
<div id="delreqmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Delete Request?</h3>
                
                <div class="modal-footer ">
                    <div class='text-center'><!--center-->
 
                    
                        <form>

                                <button type="submit" data-dismiss="modal" class="btn btn-primary delreq-btn" ><i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                
                                <input name="id" type="hidden" class="id"/>
                                      <!--spoofing-->
                                     <input name="_method" type="hidden" value="DELETE"/>
                                        {{csrf_field()}}

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                <span class='glyphicon glyphicon-remove'></span> Cancel
                                            </button>        
                                            <p class='wait'></p>                                   
                                  </form>
                       
                </div><!--center-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for delete req-->








@endsection