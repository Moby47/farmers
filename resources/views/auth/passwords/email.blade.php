@extends('layouts.authapp')

@section('title',' Password Reset On Dstreet Online Classified Website')

@section('meta','Dstreet, an online market place to buy, sell, swap items or advertise products - services in all campuses - Universities in Nigeria')


@section('content')




<body id="login">
        <div class="login-logo">
          <a href="/"> <img src="{{asset('images/dstreet_logo_signin_up.png') }}" class="logo-size" 
                              title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/></a>
        </div>
        <h2 class="form-heading white">Reset Password</h2>
        <div class="app-cam">
      
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
      
              @include('layouts.error')
      
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
      

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

   
                <input id="email" type="text" name="email" placeholder="Email Address" value="{{ old('email') }}" class="text"  onfocus="this.value = '';" >
             
            </div>
 
             
              <div class="submit"><input type="submit"  value=" Reset Password"></div>
      
              <ul class="new">
                    <li class="new_left"><p><a href="/" class='white link'>Home</a></p></li>
                    <li class="new_right"><p class="sign white">New here ?<a href="/register" class='white link'> Sign Up</a></p></li>
                    <div class="clearfix"></div>
                </ul>
          </form>
          
        </div>
         <div class="copy_layout login white">
            <p class='white'>Copyright &copy; 2018. All Rights Reserved |  <a href="#" target="_blank" class='white'>Dstreet</a> </p>
         </div>
      </body>
      

@endsection
