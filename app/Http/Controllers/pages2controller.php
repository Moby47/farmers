<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\ads;
use App\User;
use App\question;
use App\reviews;
use App\requests;
use App\fav;
use App\fav_ad;
use App\messages;
use Illuminate\Support\Facades\Auth;
use App\report;

use DB;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class pages2controller extends Controller
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

    

    //user pages controller ................................................./////////////////////////

 public function user_dash(){

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
    //sch
    $sch = Auth()->user()->school;
    //sch ads fetch
    $sch_ad =ads::inRandomOrder()->where('school','=',$sch)->where('verification','=',1)
    ->select('id','banner','description','school','title','link')->take(3)->get();
    //all adverts
    $sch_ad_all =ads::inRandomOrder()->where('verification','=',1)
    ->select('id','banner','description','title','school','link')->take(3)->get();

    //dummies
    $postdrive = '';
    $addrive = '';
    $reqdrive = '';
    $msgdrive = '';
    $id = '';

        return view('users.dashboard')->with('total_p', $total_p)->with('total_s',$total_s)
        ->with('premium_ads',$premium_ads)->with('sch_ad', $sch_ad)->with('totalmailbox',$totalmailbox)
        ->with('unread',$unread)
        ->with('running',$running)
        ->with('sch_ad_all',$sch_ad_all)
        ->with('postdrive',$postdrive)
        ->with('addrive',$addrive)
        ->with('reqdrive',$reqdrive)
        ->with('msgdrive',$msgdrive)
        ->with('id',$id);
    }


 public function post(){
     //current user
    $user = Auth()->user()->id;
     //unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

        return view('users.post')->with('unread',$unread)
        ->with('running',$running);
    }

 public function manage(){
//current user
$user = Auth()->user()->id;
    //unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

      return view('users.manage')->with('unread',$unread)
      ->with('running',$running);
    }



 public function fav(){
     //current user
    $user = Auth()->user()->id;
     //unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

        return view('users.favourites')->with('unread',$unread)
        ->with('running',$running);
    }


 public function favad(){
     //current user
    $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

        return view('users.favourites_ad')->with('unread',$unread)
        ->with('running',$running);
    }







 public function ads(){
     //current user
    $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

        return view('users.ads')->with('unread',$unread)
        ->with('running',$running);
    }




//return view for new messages
 public function new_msg(){
     //current user
    $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

    $id=Auth()->user()->id;
    $new = messages::orderby('id','=','desc')->where('reply','=',Null)->where('master','=',$id)->paginate(6);  
   return view('users.new_message')->with('new',$new)->with('unread',$unread)
   ->with('running',$running);

    }


//return message feedbacks
 public function msg_feed(){
     //current user
    $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

     return view('users.feedback')->with('unread',$unread)
     ->with('running',$running);
    }






 public function payment(){
     //current user
    $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

    return view('users.payments')->with('unread',$unread)
    ->with('running',$running);
    }



 public function profile(){
     //current user
     $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

     $find = User::findorfail($user);
        return view('users.profile')->with('find', $find)->with('unread',$unread)
        ->with('running',$running);
    }




 public function req(){
     //current user
    $user = Auth()->user()->id;
//unread messages
    $unread = messages::where('master','=',$user)->where('reply','=',Null)->count('master');
    //running messages
    $running = messages::where('slave','=',$user)->where('reply','!=',Null)->count('master');

        return view('users.request')->with('unread',$unread)
        ->with('running',$running);
    }








    //....................report method---------------
 // validation rule
 protected $rulescom =
 [
         'comment' => 'required|string|max:255',
     
 ];

    public function report(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rulescom);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

           $me = Auth()->user()->id;
        $id = $request->input('id');
        $title = $request->input('title');

        $repoption = $request->input('repoption');
        $comment = $request->input('comment');

        $check = $request->input('check');

         $verify = report::where('user_id','=',$me)->where('idd','=',$id)->count();

        if($verify > 0){
            
            return response()->Json('You Already Repoted This Item');

        }else{

        
        //check if report is for a post #1 or report #2
        if($check == 1){

            $me = Auth()->user()->id;
            $save = new report;

            $save->idd = $id;
            $save->title = $title;
            $save->option = $repoption;
            $save->comment =$comment;
            $save->type = 1;
            $save->user_id = $me;

            $save->save();
            return response()->Json('Reported!');

        }else{
            
            $me = Auth()->user()->id;
            $save = new report;


            $save->idd = $id;
            $save->title = $title;
            $save->option = $repoption;
            $save->comment =$comment;
            $save->type = 2;
            $save->user_id = $me;

            $save->save();
            return response()->Json('Reported!');
        }//if check is post or ad //end

    }//verification

    }//vall if
    }//meth end


//....................report method---------------

//...........................return ajax pages.....................................//

    public function manage_post(){

        //send posts for management
       //auth id
       $logged=Auth()->user()->id;
  
       $post = posts::where('user_id', '=', $logged)
       ->select('id','title','price','user_id','verification','sold','category','description','status','image_1','image_2','image_3','image_4')
       ->orderBy('id','desc')->paginate(5);
          return view('users.ajax.manage')->with('post', $post);
  
         }//method end



         public function new_message(){

  $id=Auth()->user()->id;
   $new = messages::orderby('id','=','desc')->where('reply','=',Null)->where('master','=',$id)
   ->select('id','name','updated_at','title','created_at','message')->paginate(6);  
   return view('users.ajax.new_message')->with('new',$new);
        
            }


            //return message feedbacks
 public function feedback(){

    $id=Auth()->user()->id;
 $new = messages::orderby('id','=','desc')->where('reply','!=',Null)->where('slave','=',$id)
 ->select('id','seen','reply','updated_at','title','master')->paginate(6);

    return view('users.ajax.feedback')->with('new',$new);
   }


   public function req_ajax(){

    $idd = Auth()->user()->id;
    $reqs = requests::orderby('id','=','desc')->where('user_id','=',$idd)
    ->select('id','request','created_at')->paginate(3);

       return view('users.ajax.request')->with('reqs',$reqs);
   }


   public function fav_post(){
    $me = Auth()->user()->id;
   //post fav
    $fav_post = fav::orderby('id')->where('user_id','=',$me)
    ->select('id','pro_id','title','image_1')->paginate(6);
    
       return view('users.ajax.fav_post')->with('fav_post',$fav_post);
   }



   public function fav_ad(){
    $me = Auth()->user()->id;
   //ads fav
    $fav_ad = fav_ad::orderby('id')->where('user_id','=',$me)
    ->select('id','pro_id','banner')->paginate(6);
       return view('users.ajax.fav_ad')->with('fav_ad',$fav_ad);
   }


   public function gen_ad(){

    //show users their ad transactions
    //auth id
    $logged=Auth()->user()->id;

    $pay = ads::where('user_id','=',$logged)->orderby('id', 'desc')
    ->select('id','package','title','banner','verification','created_at','expiration')->paginate(6);
       return view('users.ajax.general_ad')->with('pay',$pay);
   }

   //...........................return ajax pages.....................................//
   
}//class end



