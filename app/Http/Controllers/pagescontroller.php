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
use App\school;
use App\fav_ad;
use App\messages;
use Illuminate\Support\Facades\Auth;
use DB;
use Cache;

class pagescontroller extends Controller
{
   
   

    //visitor pages controller ///////////////////////////////////////////////////////////////

    public function find(){
        
        //fetch all schools
        //$school = school::all();
        
    $pcount = DB::table('post')->where('verification','=',1)
    ->select('school', DB::raw('count(*) as total'))->groupBy('school')->get();

    $ccount = DB::table('post')->where('verification','=',1)
    ->select('category', DB::raw('count(*) as total'))->groupBy('category')->get();

        if(Auth()->check()){
            return view('find')->with('pcount',$pcount)->with('ccount',$ccount);
        }else{
            return view('find')->with('pcount',$pcount)->with('ccount',$ccount);
        }
       

    }//meth end







     public function index(){

         //get posts for index page
        $post = posts::orderby('id','=','desc')->where('verification','=',1)
       ->select('id','title','price','category','image_1','description','school','sold','created_at')
       ->take(5)->get();
         //get ads
        $ads1 = ads::inRandomOrder()->where('verification','=',1)
        ->select('id','title','banner','description','created_at')
        ->take(4)->get();
       // $ads2 = ads::orderby(DB::raw('RAND()'))->where('verification','=',1)->take(4)->get();
       // $ads3 = ads::orderby(DB::raw('RAND()'))->where('verification','=',1)->take(4)->get();
       // $ads4 = ads::orderby(DB::raw('RAND()'))->where('verification','=',1)->take(4)->get();
      //last request
      $req = requests::orderby('id','=','desc')->where('validity','=', 1)
      ->select('request','school','created_at')->take(1)->get();


        return view('index')->with('post',$post)->with('ads1',$ads1)->with('req',$req);
    

     }//meth end








 //show a category on find on initialisation    

public function show(){

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
   return view('category')->with('more',$more);
}//method end

 //show a category on find on initialisation  
     




  public function cat(){

        return view('category');

    }



     public function contact(){
        return view('contact');
    }





    public function feedbk(){
        $reviews=reviews::orderby('id', '=','desc')->select('message','created_at')
        ->where('id','!=',Null)->take(6)->get();
        return view('feeds')->with('reviews',$reviews);
    }

    //search result
      public function result(){
        return view('result');
    }


    public function help(){
        //get faqs paginated by 10
        $faq= question::orderby('id','desc')->where('id','!=',Null)->select('question','answer')->paginate(6);
        return view('help')->with('faq',$faq);
    }

     public function how(){
        return view('howitworks');
    }



    public function privacy(){
        return view('privacy');
    }


   public function single(){

        return view('single');
    }


   public function err(){

        return view('404');
    }


    public function all_ads(){

        //fetch ads for all ads pages
        $all_ads = ads::orderby('id','desc')->where('verification','=',1)
        ->select('id','banner','school','views','created_at','title')->paginate(10);//10
        return view('all_ads')->with('all_ads',$all_ads);
    }



 public function terms(){
        return view('terms');
    }

    

     //force redirect to find page
     public function force_msg($id){
        
        Cache::put('msg','msgredirect','3');
        Cache::put('id',$id,'3');
        return redirect('/login')->with('success','Please Login to Proceed');
   }

    //force ad
    public function force_ad(){
        Cache::put('ad','adredirect','3');
        return redirect('/login')->with('success','Please Login to Create Ads');
   }

    //force post
    public function force_post(){
        Cache::put('post','postredirect','3');
        return redirect('/login')->with('success','Please Login to Create Posts');
   }

    //force requet
    public function force_req(){
        Cache::put('req','reqredirect','3');
        return redirect('/login')->with('success','Please Login to Make Requests');
   }
 
//route msg

 public function msg(){
        return view('message');
    }
 

    public function rq(){
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);

        $req =requests::orderby('id','=','desc')->where('validity','=', 1)
        ->select('request','school','created_at','number','name')->paginate(10);

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

            return view('req')->with('req',$req)->with('ua',$ua)->with('more',$more);
        }










//.....................Ajax methods.....................................//

public function contents(){

    if(Auth::check()){

        $sch = Auth()->user()->school;
      //ads in your sch
    $advert=ads::inRandomOrder()->where('verification', '=', 1)
    ->select('id','banner','phone','title','link')
    ->where('school','=',$sch)->take(4)->get();

    //incase
    if(count($advert) < 1){
        //ads
   $advert=ads::inRandomOrder()->where('verification', '=', 1)
   ->select('id','banner','phone','title','link')->take(4)->get();
  }

    //posts in your school
     $post = posts::orderby('id','=','desc')->where('verification','=',1)
     ->select('id','title','price','category','user_id','number','image_1','school','created_at')
     ->where('school','=',$sch)->paginate(6);
//incase none in sch shw others
if(count($post) < 1){
    $post = posts::orderby('id','=','desc')->where('verification','=',1)
     ->select('id','title','price','category','user_id','number','image_1','school','created_at')
     ->paginate(6);
}

    return view('ajax.find_ajax')->with('advert',$advert)->with('post',$post);

    }else{

        //rand ads
    $advert=ads::inRandomOrder()->where('verification', '=', 1)
    ->select('id','banner','phone','title','link')->take(4)->get();
    //get posts for everyone
     $post = posts::orderby('id','=','desc')->where('verification','=',1)
     ->select('id','title','price','category','number','image_1','school','created_at')
     ->paginate(6);

    return view('ajax.find_ajax')->with('advert',$advert)->with('post',$post);

    } 


}//meth end


//tab content loads


//.....................................................method tab1

public function tab1(Request $request){

    //get sch
$sch = $request->input('sch');


 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Mobile-phone-tablet')
->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
->groupBy('category','school')->get();

//if sch search was made////else
if($sch){
   
    $mobile = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Mobile-phone-tablet'.'%')
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count1 = posts::where('category','LIKE','%'.'Mobile-phone-tablet'.'%')->where('verification', '=', 1)
    ->select('id')->where('school','LIKE','%'.$sch.'%')->count();
   $title= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Mobile-phone-tablet'.'%')->where('verification', '=', 1)
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();
 

    return view('tabs.tab1')->with('mobile',$mobile)->with('count1',$count1)->with('title', $title)->with('mix',$mix);

}else{

    $mobile = posts::orderby('id')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Mobile-phone-tablet'.'%')->first();
    $count1 = posts::where('category','LIKE','%'.'Mobile-phone-tablet'.'%')->where('verification', '=', 1)
    ->select('id')->count();
   $title= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Mobile-phone-tablet'.'%')
   ->take(14)->get();
 
    return view('tabs.tab1')->with('mobile',$mobile)->with('count1',$count1)->with('title', $title)->with('mix',$mix);
}//if end


}//method end


//.....................................................method tab1











public function tab2(Request $request){

    $sch = $request->input('sch2');


$mix = DB::table('post')->where('verification','=',1)->where('category','=','Electronics-Appliances')
->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
->groupBy('category','school')->get();
//if sch search was made////else

if($sch){

    $elec = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Electronics-Appliances'.'%')
    ->where('verification', '=', 1)->where('school','LIKE','%'.$sch.'%')->first();
    $count2 = posts::where('category','LIKE','%'.'Electronics-Appliances'.'%')
    ->select('id')->where('verification', '=', 1)->where('school','LIKE','%'.$sch.'%')->count();
   $title2= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Electronics-Appliances'.'%')
   ->where('verification', '=', 1)->where('school','LIKE','%'.$sch.'%')->take(14)->get();
 
     return view('tabs.tab2')->with('elec',$elec)->with('count2',$count2)->with('title2', $title2)->with('mix',$mix);

}else{

    $elec = posts::orderby('id')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Electronics-Appliances'.'%')->first();
    $count2 = posts::where('category','LIKE','%'.'Electronics-Appliances'.'%')->select('id')
    ->where('verification', '=', 1)->count();
   $title2= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Electronics-Appliances'.'%')->take(14)->get();
 
     return view('tabs.tab2')->with('elec',$elec)->with('count2',$count2)->with('title2', $title2)->with('mix',$mix);

}
   
}//meth end






public function tab3(Request $request){

    $sch = $request->input('sch3');


 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Swap-Items')
->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
->groupBy('category','school')->get();

//if sch search was made////else


if($sch){

    $swap = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Swap-Items'.'%')
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count3 = posts::where('category','LIKE','%'.'Swap-Items'.'%')->where('verification', '=', 1)
    ->select('id')->where('school','LIKE','%'.$sch.'%')->count();
   $title3= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Swap-Items'.'%')
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();
  
      return view('tabs.tab3')->with('swap',$swap)->with('count3',$count3)->with('title3', $title3)->with('mix',$mix);

}else{

    $swap = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Swap-Items'.'%')->first();
  $count3 = posts::where('category','LIKE','%'.'Swap-Items'.'%')->where('verification', '=', 1)
  ->select('id')->count();
 $title3= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Swap-Items'.'%')->take(14)->get();

    return view('tabs.tab3')->with('swap',$swap)->with('count3',$count3)->with('title3', $title3)->with('mix',$mix);

}

    
}








public function tab4(Request $request){

    
$sch = $request->input('sch4');



$mix = DB::table('post')->where('verification','=',1)->where('category','=','Computers-Accessories')
->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
->groupBy('category','school')->get();

//if sch search was made////else


if($sch){

    $comp = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Computers-Accessories'.'%')
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count4 = posts::where('category','LIKE','%'.'Computers-Accessories'.'%')->where('verification', '=', 1)
    ->select('id')->where('school','LIKE','%'.$sch.'%')->count();
   $title4= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Computers-Accessories'.'%')
    ->where('school','LIKE','%'.$sch.'%')->take(14)->get();
  

    return view('tabs.tab4')->with('comp',$comp)->with('count4',$count4)->with('title4', $title4)->with('mix',$mix);

}else{

    $comp = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Computers-Accessories'.'%')->first();
    $count4 = posts::where('category','LIKE','%'.'Computers-Accessories'.'%')->where('verification', '=', 1)
    ->select('id')->count();
   $title4= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Computers-Accessories'.'%')->take(14)->get();
  

    return view('tabs.tab4')->with('comp',$comp)->with('count4',$count4)->with('title4', $title4)->with('mix',$mix);
}

    
}







public function tab5(Request $request){

    
   
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Furniture')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();

$sch = $request->input('sch5');


//if sch search was made////else


if($sch){

    $furniture = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Furniture'.'%')
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count5 = posts::where('category','LIKE','%'.'Furniture'.'%')->where('verification', '=', 1)
    ->select('id')->where('school','LIKE','%'.$sch.'%')->count();
   $title5= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Furniture'.'%')->where('verification', '=', 1)
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();

    return view('tabs.tab5')->with('furniture',$furniture)->with('count5',$count5)->with('title5', $title5)->with('mix',$mix);

}else{

    $furniture = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Furniture'.'%')->first();
    $count5 = posts::where('category','LIKE','%'.'Furniture'.'%')->where('verification', '=', 1)
    ->select('id')->count();
   $title5= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Furniture'.'%')->take(14)->get();

    return view('tabs.tab5')->with('furniture',$furniture)->with('count5',$count5)->with('title5', $title5)->with('mix',$mix);
}

 
}


public function tab6(Request $request){

    $sch = $request->input('sch6');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Pets')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();


//if sch search was made////else


if($sch){

    $pet = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Pets'.'%')
    ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->first();
    $count6 = posts::where('category','LIKE','%'.'Pets'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->count();
   $title6= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Pets'.'%')->where('verification', '=', 1)
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();
  
  
      return view('tabs.tab6')->with('pet',$pet)->with('count6',$count6)->with('title6', $title6)->with('mix',$mix);

}else{

    $pet = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Pets'.'%')->where('verification', '=', 1)->first();
    $count6 = posts::where('category','LIKE','%'.'Pets'.'%')->where('verification', '=', 1)->count();
   $title6= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Pets'.'%')->where('verification', '=', 1)->take(14)->get();
  
  
      return view('tabs.tab6')->with('pet',$pet)->with('count6',$count6)->with('title6', $title6)->with('mix',$mix);
}
   
}







public function tab7(Request $request){

    $sch = $request->input('sch7');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Books-Sports-Hobbies')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();


//if sch search was made////else


if($sch){
    $bsh = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Books-Sports-Hobbies'.'%')
    ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->first();
  $count7 = posts::where('category','LIKE','%'.'Books-Sports-Hobbies'.'%')->where('verification', '=', 1)
  ->where('school','LIKE','%'.$sch.'%')->count();
 $title7= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Books-Sports-Hobbies'.'%')
 ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->take(14)->get();


    return view('tabs.tab7')->with('bsh',$bsh)->with('count7',$count7)->with('title7', $title7)->with('mix',$mix);

}else{
    $bsh = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Books-Sports-Hobbies'.'%')
    ->where('verification', '=', 1)->first();
  $count7 = posts::where('category','LIKE','%'.'Books-Sports-Hobbies'.'%')->where('verification', '=', 1)->count();
 $title7= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Books-Sports-Hobbies'.'%')
 ->where('verification', '=', 1)->take(14)->get();



    return view('tabs.tab7')->with('bsh',$bsh)->with('count7',$count7)->with('title7', $title7)->with('mix',$mix);
}

}








public function tab8(Request $request){

    $sch = $request->input('sch8');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Fashion')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();


//if sch search was made////else


if($sch){

    $fashion = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Fashion'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count8 = posts::where('category','LIKE','%'.'Fashion'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->count();

   $title8= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Fashion'.'%')->where('verification', '=', 1)
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();
   


    return view('tabs.tab8')->with('fashion',$fashion)->with('count8',$count8)->with('title8', $title8)->with('mix',$mix);

}else{
    $fashion = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Fashion'.'%')->where('verification', '=', 1)->first();
    $count8 = posts::where('category','LIKE','%'.'Fashion'.'%')->where('verification', '=', 1)->count();
   $title8= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Fashion'.'%')->where('verification', '=', 1)->take(14)->get();
   


    return view('tabs.tab8')->with('fashion',$fashion)->with('count8',$count8)->with('title8', $title8)->with('mix',$mix);

}
    
}














public function tab9(Request $request){

    $sch = $request->input('sch9');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Lodging-Accomodations')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();


//if sch search was made////else


if($sch){
    $house = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Lodging-Accomodations'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count9 = posts::where('category','LIKE','%'.'Lodging-Accomodations'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->count();
   $title9= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Lodging-Accomodations'.'%')->where('verification', '=', 1)
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();
   
    return view('tabs.tab9')->with('house',$house)->with('count9',$count9)->with('title9', $title9)->with('mix',$mix);

}else{
    $house = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Lodging-Accomodations'.'%')
    ->where('verification', '=', 1)->first();
    $count9 = posts::where('category','LIKE','%'.'Lodging-Accomodations'.'%')->where('verification', '=', 1)->count();
   $title9= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Lodging-Accomodations'.'%')
   ->where('verification', '=', 1)->take(14)->get();
   
    return view('tabs.tab9')->with('house',$house)->with('count9',$count9)->with('title9', $title9)->with('mix',$mix);
}
   
}


public function tab10(Request $request){

    $sch = $request->input('sch10');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Services')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();


//if sch search was made////else


if($sch){
    $service = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Services'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count10 = posts::where('category','LIKE','%'.'Services'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->count();
   $title10= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Services'.'%')->where('verification', '=', 1)
->where('school','LIKE','%'.$sch.'%')->take(14)->get();
   


    return view('tabs.tab10')->with('service',$service)->with('count10',$count10)->with('title10', $title10)->with('mix',$mix);

}else{
    $service = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Services'.'%')
    ->where('verification', '=', 1)->first();
    $count10 = posts::where('category','LIKE','%'.'Services'.'%')->where('verification', '=', 1)->count();
   $title10= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Services'.'%')
   ->where('verification', '=', 1)->take(14)->get();
   


    return view('tabs.tab10')->with('service',$service)->with('count10',$count10)->with('title10', $title10)->with('mix',$mix);
}
 
}







public function tab11(Request $request){

    $sch = $request->input('sch11');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Cosmetics-Beauty')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();


//if sch search was made////else

if($sch){
    $cosmetics = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Cosmetics-Beauty'.'%')
    ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->first();
    $count11 = posts::where('category','LIKE','%'.'Cosmetics-Beauty'.'%')
    ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->count();
   $title11= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Cosmetics-Beauty'.'%')
   ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->take(14)->get();
   

    return view('tabs.tab11')->with('cosmetics',$cosmetics)->with('count11',$count11)
    ->with('title11', $title11)->with('mix',$mix);

}else{
    $cosmetics = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Cosmetics-Beauty'.'%')
    ->first();
    $count11 = posts::where('category','LIKE','%'.'Cosmetics-Beauty'.'%')->where('verification', '=', 1)->count();
   $title11= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Cosmetics-Beauty'.'%')
   ->take(14)->get();
   

    return view('tabs.tab11')->with('cosmetics',$cosmetics)->with('count11',$count11)
    ->with('title11', $title11)->with('mix',$mix);
}
   
}





public function tab12(Request $request){

    $sch = $request->input('sch12');

 
  $mix = DB::table('post')->where('verification','=',1)->where('category','=','Others')
  ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
  ->groupBy('category','school')->get();
 

//if sch search was made////else


if($sch){

    $others = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Others'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->first();
    $count12 = posts::where('category','LIKE','%'.'Others'.'%')->where('verification', '=', 1)
    ->where('school','LIKE','%'.$sch.'%')->count();
   $title12= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Others'.'%')->where('verification', '=', 1)
   ->where('school','LIKE','%'.$sch.'%')->take(14)->get();


    return view('tabs.tab12')->with('others',$others)->with('count12',$count12)->with('title12', $title12)->with('mix',$mix);

}else{
    $others = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Others'.'%')
    ->where('verification', '=', 1)->first();
    $count12 = posts::where('category','LIKE','%'.'Others'.'%')->where('verification', '=', 1)->count();
   $title12= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Others'.'%')
   ->where('verification', '=', 1)->take(14)->get();


    return view('tabs.tab12')->with('others',$others)->with('count12',$count12)->with('title12', $title12)->with('mix',$mix);
}
   
}








public function tab13(Request $request){

    $sch = $request->input('sch13');

     
 $mix = DB::table('post')->where('verification','=',1)->where('category','=','Cryptocurrency')
 ->select('category', DB::raw('count(*) as ctotal'),'school', DB::raw('count(*) as stotal'))
 ->groupBy('category','school')->get();

//if sch search was made////else

if($sch){
    $crypto = posts::orderby('id','desc')->select('image_1','title','description')->where('category','LIKE','%'.'Cryptocurrency'.'%')
    ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->first();
    $count13 = posts::where('category','LIKE','%'.'Cryptocurrency'.'%')
    ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->count();
   $title13= posts::orderby('id','desc')->select('id','title')->where('category','LIKE','%'.'Cryptocurrency'.'%')
   ->where('school','LIKE','%'.$sch.'%')->where('verification', '=', 1)->take(14)->get();
   

    return view('tabs.tab13')->with('crypto',$crypto)->with('count13',$count13)
    ->with('title13', $title13)->with('mix',$mix);

}else{  
    $crypto = posts::orderby('id','desc')->select('image_1','title','description')->where('verification', '=', 1)->where('category','LIKE','%'.'Cryptocurrency'.'%')
    ->first();
    $count13 = posts::where('category','LIKE','%'.'Cryptocurrency'.'%')->where('verification', '=', 1)->count();
   $title13= posts::orderby('id','desc')->select('id','title')->where('verification', '=', 1)->where('category','LIKE','%'.'Cryptocurrency'.'%')
   ->take(14)->get();
   

    return view('tabs.tab13')->with('crypto',$crypto)->with('count13',$count13)
    ->with('title13', $title13)->with('mix',$mix);
}
   
}
//tab content loads


//.....................Ajax methods.....................................//



















}//class end
