<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;
use Image;

class ProductControllerFront extends Controller
{


          public function show($slug){
              $product = Product :: where('slug',$slug)->first(); 
               $carts=Cart::orderby('created_at','desc')->get();


              $category=$product->category_id;
          

              $catproducts=Product :: where('category_id',$category)->get()->take(5);
             


              if(!is_null($product)){
   
                       return view('front.pages.productView',compact('product','catproducts','carts'));
   
              }else{
                  
                  $session()->flash('errors','Sorry !! There is no product by this URL');
                  return redirect()->route('products');
   
              }
   
          }

}
