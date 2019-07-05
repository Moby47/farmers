  <!--left side-->
  <div class="w3ls-header">
        <!--header-one-->
      <!--  <div class="w3ls-header-left">
           
            <p><a href="/dstreet-for-android" class='font'><i class="fa fa-android" aria-hidden="true"></i> Download for Android</a></p>
         
        </div>-->
 <!--left side
 -->

        
        <!--right side--> 
        <div class="w3ls-header-right">
            <ul>
                <li class="dropdown head-dpdn">   
  <a href="/how-to-buy-sell" class=''><i class="fa fa-blind" aria-hidden="true"></i> How to run DStreet </a>         
                </li>
                 <li class="dropdown head-dpdn">         
    <a href="/items-to-buy-around-campus" class=''><i class="fa fa-cab" aria-hidden="true"></i> Explore</a>     
                </li>
       
     
     @guest
     <li class="dropdown head-dpdn"> 
     <a href="/login" class=''><i class="fa fa-sign-in" aria-hidden="true"></i><span>Login</span></a>
     </li>
     @else
     @if ( Auth::user()->status == 1)
     <li class="dropdown head-dpdn"> 
     <a href="/dashhboard" class=''><i class="fa fa-dashboard" aria-hidden="true"></i><span>Dashboard</span></a>
     </li>
     @else
     <li class="dropdown head-dpdn"> 
     <a href="/dashboard" class=''><i class="fa fa-dashboard" aria-hidden="true"></i><span>My Dashboard</span></a>
     </li>
     @endif
         @endguest
  
         @guest
         <li class="dropdown head-dpdn">   
            <a href="/register" class=''><i class="fa fa-registered" aria-hidden="true"></i> Register </a>         
     </li> 
     @endguest
             
                
      <!-- <li class="dropdown head-dpdn">
                        @if(Auth::check())
                         @if ( Auth::user()->status != 1)
                        <a href="/contact-dstreet" class='font'><i class="fa fa-inbox" aria-hidden="true"></i> Contact Us</a>
                        @endif
                        @else
                        <a href="/contact-dstreet" class='font'><i class="fa fa-inbox" aria-hidden="true"></i> Contact Us</a>
                        @endif
                    </li>-->
                
                   
                </ul>
            </div>

            <div class="clearfix"> </div>
        </div>
        <div class="container">
            <div class="agile-its-header">
                <div class="logo">
                    <h1 class='menu-shift'><a href="/"> <img src="{{ asset('images/dstreet-logo.png') }}" class="logo-size" 
                        title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/> </a></h1>
                </div>

                                     
                <div class="agileits_search">

<div class='text-center'>
                    <form action="#" method="post">
                            <input name="Search" class='Search' id='auto' type="text" placeholder="Search Dstreet..."  required="" />
                           
                            <button type="submit" class="btn btn-default blue search-btn-main" aria-label="Left Align">
                                <i class="fa fa-search home" aria-hidden="true"> </i>
                            </button>
                            {{csrf_field()}}
                        </form>
                    </div>

                  
                   @guest
                    <a class="post-w3layouts-ad" href="{{route('goto_post')}}">Post Free Ad</a>
                    @else
                         
                     <a class="post-w3layouts-ad" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      </form>

                         @endguest
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <!-- search Modal -->
  <div class="modal fade modal-fullscreen-md-down" id="searchModal" role="dialog">
        <div class="modal-dialog  ">
            
          <div class="modal-content">
                <button type="button" class="btn aqua white custom-btn" data-dismiss="modal">Close</button>
            <div class="modal-header">
                
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
              <h5 class="modal-title">Word on Dstreet</h5>
            </div>

            <span class='spin'></span>
            <span class='loadtxt'></span>

            <div class="modal-body pour"><!--body-->
              
               <!--ajax loaded content comes here -->

            </div><!--body end-->
            <div class="modal-footer">
                    

              <button type="button" class="btn aqua white custom-btn" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
       <!-- ..................... search Modal -->