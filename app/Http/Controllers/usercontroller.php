<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//storage library
use Illuminate\Support\Facades\Storage;
use App\messages;
use App\posts;
use App\ads;
use App\User;
use App\requests;
use Image;

//mail
use Mail;
use App\Mail\postnotify;
use App\Mail\adnotify;
use App\Mail\notifymem;
use App\Mail\notifyrequest;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class usercontroller extends Controller
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





    protected $rules3 =
    [
        'Description'=> 'required',
        
    ];
    /**
     * Display a listing of the resource.
     * 
     * request on dstreet
     *
     * @return \Illuminate\Http\Response
     */
    public function request(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules3);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
    

            $name = Auth()->user()->name;
        $id = Auth()->user()->id;
        $number = Auth()->user()->number;
        $school=Auth()->user()->school;
        $req = $request->input('Description');

        $last = new requests;

        $last->user_id=$id;
        $last->number=$number;
        $last->school=$school;
        $last->request=$req;
        $last->name=$name;

         //notify admin of request approval
       try{
        Mail::to('henryonyemaobi@gmail.com')->send(new notifyrequest());  
       }
       catch(\Exception $e){
        return response()->json('Request made! It Will be on DStreet Shortly....');
    }
        $last->save();
        return response()->json('<a href="/view-requests">View Requests</a>');
     }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $rules9 =
    [
        'Name'=> 'required|string|nullable',
        // 'Picture'=> 'nullable|required|image|max:1999',
         'Number'=> 'numeric|min:11',
        // 'School'=> 'string'
    ];

    public function recreate(Request $request)
    {

        $validator = Validator::make(Input::all(), $this->rules9);
            if ($validator->fails()) {
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            } else {
        $id = auth()->user()->id;

//update request
        
        $send= User::findorfail($id);

       
        $send->last_name=$request->input('Name');
       // $send->school=$request->input('School');
        $send->number=$request->input('Number');
       // $send->profile_pix= $filenametostore;

        $send->save();

        return response()->Json('updated!'); 
        
    }//val if end
    }//meth end

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //method to store messages
    public function store(Request $request)
    {
        $this->validate($request, [
            'Sender_id'=> 'required|integer',
            'Message' => 'required|string',
        ]);
       
            $sender_id = $request->input('Sender_id');
            $message = $request->input('Message');

            $send= new messages;

            $send->receiver_id=$sender_id;
            $send->message=$message;
           
            $send->save();

            return redirect('/mailbox')->with('success','Message Sent');
           // return response()->json($save);
    }







    //post validation rules
    protected $rules5 =
    [
        'Title'=> 'required|string|max:50',
            'Status'=> 'required|string',
            'Category'=> 'required|string',
            'Price'=> 'required|integer|max:10000000',
            'Description'=> 'required|string|max:255',
             'First_Image' => 'required|image|max:15999',
            'Second_Image' => 'image|nullable|max:15999',
            'Third_Image' => 'image|nullable|max:15999',
            'Fourth_Image' => 'image|nullable|max:15999',
    ];


     //method to store post
    public function store_post(Request $request)
    {
      
        $validator = Validator::make(Input::all(), $this->rules5);
    if ($validator->fails()) {
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    } else {
      
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
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
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
         //   $request->file('Second_Image')->storeAs('public/post_images_original', $filenametostore2);
            //#resized
            $request->file('Second_Image')->storeAs('public/post_images', $filenametostore2);
    
            // #resized
            //Resize image here
            $thumbnailpath = public_path('/storage/post_images/'.$filenametostore2);
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
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
              //  $request->file('Third_Image')->storeAs('public/post_images_original', $filenametostore3);
                //#resized
                $request->file('Third_Image')->storeAs('public/post_images', $filenametostore3);
        
                // #resized
                //Resize image here
                $thumbnailpath = public_path('/storage/post_images/'.$filenametostore3);
                $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
    
           // return redirect('images')->with('success', "Image uploaded successfully.");
          // return response()->Json('success!');
        }else{
            $filenametostore3 = 'noimage.jpg';
        }
    
        //.................compression algorithm...............//





        //handle file uploads   #4

     //.................compression algorithm...............//

     if($request->hasfile('Fourth_Image')){
        //get filename with extension
        $filenamewithextension = $request->file('Fourth_Image')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('Fourth_Image')->getClientOriginalExtension();

        //filename to store
        $filenametostore4 = $filename.'_'.time().'.'.$extension;

        //#original
            //Upload File
          //  $request->file('Fourth_Image')->storeAs('public/post_images_original', $filenametostore4);
            //#resized
            $request->file('Fourth_Image')->storeAs('public/post_images', $filenametostore4);
    
            // #resized
            //Resize image here
            $thumbnailpath = public_path('/storage/post_images/'.$filenametostore4);
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);

       // return redirect('images')->with('success', "Image uploaded successfully.");
      // return response()->Json('success!');
    }else{
        $filenametostore4 = 'noimage.jpg';
    }

    //.................compression algorithm...............//
    

            $title = $request->input('Title');
            $stat = $request->input('Status');

            $cat = $request->input('Category');

            if($cat == 'Swap-Items'){
                $price = 0;
            }else{
                $price = $request->input('Price');
            }
            
            $des = $request->input('Description');
            $logged_in_user_id = Auth()->user()->id;
            $school = Auth()->user()->school;
            $number = Auth()->user()->number;

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
              $send->user_id=$logged_in_user_id;
              $send->school=$school;
              $send->number=$number;

            $send->save();

            
        }

        catch(\Exception $e){
            return response()->json('Error Occured! Please Refresh Page and Try Again...');
        }

        //mail to dstreet about post
        //try{
            $poster = Auth()->user()->name;
            $mailer =  Auth()->user()->email;
            session(['poster' => $poster]);
            session(['postersch' => $school]);
            session(['postermailer' => $mailer]);

           Mail::to('henryonyemaobi@gmail.com')->send(new postnotify());  

              //mail to sch members
              //load title to session as url
              $newurl = 'https://www.dstreet.com.ng/buy-product/'.$title;
              session(['newurl' => $newurl]);
              session(['ptitle' => $title]);

            // $mem = user::where('school','=',Auth()->user()->school)->get()->pluck('email');
            $mem = array('henryonyemaobi@gmail.com','info2dstreet@gmail.com');
            foreach ($mem as $ar){
            Mail::to($ar)->queue(new notifymem()); 
            }
            return response()->json('Passed...');
       // }//try2 end
        //catch(\Exception $e){
           // return response()->json('Post Created! Without Notification to Dstreet...');
        //}
        
          
            return response()->json('Post Created! It Will Be On Dstreet Shortly...');

    }//validation if end
    }//method end

    


       //post edit validation rules
    protected $rules6 =
    [
        'Title'=> 'required|string|max:50',
            'Status'=> 'required|string',
            'Category'=> 'required|string',
            'Price'=> 'required|integer|max:10000000',
            'Description'=> 'required|string|max:255',
            'First_Image' => 'required|image|max:15999',
            'Second_Image' => 'image|nullable|max:15999',
            'Third_Image' => 'image|nullable|max:15999',
            'Fourth_Image' => 'image|nullable|max:15999',
    ];

    public function update(Request $request)
    {
        
        $validator = Validator::make(Input::all(), $this->rules6);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

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
         //   $request->file('First_Image')->storeAs('public/post_images_original', $filenametostore);
            //#resized
            $request->file('First_Image')->storeAs('public/post_images', $filenametostore);
    
            // #resized
            //Resize image here
            $thumbnailpath = public_path('/storage/post_images/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
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
          //  $request->file('Second_Image')->storeAs('public/post_images_original', $filenametostore2);
            //#resized
            $request->file('Second_Image')->storeAs('public/post_images', $filenametostore2);
    
            // #resized
            //Resize image here
            $thumbnailpath = public_path('/storage/post_images/'.$filenametostore2);
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
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
             //   $request->file('Third_Image')->storeAs('public/post_images_original', $filenametostore3);
                //#resized
                $request->file('Third_Image')->storeAs('public/post_images', $filenametostore3);
        
                // #resized
                //Resize image here
                $thumbnailpath = public_path('/storage/post_images/'.$filenametostore3);
                $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
    
           // return redirect('images')->with('success', "Image uploaded successfully.");
          // return response()->Json('success!');
        }else{
            $filenametostore3 = 'noimage.jpg';
        }
    
        //.................compression algorithm...............//







        //handle file uploads   #4

        //.................compression algorithm...............//

     if($request->hasfile('Fourth_Image')){
        //get filename with extension
        $filenamewithextension = $request->file('Fourth_Image')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('Fourth_Image')->getClientOriginalExtension();

        //filename to store
        $filenametostore4 = $filename.'_'.time().'.'.$extension;

        //#original
            //Upload File
          //  $request->file('Fourth_Image')->storeAs('public/post_images_original', $filenametostore4);
            //#resized
            $request->file('Fourth_Image')->storeAs('public/post_images', $filenametostore4);
    
            // #resized
            //Resize image here
            $thumbnailpath = public_path('/storage/post_images/'.$filenametostore4);
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);

       // return redirect('images')->with('success', "Image uploaded successfully.");
      // return response()->Json('success!');
    }else{
        $filenametostore4 = 'noimage.jpg';
    }

    //.................compression algorithm...............//

       
            $title = $request->input('Title');
            $price = $request->input('Price');
            $stat = $request->input('Status');
            $cat = $request->input('Category');

            if($cat == 'Swap-Items'){
                $price = 0;
            }else{
                $price = $request->input('Price');
            }
            
            $des = $request->input('Description');
            $logged_in_user_id = Auth()->user()->id;
            $school = Auth()->user()->school;
            $number = Auth()->user()->number;

            $idx = $request->input('id');
        $send= posts::findorfail($idx);

         //delete the old post pictures from storage before update
//condition to prevent deleting noimage
         if($send->image_1 != 'noimage.jpg'){
             //delete image file
             Storage::delete('public/post_images/'.$send->image_1);
         }
          //condition to prevent deleting noimage
         if($send->image_2 != 'noimage.jpg'){
             //delete image file
             Storage::delete('public/post_images/'.$send->image_2);
         }
          //condition to prevent deleting noimage
         if($send->image_3 != 'noimage.jpg'){
             //delete image file
             Storage::delete('public/post_images/'.$send->image_3);
         }
          //condition to prevent deleting noimage
         if($send->image_4 != 'noimage.jpg'){
             //delete image file
             Storage::delete('public/post_images/'.$send->image_4);
         }

        //delete image rec from database
         // $send->delete();


//save new post pix rec to DB replacing old
          $send->title=$title;
            $send->price=$price;
            $send->status=$stat;
            $send->category=$cat;
            $send->description=$des;
            $send->image_1=$filenametostore;
            $send->image_2=$filenametostore2;
             $send->image_3=$filenametostore3;
              $send->image_4=$filenametostore4;
              $send->user_id=$logged_in_user_id;
              $send->school=$school;
              $send->number=$number;

         $send->save();
        }
        catch(\Exception $e){
            return response()->json('Error Occured! Please Refresh Page and Try Again...');
        }
        

            return response()->Json('Post Edited!');

    }//validation end
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $id= $request->input('id');
       
         $del=posts::($id);

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

        //delete image rec from database
          $del->delete();

          return response()->json($id);
    }


    public function sold(Request $request){
    //variable
            $sold=2;
//get id
        $idmain = $request->input('id');
        $send= posts::findorfail($idmain);
        $send->verification=$sold;
        $send->save();

        return response()->json('Sent!');

    }


//ad  validation rules
protected $rules7 =
[
    'Title'=> 'required|string|max:50',
    'Package'=> 'required|string',
    'link'=> 'string|nullable',
    'Banner' => 'required|image|max:15999',
    'Description'=> 'required|string|max:255',
];

  //method to store premium ad
    public function store_ad(Request $request)
    {

        

        
        $sch = Auth()->user()->school;

     //ads placed both inactive and active but not declined or deactivated
     $used = ads::where('school','=',$sch)->where('verification','=',1)->count();

        $free = 12 - $used;

        if($free == 0){
          return response()->Json('No Free Slot For Your School, Try Again Later');  
        }else{
            
            $validator = Validator::make(Input::all(), $this->rules7);
            if ($validator->fails()) {
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            } else {

                try{
              //handle file uploads   #1


   //.................compression algorithm...............//

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
            $img = Image::make($thumbnailpath)->resize(550, 340, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
    
           // return redirect('images')->with('success', "Image uploaded successfully.");
           //return response()->Json('success!');
        }else{
            $filenametostore = 'noimage.jpg';
        }

        //.................compression algorithm...............//


            $package = $request->input('Package');
            $link = $request->input('link');
              $desc = $request->input('Description');
             $title = $request->input('Title');


            $number = Auth()->user()->number;
            $logged_id = Auth()->user()->id;
            $sch = Auth()->user()->school;
            $mail = Auth()->user()->email;

            if($package=="2 Wks"){
                //get expiration date for 14 days
            $expiration  = \carbon\carbon::now()->addDays(14);
            $amount = 2500;
           }elseif($package=="1 Month"){
                //get expiration date for 28 days
            $expiration  = \carbon\carbon::now()->addDays(28);
            $amount = 5000;
           }



            $send= new ads;

            //send number of auth user
            $send->title=$title;
            $send->package=$package;
            $send->banner=$filenametostore;
            $send->link=$link;
           $send->Phone=$number;
           $send->user_id=$logged_id;
           $send->expiration=$expiration;
           $send->description=$desc;
           $send->school=$sch;
          $send->amount= $amount;
           $send->mail =$mail;
        
            $send->save();

           
        }

            catch(\Exception $e){
                return response()->json('Error Occured! Please Refresh Page and Try Again...');
            }
             //mail to dstreet
             try{
                $ad_creater = Auth()->user()->name;
                $ad_mailer =  Auth()->user()->email;
                session(['ad_creater' => $ad_creater]);
                session(['ad_mailer' => $ad_mailer]);

                Mail::to('support@dstreet.com.ng')->send(new adnotify());  
            }//try2 end
            catch(\Exception $e){
                return response()->json('Ad Created! Without Notification to Dstreet ...');
            }
            //mail to dstreet
            
            return response()->Json('Ad Request Successful! Please Choose a Payment Method');
           // return response()->json($save);

        }//val end
        }//end of if for eligibility check


    }//store ad meth end






    

//delete request

public function eject(Request $request)
    {
        $id=$request->input('id');
         $del=requests::findorfail($id);

         if($del){
//delete  rec from database
$del->delete();

return response()->Json($id);
         }else{
            return response()->Json('Request Removed');        
         }
        
    }


//my school ads only modal result to page
    public function mysch(Request $request){
    $sch = $request->input('sch');

    if($sch){
        $all_ads = ads::orderby('id','desc')->where('verification','=',1)
        ->where('school','=',$sch)->select('id','title','banner','school','views','created_at')->paginate(10)->appends('sch', request('sch'));
    
        return view('all_ads')->with('all_ads',$all_ads);
    }else{
        return redirect('/');
    }
    
    }









    

}//class end
