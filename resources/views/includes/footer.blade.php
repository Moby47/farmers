


<div class="w3-agileits-footer-top">

        <hr >   
            <div class="container">
               
            </div>
        </div>
        <div class="agileits-footer-bottom text-center">
            <div class="container">
                <div class="w3-footer-logo">
                    <h1><a href="/"><span>D</span>street</a></h1>
                </div>
                <div class="w3-footer-social-icons">

                    <!--share btn-->
                        	<div class="sharethis-inline-share-buttons"></div>
                     
                  
                   </div>
                <div class="copyrights">
                    <p> © 2018 DStreet. All Rights Reserved |  Dstreet Team</p>
                <!--thanks to  w3layouts free themes - Design by  <a href="http://w3layouts.com/"> W3layouts</a>-->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>



  
  
  <!-- xxxxxx Help modal xxxxxx -->
 <div id="help" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="">
                    <h3 class="text-center">Ask Dstreet</h3>
                    
                    <div class="modal-footer ">
                        <div class='text-center'><!--center-->


                            <form action="" method="">
                                        <span class='load'></span> <span class='wait'></span> 
                                    <input type="email" placeholder="Email" value="{{old('Email')}}" class="form-control email form-group" name="Email" />
                                 
                                    <textarea placeholder="Question" rows='4' name="Message" class='message form-control form-group' >{{old('Message')}}</textarea>
                                  <input type="submit"  class='ask btn blue white' value="Send">
                                    {{csrf_field()}}
                                </form>

                    </div><!--center-->
                   <!-- <div class="modal-footer f">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- xxxxxxxxxxxxx Help modal xxxxxxxxxxxxxx -->
  


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
          <div class=" b">
                <p class='wait text-center'></p> 
                  <div class="wthree-help">
                          <form action="" method="">
                                <textarea placeholder="Request" name="Description" class='des' >{{old('Message')}}</textarea>
                           
                                  <hr>
                                <button type="submit" class="btn btn-warning btn-warng1 reqq"><span class="glyphicon glyphicon-send tag_02 loadreq"></span> Send </button>&nbsp;
                              {{csrf_field()}}
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


<!--share btn div-->
<!--<div id="share-bar"></div>-->
<!--share btn div--> 