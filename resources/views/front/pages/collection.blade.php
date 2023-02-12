<div class="mt-4 row" >
  @foreach($collection->products->take(5) as $product)
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


