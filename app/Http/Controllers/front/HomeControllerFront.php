<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Banner;
use Auth;

class HomeControllerFront extends Controller
{
    public  function home(){
        
        $categories=Category:: orderby('created_at','DESC')->get();;
        return view('front.pages.home',compact('categories'));
    }

}
