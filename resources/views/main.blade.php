<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/general.css">
    @yield('css','')
  </head>
  <body>
    @include('header')

    @yield('contenido')
    @include('footer')
    @yield('javascript', '')
  </body>
</html>
