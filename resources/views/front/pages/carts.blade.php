@extends('front.layouts.master')
@section('content')
 

<div class="row" >


    <div class="col-md-6 m-auto p-2 ">
        <div class="p-2" style="background-color: red">

            <h5 class="text-white mt-1 boldFont">Cart Items</h5>
        
        
           </div>

        <div class="custom-card p-2" >

            @if($carts)

            @php
            $totalprice=0;
            @endphp


                @foreach ($carts as $cart )


                <div class="custom-card-white p-2 m-2" >
                     
                    <div class="row">
                          <div class="col-3">

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
                          <div class="col-6 p-2">
                                  <p class="boldFont mp-0 " >{{$cart->product->title}} </p>
                                  <p class="boldFont mp-0 text-danger font120 " >&#2547; {{$cart->product->price}} </p>
                                  <div class="mt-2" >
                                     <span onclick="valueupdatem({{$cart->id}},{{$cart->product->price}})" class="rd25 p-1" ><i class="fa-solid fa-minus"></i></span>
                                      <form class="d-inline" action="{{route('carts.update',$cart->id)}}" method="POST" >
                                       
                                        @method('PUT')
                                        @csrf
                                        <input name="product_quantity" id="quantity{{$cart->id}}" style="border: none ;width:50px;text-align:center;" value="{{$cart->product_quantity}}" type="text">
                                    
                                     <span onclick="valueupdate({{$cart->id}},{{$cart->product->price}})" class="rd25 p-1" ><i class="fa-solid fa-plus"></i></span> 
                                     <button type="submit" class="btn btn-sm btn-danger ms-4" >Update</button>
                                    </form> 

                                 </div>

                  
                          </div>

                          <div class="col-3 p-2">
                            <p class="boldFont mp-0 font80 " >Total amount</p>
                          <span class="boldFont  mp-0 text-danger font120 " >&#2547;</span> <span id="total{{$cart->id}}" class="boldFont  mp-0 text-danger font120 " >{{$cart->product->price  * $cart->product_quantity}} </span>
                            
                          <form  action="{{route('carts.destroy',$cart->id)}}" method="post" >
                            @csrf

                            @method('DELETE')

                             <input type="hidden" value="{{$cart->id}}" name="cart_id" class="form-control" >
                             <button  type="submit" class="btn" style="background-color:transparent">
                                <i class="fa-solid mt-3 fa-trash color-gray "></i>
                      
                             </button>
                      
                      
                          </form>
                          
                          <div></div>
            
                        </div>


                    </div>
                    
                   
                     




                </div>

                @php
                    
                    $totalprice +=  $cart->product->price  * $cart->product_quantity

                @endphp
                    
                @endforeach




                <div class="custom-card-white p-2 m-2">
                   <h5 class="d-inline me-3 boldFont " >Total Price :</h5>  <span class="boldFont  mp-0 text-danger font120 " >&#2547;</span> <h5 class="d-inline me-3 boldFont text-danger " >{{$totalprice}}</h5>



                </div>

                <div class="row p-2  " >

                    <div class="col-6">
                         <button class="btn btn-warning w-100" ><a href="">Continue Shoping</a></button>

                    </div>
                    <div class="col-6">
                        @if(Auth::user())

                        <button class="btn btn-danger  boldFont w-100" ><a class="text-white" href="{{route('checkouts')}}">CHECKOUT</a></button>
                       
                       @else
                       <form action="{{route('login')}}" method="GET">

                        @csrf
                        <input type="hidden" name="checkout" value="1" >


                        <button type="submit" class="btn btn-danger  boldFont w-100" >CHECKOUT</button>




                       </form>
                      


                        @endif

                        
                    </div>
 


                </div>




            @endif


          


        </div>



    </div>


</div>




@endsection