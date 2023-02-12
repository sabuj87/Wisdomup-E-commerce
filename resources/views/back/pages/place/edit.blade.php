@extends('back.layouts.master')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Places</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a >Home</a></li>
                        <li class="breadcrumb-item active">Place edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="maincontent">
        <div class="container-fluid">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Place</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('places.update',$place->id)}}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">


                                <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Place name</label>
                                    <input type="text" name="name" value="{{$place->name}}" class="form-control" required id="title" placeholder="Enter place name">
                                    @if($errors->has('name'))
                                        <p class="text-danger ">{{$errors->first('name')}}</p>
                                    @endif

                                </div>
                         
                                  <div class="form-group">
                                    <label id="imageText" for="exampleInputFile">Image(50x50)</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" name="image"  class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose place image</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                    </div>
                                  </div>
                               
                          
                                 


                            </div>
                            <div class="col-lg-6">
                            
                                  <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" value="{{$place->end_date}}" name="date" class="form-control" id="btnText" placeholder="Enter button Text">

                                
                                  </div>
                                  <div class="form-group">
                                    <label>Show on Homepage</label>
                                    <select id="show" class="form-control" name="show" style="width: 100%;">
                                   
                                      <option value="0" 
                                      @if($place->show_home==0)
                                    
                                      selected 
                                   
                                      @endif
                                      
                                      
                                      >Disable</option>
                                      <option value="1"
                                      @if($place->show_home==1)
                                    
                                      selected 

                                      @endif
                                      
                                      >Enable</option>
                                      

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

    

