@extends('layouts.authapp')

@section('title',' Login To Get more From Your Campus in Nigeria Using Dstreet Online Classified Website')

@section('meta','Log into Dstreet online market place to buy, sell, swap items or advertise products - services in all campuses - Universities in Nigeria')

@section('content')

<body id="login">
  
  <div class="login-logo">
    <a href="/"> <img src="{{asset('images/dstreet_logo_signin_up.png') }}" class="logo-size" 
                        title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/></a>
  </div>
  <h2 class="form-heading white">login</h2>
  <div class="app-cam">

	  <form method="POST" action="{{ route('login') }}" class='form'>

        {{ csrf_field() }}

        @include('layouts.error')

      @if(session('warning'))
     <div class='alert alert-danger text-center'> {{session('warning')}}</div>
      @endif
      @if(session('sent'))
      <div class='alert alert-info text-center'> {{session('sent')}}</div>
       @endif
       @if(session('none'))
      <div class='alert alert-warning text-center'> 
        {{session('none')}} <a href='/resend-verify'>Resend Verifcation</a>
      </div>
       @endif
       @if(session('exists'))
       <div class='alert alert-warning text-center'>
          {{session('exists')}} <a href='/resend-verify'>Click To Resend Link</a>
      </div>
        @endif

        <input id="email" type="text" name="email" placeholder="Email Address" value="{{ old('email') }}" class="text"  onfocus="this.value = '';" >
        
        <input id="password" type="password" placeholder="Password" name="password" onfocus="this.value = '';" >
        
        <div class="submit"><input type="submit"  value="Login"></div>


        <!--removed from login button #onclick="myFunction()" -->


        <div class="text-center">

            

        

        <!--  <a href="http://127.0.0.1:8000/login/twitter" class="twitter">
              Twitter
          </a>-->
         
        </div>
		<ul class="new  margin-up">
			<li class="new_left "><p><a href="{{ route('password.request') }}" class='white link'>Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign white">New here ?<a href="/register" class='white link'> Sign Up</a></p></li>
      <div class="clearfix"></div>
        </ul>

       <!-- <div class="text-center">
         <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/> Remember me
        </div> -->
    </form>
    
  </div>
   <div class="copy_layout login  margin-up">
      <p class='white'>Copyright &copy; 2018. All Rights Reserved | Dstreet </p>
   </div>
</body>



@endsection
