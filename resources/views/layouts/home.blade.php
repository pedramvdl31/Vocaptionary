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
  {!! Html::style('/assets/css/home_layout.css')!!}
  {!! Html::style('/assets/css/general_styling/gs_1.css')!!}
  @yield('stylesheets')

<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
<script src="http://Html5shim.googlecode.com/svn/trunk/Html5.js"></script>
<![endif]-->
</head>
<body>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '255720654813863',
        xfbml      : true,
        version    : 'v2.7'
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>


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
            background-color: #3b5998;
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
    </style>
    <div data-role="page" id="pageone">
      <div data-role="panel" id="myPanel" data-display="overlay">
        <div class="side-jumbotron">
          <center><h3 style="color:gray;margin:0;padding-top:14px;">Vocaptionary</h3></center>
        </div>
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

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
        
      </div>

      <div data-role="header">
        <h1>Page Header</h1>
      </div>

      <div data-role="main" class="ui-content" >
        <p>Click on the button below to open the Panel.</p>
        <a  id="open-sidemenu" href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Open Panel</a>
      </div>

      <div data-role="footer">
        <h1>Page Footer</h1>
      </div>
    </div>
</body>
<script src="/assets/plugins/jQuery_mobile/jquery-1.11.3.min.js"></script>
<script src="/assets/plugins/jQuery_mobile/jquery.mobile-1.4.5.min.js"></script>
<script src="/assets/js/layouts/home.js"></script>

</html>