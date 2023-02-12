
@extends('front.layouts.master')
@section('content')

<div class="row">
  
      
    <div class="col-md-6 m-auto mt-3 "> 
        <h1 class="text-center boldFont">RGEISTER</h1>
        <p class="text-center m-2">Please fill in the fields below</p>

        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" >

            @csrf
            <div class="whitebg radius5 p-3 mt-3 " >
            
               <label>First Name</label>
               <input class="inputCommon @error('first_name') errorinput @enderror "  name="first_name" type="text">
               
               @error('first_name')
            
                   <p class="mainColor" >{{ $message }}</p>
               
               @enderror
               <label>Last Name</label>
               <input class="inputCommon @error('first_name') errorinput @enderror "  name="last_name" type="text">
               
               @error('first_name')
            
                   <p class="mainColor" >{{ $message }}</p>
               
               @enderror
       
               <label>Email</label>
               <input class="inputCommon @error('email') errorinput @enderror "  name="email" type="email">
               
               @error('email')
            
                   <p class="mainColor" >{{ $message }}</p>
               
               @enderror
               <label>Password</label>
               <input class="inputCommon @error('password') errorinput @enderror "  name="password" type="password">
               
               @error('password')
            
                   <p class="mainColor" >{{ $message }}</p>
               
               @enderror
               
               <label>Confirm Password</label>
               <input class="inputCommon "  name="password_confirmation" type="password">
            
               <input type="submit" class="theme-btn mt-3 w-100 " value="Register"  >
            </div>
     
            
            </form>


            <p class="text-center" >Already have an account? <a href="{{route("login")}}">Login</a></p>
            </div>
          
   </div>
</div>

@endsection




