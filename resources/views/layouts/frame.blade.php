<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
   @include('layouts.navigation')
  <div class='container-fluid'>
      @yield('main'){{--allows access to anything labeled 'main' here--}}
  </div>
</body>
</html>