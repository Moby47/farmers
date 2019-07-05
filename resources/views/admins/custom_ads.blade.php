
@extends('layouts.app2')

@section('title','Custom Ads Request')

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
    <h4>Custom Ads Requests</h4>
      
  <!--ajax load-->

 <span class='ref-data-cus'></span>

 <div class='div-data-cus'>
 
 <span class='load-data-cus'></span> 

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










<!-- Modal form to edit post -->
<div id="customModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Custom Ad Info</h4>
            </div>
            <div class="modal-body">
                

                    <form id="customform" action="" enctype="multipart/form-data">
                    
                      <input type='hidden' class='id' name='id'/>
                      <p><b>TITLE:</b> <input type='text' disabled class='title form-control' name='title'/></p>
                      <p><b>OTHER DETAILS:</b> <textarea class='des form-control' disabled name='des' rows='4'></textarea> (description,sub-title[optional],color[optional])</p>
                      
                      <hr>
                       
                      <label>Ad Image/Banner </label>
                      <input type="file" class="form-control1 control3" name="Banner">
                      
                       <label>Description : </label>
                      <textarea rows="2" class="form-control1 control2" name="Description">{{ old('Description')}}</textarea>
                       

                      <hr>
                        <button type="submit" class="btn btn-warning btn-warng1 cus-btn"><span class="glyphicon glyphicon-send tag_02"></span>
                            <i class='load'></i>Update</button>&nbsp;
                      
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                            <span class='wait'></span>
                    </div>
                 </div>
              </div>
         </div>
           {{csrf_field()}}
            </form>

            </div>
        </div>
    </div>
</div>
<!-- edit-->






@endsection