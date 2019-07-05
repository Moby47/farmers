  @if (count($custom)>0)
       <ul class="list-group">
       @foreach($custom as $cus)
       <li class="list-group-item">
           <button class='btn btn-primary white mod' data-id='{{$cus->id}}' data-title='{{$cus->title}}' data-des='{{$cus->description}}'>
            <b>{{substr($cus->title,0,13)}}</b> ~ <i>{{$cus->created_at->diffforhumans()}}</i>
           </button>
        </li>
        @endforeach
       </ul>

       <h5 class="center-block">{{$custom->links()}}</h5>  

       @else
        <div class="alert alert-info">
                               <h5 class="text-center">No Custom Ads Yet</h5>
                         </div>
              @endif










<!--custom banner upload-->

<script>

        $('.mod').click(function(e){
         e.preventDefault();
         $('.id').val($(this).data('id'));
         $('.title').val($(this).data('title'));
         $('.des').val($(this).data('des'));
         $('#customModal').modal('show');
     });


 $("#customform").on('submit',(function(e) {
                e.preventDefault();
                
               $('.cus-btn').prop('disabled', true);

                $.ajax({
                    url: "{{route('cus')}}",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    
                    
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
                       
                        $('.cus-btn').prop('disabled', false);   
                      //if validation errors occur
                      if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Banner) {
                                toastr.info(data.errors.Banner, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Description) {
                                toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                            }
                           
                         //.............................. 
        
                        } else {
                            toastr.success('Custom Ad Updated!', 'Success Alert', {timeOut: 5000});
                             //empty form
                             $("#customform")[0].reset();
                             $('#customModal').modal('hide');


                               //reload data
        $.ajax({
                   url: "{{route('cus-req')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".div-data-cus").hide('fade');
                   $(".ref-data-cus").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".ref-data-cus").removeClass("fa fa-refresh fa-spin");
                   $(".div-data-cus").show("fade");
                   },
                   
       
                   success: function(data)
                   {
                       $('.div-data-cus').html(data);
                   },
                     error: function(e) 
                   {
                       $('.div-data-cus').html("Error! Try Again Later");
                   } 	        
              });//ajax2 end
                        }
                    
                    },
                      
               }); //ajax end
             
                   
            })); //submit form end


   </script>   

<!--custom banner mange-->







<script>
        //.........paginated result......................
        $(document).one('click','.pagination a', function(e){
        
        e.preventDefault();
        
        var page = $(this).attr('href').split('page=')[1];
        
        getproducts(page);
        
        function getproducts(page){
        
        $.ajax({
            url: '/custom-ads-request?page='+ page,
        
            beforeSend:function(){
                $(".div-data-cus").hide('fade');
                   $(".ref-data-cus").addClass("fa fa-refresh fa-spin");
                    },
        
                     complete:function(){
                    $(".ref-data-cus").removeClass("fa fa-refresh fa-spin");
                    $(".div-data-cus").show("fade");
                    },
        
        }).done(function(data){
            $('.div-data-cus').html(data);
        
            location.hash = page;
        })
        
        }//func end
        });//doc end
        
        //.........paginated result......................
        </script>
      