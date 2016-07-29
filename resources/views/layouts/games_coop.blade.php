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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.css">
  {!! Html::style('/assets/css/general_styling/gs_1.css')!!}
  {!! Html::style('/assets/css/layouts/game_coop.css')!!}
  @yield('stylesheets')

  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
  <script src="http://Html5shim.googlecode.com/svn/trunk/Html5.js"></script>
  <![endif]-->
</head>
<body>
  <div class="navigation-bar navbar-fixed-top">
        @if(!Auth::check())
          <div class="nav-btn-container">
          <!-- dont remove style -->
            <a class="btn btn-primary outline nav-btn" href="/auth/facebook" rel="external" style="color: white !important;padding: 3px !important;
                border: 2px solid white !important;"> 
              <span class="fa fa-facebook"></span> <span class="facebook-btn-text">Sign in</span>
            </a>
          </div>
        @endif
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
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title"><a href="/">Home</a></span>
        </div>
        <div class="side-btn">
            <i class="glyphicon glyphicon-home"></i><span class="side-btn-title"><a href="/home/logout" rel="external">Logout</a></span>
        </div>
      @else
        <div class="side-btn">
          <a class="btn btn-block btn-primary outline" href="/auth/facebook" rel="external">
            <span class="fa fa-facebook"></span> <span class="facebook-btn-text">Sign in with Facebook</span>
          </a>
        </div>
      @endif

    </div>

    <div id="main-container" class="col-md-6 col-sm-12 col-xs-12 text-center">
      <div id="inner-container" data-role="main" class="ui-content" style="">
        @yield('content')
      </div>
    </div>

  </div>
  <a id="om" href="#myPanel">
        <i id="omi" class="glyphicon glyphicon-align-justify"></i>
  </a>
</body>
<script src="/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.min.js"></script>
@yield('scripts')
</html>