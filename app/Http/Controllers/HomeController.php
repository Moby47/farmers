<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\ads;
use App\messages;
use App\User;
use App\question;
use App\report;
use App\requests;

use DB;
use Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


   
            
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check role
         if(auth()->user()->status == 0){

        $user = Auth()->user()->id;

     //total posts posted by user
     $total_p = posts::where('user_id', '=',$user)->count('user_id');
     //total sales completed
     $total_s = posts::where('user_id', '=',$user)->where('verification', '=',2)->count('user_id');
    //premium adds requested
     $premium_ads = ads::where('user_id', '=', $user)->count('user_id');
    //unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
 //running messages
 $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');
//total on mails
$totalmailbox = $unread + $running ;

    //sch ads
    $sch = Auth()->user()->school;

    $sch_ad =ads::inRandomOrder()->where('school','=',$sch)->where('verification','=',1)
    ->select('id','banner','description','title','school','link')->take(3)->get();
    //all adverts
    $sch_ad_all =ads::inRandomOrder()->where('verification','=',1)
    ->select('id','banner','description','title','school','link')->take(3)->get();


    //cache checks
if(Cache::has('post')){
    $postdrive = 1;
}else{
    $postdrive = 0;
}
if(Cache::has('ad')){
    $addrive = 1;
}else{
    $addrive = 0;
}
if(Cache::has('req')){
    $reqdrive = 1;
}else{
    $reqdrive = 0;
}
if(Cache::has('msg')){
    $msgdrive =1;
    $id = Cache::get('id');
}else{
    $msgdrive =0;
    $id = '';
}
    //cache checks

        return view('users.dashboard')->with('total_p', $total_p)->with('total_s',$total_s)
        ->with('premium_ads',$premium_ads)->with('sch_ad', $sch_ad)->with('unread',$unread)
        ->with('totalmailbox',$totalmailbox)
        ->with('running',$running)
        ->with('sch_ad_all',$sch_ad_all)
        ->with('postdrive',$postdrive)
        ->with('addrive',$addrive)
        ->with('reqdrive',$reqdrive)
        ->with('msgdrive',$msgdrive)
        ->with('id',$id);

         }else{


//all required addons for the view
 //total posts
     $tpost = posts::orderby('id')->where('verification','=',1)->count();
     //pending posts
     $ppost = posts::orderby('id')->where('verification','=',0)->count();
     //total ads
     $tads = ads::orderby('id')->where('verification','=',1)->count();
       //pending ads
       $pads = ads::orderby('id')->where('verification','=',0)->count();
    //total users
    $users = User::where('status','=',0)->where('verification','=',1)->count();
    //total admins
     $admins = User::where('status','=',1)->where('verification','=',1)->count();
    //total sold
    $sold = posts::where('verification','=',2)->count();
   //sum of ad where not declined
   $adsum = ads::where('verification','=',1)->orwhere('verification','=',2)->sum('amount');
    //faq count
    $faq = question::where('answer','=',Null)->count();
    //active ads to monitor exp date
    $expire = ads::orderby('id','desc')->where('verification','=',1)
    ->select('id','expiration','title','created_at','user_id')->take(2)->get();
    //reports
    $repo =report::orderby('id')->count();

    //pending requests
    $reqq=requests::where('validity','=', 0)->count();

    //total requests
    $total_req =requests::orderby('id')->where('validity','=',1)->count();

        return view('admins.dashboard')->with('tpost',$tpost)
        ->with('tads',$tads)->with('users',$users)->with('admins',$admins)
        ->with('sold',$sold)->with('faq',$faq)->with('expire',$expire)
        ->with('adsum',$adsum)->with('repo',$repo)->with('ppost',$ppost)->with('pads',$pads)
        ->with('reqq',$reqq)->with('total_req',$total_req);
         }
    }
}
