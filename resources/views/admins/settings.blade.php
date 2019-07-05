@extends('layouts.app2')

@section('title','Site Settings')

@section('content')

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           @include("includes3.admin-nav")
           
        </nav>
        <div id="page-wrapper">
       <div class="graphs">

        
    <div class="content_bottom">
     <div class="col-md-12 span_3">
      <div class="bs-example1" data-example-id="contextual-table">

<div class='page-header'><h4>Exports</h4></div>
<!-- ....Export tabs ...- -->

          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#Users">Users</a></li>
              <li><a data-toggle="tab" href="#Reviews">Reviews</a></li>
              <li><a data-toggle="tab" href="#FAQ">FAQ</a></li>
            </ul>
            
            <div class="tab-content">
              <div id="Users" class="tab-pane fade in active">
              <!--users export buttons-->
              <div class="container">

                  <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-primary">Export to Excel (xls)</button></a>
              
                  <!--<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-primary">Export to Excel (xlsx)</button></a>-->
              
                  <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-primary">Export as CSV</button></a>
                
                </div>
              <!--users export buttons-->
              </div>
              <div id="Reviews" class="tab-pane fade">
                 <!--reviews export buttons-->
              <div class="container">

                  <a href="{{ URL::to('downloadExcel2/xls') }}"><button class="btn btn-success">Export to Excel (xls)</button></a>
              
                  <!--<a href="{{ URL::to('downloadExcel2/xlsx') }}"><button class="btn btn-success">Export to Excel (xlsx)</button></a>-->
              
                  <a href="{{ URL::to('downloadExcel2/csv') }}"><button class="btn btn-success">Export as CSV</button></a>
                
                </div>
              <!--reviews export buttons-->
              </div>
              <div id="FAQ" class="tab-pane fade">
                <!--reviews export buttons-->
              <div class="container">

                  <a href="{{ URL::to('downloadExcel3/xls') }}"><button class="btn btn-default">Export to Excel (xls)</button></a>
              
                 <!-- <a href="{{ URL::to('downloadExcel3/xlsx') }}"><button class="btn btn-default">Export to Excel (xlsx)</button></a>-->
              
                  <a href="{{ URL::to('downloadExcel3/csv') }}"><button class="btn btn-default">Export as CSV</button></a>
                
                </div>
              <!--reviews export buttons-->
              </div>
            </div>


<!-- ..... Export tabs....... -->
	

		<!--<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

			<input type="file" name="import_file" />

			<button class="btn btn-primary">Import File</button>

		</form>-->

  
  
  





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






@endsection