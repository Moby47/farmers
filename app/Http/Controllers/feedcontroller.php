<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;

//for ajax error returns
use Validator;
use Response;
use View;
use Illuminate\Support\Facades\Input;

class feedcontroller extends Controller
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
    'Message'=>'required|string|max:255',
 ];

    public function update(Request $request)
    {
        //saving d inbox
        $validator = Validator::make(Input::all(), $this->rules6);
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
         $id =$request->input('id');
      
        $done = new messages;

        $done->message = $message;
        $done->title = $title;
        $done->name =$name;
        $done->master =$master;
        $done->slave =$slave;

       

        //to create a marked as open feeling to feedback page...
        $extra = messages::findorfail($id);
        $extra->seen = '1';
        $extra->save();

    }

    catch(\Exception $e){
        return response()->Json('Error Occured, Please Try Again');  
    }

    $done->save();
    
       return response()->Json('Message Sent');
        }//val if end
    }//meth end

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->input('id');

        $del = messages::findorfail($id);

        $del->delete();

        return response()->Json($id);
    }
}
