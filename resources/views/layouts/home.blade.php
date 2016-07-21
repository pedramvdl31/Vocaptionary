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
  <link rel="stylesheet" href="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css">

  {!! Html::style('/assets/css/home_layout.css')!!}
  {!! Html::style('/assets/css/general_styling/gs_1.css')!!}
  @yield('stylesheets')

<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
<script src="http://Html5shim.googlecode.com/svn/trunk/Html5.js"></script>
<![endif]-->
</head>
<body>
  <style type="text/css">
      .ui-panel-display-reveal {
          box-shadow: none !important; 
      }
      .ui-panel-inner {
          padding: 0 !important;
      }
      .side-btn{
          color: #adadad;
          padding: 15px 15px 15px 15px;
      }
      .act{
          background-color: #e9e9e9 !important;
      }
      .side-btn-title{
          margin-left: 25px;

      }
      .side-jumbotron{
          height: 90px;
          background-color: #5cc0ff;
      }
      #site-title{
        color: white;
        margin:0;padding-top:14px;width: 16em;
      }
      #overlay{
          position: absolute;
          /* background: gray; */
          background: rgba(138, 138, 138, 0.5);
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          display: none;
          /* opacity: 0.5; */
      }
      .btn-facebook {
          color: #fff !important;
          background-color: #3b5998 !important;
          border-color: rgba(0,0,0,0.2) !important;
      }
      .btn-social {
          position: relative;
          padding-left: 44px;
          text-align: left;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
      }

      .btn-social>:first-child {
          position: absolute;
          left: 0;
          top: 0;
          bottom: 0;
          width: 32px;
          line-height: 34px;
          font-size: 1.6em;
          text-align: center;
          border-right: 1px solid rgba(0,0,0,0.2);
      }
      .facebook-btn-text{
        font-size: 12px;
      }
      #main-overlay{
        background-color: white;
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
      }
      .loading-img{
        width: 30px;

      }
      #loading-wrapper{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 40%;
        height: 50%;
      }
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
          <a class="btn btn-block btn-social btn-facebook" href="/auth/facebook" rel="external">
            <span class="fa fa-facebook"></span> <span class="facebook-btn-text">Sign in with Facebook</span>
          </a>
        </div>
      @endif

    </div>

<!--     <div data-role="header">
      <h1>Page Header</h1>
    </div> -->

    <div data-role="main" class="ui-content" style="padding:0">
      @yield('content')
    </div>

<!--     <div data-role="footer">
      <h1>Page Footer</h1>
    </div> -->
  </div>
</body>
<script src="/assets/plugins/jQuery_mobile/jquery-1.11.3.min.js"></script>
<script src="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.min.js"></script>
<script src="/assets/js/layouts/home.js"></script>
@yield('scripts')
</html>