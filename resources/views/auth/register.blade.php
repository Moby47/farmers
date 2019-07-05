@extends('layouts.authapp')

@section('title',' Register And Access Your Campus in Nigeria Using Dstreet Online Classified Website')

@section('meta','Register on the Dstreet online market place to buy, sell, swap items or advertise products - services in all campuses - Universities in Nigeria')

@section('content')

<body id="login">
    <div class="login-logo">
        <a href="/"><img src="{{asset('images/dstreet_logo_signin_up.png') }}" class="logo-size" 
                        title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/></a>
    </div>
    <h2 class="form-heading white">Register</h2>

    

    <form class="form-signin app-cam" method="POST" action="{{ route('register') }}">

        @include('layouts.error')

        @if(session('network'))
    <div class='alert alert-warning text-center'> {{session('network')}}</div>
     @endif

     @if(session('dup'))
    <div class='alert alert-warning text-center'> {{session('dup')}}</div>
     @endif

     @if(session('exists'))
     <div class='alert alert-info text-center'> {{session('exists')}}</div>
      @endif

        {{ csrf_field() }}

        <input type="text" id="name" class="name"   name="name" value="{{ old('name') }}"  autofocusclass="form-control1" placeholder="First Name" autofocus="">
        <input id="email" type="text" class="email"  name="email" value="{{ old('email') }}" class="form-control1" placeholder="Email" autofocus="">

       <input type="text" id='phone'  class="form-control1 numval phone" name="number" value="{{ old('number') }}" placeholder="Phone number" autofocus="">
       <p class='numerr text-danger'></p>

          <select class="form-control1 form-group black selectpicker show-tick" data-live-search="true" autofocus="" id="sel" name="school">
              <option value="">Search Institution</option>
              <option value="ABIA STATE UNIVERSITY UTURU CAMPUS"> ABIA STATE UNIVERSITY, UTURU CAMPUS </option>  
<option value="ABIA STATE UNIVERSITY UTURU CAMPUS"> ABIA STATE UNIVERSITY, UMUAHIA CAMPUS</option>
<option value="ANAMBRA STATE UNIVERSITY"> ANAMBRA STATE UNIVERSITY </option> 
             
<option value=" WESTERN DELTA UNIVERSITY  OGHARA  DELTA STATE ">WESTERN DELTA UNIVERSITY  OGHARA  DELTA STATE</option>
<option value="UNIVERSITY OF NIGERIA NSUKKA CAMPUS"> UNIVERSITY OF NIGERIA, NSUKKA CAMPUS</option>  
<option value="UNIVERSITY OF NIGERIA ENUGU CAMPUS"> UNIVERSITY OF NIGERIA, ENUGU CAMPUS </option>  
<option value=" YABA COLLEGE OF TECHNOLOGY ">YABA COLLEGE OF TECHNOLOGY</option>
      </select>

    <!--<input type="text" class="form-control1" placeholder="Matric Number" autofocus="" name="matric.number">-->

        <input type="password" id="password"  name="password" class="form-control1 pass" placeholder="Password">

        <input type="password"  id="password-confirm"  name="password_confirmation" class="form-control1" placeholder="Confirm Password">


        <button class="btn btn-lg btn-success1 btn-block" type="submit">Submit</button>
        <div class="registration white">
            Already Registered.
            <a class="white link" href="/login">
              Login
          </a>
        </div>
        
    <div class="copy_layout login register">
        <p class='white'>Copyright &copy; 2018. All Rights Reserved |  Dstreet </p>
    </div>
    
</body>










@endsection
