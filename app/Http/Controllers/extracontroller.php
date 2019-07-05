<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ads;
use App\project;
use App\posts;
use App\promo;

//mail
//mail
use Mail;
use App\Mail\notifyproject;

//for ajax error returns
use Validator;
use Response;
use View;
use Cache;
use Illuminate\Support\Facades\Input;

class extracontroller extends Controller
{
    //load project page
    public function page(){
      
         // ads 
//if login: check in sch else general
//if not auth: general
if(Auth()->check()){
    //auth
    $sch = Auth()->user()->school;
    $more = ads::inRandomOrder()->where('verification','=',1)->where('school','=',$sch)
    ->select('id','title','banner','school','description')
    ->take(6)->get();
    //if none, use deault
    if(count($more)<1){
        $more = ads::inRandomOrder()->where('verification','=',1)
        ->select('id','title','banner','school','description')
        ->take(6)->get();
    }
    
    }else{
        $more = ads::inRandomOrder()->where('verification','=',1)
        ->select('id','title','banner','school','description')
        ->take(6)->get();
    }

    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);

   return view('project')->with('more',$more)->with('ua',$ua);
    }



    //request project
   //post validation rules
   protected $rules47 =
   [
       'Name'=> 'required|string|max:30',
           'Number'=> 'required|numeric|min:11',
           'Course'=> 'required|string|max:100',
           'Department'=> 'required|string|max:100',
           'Description'=> 'required|string|max:255',
            'School' => 'required|string|max:100',
           
   ];

public function req(Request $request){

 $validator = Validator::make(Input::all(), $this->rules47);
    if ($validator->fails()) {
        //errors
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {

        //no errors
    try{

        $name = $request->input('Name');
        $num =$request->input('Number');
       $course =$request->input('Course');  
       $dept =$request->input('Department');
       $sch =$request->input('School'); 
       $des=$request->input('Description');
         $check =$request->input('check');

       $new = new project;

       $new->name =$name;
       $new->number=$num;
       $new->course=$course;
       $new->dept=$dept;
       $new->school=$sch;
       $new->summary=$des;
        //1 is requested 2 is provided
       $new->type=$check;
        //0 is unapproved 1 is approved
       $new->state= 0;

       $new->save();

       //notify admin of project approval
       try{
        Mail::to('henryonyemaobi@gmail.com')->send(new notifyproject());  
       }
       catch(\Exception $e){
        return response()->json('Request made! It Will be on DStreet Shortly....');
    }

       return response()->Json('Request made! It Will be on DStreet Shortly.');
    }

    catch(\Exception $e){
        return response()->Json('Error! Verify Internet Connection And Try Again');
       }
     


    }//if end

}//method end




//requested project initial load, sch select, search

public function reqed_proj(Request $request){
   //if search
   $search =$request->input('Search');
   $sch=$request->input('School');
   $ua = strtolower($_SERVER['HTTP_USER_AGENT']);

   if($sch){
    $reqed = project::orderby('id','desc')->where('type','=',1)->where('state','=',1)->where('school','=',$sch)
    ->select('id','name','number','course','dept','school','summary','created_at')->paginate(6)
    ->appends('School', request('School'));
    return view('ajax.project_requested_school')->with('reqed',$reqed)->with('ua',$ua); 
   }

   if($search){
    $reqed = project::orderby('id','desc')->where('type','=',1)->where('state','=',1)->where('summary','LIKE','%'.$search.'%')
    ->select('id','name','number','course','dept','school','summary','created_at')->paginate(6)
    ->appends('Search', request('Search'));
    return view('ajax.project_requested_search')->with('reqed',$reqed)->with('ua',$ua);
   }

    //initial load
   $reqed = project::orderby('id','desc')->where('type','=',1)->where('state','=',1)
    ->select('id','name','number','course','dept','school','summary','created_at')->paginate(6);
    return view('ajax.project_requested')->with('reqed',$reqed)->with('ua',$ua);
}//method end






//offer project
   //post validation rules
   protected $rules74 =
   [
       'Name'=> 'required|string|max:30',
           'Number'=> 'required|numeric|min:11',
           'Course'=> 'required|string|max:100',
           'Department'=> 'required|string|max:100',
           'Description'=> 'required|string|max:255',
            'School' => 'required|string|max:100',
           
   ];

public function offer(Request $request){
   


$validator = Validator::make(Input::all(), $this->rules74);
    if ($validator->fails()) {
        //errors
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {

        //no errors
    try{

        $name = $request->input('Name');
        $num =$request->input('Number');
       $course =$request->input('Course');  
       $dept =$request->input('Department');
       $sch =$request->input('School'); 
       $des=$request->input('Description');
         $check =$request->input('check');

       $new = new project;

       $new->name =$name;
       $new->number=$num;
       $new->course=$course;
       $new->dept=$dept;
       $new->school=$sch;
       $new->summary=$des;
        //1 is requested 2 is provided
       $new->type=$check;
        //0 is unapproved 1 is approved
       $new->state= 0;

       $new->save();

       //notify admin of project approval
       try{
        Mail::to('henryonyemaobi@gmail.com')->send(new notifyproject());  
       }
       catch(\Exception $e){
        return response()->json('Request made! It Will be on DStreet Shortly....');
    }
       return response()->Json('Offer Placed! It Will be on DStreet Shortly.');
    }

    catch(\Exception $e){
        return response()->Json('Error! Verify Internet Connection And Try Again');
       }
     


    }//if end


}//meth end





//offered help initial load

public function offered_proj(Request $request){
  
      //if search
   $search =$request->input('Search');
   $sch=$request->input('School');
   $ua = strtolower($_SERVER['HTTP_USER_AGENT']);

   if($sch){
    $offered = project::orderby('id','desc')->where('type','=',2)->where('state','=',1)->where('school','=',$sch)
    ->select('id','name','number','course','dept','school','summary','created_at')->paginate(6)
    ->appends('School', request('School'));
    return view('ajax.project_offered_school')->with('offered',$offered)->with('ua',$ua); 
   }

   if($search){
    $offered = project::orderby('id','desc')->where('type','=',2)->where('state','=',1)->where('summary','LIKE','%'.$search.'%')
    ->select('id','name','number','course','dept','school','summary','created_at')->paginate(6)
    ->appends('Search', request('Search'));
    return view('ajax.project_offered_search')->with('offered', $offered)->with('ua',$ua);
   }

      //initial load
   $offered = project::orderby('id','desc')->where('type','=',2)->where('state','=',1)
   ->select('id','name','number','course','dept','school','summary','created_at')->paginate(6);
   return view('ajax.project_offered')->with('offered',$offered)->with('ua',$ua);
}//meth end



//download mobile App


public function app(){
try{

    $path = public_path().'/app/DStreet.apk';
    $name = 'DStreet.apk';
    /*
$headers = array(
    'Content-Type: application/apk',
);
    */
}
catch(\Exception $e){
    return redirect('/items-to-buy-around-campus')
               ->with('deact','Updating DStreet App, please try again later.'); 
}
    return response()->download($path, $name);

}


//filter by campus and cat

public function betterfilter(Request $request){
    $sch = $request->input('filsch');
    $cat = $request->input('filcat');

    if(Auth()->check()){
        $mysch = Auth()->user()->school;
           //ads
$advert=ads::inRandomOrder()->where('verification', '=', 1)
->select('id','banner','phone','title','link')
->where('school','=',$mysch)->take(4)->get();

//backup plan
if(count($advert) < 1){
    //ads
$advert=ads::inRandomOrder()->where('verification', '=', 1)
->select('id','banner','phone','title','link')->take(4)->get();
}
    }else{
           //ads
$advert=ads::inRandomOrder()->where('verification', '=', 1)
->select('id','banner','phone','title','link')->take(4)->get();
    }
 

//post
$post =posts::orderby('id','desc')->where('verification','=',1)
->select('id','image_1','title','price','user_id','category','number','school','created_at')
->where('school','=',$sch)->where('category','=',$cat)
->paginate(6)
->appends(request()->all());


$count=posts::orderby('id')->where('verification','=',1)
->select('id','image_1','title','price','user_id','category','number','school','created_at')
->where('school','=',$sch)->where('category','=',$cat)->count();


//return page
return view('ajax.filter_result')->with('advert',$advert)->with('post',$post)
->with('count',$count);

}//meth end

//filter by campus and cat



//promo page
public function promo(){
     //check if aitime remains for claims
 $lucky = promo::select('name')->count();

 $Tairtime = $lucky * 100;

    return view('promo')->with('lucky',$lucky)->with('Tairtime',$Tairtime);
}

//promo redirect
public function force_claim(){
      //force login to claim
        Cache::put('claim','claimredirect','3');
        return redirect('/login')->with('success','Please Login to Claim Airtime');
}

//promo claim

public function claim(){
   
   //claim algorithm

   //check if aitime remains for claims
 $lucky = promo::select('name')->count();
if($lucky == 25){
    return redirect('dstreet-promo')->with('err','Sorry. All airtime has been claimed!');
}

//verify user claimed once
$mail = Auth()->user()->email;
$check = promo::select('email')->where('email','=',$mail)->get()->first();

if($check){
    return redirect('dstreet-promo')->with('err',"You can't claim the Promo twice!");
}
 
//save user rec

$name = Auth()->user()->name;
$number = Auth()->user()->number;


$save = new promo;

$save->name= $name;
$save->number = $number;
$save->email =$mail;

$save->save();

Cache::put('claimed','redirectaway','1');

return redirect('/dstreet-promo-claimed');//->with('err',"You can't claim the Promo twice!");

} //meth end


public function claimed(){

    if(Cache::has('claimed')){
        return view('promo_claimed');
    }else{
        return redirect('dstreet-promo')->with('err',"Page Expired!");
    }
    
 }

}//class end



