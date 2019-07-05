@if(count($rep_post)>0)
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
       <tr >
             <th>S/N</th>
     <th>TITLE</th>
     <th>COMPLAINT</th>
     <th>COMMENT</th>
     <th>IGNORE</th>
      <th>DELETE</th>
 </tr>
 @foreach($rep_post as $indexKey => $item)
 
 <tr id="tr{{$item->id}}">
         <td class="col1">{{ $indexKey+1 }}</td>
     <td>Go to :<a href="/buy-product/{{$item->idd}}">{{$item->title}}</a></td>
    
    <td>{{$item->option}}</td>
    <td>{{$item->comment}}</td>
    
     
<td><!-- ignore / delete-->
    <button type="submit" class="btn btn-primary ignorereppost" data-id2="{{$item->id}}" data-title='{{$item->title}}'><i class='fa fa-hand-o-right'></i></button>
   </td>
     

     <td>
            <button type="submit" class="btn btn-danger delreppost" data-userid='{{$item->user_id}}' data-id="{{$item->idd}}" data-id2="{{$item->id}}" data-title='{{$item->title}}'><i class='fa fa-trash-o'></i></button>                     
   
     </td><!-- ignore / delete-->

     </tr>
 @endforeach
     </table>
</div>
 </table>
   <h5 class="center-block"></h5>  
</div>
@else

 <div class="alert alert-info">
        <h5 class="text-center">No Post Reported</h5>
  </div>


@endif






<!--delete reported item-->
<script>

    $(document).ready(function(){

$('.delreppost').click(function(e){

  e.preventDefault();

  $('.id').val($(this).data('id'));
  $('.id2').val($(this).data('id2'));
  $('.title').val($(this).data('title'));
  $('.userid').val($(this).data('userid'));

$('#delmodal').modal();

});//btn1 end



$('.delitem').click(function(e){
                 e.preventDefault();
                 
                  //disable button after click
                  $('.delitem').prop('disabled',true);
            
           $.ajax({
                   type: 'DELETE',
                   url: '{{route('delpost')}}',
                   data: {
                       '_token': $('input[name=_token]').val(),
                      'id': $('.id').val(),
                      'id2': $('.id2').val(),
                      'title': $('.title').val(), 
                      'userid': $('.userid').val(),
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
                   
                    $('.delitem').prop('disabled',false);
                            $("#delmodal").modal('hide');

                            if(data == 'Error! Verify Internet Connection And Try Again'){
                                toastr.error(data);
                            }else{

                                toastr.success(data);
                                 //reload data
        $.ajax({
                   url: "{{route('rep_post')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".div-data").hide('fade');
                   $(".post-load").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".post-load").removeClass("fa fa-refresh fa-spin");
                   $(".div-data").show("fade");
                   },
                   
       
                   success: function(data)
                   {
                       $('.div-data').html(data);
                   },
                     error: function(e) 
                   {
                       $('.div-data').html("Error! Try Again Later");
                   } 	        
              });//ajax2 end
       
                            }
                         
       
       
                      
                   },//success data end
                 	 
               }); //ajax end
       
       
               });// btn end
       



    });//doc end


</script>
<!--delete reported item-->



<!--ignore report-->
<script>
$('.ignorereppost').click(function(e){
    e.preventDefault();
    
    $('.id2').val($(this).data('id2'));
    $('.title').val($(this).data('title'));

     //disable button after click
     $('.ignorereppost').prop('disabled',true);

$.ajax({
      type: 'DELETE',
      url: '{{route('ignorereppost')}}',
      data: {
          '_token': $('input[name=_token]').val(),
         'id2': $('.id2').val(),
         'title': $('.title').val(),
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
      
       $('.ignorereppost').prop('disabled',false);
               
               if(data == 'Error! Verify Internet Connection And Try Again'){
                   toastr.error(data);
               }else{

                   toastr.success(data);
                    //reload data
$.ajax({
      url: "{{route('rep_post')}}",
      type: "GET",
      
      beforeSend:function(){
        $(".div-data").hide('fade');
      $(".post-load").addClass("fa fa-refresh fa-spin");
     
      },

       complete:function(){
      $(".post-load").removeClass("fa fa-refresh fa-spin");
      $(".div-data").show("fade");
      },
      

      success: function(data)
      {
          $('.div-data').html(data);
      },
        error: function(e) 
      {
          $('.div-data').html("Error! Try Again Later");
      } 	        
 });//ajax2 end

               }
            


         
      },//success data end
         
  }); //ajax end


  });// btn end
</script>
  <!--ignore report -->



 <!-- Modal  -->
 <div id="delmodal" class="modal fade" role="dialog">
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
                                <input type="hidden"  name="id" class='id' value="">
                                <input type="hidden"  name="id2" class='id2' value="">
                                <input type="hidden"  name="title" class='title' value="">
                                <input type="hidden"  name="userid" class='userid' value="">

                                <button type="submit"  class="btn btn-primary delitem" >
                                    <i class='glyphicon glyphicon-ok load'></i> Yes</button>
                                

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                <span class='glyphicon glyphicon-remove'></span> No
                                            </button>   
                                            {{csrf_field()}}       
                                                                    
                                  </form>
                       
                </div><!--center-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal  -->