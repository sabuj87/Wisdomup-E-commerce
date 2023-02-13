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
                        <li class="breadcrumb-item active">Slider create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="maincontent">
        <div class="container-fluid">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Slider</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">


                                <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter slider title">
                                    @if($errors->has('name'))
                                        <p class="text-danger ">{{$errors->first('name')}}</p>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="url" class="form-control" id="category_name" placeholder="Enter url">


                                </div>
                                  <div class="form-group">
                                    <label for="description">Priorty</label>
                                    <input type="number" value="1" name="priorty" class="form-control" id="priorty" placeholder="Priorty">


                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" style="width: 100%;">
                                      <option value="1" selected="selected">Active</option>
                                      <option value="0" >Disable</option>

                                    </select>
                                  </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image Desktop(1200x400)</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" name="image" required class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose slider image</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Image Mobile(400x400)</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" name="mimage" required class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose slider image</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Button Text</label>
                                    <input type="text" name="btnText" class="form-control" id="btnText" placeholder="Enter button Text">

                                
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

    

