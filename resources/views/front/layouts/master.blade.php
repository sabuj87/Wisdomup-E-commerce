<!DOCTYPE html>
<html lang="en">
<head>


@include('front.partial.head')

</head> 
<body>
   @if (Session::has('cart'))
   <div id="cart-panel" class="swipeRight" style="height:100vh;position:fixed;top:0;right:0;z-index:4;background-color:white;width:40%;overflow: scroll;" >
    <div class=" ">
        <div class="p-2" style="background-color: rgb(0, 0, 0);;display:flex">

            <h5 class="text-white mt-1 boldFont">Cart Items</h5>
            <i id="exitBtn" style="margin-left: 80%;font-size:120%" class="fa-solid fa-xmark mt-2 me-"></i>

            
        
        
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
                                  <p class="boldFont mp-0 text-danger font120 " >Rs {{$cart->product->price}} </p>
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
                          <span class="boldFont  mp-0 text-danger font120 " >Rs</span> <span id="total{{$cart->id}}" class="boldFont  mp-0 text-danger font120 " >{{$cart->product->price  * $cart->product_quantity}} </span>
                            
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
                   <h5 class="d-inline me-3 boldFont " >Total Price :</h5>  <span class="boldFont  mp-0 text-danger font120 " >Rs</span> <h5 class="d-inline me-3 boldFont text-danger " >{{$totalprice}}</h5>



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
       
   @endif 
  
<div class="p-2" >
    @include('front.partial.header')

</div>
<div class="px-4 " style="margin-top: 70px" >

    @include('front.partial.message')


    @yield('content')
    <div id="btNav" style="height: 60px;position:fixed;bottom:0;left:0;right:0;background-color:gainsboro;z-index:2" >
        <div class="row">
            <div class="colo-2-1 text-center">
               <a href=""> <i style="font-size: 130%;" class="fa-solid fa-house mt-3"></i></a>
                <p>Home</p>


            </div>
            <div class="colo-2-1 text-center">
                <a href="">  <i style="font-size: 130%;" class="fa-brands fa-sellsy mt-3"></i></a>
              
                <p>Sells</p>
           


            </div>
            <div class="colo-2-1 text-center">
                <a href="">  <i style="font-size: 130%;" class="fa-solid fa-layer-group mt-3"></i></a>
               
              
                <p>Category</p>
           


            </div>
            <div class="colo-2-1 text-center">
                <a href="">  <i style="font-size: 130%;" class="fa-solid fa-user mt-3"></i></a>
               
               
              
                <p>Me</p>
           


            </div>
            <div class="colo-2-1 text-center">
                <a href="">  <i style="font-size: 130%;" class="fa-solid fa-comment mt-3"></i></a>
               
               
              
                <p>Chat</p>
           


            </div>


        </div>

   
    </div>

</div>
@include('front.partial.footer')

@include('front.partial.scripts')
</body>
</html>