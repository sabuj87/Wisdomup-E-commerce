<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Brand;
use App\Models\Place;
use App\Models\Collection;
use App\Models\Color;
use App\Models\ProductImage;

use App\Models\DesImage;
use Image;

class ProductController extends Controller

{   
     
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product:: orderby('created_at','DESC')->paginate(10);
        return  view('back.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category:: orderby('created_at','DESC')->get();
        $sellers = Seller:: orderby('created_at','DESC')->get();
        $brands = Brand:: orderby('created_at','DESC')->get();
        $places = Place:: orderby('created_at','DESC')->get();
        $collections = Collection:: orderby('created_at','DESC')->get();
        return  view('back.pages.product.create',compact('categories','sellers','brands','places','collections'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'price' => 'required|numeric',
            'categoryid' =>'required|numeric',
            'slug' =>'required',
            'quantity' =>'required'



        ]);

        $product=new Product;
        $title=$request->title;
        $product->title=$request->title;
        $product->longtitle=$request->longtitle;
        $product->price=$request->price;
        $product->category_id=$request->categoryid;
        $product->offer=$request->offer;
        $product->offerprice=$request->offerprice;
        $product->brand_id=$request->brandid;
        $product->collection_id=$request->collectionid;
        $product->seller_id=$request->sellerid;
        $product->quantity=$request->quantity;
        $product->description=$request->description;
        $product->specification=$request->specification;
        $product->place_id=$request->place;
        $product->slug=$request->slug;
        $product->admin_id=1;
        $product->save();

        if($request->hasFile('thumb')){

            $image=$request->file('thumb');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/product/',$imgName);
            $product->image=$imgName;
            $product->save();

        }


        if($request->image>0){
            $i=0;
            foreach($request->image as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/',$imgName);
                $product_image =  new ProductImage;
                $product_image->product_id=$product->id;
                $product_image->image=$imgName;

                $product_image->save();


            }

        }
        if($request->imaged>0){
            $i=0;
            foreach($request->imaged as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/',$imgName);
                $des_image =  new DesImage;
                $des_image->product_id=$product->id;
                $des_image->image=$imgName;

                $des_image->save();


            }

        }


        if($request->colorimage>0){

            $i=0;
            $j=0;
            foreach($request->colorimage as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/color',$imgName);
                $color = new Color;
                $color->product_id=$product->id;
                $color->image=$imgName;
                $color->color_name=$request->colorname[$j];
                $j++;
                $color->save();
            }
            


        }

        flash('Product added successfully')->success();
        return  back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $categories = Category:: orderby('created_at','DESC')->get();
        $sellers = Seller:: orderby('created_at','DESC')->get();
        $brands = Brand:: orderby('created_at','DESC')->get();
        $places = Place:: orderby('created_at','DESC')->get();
        $collections = Collection:: orderby('created_at','DESC')->get();
        $product=Product::find($id);
        return  view('back.pages.product.edit',compact('product','categories','sellers','brands','places','collections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:150',
            'price' => 'required|numeric',
            'categoryid' =>'required|numeric',
            'slug' =>'required',
            'quantity' =>'required'



        ]);

        $product=Product::find($id);
        $product->title=$request->title;
        $product->longtitle=$request->longtitle;
        $product->price=$request->price;
        $product->category_id=$request->categoryid;
        $product->offer=$request->offer;
        $product->offerprice=$request->offerprice;
        $product->brand_id=$request->brandid;
        $product->collection_id=$request->collectionid;
        $product->seller_id=$request->sellerid;
        $product->quantity=$request->quantity;
        $product->description=$request->description;
        $product->specification=$request->specification;
        $product->place_id=$request->place;
        $product->slug=$request->slug;
        $product->admin_id=1;
        $product->save();



        if($request->hasFile('thumb')){
            if(file_exists("image/product/".$product->image)){
                unlink("image/product/".$product->image);
            }
            $image=$request->file('thumb');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/product/',$imgName);
            $product->image=$imgName;
            $product->save();

        }





        if($request->image>0){
            foreach($product->images as $img){
  
          
  
                $file_name = $img->image;
                  if(file_exists("image/product/".$file_name)){
                      unlink("image/product/".$file_name);
                  }
                  $img->delete();
          
                  }
              


            $i=0;
            foreach($request->image as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/',$imgName);
                $product_image =  new ProductImage;
                $product_image->product_id=$product->id;
                $product_image->image=$imgName;

                $product_image->save();


            }

        }


        if($request->imaged>0){
            foreach($product->desimages as $img){
  
          
  
                $file_name = $img->image;
                  if(file_exists("image/product/".$file_name)){
                      unlink("image/product/".$file_name);
                  }
                  $img->delete();
          
                  }
              


            $i=0;
            foreach($request->imaged as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/',$imgName);
                $desimage =  new DesImage;
                $desimage->product_id=$product->id;
                $desimage->image=$imgName;

                $desimage->save();


            }

        }


        if($request->colorimage>0){


            foreach($product->colors as $img){
  
          
  
                $file_name = $img->image;
                  if(file_exists("image/product/color/".$file_name)){
                      unlink("image/product/color/".$file_name);
                  }
                  $img->delete();
          
                  }

            $i=0;
            $j=0;
            foreach($request->colorimage as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/color',$imgName);
                $color = new Color;
                $color->product_id=$product->id;
                $color->image=$imgName;
                $color->color_name=$request->colorname[$j];
                $j++;
                $color->save();
            }
            


        }





        flash('Product Updated successfully')->success();
        return  redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $product = Product :: findOrFail($id);
        if(file_exists("image/product/".$product->image)){
            unlink("image/product/".$product->image);
        }
        foreach($product->images as $img){
  
          
  
            $file_name = $img->image;
              if(file_exists("image/product/".$file_name)){
                  unlink("image/product/".$file_name);
              }
              $img->delete();
      
             }



        
        foreach($product->colors as $img){
  
          
  
            $file_name = $img->image;
              if(file_exists("image/product/color/".$file_name)){
                  unlink("image/product/color/".$file_name);
              }
              $img->delete();
      
           }



        $product->delete();
        flash('Product deleted successfully')->success();
        return  redirect()->route('products.index');
    }
    


 }

