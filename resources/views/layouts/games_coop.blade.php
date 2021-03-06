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
  {!! Html::style('/assets/css/general_styling/gs_1.css')!!}
  {!! Html::style('/assets/css/layouts/game_coop.css')!!}
  @yield('stylesheets')

  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
  <script src="http://Html5shim.googlecode.com/svn/trunk/Html5.js"></script>
  <![endif]-->
</head>
<body>

    <div id="main-container" class="col-md-6 col-sm-12 col-xs-12 text-center" style="height:100%;">
      <div id="inner-container" data-role="main" class="ui-content" style="height:100%;">
        @yield('content')
      </div>
    </div>

</body>
<script src="/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
@yield('scripts')
</html>