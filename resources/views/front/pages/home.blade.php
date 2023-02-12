@extends('front.layouts.master')
@section('content')
<div class="row bg-gray dnone mx-1 mb-2" >
<div class="colc-2-1 p-2 " style="display: flex" >
  <img height="40px" width="40px" src="{{asset('image/icon/warranty.png')}}" alt="">
  <p class="mt-2" > 1 year official warranty</p>


</div>
<div class="colc-2-1 p-2 " style="display: flex" >
  <img height="40px" width="40px" src="{{asset('image/icon/replace.png')}}" alt="">
  <p class="mt-1 ms-1" > 
    FREE 7 DAYS REPLACEMENT</p>


</div>
<div class="colc-2-1 p-2 " style="display: flex" >
  <img height="40px" width="40px" src="{{asset('image/icon/shipping.png')}}" alt="">
  <p class="mt-2 ms-2" > 
    FREE
    SHIPPING</p>


</div>
<div class="colc-2-1 p-2 " style="display: flex" >
  <img height="40px" width="40px" src="{{asset('image/icon/checkout.png')}}" alt="">
  <p class="mt-2 ms-2" > 
SECURE
CHECKOUT</p>


</div>

<div class="colc-2-1 p-2 " style="display: flex" >
  <img height="40px" width="40px" src="{{asset('image/icon/bill.png')}}" alt="">
  <p class="mt-2 ms-2" > 
    GST
    BILLING</p>


</div>
  

</div>

<div id="sliderFront" style="z-index: -1" class="owl-carousel owl-theme " >
  @if($sliders)
        @foreach ( $sliders as $slider )

        <div class="slideItem"   > 
          <div class="sliderHolder" >
            <img src="{{asset('image/slider/'.$slider->image)}}"   class="d-block sildeImage w-100 " alt="...">
            
          <div class="titleBox" >
           <h4 class="font200 yellow-text boldFont" >{{$slider->title}}</h4>
             @if($slider->button_text!=null)
           <button class="btn btn-danger font150" >{{$slider->button_text}}</button>
             @endif
      
          </div>
            
          
          </div>
        </div>

        @endforeach

  @endif


</div>


  <h5 class="mt-2 " style="font-weight: 700" >SHOP BY CATEGORY</h5>
  @if($categories)
  <div  class="outer_wrapper" >

    <div class="inner_wrapper row " >


  @foreach($categories as $key => $category)

  
    <div class="colca-1-1 mt-1">
      <a href="{{route('category.product',$category->id)}}">

      
     <div class=" p-1" >
      <div id="imageHolder" style="height: 80px ; position: relative;" >
        <img  style="max-width: 100%;
        max-height: 100%;  
        position: absolute;
        margin:auto;
        top:0;
        bottom:10px;
        left:0;
        right:0;"  src="{{asset('image/category/'.$category->icon)}}">

      <div style="height: 40px;background-color:rgb(222, 222, 222);position: absolute;  bottom:0;
      left:0; right:0;z-index:-1;border-radius:10px" class="" >


      </div>
      </div>


      <p title="{{$category->name}}" style="font-weight: 700 " class="text-center mt-3" >{{Str::limit($category->name,14)}}</p>


  

     </div>
    </a>
  
     




    </div>



   



  @endforeach
</div>

  </div>

<h5 class="mt-2 " style="font-weight: 700" >BEST OF WISDOMUP</h5>
@if($collections)
<div   class="mt-4">

  <div  class="outer_wrapper" >

    <div class="inner_wrapper   " >

      @foreach ($collections as $collection )


<a style="height: 40px;background-color:rgb(222, 222, 222);padding:10px; border-radius:25px;margin:10px 5px;font-weight: 700;display:inline-block" class="itemnavr"  href="{{route('collection.product',$collection->id)}}" >  <span>{{$collection->name}}</span> </a>




@endforeach
  
    </div>
  </div>
  

</div>

<div  class="outer_wrapper" >

  <div class="inner_wrapper row content " >

  </div>

</div>




@endif



{{-- <div class="d-flex justify-content-center">
  {!! $categories->links() !!} 33
</div> --}}
  @endif

 
  

    @if($places)

    @foreach ($places as $place )
    <div style="bg-gray" >

      <h4 class="mt-5 " style="font-weight: 700 ;display:inline;float:left" >{{$place->name}}</h4>
      <a href="{{route('home.page',$place->id)}}" class="mt-5   " style="font-weight: 700;display:inline;float:right;margin-right:20px" >View all..</a>
      <div style="clear: both" ></div>
  
    </div>
    

    <div  class="outer_wrapper" >

      <div class="inner_wrapper row " >

        @foreach($place->products->take(8) as $product)
        <div class="colc-2-1 ">
         <a href="{{route('product.show',$product->slug)}}">
          <div class="bg-gray p-2 mt-2 rd-10 " >
      
            <div id="imageHolder" style="height: 190px ; position: relative;" >
              <img  style="max-width: 100%;
              max-height: 100%;  
              position: absolute;
              margin:auto;
              top:0;
              bottom:0;
              left:0;
              right:0;"  src="{{asset('image/product/'.$product->image)}}">
            </div>
    
            <div class="bg-white2 p-3 mt-2 rd-10 " >
               
              <h6 class="boldFont  " >{{Str::limit($product->title,17)}}</h6>
           
  
  
              <span class="colorGreen" >  
                @if ($product->offerprice!=null)
                @php
                  $off=$product->offerprice;
                  $price=$product->price;
                  $rest=$price-$off;
                  $result=($rest*100)/$price;
          $round=round($result,2) ;
  
                @endphp
                
               {{ $round}} % off</span> 
  
              @endif | <span class="boldFont"> Rs @if ($product->offerprice!=null) {{$product->offerprice}}  <span class="text-danger"><s>{{$product->price}}</s></span> @else {{$product->price}}   @endif</span>
  
              <hr>
              <p class="mp-0">4.9 | 54 Reviews</p>
              <p class="mp-0">15% extra discount</p>
              <form   action="{{route('carts.store')}}" method="post" >
                @csrf
             <input type="hidden" name="product_id" value="{{$product->id}}">
  
             
                   <button type="submit" class="btn btn-warning mt-2 w-100  boldFont" >Add to cart</button>
      
         
            
     
            </form>
  
         
  
  
       
    
    
            </div>
      
           
      
      
      
          </div>
      
      
      
      
      
        </a>
         </div>
        
  
       
         
  
  
  
  
  
        @endforeach
  

        
      </div>

 

        




   

       


    </div>

   
 


    
    
    
    
    
     

 
      
    @endforeach
  
    



    @endif

   




  
  <div class="d-flex justify-content-center">
    {{-- {!! $productsDailyDeals->links() !!} --}}
</div>



<!-- Modal -->
<div id="cartmodal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p class="text-success text-center boldFont" ><i class="fa-solid fa-check"></i> &nbsp;&nbsp;Product added to cart</p>
      </div>
  

      <button type="button" class="btn btn-warning btn-sm boldFont text-white"><a href="{{route("carts.index")}}" >View</a></button>
      
    </div>
  </div> 
</div>

  <div class="row mt-5 " >
   <div class="col-md-3 mt-2 " >
    <div style="height: 250px" >
      <img class="w-100" src="{{asset('image/banner/bannar1.jpg')}}" alt="">




  </div>



   </div>
   <div class="col-md-3 mt-2" >
       <div style="height: 250px" >
           <img class="w-100" src="{{asset('image/banner/bannar3.jpg')}}" alt="">
  



       </div>



   </div>
   <div class="col-md-3 mt-2" >
    <div style="height: 250px" >
        <img class="w-100" src="{{asset('image/banner/bannar2.jpg')}}" alt="">




    </div>



</div>

<div class="col-md-3 mt-2 " >
  <div style="height: 250px" >
      <img class="w-100" src="{{asset('image/banner/bannar3.jpg')}}" alt="">




  </div>



</div>


  </div>







@endsection

