<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token){
        $user = User::where('remember_token',$token)->first(); 
        if(!is_null($user)){
           $user->status = 1;
           $user->remember_token = NULL;
           $user->save();
           flash('Your email address is verified  !')->success();
           return redirect()->route('login');
        }else{
          flash('Sorry !! your token  is not matched!')->success();
         
        }
       
   
       }
}
