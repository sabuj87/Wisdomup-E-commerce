

@extends('front.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-6 m-auto mt-3 "> 

        <h1 class="text-center boldFont">LOGIN</h1>
        <p class="text-center">Please enter your e-mail and password</p>
            
<form  action="{{ route('login') }}" method="post"  >

    @csrf
    <div class="whitebg radius5 p-3 mt-3 " >
    
      
       <label>Email</label>
       <input class="inputCommon @error('email') errorinput @enderror " value="{{ old('email') }}"  name="email" type="email">
       
       @error('email')
    
           <p class="mainColor" >{{ $message }}</p>
       
       @enderror
       <label>Password</label>
       <input class="inputCommon @error('password') errorinput @enderror "  name="password" type="password">
       
       @error('password')
    
           <p class="mainColor" >{{ $message }}</p>
       
       @enderror
       <input type="hidden"  name="checkout" value=" @if (isset($checkout)) {{$checkout}} @endif" >
       
       <div class="row mb-3 ms-1">
      
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
     
    </div>
    <input type="submit" class="theme-btn mt-3  w-100" value="Login"  >
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    
    
    </div>
    
  
    @endif
    </form>

   <p class="text-center" >New customer ? <a href="{{route("register")}}">Create an account</a></p>

    </div>



</div>




@endsection





