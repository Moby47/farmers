@extends('layouts.authapp')

@section('title',' Password Reset On Dstreet Online Classified Website')

@section('meta','Dstreet, an online market place to buy, sell, swap items or advertise products - services in all campuses - Universities in Nigeria')


@section('content')




<body id="login">
        <div class="login-logo">
          <a href="/"> <img src="{{asset('images/dstreet_logo_signin_up.png') }}" class="logo-size" 
                              title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/></a>
        </div>
        <h2 class="form-heading white">Resend Verification Email</h2>
        <div class="app-cam">
      
                <form class="form-horizontal" method="POST" action="{{ route('resend') }}">
                        {{ csrf_field() }}
      
              @include('layouts.error')
      
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

          @if (session('good'))
          <div class="alert alert-success text-center">
              {{ session('good') }}
          </div>
      @endif

          @if (session('latest'))

          @if(session('latest') == 'Error! Verification Mail not Sent, Try Again')

          <div class="alert alert-info text-center">
            {{ session('latest') }} <br>
         </div>

          @else
          <div class="alert alert-info text-center">
              {{ session('latest') }} <br>
            Please Try   <a href='/register' class='link text-success'>Register</a> Or <a href='/login' class='link text-success'>Login</a>
          </div>

          @endif

      @endif
      

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

   
                <input id="email" type="text" name="email" placeholder="Email Address"  class="text" >
             
            </div>
 
             
              <div class="submit"><input type="submit"  value=" Resend"></div>
      
              <ul class="new">
                    <li class="new_left"><p><a href="/" class='white'>Home</a></p></li>
                    <li class="new_right"><p class="sign white">New here ?<a href="/register" class='white'> Sign up</a></p></li>
                    <div class="clearfix"></div>
                </ul>
          </form>
          
        </div>
         <div class="copy_layout login white">
            <p class='white'>Copyright &copy; 2018. All Rights Reserved |  <a href="#" target="_blank" class='white'>Dstreet</a> </p>
         </div>
      </body>
      

@endsection
