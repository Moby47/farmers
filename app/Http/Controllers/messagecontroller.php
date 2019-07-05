<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class messagecontroller extends Controller
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



 //message validation rules
 protected $rules6 =
 [
    'Message_Reply'=>'required|string|max:255',
 ];

    public function update(Request $request)
    {
        //saving d inbox
        $validator = Validator::make(Input::all(), $this->rules6);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

        $id = $request->input('id');

        $edit = messages::findorfail($id);
        $edit->reply=$request->input('Message_Reply');
        $edit->save();


       return response()->Json('Message Sent!');
    }//val if end
}//meth end

  
}
