<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;


class CategoryControllerFront extends Controller
{
    public function mainCategory(){
      return view('front.pages.category.allcategory');
    }

    public function subCategory($pid){


        
        $subcategories = Category::orderBy('name','asc')->where('parent_id',$pid)->get();
        $mainCategory= Category::where('id',$pid)->first();
        if(sizeof($subcategories)){

          return view('front.pages.category.subcategory',['subcategories'=>$subcategories,'maincategory'=>$mainCategory]);


        }else{

            return view('front.pages.category.show',['category'=>$mainCategory]);
        }

        

    }

    public function showProduct($id){

      
      $category = Category::find($id);
      return view('front.pages.CategoryProduct',compact('category'));



        

    }

}
