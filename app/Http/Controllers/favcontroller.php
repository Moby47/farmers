<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fav;
use App\fav_ad;

class favcontroller extends Controller
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


    ///////////////////////////////////////favourite post  delete method ////////////////////////

    public function destroy(Request $request)
    {
        $id = $request->input('id');
       $del=fav::findorfail($id);

        //delete image rec from database
          $del->delete();

          return response()->Json($id.'deleted');

    }







}//class end
