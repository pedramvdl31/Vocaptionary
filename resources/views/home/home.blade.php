@extends($layout)
@section('stylesheets')
	<link rel="stylesheet" href="/assets/css/profile/style.css">
@stop
@section('scripts')
	<script src="/assets/js/profile/index.js"></script>
@stop

@section('content')



	<div class="container" style="margin: 0;
	    text-align: center;
	    width: 100%;
	    border-radius: 0;">
		<header>
			<div class="bio">
        		<img width="100%" src="http://www.croop.cl/UI/twitter/images/up.jpg" alt="background" class="bg">
				<div class="desc">
					<h3>@carlf</h3>
					<p>Carl Fredricksen is the protagonist in Up. He also appeared in Dug's Special Mission as a minor character.</p>
				</div>
			</div>

			<div class="avatarcontainer">
				<img src="http://www.croop.cl/UI/twitter/images/carl.jpg" alt="avatar" class="avatar">
				<div class="hover">
						<div class="icon-twitter"></div>
				</div>
			</div>

		</header>

		<div class="content">
			<div class="data">
				<ul style="padding: 0;">
					<li>
						2,934
						<span>Points</span>
					</li>
					<li>
						1,119
						<span>Reps</span>
					</li>
					<li>
						530
						<span>Cards</span>
					</li>
				</ul>
			</div>

			<!-- <div class="follow"> <div class="icon-twitter"></div> Follow</div> -->
		</div>
			<!--<p>Click on the button below to open the Panel.</p>
		  <a  id="open-sidemenu" href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Open Panel</a> -->
	</div>
	<div id="page-body">
		

 	<a style="    position: absolute;
    left: 10px;
    top: 10px;
    background: transparent;" href="#myPanel"><i style="color: white;
    background: transparent;
    font-size: 27px;" class="glyphicon glyphicon-align-justify"></i></a>

	</div>









@stop