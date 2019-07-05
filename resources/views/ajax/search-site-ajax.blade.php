<span id='goto'>
    </span>
    @if(count($result)>0)
    
    
    <div class='text-center'> {{$result->links()}} </div>
    
    @foreach($result as $p)
    <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
     <!--img -->   <div class="portfolio-img-search event-img">
        <a href="/buy-product/{{str_replace(' ','-',$p->title)}}">
               <img src="/storage/post_images/{{$p->image_1}}"
            class="img-responsive img-size" alt="{{$p->title}}" title='{{$p->description}}'>
        </a>
            <div class="over-image"></div>
     <!--img -->    </div>
    
      <!--txt -->   <div class="portfolio-description-search">
            @mobile
            <p><a href="/buy-product/{{str_replace(' ','-',$p->title)}}" class='wrap white'>{{substr($p->title,0,16)}}..</a><p>
            @elsemobile
            <p><a href="/buy-product/{{str_replace(' ','-',$p->title)}}" class='wrap white'>{{substr($p->title,0,13)}}..</a><p>
             @endmobile
           
           <p class='white'><strike>N</strike>{{number_format($p->price)}}</p>
          
            @mobile
            <p class='white glyphicon glyphicon-map-marker'>{{substr($p->school,0,21)}}..</p>
            @elsemobile
            <p class='white glyphicon glyphicon-map-marker'>{{substr($p->school,0,10)}}</p>
             @endmobile
          
    <!--txt-->     </div>
        <div class="clearfix"> </div>
    <!--end-->    </div>
    @endforeach
    <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
     <!--img -->   <div class="portfolio-img-search event-img">
            <img src="/storage/post_images/noimage.jpg"
             class="img-responsive img-size" alt="">
            <div class="over-image"></div>
     <!--img -->    </div>
    
      <!--txt -->   <div class="portfolio-description-search"><i>
          @if(Auth()->check())
    
          @if(Auth()->user()->status == 0)
          <p><a href="{{route('post-page')}}" class='white link'>Post For Free</a></p>
            <a href="{{route('post-page')}}" class='btn blue white custom-btn'>
               Now!
            </a>
            @else
            <h4><a href="#" class='white'>Admin Account</a></h4>
            
            
            @endif
    
    
            @else
            <p><a href="{{route('goto_post')}}" class='white'>Post For Free</a></p>
          
            <a href="{{route('goto_post')}}" class='btn blue white custom-btn'>
               Now!
            </a>
           @endif 
            
    <!--txt-->   </i>  </div>
        <div class="clearfix"> </div>
    <!--end-->    </div>
    @else
    
    <div class="alert alert-info">
           <h5 class="text-center">No Posts Found On Dstreet.
               @if(Auth()->check()) 
               
               @if ( Auth()->user()->status == 1)
    
               @else
               <a href='{{route('post-page')}}' class='text-danger'>Click Here To Create</a>
               @endif
    
               @else
               <a href='{{route('goto_post')}}' class='text-danger'>Click Here To Create</a>
               @endif
            </h5>
     </div>
    
     
     
    
    @endif
    
    <hr>
    <div class='text-center col-md-12 well well-sm'>
          <a href='#goto'><span class='fa fa-arrow-up btn'></span> Goto Top</a>
         </div>
    
                  
                         <div class="clearfix"> </div>
                                <hr>
    























    
    
                      <!--  categories   -->
                      <div class="all-categories">
                            <h3 class='text-center'> Select a category</h3>
                            <ul class="all-cat-list">
                                <li><a href="/buy-by-categories/Mobile-phone-tablet#parentVerticalTab1">Mobiles <span class="num-of-ads">({{$mobile}})</span></a></li>
                                <li><a href="/buy-by-categories/Electronics-Appliances#parentVerticalTab2">Electronics &amp; Appliances  <span class="num-of-ads">({{$elec}})</span></a></li>
                                <li><a href="/buy-by-categories/Books-Sports-Hobbies#parentVerticalTab7">Books, Sports &amp; Hobbies    <span class="num-of-ads">({{$book}})</span></a></li>
                                <li><a href="/buy-by-categories/Fashion#parentVerticalTab8">Fashion   <span class="num-of-ads">({{$fashion}})</span></a></li>
                                <li><a href="/buy-by-categories/Computers-Accessories#parentVerticalTab4">Computers &amp; Accessories   <span class="num-of-ads">({{$comp}})</span></a></li>
                                <li><a href="/buy-by-categories/Services#parentVerticalTab10">Services   <span class="num-of-ads">({{$serv}})</span></a></li>
                                <li><a href="/buy-by-categories/Lodging-Accomodations#parentVerticalTab9">Lodging &amp; Accomodations   <span class="num-of-ads">({{$house}})</span></a></li>
                                <li><a href="/buy-by-categories/Swap-Items#parentVerticalTab3">Swap Items  <span class="num-of-ads">({{$swap}})</span></a></li>
                                <li><a href="/buy-by-categories/Furniture#parentVerticalTab5">Furniture    <span class="num-of-ads">({{$fun}})</span></a></li>
                                <li><a href="/buy-by-categories/Pets#parentVerticalTab6">Pets   <span class="num-of-ads">({{$pet}})</span></a></li>
                                <li><a href="/buy-by-categories/Cosmetics-Beauty#parentVerticalTab11">Cosmetics &amp; Beauty   <span class="num-of-ads">({{$cos}})</span></a></li>
                               <li> <a href="/buy-by-categories/Cryptocurrency#parentVerticalTab13">Cryptocurrency   <span class="num-of-ads">({{$curr}})</span></a></li>
                                <li><a href="/buy-by-categories/Others#parentVerticalTab12">Others  <span class="num-of-ads">({{$others}})</span></a></li>
                            </ul>
                        </div>
                        <!--  categories   -->
        
                        <div class="clearfix"> </div>
        <hr>
    
    
    
    
    
       <!--Ads-->

       @if(count($ad)>0)
    
       <h3 class='text-center'> Ads on Dstreet</h3>
    
                               
       @foreach($ad as $p)
       <!--start -->     <div class="col-md-4 w3ls-portfolio-left">
        <!--img -->   <div class="portfolio-img-search event-img">
           <a href="/buy-ad/{{$p->id}}">
                  <img src="/storage/ads_images/{{$p->banner}}"
               class="img-responsive img-size" alt="{{$p->title}}" title='{{$p->description}}'>
           </a>
               <div class="over-image"></div>
        <!--img -->    </div>
       
         <!--txt -->   <div class="portfolio-description-search"> 
                @mobile
                <p><a href="/buy-ad/{{$p->id}}" class='wrap white'>{{substr($p->title,0,20)}}..</a><p>
                @elsemobile
                <p><a href="/buy-ad/{{$p->id}}" class='wrap white'>{{substr($p->title,0,20)}}..</a><p>
                 @endmobile
              
              
             
       <!--txt-->     </div>
           <div class="clearfix"> </div>
       <!--end-->    </div>
       @endforeach
       
       @else
       
       <div class="alert alert-info">
              <h5 class="text-center">No Posts Found On Dstreet.
                  @if(Auth()->check()) 
                  
                  @if ( Auth()->user()->status == 1)
       
                  @else
                  <a href='{{route('post-page')}}' class='text-danger'>Click Here To Create</a>
                  @endif
       
                  @else
                  <a href='{{route('goto_post')}}' class='text-danger'>Click Here To Create</a>
                  @endif
               </h5>
        </div>
       
        
        
       
       @endif
       
       <hr>
       <div class='text-center col-md-12 well well-sm'>
             <a href='#goto'><span class='fa fa-arrow-up btn'></span> Goto Top</a>
            </div>
       
                     
                            <div class="clearfix"> </div>
                                   <hr>
<!-- ads -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
            //.........paginated result......................
            $(document).one('click','.pagination a', function(e){
            
            e.preventDefault();
    
             var query = $('.Search').val();
    
            
            var page = $(this).attr('href').split('page=')[1];
            
            getproducts(page);
            
            function getproducts(page){
            
            $.ajax({
                url: '/site-search?Search='+query+'&page='+ page,
            
                beforeSend:function(){
                   // $('.modal-body').hide('fade');
                      $(".spin").addClass("fa fa-refresh fa-spin");
                      $(".loadtxt").html('Fetching Results...');
                        },
            
                         complete:function(){
                        $(".spin").removeClass("fa fa-refresh fa-spin");
                        $(".loadtxt").html(' ');
                    //	$('.modal-body').show('fade');
                        },
            
            }).done(function(data){
                $('.modal-body').html(data);
            
                location.hash = page;
            })
            
            }//func end
            });//doc end
            
            //.........paginated result......................
            </script>