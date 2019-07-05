@extends('layouts.app2')

@section('title','Running Conversations')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

      @include('includes2.nav')
      
        </nav>
        <div id="page-wrapper">
       <div class="graphs">
         <div class="xs">
           <h3>Feedbacks</h3>
             <div class="col-md-10 email-list1">
               
              @include('layouts.error')


                 <span class='ref-data-feed'></span>

              <div class='div-data-feed'>
                  <span class='load-data-feed'></span> 

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








<!-- Modal for msg re response -->
<div id="respond2modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
              <h3 class="text-center">Read / Reply</h3>

              
              <div class="well">
                 <b> Message:</b> <input type='text'disabled class='message form-control msg' /> 
                   </div>

                   <form action="" method="" class='re_form'>
                      <hr>
                    <textarea placeholder="Type Here" name="Message" required="" class="form-control msg2">{{old('Message')}}</textarea>
                  <hr>
                    <!--message id-->
                    <input type='hidden'name='id' class='id'/>
                    <!--message title-->
                  <input type="hidden"  name="title" class='title'/>
                   <!--message sender name-->
                   <input type="hidden"  name="name" class='name'/>
                   <!--slave id-->
                     <input type="hidden"  name="slave" class='slave_id'/>
                     <!--master id-->
                   <input type="hidden"  name="master" class='master_id'/>
                
					<button type="submit" value="" class="btn btn-primary sendback">
                        <span class='glyphicon glyphicon-send load'></span> Send</button>
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
<!-- Modal for msg re response -->







<!-- Modal for delete message -->
<div id="delmsgmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Delete Message Feed?</h3>
                
                <div class="modal-footer ">
                    <div class='text-center'><!--center-->
 
                        <form>

                                <button type="submit" data-dismiss="modal" class="btn btn-primary delmessage" ><i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                
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
<!-- Modal for delete -->








@endsection




