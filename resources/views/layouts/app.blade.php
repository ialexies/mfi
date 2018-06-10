
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  @include('inc.navbar')
  
  <div class="container">
    <!-- @if(Request::is('/'))
      @include('inc.showcase')
    @endif -->
    <!-- <div class="row">

      @if(Request::is('/'))
        <div class="col-md4 col-lg-4">
          @include('inc.sidebar')
        </div>
      @endif

      <div class="col-md-8 col-lg-8">
        @include('inc.messages')
        @yield('content')
      </div>

    </div> -->



    @yield('content')
 

  </div>

  <footer id="footer" class="text-center">
    <p>Copyright 2018 &copy; Acme</p>
  </footer>
</body>
</html>