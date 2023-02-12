<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartControllerFront extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cart = new Cart();
        $carts = $cart->totalCarts();
        return view('front.pages.carts', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'product_id' =>'required'
       ],
       [
            'product_id.required'=>"Please give a product"
       ]
   );

   if(Auth::check()){

       $cart= Cart:: where(function ($query) {
          $query->where('user_id',Auth::id())
                ->orWhere('ip_address',request()->ip());
      })
        
       ->where('product_id',$request->product_id)
       ->where('order_id',NULL)
       ->first();

   }else{

       $cart= Cart::
       where('ip_address',request()->ip())
       ->where('product_id',$request->product_id)
       ->where('order_id',NULL)
       ->first();

   }

   if(!is_null($cart)){
      if($request->has('product_quantity')){
          if($request->product_quantity > 1 ){
          
              $cart->product_quantity = $request->product_quantity;
           
          }else{

              if(Auth::check()){
         
                  $cart->user_id = Auth::id();
               
                
          
               }
       
              $cart->increment('product_quantity');
          }


   }else{
      if(Auth::check()){
         
          $cart->user_id = Auth::id();
       
        
  
       }
      $cart->increment('product_quantity');
   }
     
   $cart->save();

   }else{

       $cart=new Cart();
       if(Auth::check()){
         
          $cart->user_id = Auth::id();
       
        
  
       }
  
       $cart->ip_address = request()->ip();
       if($request->has('product_quantity')){
              if($request->product_quantity > 1 ){
              
                  $cart->product_quantity = $request->product_quantity;
               
              }

       }
       $cart->product_id = $request->product_id;
       $cart->save();
     
  
     

   }

 
   

   session()->flash('cart','cart');
   return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $cart=Cart::find($id);
        if(!is_null( $cart)){
           $cart->product_quantity=$request->product_quantity;

           $cart->save();


        }else{

           return redirect()->route('carts');
        }
        session()->flash('cart','cart');
   return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::find($id);
 
         
        if(!is_null( $cart)){
        

           $cart->delete();


        }else{

           return redirect()->route('carts');
        }
     
        session()->flash('cart','cart');
        return back();
    }
}
