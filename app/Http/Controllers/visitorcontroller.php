<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\question;
use App\reviews;
use App\ads;
use App\User;
use App\fav;
use App\fav_ad;
use App\messages;
use Illuminate\Support\Facades\Auth;
use App\report;
use App\requests;
use DB;
use Illuminate\Support\Str;

//mail
use Mail;
use App\Mail\resend_verify;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class visitorcontroller extends Controller
{


    

     //help form validation rules
    protected $rules =
    [
        'Message' => 'required|string|max:255',
            'Email' => 'required|string|email|max:100',
        
    ];

    public function create(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
    if ($validator->fails()) {
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {

        $ask = $request->input('Message');
        $mail = $request->input('Email');

        $go = new question;

        $go->question=$ask;
        $go->email=$mail;
        $go->save();

        return response()->json('<a href="/help"> View FAQ</a>');
        //  return redirect('/help')->with('success','Question Sent, Answer coming soon');
    }//if end
    }//method end

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function almost()
    {
        //retrieve data fro session
        $name = session('name');
        //redirect unauthorised
        if(!empty($name)){
            //retrieve data fro session
         $name = session('name');
        $mail = session('mail');

        return view('auth.register2')->with('name',$name)->with('mail',$mail);
        }else{
            return redirect('/login');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a page of a single product
        if(ctype_digit($id)){
            //passed id, ignore
        }else{
            //passed title, rearrange title, fetch id
           $decoded = str_replace('-',' ',$id);

          $id = posts::where('title','=',$decoded)->pluck('id')->first();
        }

       
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);

 $post =  posts::findorfail($id);

  //meta tag 
 $meta = $post->title;

 //get seller details
$locator= $post->user_id;
 $name = User::findorfail($locator);
 $seller = $name ->name;
 //get seller details

  //get seller other posts //more records to be loaded to the page
  $userid =$name->id;
  $school = $post->school;
  $personal = posts::orderby('id','desc')->where('user_id','=',$userid)->where('verification','=',1)
  ->where('id','!=',$id)->select('id','title','image_1','school','created_at')->take(3)->get();
  $related = posts::orderby('id','desc')->where('school','Like','%'.$school.'%')->where('verification','=',1)
  ->where('id','!=',$id)->select('id','title','image_1','school','created_at')->take(3)->get();
 //get seller other posts //more records to be loaded to the page



 //////////////////if the user is logged in
 if(Auth::check()){
     //get user id
    $auth = Auth()->user()->id;

//find post based on the Id for display
$post =  posts::findorfail($id);

if($post){

 //if user or admin
$who = Auth()->user()->status;

 if($who == 1){ /////////////is admin

//check if sold or not verified
if($post->verification == 2){

return redirect('/reports')->with('msg','Post Was marked as Sold, Please Delete.');

}elseif($post->verification == 1){

//return single view with post and auth id

return view('single')->with('post',$post)->with('auth',$auth)
->with('seller',$seller)->with('personal',$personal)->with('related',$related)->with('ua',$ua)
->with('locator',$locator)->with('meta',$meta);

}elseif($post->verification == 0){

//return report view with post not verified
$url = '<a href="/admin-manage-post">Act Now</a>';
return redirect('/reports')->with('msg','Post Unverified, '.$url);
}

 }else{////////////////is a user

//find the post based on id for view count
$count =  posts::findorfail($id);

if($post->verification == 2){
//sold
return redirect('/items-to-buy-around-campus')->with('sold','Sorry, Item Was Sold');

}elseif($post->verification == 1){
//increment view count column
$count->increment('sold');

//return view with post and auth id
return view('single')->with('post',$post)->with('auth',$auth)
->with('seller',$seller)->with('personal',$personal)->with('related',$related)->with('ua',$ua)
->with('locator',$locator)->with('meta',$meta);

}elseif($post->verification == 0){
//unverified
return redirect('/items-to-buy-around-campus')->with('unveri', 'Unathorised Post, Will Be Removed Shortly');
}  
 }

}else{
  //not found
   //if user or admin 

$who = Auth()->user()->status;

 if($who == 1){ //is admin

     return redirect('/reports')->with('msg','Post Was Deleted By User, Please Delete From Reports.');
 }
 return redirect('/items-to-buy-around-campus')->with('none', 'Post Not Found, Will Be Cleared Shortly');
}




 }else{/////////////////////not logged in



 /////////////////////not logged in

$post =  posts::findorfail($id);

$locator= $post->user_id;

$name = User::findorfail($locator);
$seller = $name ->name;

if($post){

 $count =  posts::findorfail($id);

 $count->increment('sold');

 if($post->verification != 1){
     //sold or unverified
     return redirect('/items-to-buy-around-campus')->with('unveri', 'Unathorised Post, Will Be Removed Shortly');
  }else{
      
     return view('single')->with('post',$post)->with('seller',$seller)
     ->with('personal',$personal)->with('related',$related)->with('ua',$ua)->with('locator',$locator)
     ->with('meta',$meta);
  }

}else{
  //not found at all

 return redirect('/items-to-buy-around-campus')->with('none', 'Post Not Found, Will Be Cleared Shortly');
}



 }//if end
         
    }//meth end

  





    protected $rules5 =
    [
        'Message'=>'required|string|max:255',
    ];

    public function update(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules5);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            try{
        $message =$request->input('Message');
        //from system
         $title = $request->input('title');
        $name = $request->input('name');
        $master = $request->input('master');
        $slave = $request->input('slave');
      
        $done = new messages;

        $done->message = $message;
        $done->title = $title;
        $done->name =$name;
        $done->master =$master;
        $done->slave =$slave;
            }
            catch(\Exception $e){
                return response()->json('Error! Message not sent, Refresh Page and Try Again');
            
           }//catch end

        $done->save();

        return response()->json('Sent');
        }
    }





    protected $rules13 =
    [
        'Message'=>'required|string|max:255',
    ];

public function msg(Request $request){
    $validator = Validator::make(Input::all(), $this->rules13);
    if ($validator->fails()) {
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {
    $message =$request->input('Message');
    //from system
     $title = $request->input('title');
    $name = $request->input('name');
    $master = $request->input('master');
    $slave = $request->input('slave');
  
    $done = new messages;

    $done->message = $message;
    $done->title = $title;
    $done->name =$name;
    $done->master =$master;
    $done->slave =$slave;
    

    $done->save();

    return response()->json('Sent');
    }
}









//feedback validation rules
    protected $rules2 =
    [
        'Email' => 'required|string|email|max:100',
            'Review' => 'required|string|max:255',
        
    ];

  public function feedback(Request $request)
    {
       
 $validator = Validator::make(Input::all(), $this->rules2);
    if ($validator->fails()) {
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {


        $mail = $request->input('Email');
        $msg = $request->input('Review');

        $store = new reviews;

        $store->email=$mail;
        $store->message=$msg;

        $store->save();

        return response()->json($msg);
    }//if validator end
    }








//meth to mark as fav


    public function fav(Request $request)
    {
                //pro id
                $id = $request->input('id');
                //my id
                $mine = Auth()->user()->id;
           //check if user id has pro id
            $cc =fav::where('user_id','=',$mine)->where('pro_id','=',$id)->first();
   //if user id has pro id
   if(count($cc)>0){
       return response()->json(1);
   }else{
           //my id
           $mine = Auth()->user()->id;
           //product id
           $id = $request->input('id');
           $title = $request->input('title');
           $img1 = $request->input('img1');
         
   
           $new = new fav;
   
           $new->user_id=$mine;
           $new->pro_id=$id;
           $new->title=$title;
           $new->image_1=$img1;
   
           $new->save();
   
       return response()->json(2); 
   }//if end

        
    }//meth end






//meth to mark as fav

    public function fav_ad(Request $request)
    {
         //pro id
         $id = $request->input('id');
         //my id
         $mine = Auth()->user()->id;
    //check if user id has pro id
     $cc =fav_ad::where('user_id','=',$mine)->where('pro_id','=',$id)->first();
//if user id has pro id
if(count($cc)>0){
return response()->json(1); 
}else{

           //my id
        $mine = Auth()->user()->id;
        //product id
        $id = $request->input('id');
        $banner = $request->input('banner');

        $new = new fav_ad;

        $new->user_id=$mine;
        $new->pro_id=$id;
        $new->banner=$banner;
         
        

        $new->save();

        return response()->json(2);
}//end of if
    }//method end













     //........................................ajax method..............................................//



 //search by school

 public function filter(Request $request){


    $s =$request->input('School');

    

    if(Auth::check()){

        $mine = Auth()->user()->school;
          //ads
          $advert=ads::inRandomOrder()->where('verification', '=', 1)
          ->select('id','banner','phone','title','link')
          ->where('school','=',$mine)->take(4)->get();

          //incase
          if(count($advert) < 1){
            //ads
       $advert=ads::inRandomOrder()->where('verification', '=', 1)
       ->select('id','banner','phone','title','link')->take(4)->get();
      }
          //post
           $post =posts::orderby('id')->where('verification','=',1)
           ->where('school','LIKE','%'.$s.'%')
           ->select('id','title','image_1','price','user_id','category','number','school','created_at')
           ->paginate(6)->appends('School', request('School'));
           //count result
            $count =posts::orderby('id')->where('verification','=',1)
            ->where('school','LIKE','%'.$s.'%')->count();
          
           //return page
           return view('ajax.school_result')->with('advert',$advert)
           ->with('post',$post)->with('count',$count)->with('s',$s);
    }else{

          //ads
          $advert=ads::inRandomOrder()->where('verification', '=', 1)
          ->select('id','banner','phone','title','link')->take(4)->get();
          //post
           $post =posts::orderby('id')->where('verification','=',1)
           ->where('school','LIKE','%'.$s.'%')
           ->select('id','title','image_1','price','category','number','school','created_at')
           ->paginate(6)->appends('School', request('School'));
           //count result
            $count =posts::orderby('id')->where('verification','=',1)
            ->where('school','LIKE','%'.$s.'%')->count();
          
           //return page
           return view('ajax.school_result')->with('advert',$advert)
           ->with('post',$post)->with('count',$count)->with('s',$s);
    }
  
      
      }//meth end

//........................sch search 






//........................cat search 


      public function find_cat(Request $request)
      {
  
  
      $cat = $request->input('Category');
  
      if(Auth::check()){
          $mysch = Auth()->user()->school;
  
          //ads
          $advert=ads::inRandomOrder()->where('verification', '=', 1)
          ->select('id','banner','phone','title','link')
          ->where('school','=',$mysch)->take(4)->get();

          //incase
          if(count($advert) < 1){
            //ads
       $advert=ads::inRandomOrder()->where('verification', '=', 1)
       ->select('id','banner','phone','title','link')->take(4)->get();
      }

          //post
           $post =posts::orderby('id')->where('category','LIKE','%'.$cat.'%')
           ->select('id','title','image_1','user_id','price','category','number','school','created_at')
           ->where('verification','=',1)
           ->paginate(6)->appends('Category', request('Category'));
          //count
          $count =posts::orderby('id')->where('category','LIKE','%'.$cat.'%')->where('verification','=',1)
          ->count();
          
           //return page
           return view('ajax.category_result')->with('advert',$advert)->with('post',$post)
           ->with('count',$count)->with('cat',$cat);
        }else{
  
          //ads
          $advert=ads::inRandomOrder()->where('verification', '=', 1)
          ->select('id','banner','phone','title','link')->take(4)->get();
          //post
           $post =posts::orderby('id')->where('category','LIKE','%'.$cat.'%')
           ->where('verification','=',1)->select('id','title','price','image_1','category','number','school','created_at')
           ->paginate(6)->appends('Category', request('Category'));
          //count
          $count =posts::orderby('id')->where('category','LIKE','%'.$cat.'%')->where('verification','=',1)
          ->count();
          
           //return page
           return view('ajax.category_result')->with('advert',$advert)->with('post',$post)
           ->with('count',$count)->with('cat',$cat);
  
      }
           
      
  
  
  
      }//meth end

   //........................cat search 
      






//........................custom search 

      public function find_sch(Request $request)
{
  
  
$word = $request->input('Search');

     //ads
    $advert=ads::inRandomOrder()->where('verification', '=', 1)
    ->select('id','banner','phone','title','link')->take(4)->get();
    //post
 $post =posts::orderby('id')->where('verification','=',1)->select('id','image_1','user_id','title','price','category','number','school','created_at')
 ->where('title','LIKE','%'.$word.'%')->orwhere('description','LIKE','%'.$word.'%')->where('verification', '=', 1)->paginate(6)
 ->appends('Search', request('Search'));

  $count=posts::orderby('id')->where('verification','=',1)->select('id','image_1','user_id','title','price','category','number','school','created_at')
  ->where('title','LIKE','%'.$word.'%')->orwhere('description','LIKE','%'.$word.'%')->where('verification', '=', 1)->count();
 
  
     //return page
     return view('ajax.search_result')->with('advert',$advert)->with('post',$post)
     ->with('count',$count)->with('word',$word);


}//meth end
//........................custom search 







//only sch search

public function only_sch(Request $request){

$mysch = Auth()->user()->school;

$word = $request->input('Search');

//ads
$advert=ads::inRandomOrder()->where('verification', '=', 1)
->select('id','banner','phone','title','link')
->where('school','=',$mysch)->take(4)->get();

if(count($advert) < 1){
    //ads
$advert=ads::inRandomOrder()->where('verification', '=', 1)
->select('id','banner','phone','title','link')->take(4)->get();
}
//post
$post =posts::orderby('id')->where('verification','=',1)
->select('id','image_1','title','price','user_id','category','number','school','created_at')
->where('title','LIKE','%'.$word.'%')->where('school','=',$mysch)
->orwhere('description','LIKE','%'.$word.'%')->where('verification', '=', 1)->where('school','=',$mysch)
->paginate(6)
->appends('Search', request('Search'));


$count=posts::orderby('id')->where('verification','=',1)
->select('id','image_1','title','price','user_id','category','number','school','created_at')
->where('title','LIKE','%'.$word.'%')->where('school','=',$mysch)
->orwhere('description','LIKE','%'.$word.'%')->where('verification', '=', 1)->where('school','=',$mysch)->count();


//return page
return view('ajax.search_result')->with('advert',$advert)->with('post',$post)
->with('count',$count)->with('word',$word);
}//meth end



           //......................ajax method..................................................//


          //--site search -->

public function site_search(Request $request){

    $query =  $request->input('Search');

    //post
    $result = posts::orderby('id','desc')->where('verification', '=', 1)->select('id','image_1','title','price','school')
    ->where('title','LIKE','%'.$query.'%')->orwhere('description','LIKE','%'.$query.'%')->where('verification', '=', 1)->paginate(5)
    ->appends('Search', request('Search'));

    //ads
    if(Auth::check()){
        //if auth
        $mine = Auth::user()->school;
        $query =  $request->input('Search');
        //check in my sch by query
       $ad =ads::inRandomOrder()->where('verification', '=', 1)->where('title','LIKE','%'.$query.'%')
       ->select('id','banner','title','link','school','phone','mail')
        ->where('school','=',$mine )->take(4)->get();
        //check allover by query
        if(count($ad) < 1){
            //ads
       $ad=ads::inRandomOrder()->where('verification', '=', 1)->where('title','LIKE','%'.$query.'%')
       ->select('id','banner','title','link','school','phone','mail')->take(4)->get();
      }
      //check allover no query
      if(count($ad) < 1){
        //ads
        $ad=ads::inRandomOrder()->where('verification', '=', 1)
        ->select('id','banner','title','link','school','phone','mail')->take(4)->get();
        }

    }else{
        //if not Auth
        $query =  $request->input('Search');
        //check allover by query
        $ad =ads::inRandomOrder()->where('verification', '=', 1)->where('title','LIKE','%'.$query.'%')
        ->select('id','banner','title','link','school','phone','mail')->take(4)->get();
        //check allover no query
      if(count($ad) < 1){
        //ads
        $ad=ads::inRandomOrder()->where('verification', '=', 1)
        ->select('id','banner','title','link','school','phone','mail')->take(4)->get();
        }
    }
  
//counts
    $mobile = posts::where('verification','=',1)->where('category','=','Mobile-phone-tablet')->count();
    $elec = posts::where('verification','=',1)->where('category','=','Electronics-Appliances')->count();
    $book = posts::where('verification','=',1)->where('category','=','Books-Sports-Hobbies')->count();
    $fashion = posts::where('verification','=',1)->where('category','=','Fashion')->count();
    $comp = posts::where('verification','=',1)->where('category','=','Computers-Accessories')->count();
    $serv = posts::where('verification','=',1)->where('category','=','Services')->count();
    $house = posts::where('verification','=',1)->where('category','=','Lodging-Accomodations')->count();
    $swap = posts::where('verification','=',1)->where('category','=','Swap-Items')->count();
    $fun = posts::where('verification','=',1)->where('category','=','Furniture')->count();
    $pet = posts::where('verification','=',1)->where('category','=','Pets')->count();
    $cos = posts::where('verification','=',1)->where('category','=','Cosmetics-Beauty')->count();
    $curr = posts::where('verification','=',1)->where('category','=','Cryptocurrency')->count();// 
    $others = posts::where('verification','=',1)->where('category','=','Others')->count();

     return view('ajax.search-site-ajax')->with('result', $result)->with('ad',$ad)
     ->with('mobile',$mobile)
     ->with('elec',$elec)
     ->with('book',$book)
     ->with('fashion',$fashion)
     ->with('comp',$comp)
     ->with('serv',$serv)
     ->with('house',$house)
     ->with('swap',$swap)
     ->with('fun',$fun)
     ->with('pet',$pet)
     ->with('cos',$cos)
     ->with('curr',$curr)// 
     ->with('others',$others);

}

//--site search -->



//ad search for public
public function pub_search_ads(Request $request){

    $query = $request->input('ad_search');
    if( $query){

        $all_ads = ads::where('verification','=','1')->select('id','banner','school','views','created_at','title')
        ->where('title','LIKE','%'.$query.'%')->orwhere('description','LIKE','%'.$query.'%')->where('verification', '=', 1)
        ->paginate(9)->appends('ad_search', request('ad_search'));
     
        return view('all_ads_search')->with('all_ads',$all_ads)->with('query',$query);
    }else{

        $all_ads = ads::where('verification','=','1')->select('id','banner','school','views','created_at','title')
        ->paginate(9);
        return redirect('/all-student-adverts')->with('all_ads',$all_ads)->with('emp','Please Insert a Word to Find on Dstreet');
    }
  

}//meth end




//search_mysch_ads only
public function search_mysch_ads(Request $request){

$query = $request->input('school_ad_search');
$sch = $request->input('sch');

if($query){
//word found
$all_ads = ads::where('verification','=','1')->select('id','title','banner','school','views','created_at')
->where('title','LIKE','%'.$query.'%')->where('school','=',$sch)
->orwhere('description','LIKE','%'.$query.'%')->where('verification', '=', 1)->where('school','=',$sch)
->paginate(9)
->appends(request()->all());


return view('sch_ads_search')->with('all_ads',$all_ads)->with('query',$query);

}else{
    //no word, redirect
    $sch = $request->input('sch');

    $all_ads = ads::where('verification','=','1')
    ->where('school','=',$sch)->select('id','title','banner','school','views','created_at')->paginate(9);
    
    return back()->with('all_ads',$all_ads)->with('emp','Please Insert a Word to Find on Dstreet');
}

}//meth end
//search_mysch_ads only



public function auto_complete(Request $request){
 $it =$request->term;
  return  $auto = posts::where('verification','=','1')->select('title')
  ->where('title','LIKE','%'.$it.'%')->pluck('title')->take(7);
    
}



public function search_req(Request $request){
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
     $word = $request->input('search');

     if($word){
  $req =requests::where('validity','=', 1)->select('request','school','created_at','number')
  ->where('request','LIKE','%'.$word.'%')->orwhere('school','LIKE','%'.$word.'%')->where('validity', '=', 1)
     ->paginate(6)->appends('search', request('search'));

         return view('req')->with('req',$req)->with('ua',$ua); 

     }else{
        return redirect('/view-requests')->with('em', 'Enter a word to Search'); 
     }

}//meth end



//resend verification email
public function resendemail(){
    return view('auth.resend_verify');
}

//resend verification email
public function resend(Request $request){
    $this->validate($request, [
        'email' => 'required|string|email|max:100',
    ]);

     $email = $request->input('email');

   $check =User::where('email','=',$email)
  ->where('verification','=',0)->select('id','verifytoken')->first();
if(count($check) >0){

    //wasnt verified..do that
    $code = Str::random(40);
  $id =User::where('email','=',$email)
  ->where('verification','=',0)->select('id','verifytoken')->pluck('id')->first();

 $thisuser = User::findorfail($id);
 $thisuser->verifytoken = $code;
    $thisuser->save();

    //load intel to session

 session(['vcode' => $code]);
 session(['vusermail' => $email]);

 try{
    Mail::to($email)->send(new resend_verify());
 }
 catch(\Exception $e){

    return redirect('/resend-verify')->with('latest','Error! Verification Mail not Sent, Try Again');
}//catch end

return redirect('/resend-verify')->with('good','Verification Mail Resent! Please Check your Email');

}else{
    //no rec meaning user hasnt reg or has benn verified
    return redirect('/resend-verify')
    ->with('latest', 'Email Not Registered Or Already Verified');
}//if check end

}//method end


}//class end
