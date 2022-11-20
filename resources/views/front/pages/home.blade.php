@extends('front.layouts.master')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/other/sl.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/other/sl2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/other/sl3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <h5 class="mt-5 " style="font-weight: 700" >SHOP BY CATEGORY</h5>
  @if($categories)
  <div class="row" >
  @foreach($categories as $key => $category)

  
    <div class="col-md-2 col-6 mt-3">
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


      <p style="font-weight: 700 " class="text-center mt-3" >{{$category->name}}</p>


     </div>
  
     




    </div>



   



  @endforeach
</div>
  @endif
  

@endsection

