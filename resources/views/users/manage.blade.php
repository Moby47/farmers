
@extends('layouts.app2')

@section('title','Manage Posts')

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
                        Manage Post
                    </div>
                    @include('layouts.error')
                    <div class="panel-body">
                        <hr>


                        <span class='ref-data'></span>

                        <div class='div-datam'>
                            <span class='load-data'></span> 

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







    <!-- Modal for sold -->
    <div id="soldmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Are you sure?</h3>
                        
                        <div class="modal-footer ">
                            <div class='text-center'><!--center-->
                                <form action="" method="">
                                   
                                        <input name="id" type="hidden"  class='i'/>
                                   <button  class="btn btn-primary sold "  data-dismiss="modal"><i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                    
                                             {{csrf_field()}}   
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    <span class='glyphicon glyphicon-remove'></span> Cancel
                                                </button>      
                                    </form>
                                    <p class='wait class-center'></p>
                        </div><!--center-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal for sold -->







 <!-- Modal for delete -->
 <div id="delmodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Delete Post?</h3>
                    
                    <div class="modal-footer ">
                        <div class='text-center'><!--center-->
                            <form>

                                    <button type="submit" data-dismiss="modal" class="btn btn-primary del" ><i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                    
                                          <!--spoofing-->
                                         <input name="_method" type="hidden" value="DELETE"/>
                                            {{csrf_field()}}

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    <span class='glyphicon glyphicon-remove'></span> Cancel
                                                </button>                                  
                                      </form>
                                      <p class='wait text-center'></p>
                    </div><!--center-->
                
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal for delete -->








<!-- Modal form to edit post -->
<div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    

                        <form id="formed" action="" enctype="multipart/form-data">
                            <label>Title </label>
                            <input type="text" class="form-control1 control3 t" name="Title" value="">
    
                        
                             <label>Status </label>
                             <select class="form-control1 control3" name="Status">
                                 <option></option>
                                <option value="ok">Ok</option>
                                <option value="very_ok">Very Ok</option>
                                <option value="very_very_ok">Very Very Ok</option>
                             </select>
    
                              <label>Category </label>
                             <select class="form-control1 control3 postcategory" name="Category">
                                    <option></option>
                                    <option value="Mobile-phone-tablet">Mobile Phones &amp; Tablets</option>
                                    <option value="Electronics-Appliances">Electronics &amp; Appliances</option>
                                    <option value="Swap-Items">Swap Items</option>
                                    <option value="Computers-Accessories">Computers &amp; Accessories</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Pets">Pets</option>
                                    <option value="Books-Sports-Hobbies">Books, Sports &amp; Hobbies</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Lodging-Accomodations">Lodging &amp; Accomodations</option>
                                    <option value="Services">Services</option>
                                    <option value="Cosmetics-Beauty">Cosmetics &amp; Beauty</option>
                                    <option value="Others">Others</option>
                             </select>
    
                             <label class='pri'>Price </label>
                            <input type="text" class="form-control1 control3 p postprice" name="Price" value="">
    
  
    <span class='rads'>
        <label>Contact you for price?</label>
        <br>
       <input type='radio'  id='rad1' name='tags'>NO  
       <input type='radio' id='rad2' name='tags'  >YES
       <br><br>
       </span>

                             <label>Upload Image (1) </label>
                            <input type="file" class="form-control1 control3" name="First_Image">
    
                            <label>Upload Image (2)<span class='optional'>[Optional] </span> </label>
                            <input type="file" class="form-control1 control3" name="Second_Image">
    
                            <label>Upload Image (3) <span class='optional'>[Optional] </span> </label>
                            <input type="file" class="form-control1 control3" name="Third_Image">
    
                            <label>Upload Image (4) <span class='optional'>[Optional] </span></label>
                            <input type="file" class="form-control1 control3" name="Fourth_Image" >
                            
                            <label>Description : </label>
                            <textarea rows="4" class="form-control1 control2 des" name="Description"></textarea>
                            <hr>
                            <input type="hidden" value="" name="id" class='i'/>
                            <button type="submit" class="btn btn-warning btn-warng1 post-btn"><span class="glyphicon glyphicon-send tag_02"></span>
                                <i class='load'></i> Post </button>
                          
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Close
                                </button>  <span class='wait'></span>

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