<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="clckd" content="f37a4055eaf253ec167a48f5e00495f6" />
      <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

      <!-- Title -->
      <title>@yield('title') - Watch Full Movie Free Online - Local Delicious - Love Planet</title>
      <meta name="description" content="@yield('title')">
      <meta name="keywords" content="@yield('keywords')">
      <meta name="DC.title" content="@yield('title')">

      <!-- Favicon -->
      <link rel="icon" href="/img/core-img/favicon.ico">

      <!-- Style CSS -->
      <link rel="stylesheet" href="/css/style.css">
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129495864-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129495864-1');
      </script>


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
