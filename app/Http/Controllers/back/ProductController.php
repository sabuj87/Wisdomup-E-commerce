<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
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
        $products = Product:: orderby('created_at','DESC')->get();
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
        return  view('back.pages.product.create',compact('categories'));

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
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'categoryid' =>'required|numeric',
            'slug' =>'required',
            'quantity' =>'required'



        ]);

        $product=new Product;
        $title=$request->title;
        $product->title=$request->title;
        $product->price=$request->price;
        $product->category_id=$request->categoryid;
        $product->offer=$request->offer;
        $product->offerprice=$request->offerprice;
        $product->brand_id=$request->brandid;
        $product->seller_id=$request->sellerid;
        $product->quantity=$request->quantity;
        $product->description=$request->description;
        $product->place=$request->place;
        $product->slug=$request->slug;
        $product->admin_id=1;
        $product->save();

        if($request->hasFile('thumb')){

            $image=$request->file('thumb');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/product/'.$title,$imgName);
            $product->image=$imgName;
            $product->save();

        }


        if($request->image>0){
            $i=0;
            foreach($request->image as $image){
                $imgName=time().$i++.'.'.$image->getClientOriginalExtension();
                $image->move('image/product/'.$title,$imgName);
                $product_image =  new ProductImage;
                $product_image->product_id=$product->id;
                $product_image->image=$imgName;

                $product_image->save();


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
    {
        //
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
        //
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
        $product->delete();
        flash('Product deleted successfully')->success();
        return  redirect()->route('products.index');
    }
    


 }

