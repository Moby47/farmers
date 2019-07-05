


<div class="w3-agileits-footer-top">

        <hr >   
            <div class="container">
                <div class="wthree-foo-grids">
                    <div class="col-md-3 wthree-footer-grid">
                        <h4 class="footer-head">Who We Are</h4>
                        <p>DStreet is an online platform strategically targeted at all students in Nigerian Universities to buy, sell or swap items. 
                        Place a post/advertise on Dstreet! It is absolutely easy, <a href='/how-to-buy-sell' class='link'>all you need to do is</a> take a picture of what you’re selling, upload it.
                        </p>
                     </div>
                    <div class="col-md-3 wthree-footer-grid">
                        <h4 class="footer-head">Help</h4>
                        <ul>
                            <li><a href="{{route('howto')}}" class='link'><i class="fa fa-long-arrow-right" aria-hidden="true"></i>How it Works</a></li>
                            <li><a href="/help" class='link'><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Faq</a></li>
                            <li><a href="/report" class='link'><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Reviews</a></li>

                        </ul>
                    </div>
                    <div class="col-md-3 wthree-footer-grid">
                        <h4 class="footer-head">Information</h4>
                        <ul>
                            <li><a href="/terms" class='link'><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Terms of Use</a></li>
                            <li><a href="/privacy" class='link'><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 wthree-footer-grid">
                        <h4 class="footer-head">Contact Us</h4>
                        <address>
							
								<div class="clearfix"> </div>
								<ul class="location">
									<li><span class="fa fa-phone"></span></li>
									<li> <a href="tel:+2348035562231" class='link text-capitalize'>Click to call</a></li>
								</ul>	
								<div class="clearfix"> </div>
								<ul class="location">
									<li><span class="fa fa-envelope"></span></li>
									<li><a href="mailto:support@dstreet.com.ng" class='link'>support@dstreet.com.ng</a></li>
                                </ul>	
                                <ul class="location">
                                        <li><span class="fa fa-facebook"></span></li>
                                        <li ><a href='https://fb.me/Dstreet.LIVE' class='link text-capitalize' target='_blank'>Facebook</a></li>
                                    </ul>	
                                    <ul class="location">
                                            <li><span class="fa fa-twitter"></span></li>
                                            <li><a href='https://twitter.com/DstreetNg' class='link text-capitalize' target='_blank'>Twitter</a></li>
                                        </ul>	
                                        <ul class="location">
                                                <li><span class="fa fa-instagram"></span></li>
                                                <li ><a href='https://www.instagram.com/_dstreetlive' class='link text-capitalize' target='_blank'>Instagram</a></li>
                                            </ul>					
							</address>
                    </div>
                    <div class="clearfix"></div>
                </div>
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