
  
  @if(\route::current()->getname()=='dash-page' OR \route::current()->getname()=='homee')

  @if(Auth()->user()->status == 1)
  
  <script>

//admin dashboard counters/////////////////
$(document).ready(function(){


setInterval(function(){

    //post
    $.ajax({
                         url: "{{route('post_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-post').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-post').html("Error! Refresh");
                         } 	        
                    });

                     //pending posts
  $.ajax({
                         url: "{{route('pending_post_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-pend').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-pend').html("Error! Refresh");
                         } 	        
                    });

//ads
                 $.ajax({
                         url: "{{route('ad_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-ad').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-ad').html("Error! Refresh");
                         } 	        
                    });

                    // pending ads
                 $.ajax({
                         url: "{{route('pending_ad_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-pendad').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-pendad').html("Error! Refresh");
                         } 	        
                    });

//users
$.ajax({
                         url: "{{route('user_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-user').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-user').html("Error! Refresh");
                         } 	        
                    });

             //admin
    $.ajax({
                         url: "{{route('admin_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-admin').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-admin').html("Error! Refresh");
                         } 	        
                    });


 //sold
 $.ajax({
                         url: "{{route('sold_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-sold').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-sold').html("Error! Refresh");
                         } 	        
                    });


 //ad cash sum count
 $.ajax({
                         url: "{{route('ad_cash_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-ad_cash').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-ad_cash').html("Error! Refresh");
                         } 	        
                    });


 //question
 $.ajax({
                         url: "{{route('question_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-question').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-question').html("Error! Refresh");
                         } 	        
                    });



 //report
 $.ajax({
                         url: "{{route('report_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-report').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-report').html("Error! Refresh");
                         } 	        
                    });



 //total req count
 $.ajax({
                         url: "{{route('req_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-total-req').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-total-req').html("Error! Refresh");
                         } 	        
                    });





//pending req count
$.ajax({
                         url: "{{route('pending_req_count')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".bull").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".bull").removeClass("fa fa-refresh fa-spin");
                         },
                         
                         success: function(data)
                         {
                             $('.load-pending-req').html(data);
                         },
                           error: function(e) 
                         {
                             $('.load-pending-req').html("Error! Refresh");
                         } 	        
                    });

  //ad status expired/active
 
  $.ajax({
                  url: "{{route('ad-stat')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-interval").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-interval").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-stat').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-stat').html("Error! Try Again Later");
                  } 	        
             });
     //// //ad status expired/active

 // $('.load-post').load('{{route('post_count')}}');
},10000)


});
      //admin dashboard counters/////////////////




        $(document).ready(function(){
               $('.ex').click(function(e){
                 event.preventDefault();
                   $("#exmodal").modal();
                   //send id and title  to modal
           $('.i').val($(this).data('id'));
           $('.t').val($(this).data('title'));
               });
       
       
       
        $('.expire').click(function(e){
                 event.preventDefault();
                 
           $.ajax({
                   type: 'POST',
                   url: '{{route('expire')}}',
                   data: {
                       '_token': $('input[name=_token]').val(),
                      'id': $('.i').val(),
                      'title': $('.t').val(),
                     
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
                   
                            toastr.success('Ad Expired!', 'Success Alert',data, {timeOut: 5000});
                            $("#exmodal").modal('hide');
                         
        //reload data
        $.ajax({
                   url: "{{route('ad-stat')}}",
                   type: "GET",
                   
                   beforeSend:function(){
                     $(".div-data").hide('fade');
                   $(".ref-data").addClass("fa fa-refresh fa-spin");
                  
                   },
       
                    complete:function(){
                   $(".ref-data").removeClass("fa fa-refresh fa-spin");
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
       
       
                      
                   },//success data end
               }); //ajax end
       
       
               });//expire btn end
       
       
       
               });//doc end
       
       
           </script>

@endif
@endif







<!-- create a new admin-->
@if(\route::current()->getname()=='made-man')

<script>

      //phone number validation
$('.numval').on('keyup', function(){
var con = $('.numval').val();
if($('.numval').val().length > 11){
    $('.numerr').html('Number must be 11 e.g 08012345678');
}else if($('.numval').val().length < 11){
    $('.numerr').html('Number must be 11 e.g 08012345678');
}else{
    $('.numerr').html(' ');
}
});


        $(document).ready(function (e) {
            $("#formAd").on('submit',(function(e) {
                e.preventDefault();
                
               $('.make').prop('disabled', true);

                $.ajax({
                    url: "{{route('new_admin')}}",
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
                        $('.make').prop('disabled', false);   
                      //if validation errors occur
                      if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Name) {
                                toastr.info(data.errors.Name, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Email) {
                                toastr.info(data.errors.Email, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Number) {
                                toastr.info(data.errors.Number, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.School) {
                                toastr.info(data.errors.School, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.password) {
                                toastr.info(data.errors.password, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.password_confirmation) {
                                toastr.info(data.errors.password_confirmation, 'warning Alert', {timeOut: 5000});
                            }
                           
                         //.............................. 
        
                        } else {

                            if(data == 'Error! Verify Internet Connection And Try Again'){
                                toastr.error(data);
                            }else{
                                toastr.success(data);
                             //empty form
                             $("#formAd")[0].reset();
                            }
                            
                          
                        }
                    
                    },
                      
               }); //ajax end
             
                   
            })); //submit form end
        
        });//doc end
        
        </script>
   @endif     
        <!-- create a new admin-->






        <!--show admin info-->
        @if(\route::current()->getname()=='view-admin')
<script>

$(document).ready(function(){

$('.admin').click(function(e){
   e.preventDefault();

    var id = $(this).data('id');

    $.ajax({
                  url: "{{route('info')}}",
                  type: "POST",
                  data: {
                         '_token': $('input[name=_token]').val(),
                         'id': id,
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
                      $('.text').html('Admin Info Found!');
                      $('.text').addClass('text-success');
                    },
                    
          
                    success: function(data)
                    {
                      $('.info').html(data);
                      $(document).scrollTop(1000);
                    },
                               
               });

});

});

    </script>

    @endif
<!--show admin info-->






















<!-- ..........................Ajax load ins...................................................-->


@if(\route::current()->getname()=='dash-page' OR \route::current()->getname()=='homee')
<script>

        //................initial adver statistics data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('ad-stat')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-stat').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-stat').html("Error! Try Again Later");
                  } 	        
             });
        });
        


       

                 </script>
  @endif






  @if(\route::current()->getname()=='man-post-page')
<script>

        //................initial manage post data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('man-post')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-mp").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-mp").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-mp').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-mp').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>
  @endif










  @if(\route::current()->getname()=='app-page')
<script>

        //................initial approve post data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('app-post')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-app").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-app").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-app').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-app').html("Error! Try Again Later");
                  } 	        
             });//ajax end

        }); //doc



//search bar
$(document).ready(function(){
$('.search').on('keyup', function(e){
    e.preventDefault();

var val = $(this).val().length;
    if(val < 1){
       //hide result area
        $('.div-search-app').hide('fade');

    }else{
        //show result area
    $('.div-search-app').show('fade');

    $.ajax({
                  url: "{{route('search-app')}}",
                  type: "GET",
                  data: {
                       '_token': $('input[name=_token]').val(),
                      'search': $(this).val(),
                   },

                  beforeSend:function(){
                  $(".load-search").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-search").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-search-app').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-search-app').html("Error! Try Again Later");
                  } 	        
             });//ajax end

    }//if end

});//search end

});//doc end for search
                 </script>



  @endif
















  @if(\route::current()->getname()=='dec-page')
<script>

        //................initial declined data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('dec-post')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-dec").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-dec").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-dec').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-dec').html("Error! Try Again Later");
                  } 	        
             });//ajax end

        }); //doc



//search bar
$(document).ready(function(){
$('.search').on('keyup', function(e){
    e.preventDefault();

var val = $(this).val().length;
    if(val < 1){
       //hide result area
        $('.div-search-dec').hide('fade');

    }else{
        //show result area
    $('.div-search-dec').show('fade');

    $.ajax({
                  url: "{{route('search-dec')}}",
                  type: "GET",
                  data: {
                       '_token': $('input[name=_token]').val(),
                      'search': $(this).val(),
                   },

                  beforeSend:function(){
                  $(".load-search").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-search").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-search-dec').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-search-dec').html("Error! Try Again Later");
                  } 	        
             });//ajax end

    }//if end

});//search end

});//doc end for search
                 </script>



  @endif












 @if(\Route::current()->getname() == 'gen-ad-page')
 <script>

        //................initial gen ad data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('gen-ad')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-gen-ad").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-gen-ad").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-gen-ad').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-gen-ad').html("Error! Try Again Later");
                  } 	        
             });
        });





         //search general ad

$(document).ready(function(){
$('.searchAd').on('keyup', function(e){
    e.preventDefault();

var val = $(this).val().length;
    if(val == 0){
       //hide result area
        $('.search_area').hide('fade');

    }else{
        //show result area
    $('.search_area').show('fade');

    $.ajax({
                  url: "{{route('admin_ad_search')}}",
                  type: "GET",
                  data: {
                       '_token': $('input[name=_token]').val(),
                      'search': $(this).val(),
                   },

                  beforeSend:function(){
                  $(".load-search").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-search").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                    $('.search_area').show('fade');
                      $('.result').html(data);
                  },
                    error: function(e) 
                  {
                      $('.result').html("Error! Try Again Later");
                  } 	        
             });//ajax end

    }//if end

});//search end

});//doc end for search
       //search general ad
        
                 </script>
 
@endif













 @if(\Route::current()->getname() == 'cus-page')
 <script>

        //................initial custom ad data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('cus-req')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-cus").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-cus").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-cus').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-cus').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>
@endif


 
 








@if(\Route::current()->getname() == 'que')
<script>


            //................initial question data load...............
            $(document).ready(function(){
              
              $.ajax({
                      url: "{{route('q')}}",
                      type: "GET",
                      
                      beforeSend:function(){
                      $(".load-data-q").addClass("fa fa-refresh fa-spin");
                      },
            
                       complete:function(){
                      $(".load-data-q").removeClass("fa fa-refresh fa-spin");
                      },
                      
            
                      success: function(data)
                      {
                          $('.div-data-q').html(data);
                      },
                        error: function(e) 
                      {
                          $('.div-data-q').html("Error! Try Again Later");
                      } 	        
                 });
            });

    </script>
    @endif


     







    @if(\Route::current()->getname() == 'log-page')
    <script>
    
    
                //................initial question data load...............
                $(document).ready(function(){
                  
                  $.ajax({
                          url: "{{route('log')}}",
                          type: "GET",
                          
                          beforeSend:function(){
                          $(".load-data-log").addClass("fa fa-refresh fa-spin");
                          },
                
                           complete:function(){
                          $(".load-data-log").removeClass("fa fa-refresh fa-spin");
                          },
                          
                
                          success: function(data)
                          {
                              $('.div-data-log').html(data);
                          },
                            error: function(e) 
                          {
                              $('.div-data-log').html("Error! Try Again Later");
                          } 	        
                     });
                });
    




//search log............................


$('.search-log').on('keyup', function(e){
    e.preventDefault();

var val = $(this).val().length;
    if(val < 1){
       //hide result area
        //$('.div-search-dec').hide('fade');
       // alert('Enter a word to search')

    }else{
        //show result area
    //$('.div-search-dec').show('fade');

    $.ajax({
                  url: "{{route('search_log')}}",
                  type: "GET",
                  data: {
                       '_token': $('input[name=_token]').val(),
                      'search': $(this).val(),
                   },

                  beforeSend:function(){
                  $(".load-data-log").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-log").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-log').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-log').html("Error! Try Again Later");
                  } 	        
             });//ajax end

    }//if end

});//search end



        </script>
        @endif
    








        @if(\Route::current()->getname() == 'ex-page')
        <script>
       
               //................initial custom ad data load...............
               $(document).ready(function(){
                 
                 $.ajax({
                         url: "{{route('ex')}}",
                         type: "GET",
                         
                         beforeSend:function(){
                         $(".load-data-ex").addClass("fa fa-refresh fa-spin");
                         },
               
                          complete:function(){
                         $(".load-data-ex").removeClass("fa fa-refresh fa-spin");
                         },
                         
               
                         success: function(data)
                         {
                             $('.div-data-ex').html(data);
                         },
                           error: function(e) 
                         {
                             $('.div-data-ex').html("Error! Try Again Later");
                         } 	        
                    });
               });
               
                        </script>
       @endif






<!-- code to load in the reported posts and ads -->

       @if(\Route::current()->getname() == 'reports')

       <script>
    
    
            //................initial reported post data load...............
            $(document).ready(function(){
              
              $.ajax({
                      url: "{{route('rep_post')}}",
                      type: "GET",
                      
                      beforeSend:function(){
                      $(".post-load").addClass("fa fa-refresh fa-spin");
                      },
            
                       complete:function(){
                      $(".post-load").removeClass("fa fa-refresh fa-spin");
                      },
                      
            
                      success: function(data)
                      {
                          $('.div-data').html(data);
                      },
                        error: function(e) 
                      {
                          $('.div-data').html("Error! Try Again Later");
                      } 	        
                 });
            });


 //.....................initial reported post data load...............
</script>












<script>
    
    
        //................initial reported ad data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('rep_ad')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".ad-load").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".ad-load").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data2').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data2').html("Error! Try Again Later");
                  } 	        
             });
        });


//.....................initial reported  ad data load...............
</script>

@endif

<!-- code to load in the reported posts and ads -->




<!-- load in users and search-->

@if(\Route::current()->getname() == 'users_page')
<script>

       //................initial users data load...............
       $(document).ready(function(){
         
         $.ajax({
                 url: "{{route('users_data')}}",
                 type: "GET",
                 
                 beforeSend:function(){
                 $(".load-user-spin").addClass("fa fa-refresh fa-spin");
                 },
       
                  complete:function(){
                 $(".load-user-spin").removeClass("fa fa-refresh fa-spin");
                 },
                 
       
                 success: function(data)
                 {
                     $('.load-user-data').html(data);
                 },
                   error: function(e) 
                 {
                     $('.load-user-data').html("Error! Try Again Later");
                 } 	        
            });
       });
       







       //search user

$(document).ready(function(){
$('.search_users').on('keyup', function(e){
    e.preventDefault();

var val = $(this).val().length;
    if(val == 0){
       //hide result area
        $('.result').hide('fade');

    }else{
        //show result area
    $('.result').show('fade');

    $.ajax({
                  url: "{{route('users_search')}}",
                  type: "GET",
                  data: {
                       '_token': $('input[name=_token]').val(),
                      'search': $(this).val(),
                   },

                  beforeSend:function(){
                  $(".load-search").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-search").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                    $('.result').show('fade');
                      $('.result').html(data);
                  },
                    error: function(e) 
                  {
                      $('.result').html("Error! Try Again Later");
                  } 	        
             });//ajax end

    }//if end

});//search end

});//doc end for search
       //search user
                </script>

@endif

<!-- load in users and search-->




@if(\route::current()->getname()=='manage_req')
<script>

        //................initial adver statistics data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('request_data')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".req-load").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".req-load").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data').html("Error! Try Again Later");
                  } 	        
             }); 
        });
        


       

                 </script>
  @endif



  

@if(\route::current()->getname()=='manage_req')
<script>

        //................initial adver statistics data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('request_data')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".req-load").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".req-load").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data').html("Error! Try Again Later");
                  } 	        
             });
        });
        


       

                 </script>
  @endif



 
  <script>

        //................initial projects data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('proj-data')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".proj-load").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".proj-load").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.proj-data').html(data);
                  },
                    error: function(e) 
                  {
                      $('.proj-data').html("Error! Try Again Later");
                  } 	        
             });
        });
        

                 </script>


  <!-- ..........................Ajax load ins...........................-->