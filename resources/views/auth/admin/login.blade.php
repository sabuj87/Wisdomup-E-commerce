
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM</title>
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/extra/bootstrap/bootstrap.min.css')}}">
   <!-- font-awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Line awesome -->
   <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
   <!-- Google Font -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

  

<!--    
    <link rel="stylesheet" href="{{asset('css/extra/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/extra/demo.css')}}">
    <link rel="stylesheet" href="{{asset('css/extra/skin.css')}}"> -->

    
    <!-- Plugin -->
   
    <link rel="stylesheet" href="{{asset('css/extra/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('magnific-popup/magnific-popup.css')}}">

</head>
<body>

<div  class="container-fluid ">

  
     <div style="margin:50px auto;" class="col-md-5 p-5 border border-dark ">
      <h3 class="text-center" > WISDOMUP ADMIN</h3>
      <form   action="{{ route('admin.login.submit') }}" method="post"  >

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
   
   <div class="row mb-3 ms-1">
  
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
 
</div>


</div>

<input type="submit" class=" btn btn-secondary mt-3 w-100 mx-2" value="Login"  >
@if (Route::has('admin.password.request'))
<a class="btn btn-link" href="{{ route('admin.password.request') }}">
    {{ __('Forgot Your Password?') }}
</a>
@endif
</form>

      
      
      
    



        

     </div>




</div>








<!-- Script -->
<script src="{{asset('js/extra/bootstrap/bootstrap.bundle.min.js')}}"  ></script>
<script src="{{asset('js/extra/jquery/jquery.min.js')}}"  ></script>

</body>
</html>


