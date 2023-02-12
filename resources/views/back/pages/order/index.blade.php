
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
                            <h3 class="card-title">All Order</h3>





                        </div>

                        <div class="card-body" >


                          

                          <table  class="table datatTable  text-center" >

                            <thead>
                    
                            <tr>
                                <th>Order ID</th>
                                <th>Order name</th>
                                <th>Phone no</th>
                                <th>Order status</th>
                            
                                <th>Action</th>
                              </tr>
                    
                          
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                          
                              <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->phone_no}}</td>
                                <td>
                           
                                        @if($order->is_seen_by_admin)
                                         <button class="btn btn-sm btn-success" >Seen</button>
                                         @else
                                         <button class="btn btn-sm btn-danger" >Unseen</button>
                     
                                         @endif
                                      
                                    
                                        @if($order->is_completed)
                                         <button class="btn btn-sm btn-success" >Completed</button>
                                         @else
                                         <button class="btn btn-sm btn-danger" >Not Completed</button>
                     
                                         @endif
                                  
                                     
                                         @if($order->is_paid)
                                         <button class="btn btn-sm btn-success" >Paid</button>
                                         @else
                                         <button class="btn btn-sm btn-danger" >Unpaid</button>
                     
                                         @endif
                     
                                       
                                   
                                  
                                </td>
                                <td>
                                <a href="{{route('orders.view',$order->id)}}"  class="btn btn-sm btn-secondary"  >View</a>
                                <a href="#deleteModal{{$order->id}}" data-toggle="modal" class=" btn btn-sm btn-danger"  >Delete</a>
                                  <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete?</h5>
                                          <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                          </button>
                                        </div>
                                 
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                                          <form action="{{route('admin.order.delete',$order->id)}}" method="post" >
                                            @csrf
                                            <button type="submit" class="theme-btn">Delete</button>
                                          </form>
                                       
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                    
                                </td>
                                
                              </tr>
                           
                              @endforeach
                            </tbody>
                       
                            </table>
                        

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





