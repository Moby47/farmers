   @if(count($pay)>0)

        <div class="table-responsive">

         <table class="table table-bordered table-striped table-hover">
             <tr>
                    <th>EMAIL</th>
                    <th>NUMBER</th>
                      <th>PAYMENT PLAN</th>
                      <th>AD TITLE</th>
                      <th>AMOUNT</th>
                      <th>LINK</th>
                      <th>BANNER</th>
                      <th>DESCRIPTION</th>
                       <th>TIME CREATED</th>
                      <th>EXPIRATION DATE</th>
                      <th>APPROVE</th>
                      <th>DECLINE</th>
                       
              </tr>
          @foreach($pay as $p)

               <tr>
               <td><a href='mailto:{{$p->mail}}' class='proceed'> {{$p->mail}} </a></td>
               <td><a href='tel:{{$p->phone}}' class='proceed' > {{$p->phone}} </a></td>
                  <td>{{$p->package}}</td>
                    <td>{{$p->title}}</td>
                    <td>{{$p->amount}}</td>
                    <td><a href='http://{{$p->link}}' class='proceed'> {{$p->link}}</a> </td>
                    <td><img src="/storage/ads_images/{{$p->banner}}" class="img-responsive resize" alt='{{$p->title}}'/></td>
                    <td>{{$p->description}}</td>
                    <td>{{$p->created_at->diffforhumans()}}</td>
                    <td>{{$p->expiration}}</td>
                    <td>
                     <form action="" method="POST">

                     <button type="submit" class="btn btn-primary app" data-userid='{{$p->user_id}}' data-id='{{$p->id}}' data-title='{{$p->title}}' data-pack='{{$p->package}}'><i class="fa fa-thumbs-up"></i></button>
                           
                                   {{csrf_field()}}
                                                              
                             </form>
                    </td>
                    <td>
                      <form action="" method="POST">

                           <button type="submit" class="btn btn-danger dis-allow" data-userid='{{$p->user_id}}' data-id='{{$p->id}}' data-title='{{$p->title}}' data-pack='{{$p->package}}' ><i class="fa fa-thumbs-down"></i></button>
                          
                               
                                   {{csrf_field()}}
                                                              
                             </form>
                    </td>
                    </tr>
                                   
                             @endforeach
                             
                        </table>
                          <h5 class="center-block">{{$pay->links()}}</h5>  
                  </div>
                         @else
                         <div class="alert alert-info">
                               <h5 class="text-center">No New Ads Found</h5>
                         </div>
                         @endif


  <!-- Modal to approve ad-->

  <div id="appadmodal" class="modal fade" role="dialog">
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
     <button type="submit" data-dismiss="modal" class="btn btn-primary main-app" ><i class='glyphicon glyphicon-ok load load2'></i> Yes</button>
          <!-- hidden values to be passed -->
          <input name="id" type="hidden" value="" class='id'/>
          <input name="title" type="hidden" value="" class='title'/>
          <input name="pack" type="hidden" value="" class='pack'/>
          <input name="userid" type="hidden" value="" class='userid'/>
          {{csrf_field()}}
    
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                  <span class='glyphicon glyphicon-remove'></span> Cancel
                                              </button>    
                                              <p class='wait text-center'></p>                                
                                    </form>
                         
                  </div><!--center-->
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Modal to app ad-->
    
    




  <!-- Modal to disallow ad-->

  <div id="disadmodal" class="modal fade" role="dialog">
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
     <button type="submit" data-dismiss="modal" class="btn btn-primary main-dis" ><i class='glyphicon glyphicon-ok load load2'></i> Yes</button>
          <!-- hidden values to be passed -->
          <input name="id" type="hidden" value="" class='id'/>
          <input name="title" type="hidden" value="" class='title'/>
          <input name="pack" type="hidden" value="" class='pack'/>
          <input name="userid" type="hidden" value="" class='userid'/>
          {{csrf_field()}}
    
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                  <span class='glyphicon glyphicon-remove'></span> Cancel
                                              </button>   
                                              <p class='wait text-center'></p>                               
                                    </form>
                                   
                         
                  </div><!--center-->
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Modal to disallow ad-->










<!-- approve general ad -->
<script>

      $(document).ready(function(){
     
     $('.app').click(function(e){
         e.preventDefault();
         $('.id').val($(this).data('id'));
         $('.title').val($(this).data('title'));
         $('.pack').val($(this).data('pack'));
         $('.userid').val($(this).data('userid'));
         $('#appadmodal').modal('show');
     })

     
$('.main-app').click(function(e){
  e.preventDefault();

//disable button after click
$(this).prop('disabled',true);

   $.ajax({
            url: "{{route('allow')}}",
                type: "POST",
                data:  {
              '_token': $('input[name=_token]').val(),
              'id': $('.id').val(),
              'title': $('.title').val(),
              'pack': $('.pack').val(),
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

                success: function(data)
              {
            
                  $('#appadmodal').modal('hide');
                  if(data == 'Error! Verify Internet Connection And Try Again'){
                                toastr.error(data);
                            }else{
                                toastr.success(data);

                                //reload data
                           $.ajax({
            url: "{{route('gen-ad')}}",
                type: "GET",
          
          beforeSend:function(){
            $(".div-data-gen-ad").hide('fade');
          $(".ref-data-gen-ad").addClass("fa fa-refresh fa-spin");
         
          },

           complete:function(){
          $(".ref-data-gen-ad").removeClass("fa fa-refresh fa-spin");
          $(".div-data-gen-ad").show("fade");
          },
          

                success: function(data)
              {
                      $('.div-data-gen-ad').html(data);
              },
                  error: function(e) 
              {
                      $('.div-data-gen-ad').html("Error! Try Again Later");
              } 	        
       });//ajax2 end  
           
                            }
          
              },
                
     }); //ajax end
     
         

})//del btn end

      });//doc ready end

</script>       
<!-- approve general ad -->













<!-- disallow general ad -->
<script>

      $(document).ready(function(){
     
     $('.dis-allow').click(function(e){
         e.preventDefault();
         $('.id').val($(this).data('id'));
         $('.title').val($(this).data('title'));
         $('.pack').val($(this).data('pack'));
         $('.userid').val($(this).data('userid'));
         $('#disadmodal').modal('show');
     })

     
$('.main-dis').click(function(e){
  e.preventDefault();

//disable button after click
$(this).prop('disabled',true);

   $.ajax({
            url: "{{route('disallow')}}",
                type: "POST",
                data:  {
              '_token': $('input[name=_token]').val(),
              'id': $('.id').val(),
              'title': $('.title').val(),
              'pack': $('.pack').val(),
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

                success: function(data)
              {
            
                  $('#disadmodal').modal('hide');
                  if(data == 'Error! Verify Internet Connection And Try Again'){
                                toastr.error(data);
                            }else{
                                toastr.success(data);

                                 //reload data
                           $.ajax({
            url: "{{route('gen-ad')}}",
                type: "GET",
          
          beforeSend:function(){
            $(".div-data-gen-ad").hide('fade');
          $(".ref-data-gen-ad").addClass("fa fa-refresh fa-spin");
         
          },

           complete:function(){
          $(".ref-data-gen-ad").removeClass("fa fa-refresh fa-spin");
          $(".div-data-gen-ad").show("fade");
          },
          

                success: function(data)
              {
                      $('.div-data-gen-ad').html(data);
              },
                  error: function(e) 
              {
                      $('.div-data-gen-ad').html("Error! Try Again Later");
              } 	        
       });//ajax2 end  
                            }
                  
         
           
              },
                
     }); //ajax end
     
         

})//del btn end

      });//doc ready end

</script>       
<!-- disallow general ad -->







<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/general-ads?page='+ page,
        
            beforeSend:function(){
                $(".div-data-gen-ad").hide('fade');
                   $(".ref-data-gen-ad").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                    $(".ref-data-gen-ad").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-gen-ad").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-gen-ad').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>
      