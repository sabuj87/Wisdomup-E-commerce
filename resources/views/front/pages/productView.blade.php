@extends('front.layouts.master')
@section('content')

<div class="row" >

    <div class="col-md-1 ">
       @if($product)
       @foreach ($product->images as $image )
       <img class="imgview" style="max-height:100px" src="{{asset('image/product/'.$image->image)}}"  class="w-100 pe-3 mb-2 border" src="" alt="">
         
           
       @endforeach



       @endif



    </div>
      
    <div id="wrap" class="col-md-4">
        <img id="imgbig" style="max-height:400px" src="{{asset('image/product/'.$product->image)}}"  class="w-100  mb-2 border" src="" alt="">
     
        
    </div>
    <div class="col-md-7">
        <h3 class="text-justify boldFont">{{$product->longtitle}}</h3>
        <a  href="{{route('category.product',$product->category->id)}}"><p class="mp-0" >{{$product->category->name}}</p></a>
        <i class="fa-regular fa-star colorGreen "></i>
        <i class="fa-regular fa-star colorGreen "></i>
        <i class="fa-regular fa-star colorGreen "></i>
        <i class="fa-regular fa-star colorGreen "></i>
        <i class="fa-regular fa-star colorGreen "></i> 
         4.9 | 17 reviews
        
         <div class="row">
              <div class="col-md-6">
                <hr>

                @if($product)

                <div class="row">

             
                @foreach ($product->colors as $color )

                <div class="col-lg-4">
                  <img class="imgview" style="max-height:100px;max-width:100px" src="{{asset('image/product/color/'.$color->image)}}"  class=" ms-2 mb-2 border" src="" alt="">
                  <p class="text-center" >{{$color->color_name}}</p> 
                     

                </div>
              
                @endforeach
         
         
              </div>
                @endif

       

                <hr class="mt-4" >
              </div>
              <div class="col-md-6 ">

                <div class="bg-gray-lite rd-10 p-3"  >
                
                    <h2 class="">  <span class="text-danger" > Rs @if ($product->offerprice!=null)
                      {{$product->offerprice}}  </span> <span><s>{{$product->price}}</s></span> @else  {{$product->price}} </span>
                    @endif</h2>
                    @if ($product->offerprice!=null)
                    <p><span class="colorGreen" >       
                      @php
                        $off=$product->offerprice;
                        $price=$product->price;
                        $rest=$price-$off;
                        $result=($rest*100)/$price;
						$round=round($result,2) ;

                      @endphp
                      
                     You save {{$round}} %</span> </p>

                    @endif
                    @if($product->quantity>0)
                    <p class="bg-gray p-2"><span class="colorGreen" ><strong> In stock</strong></span></p>
                    @else
                    <p class="bg-gray p-2"><span class="text-danger" ><strong> Out of stock</strong></span></p>

                    @endif
                    <form action="{{route('carts.store')}}" method="POST" >
                    <span style="width: 100px" class="border p-2 " > <h4 onclick="dcrease()" class="d-inline  " >-</h4><input name="product_quantity" id="quan" style="width: 50px;margin:0px 10px;border:none;background:none;text-align:center" value="1" type="number"> <h4 onclick="increase()" id="pbtn" class="d-inline  " >+</h4> </span> &nbsp;&nbsp; Quantity


                      @csrf
                   <input type="hidden"  name="product_id" value="{{$product->id}}">
        
                   
                         <button style="" type="submit" class="btn btn-danger mt-3 w-100 boldFont" >Add to cart</button>
            
               
                  
           
                  </form>
                    <button class="btn btn-outline-danger w-100 mt-3 boldFont " >BUY NOW</button>

                </div>
         
                 

              </div>





         </div>




        </div>
    </div>

    <ul class="nav justify-content-center nav-tabs mt-3" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active boldFont" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link boldFont" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Specification</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link boldFont " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Reviews</button>
      </li>
     
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

      
          {!! $product->description !!}



          @foreach ($product->desimages as $image )
          <div class=" fadeInUp  text-center" >

         
          <img  style="max-height:600px" src="{{asset('image/product/'.$image->image)}}"  class="w-100  border" src="" alt="">
               
          </div>
              
          @endforeach
   







     
      </div>
      <div class="tab-pane fade p-5" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        
        {!! $product->specification !!}

      </div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

          Reviews

      </div>
         
    </div>

   



</div>
<h4 class="mt-3 ms-2 " style="font-weight: 700 ;" >RELATED PRODUCT</h4>
<div  class="outer_wrapper p-3" >

  <div class="inner_wrapper row " >

    @foreach($catproducts as $product)
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
@endsection