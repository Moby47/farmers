<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ads;
use App\posts;
use App\User;
use App\question;
use App\report;
use App\log;
use App\requests;
use App\project; 
use Image;

//mailing
use Mail;
use App\Mail\school_change;
use App\Mail\acc_activation;
use App\Mail\acc_deactivation;
use App\Mail\force_verify; 

class admin2controller extends Controller
{
    

     //admin dashboard counters................................

     
    public function post_count()
    {
          //total posts
     return $tpost = posts::orderby('id')->where('verification','=',1)->count();
    }

    public function p_post_count()
    {
          //pending posts
     return $ppost = posts::orderby('id')->where('verification','=',0)->count();
    }

    public function ad_count()
    {
         //running ads
    return $tads = ads::orderby('id')->where('verification','=',1)->count();
    }

    public function p_ad_count()
    {
         //pending ads
    return $pads = ads::orderby('id')->where('verification','=',0)->count();
    }

    public function user_count()
    {
         //total users
     return  $users = User::where('status','=',0)->where('verification','=',1)->count();
    }

    public function admin_count()
    {
           //total admins
    return  $admins = User::where('status','=',1)->where('verification','=',1)->count();
    }


    public function sold_count()
    {
           //total sold
           return $sold = posts::where('verification','=',2)->count();
    }

    public function ad_cash_count()
    {
           //sum of ad where not declined
            $adsum = ads::where('verification','=',1)->orwhere('verification','=',2)->sum('amount');
            return number_format($adsum);
    }

    public function question_count()
    {
          //faq count
          return $faq = question::where('answer','=',Null)->count();
    }

    public function report_count()
    {
           //reports
    return  $report = report::orderby('id')->count();
    }

    public function req_count()
    {
         //total requests
    return $total_req =requests::orderby('id')->where('validity','=',1)->count();
    }

    public function pending_req_count()
    {
          //pending requests
    return $reqq=requests::where('validity','=', 0)->count();
    }

    //admin dashboard counters................................


    public function show($id)
    {
//show reported ads
        $ads =  ads::findorfail($id);
       
        if($ads){
        
             //return view with post and auth id
             return view('advert')->with('ads',$ads); 
    
        }else{
            return redirect('/reports')->with('msg2','This Ad Has been Deleted By The User');
        }
           
    }

    
    //ignore reported post.............................................................

    public function ignorereppost(Request $request){
       
     
        $id2 = $request->input('id2');
           $title = $request->input('title');
   
        $del2=report::find($id2);
         //if post exists
         if($del2){
      try{
          //delete  rec from rep database
          $del2->delete();
   
              //log the action
   
   $admin = Auth()->user()->name;
   $intel = "Ignored The Reported Post, ".$title;
   
   //save
   $save = new log;
   
   $save->admin= $admin;
   $save->message= $intel;
   $save->save();
      }       
        
   
   catch(\Exception $e){
      return response()->Json('Error! Verify Internet Connection And Try Again');
     }
   
     return response()->Json('Report Ignored');
   
         }else{
        
           return response()->Json('Post Deleted By User Already..Please Flush From Reports');
   
         }
        //if post exists 
      
      }//meth end
   //ignore reported post...........................................................
   




   
// ignore reported ad

public function ignorerepad(Request $request){
 

    $title = $request->input('title');
    
    //report table id
    $id2 = $request->input('id2');

   $del=report::find($id2);
  
   //if post exists
   if($del){

    try{
       
    //delete  rec from rep database
    $del->delete();

        //log the action
$admin = Auth()->user()->name;
$intel = "Ignored The Reported Ad, ".$title;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
    }
        
    catch(\Exception $e){
        return response()->Json('Error! Verify Internet Connection And Try Again');
       }

     return response()->Json('Ad Ignored');

   }else{

     return response()->Json('Ad Deleted By User Already..Please Delete');

   }
  //if post exists 



}//meth end


//ignore reported ad







//return users page
public function users_page(){
    return view('admins.users');
    }
    //return users page
    
    
   //return users result
public function users_data(){
    //validated users rec
$users = User::orderby('id','desc')//->where('verification','=',1)
->select('id','name','email','number','school','last_name','status','state','verification','created_at')
->paginate(5);
    return view('admins.ajax.users_ajax')->with('users',$users);
    }
    
    //return user update
    public function update_user(Request $request){
        $id = $request->input('id');
         $sch = $request->input('School2');
    
         //use id to get res
           $userid = User::findorfail($id);
           //get user mail
           $mail = $userid->email;
           //update school
             $userid->school = $sch;
            $userid ->save();
    
            //log activity
    
    $admin = Auth()->user()->name;
    $intel = "Changed , ".$mail."'s School to ".$sch;
    
    //save log
    $save = new log;
    
    $save->admin= $admin;
    $save->message= $intel;
    $save->save();
    
            //mail
    //load intel to session
    session(['sch' => $sch]);
    try{
    
    Mail::to($mail)->send(new school_change());
    }
    
    catch(\Exception $e){
        return response()->Json('School Changed Without Email Notification');
       }
    
    
            return response()->Json('School Changed!');
    }
    
    
    
    //users search
    public function users_search(Request $request){
         $query = $request->input('search');
       //validated users rec
     $users = User::where('name','LIKE','%'.$query.'%')->where('verification','=',1)
    ->select('id','name','email','number','school','last_name','status','state','verification','created_at')
    ->take(5)->get();
        return view('admins.ajax.users_search')->with('users',$users);
    }
        
    
    
    
    //toggle useer activation state
    
    public function state(Request $request){
       $id =  $request->input('id');
       $state =   $request->input('state');
       $mail =  $request->input('mail');
    
      if($state == 'on'){
          //on
      $user = User::findorfail($id);
    
      $user->state = 1;
    
      $user->save();
    
       //log activity
    
    $admin = Auth()->user()->name;
    $intel = "Activated, ".$mail."'s Account";
    //save log
    $save = new log;
    $save->admin= $admin;
    $save->message= $intel;
    $save->save();
    
    
    //mail
    try{
    Mail::to($mail)->send(new acc_activation());
    }
    
    catch(\Exception $e){
        return response()->Json('Account Activated without Mail Notification');
       }
    
    
      return response()->Json('Account Activated!');
    
      }elseif($state == 'off'){
          //off
          $user = User::findorfail($id);
    
          $user->state = 0;
        
          $user->save();
    
            //log activity
    
    $admin = Auth()->user()->name;
    $intel = "Deactivated, ".$mail."'s Account";
    //save log
    $save = new log;
    $save->admin= $admin;
    $save->message= $intel;
    $save->save();
        
    //mail
    try{
        Mail::to($mail)->send(new acc_deactivation());
        }
        
        catch(\Exception $e){
            return response()->Json('Account Deactivated without Mail Notification');
           }
          return response()->Json('Account Temporarily Deactivated!');
        
      }//state check if end
    
    }//meth end
    



    //ad search 
public function admin_ad_search(Request $request){
    //get  ads
    $query = $request->input('search');

    $pay = ads::orderby('id','=','desc')->where('title','LIKE','%'.$query.'%')->where('verification','=',0)
    ->select('id','title','package','banner','expiration','created_at','user_id','link','description','phone','mail','amount','school')
    ->take(5)->get();
    //view
return view('admins.ajax.search_gen_ad')->with('pay',$pay);
}
//ad search



//method to restore post
public function restore(Request $request){
    try{
        //get id of post to approve
     $id = $request->input('id');
     //find the post
      $app = posts::findorfail($id);
 
 //change verification back to 0
 $app->verification = 0;

 $app->save();

//log action
$title = $request->input('title');
$number = $request->input('number');

$admin = Auth()->user()->name;
$intel = "Restored the Post ".$title." by a User, with Number ".$number;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();
    }

catch(\Exception $e){
 return response()->Json('Error! Verify Internet Connection And Try Again');
}

return response()->Json('Post Restored!');
 }




 

//load request page
public function manage_req(){
    return view('admins.request');
}



//load request data
public function request_data(){
    $req = requests::orderby('id','asc')->where('validity','=', 0)->select('id','number','school','request','created_at')->paginate(7);

    return view('admins.ajax.requests_ajax')->with('req',$req);
}


//allow or disallow request
public function validity(Request $request){
   $id = $request->input('id');
   $state = $request->input('state');
   $req = $request->input('req');

  if($state == 1){
      //allow //change val to 1
   $agree = requests::find($id);

   $agree->validity = 1;
   $agree->save();

   //log action //allow

$admin = Auth()->user()->name;
$intel = "Allowed the Request ".$req;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();

return response()->Json('Approved!');

  }elseif($state == 2){
      //disallow //change val to 2
      $disagree = requests::find($id);

   $disagree->validity = 2;
   $disagree->save();

   //log action //reject

$admin = Auth()->user()->name;
$intel = "Rejected the Request ".$req;

//save
$save = new log;

$save->admin= $admin;
$save->message= $intel;
$save->save();

return response()->Json('Declined!');
  }//if end
}//meth end
   



//verify user

public function verify_user(Request $request){

    $id = $request->input('id');
    $mail = $request->input('mail');
try{

$user = User::findorfail($id);

$user->verification= 1;
$user->save();

 //log action //allow

 $admin = Auth()->user()->name;
 $intel = "Force Verified the Account ".$mail;
 
 //save
 $save = new log;
 
 $save->admin= $admin;
 $save->message= $intel;
 $save->save();
}
catch(\Exception $e){
    return response()->Json('Error! Verify Internet Connection And Try Again');
   }
   //mail
   try{
    Mail::to($mail)->send(new force_verify());
    }
    
    catch(\Exception $e){
        return response()->Json('User Verified! without Mail Notification');
       }
//mail

    return response()->Json('User Verified!');

}



//load project page
public function project_page(){
    return view('admins.project');
}


//load project data
public function proj_data(){

$proj = project::orderby('id','desc')->where('state','=',0)
->select('id','name','number','course','dept','summary','created_at')->paginate(6);

    return view('admins.ajax.projects_ajax')->with('proj',$proj);
}


//project approve or decline
public function project_validity(Request $request){
   

    $id = $request->input('id');
    $state = $request->input('state');
    $name = $request->input('name');
 
   if($state == 1){
       //allow //change val to 1
    $agree = project::find($id);
 
    $agree->state = 1;
    $agree->save();
 
    //log action //allow
 
 $admin = Auth()->user()->name;
 $intel = "Allowed the Project by ".$name;
 
 //save
 $save = new log;
 
 $save->admin= $admin;
 $save->message= $intel;
 $save->save();
 
 return response()->Json('Approved!');
 
   }elseif($state == 2){
       //disallow //change val to 2
       $disagree = project::find($id);
 
    $disagree->state = 47;
    $disagree->save();
 
    //log action //reject
 
 $admin = Auth()->user()->name;
 $intel = "Declined the project by ".$name;
 
 //save
 $save = new log;
 
 $save->admin= $admin;
 $save->message= $intel;
 $save->save();
 
 return response()->Json('Declined!');
   }//if end


}



public function post(){
    return view('admins.post');
}





 //method to store post
 public function force_post(Request $request)
 {
 
     try{

     //handle file uploads   #1

    //.................compression algorithm...............//

    if($request->hasfile('First_Image')){
     //get filename with extension
     $filenamewithextension = $request->file('First_Image')->getClientOriginalName();

     //get filename without extension
     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

     //get file extension
     $extension = $request->file('First_Image')->getClientOriginalExtension();

     //filename to store
     $filenametostore = $filename.'_'.time().'.'.$extension;

     //#original
         //Upload File
        // $request->file('First_Image')->storeAs('public/post_images_original', $filenametostore);
         //#resized
         $request->file('First_Image')->storeAs('public/post_images', $filenametostore);
 
         // #resized
         //Resize image here
         $thumbnailpath = public_path('/storage/post_images/'.$filenametostore);
         $img = Image::make($thumbnailpath)->resize(650, 440, function($constraint) {
         $constraint->aspectRatio();
     });
     $img->save($thumbnailpath);

    // return redirect('images')->with('success', "Image uploaded successfully.");
   // return response()->Json('success!');
 }else{
     $filenametostore = 'noimage.jpg';
 }

 //.................compression algorithm...............//


 //handle file uploads   #2

    //.................compression algorithm...............//

    if($request->hasfile('Second_Image')){
     //get filename with extension
     $filenamewithextension = $request->file('Second_Image')->getClientOriginalName();

     //get filename without extension
     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

     //get file extension
     $extension = $request->file('Second_Image')->getClientOriginalExtension();

     //filename to store
     $filenametostore2 = $filename.'_'.time().'.'.$extension;

     //#original
         //Upload File
        // $request->file('First_Image')->storeAs('public/post_images_original', $filenametostore);
         //#resized
         $request->file('Second_Image')->storeAs('public/post_images', $filenametostore2);
 
         // #resized
         //Resize image here
         $thumbnailpath = public_path('/storage/post_images/'.$filenametostore2);
         $img = Image::make($thumbnailpath)->resize(650, 440, function($constraint) {
         $constraint->aspectRatio();
     });
     $img->save($thumbnailpath);

    // return redirect('images')->with('success', "Image uploaded successfully.");
   // return response()->Json('success!');
 }else{
     $filenametostore2 = 'noimage.jpg';
 }

 //.................compression algorithm...............//


 //handle file uploads   #3

    //.................compression algorithm...............//

    if($request->hasfile('Third_Image')){
     //get filename with extension
     $filenamewithextension = $request->file('Third_Image')->getClientOriginalName();

     //get filename without extension
     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

     //get file extension
     $extension = $request->file('Third_Image')->getClientOriginalExtension();

     //filename to store
     $filenametostore3 = $filename.'_'.time().'.'.$extension;

     //#original
         //Upload File
        // $request->file('First_Image')->storeAs('public/post_images_original', $filenametostore);
         //#resized
         $request->file('Third_Image')->storeAs('public/post_images', $filenametostore3);
 
         // #resized
         //Resize image here
         $thumbnailpath = public_path('/storage/post_images/'.$filenametostore3);
         $img = Image::make($thumbnailpath)->resize(650, 440, function($constraint) {
         $constraint->aspectRatio();
     });
     $img->save($thumbnailpath);

    // return redirect('images')->with('success', "Image uploaded successfully.");
   // return response()->Json('success!');
 }else{
     $filenametostore3 = 'noimage.jpg';
 }

 //.................compression algorithm...............//


     
     $filenametostore4 = 'noimage.jpg';
     $title = $request->input('Title');
     $stat = $request->input('Status');
     $cat = $request->input('Category');
     $price = $request->input('Price');
     $des = $request->input('Description');
     $school = $request->input('School');
     $number = $request->input('Number');
      /*   if($cat == 'Swap-Items'){
             $price = 0;
         }else{
             
         }
         */
        
         $send= new posts;

         $send->title=$title;
         $send->price=$price;
         $send->status=$stat;
         $send->category=$cat;
         $send->description=$des;
         $send->image_1=$filenametostore;
         $send->image_2=$filenametostore2;
          $send->image_3=$filenametostore3;
           $send->image_4=$filenametostore4;
           $send->user_id=5000;
           $send->school=$school;
           $send->number=$number;
           $send->verification=1;
           $send->sold=5;

         $send->save();

         
     }

     catch(\Exception $e){
        return redirect('/admin-post')->with('say','Error!...');
     }

   
         return redirect('/admin-post')->with('say','Post Created!...');

 }//method end




 public function mail(){

     //get posts for index page
     $post = posts::inRandomOrder()->where('verification','=',1)
     ->select('id','title','price','image_1','school')
     ->take(9)->get();
      
    return view('admins.mailing')->with('post',$post);
 }
 

}//class end
