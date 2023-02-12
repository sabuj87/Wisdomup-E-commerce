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
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Places</li>
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
                            <h3 class="card-title">Places</h3>


                        </div>

                        <div class="card-body" >
                            <a href="{{route('places.create')}}" class="btn btn-primary" > <i class="fa fa-plus" ></i> Add place</a>

                            <table class="table dataTable">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>End Date</th>
                                    <th>Show on homepage</th>
                                    <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>
                                @if($places)
                                    @foreach($places as $key => $place)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$place->name ?? ''}}</td>
                                            <td>{{$place->end_date ?? ''}}</td>
                                            <td>
                                               @if($place->show_home==1)
                                                Enable

                                               @endif
                                               @if($place->show_home==0)
                                               Disable

                                              @endif

                                            
                                            </td>

                                            <td>
                                                <a href="{{route('places.edit',$place->id)}}" class="btn btn-sm btn-info" >
                                                 <i class="fa fa-edit" ></i>   Edit

                                                </a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$place->id}}" >
                                                    <i class="fa fa-trash" ></i>   Delete

                                                </a>

                                                <form id="category-delete-{{$place->id}}" action="{{route('places.destroy',$place->id)}}" method="POST" >
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
