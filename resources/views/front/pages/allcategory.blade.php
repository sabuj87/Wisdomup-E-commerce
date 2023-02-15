@extends('front.layouts.master')
@section('content')
<h5 class="mt-2 " style="font-weight: 700" >All CATEGORY</h5>
@if($allcategory)
<div class="row mb-5" >
@foreach($allcategory as $key => $category)


  <div class="col-md-2 col-6 mt-3">
    <a href="{{route('category.product',$category->id)}}">

    
   <div class="card p-3" >
    <div id="imageHolder" style="height: 100px ; position: relative;" >
      <img  style="max-width: 100%;
      max-height: 100%;  
      position: absolute;
      margin:auto;
      top:0;
      bottom:0;
      left:0;
      right:0;"  src="{{asset('image/category/'.$category->icon)}}">
    </div>


    <p title="{{$category->name}}" style="font-weight: 700 " class="text-center mt-3" >{{Str::limit($category->name,14)}}</p>




   </div>
  </a>

   




  </div>



 



@endforeach
</div>


@endif


@endsection