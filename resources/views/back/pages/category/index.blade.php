@extends('back.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                            <h3 class="card-title">Category list</h3>


                        </div>

                        <div class="card-body" >
                            <a href="{{route('categories.create')}}" class="btn btn-primary" > <i class="fa fa-plus" ></i> Add category</a>
                            
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
                                @if($categories)
                                    @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$category->name ?? ''}}</td>
                                            <td><img onerror="this.src='{{asset('image/other/default.png')}}'" src="{{asset('image/category/'.$category->icon)}}" height="40px" width="40px" ></td>

                                            <td>
                                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-info" >
                                                 <i class="fa fa-edit" ></i>   Edit

                                                </a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$category->id}}" >
                                                    <i class="fa fa-trash" ></i>   Delete

                                                </a>

                                                <form id="category-delete-{{$category->id}}" action="{{route('categories.destroy',$category->id)}}" method="POST" >
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

                        <div class="d-flex justify-content-center">
                            {!! $categories->links() !!} 
                          </div>


                    </div>


                </div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection
