<!-- js -->
    <script type="text/javascript" src="{{ asset('visitor_js/jquery.min.js') }}"></script>
 
    <!-- Latest compiled bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- bootstrap-select-jS -->
<script src="{{ asset('visitor_js/bootstrap-select.js') }}"></script>


 <!-- ad scroll js -->
 <script type="text/javascript" src="{{ asset('visitor_js/jquery.flexisel.js') }}"></script>
 
<!--toastr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- jquery ui js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   
    <!-- Navigation-JavaScript -->
			<script src="{{ asset('visitor_js/classie.js') }}"></script>
            <script src="{{ asset('visitor_js/main.js') }}"></script>
   
            <!--busyload-->
            <script src="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.js"></script>

            <!--notifier -->
            <script src="{{ asset('visitor_js/notifier.js') }}"></script>

          
        
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




@if (Request::is('buy-by-categories/*'))

<!-- responsive tabs -->
<script src="{{ asset('easyResponsiveTabs/easyResponsiveTabs.js') }}"></script>
<!-- /responsive tabs -->







<!--Vertical Tab Plug-in Initialisation-->



<script type="text/javascript">
//    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        
  //  });
</script>

@endif
	<!-- //Vertical Tab Categories -->




    <!-- adds scrolling Js-->
    @if(\Route::current()->getname() == 'index')

    <!--hide app download if in app-->
    <?php
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    ?>
    
    @if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false) 
    <!--And webview-->
    @else
    <!--
    <script>
            //notifier for app download
            $(window).load(function(){
                 $.notifier({
                     "message":" <a href='/dstreet-for-android'><i class='fa fa-android'></i> Click to Download Dstreet for Android</a>",
                     "color1":"white", //background color of the notification bar
                     "color2":"black", //color of the text
                     "delay":3   //Show the notification from in 3 seconds
                 });
             });
                </script>
            -->
                @endif

    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo3").flexisel({
                visibleItems: 1,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 5000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 1
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 1
                    }
                }
            });

        });
    </script>


  <!-- Slider-JavaScript -->
  <script src="{{ asset('visitor_js/responsiveslides.min.js') }}"></script>
  <script>
      $(function() {
          $("#slider").responsiveSlides({
              auto: true,
              pager: false,
              nav: true,
              speed: 500,
              maxwidth: 800,
              namespace: "large-btns"
          });

      });
  </script>
  <!-- //Slider-JavaScript -->



<!-- modal for user to select add area to view in sch or all   -->
<script>
        $(document).ready(function(){
            $("#mybtn").click(function(){
                $("#myModal").modal();
            });
        });
        </script>
        <!-- modal for user to select add area to view in sch or all   -->



    @endif



<!--autocomplete-->

    <script>
        $( function() {
          
          $( "#auto" ).autocomplete({
            source: 'https://www.dstreet.com.ng/auto'
          });
        } );
        </script>

<!--autocomplete-->


<!--busy load-->
<script>
        $.busyLoadSetup({ 
            animation: "slide",
             background: "rgba(255, 152, 0, 0.86)"
             });
        </script>


<!-- reporting ......................-->
@if (Request::is('buy-product/*'))

 <!-- FlexSlider for single pro view-->
 <script defer src="{{ asset('visitor_js/jquery.flexslider.js') }}"></script>

 <script>
// Can also be used with $(document).ready()
$(window).load(function() {
$('.flexslider').flexslider({
 animation: "slide",
 controlNav: "thumbnails"
});
});
</script>
<!-- //FlexSlider -->
<!-- adds scrolling Js-->


<script>
    $(document).ready(function(){
    $('.repmodal').click(function(e){
      e.preventDefault();

     
        //send id to modal
        var id = $('.id').val($(this).data('id'));
        var t = $('.t').val($(this).data('title'));
        var c = $('.c').val(1);
      //show modal
        $("#rep").modal('show');
    });
    

//report

$('.repbtn').click(function(e){
    e.preventDefault();

    $('.repbtn').prop('disabled', true);
  var formData = $('.report').serialize();
        
        $.ajax({
            url: "{{route('report')}}",
            type: 'post',
            data: formData,

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

            success: function(data){
                $('.repbtn').prop('disabled', false);

                  if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.comment) {
                                toastr.info(data.errors.comment, 'warning Alert', {timeOut: 5000});
                            }
                            
                         //.............................. 
        
                        } else {
                $("#rep").modal('hide');
                if(data == 'You Already Repoted This Item'){
                    toastr.warning(data);
                }else{
                    toastr.success(data);
                }
         

                        }//err end
            }//success end
        });

});//btn end


//report
});//doc end



// mark post as favourite-->
$(".fav_butt").click(function(e){

e.preventDefault();

$.ajax({
type: 'POST',
url: "{{route('fav')}}",
data: {
'_token': $('input[name=_token]').val(),
'id': $('.i').val(),
'title': $('.t').val(),
'img1': $('.i1').val(),
},
beforeSend:function(){
 //busy load after
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
if(data==1){
toastr.warning('This Post Was Already Added By You', 'Alert', {timeOut: 5000});
}else{
toastr.success('Post Added to Favourites!', 'Success Alert', {timeOut: 5000});
}


},//success data end
}); //ajax end

});//butt end


// mark post as favourite end....................-->



 //-- show message modal and send FOR SINGle PRO VIEW-->
 $(document).ready(function(){
                $('.message').click(function(e){
                  e.preventDefault();
            //send id to modal
            $('#id').val($(this).data('id'));
            $('#title').val($(this).data('title'));
            $('#userid').val($(this).data('userid'));
            $('#name').val($(this).data('name'));
            $('#myid').val($(this).data('myid'));
                  //show modal
                    $("#msgggg").modal();
                })
                });
        
        
        $('.mess').click(function(e){
            e.preventDefault();
        
         $.ajax({
                    type: 'POST',
                    url: "{{route('message')}}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                       'Message': $('.Message').val(),
                       'title': $('.title').val(),
                       'slave': $('.slave').val(),
                       'master': $('.master').val(),
                       'name': $('.name').val(),
                      
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
                       //if validation errors occur
                        if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Message) {
                                toastr.info(data.errors.Message, 'warning Alert', {timeOut: 5000});
                            }
                         //.............................. 
        
                        } else {
                             toastr.success('Message Sent!', 'Success Alert',data, {timeOut: 10000});
                             //empty modal
                             $('.Message').val(' ');
                             //dismiss modal
                             $("#msgggg").modal('hide');
                        }
                    },//success data end
                }); //ajax end
        
        }) //btn end
        
        //- show message modal and send-->


    </script>

@endif
<!-- reporting ......................-->










<!-- reporting ......................-->
@if (Request::is('buy-ad/*'))

 <!-- FlexSlider for single pro view-->
 <script defer src="{{ asset('visitor_js/jquery.flexslider.js') }}"></script>

 <script>
// Can also be used with $(document).ready()
$(window).load(function() {
$('.flexslider').flexslider({
 animation: "slide",
 controlNav: "thumbnails"
});
});
</script>
<!-- //FlexSlider -->
<!-- adds scrolling Js-->


<!--ad report modal-->
<script>
 $('.repadmodal').click(function(e){
          e.preventDefault();
    
    //send id to modal
    var id = $('.id').val($(this).data('id'));
    var t = $('.t').val($(this).data('title'));
    var c = $('.c').val(2);
          //show modal
            $("#repad").modal('show');
        });
    </script>
<!--End ad rep modal -->




<script>
        $(document).ready(function(){
    //report
    
    $('.repadbtn').click(function(e){
        e.preventDefault();
    
        $('.repadbtn').prop('disabled', true);
      var formData = $('.report').serialize();
            
            $.ajax({
                url: "{{route('report')}}",
                type: 'post',
                data: formData,
    
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
    
                success: function(data){
                    $('.repadbtn').prop('disabled', false);
    
                      if ((data.errors)) {
                             
                             //...........emit  validation errors................
                                if (data.errors.comment) {
                                    toastr.info(data.errors.comment, 'warning Alert', {timeOut: 5000});
                                }
                                
                             //.............................. 
            
                            } else {
                    $("#repad").modal('hide');
                    if(data == 'You Already Repoted This Item'){
                        toastr.warning(data);
                    }else{
                        toastr.success(data);
                    }
            
             
                            }//err end
                }//success end
            });
    
    });//btn end
    
    
    //report
    });//doc end


        </script>






<script>


        //-- mark ad as favourite-->
        $(".fav_ad_butt").click(function(e){
                e.preventDefault();
               
                $.ajax({
           type: 'POST',
           url: "{{route('fav_ad')}}",
        
           data: {
               '_token': $('input[name=_token]').val(),
              'id': $('.i').val(),
        'banner': $('.b').val(),
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
           if(data == 1){
        toastr.warning('This Ad Was Already Added By You', ' Alert', {timeOut: 5000});
           }else{
        toastr.success('Ad Added to Favourites!', 'Success Alert', {timeOut: 5000});
           }
        
               
           },//success data end
        }); //ajax end
        
        });//butt end
        
        
        // mark ad as favourite end....................-->
        
        
                </script>


@endif
    <!-- reporting ......................-->
    





  







 
<!-- ....................................used by all pages............................-->



    <!--scroll icon -->
    <!--  scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ asset('visitor_js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('visitor_js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <!-- //here ends scrolling icon -->

    <!--scroll icon -->





    

<!-- show help modal-->
<script>
        $(document).ready(function(){
        $('.help').click(function(e){
          e.preventDefault();
            $("#help").modal();
        })
        });
        
        //help send btn
        
        $('.ask').click(function(e){
            e.preventDefault();
        
         $.ajax({
                    type: 'POST',
                    url: "{{route('question')}}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'Email': $('.email').val(),
                       'Message': $('.message').val(),
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
                        $('.ask').prop('disabled', false);
                       //if validation errors occur
                        if ((data.errors)) {
                         
                         //...........emit  validation errors................
                            if (data.errors.Email) {
                                toastr.info(data.errors.Email, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Message) {
                                toastr.info(data.errors.Message, 'warning Alert', {timeOut: 5000});
                            }
                         //.............................. 
        
                        } else {
                            $('.ask').prop('disabled', false);
                             toastr.success('Question Sent!', 'Success Alert', {timeOut: 10000});
                             toastr.info(data, {timeOut: 10000});
                             //empty modal
                             $('.email').val(' ');
                             $('.message').val(' ');
                             //dismiss modal
                             $("#help").modal('hide');
                        }
                    },//success data end
                }); //ajax end
        
        
        }) //btn end
        
        
            </script>
        
        
        
        <!--show modal for number-->
        <script>
       $('.display').click(function(){
		 $('#number').val($(this).data('num'));
		 var x = $('#number').val();
		   $('.callme').html('<a href="tel:'+x+'"> click to call '+x+' </a>');
			$('#showModal').modal('show');
		});
        
        </script>
        <!--show modal for number-->
        
        
        
        
        @if(\route::current()->getname()=='feedback-page')   
        
        <script>
                 //review btn
                

                $('.review-btn').click(function(e){
                    e.preventDefault();
                
                 $.ajax({
                            type: 'POST',
                            url: "{{route('feeds')}}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'Email': $('.email').val(),
                               'Review': $('.review').val(),
                               
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
                               //if validation errors occur
                                if ((data.errors)) {
                                 
                                 //...........emit  validation errors................
                                    if (data.errors.Email) {
                                        toastr.info(data.errors.Email, 'warning Alert', {timeOut: 5000});
                                    }
                                    if (data.errors.Review) {
                                        toastr.info(data.errors.Review, 'warning Alert', {timeOut: 5000});
                                    }
                                 //.............................. 
                
                                } else {
                                     toastr.success('Review Posted!', 'Success Alert', {timeOut: 5000});
                                     var rev = $('.review').val();
        $('.rev').prepend('<div class="col-md-6 happy-clients-grid wow bounceIn " data-wow-delay="0.4s">	<div class="client-info"><p><img src="images/open-quatation.jpg" class="open" alt="" />'+rev+'.<img src="images/close-quatation.jpg" class="closeq" alt="" /></p>	<h4>1 SECOND AGO</h4>	</div><div class="clearfix"></div>	</div>')
                                     //empty modal
                                     $('.email').val(' ');
                                     $('.review').val(' ');
                                     $('.label').hide();
                                }
                            },//success data end
                        }); //ajax end
                
                
                }) //btn end
                
                
                    </script>
        
       @endif 
        
        
        <!-- show request modal-->
        <script>
                $(document).ready(function(){
                $('.req').click(function(e){
                  e.preventDefault();
                    $("#request").modal();
                })
                });
        
        
        
                //place reqq btn
        
        $('.reqq').click(function(e){
            e.preventDefault();
        
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
                        }
                    },//success data end
                }); //ajax end
        
        }) //btn end
        
        </script>  
           <!-- request modal-->     

           
           <!-- ..............................................used by all pages.................-->




        <!-- feedback form -->
        @if(\Route::current()->getname() == 'feedback-page')

<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
        <!--feedback form end-->
@endif




                                        





<!--.................................Ajax Js.................................-->



<!--school select search-->
@if(\Route::current()->getname() == 'center')

<!--hide app download if in app-->
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
?>


<script>

$(document).ready(function(){
$('.school_select').change(function(e){
    e.preventDefault();
    var value = $(this).val();


$.ajax({
        url: "{{route('filter')}}",
        type: "GET",
        data:  {
            '_token': $('input[name=_token]').val(),
            'School': value,
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
            $('.change2').addClass('hide');
            $('.change3').addClass('hide');

            $('.change').removeClass('hide');
            $('.change').html(data);
            
      
        }, //success end
          
         }); //ajax end

});
});
    </script>

<!--school select search-->








<!--category select search-->

<script>

        $(document).ready(function(){
        $('.cat_select').change(function(e){
            e.preventDefault();
            var value = $(this).val();
        
        
        $.ajax({
                url: "{{route('find_cat')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'Category': value,
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
                    $('.change').addClass('hide');
                    $('.change3').addClass('hide');

                    $('.change2').removeClass('hide');
                    $('.change2').html(data);
                    
                }, //success end
                  
                 }); //ajax end
        
        });
        });
            </script>
        
        <!--category select search-->













<!--custom search-->

<script>

        $(document).ready(function(){
        $('.search').click(function(e){
            e.preventDefault();
            var value = $('#keyword').val();
            var len = $('#keyword').val().length;
        
            if(len < 1){
       
       alert('Please Enter a Word to Search')

    }else{

        $.ajax({
                url: "{{route('find_sch')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'Search': value,
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
                    $('.change').addClass('hide');
                    $('.change2').addClass('hide');

                    $('.change3').removeClass('hide');
                    $('.change3').html(data);
                    $('#selectModal').modal('hide');
                }, //success end
                  
                 }); //ajax end
                }//if check


        });//butt
        });//doc
            </script>
        
        <!--custom search-->














    <script>


            //................initial find data load...............
            $(document).ready(function(){
              
              $.ajax({
                      url: "{{route('find_content')}}",
                      type: "GET",
                      
                      beforeSend:function(){
                      $(".load-spin-find").addClass("fa fa-refresh fa-spin");
                      $(".load-text").html('Loading Data...');
                      },
            
                       complete:function(){
                      $(".load-spin-find").removeClass("fa fa-refresh fa-spin");
                      $(".load-text").html(' ');
                      },
                      
            
                      success: function(data)
                      {
                          $('.change').html(data);
                      },
                        error: function(e) 
                      {
                          $('.change').html("Error Loading Data! Try Again Later");
                      } 	        
                 });
            });
 //................initial find data load..............................
    </script>





<!-- custom search btn when logged in .............................................................. -->
<script>

$(document).ready(function(){

 $(".search-btn").click(function(e){
        
        e.preventDefault();
        $('#selectModal').modal();

 })//butt end

 $(".priv").click(function(e){

 var key = $('#keyword').val();

   var len = $('#keyword').val().length;
        
        if(len < 1){
   
   alert('Please Enter a Word to Search')

}else{   
      $.ajax({
                url: "{{route('only_sch')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'Search': key,
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
                    $('.change').addClass('hide');
                    $('.change2').addClass('hide');

                    $('.change3').removeClass('hide');
                    $('.change3').html(data);
                    $('#selectModal').modal('hide');

                }, //success end
                  
                 }); //ajax end

}//if end

 });//priv butt end

});//doc end
       
        
        
            </script>
        
            <!-- custom search btn when logged in..........................................................-->


           
     <!--filter modal timed display-->

     <script>

  setTimeout(function(){
    $('#filterModal').modal();
            },10000)
       

         </script>

      <!--filter modal timed display-->


      
<!--filter search-->

<script>

        $(document).ready(function(){
        $('.filtersearch').click(function(e){
            e.preventDefault();
            var formData = $('.filter-form').serialize();

        $.ajax({
                url: "{{route('betterfilter')}}",
                type: "GET",
                data: formData,
        
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
                    $('.change').addClass('hide');
                    $('.change2').addClass('hide');

                    $('.change3').removeClass('hide');
                    $('.change3').html(data);
                    $('#filterModal').modal('hide');
                }, //success end
                  
                 }); //ajax end
               


        });//butt
        });//doc
            </script>
        
        <!--filter search-->


@endif




<!--show only on desired page 'category' -->

@if (Request::is('buy-by-categories/*'))


<script>


    //................initial tabs data load...............

    $(document).ready(function(){
      
      //ajax load 1
      $.ajax({
              url: "{{route('tab1')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load1x").addClass("fa fa-refresh fa-spin");
              $(".load11x").html('Loading...');
                 },
    
              complete:function(){
              $(".load1x").removeClass("fa fa-refresh fa-spin");
              $(".load11x").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab1').html(data);
              },
                error: function(e) 
              {
                  $('.tab1').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end


          //ajax load 2
      $.ajax({
              url: "{{route('tab2')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load2").addClass("fa fa-refresh fa-spin");
              $(".load22").html('Loading...');
                 },
    
              complete:function(){
              $(".load2").removeClass("fa fa-refresh fa-spin");
              $(".load22").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab2').html(data);
              },
                error: function(e) 
              {
                  $('.tab2').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end


          //ajax load 3
      $.ajax({
              url: "{{route('tab3')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load3").addClass("fa fa-refresh fa-spin");
              $(".load33").html('Loading...');
                 },
    
              complete:function(){
              $(".load3").removeClass("fa fa-refresh fa-spin");
              $(".load33").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab3').html(data);
              },
                error: function(e) 
              {
                  $('.tab3').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end



          //ajax load 4
      $.ajax({
              url: "{{route('tab4')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load4").addClass("fa fa-refresh fa-spin");
              $(".load44").html('Loading...');
                 },
    
              complete:function(){
              $(".load4").removeClass("fa fa-refresh fa-spin");
              $(".load44").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab4').html(data);
              },
                error: function(e) 
              {
                  $('.tab4').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end



 //ajax load 5
 $.ajax({
              url: "{{route('tab5')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load5").addClass("fa fa-refresh fa-spin");
              $(".load55").html('Loading...');
                 },
    
              complete:function(){
              $(".load5").removeClass("fa fa-refresh fa-spin");
              $(".load55").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab5').html(data);
              },
                error: function(e) 
              {
                  $('.tab5').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end



//ajax load 6
$.ajax({
              url: "{{route('tab6')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load6").addClass("fa fa-refresh fa-spin");
              $(".load66").html('Loading...');
                 },
    
              complete:function(){
              $(".load6").removeClass("fa fa-refresh fa-spin");
              $(".load66").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab6').html(data);
              },
                error: function(e) 
              {
                  $('.tab6').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end


//ajax load 7
$.ajax({
              url: "{{route('tab7')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load7").addClass("fa fa-refresh fa-spin");
              $(".load77").html('Loading...');
                 },
    
              complete:function(){
              $(".load7").removeClass("fa fa-refresh fa-spin");
              $(".load77").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab7').html(data);
              },
                error: function(e) 
              {
                  $('.tab7').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end


//ajax load 8
$.ajax({
              url: "{{route('tab8')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load8").addClass("fa fa-refresh fa-spin");
              $(".load88").html('Loading...');
                 },
    
              complete:function(){
              $(".load8").removeClass("fa fa-refresh fa-spin");
              $(".load88").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab8').html(data);
              },
                error: function(e) 
              {
                  $('.tab8').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end






//ajax load 9
$.ajax({
              url: "{{route('tab9')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load9").addClass("fa fa-refresh fa-spin");
              $(".load99").html('Loading...');
                 },
    
              complete:function(){
              $(".load9").removeClass("fa fa-refresh fa-spin");
              $(".load99").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab9').html(data);
              },
                error: function(e) 
              {
                  $('.tab9').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end




//ajax load 10
$.ajax({
              url: "{{route('tab10')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load10").addClass("fa fa-refresh fa-spin");
              $(".load1010").html('Loading...');
                 },
    
              complete:function(){
              $(".load10").removeClass("fa fa-refresh fa-spin");
              $(".load1010").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab10').html(data);
              },
                error: function(e) 
              {
                  $('.tab10').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end




//ajax load 11
$.ajax({
              url: "{{route('tab11')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load11").addClass("fa fa-refresh fa-spin");
              $(".load1111").html('Loading...');
                 },
    
              complete:function(){
              $(".load11").removeClass("fa fa-refresh fa-spin");
              $(".load1111").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab11').html(data);
              },
                error: function(e) 
              {
                  $('.tab11').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end




//ajax load 12
$.ajax({
              url: "{{route('tab12')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load12").addClass("fa fa-refresh fa-spin");
              $(".load1212").html('Loading...');
                 },
    
              complete:function(){
              $(".load12").removeClass("fa fa-refresh fa-spin");
              $(".load1212").html(' ');
              },
              
    
              success: function(data)
              {
                  $('.tab12').html(data);
              },
                error: function(e) 
              {
                  $('.tab12').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end




//ajax load 13
$.ajax({
              url: "{{route('tab13')}}",
              type: "GET",
              
              beforeSend:function(){
              $(".load13").addClass("fa fa-refresh fa-spin");
              $(".load1313").html('Loading...');
                 },
    
              complete:function(){
              $(".load13").removeClass("fa fa-refresh fa-spin");
              $(".load1313").html(' ');
              },
              
              success: function(data)
              {
                  $('.tab13').html(data);
              },
                error: function(e) 
              {
                  $('.tab13').html("Error Loading Data! Try Again Later");
              } 	        
         });//ajax end


    });//doc end
//....................initial tab data load..............................
</script>






<!-- .......................................filter category by school................-->


        

        @endif
        <!-- ..........................................filter category by school................-->









<!--.................................Ajax Js................................................-->






<!-- site search button -->

<script>

$(document).ready(function(){
    $('.search-btn-main').click(function(e){
        e.preventDefault();

        var val = $('.Search').val();
        $('.search-btn').prop('diasabled',true);
        if(val < 1){
            alert('No Word On DStreet!');
        }else{
            //continue code

            $.ajax({
                        url: "{{route('site_search')}}",
                        type: "GET",
                        data:  {
                            '_token': $('input[name=_token]').val(),
                            'Search': val,
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
                            $('.search-btn').prop('diasabled',false);
                            $('.pour').html(data);
                            $('#searchModal').modal();
                           
                        }, //success end
                          
                         }); //ajax end
            
        }
        
    });
});
    </script>



<!--site search btn -->




<!--contact


<script>

    $(document).ready(function (){
        $('.contact-us').click(function(e){
            e.preventDefault();
            $('.contact-us').prop('disabled',true);
            var formdata = $('#filldetails').serialize();
            
            $.ajax({
                url: "{{route('contact')}}",
            type: 'GET',
            data: formdata,
                
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

            success: function(data){

                 if ((data.errors)) {
                     
                    $('.contact-us').prop('disabled',false);
                         //...........emit  validation errors................
                            if (data.errors.Name) {
                                toastr.info(data.errors.Name, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Email) {
                                toastr.info(data.errors.Email, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Message) {
                                toastr.info(data.errors.Message, 'warning Alert', {timeOut: 5000});
                            }
                         //.............................. 
        
                        } else {

                            if(data == 'Error! Mail not sent. Verify internet connection'){
              $('.contact-us').prop('disabled',false);
          toastr.error(data);
                            }else{
                                $('.contact-us').prop('disabled',false);
                     toastr.success(data);
                     //reset form
                 $("#filldetails")[0].reset();
                            }
               

            }//error spit end
            
            }//success end

            });//ajax end
        });//btn end
    });//doc end

</script>
contact-->







<!--request final yr proj///////////////////////////////project issues-->


<script>

    $(document).ready(function (){
        $('.request-final-year-project').click(function(e){
            e.preventDefault();
            $('.request-final-year-project').prop('disabled',true);
            
            var formdata = $('#filldetails').serialize();
            
            $.ajax({
                url: "{{route('req_project')}}",
            type: 'POST',
            data: formdata,
                
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

            success: function(data){
               
                 if ((data.errors)) {
                     //yes errors

                    $('.request-final-year-project').prop('disabled',false);
                         //...........emit  validation errors................
                            if (data.errors.Name) {
                                toastr.info(data.errors.Name, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Number) {
                                toastr.info(data.errors.Number, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Course) {
                                toastr.info(data.errors.Course, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Department) {
                                toastr.info(data.errors.Department, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.School) {
                                toastr.info(data.errors.School, 'warning Alert', {timeOut: 5000});
                            }
                            if (data.errors.Description) {
                                toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                            }
                         //.............................. 
        
                        } else {
                            //no errors

                            if(data == 'Error! Verify Internet Connection And Try Again'){
              $('.request-final-year-project').prop('disabled',false);
                    toastr.error(data);
                            }else{
                                $('.request-final-year-project').prop('disabled',false);
                     toastr.success(data);
                     //reset form
                 $("#filldetails")[0].reset();
                            }
               

            }//error spit end
            
            }//success end

            });//ajax end
        });//btn end
    });//doc end

</script>

<!--request final yr proj-->


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
  
  </script>





<script>


        //................initial find data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('reqed_proj')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-spin").addClass("fa fa-refresh fa-spin");
                  $(".load-text").html('Loading Data...');
                  },
        
                   complete:function(){
                  $(".load-spin").removeClass("fa fa-refresh fa-spin");
                  $(".load-text").html(' ');
                  },
                  
        
                  success: function(data)
                  {
                      $('.load-data').html(data);
                  },
                    error: function(e) 
                  {
                      $('.load-data').html("Error Loading Data! Try Again Later");
                  } 	        
             });
        });
//................initial find data load..............................
</script>



<!--project search-->

<script>

        $(document).ready(function(){
        $('.search-project').click(function(e){
            e.preventDefault();
            var value = $('#keyword').val();
            var len = $('#keyword').val().length;
        
            if(len < 1){
       
       alert('Please Enter a Word to Search')

    }else{

        $.ajax({
                url: "{{route('reqed_proj')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'Search': value,
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
                    $('.load-data').addClass('hide');
                    $('.load-sch').addClass('hide');

                    $('.load-search').removeClass('hide');
                    $('.load-search').html(data);
                }, //success end
                  
                 }); //ajax end
                }//if check


        });//butt
        });//doc
            </script>
        
        <!--req project search-->




        <!--sch select search-->

<script>

        $(document).ready(function(){
        $('.school-project').change(function(e){
            e.preventDefault();
            var value = $(this).val();
        
        
        $.ajax({
                url: "{{route('reqed_proj')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'School': value,
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
                    $('.load-search').addClass('hide');
                    $('.load-data').addClass('hide');

                    $('.load-sch').removeClass('hide');
                    $('.load-sch').html(data);
                    
                }, //success end
                  
                 }); //ajax end
        
        });
        });
            </script>
        
        <!--sch select search-->




        <!-- offer help for project-->
        <script>

                $(document).ready(function (){
                    $('.request-final-year-project2').click(function(e){
                        e.preventDefault();
                        $('.request-final-year-project2').prop('disabled',true);
                        
                        var formdata = $('#filldetails2').serialize();
                        
                        $.ajax({
                            url: "{{route('offer_project')}}",
                        type: 'POST',
                        data: formdata,
                            
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
            
                        success: function(data){
                           
                             if ((data.errors)) {
                                 //yes errors
            
                                $('.request-final-year-project2').prop('disabled',false);
                                     //...........emit  validation errors................
                                        if (data.errors.Name) {
                                            toastr.info(data.errors.Name, 'warning Alert', {timeOut: 5000});
                                        }
                                        if (data.errors.Number) {
                                            toastr.info(data.errors.Number, 'warning Alert', {timeOut: 5000});
                                        }
                                        if (data.errors.Course) {
                                            toastr.info(data.errors.Course, 'warning Alert', {timeOut: 5000});
                                        }
                                        if (data.errors.Department) {
                                            toastr.info(data.errors.Department, 'warning Alert', {timeOut: 5000});
                                        }
                                        if (data.errors.School) {
                                            toastr.info(data.errors.School, 'warning Alert', {timeOut: 5000});
                                        }
                                        if (data.errors.Description) {
                                            toastr.info(data.errors.Description, 'warning Alert', {timeOut: 5000});
                                        }
                                     //.............................. 
                    
                                    } else {
                                        //no errors
            
                                        if(data == 'Error! Verify Internet Connection And Try Again'){
                          $('.request-final-year-project2').prop('disabled',false);
                                toastr.error(data);
                                        }else{
                                            $('.request-final-year-project2').prop('disabled',false);
                                 toastr.success(data);
                                 //reset form
                             $("#filldetails2")[0].reset();
                                        }
                           
            
                        }//error spit end
                        
                        }//success end
            
                        });//ajax end
                    });//btn end
                });//doc end
            
            </script>
        <!-- offer help for project-->



        

<script>


        //................initial find data load...............
        $(document).ready(function(){
          
          $.ajax({
                  url: "{{route('offered_proj')}}",
                  type: "GET",
                  
                  beforeSend:function(){
                  $(".load-spin2").addClass("fa fa-refresh fa-spin");
                  $(".load-text2").html('Loading Data...');
                  },
        
                   complete:function(){
                  $(".load-spin2").removeClass("fa fa-refresh fa-spin");
                  $(".load-text2").html(' ');
                  },
                  
        
                  success: function(data)
                  {
                      $('.load-data2').html(data);
                  },
                    error: function(e) 
                  {
                      $('.load-data2').html("Error Loading Data! Try Again Later");
                  } 	        
             });
        });
//................initial find data load..............................
</script>





<!--offered project search-->

<script>

        $(document).ready(function(){

        $('.search-project2').click(function(e){
            e.preventDefault();
            var value = $('#keyword2').val();
            var len = $('#keyword2').val().length;
        
            if(len < 1){
       
       alert('Please Enter a Word to Search')

    }else{

        $.ajax({
                url: "{{route('offered_proj')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'Search': value,
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
                    $('.load-data2').addClass('hide');
                    $('.load-sch2').addClass('hide');

                    $('.load-search2').removeClass('hide');
                    $('.load-search2').html(data);
                }, //success end
                  
                 }); //ajax end
                }//if check


        });//butt
        });//doc
            </script>
        
        <!--custom search offered proj-->


        <script>

                //phone number validation for offer project
          $('.numval2').on('keyup', function(){
          var con = $('.numval2').val();
          if($('.numval2').val().length > 11){
              $('.numerr2').html('Number must be 11 e.g 08012345678');
          }else if($('.numval2').val().length < 11){
              $('.numerr2').html('Number must be 11 e.g 08012345678');
          }else{
              $('.numerr2').html(' ');
          }
          });
          
          </script>





  <!--offer sch select search-->

  <script>

        $(document).ready(function(){
        $('.school-project2').change(function(e){
            e.preventDefault();
            var value = $(this).val();
        
        
        $.ajax({
                url: "{{route('offered_proj')}}",
                type: "GET",
                data:  {
                    '_token': $('input[name=_token]').val(),
                    'School': value,
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
                    $('.load-search2').addClass('hide');
                    $('.load-data2').addClass('hide');

                    $('.load-sch2').removeClass('hide');
                    $('.load-sch2').html(data);
                    
                }, //success end
                  
                 }); //ajax end
        
        });
        });
            </script>
        
        <!--offer sch select search-->


        <!--............... project issues.........................................-->