   <div id="header" style="z-index: 1" class="fixed-top"  >
    
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class=" navbs "   href="{{route('home')}}"><img class="logom" src="{{asset('image/other/logo.png')}}" alt=""></a>

      
        <form action="{{route('search')}}" method="GET" style="width: 200px" class="heads">
          <input class=" inputCommon  me-2" style="width: 70%" type="search" name="key" placeholder="Search" aria-label="Search">
          <button style="width: 20%;margin-left:-7px" class="  btn btn-outline-success " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

   
          
        </form>
        <a class="ms-1 heads" href="{{route('carts.index')}}">
              
          <i class="fa-solid fa-cart-shopping">

         


          </i>
          <button type="button" class="btn bg-transparent position-relative">
          
            <span class="position-absolute top-0 start-30 translate-middle badge rounded-pill bg-danger">
             <span id="cartb" >{{App\Models\Cart::totalItems()}}</span> 
              <span class="visually-hidden">unread messages</span>
            </span>
          </button>

         
        </a>
        
        
        



        
        <div class="collapse  navbar-collapse" id="navbarSupportedContent">


     
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li id="mobcat" class="nav-item" >
              <div style="height: 500px" class="row over catholder "  >

             
                @foreach(App\Models\Category::orderBy('created_at','desc')->where('parent_id',0)->take(7)->get() as $parent => $category)
    
    
         <div class=" col-12 mt-3">
        <a href="{{route('category.product',$category->id)}}">
    
        
        <div class=" p-3" >
          <div class="row">
            <div class="col-3">
              <div id="imageHolder" style="height: 60px;width:70px ; position: relative;" >
                <img  style="max-width: 100%;
                max-height: 100%;  
                position: absolute;
                margin:auto;
                top:0;
                bottom:0;
                left:0;
                right:0;"  src="{{asset('image/category/'.$category->icon)}}">
              </div>

            </div>
            <div class="col-6">
              <p style="font-weight: 700 " class="text-center mt-3" >{{$category->name}}</p>
    



            </div>


          </div>
       
    
    
    
    
    
    
       </div>
      </a>
      
       
    
    
    
    
      </div>
      
    
    
    
     
    
    
    
    @endforeach
    <div  class="col-md-3 center col-6 mt-3">
      <a class="boldFont" href="{{route('allcategory')}}">View all..</a>
    </div>
    
               </div>


            </li>
            <li id="descat" class="nav-item dropdown ms-lg-5 ">
              <a style="font-weight: bold" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                CATEGORIES
              </a>
              <div class="dropdown-menu p-2" aria-labelledby="navbarDropdown">
             <div class="row catholder "  >

             
              @foreach(App\Models\Category::orderBy('created_at','desc')->where('parent_id',0)->take(7)->get() as $parent => $category)

  
       <div class="col-md-3 col-6 mt-3">
      <a href="{{route('category.product',$category->id)}}">

      
      <div class=" p-3" >
      <div id="imageHolder" style="height: 70px ; position: relative;" >
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
    </a>
    
     




    </div>
    



   



  @endforeach
  <div  class="col-md-3 center col-6 mt-3">
    <a class="boldFont" href="{{route('allcategory')}}">View all..</a>
 </div>

             </div>
              </div>
            </li>
            <li class="nav-item dropdown ms-lg-5 ">
              <a style="font-weight: bold" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                DAILY DEALS
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown ms-lg-5 ">
              <a style="font-weight: bold" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MORE
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            
          </ul>
          <form action="{{route('search')}}" method="GET" class="d-flex">
            <input style="width:500px" class="form-control me-2" type="search" name="key" placeholder="Search" aria-label="Search">
            <button style="width: 10%;margin-left:-7px" class="  btn btn-outline-success " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item dropdown ms-lg-5 ">
              <a style="font-weight: bold" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                @if(Auth::user())
                <li><a class="dropdown-item" href="">{{Auth::user()->first_name." ".Auth::user()->last_name}}</a></li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('LOGOUT') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>



                </li>
                @else
                <li><a class="dropdown-item" href="{{route('login')}}">LOGIN</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">REGISTER</a></li>


              

                @endif

             

              </ul>
            </li>


            <li class="nav-item" ></li>

          </ul>

          
        </div>
      </div>
    </nav>

   </div>
