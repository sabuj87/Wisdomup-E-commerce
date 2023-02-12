


@extends('back.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Order info</h3>





                        </div>

                        <div class="card-body" >
                          <div style="border-radius:10px" class="whitebg p-3 ">
                            <h4> Order info #{{$order->id}}</h4>
                          </div>
                           <div style="border-radius:10px" class="whitebg mt-3 p-3">
                  
                           
                            <div class="row">
                                <div class="col-md-6">
                                <p> <strong>Orderer Name : </strong>{{$order->name}} </p>
                                <p> <strong>Orderer Email : </strong>{{$order->email}} </p>
                                <p> <strong>Orderer Phone : </strong>{{$order->phone_no}} </p>
                                <p> <strong>Orderer Phone : </strong>{{$order->shipping_address}} </p>
                                </div>
                                <div class="col-md-6">
                                <p  > <strong>Order Payment Method : </strong>Cash On Delivery</p>
                                <p> <strong>Order Payment Transaction : </strong>{{$order->transaction_id}}</p>
                                </div>
                            </div>
                             
                           </div>
                           <div style="border-radius:10px" class="whitebg p-3 mt-3" >
                               @if($order->carts->count()>0)
                               <table class="table table-bordered text-center mt-4" >
                                  <thead>
                                      <tr>
                                           <th>No.</th>
                                           <th>Product Title</th>
                                           <th>Product Image</th>
                                           <th>Product quantity</th>
                                           <th>Unit Price</th>
                                           <th>Total Price</th>
                                           <th>Delete</th>
                                        
                                
                                
                                   
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                        $totalprice=0;
                                      @endphp
                                
                                
                                      @foreach($order->carts as $cart )
                                      <tr>
                                          <td>
                                            {{$loop->index+1}}
                                
                                          </td>
                                          <td>
                                
                                          <a href="{{route('product.show',$cart->product->slug)}}">{{$cart->product->title}}</a>
                                          
                                
                                          </td>
                                          <td>
                                
                                          @if($cart->product->images->count()>0)
                                          <img src="{{asset('image/product/'.$cart->product->images->first()->image)}}" alt="" height="50px" width="50px" >
                                          @endif
                                         
                                
                                          </td>/
                                      <td>
                                      <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post" >
                                      @method("PUT")
                                      @csrf
                                      <input style="display:inline-Block;width:150px" type="number" name="product_quantity" value="{{$cart->product_quantity}}" class="inputCommon" >
                         <button style="display:inline-Block;width:80px" type="submit" class="btn  btn-sm btn-primary" >
                           Update
                  
                         </button>
                                
                                
                                    </form>
                                
                                           
                                      </td>
                                      <td>
                                       {{$cart->product->price}}
                                
                                
                                      </td>
                                      <td>
                                        @php 
                                        $totalprice +=  $cart->product->price  * $cart->product_quantity
                                        @endphp
                                       {{ $cart->product->price  * $cart->product_quantity}}
                                
                                
                                      </td>
                                
                                      <td>
                                      <form class="form-inline" action="{{route('carts.destroy',$cart->id)}}" method="post" >
                                      @csrf
                                      @method('DELETE')
                                      
                                       <input type="hidden" value="{{$cart->id}}" name="cart_id" class="form-control" >
                                       <button  type="submit" class="btn  btn-sm btn-danger"" >
                                         Delete
                                
                                       </button>
                                
                                
                                    </form>
                                
                                           
                                      </td>
                                
                                      </tr>
                                      
                                      @endforeach
                                
                                      <tr>
                                        <td colspan="4" ></td>
                                        <td>
                                          Total Amount :
                                        </td>
                                        <td colspan="2" >
                                      <strong>  {{  $totalprice}} </strong>
                                        </td>
                                      </tr>
                                
                                  </tbody>
                                
                                
                                
                                 </table>
                               @endif
                               <hr>
                               <form class="mt-2"  action="{{route('admin.order.charge',$order->id)}}" method="POST" style="display:inline-block!important" >
                                @csrf
                                <label for="shipping_cost">Shipping Cost</label>
                                 <input  class="inputCommon" type="number" name="shipping_cost" value="{{$order->shipping_charge}}" id="shipping_cost"  >
                  
                                 <label for="custom_discount">Custom Discount</label>
                                 <input  class="inputCommon mb-3" type="number" name="custom_discount" value="{{$order->custom_discount}}" id="custom_discount"  >
                                <input  type="submit" value="Update" class="btn theme-btn"  > 
                               
                                
                               
                               </form>
                              
                               <hr>
                               <form class="mt-2" action="{{route('admin.order.completed',$order->id)}}" method="POST" style="display:inline-block!important" >
                                @csrf
                                @if($order->is_completed)
                                <input style="display:inline" type="submit" value="Cancle Order" class="btn theme-btn"  > 
                                @else
                                <input style="display:inline" type="submit" value="Complete Order" class="btn greenBtn"  > 
                  
                                @endif
                               
                               </form>
                               <form class="mt-2" action="{{route('admin.order.paid',$order->id)}}" method="POST">
                                  @csrf
                                  @if($order->is_paid)
                                  <input style="display:inline" type="submit" value="Cancle Payment" class="btn theme-btn"  > 
                                  @else
                                  <input style="display:inline" type="submit" value="Paid Order" class="btn greenBtn"  > 
                    
                                  @endif
                                 </form>
                              
                  
                             
                           </div>


                        

                        </div>

                        <div class="d-flex justify-content-center">
              
                          </div>


                    </div>


                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection












