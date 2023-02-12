@extends('front.layouts.master')
@section('content')
 

<div class="row" >


    <div class="col-md-8 border m-auto p-2 ">


        <div class="row p-3">
            <div class="col-md-8">

                <p>Sheeping info</p>


                <div class="p-3" >

                    <form action="{{route('checkouts.store')}}" method="post">
                    
                    
                     @csrf


                    Name *


                    <input id="name" type="text" class="inputCommon @error('name') errorinput @enderror " name="name" value="{{Auth::check() ?  Auth ::user()->first_name :'' }}" required autocomplete="name" autofocus>

                    Phone *

                    <input id="phone_no" type="text" class="inputCommon @error('phone_no') errorinput @enderror " name="phone_no" value="{{Auth::check() ?  Auth ::user()->phone_no :''}}" required autocomplete="name" autofocus>
                    

                    Email *

                    <input id="phone_no" type="text" class="inputCommon @error('email') errorinput @enderror " name="email" value="{{Auth::check() ?  Auth ::user()->email :''}}" required autocomplete="name" autofocus>
                    
                    Shipping Address *

                    <input id="shipping_address" type="text" class="inputCommon @error('shipping_address') errorinput @enderror " name="shipping_address" value="{{Auth::check() ?  Auth ::user()->shipping_address :''}}" required autocomplete="name" autofocus>
              

                    Message 

                    <input id="shipping_address" type="text" class="inputCommon @error('message') errorinput @enderror " name="message" value="" required autocomplete="name" autofocus>

       
                     Payment method *
                     <select class="commonSelect" name="payment_id" id="payments" required >
                        <option value="" >Select a payment method</option> 
                        <option value="1" >Cash On Delivery</option> 
                      
                   

                </select>



                <button type="submit" class="btn btn-sm btn-danger mt-3 w-100 " >PLACE ORDER</button>


            </form>


                </div>


            </div>

            <div class="col-md-4">

                <p>Order summery</p>

                <div style="height:200px;overflow:scroll ;overflow-x: hidden;" >


                    @if($carts)

                    @php
                    $totalprice=0;
                    @endphp
        
        
                        @foreach ($carts as $cart )
    
                        <div  class="custom-card-white" >
                         
                            <div class="row">
                                  <div  class="col-3">
        
                                    <div id="imageHolder" style="height: 80px ; position: relative;" >
                                        <img  style="max-width: 100%;
                                        max-height: 100%;  
                                        position: absolute;
                                        margin:auto;
                                        top:0;
                                        bottom:0;
                                        left:0;
                                        right:0;"  src="{{asset('image/product/'.$cart->product->image)}}">
                                      </div>
        
        
        
        
                                  </div>
                                  <div class="col-9 p-2">
                                          <p class="mp-0 " >{{$cart->product->title}} </p>
                                          <p class=" mp-0 " >Quantity:{{$cart->product->quanity}} </p>
                                          <p class=" mp-0 " >Price: &#2547; {{$cart->product->price  * $cart->product_quantity}} </p>
                                  
                                       
        
                          
                                  </div>
        
                        
        
        
                            </div>
                            
                           
                             
        
        
        
        
                        </div>


                        @php
                    
                        $totalprice +=  $cart->product->price  * $cart->product_quantity
    
                       @endphp
    
    
    
                        @endforeach
                     
                     
                        
                    @endif



                </div>

                <div class="p-3" >


                   <p class="boldFont" >Subtotal : &#2547; {{$totalprice}}</p> 

                  <p>Discunt :</p>  


                  <hr>

                  <p class="boldFont" >Total : &#2547; {{$totalprice}}</p> 

                  <button class="btn btn-sm btn-warning  w-100 " ><a class="text-white" href="{{route('carts.index')}}">Change item</a></button>



  


                </div>



             
    


            </div>



        </div>


     

    </div>


</div>




@endsection