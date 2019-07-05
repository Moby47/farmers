<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\log;
use App\User;
use App\ads;
use App\question;
use App\report;
use App\requests;
use Image;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

//mailing
use Mail;
use App\Mail\approved;
use App\Mail\declined;
use App\Mail\expire;
use App\Mail\delete_approved_post;
use App\Mail\create_admin;
use App\Mail\approve_ad;
use App\Mail\decline_ad;
use App\Mail\reported_post;
use App\Mail\reported_ad;

//storage library
use Illuminate\Support\Facades\Storage;

class admincontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

/*Admin methods//////////////////////////////////////////////////////////////////
*/



///////////////custom methods///////////


 public function admin(){

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
    //reports
    $repo =report::orderby('id')->count();

     //pending requests
     $reqq=requests::where('validity','=', 0)->count();

     //total requests
     $total_req =requests::orderby('id')->where('validity','=',1)->count();
    
        return view('admins.dashboard')->with('tpost',$tpost)
        ->with('tads',$tads)->with('users',$users)->with('admins',$admins)
        ->with('sold',$sold)->with('faq',$faq)->with('adsum',$adsum)
        ->with('repo',$repo)->with('ppost',$ppost)->with('pads',$pads)
        ->with('reqq',$reqq)->with('total_req',$total_req);
    }

 public function man(){
        return view('admins.manage_posts');
    }

     public function add(){
        return view('admins.create_admin');
    }


    public function expired_ads(){
        return view('admins.expired');
    }

    public function man_ads(){
       
        return view('admins.manage_ads');
    }



        public function log(){
            //return view
        return view('admins.log');
    }

        public function settings(){
        return view('admins.settings');
    }



    public function reports(){
        //return view
    return view('admins.reports');
}



//method to approve post
   public function approve(Request $request){
       try{
           //get id of post to approve
        $id = $request->input('id');
        //find the post
         $app = posts::findorfail($id);
    

    //change verification to 1
    $app->increment('verification');

    $app->save();

//log action
 $title = $request->input('title');
  $number = $request->input('number');

$admin = Auth()->user()->name;
$intel = "Approved the Post ".$title." by a User, with Number ".$number;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
       }

catch(\Exception $e){
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }

   try{
        //email notification to user
   $userid =$request->input('userid');
   $usermail = User::where('id','=',$userid)->pluck('email');
   //load intel to session
   $title = $request->input('title');
   session(['titlex' => $title]);

   $url = 'http://www.dstreet.com.ng/buy-product/'.$id;
   
   session(['urlx' => $url]);

   Mail::to($usermail)->send(new approved());
   
  //email notification to user
   }
   catch(\Exception $e){
    return response()->Json('Post Approved! Without Notification to User');
   }

return response()->Json('Post Approved! Email notification sent!');
    }





//method to decline post
   public function decline(Request $request){

    try{
          //get id of post to decline
          $id = $request->input('id');
     
          //find the post
           $app = posts::findorfail($id);
      
     //change verification to 1
     $app->increment('verification',3);

      //log action
   $title = $request->input('title');
    $number = $request->input('number');
  
  $admin = Auth()->user()->name;
  $intel = "Declined the Post ".$title." by a User, with Number ".$number;
  
  //save
  $save = new log;
  
  $save->admin= $admin;
  $save->message= $intel;
  $save->save();
    }
     
 catch(\Exception $e){
        return response()->Json('Error! Verify Internet Connection And Try Again');
       }
try{
     //email notification to user
     $userid =$request->input('userid');
     $usermail = User::where('id','=',$userid)->pluck('email');
     //load intel to session
     $title = $request->input('title');
     session(['titlexx' => $title]);
  
     Mail::to($usermail)->send(new declined());
      //email notification to user
      
}
catch(\Exception $e){
    return response()->Json('Post Decline! Without Notification to User');
   }
return response()->Json('Post Declined. Email notification sent!');
    }






    //ad  validation rules
protected $rulesX =
[
    'Name' => 'required|string|max:255',
            'Email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'Number' => 'required|numeric|min:11',
            'School' => 'required|string|max:100',
];


//register a new admin
   public function new_admin(Request $request){


    $validator = Validator::make(Input::all(), $this->rulesX);
    if ($validator->fails()) {
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {

        try{
//save admin to DB
$add = new User;
$add->name = $request->input('Name');     
$add->number = $request->input('Number');     
$add->email = $request->input('Email');     
$add->school = $request->input('School');     
$add->password= bcrypt($request->input('password'));     
$add->verification = 1;
$add->status = 1;     

$usermail = $request->input('Email');
$pass = $request->input('password');
//mail
 //load intel to session
 session(['mail' => $usermail]);
 session(['pass' => $pass]);


//save admin
       $add->save();

       //log admin action
        $name = $request->input('Name');
     $number = $request->input('Number');

$admin = Auth()->user()->name;
$intel = "Created a New Admin, ".$name." ,with Number ".$number;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
        }


catch(\Exception $e){
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }

   try{
       
 Mail::to($usermail)->send(new create_admin());

   }
   catch(\Exception $e){
    return response()->Json('New Admin Created Without Notification to User');
   }

return response()->Json('New Admin Created');

    }//val end
       }//method end






//method to allow ad, after payment 
 public function allow(Request $request){

    try{
            //get requirements
       $id = $request->input('id');
       $title = $request->input('title');
       $pack = $request->input('pack');
     $userid = $request->input('userid');
       
       $allow = ads::findorfail($id);


//save after mail
$allow->increment('verification');
   $allow->save();

//log the action

$admin = Auth()->user()->name;
$intel = "Authorised the Ad, ".$title." ,for ".$pack;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
    }
    
catch(\Exception $e){
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }

   try{
        //mail
     $usermail = User::where('id','=',$userid)->pluck('email');
     $url ='http://www.dstreet.com.ng/buy-ad/'.$id;
//load intel to session
session(['title_ad' => $title]);
session(['url_ad' => $url]);

Mail::to($usermail)->send(new approve_ad());
//mail
   }
   catch(\Exception $e){
    return response()->Json('Ad Approved Without Notification to User');
   }

return  'Ad Approved';

    }//method end




    //del reported post.............................................................

    public function delpost(Request $request){
       
         $title = $request->input('title');
        $id = $request->input('id');
        $id2 = $request->input('id2');
        $userid = $request->input('userid');

        $del=posts::findorfail($id);
        $posterid = posts::where('title','=',$title)->pluck('user_id');
     
        $usermail = User::where('id','=',$posterid)->pluck('email');
       //if post exists
       if($del){
    try{
 

 //delete  rec from database
 $del->delete();

 //condition to prevent deleting noimage
          if($del->image_1 != 'noimage.jpg'){
              //delete image file
              Storage::delete('public/post_images/'.$del->image_1);
          }
           //condition to prevent deleting noimage
          if($del->image_2 != 'noimage.jpg'){
              //delete image file
              Storage::delete('public/post_images/'.$del->image_2);
          }
           //condition to prevent deleting noimage
          if($del->image_3 != 'noimage.jpg'){
              //delete image file
              Storage::delete('public/post_images/'.$del->image_3);
          }
           //condition to prevent deleting noimage
          if($del->image_4 != 'noimage.jpg'){
              //delete image file
              Storage::delete('public/post_images/'.$del->image_4);
          }
 


           //delete from reports
        $del2=report::findorfail($id2);
        //delete  rec from rep database
        $del2->delete();



            //log the action
 
 $admin = Auth()->user()->name;
 $intel = "Deleted The Reported Post, ".$title;
 
 //save
 $save = new log;
 
 $save->admin= $admin;
 $save->message= $intel;
 $save->save();
    }       
      
 
       

catch(\Exception $e){
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }

try{
     //mail
 //load intel to session
 session(['titlepost' => $title]);

 Mail::to($usermail)->send(new reported_post());
//mail
}
catch(\Exception $e){
    return response()->Json('Reported Post deleted Without Notification to User');
   }

   return response()->Json('Reported Post Deleted');

       }else{
      
        //delete from reports
        $del2=report::findorfail($id2);
        //delete  rec from rep database
        $del2->delete();

 
         return response()->Json('Post Deleted By User Already..Now Flushed From Reports');

       }
      //if post exists 
    
    }//meth end
//del reported post...........................................................











//..........................................................delete ad..................

public function delad(Request $request){
 

    $title = $request->input('title');
    //post table id
    $id = $request->input('id');
    //report table id
    $id2 = $request->input('id2');
    //ad user_id
    $userid = $request->input('userid');

   $del=ads::findorfail($id);
   $creatorid = ads::where('title','=',$title)->pluck('user_id');

     $usermail = User::where('id','=',$creatorid)->pluck('email');
   
   //if post exists
   if($del){

    try{

//delete  rec from database
$del->delete();

//condition to prevent deleting noimage
      if($del->banner != 'noimage.jpg'){
          //delete image file
          Storage::delete('public/ads_images/'.$del->banner);
      }


       //delete from reports
    $del2=report::findorfail($id2);
    //delete  rec from rep database
    $del2->delete();



        //log the action

$admin = Auth()->user()->name;
$intel = "Deleted The Reported Ad, ".$title;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
    }
        
    catch(\Exception $e){
        return response()->Json('Error! Verify Internet Connection And Try Again');
       }

       try{
            //mail
 //load intel to session
 session(['titleadx' => $title]);

 Mail::to($usermail)->send(new reported_ad());
//mail
       }

       catch(\Exception $e){
        return response()->Json('Ad deleted Without Notification to User');
       }

     return response()->Json('Ad Deleted');

   }else{
  
    //delete from reports
    $del2=report::findorfail($id2);
    //delete  rec from rep database
    $del2->delete();


     return response()->Json('Ad Deleted By User Already..Now Flushed From Reports');

   }
  //if post exists 



}//meth end



//delete ad..................











//method to disallow ad
 public function disallow(Request $request){
     try{
            //get requirements
        $id = $request->input('id');
        $title = $request->input('title');
        $pack = $request->input('pack');
        $userid = $request->input('userid');

        $allow = ads::findorfail($id);

       

        $allow->increment('verification',3);
        $allow->save();

//log the action

$admin = Auth()->user()->name;
$intel = "Rejected the Ad, ".$title." ,for ".$pack;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
     }

catch(\Exception $e){
    //return $e->getMessage();
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }

   try{
         //mail
    $usermail = User::where('id','=',$userid)->pluck('email');
    
    //load intel to session
    session(['title_ad_dec' => $title]);
    
    Mail::to($usermail)->send(new decline_ad());
    //mail
   }
   catch(\Exception $e){
    //return $e->getMessage();
    return response()->Json('Ad Declined Without Notification to User');
   }

return response()->Json('Ad Declined');

    }//method end





   //method to expire an ad
 public function expire(Request $request){ 

    try{
        $id = $request->input('id');
 $title = $request->input('title');

 $get = ads::findorfail($id);//get id


 $get->increment('verification',1);//use id
 $get->save();

  

 //log the action

$admin = Auth()->user()->name;
$intel = "Expired the Advert, ".$title;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
    }
    catch(\Exception $e){
        return response()->Json('Error! Verify Internet Connection And Try Again');
       }
 
try{
    //email notification to user
  $userid =$request->input('userid');
  $usermail = User::where('id','=',$userid)->pluck('email');
 //load intel to session
 session(['titlexxx' => $title]);

 Mail::to($usermail)->send(new expire());
//mail
}

catch(\Exception $e){
    return response()->Json('Ad Expired Without Notification to User');
   }

        return response()->Json('Ad Expired. Email notification sent!');


 }//meth end




//question 
public function question()
{
    return view('admins.question');
}





  //ad  validation rules
  protected $rules14 =
  [
    'Answer'=>'required|string|max:255',
  ];

//question 
public function ans(Request $request)
{

    $validator = Validator::make(Input::all(), $this->rules14);
    if ($validator->fails()) {
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {

    $id = $request->input('id');
    $question = $request->input('q');
     $ans = $request->input('Answer');

    $que = question::findorfail($id);

    $que->answer =$ans;
    $que->save();

    //log the action

$admin = Auth()->user()->name;
$intel = "Answered the Q, ".$question;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();

    return response()->Json('Answer provided');
  
}//val
}//meth


    public function custom()
    {
       
        return view('admins.custom_ads');
    }

 
    

         //ad  validation rules
protected $rules11 =
[
    'Banner' => 'required|image|max:1999',
    'Description'=> 'required|string|max:255',
];


    public function update(Request $request)
    {
      
        $validator = Validator::make(Input::all(), $this->rules11);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

             //.................compression algorithm...............//
try{

        if($request->hasfile('Banner')){
            //get filename with extension
            $filenamewithextension = $request->file('Banner')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('Banner')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
    
            //#original
            //Upload File
           // $request->file('Banner')->storeAs('public/ads_images_original', $filenametostore);
            //#resized
            $request->file('Banner')->storeAs('public/ads_images', $filenametostore);
    
            // #resized
            //Resize image here
            $thumbnailpath = public_path('/storage/ads_images/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 190, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
    
           // return redirect('images')->with('success', "Image uploaded successfully.");
           //return response()->Json('success!');
        }else{
            $filenametostore = 'noimage.jpg';
        }

        //.................compression algorithm...............//

            $desc = $request->input('Description');


 $id = $request->input('id');

 $send = ads::findorfail($id);

$send->banner=$filenametostore;
$send->description=$desc;
$send->verification = 1;

    }//try end

  catch(\Exception $e){
             
        return response()->Json('Error Occured! Please Try Again..');
    }
    
$send->save();

//log the action

$admin = Auth()->user()->name;
$intel = "Activated the custom Ad, ".$filenametostore;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();

return response()->json('success!');

        }//val if

    }//method end

    /** delete approved post
     * 
     * 
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    

   try{
       //
            $id = $request->input('id');
            $title = $request->input('title');
            $number = $request->input('number');

            $del=posts::findorfail($id);

        //email notification to user
        //user info
        $userid =$request->input('userid');
        $usermail = User::where('id','=',$userid)->pluck('email');
        
        //delete  rec from database
        $del->delete();
    //from storage
    //condition to prevent deleting noimage
    if($del->image_1 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_1);
    }
     //condition to prevent deleting noimage
    if($del->image_2 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_2);
    }
     //condition to prevent deleting noimage
    if($del->image_3 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_3);
    }
     //condition to prevent deleting noimage
    if($del->image_4 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_4);
    }

    

            //log the action
        $admin = Auth()->user()->name;
        $intel = "Deleted The Running Post, ".$title." With Number ".$number;

        //save
        $save = new log;

        $save->admin= $admin;
        $save->message= $intel;
        $save->save();
        
   }
   catch(\Exception $e){
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }
   

   try{
       //maill
         //report info
         $report = report::where('idd','=',$id)->pluck('option');
      
         //load intel to session
         session(['titlexxxx' => $title]);
         session(['reportx' => $report]);
         Mail::to($usermail)->send(new delete_approved_post()); 
         //mail
   }

   catch(\Exception $e){
    return response()->Json('Post Removed Without Notification to User');
   }
        return response()->Json('Post Removed!');
    }



//no need to email users on already declined posts, these 
//can be deleted freely

    public function remove_dec(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $number = $request->input('number');

        $del=posts::findorfail($id);
try{

       //condition to prevent deleting noimage
       if($del->image_1 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_1);
    }
     //condition to prevent deleting noimage
    if($del->image_2 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_2);
    }
     //condition to prevent deleting noimage
    if($del->image_3 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_3);
    }
     //condition to prevent deleting noimage
    if($del->image_4 != 'noimage.jpg'){
        //delete image file
        Storage::delete('public/post_images/'.$del->image_4);
    }

}

catch(\Exception $e){
    return response()->Json('Error! Refresh And Try Again');
   }
        //delete  rec from database
          $del->delete();

           //log the action

$admin = Auth()->user()->name;
$intel = "Deleted The Declined Post, ".$title." With Number ".$number;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();

        return response()->Json($id);
    }





    public function view()
    {
       $admins =User::where('status','=',1)->paginate(10);
                return view('admins.view_admins')->with('admins',$admins);
    }



    public function admin_view(Request $request)
    {
     return $id = $request->input('id');
    }


    public function approved_posts()
    {
     return view('admins.approved_posts');
    }



    public function declined_posts()
    {
     return view('admins.declined_posts');
    }





    //...................Ajax methods............................//


    public function ad_status(){

       
       //active ads to monitor exp date
      $expire = ads::orderby('id','desc')->where('verification','=',1)
       ->select('id','expiration','title','created_at','user_id')->take(3)->get();
   
           return view('admins.ajax.dashboard')->with('expire',$expire);
       }

//manage posts
       public function mp(){
        //get posts to act on
        $post = posts::orderby('id','=','desc')->where('verification','=',0)
        ->select('title','price','description','id','image_1','image_2','image_3','image_4','user_id','number')->paginate(4);
        //return manage view
           return view('admins.ajax.manage_post')->with('post',$post);
       }



//show approved posts
public function app()
{
    $post = posts::orderby('id','=','desc')->where('verification','=',1)
    ->select('id','title','price','description','image_1','image_2','image_3','image_4','user_id','number')->paginate(4);
 return view('admins.ajax.approved_post')->with('post',$post);
}






//show approved posts
public function dec()
{
    $post = posts::orderby('id','=','desc')->where('verification','=',3)
    ->select('id','title','price','description','image_1','image_2','image_3','image_4','user_id','number')->paginate(4);
 return view('admins.ajax.declined_post')->with('post',$post);
}


//search approved posts
public function searchapp(Request $request)
{
    $s =$request->input('search');

    $post = posts::orderby('id')->where('verification','=',1)
    ->select('id','title','price','description','image_1','image_2','image_3','image_4','user_id','number')
         ->where('title','LIKE','%'.$s.'%')->take(5)->get();
 return view('admins.ajax.search_approved_post')->with('post',$post);
}





//search declined posts
public function searchdec(Request $request)
{
    $s =$request->input('search');

    $post = posts::orderby('id')->where('verification','=',3)
    ->select('id','title','price','description','image_1','image_2','image_3','image_4','user_id','number')
         ->where('title','LIKE','%'.$s.'%')->take(5)->get();
 return view('admins.ajax.search_declined_post')->with('post',$post);
}




//show admin info
public function info(Request $request)
{
    $id = $request->input('id');
    $info = User::findorfail($id);
 return view('admins.ajax.admin_info')->with('info',$info);
}





//show general ads
public function general(Request $request)
{
     //get in active ads
     $pay = ads::orderby('id','=','desc')->where('verification','=',0)
     ->select('id','title','package','banner','expiration','created_at','user_id','link','description','phone','mail','amount','school')->paginate(4);
     //view
 return view('admins.ajax.manage_gen_ad')->with('pay',$pay);
}






public function cus_req()
{
   
    $custom = ads::orderby('id','desc')->where('verification','=',47)
    ->select('id','title','description','created_at')->paginate(4);
    return view('admins.ajax.custom_ad_req')->with('custom',$custom);
}




//question 
public function q()
{
    $question = question::orderby('id','desc')->where('answer','=', NULL)
    ->select('id','created_at','question')->paginate(4);
    return view('admins.ajax.question')->with('question',$question);
}



public function log_ajax(){
    //get logs
    $log = log::orderby('id','=','desc')->where('id','!=',Null)
    ->select('id','admin','message','created_at')->paginate(10);
    //return view
return view('admins.ajax.log_file')->with('log',$log);
}




//search log
public function searchlog(Request $request)
{
    $s =$request->input('search');

    $log = log::orderby('id')->where('admin','LIKE','%'.$s.'%')
         ->orwhere('message','LIKE','%'.$s.'%') ->select('id','admin','message','created_at')
         ->paginate(5)->appends('search', request('search'));

        
 return view('admins.ajax.log_search')->with('log',$log);
}



public function ex(){
    //monitor ads
$expire = ads::orderby('id','desc')->where('verification','=',1)
->select('id','expiration','title','created_at','user_id')->paginate(6);
    return view('admins.ajax.expire')->with('expire',$expire);
}






public function reppost_ajax(){

    $rep_post= report::orderby('id','=','desc')->where('type','=',1)
    ->select('id','idd','option','user_id','title','comment')->take(4)->get();
    //return view
return view('admins.ajax.rep_post')->with('rep_post', $rep_post);
}




public function repad_ajax(){

    $rep_post= report::orderby('id','=','desc')->where('type','=',2)
    ->select('id','idd','title','option','user_id','comment')->take(4)->get();
    //return view
return view('admins.ajax.rep_ad')->with('rep_post', $rep_post);
}


 //...................Ajax methods............................//















}//class end
