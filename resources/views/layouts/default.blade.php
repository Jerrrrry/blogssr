<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

      <!-- Title -->
      <title>@yield('title') - Love Planet</title>

      <!-- Favicon -->
      <link rel="icon" href="/img/core-img/favicon.ico">

      <!-- Style CSS -->
      <link rel="stylesheet" href="/css/style.css">

  </head>
  <body>

    @component('components.header')@endcomponent
    @yield('content')
    @component('components.footer')@endcomponent
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
  </body>
</html>
