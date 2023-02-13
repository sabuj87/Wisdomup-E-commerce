@extends('front.layouts.master')
@section('content')


    @if($category)

     <h5 style="font-weight: bold "  class="mt-3 p-2 bg-gray" >{{$category->name}}</h5> 
     <div class="row p-3" >


 
     @foreach ($category->products as $product)
         <div class="col-md-3 mt-2 " >

            <a href="{{route('product.show',$product->slug)}}">



           
            <div class="card" >
                <div class="row">
                    <div class="col-5">
                      <div id="imageHolder" style="height: 100% ; position: relative;background-color:rgb(238, 238, 238)" >
                          <img  style="max-width: 100%;
                          max-height: 100%;  
                          position: absolute;
                          margin:auto;
                          top:0;
                          bottom:0;
                          left:0;
                          right:0;"  src="{{asset('image/product/'.$product->image)}}">
                        </div>
  
                    </div>
  
                    <div class="col-7  p-2  ">
                     
                            <h6 style="font-weight: bold " class="mt-2  w-100 " >{{$product->title}}</h6>
                            <p class="mp0" >4.9 | 144 reviews</p>
                            <p class="mp0  ">40% off  |<strong> {{$product->price}} BDT</strong></p>

                            <form id="cartformo"  action="{{route('carts.store')}}" method="post" >
                                @csrf
                             <input type="hidden" name="product_id" value="{{$product->id}}">
                  
                             
                                   <button  type="submit" class="btn btn-warning mt-3 px-4 boldFont" >Add to cart</button>
                      
                         
                            
                     
                            </form>
                            
                             
                        
                    


                  </div>
  
              </div>



            </div>
        
            </a>
         
            

         </div>
         


     @endforeach

    </div>




    @endif


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

