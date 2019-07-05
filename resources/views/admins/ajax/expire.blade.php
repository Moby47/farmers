 @if(count($expire)>0)
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                    <tr>
            <th>TITTLE</th>
            <th>STARTED</th>
            <th>ENDING</th>
            <th>ACTION</th>
                    </tr>
                    @foreach($expire as $ex)
                    <tr>
 @if(\carbon\carbon::now() > $ex->expiration)   

 <td>
{{$ex->title}}
</td>
<td>
{{$ex->created_at->diffforhumans()}} 
</td>
<td>
 {{$ex->expiration}}
</td>
<td>
<button class="btn btn-danger ex" type='submit' data-userid='{{$ex->user_id}}' data-id='{{$ex->id}}' data-title='{{$ex->title}}'>Expire</button>
</td>

      @else

<td>
{{$ex->title}}
</td>
<td>
{{$ex->created_at->diffforhumans()}} 
</td>
<td>
 {{$ex->expiration}}
</td>
<td>
<label class='badge badge-primary'>Active</label>
</td>
                 @endif

    </tr>
                   

                        @endforeach
           
                    </table>
                    </div>
                <h5>{{$expire->links()}}</h5>  
                    @else
                    <div class="alert alert-info">
                               <h5 class="text-center">No Ad(s) Currently</h5>
                         </div>
                         @endif





                         <script>
                                //.........paginated result......................
                                $(document).one('click','.pagination a', function(e){
                                
                                e.preventDefault();
                                
                                var page = $(this).attr('href').split('page=')[1];
                                
                                getproducts(page);
                                
                                function getproducts(page){
                                
                                $.ajax({
                                    url: '/ex-ajax?page='+ page,
                                
                                    beforeSend:function(){
                                        $(".div-data-ex").hide('fade');
                                           $(".ref-data-ex").addClass("fa fa-refresh fa-spin");
                                            },
                                
                                             complete:function(){
                                            $(".ref-data-ex").removeClass("fa fa-refresh fa-spin");
                                            $(".div-data-ex").show("fade");
                                            },
                                
                                }).done(function(data){
                                    $('.div-data-ex').html(data);
                                
                                    location.hash = page;
                                })
                                
                                }//func end
                                });//doc end
                                
                                //.........paginated result......................
                                </script>


<script>

        $(document).ready(function(){
               $('.ex').click(function(e){
                 e.preventDefault();
                   $("#exmodal").modal();
                   //send id and title  to modal
           $('.i').val($(this).data('id'));
           $('.t').val($(this).data('title'));
           $('.uid').val($(this).data('userid'));
               });
       
       
       
        $('.expire').click(function(e){
                 e.preventDefault();
                 
                  //disable button after click
            $(this).prop('disabled',true);
            
           $.ajax({
                   type: 'POST',
                   url: "{{route('expire')}}",
                   data: {
                       '_token': $('input[name=_token]').val(),
                      'id': $('.i').val(),
                      'title': $('.t').val(),
                      'userid': $('.uid').val(),
                     
                   },
       
                  beforeSend:function(){
                      //busy load before  
            $.busyLoadFull("show", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            });
                   },
       
                    complete:function(){
                   //busy load after
            $.busyLoadFull("hide", { 
                text: "LOADING ...",
                maxSize: "50px",
                minSize: "50px",
                background: "rgba(3, 80, 150, 0.45)",
                fontSize: "18px"
            }); 
                   },
       
                   success: function(data) {
                   
                    if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);
                      }
                            $("#exmodal").modal('hide');
                         
        //reload data
        $.ajax({
                   url: "{{route('ex')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".div-data-ex").hide('fade');
                   $(".ref-data-ex").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".ref-data-ex").removeClass("fa fa-refresh fa-spin");
                   $(".div-data-ex").show("fade");
                   },
                   
       
                   success: function(data)
                   {
                       $('.div-data-ex').html(data);
                   },
                     error: function(e) 
                   {
                       $('.div-data-ex').html("Error! Try Again Later");
                   } 	        
              });//ajax2 end
       
       
                      
                   },//success data end
               }); //ajax end
       
       
               });//expire btn end
       
       
       
               });//doc end
       
       
           </script>
       
       
       
       <!-- Modal for expire -->
       <div id="exmodal" class="modal fade" role="dialog">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title"></h4>
                       </div>
                       <div class="modal-body">
                           <h3 class="text-center">Are You Sure?</h3>
                           
                           <div class="modal-footer ">
                               <div class='text-center'><!--center-->
                                   <form>
                                           <input type="hidden"  name="id" class='i' value="">
                                           <input type="hidden"  name="title" class='t' value="">
                                           <input type="hidden"  name="userid" class='uid' value="">
       
                                           <button type="submit"  class="btn btn-primary expire" >
                                               <i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                           
       
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
       <!-- Modal for expire -->
       
       