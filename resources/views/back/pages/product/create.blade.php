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
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

           
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('products.store')}}" method="POST"  enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Title*</label>
                                <input type="text" name="title" class="form-control" id="category_name" required placeholder="Enter title">
                             
                            </div>

                        </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug*</label>
                                    <input type="text" name="slug" class="form-control" id="category_name" placeholder="Enter title">
                               

                                </div>

                            </div>


                        <div class="col-lg-6" >

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product price*</label>
                            <input type="number" name="price" class="form-control" id="category_name" placeholder="Enter a price">
                     

                        </div>

                          <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control" name="brandid" style="width: 100%;">
                              <option value="0" selected="selected">Brand1</option>
                              <option value="1" selected="selected">Brand2</option>

                            </select>
                          </div>
                          <div class="form-group">
                            <label>Offer</label>
                            <select class="form-control" name="offer" style="width: 100%;">
                              <option value="0" selected="selected">Enable</option>
                              <option value="1" selected="selected">Disable</option>

                            </select>
                          </div>
                          <div class="form-group">
                            <label for="description">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="description" placeholder="Enter quantity">


                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" required name="categoryid" style="width: 100%;">
                             
                                @if($categories)
                                @foreach($categories as $key => $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                                @endif

                          
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Seller</label>
                            <select class="form-control" name="sellerid" style="width: 100%;">
                              <option value="0" selected="selected">Seller1</option>
                              <option value="1" selected="selected">Seller2</option>

                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Offer price*</label>
                            <input type="number" name="offerprice" class="form-control" id="offerprice" placeholder="Enter a price">
                        
                        </div>




                          <div class="form-group">
                            <label>Place</label>
                            <select class="form-control" name="place" style="width: 100%;">
                              <option value="0" selected="selected">Popular</option>
                              <option value="1" selected="selected">Trendy</option>

                            </select>
                          </div>



                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                       <label for="exampleInputEmail1">Description</label>
                       <textarea  name="description" id="editor" rows="5" style="width: 100%;" ></textarea>
                   

                   </div>





                   </div>

                   <div  class="col-lg-12">
                    <div class="whitebg radius5"  >

                        <label class="d-block">Product images</label>

                        <label for="pimage1">
                          <div style="position: relative; display: inline-block">
                              <img id="pimg1" onerror="this.src='{{asset('image/other/default.png')}}'"  style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

                            <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                             <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <input onchange="pimg1.src=window.URL.createObjectURL(this.files[0])" name="image[]" id="pimage1" class="show" type="file">

                          </div>

                        </label>
                        <label for="pimage2">
                          <div style="position: relative; display: inline-block;margin-left: 10px;">
                              <img  id="pimg2" onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

                            <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                             <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <input onchange="pimg2.src=window.URL.createObjectURL(this.files[0])" name="image[]" id="pimage2" class="show" type="file">

                          </div>

                        </label>
                        <label for="pimage3">
                          <div style="position: relative; display: inline-block;margin-left: 10px;">
                              <img id="pimg3" onerror="this.src='{{asset('image/other/default.png')}}'"  style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

                            <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                             <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <input onchange="pimg3.src=window.URL.createObjectURL(this.files[0])" name="image[]" id="pimage3" class="show" type="file">

                          </div>

                        </label>
                        <label for="pimage4">
                          <div style="position: relative; display: inline-block;margin-left: 10px;">
                              <img id="pimg4" onerror="this.src='{{asset('image/other/default.png')}}'"  style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

                            <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                             <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <input onchange="pimg4.src=window.URL.createObjectURL(this.files[0])" name="image[]"  id="pimage4" class="show" type="file">

                          </div>

                        </label>

                        <label  for="pimage5">
                          <div style="position: relative; display: inline-block;margin-left: 10px;">
                              <img id="pimg5"  onerror="this.src='{{asset('image/other/default.png')}}'"   style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

                            <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                             <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <input onchange="pimg5.src=window.URL.createObjectURL(this.files[0])" name="image[]"  id="pimage5" class="show" type="file">

                          </div>

                        </label>





                     </div>
                       <label class="d-block">Thumbnail</label>
                       <label  for="pimage6">
                           <div style="position: relative; display: inline-block;">
                               <img id="pimg6"  onerror="this.src='{{asset('image/other/default.png')}}'"   style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

                               <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                                   <i class="fa-solid fa-folder-open"></i>
                               </div>
                               <input onchange="pimg6.src=window.URL.createObjectURL(this.files[0])" name="thumb"  id="pimage6" class="show" type="file">

                           </div>

                       </label>




                    </div>


                     </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add product</button>
                    </div>
                </form>
            </div>




        </div><!-- /.container-fluid -->
    </div>


@endsection
