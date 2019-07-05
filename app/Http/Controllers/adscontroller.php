<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ads;
use App\custom;
//storage library
use Illuminate\Support\Facades\Storage;

//mail
use Mail;
use App\Mail\custom_adnotify;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class adscontroller extends Controller
{
     



     //check ads availability for a school
    public function index(Request $request)
    {
        $sch = Auth()->user()->school;

        //ads placed both inactive and active but not declined or deactivated
         $used = ads::where('school','=',$sch)->where('verification','=',1)->count();

        $free = 12 - $used;

        if($free == 0){
          return response()->Json( $free.' '.'Slot Free For Your School, Try Again Later');  
        }else{
            return response()->Json( $free.' '.'Slots Free For Your School, Place Your Ad Now!');
        }
        
    }

    
    //ad  validation rules
protected $rules8 =
[
            'Title'=> 'required|string|max:50',
            'Package'=> 'required|string',
            'link'=> 'string|nullable',
            'Description'=> 'required|string|max:255',
];

    public function create(Request $request)
    {
    
        
        $sch = Auth()->user()->school;

        //ads placed both inactive and active but not declined or deactivated
        $used = ads::where('school','=',$sch)->where('verification','=',1)->count();

        $free = 12 - $used;

        if($free == 0){
            return response()->Json('No Free Slot For Your School, Try Again Later');   
        }else{
        
            
            

            $validator = Validator::make(Input::all(), $this->rules8);
            if ($validator->fails()) {
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            } else {

                try{

            $package = $request->input('Package');
            $link = $request->input('link');
              $desc = $request->input('Description');
             $title = $request->input('Title');
             $title2 = $request->input('Title2');
             $c2 = $request->input('color2');

            $number = Auth()->user()->number;
            $logged_id = Auth()->user()->id;
            $sch = Auth()->user()->school;
            $mail = Auth()->user()->email;

            if($package=="2 Wks"){
                //get expiration date for 14 + 3 days
            $expiration  = \carbon\carbon::now()->addDays(17);
            $amount = 3500;
           }elseif($package=="1 Month"){
                //get expiration date for 28 + 3 days
            $expiration  = \carbon\carbon::now()->addDays(31);
            $amount = 6000;
           }



            $send= new ads;

            //send number of auth user
            $send->title=$title;
            $send->package=$package;
            $send->link=$link;
           $send->Phone=$number;
           $send->user_id=$logged_id;
           $send->expiration=$expiration;
           $send->description=$desc.' '.$title2.' '.$c2;
           $send->school=$sch;
           $send->verification=47;
           $send->banner= 'Custom';
          $send->amount= $amount;
           $send->mail =$mail;
        
            $send->save();

            //mail to dstreet
            try{
                $ad_creater2 = Auth()->user()->name;
                $ad_mailer2 =  Auth()->user()->email;
                session(['ad_creater2' => $ad_creater2]);
                session(['ad_mailer2' => $ad_mailer2]);

                Mail::to('support@dstreet.com.ng')->send(new custom_adnotify());  
            }//try2 end
            catch(\Exception $e){
                return response()->json('Ad Created! Continue to Payment ...');
            }
            //mail to dstreet

        }

        catch(\Exception $e){
            return response()->json('Error Occured! Please Refresh Page and Try Again...');
        }
            return response()->Json('Custom Ad Requested!, Please Choose a Payment Method..');
            

        }//val if end
        }//end of if for eligibility check
    

    }

   
    public function show($id)
    {
        //show single details on ad click
        $ads =  ads::findorfail($id);

        if($ads){
//verify 
 $veri = $ads->verification;
        }
 

        if($ads && $veri == 1){
            $count =  ads::findorfail($id);

         $count->increment('views');
//other ads 
//if login: check in sch else general
//if not auth: general
if(Auth()->check()){
    //auth
    $sch = Auth()->user()->school;
    $more = ads::inRandomOrder()->where('verification','=',1)->where('school','=',$sch)->where('id','!=',$id)
    ->select('id','title','banner','school','description')
    ->take(6)->get();
    //if none, use deault
    if(count($more)<1){
        $more = ads::inRandomOrder()->where('verification','=',1)->where('id','!=',$id)
        ->select('id','title','banner','school','description')
        ->take(6)->get();
    }
    
    }else{
        $more = ads::inRandomOrder()->where('verification','=',1)->where('id','!=',$id)
        ->select('id','title','banner','school','description')
        ->take(6)->get();
    }
    
            return view('advert')->with('ads',$ads)->with('more',$more);
        }else{

            //not found
            //if logged in
            if(Auth()->check()){
                 //if user or admin
      $who = Auth()->user()->status;
      if($who == 1){ //is admin
    return redirect('/reports')->with('msg','Ad Expired Or Was Deleted By User, Please Delete From Reports.');
      }else{
        return redirect('/');
      }
            
    
    }else{
            //if not logged in
            return redirect('/');
            }
        }

         
    }

    
    
    public function destroy(Request $request)
    {
        $id = $request->input('id');
       $del=ads::findorfail($id);

       if($del){
         //condition to prevent deleting noimage
         if($del->banner != 'noimage.jpg'){
            //delete image file
            Storage::delete('public/ads_images/'.$del->banner);
            //delete image rec from database
          $del->delete();
          return response()->json($id);
        }
        

       }else{
        return response()->json('Removed'); 
       }
       
    }
}
