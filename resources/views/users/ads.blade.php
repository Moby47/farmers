
@extends('layouts.app2')


@section('title','Create Premium Ad')

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
           <h3>Advertise on Dstreet</h3>
             <div class="col-md-4 email-list1">
                
               <ul class="collection">
                 
                    <h5 class=' text-center text-success ad_action proceed'>   </h5>
               
                  <div class='text-center'>
                      <a type="button" class="btn btn-primary change" id="transfer2">Pay by Transfer</a> <a href='https://rave.flutterwave.com/pay/dstreetvnzf' target='_blank' class="btn btn-primary change">Pay with Card</a>
                      </div>   
<br>


                    <!-- a set -->
                    <li class="collection-item avatar email-unread">
                      <i class="fa fa-warning icon_1"></i>
                      <div class="avatar_left">
                        <span class="email-title">Attention!</span>
                        <p class="truncate grey-text ultra-small">To Increase Ads Efficiency, Only 12 Ad 
                          Slots Are Allowed For Each  School...</p>
                      </div>
                      
                      <div class="clearfix"> </div>
                    </li>
                    <!-- a set -->


                    <!-- a set -->
                    <li class="collection-item avatar email-unread">
                        <i class="fa fa-bullhorn icon_1"></i>
                        <div class="avatar_left">
                          <span class="email-title">Paid? Notify Us</span>
                          <p class="truncate grey-text ultra-small">
                        <a href='tel:+2348035562231' class='btn btn-info'>Call</a>
                          </p>
                          <br>
                          <p class="truncate grey-text ultra-small">
                           
          <a href="sms:+2348035562231?body=Your Account Name: xxxxx  Your Account Number: xxxxx  Your Advert Title: xxxxx" class="btn btn-info ">SMS</a>
                         
                         </p>
                        </div>
                        
                        <div class="clearfix"> </div>
                      </li>
                      <!-- a set -->

                    <li >
                       

                    <form  class="text-center">
                        <span class='load'></span>
                          <button type="submit" class="btn btn-primary check-btn">
                         Check Availability Status</button>
                      {{csrf_field()}}
                      </form>
<br>

<div class="text-center">
  <button type="submit" class="btn btn-info we_got_you">Let DStreet Design Your Advert<br>
  <span class='glyphicon glyphicon-plus'>3days Free</button>
</div>
<div class="text-center form2">
  <button type="submit" class="btn btn-info out">Opt Out</button>
</div>

<br>

<p class='notice text-info text-center'></p>
                      </li>

                    <li class="list-group-item price1">2 Wks - 2,500</li>
                    <li class="list-group-item price2">1 Month - 5,000</li> 
              </ul>
          
        </div>
        <div class="col-md-8 inbox_right">
            <div class="Compose-Message">               
                <div class="panel panel-default">
                    <div class="panel-heading custom_head">
                       Place Ad 
                    </div>
                    <div class="panel-body">
                        @include('layouts.error')
                        <span class='display'></span>
                        <hr>
                       
                        <form class='formad' action="" enctype="multipart/form-data" id='form1'>

                      

                          <label>Ad Title</label>
                        <input type="text" class="form-control1 control3 " name="Title" value="{{ old('Title')}}">

                          <label>Select Package </label>
                         <select class="form-control1 control3" name="Package">
                           <option></option>
                            <option value="2 Wks">2 Wks</option>
                            <option value="1 Month">1 Month</option>
                         </select>

                           <label>Link to Your Site/Page (*optional)</label>
                        <input type="text" class="form-control1 control3 link" name="link" value="{{ old('link')}}">
                        <p id="display"></p><br>

                         <label>Ad Image/Banner </label>
                        <input type="file" class="form-control1 control3" name="Banner">
                        
                         <label>Description : </label>
                        <textarea rows="4" class="form-control1 control2" name="Description">{{ old('Description')}}</textarea>
                         
                       
                        <hr>
                        <button class="btn btn-warning btn-warng1 send-ad" type="submit"><span class="glyphicon glyphicon-send tag_02"></span>
                          <span class='load1'></span> Send Request </button>
                        {{csrf_field()}}
                        <span class='wait'></span>
            </form>


<!-- form 2 ........................-->

    <form  class='form2 formcusad' method='POST' action=''>
       

             <label>Ad Title</label>
          <input type="text" class="form-control1 control3 " name="Title" value="{{ old('Title')}}">

 <label>Ad Subtitle (*optional)</label>
  <input type="text" class="form-control1 control3 " name="Title2" value="{{ old('Title2')}}">

<label>Select Color (*optional)</label>
<input type='color' name='color2'  class='form-control'/>

<br>

                          <label>Select Package </label>
                         <select class="form-control1 control3" name="Package">
                           <option></option>
                            <option value="2 Wks">2 Wks</option>
                            <option value="1 Month">1 Month</option>
                         </select>

                           <label>Link to Your Site/Page (*optional)</label>
                        <input type="text" class="form-control1 control3 link link2" name="link" value="{{ old('link')}}">
                        <p id="display2"></p><br>

                         
                        
                         <label>Description : </label>
                        <textarea rows="4" class="form-control1 control2" name="Description">{{ old('Description')}}</textarea>
                         
                       
                        <hr>
                        <button class="btn btn-warning btn-warng1 cus-send" type="submit"><span class="glyphicon glyphicon-send tag_02"></span>
                          <span class='load2'></span>  Send Request </button>
                        {{csrf_field()}}
                        <span class='wait'></span>

            </form>

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


<!-- ................................acct details-->
 <!-- Modal -->
 <div class="modal fade" id="acctmodal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title h">Account Details</h4>
        </div>
        <div class="modal-body b">
            <table class='table table-hover table-striped table-bothered'>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Account Name</th>
              <tr>
                <td>Access</td>
                <td>0731045947</td>
                <td>Onyemaobi Henry Nnamdi</td>
                
              </tr>
              <tr>
                  <td>Diamond</td>
                <td>0007547017</td>
                <td>Onyemaobi Henry Nnamdi</td>
              </tr>
              
            </table>
        </div>
        <div class="modal-footer f">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- ................................acct details-->


@endsection