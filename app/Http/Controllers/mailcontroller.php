<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//mailing
use Mail;
use App\Mail\contact;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class mailcontroller extends Controller
{
    

    //contact us

//contact us validation rules
protected $rules15 =
[
    'Email' => 'required|string|email|max:100',
        'Name' => 'required|string|max:30',
        'Message' => 'required|string|max:255',
    
];
    public function contact(Request $request){

        $validator = Validator::make(Input::all(), $this->rules15);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
        $namex = $request->input('Name');
        $emailx = $request->input('Email');
        $messagex = $request->input('Message');
    
         //store info in session
         session(['namex' => $namex]);
          session(['mailx' => $emailx]);
          session(['messagex' => $messagex]);
    
        $ourmail = 'support@dstreet.com.ng';
      //  try{
            Mail::to($ourmail)->send(new contact());
      /*  }
            catch(\Exception $e){
             
                return response()->Json('Error! Mail not sent. Verify internet connection');
            }
    */
            return response()->Json('Email Sent, You will be replied within 24hrs. Thank you!');
        }//validation end
        
      
    }//method end
}
