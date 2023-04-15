<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  {{-- Estilos css --}}
  <link rel="stylesheet" href="{{ asset('css/buscadorstyle.css') }}">

  <!-- CSS común a todas las vistas -->
  @stack('librerias')

</head>
<body>


  @include('header')
  @yield('content')
  @include('footer')

</body>
</html>
