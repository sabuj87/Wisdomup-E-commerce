<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Product;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->key;
      
        if( !is_null($search) ){

            $products=Product::
            where(function ($query) use($search)  {
            $query->where('title','like','%'.$search.'%')
                  ->orWhere('description','like','%'.$search.'%');
            })
           
            ->orderBy('id','desc')
            ->get();


            return view('front.pages.search',['products'=>$products,'search'=>$search]);
     


           }else{
               return back();
           }

        }
   
 
    
}
