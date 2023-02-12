<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Place;
use App\Models\Cart;
use Auth;

class HomeControllerFront extends Controller
{
    public  function home(){
        
      
        $cart = new Cart();
        $carts = $cart->totalCarts();
        $categories=Category:: orderby('created_at','DESC')->where('show_homepage',1)->get();
        $collections=Collection:: orderby('created_at','DESC')->where('show_homepage',1)->get();

        $sliders=Slider::orderby('priority','ASC')->get();
        $places=Place::orderby('created_at','DESC')->where('show_home',1)->get();
        return view('front.pages.home',compact('categories','places','sliders','carts','collections'));
    }
    

    public  function page($id){
        
        $place=Place::find($id);
        return view('front.pages.PageView',compact('place'));
}

    public  function allcategory(){
        
        $allcategory=Category:: orderby('created_at','DESC')->get();
        return view('front.pages.allcategory',compact('allcategory'));
    }
    public  function collectionProduct($id){
   $collection=Collection::find($id);

   if(!is_null($collection)){
    return view('front.pages.collection',compact('collection'));

   }


    }
}
