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
                        <li class="breadcrumb-item active">Category edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                        <div class="row">


                            <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name *</label>
                                    <input type="text" name="name"  value="{{$category->name}}"  class="form-control" id="category_name" required placeholder="Enter name">
                                    @if($errors->has('name'))
                                        <p class="text-danger ">{{$errors->first('name')}}</p>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control select2" name="parent_id" style="width: 100%;">
                                        <option value="0" >Primary Category</option>
                                        @if($categories)
                                            @foreach($categories as $key => $categoryall)
                                                <option @if($categoryall->id==$category->parent_id) selected @endif value="{{$categoryall->id}}" >{{$categoryall->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text"  value="{{$category->description}}" name="description" class="form-control" id="description" placeholder="Description">


                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Icon</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                          <input onchange="pimg5.src=window.URL.createObjectURL(this.files[0])" type="file" name="icon" class="custom-file-input" id="exampleInputFile">
                                          <label class="custom-file-label" for="exampleInputFile">Choose icon</label>
                                        </div>
                                        <div class="input-group-append">
                                          <span class="input-group-text">
                                            <img id="pimg5" onerror="this.src='{{asset('image/other/default.png')}}'" src="{{asset('image/category/'.$category->icon)}}"   height="24px" width="24px" src="" alt="">
          
                                              
                                        </span>
                                        </div>
                                      </div>
                      
                                </div>
                                <div class="form-group">
                                    <label>Show on Homepage</label>
                                    <select class="form-control" name="show" style="width: 100%;">
                                        <option value="1"
                                        
                                        @if($category->show_homepage==1)
                                        selected
                                        @endif
                                        
                                        
                                        >Enable</option>


                                        <option
                                        
                                        @if($category->show_homepage==0)
                                        selected
                                        @endif
                                        
                                        
                                        value="0">Disable
                                    
                                    
                                    
                                       </option>

                                    </select>
                                </div>



                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update category</button>
                    </div>
                </form>
            </div>






            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection
