<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Str;

//mail
use Mail;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    
/* 
//All files involved in mail verification

1reigitercontroller
//user is redirected here after registeration
// DIR laravel-frame-src-illu-foundation-auth
2rgistersusers.php
//check if user is verified
// DIR laravel-frame-src-illu-foundation-auth
3authenticatesusers.php

*/



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'number' => 'required|numeric|min:11',
            'school' => 'required|string|max:100',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        try{

       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'number' => $data['number'],
             'school' => $data['school'],
             'verifytoken' => Str::random(40),
            
        ]);
       }
       catch(\Exception $e){
        return redirect('/register')->with('dup','Phone Number Already Exist');
       }

        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }

//send email
    public function sendemail($thisUser){
        try{
      Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
        }
       catch(\Exception $e){

           return 'Error! Link not Sent, Try Again';
      }//catch end
      
    }//method end


    //verify first
public function verifyemailfirst(){
    return view('/login')->with('success','We Sent a LInk to Your Email to Activate Your Account');
}


//sendEmailDone
public function sendEmailDone($email,$verifytoken){

   $user = User::where(['email'=>$email,'verifytoken'=>$verifytoken])->first();
  if ($user){
     User::where(['email'=>$email,'verifytoken'=>$verifytoken])->update(['verification' => '1','verifytoken' => NULL]);
     return redirect('/login')->with('success','Account Verified! Please Login');
  }else{
      return redirect('/login')->with('none','Link Expired, Please Use the Last Verification Mail Sent to You or ');
  }
}


}//class end