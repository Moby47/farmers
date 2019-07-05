
    <!-- jQuery -->
<script src="{{ asset('user_js/jquery.min.js') }}"></script>

<script src="{{ asset('user_js/custom.js') }}"></script>

    <!-- Latest compiled bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.7/metisMenu.min.js"></script>


    <!-- bootstrap-select-js -->
<script src="{{ asset('visitor_js/bootstrap-select.js') }}"></script>

    @if(\route::current()->getname()=='ad-page')
   <!-- jquery ui js-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endif

<!--busyload-->
<script src="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.js"></script>

<!--notofire -->
<script src="{{ asset('user_js/notifier.js') }}"></script>

<!-- loader for a tags on web view-->
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false) { 
//yes Webview
echo "<script>
        $('a').click(function(){
            $.ajax({

beforeSend:function(){
 //busy load after
 $.busyLoadFull('show', { 
                spinner: 'accordion',
                background: 'rgba(3, 80, 150, 0.45)'
            });        
  },
complete:function(){
  //busy load after
  $.busyLoadFull('hide', { 
                spinner: 'accordion',
                background: 'rgba(3, 80, 150, 0.45)'
            });
                    },
success: function(data) {
},//success data end
}); //ajax end
        });
        </script>";
}else{
echo '';
}
?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120000273-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120000273-1');
</script>

          
@if(\route::current()->getname()=='ad-page')
<!-- color picker-->
<script src="{{ asset('spectrum/spectrum.js') }}"></script>
@endif

<!--toastr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>









@if(Auth()->user()->status == 0)




@if(\route::current()->getname()=='home')

<!--hide app download if in app-->
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
?>



<!--login notification-->
<script>
$(document).ready(function(){
    $.ajax({
        	url: "{{route('check')}}",
			type: "POST",
            data:  {
                '_token': $('input[name=_token]').val(),
                
            },
			success: function(data)
		    {
                if(data == '0 Slot Free For Your School, Try Again Later'){
                    
                }else{
                    toastr.info("<a href='/ads'>"+data+"</a>");
                }
             
		    },
		      
       }); //ajax end
});
</script>
<!--login notification-->
@endif
@endif


<!-- ..............................for user add page.............-->

@if(\route::current()->getname()=='ad-page')
<script>
    //banner link example display
    $(".link").on('keyup',function(){
        var value = $(this).val();
        $("#display").html("Your Site: http//"+value+"");
    });
  
   //custom banner link example display
   $(".link2").on('keyup',function(){
        var value = $(this).val();
        $("#display2").html("Your Site:  http//"+value+"");
    });
  
</script>



<!-- modal for user to select see acct number   -->
<script>
$(document).ready(function(){
    $("#transfer").click(function(){
        $('#acctmodal').modal('show');
    });
});
$(document).ready(function(){
    $("#transfer2").click(function(){
        $('#acctmodal2').modal('show');
    });
});
</script>
<!-- modal for user to select see acct number   -->


<!--let us do ur banner -->
<script>


$(document).ready(function(){
  

$('.we_got_you').click(function(){
  
    $('.price1').html('2 Wks - 3,500');
$('.price2').html('1 Month - 6,000');
$('.custom_head').html('Please Provide the following Information');
$('.notice').html('Pricing Changed for Custom Ads');
$('#form1').hide('fade',500,function(){
    $('.form2').show('fade',500);
});

$(this).hide('fade');

$('.out').show('fade');

})
});
</script>

<!--let us do ur banner -->



<!--out -->
<script>


$(document).ready(function(){


$('.out').click(function(){
  
    $('.price1').html('1 Wk - 2,500');
$('.price2').html('1 Month - 5,000');
$('.custom_head').html('Place Ad ');
$('.notice').html('Pricing Back to Normal');

$('.form2').hide('fade',500,function(){
    $('#form1').show('fade',500);
});

$(this).hide('fade');

$('.we_got_you').show('fade');

})
});
</script>

<!--out -->


<!--color picker -->
<script>

  $(".basic").spectrum({
    color: "#f00",
    change: function(color) {
        $("#basic-log").text("change called: " + color.toHexString());
    }
});

</script>
<!--color picker-->


  <!-- availability check -->
  <script>

        $(document).ready(function(){
 
 $('.check-btn').click(function(e){
     e.preventDefault();
 
      $.ajax({
             url: "{{route('check')}}",
             type: "POST",
             data:  {
                 '_token': $('input[name=_token]').val(),
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
               toastr.success(data);     
             },
               
        }); //ajax end
        
 })//aval btn end
 
         });//doc ready end
 
 </script>       
 <!-- availability check -->





 
<!-- create ad-->
<script>
        $(document).ready(function (e) {
            $(".formad").on('submit',(function(e) {
                e.preventDefault();

                $('.send-ad').prop('disabled', true);
                $.ajax({
                    url: "{{route('ad')}}",
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
                        $('.send-ad').prop('disabled', false); 
                      //if validation errors occur
                      if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Title) {
                                toastr.info(data.errors.Title, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Package) {
                                toastr.info(data.errors.Package, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Link) {
                                toastr.info(data.errors.Link, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Banner) {
                                toastr.info(data.errors.Banner, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Description) {
                                toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                            }
                           
                            $('.send-ad').prop('disabled', false);
                         //.............................. 
        
                        } else {

                            if(data == 'Ad Request Successful! Please Choose a Payment Method'){
                               
                             //empty form
                             $(".formad")[0].reset();
                             toastr.success(data); 
                              //call to action
                      $('.ad_action').html('Please Choose a Payment method');
                             //scroll to top
                             $(document).scrollTop(0);
                             //attract!
                             
            setTimeout(function(){
                $('.change').removeClass('btn-primary');
                $('.change').addClass('btn-danger');
            },600)
                             //disable btn
                             $('.send-ad').prop('disabled', false);

                            }else{

                                toastr.error(data); 
                                $('.send-ad').prop('disabled', false);
                            }
                              
                        }
                    
                    },
                      
               }); //ajax end
                   
            })); //submit form end
        
        });//doc end
        
        </script>
        
        <!-- create ad-->












        
<!-- create custom ad-->
<script>
        $(document).ready(function (e) {
            $(".formcusad").on('submit',(function(e) {
                e.preventDefault();
                $('.cus-send').prop('disabled', true);
                $.ajax({
                    url: "{{route('custom')}}",
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
                        $('.cus-send').prop('disabled', false);      
                      //if validation errors occur
                      if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Title) {
                                toastr.info(data.errors.Title, 'warning Alert', {timeOut: 8000});
                            }
                            if (data.errors.Package) {
                                toastr.info(data.errors.Package, 'warning Alert', {timeOut: 8000});
                            }
                         
                            if (data.errors.Description) {
                                toastr.info(data.errors.Description, 'warning Alert', {timeOut: 8000});
                            }
                           
                         //.............................. 
        
                        } else {

                            if(data == 'Error Occured! Please Refresh Page and Try Again...'){
                                //if no space
                            toastr.error(data);
                            }else{
                            toastr.success(data);
                           
                            
                            $('.noshow2').show('fade');
                             //empty form
                             $(".formcusad")[0].reset();
                              //call to action
                      $('.ad_action').html('Please Choose a Payment method');
                                 //scroll to top
                             $(document).scrollTop(0);
                             //attract        
            setTimeout(function(){
                $('.change').removeClass('btn-primary');
                $('.change').addClass('btn-danger');
            },600)


                            }
                            
                        }
                    
                    },
                      
               }); //ajax end
                   
            })); //submit form end
        
        });//doc end
        
        </script>
        
        <!-- create custom ad-->
        
        







@endif

<!-- ..............................for user ad page.............-->




<!-- update post-->

<!-- ..............................for user update post  page.............-->

@if(\route::current()->getname()=='post-page')
<!--hide app download if in app-->
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
?>


<script>
//category select attitude when swap is chosen
$('.postcategory').change(function(){
   var choice = $(this).val();
   if(choice == 'Swap-Items'){
    $('.postprice').val(0);
       $('.postprice').hide();
       $('.rads').hide();      
   
   }else{
    $('.rads').show();
    $('.postprice').show();
    $('.postprice').val(' '); 
    $('.pri').html('price'); 
   }
});
//category select attitude when swap is chosen

//determine if contact me for price 


$('#rad1').click(function(){
    if($('#rad1').prop('checked',true)){
        $('.postprice').show(); 
        $('.pri').html('price'); 
        if($('.postprice').val()==47){
            $('.postprice').val(' ');
        }
        
    }
});
$('#rad2').click(function(){
    if($('#rad2').prop('checked',true)){
        $('.postprice').val(47);
       $('.postprice').hide();
       $('.pri').html(' ');  
    }
});
//determine if contact me for price

//create post 

$(document).ready(function (e) {
	$("#form").on('submit',(function(e) {
		e.preventDefault();
    
$('.post').prop('disabled',true);

        $.ajax({
        	url: "{{route('post')}}",
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
                $('.post').prop('disabled',false);
              //if validation errors occur
              if ((data.errors)) {
                 
                 //...........emit  validation errors................
                    if (data.errors.Title) {
                        toastr.info(data.errors.Title, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Status) {
                        toastr.info(data.errors.Status, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Category) {
                        toastr.info(data.errors.Category, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Price) {
                        toastr.info(data.errors.Price, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.First_Image) {
                        toastr.info(data.errors.First_Image, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Description) {
                        toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Second_Image) {
                        toastr.info(data.errors.Second_Image, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Third_Image) {
                        toastr.info(data.errors.Third_Image, 'warning Alert', {timeOut: 5000});
                    }
                    if (data.errors.Fourth_Image) {
                        toastr.info(data.errors.Fourth_Image, 'warning Alert', {timeOut: 5000});
                    }
                 //.............................. 

                } else {
                    $('.post').prop('disabled',false);
                    if(data == 'Post Created! It Will Be On Dstreet Shortly...'){
                        toastr.success(data);
                         //empty form
                      $("#form")[0].reset();

                      //call to action
                      $('.action').html('<a href="/manage-post" class="link">Manage Posts?</a>');
                       //scroll to top
                       $(document).scrollTop(0);
                    }else{
                        toastr.error(data);
                    }
                  
                }
            
		    },
		      
       }); //ajax end
           
    })); //submit form end

});//doc end

</script>

@endif
<!-- update  post-->





    




@if(\route::current()->getname()=='request-page')

<!-- show request modal-->
<script>
        $(document).ready(function(){
        $('.req').click(function(e){
          event.preventDefault();
            $("#request").modal();
        })
        });



        //place reqq btn

$('.reqq').click(function(e){
    e.preventDefault();
    $(this).prop('disabled', true);
 $.ajax({
            type: 'POST',
            url: "{{route('req')}}",
            data: {
                '_token': $('input[name=_token]').val(),
               'Description': $('.des').val(),
              
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

                $('.reqq').prop('disabled', false);
               //if validation errors occur
                if ((data.errors)) {
                 
                 //...........emit  validation errors................
                    if (data.errors.Description) {
                        toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                    }
                 //.............................. 

                } else {
                     toastr.success('Request Sent!', 'Success Alert',data, {timeOut: 10000});
                     toastr.info(data, {timeOut: 10000});
                   //empty modal
                     $('.des').val(' ');
                     //dismiss modal
                     $("#request").modal('hide');

 //reload data
 $.ajax({
        	url: "{{route('req-ajax')}}",
			type: "GET",
            
            beforeSend:function(){
              $(".div-data-req").hide('fade');
            $(".ref-data-req").addClass("fa fa-refresh fa-spin");
           
            },

             complete:function(){
            $(".ref-data-req").removeClass("fa fa-refresh fa-spin");
            $(".div-data-req").show("fade");
            },
            

			success: function(data)
		    {
				$('.div-data-req').html(data);
		    },
		  	error: function(e) 
	    	{
				$('.div-data-req').html("Error! Try Again Later");
	    	} 	        
	   });//ajax2 end


                }
            },//success data end
        }); //ajax end

}) //btn end

</script>  
   <!-- request modal-->   


@endif



    









<!--update user profile-->

@if(\route::current()->getname()=='profile-page')

<script>


    $(document).ready(function(){
 toastr.info('Contact Dstreet to Change School');
   
});

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



$('.update').click(function(e){
e.preventDefault();

$(this).prop('disabled',true);

$.ajax({
        url: "{{route('resave')}}",
        type: "POST",
        data:  {
            '_token': $('input[name=_token]').val(),
            'Name': $('.lname').val(),
            'Number': $('.num').val(),
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
            $('.update').prop('disabled',false);
        //if validation errors occur
        if ((data.errors)) {
             
             //...........emit  validation errors................
            
                if (data.errors.Name) {
                    toastr.info(data.errors.Name, 'warning Alert', {timeOut: 5000});
                }
                if (data.errors.Number) {
                    toastr.info(data.errors.Number, 'warning Alert', {timeOut: 5000});
                }
             //.............................. 
        }else{
          toastr.success('Profile Updated!', 'Success Alert', {timeOut: 10000});
         
          }  //if data error end
        }, //success end
          
         }); //ajax end
        });//btn end
          </script>
@endif
     <!--update profile-->














     @if(\route::current()->getname()=='manage-post-page')
     <script>

//................initial manage post data load...............
$(document).ready(function(){
  
  $.ajax({
          url: "{{route('manage-post')}}",
          type: "GET",
          
          beforeSend:function(){
          $(".load-data").addClass("fa fa-refresh fa-spin");
          },

           complete:function(){
          $(".load-data").removeClass("fa fa-refresh fa-spin");
          },
          

          success: function(data)
          {
              $('.div-datam').html(data);
          },
            error: function(e) 
          {
              $('.div-datam').html("Error! Try Again Later");
          } 	        
     });
});

         </script>

@endif




@if(\route::current()->getname()=='message-page')
<script>

        //................initial new message data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('new-message')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-msg").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-msg").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-msg').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-msg').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>

@endif



@if(\route::current()->getname()=='message-resend-page')
<script>

        //................initial message feed data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('feedback')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-feed").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-feed").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-feed').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-feed').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>

@endif




@if(\route::current()->getname()=='request-page')
<script>

        //................initial request data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('req-ajax')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-req").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-req").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-req').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-req').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>

@endif



@if(\route::current()->getname()=='fav-post-page')

<script>

        //................initial fav post data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('fav_post')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-fp").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-fp").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-fp').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-fp').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>

@endif





@if(\route::current()->getname()=='fav-ad-page')
<script>

        //................initial fav ad data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('fav-ad')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-ad").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-ad").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-ad').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-ad').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>
@endif




@if(\route::current()->getname()=='general-ad-page')
<script>

        //................initial gen ad data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('user-gen-ad')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-data-gen").addClass("fa fa-refresh fa-spin");
                  },
        
                   complete:function(){
                  $(".load-data-gen").removeClass("fa fa-refresh fa-spin");
                  },
                  
        
                  success: function(data)
                  {
                      $('.div-data-gen').html(data);
                  },
                    error: function(e) 
                  {
                      $('.div-data-gen').html("Error! Try Again Later");
                  } 	        
             });
        });
        
                 </script>
  @endif


















  