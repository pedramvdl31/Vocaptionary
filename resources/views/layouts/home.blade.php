<!DOCTYPE Html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/Html; charset=utf-8" />
  <title>vocaptionary</title>
  <!-- Bootstrap -->
  {!! Html::style('http://fonts.googleapis.com/css?family=Lobster|Oswald:400,300,700') !!}
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.css">
  {!! Html::style('/assets/css/layouts/home.css')!!}
  {!! Html::style('/assets/css/general_styling/gs_1.css')!!}
  @yield('stylesheets')

<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
<script src="http://Html5shim.googlecode.com/svn/trunk/Html5.js"></script>
<![endif]-->
</head>
<body>
  <style type="text/css">

  </style>

  <div id="main-overlay">
    <center id="loading-wrapper"><img class="loading-img" src="/assets/images/icons/gif/loading1.gif"></center>
  </div>

  <div data-role="page" id="pageone">
    <div data-role="panel" id="myPanel" data-display="overlay">
      <div class="side-jumbotron">
        <center>
          <img id="site-title" src="/assets/images/embed.png">
          </center>
      </div>

      @if(Auth::check())
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title">Home</span>
        </div>
        <div class="side-btn act">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title">Home</span>
        </div>
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title">Home</span>
        </div>
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title">Home</span>
        </div>
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title">Home</span>
        </div>
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title">Home</span>
        </div>
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title"><a href="/admins/logout">Logout</a></span>
        </div>
      @else
        <div class="side-btn">
          <a class="btn btn-block btn-primary outline" href="/auth/facebook" rel="external">
            <span class="fa fa-facebook"></span> <span class="facebook-btn-text">Sign in with Facebook</span>
          </a>
        </div>
      @endif

    </div>

<!--     <div data-role="header">
      <h1>Page Header</h1>
    </div> -->
    <div id="main-container" class="col-md-6 col-sm-12 col-xs-12 text-center">
      <div id="inner-container" data-role="main" class="ui-content" style="">
        @yield('content')
      </div>
    </div>
<!--     <div data-role="footer">
      <h1>Page Footer</h1>
    </div> -->
  </div>
</body>
<script src="/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.min.js"></script>
<script src="/assets/js/layouts/home.js"></script>
@yield('scripts')
</html>