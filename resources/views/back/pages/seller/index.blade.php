@extends('back.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sellers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Sellers</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="maincontent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Seller list</h3>


                        </div>

                        <div class="card-body" >
                            <a href="{{route('sellers.create')}}" class="btn btn-primary" > <i class="fa fa-plus" ></i> Add seller</a>

                            <table class="table dataTable">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>
                                @if($sellers)
                                    @foreach($sellers as $key => $seller)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$seller->name ?? ''}}</td>
                                            <td><img src="{{asset('image/seller/'.$seller->icon)}}" height="60px" width="60px" ></td>

                                            <td>
                                                <a href="{{route('sellers.edit',$seller->id)}}" class="btn btn-sm btn-info" >
                                                 <i class="fa fa-edit" ></i>   Edit

                                                </a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$seller->id}}" >
                                                    <i class="fa fa-trash" ></i>   Delete

                                                </a>

                                                <form id="category-delete-{{$seller->id}}" action="{{route('sellers.destroy',$seller->id)}}" method="POST" >
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
