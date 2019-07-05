@if(count($post)>0)

<div class="table-responsive">

 <table class="table table-bordered table-striped table-hover">
     <tr>
              <th>TITLE</th>
              <th>PRICE</th>
               
              <th>DESCRIPTION</th>
              
              <th>IMAGE (1)</th>
              <th>IMAGE (2)</th>
              <th>IMAGE (3)</th>
              <th>IMAGE (4)</th>
              <th>REMOVE</th>
             
      </tr>
  @foreach($post as $p)

       <tr>
          <td class='wrap'>{{$p->title}}</td>
            <td>{{number_format($p->price)}}</td>
            <td class='wrap'>{{ substr($p->description,0, 55) }}</td>
           
            <td><img src="/storage/post_images/{{$p->image_1}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
            <td><img src="/storage/post_images/{{$p->image_2}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
            <td><img src="/storage/post_images/{{$p->image_3}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>
            <td><img src="/storage/post_images/{{$p->image_4}}" class="img-responsive resize" alt="{{$p->title}}" title="{{$p->description}}"/></td>

           
            <!-- decline-->
              <td>
             <form action="" method="POST">

             <button type="submit" class="btn btn-danger rem" data-userid='{{$p->user_id}}' data-number='{{$p->number}}' data-title='{{$p->title}}' data-id='{{$p->id}}'><i class="fa fa-times" ></i></button>
                  
                           {{csrf_field()}}
                                                      
                     </form>
                 </td>
                    <!-- decline-->
                
            </tr>
                           
                     @endforeach
                     
                </table>
                  <h5 class="center-block">{{$post->links()}}</h5>  
          </div>
                 @else
                 <div class="alert alert-info">
                       <h5 class="text-center">No Post(s) Currently</h5>
                 </div>
                 @endif



<!-- Modal for delete approved post-->

<div id="removemodal" class="modal fade" role="dialog">
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
 <button type="submit" data-dismiss="modal" class="btn btn-primary del" ><i class='glyphicon glyphicon-ok load load2'></i> Yes</button>
       <input name="id" type="hidden" class="id"/>
       <input name="title" type="hidden" class="title"/>
       <input name="number" type="hidden" class="number"/>
       <input name="userid" type="hidden" class="userid"/>
         <!--spoofing-->
     <input name="_method" type="hidden" value="DELETE"/>
      {{csrf_field()}}

                                      <button type="button" class="btn btn-danger" data-dismiss="modal">
                                              <span class='glyphicon glyphicon-remove'></span> Cancel
                                          </button>  
                                          <p class='wait'></p>                                
                                </form>
                     
              </div><!--center-->
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Modal for delete approved post-->






<script>

  $(document).ready(function(){
  
  
    $('.rem').click(function(e){
           e.preventDefault();
           $('.id').val($(this).data('id'));
           $('.title').val($(this).data('title'));
           $('.number').val($(this).data('number'));
           $('.userid').val($(this).data('userid'));
           $('#removemodal').modal();
       })




  $('.del').click(function(e){
      e.preventDefault();

    //disable button after click
      $(this).prop('disabled',true);

    $.ajax({
                  url: "{{route('remove-running')}}",
                  type: "DELETE",
                  data: {
                         '_token': $('input[name=_token]').val(),
                         'id': $('.id').val(),
                        'title': $('.title').val(),
                        'number': $('.number').val(),
                       'userid':$('.userid').val(),
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
                    
          
                    success: function(data)
                    {
                      $('.del').prop('disabled',false);
                      $('#removemodal').modal('hide');
                      
                      if(data == 'Error! Verify Internet Connection And Try Again'){
                        toastr.error(data);
                      }else{
                        toastr.success(data);

                         //reload data
                      $.ajax({
            url: "{{route('app-post')}}",
        type: "GET",
              
              beforeSend:function(){
                $(".div-data-app").hide('fade');
              $(".ref-data-app").addClass("fa fa-refresh fa-spin");
             
              },
  
               complete:function(){
              $(".ref-data-app").removeClass("fa fa-refresh fa-spin");
              $(".div-data-app").show("fade");
              },
              
  
        success: function(data)
          {
          $('.div-data-app').html(data);
          },
          error: function(e) 
          {
          $('.div-data-app').html("Error! Try Again Later");
          } 	        
       });//ajax2 end
                      }
                      
                      
                     
  
                    },
                               
               });
  })
  
  });//end
      </script>







<script>

    
  //.........paginated result......................
  $(document).one('click','.pagination a', function(e){
  
  e.preventDefault();
  
  var page = $(this).attr('href').split('page=')[1];
  
  read(page);

  })
  
  function read(page){
  
  $.ajax({
      url: '/approved-post-ajax?page='+ page,
  
      beforeSend:function(){
          $(".div-data-app").hide('fade');
             $(".ref-data-app").addClass("fa fa-refresh fa-spin");
              },
  
               complete:function(){
              $(".ref-data-app").removeClass("fa fa-refresh fa-spin");
              $(".div-data-app").show("fade");
              },
  
  
  }).done(function(data){
      $('.div-data-app').html(data)
  
      location.hash = page;
  })
  
  }//func end

  
  //.........paginated result......................
  </script>
