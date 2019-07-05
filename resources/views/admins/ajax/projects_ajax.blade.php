 @if(count($proj)>0)
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                    <tr>
            <th>NAME</th>
            <th>NUMBER</th>
            <th>COURSE</th>
            <th>DEPT</th>
            <th>SUMMARY</th>
            <th>TIME</th>
            <th>APPROVE</th>
            <th>DECLINE</th>
                    </tr>
                   
                    @foreach($proj as $r)
<tr>
<td>{{$r->name}}</td>
<td><a href='tel:+234{{substr($r->number,1,11)}}' class='btn btn-info'>Call</a></td>
<td>{{$r->course}}</td>
<td>{{$r->dept}}</td>
<td>{{$r->summary}}</td>
<td>{{$r->created_at->diffforhumans()}}</td>
<td><button class='btn btn-primary yes' data-id='{{$r->id}}' data-req='{{$r->name}}'><span class='fa fa-thumbs-up'></span></button></td>
<td><button class='btn btn-danger no' data-id='{{$r->id}}' data-req='{{$r->name}}'><span class='fa fa-thumbs-down'></span></button></td>
</tr>

                    @endforeach

                    </table>
                    </div>
                <h5>{{$proj->links()}}</h5> 

                    @else
                    <div class="alert alert-info">
                               <h5 class="text-center">No Project(s) Request/Offer Currently</h5>
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
                                    url: '/project-data?page='+ page,
                                
                                    beforeSend:function(){
                                        $(".proj-data").hide('fade');
                                           $(".proj-load").addClass("fa fa-refresh fa-spin");
                                            },
                                
                                             complete:function(){
                                            $(".proj-load").removeClass("fa fa-refresh fa-spin");
                                            $(".proj-data").show("fade");
                                            },
                                
                                }).done(function(data){
                                    $('.proj-data').html(data);
                                
                                    location.hash = page;
                                })
                                
                                }//func end
                                });//doc end
                                
                                //.........paginated result......................
                                </script>


<script>

     /*   
               $('.ex').click(function(e){
                 e.preventDefault();
                   $("#exmodal").modal();
                   //send id and title  to modal
           $('.i').val($(this).data('id'));
           $('.t').val($(this).data('title'));
           $('.uid').val($(this).data('userid'));
               });
       */

       $(document).ready(function(){
       
        $('.yes').click(function(e){
                 e.preventDefault();
                 
                 var id = $(this).data('id');
                 var name = $(this).data('name');
                var state = 1;
                  //disable button after click
            $(this).prop('disabled',true);
            
           $.ajax({
                   type: 'POST',
                   url: "{{route('project_validity')}}",
                   data: {
                       '_token': $('input[name=_token]').val(),
                      'id': id,
                     'state': state,
                     'name': name,
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
                           // $("#exmodal").modal('hide');
                         
        //reload data
        $.ajax({
                   url: "{{route('proj-data')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".proj-data").hide('fade');
                   $(".proj-load").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".proj-load").removeClass("fa fa-refresh fa-spin");
                   $(".proj-data").show("fade");
                   },
                   
       
                   success: function(data)
                   {
                       $('.proj-data').html(data);
                   },
                     error: function(e) 
                   {
                       $('.proj-data').html("Error! Try Again Later");
                   } 	        
              });//ajax2 end
       
       
                      
                   },//success data end
               }); //ajax end
       
       
               });//agree btn end
       
       

//dis-agree

         $('.no').click(function(e){
                 e.preventDefault();
                 
                 var id = $(this).data('id');
                 var name = $(this).data('name');
                var state = 2;
                  //disable button after click
            $(this).prop('disabled',true);
            
           $.ajax({
                   type: 'POST',
                   url: "{{route('project_validity')}}",
                   data: {
                       '_token': $('input[name=_token]').val(),
                      'id': id,
                     'state': state,
                     'name': name,
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
                           // $("#exmodal").modal('hide');
                         
        //reload data
        $.ajax({
                   url: "{{route('proj-data')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".proj-data").hide('fade');
                   $(".proj-load").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".proj-load").removeClass("fa fa-refresh fa-spin");
                   $(".proj-data").show("fade");
                   },
                   
       
                   success: function(data)
                   {
                       $('.proj-data').html(data);
                   },
                     error: function(e) 
                   {
                       $('.proj-data').html("Error! Try Again Later");
                   } 	        
              });//ajax2 end
       
       
                      
                   },//success data end
               }); //ajax end
       
       
               });//agree btn end
       
               });//doc end
       
       
           </script>
       
       <form>
{{csrf_field()}}
       </form>
       
       <!-- Modal for expire 
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
                               <div class='text-center'><!-center
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
                                  
                           </div><center-
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       <!- Modal for expire -->
       
       