@extends('layouts.app')

@section('title','DStreet Salah Promo')

@section('meta', 'Dstreet Salah give-away! 25 lucky users can claim a token on N100 airtime on Dstreet!')

@section('content')


   
    <!-- header -->
    <header>
    @include('includes.header')
    </header>
    <!-- //header -->

    <div class='text-center '>
        @if(session('err'))
        <div class='alert alert-danger'>
        <h4 class='text-danger'> {{session('err')}}</h4>
        </div>
        @endif
            </div>
<br>
 
<div class='text-center alert alert-info'>
<h4 class='text-primary text-capitalize'>{{$lucky}} User(s) Claimed <strike>N</strike>{{$Tairtime}} airtime already...</h4>
</div>

    <!-- Slider -->
    <div class="slider">
        <ul class="rslides" id="slider">
            
            <li>
                    <div class="w3ls-slide-text">
                        <h3>DStreet Airtime give-away</h3>
                        @if(Auth()->check())z
                        <a href="/claim-dstreet-promo" class="w3layouts-explore">Claim <strike> N</strike>100</a>
                       @else
                       <a href="/login-to-claim" class="w3layouts-explore">Claim <strike> N</strike>100</a>
                       @endif
                    </div>
                </li>
            
            
           
        </ul>
    </div>
    <!-- //Slider -->


    
    
    <!-- content-starts-here //houses all-->
    <div class="main-content">

     


        

<!-- .......................section end........................................ -->




</div><!--main content end-->




<!--footer section start-->
    <footer>
       @include('includes.footer')
    </footer>
    <!--footer section end-->







@endsection


        
   
   