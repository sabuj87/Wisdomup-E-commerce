<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class CheckoutController extends Controller
{
    public function  index(){

        
      $cart = new Cart();
      $carts = $cart->totalCarts();
      return view('front.pages.Checkout', compact('carts'));
 
     }
 
     public function  store(Request $request){
         $this->validate($request,[
            'name' => 'required',
            'phone_no' =>'required',
            'email' =>'required',
            'shipping_address' =>'required',
            'payment_id' =>'required'
 
 
         ]);
          $order =new Order();
 
   
          $order->name=$request->name;
          $order->email=$request->email;
          $order->phone_no=$request->phone_no;
          $order->ip_address=request()->ip();
          $order->shipping_address=$request->shipping_address;
          $order->message=$request->message;
          if(Auth::check()){
             $order->user_id = Auth::id();
            
          }
 
         $order->payment_id = $request->payment_id; //Payment::where('short_name',$request->payment_method_id)->first()->id;
 
         session()->flash('order','Your order has taken suceessfully !!! Please wait admin will soon confirm it');
 
       
         $order->save();
 
 
      foreach(Cart::totalCarts() as $cart ){
 
        $cart->order_id=$order->id;
        $cart->save();
 
      }
      
         return redirect()->route('home');
     
 
            
      }
}
