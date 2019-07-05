
@extends('layouts.app2')

@section('title','Profile Settings')

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
                    <div class="panel-heading">
                        Customise Your Profile
                    </div>

                    @include('layouts.error')

                    <form method="POST" action="">

                    <div class="panel-body">
                        <hr>
                        <label>First Name </label>
                        <input type="text" disabled value="{{$find->name}}" class=" form-control1 control3">

                        <label>Last Name </label>
                        <input type="text" class="form-control1  lname" name="Name" value="{{old('Name')}}">

                         <label>Email </label>
                        <input type="email" disabled value="{{$find->email}}" class=" form-control1 control3">

                       <!-- <label>Profile Picture </label>
                        <input type="file" class="form-control1 control3" name="Picture">
                        -->
                    
                        <label>Phone Number </label>
                        <input type="text"  value="{{$find->number}}" class=" form-control1 control3 num numval" name="Number">
                        <p class='numerr text-danger'></p>

                         <label>School</label>
                         <input type="text" disabled  value="{{$find->school}}" class=" form-control1 control3" name="">
                         
                        <hr>
                        <button type="submit" class="btn btn-warning btn-warng1 update"><span class="glyphicon glyphicon-upload tag_02"></span> 
                            <span class='load'></span> Update </button>
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