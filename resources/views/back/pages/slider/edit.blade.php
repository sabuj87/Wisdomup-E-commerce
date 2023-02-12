@extends('back.layouts.master')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sliders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a >Home</a></li>
                        <li class="breadcrumb-item active">Slider edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="maincontent">
        <div class="container-fluid">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Slider</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">


                                <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider title</label>
                                    <input type="text" name="title" value="{{$slider->title}}" class="form-control"  id="title" placeholder="Enter slider title">
                                    @if($errors->has('title'))
                                        <p class="text-danger ">{{$errors->first('title')}}</p>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="url" value="{{$slider->url}}" class="form-control" id="category_name" placeholder="Enter url">


                                </div>
                                  <div class="form-group">
                                    <label for="description">Priorty</label>
                                    <input type="number" name="priorty" value="{{$slider->priority}}" class="form-control" id="priorty" placeholder="Priority">


                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image(1200x400)</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" name="image"  class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose slider image</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Button Text</label>
                                    <input type="text" name="btnText" value="{{$slider->button_text}}" class="form-control" id="btnText" placeholder="Enter button Text">

                                
                                  </div>
                                  <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" style="width: 100%;">
                                      <option value="1" 
                                        

                                      @if($slider->status==1)
                                      selected
                                      @endif
                                      
                                      >Active</option>
                                      <option value="0" 
                                        
                                      @if($slider->status==0)
                                      selected
                                      @endif
                                      
                                      >Disable</option>

                                    </select>
                                  </div>
                              



                            </div>
                             </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>






            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



@endsection

    

