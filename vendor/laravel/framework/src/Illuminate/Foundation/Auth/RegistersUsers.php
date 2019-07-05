<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use App\User;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       
        //validate 
        $this->validator($request->all())->validate();
        

        //registers the user codes
        
        //check if connected
        $host = 'www.google.com';
        $port ='80';

//$st = (bool)@fsockopen($host, $port, $err_no, $err_str, 10);

//if($st){
    //if $st then ,its online
    //check if user already reged before
    $try = $request->input('email');
    $check = User::where('email','=',$try)->first();
    
    //redirect if mail exists, meaning verification mail has been sent
    if($check){
         //redirect with verification mail sent message
         $mail = $check->email;
         $time = $check->created_at->diffforhumans();
      return redirect('/register')->with('exists','Verification Email already sent to '.$mail.' '.$time);
    }else{
        //continue code
         //registers the user
    event(new Registered($user = $this->create($request->all())));
    }
   



       // $this->guard()->login($user);
       //user is redirected here after registeration

      // return redirect('/login')->with('success','We Sent a Link to Your Email to Activate Your Account...');

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
