<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/packages/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <script src="/packages/jquery.min.js"></script>
    <script src="/packages/bootstrap/js/bootstrap.min.js"></script>
    
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
      @include('additional.topmenu')
      </nav>
      @include('additional.auth')
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        @yield('content')
      </div>

    </div> <!-- /container -->

  </body>
</html>
