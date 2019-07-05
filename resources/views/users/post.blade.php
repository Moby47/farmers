
@extends('layouts.app2')

@section('title','Create Post')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

      @include('includes2.nav')
      
        </nav>
        <div id="page-wrapper">
       <div class="graphs">
         <div class="xs">
          
        <div class="col-md-8 inbox_right">


       
            <div class="Compose-Message">          
                <div class="panel panel-default">
                <h5 class=' text-center action proceed'>   </h5>
                    <div class="panel-heading">
                        New Post
                    </div>
                    <div class="panel-body">
                        <hr>

                        @include('layouts.error')

                        <form id="form" method="POST"  enctype="multipart/form-data">
                        <label>Title </label>
                        <input type="text" class="form-control1 control3" name="Title" value="{{ old('Title')}}">

                    
                         <label>Condition </label>
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
                             <option value="Cryptocurrency">Cryptocurrency</option> 
                             <option value="Others">Others</option>
                         </select>

                         <label class='pri'>Price </label>
                        <input type="text" class="form-control1 control3 postprice" name="Price" value="{{ old('Price')}}">
<span class='rads'>
 <label>Or, Contact you for price?</label>
 <br>
<input type='radio'  id='rad1' name='tags'>NO  
<input type='radio' id='rad2' name='tags'  >YES
<br><br>
</span>
                         <label>Upload Image (1) </label>
                        <input type="file" class="form-control1 control3" name="First_Image">

                        <label>Upload Image (2) <span class='optional'>[Optional] </span></label>
                        <input type="file" class="form-control1 control3" name="Second_Image">

                        <label>Upload Image (3) <span class='optional'>[Optional] </span></label>
                        <input type="file" class="form-control1 control3" name="Third_Image">

                        <label>Upload Image (4) <span class='optional'>[Optional] </span></label>
                        <input type="file" class="form-control1 control3" name="Fourth_Image" value="{{ old('Image(4)')}}">
                        
                        <label>Description : </label>
                        <textarea rows="4" class="form-control1 control2" name="Description">{{ old('Description')}}</textarea>
                        <hr>
                        <button type="submit" class="btn btn-warning btn-warng1 post"><span class="glyphicon glyphicon-send tag_02"></span><i class="load"></i> Post </button>
                        <span class='wait'></span>
                      </div>
                 </div>
              </div>
         </div>
           {{csrf_field()}}
            </form>

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






@endsection