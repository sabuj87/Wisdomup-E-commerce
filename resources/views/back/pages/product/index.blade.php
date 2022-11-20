@extends('back.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                            <h3 class="card-title">Products</h3>


                        </div>

                        <div class="card-body" >
                            <a href="{{route('products.create')}}" class="btn btn-primary" > <i class="fa fa-plus" ></i> Add product</a>

                            <table class="table dataTable">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>
                                @if($products)
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$product->title ?? ''}}</td>
                                            <td>{{$product->price ?? ''}}</td>
                                            <td>{{$product->quantity ?? ''}}</td>
                                            <td><img src="{{asset('image/product/'.$product->title.'/'.$product->image)}}" height="80px" width="80px" ></td>
                                            <td>
                                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-edit" ></i>   Edit

                                                </a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$product->id}}" >
                                                    <i class="fa fa-trash" ></i>   Delete

                                                </a>

                                                <form id="category-delete-{{$product->id}}" action="{{route('products.destroy',$product->id)}}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                @endif

                                </tbody>


                            </table>

                        </div>


                    </div>


                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection
