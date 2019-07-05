<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

//use socialite
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        return $user->name;

         /*
        $user->getId();
$user->getNickname();
$user->getName();
$user->getEmail();
$user->getAvatar();
         */
    }


//////////////////////////////////////////////////////////////////





    /**
     * Redirect the user to the twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvidertwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbacktwitter()
    {
        $user = Socialite::driver('twitter')->user();

      //get email
      $mail = $user->getEmail();
        //get fullname
      $userfullname = $user->getName();
        //split name to first and last
      $names = explode(' ', $userfullname);

      // first/last names
   $firstname = $names[0];
   $lastname = $names[1];
    
   //if exists in DB
     $check = User::where('email','=',$mail)->first();
        //if user or admin
       $stat = User::where('email','=',$mail)->pluck('status')->first();

     if($check){
         //login to respective dashboard
         if($stat == 0){
             //a user
             //login user
             Auth()->login($check);
             return redirect('/dashboard');
         }elseif($stat == 1){
             //an admin
             //login user
             Auth()->login($check);
             return redirect('/dashhboard');
         }

     }else{
         //a new user? 
      
       //store info in session
       $store = session(['name' => $firstname]);
       $store2 = session(['mail' => $mail]);
       
       //redirect to update page
        return redirect('/almost-done');
     }

      
    }

/////////////////////////////////////////////////////////////////////////////////

//******************************more socialite issues in config/services.php */



    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvidergoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackgoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        //get email
      $mail = $user->getEmail();
        //get fullname
      $userfullname = $user->name;
        //split name to first and last
      $names = explode(' ', $userfullname);

      // first/last names
   $firstname = $names[0];
   $lastname = $names[1];
    
   //if exists in DB
     $check = User::where('email','=',$mail)->first();
        //if user or admin
       $stat = User::where('email','=',$mail)->pluck('status')->first();
       //activation state
       $state=User::where('email','=',$mail)->pluck('state')->first();

       if($check){
        //login to respective dashboard
        if($stat == 0){
            //a user
            //login user
            //check activation state
            if($state ==1){
               Auth()->login($check);
            return redirect('/dashboard');
            }else{
               return redirect('/items-to-buy-around-campus')
               ->with('deact','Account Deactivated, Contact Us to Get Back on Dstreet.'); 
            }
            
        }elseif($stat == 1){
            //an admin
            //login user
             //check activation state
             if($state ==1){
               Auth()->login($check);
               return redirect('/dashhboard');
             }else{
               return redirect('/items-to-buy-around-campus')
               ->with('deact','Account Deactivated, Contact Us to Get Back on Dstreet.'); 
             }
           
        }

    }else{
         //a new user? 
      
       //store info in session
       $store = session(['name' => $firstname]);
       $store2 = session(['mail' => $mail]);
       
       //redirect to update page
        return redirect('/almost-done');
     }

         /*
        $user->getId();
$user->getNickname();
$user->getName();
$user->getEmail();
$user->getAvatar();
         */
    }//method end


}//class end
