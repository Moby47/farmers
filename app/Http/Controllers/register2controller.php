<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class register2controller extends Controller
{


  
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'password' => 'required|string|min:6|confirmed',
            'number' => 'required|numeric|min:11',
            'school' => 'required|string|max:100',
        ]);


            $new = new User;

 $new->name = $request->input('name');  
 $new->email = $request->input('email');    
$new->number = $request->input('number');     
$new->school = $request->input('school');     
$new->password= bcrypt($request->input('password'));     
$new->status = 0;    

$new->verification= 1;
//needs
$e =  $request->input('email'); 

$new->save();

 $login=User::where('email','=',$e)->first();

Auth()->login($login);

return redirect('/dashboard');
    }//method end

}//class end
