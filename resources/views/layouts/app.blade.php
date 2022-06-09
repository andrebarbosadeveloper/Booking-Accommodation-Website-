<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AVDC - Arrendar em Vila Do Conde</title>


  
  <!-- Bootstrap core CSS -->

  <link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">


  @yield('styles')
 
</head>

<body>
    
 @include('includes.header')    
 <main>    
    @yield('content')
</main>
  @include('includes.footer')


<!-- Bootstrap core JavaScript -->


<script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/dashboard.js') }}"></script>


</body>

</html>






