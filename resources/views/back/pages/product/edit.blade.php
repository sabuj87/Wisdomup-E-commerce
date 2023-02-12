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
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

           
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('products.update',$product->id)}}" method="POST"  enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product short Title(50 charecter)*</label>
                                <input type="text" name="title" value="{{$product->title}}" onkeyup="change(this)" class="form-control" id="category_name" required placeholder="Enter title">
                             
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Product long Title*</label>
                              <input type="text" name="longtitle" value="{{$product->longtitle}}"  class="form-control" id="category_name"  placeholder="Enter long title">
                           
                          </div>

                        </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug*</label>
                                    <input type="text" id="slug" value="{{$product->slug}}" name="slug" class="form-control" required placeholder="Enter slug title">
                               

                                </div>

                            </div>


                        <div class="col-lg-6" >

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product price*</label>
                            <input type="number" name="price" value="{{$product->price}}" class="form-control" id="category_name" required placeholder="Enter a price">
                     

                        </div>

                          <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control select2"  name="brandid" style="width: 100%;">
                                <option value="0" >Select a brand</option>
                                @if($brands)
                                @foreach($brands as $key => $brand)
                                <option 

                                @if($product->brand !=null)
                                @if($product->brand->name == $brand->name)
                                selected
                                @endif
                                @endif
                                
                             
                                value="{{$brand->id}}" >{{$brand->name}}</option>
                                @endforeach
                                @endif

                            </select>
                          </div>
                          <div class="form-group">
                            <label>Offer</label>
                            <select class="form-control" name="offer" style="width: 100%;">

                               

                              <option value="1" 
                              
                              @if($product->offer==1)
                              selected
                              @endif
                              >Enable</option>
                              <option 
                              @if($product->offer==0)
                              selected
                              @endif
                              
                              value="0" >Disable</option>

                            </select>
                          </div>
                          <div class="form-group">
                            <label for="description">Quantity*</label>
                            <input type="number" value="{{$product->quantity}}"  name="quantity" class="form-control" id="quantity" required placeholder="Enter quantity">


                        </div>
                        <div class="form-group">
                          <label>Collection</label>
                          <select class="form-control select2"  name="collectionid" style="width: 100%;">
                  
                              @if($collections)
                              @foreach($collections as $key => $collection)
                              <option   
                              
                              @if($product->collection !=null)
                              @if($product->collection->name == $collection->name)
                              selected
                              @endif
                              @endif 
                              
                              
                              
                              value="{{$collection->id}}" >{{$collection->name}}</option>
                              @endforeach
                              @endif

                        
                          </select>
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" required name="categoryid" style="width: 100%;">
                    
                                @if($categories)
                                @foreach($categories as $key => $category)
                                <option   
                                
                                @if($product->category !=null)
                                @if($product->category->name == $category->name)
                                selected
                                @endif
                                @endif 
                                
                                
                                
                                value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                                @endif

                          
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Seller</label>
                            <select class="form-control select2" name="sellerid" style="width: 100%;">
                                <option value="0" >Select a seller</option>
                                @if($sellers)
                                @foreach($sellers as $key => $seller)
                                <option  
                                @if($product->seller !=null)
                                @if($product->seller->name == $seller->name)
                                selected
                                @endif
                                @endif
                                value="{{$seller->id}}" >{{$seller->name}}</option>
                                @endforeach
                                @endif
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Offer price*</label>
                            <input type="number" value="{{$product->offerprice}}" name="offerprice" class="form-control" id="offerprice" placeholder="Enter a price">
                        
                        </div>




                          <div class="form-group">
                            <label>Place</label>
                            <select class="form-control" name="place" style="width: 100%;">
                              @if($places)
                              @foreach($places as $key => $place)
                              <option  
                              @if($product->place !=null)
                              @if($product->place->name == $place->name)
                              selected
                              @endif
                              @endif
                              value="{{$place->id}}" >{{$place->name}}</option>
                              @endforeach
                              @endif

                            </select>
                          </div>



                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                       <label for="exampleInputEmail1">Description</label>
                       <textarea name="description" id="editor1" rows="5" style="width: 100%;" >{{$product->description}}</textarea>
                   

                   </div>





                   </div>
                   <div class="col-lg-12">
                    <div class="form-group">
                   <label for="exampleInputEmail1">Specification</label>
                   <textarea  name="specification" id="editor2" rows="3" style="width: 100%;" >{{$product->specification}}</textarea>
               

               </div>





               </div>

                   <div  class="col-lg-12">
                    <div class="whitebg radius5"  >

                        <label class="d-block">Product images</label>




                        <div class="row">
                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg1.src=window.URL.createObjectURL(this.files[0])" type="file" name="image[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg1" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg2.src=window.URL.createObjectURL(this.files[0])" type="file" name="image[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">

                                <span class="input-group-text">
                                  <img id="pimg2" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg3.src=window.URL.createObjectURL(this.files[0])" type="file" name="image[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg3" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mt-2">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg4.src=window.URL.createObjectURL(this.files[0])" type="file" name="image[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg4" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mt-2">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg5.src=window.URL.createObjectURL(this.files[0])" type="file" name="image[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg5" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>



                        </div>

                        <label class="d-block mt-2">Description Images</label>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg20.src=window.URL.createObjectURL(this.files[0])" type="file" name="imaged[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg20" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg21.src=window.URL.createObjectURL(this.files[0])" type="file" name="imaged[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg21" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg22.src=window.URL.createObjectURL(this.files[0])" type="file" name="imaged[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg22" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mt-2">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg23.src=window.URL.createObjectURL(this.files[0])" type="file" name="imaged[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg23" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mt-2">
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg25.src=window.URL.createObjectURL(this.files[0])" type="file" name="imaged[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg25" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                          </div>



                        </div>



                        <label class="d-block mt-4">Product color</label>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="description">Color 1</label>
                              <input type="text" name="colorname[]" class="form-control"   placeholder="Enter color name">
                              
  
                          </div>


                          </div>

                          <div class="col-md-6">
                            <label for="description">Color 1 image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg7.src=window.URL.createObjectURL(this.files[0])" type="file" name="colorimage[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg7" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                    


                          </div>



                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="description">Color 2</label>
                              <input type="text" name="colorname[]" class="form-control"   placeholder="Enter color name">
                              
  
                          </div>


                          </div>

                          <div class="col-md-6">
                            <label for="description">Color 2 image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input onchange="pimg8.src=window.URL.createObjectURL(this.files[0])" type="file" name="colorimage[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg8" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                    


                          </div>



                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="description">Color 3</label>
                              <input type="text" name="colorname[]" class="form-control"   placeholder="Enter color name">
                              
  
                          </div>


                          </div>

                          <div class="col-md-6">
                            <label for="description">Color 3 image</label>
                            <div class="input-group">
                              <div class="custom-file ">
                                <input onchange="pimg9.src=window.URL.createObjectURL(this.files[0])" type="file" name="colorimage[]" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <img id="pimg9" onerror="this.src='{{asset('image/other/default.png')}}'"   height="24px" width="24px" src="" alt="">

                                    
                              </span>
                              </div>
                            </div>
                    


                          </div>



                        </div>








                     </div>
                       <label class="d-block mt-2">Thumbnail*</label>
                  
                       <div class="input-group">
                        <div class="custom-file">
                          <input onchange="pimg6.src=window.URL.createObjectURL(this.files[0])" type="file" name="thumb" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose Thumbnail</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <img id="pimg6" onerror="this.src='{{asset('image/other/default.png')}}'"  src="{{asset('image/product/'.$product->image)}}"  height="24px" width="24px" src="" alt="">

                              
                        </span>
                        </div>
                      </div>


                    </div>


                     </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update product</button>
                    </div>
                </form>
            </div>




        </div><!-- /.container-fluid -->
    </div>





@endsection
