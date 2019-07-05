@extends('layouts.app2')

@section('title','New Messages')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

      @include('includes2.nav')
      
        </nav>
        <div id="page-wrapper">
       <div class="graphs">
         <div class="xs">
           <h3>New Messages</h3>
             <div class="col-md-10 email-list1">
              

              <span class='ref-data-msg'></span>

              <div class='div-data-msg'>
                  <span class='load-data-msg'></span> 

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








    <!-- Modal for msg response -->
    <div id="respondmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Read / Reply</h3>

                    <input type='hidden' class='i'/>
                    <div class="well">
                        <b>Title:</b> <input type='text' class='title form-control' disabled /> 
                        <br>
                        <b>Time:</b> <input type='text' class='time form-control'disabled /> 
                         <br>
                       <b> Message:</b> <input type='text' class='message form-control' disabled/> 
                         </div>

                         <form method="POST" action="{{route('reply')}}" class="message_form" id='formx'>
                      
                            <input type="hidden"  name="id" value="">
    
                            <label>Reply : </label>
                            <textarea rows="4" class="form-control1 control2 Reply" name="Message_Reply">{{ old('Reply')}}</textarea>
    
                            <button class="btn btn-warning btn-warng1 " id="send_message" type="submit"><span class="glyphicon glyphicon-envelope tag_02"></span>
                                <span class='load'></span> Send  </button>
                          {{csrf_field()}}
                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Cancel
                        </button>
                        <p class='wait text-center'></p>
                </form> 

                 
                </div>
            </div>
        </div>
    </div>
<!-- Modal for msg response -->




@endsection




