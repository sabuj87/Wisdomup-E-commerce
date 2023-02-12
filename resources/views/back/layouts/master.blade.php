<!DOCTYPE html>

<html lang="en">
<head>
 @include('back.partial._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('back.partial._navbar')
  @include('back.partial._sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div id="app" class="content-wrapper p-2 app ">

 
    @include('flash::message')

    @yield('content')

  
  
  </div>
  <!-- /.content-wrapper -->



@include('back.partial._footer')

</div>
<!-- ./wrapper -->

@include('back.partial._scripts')


</body>
</html>
