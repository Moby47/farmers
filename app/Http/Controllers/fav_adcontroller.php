<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fav_ad;

class fav_adcontroller extends Controller
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

 ///////////////////////////////////////favourite ad show and delete method ////////////////////////

    public function show($id)
    {
         $ads =  fav_ad::findorfail($id);

         if($ads){
            return view('users.favourited_ad')->with('ads',$ads);
         }else{
             return redirect('/');
         }
   
      
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
       $del=fav_ad::findorfail($id);

        //delete image rec from database
          $del->delete();
          return response()->Json($id);
    }
}
