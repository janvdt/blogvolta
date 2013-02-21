<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog, from you</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="stylesheet" href="/bootstrap-laravel/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-laravel/css/bootstrap-responsive.min.css">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style> 
</head>
<body>
     <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="">Volta Blog</a>
          <div class="btn-group pull-right">
                 
            @if ( Auth::guest() )
              <a class="btn" href="{{ URL::to('login')}}">
                <i class="icon-user"></i> Login
              </a>
            @else
              <a class="btn" href="{{ URL::to('logout')}}">
                <i class="icon-user"></i> Logout
              </a>

            
            @endif
                 
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              @if ( !Auth::guest() )
              <li><a href="post/create">Create New</a></li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
 
    <div class="container">
          <div class="row">
          @yield('content')
          </div>
          @yield('pagination')
    </div><!--/container-->
 
    <div class="container">
        <footer>
            <p>Blog &copy; 2013</p>
            <script src="/bootstrap-laravel/js/jquery-1.8.0.min.js"></script>
            <script src="/bootstrap-laravel/js/bootstrap.min.js"></script>
        </footer>
      </div>
</body>
</html>