@extends($layout)
@section('stylesheets')
	<link rel="stylesheet" href="/assets/css/cheat_sheet.css">
	<link rel="stylesheet" href="/assets/css/profile/reset.css">
	<link rel="stylesheet" href="/assets/css/games/index_coop.css">
	<link rel="stylesheet" href="/assets/css/profile/style_coop.css">
@stop
@section('scripts')
	<script src="/assets/js/games/index_coop.js"></script>
@stop
@section('content')
	<div id="l" class="l">
		<img id="lg" src="/assets/gifs/4.gif"></br>
		<span id="lt">loading</span>
	</div>
	<!-- --HOME-- -->
	<div id="a" class="pages">
		@include('pages.a')
	</div>
	<!-- --VIEW CARDS-- -->
	<div id="b" class="pages">
		@include('pages.b')
	</div>
	<!-- --PLAY-- -->
	<div id="c" class="pages">
		@include('pages.c')
	</div>
	<!-- --STUDY-- -->
	<div id="d" class="pages">
		@include('pages.d')
	</div>
@stop

