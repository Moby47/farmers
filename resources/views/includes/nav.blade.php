<!-- Navigation -->
<div class="agiletopbar">
        <div class="wthreenavigation">
            <div class="menu-wrap">
            <nav class="menu">
                <div class="icon-list">

@guest
<a href="/login-to-claim"><i class="fa fa-fw fa-gift"></i><span> DStreet Promo</span> </a>
@else
<a href="/claim-dstreet-promo"><i class="fa fa-fw fa-gift"></i><span> DStreet Promo</span> </a>
@endguest

 <a href="/how-to-buy-sell"><i class="fa fa-fw fa-blind"></i><span> How to run DStreet</span> </a>

 @guest
<a href="/login" class=''><i class="fa fa-fw fa-sign-in" aria-hidden="true"></i><span>Login</span></a>
@else
@if ( Auth::user()->status == 1)
<a href="/dashhboard" class=''><i class="fa fa-fw fa-dashboard" aria-hidden="true"></i><span>Admin Dashboard</span></a>
@else
<a href="/dashboard" class=''><i class="fa fa-fw fa-dashboard" aria-hidden="true"></i><span> Go to {{ Auth::user()->name }}'s Dashboard</span></a>
@endif
    @endguest

    @guest
    <a href="/register" aria-expanded="false" class=''><i class="fa fa-fw fa-registered" aria-hidden="true"></i><span> Register</span></a>
    @endguest

  <a href="/items-to-buy-around-campus"><i class="fa fa-fw fa-cab"></i><span> Explore DStreet</span> </a>

 <a href="https://blog.dstreet.com.ng"><i class="fa fa-fw fa-comments"></i><span> Blog - Word on DStreet</span> </a>

  
<a href="/final-year-projects"><i class="fa fa-fw fa-book"></i><span> Final Year Projects</span> </a>

@guest
 <a href="{{route('goto_req')}}" ><i class="fa fa-fw fa-truck"></i><span> Make a Request </span></a>
@else
@if ( Auth::user()->status == 1)
@else
@if(\route::current()->getname()=='reqqq')
@else
 <a href="#request" data-toggle='modal' ><i class="fa fa-fw fa-truck" ></i><span> Make a Request </span></a>
@endif
@endif
@endguest

@guest
<a href="/goto-ad"><i class="fa fa-fw fa-diamond"></i><span> Premium Ads</span> </a>
@else
<a href="/ads"><i class="fa fa-fw fa-diamond"></i><span> Premium Ads</span> </a>
@endif

<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
?>

@if(stripos($ua,'version/') !== false || stripos($ua,'wv') !== false) 
<!--And webview- do nothing-->
@else
    <!-- dd mobile app-->
    <a href="/dstreet-for-android"><i class="fa fa-fw fa-android"></i><span> DStreet for android</span> </a>
@endif

@if(\route::current()->getname()=='help')        
@else
@if(Auth::check())
     @if ( Auth::user()->status == 1)
     @else
        <a href="#" class='help font'><i class="fa fa-fw fa-question-circle" ></i><span> Help</span></a>
    @endif
    @endif 
@endif

@if(!Auth::check())
<a href="#" class='help font'><i class="fa fa-fw fa-question-circle" ></i> <span>Help</span></a>
   @endif


   <a href="/report"><i class="fa fa-fw fa-handshake-o"></i><span> Reviews</span> </a>

 


              </div> 
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <button class="menu-button" id="open-button"> </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //Navigation -->