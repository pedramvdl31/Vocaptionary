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
        		<style type="text/css">        
			</style>
            <div class="ad-image bg" style="background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>;
			<div class="desc">
				<h3>@carlf</h3>
				<p>Carl Fredricksen is the protagonist in Up. He also appeared in Dug's Special Mission as a minor character.</p>
			</div>
			</div>

			<div class="avatarcontainer btn-nxt" navigate-to="profile">
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
	<div id="page-body" class="profile-page pages">
		<button type="button" class="btn btn-default btn-lg raised btn-nxt" navigate-to="cards">My Cards
		</button>
		<button type="button" class="btn btn-primary btn-lg raised btn-nxt" navigate-to="play">PLAY the Caption Game
		</button>
		<button type="button" class="btn btn-info btn-lg raised btn-nxt" navigate-to="study">STUDY<Language>
		</button>
	</div>
	<style type="text/css">
		.card-image{
		    height: 100px;
		    width: 100px;
			  background-size: cover;
			  background-repeat: no-repeat;
			  background-position: 50% 50%;
			  border-radius: 0 !important;
		}
		.cards-container{
			    height: 110px;
		}
		.cards-title{
			text-align: left;
		}	
		.cards-title{
			margin-top: 20px;
		}
		.cards-rank{
		}
		.rank-badge{
			height: 20px;
		    text-align: initial;
		    margin-top: 40px;
		    vertical-align: middle;
		}
		.item {
		    position:relative;
		    padding-top:20px;
		    display:inline-block;
		}
		.notify-badge{
		    position: absolute;
		    right:-20px;
		    top:10px;
		    background:red;
		    text-align: center;
		    border-radius: 30px 30px 30px 30px;
		    color:white;
		    padding:5px 10px;
		    font-size:20px;
		}
		/* Extra Small Devices, Phones */ 
	    @media only screen and (max-width : 480px) {

	    }

	    @media only screen and (max-width : 320px) {
		    .card-image{
			    height: 50px;
			    width: 50px;
				background-size: cover;
				background-repeat: no-repeat;
				background-position: 50% 50%;
				border-radius: 0 !important;
			} 
			.cards-title{
				margin-top: 0;
			}
	    }
	</style>
	<div class="cards-page pages" style="display:none">

		<ul class="list-group">
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('http://www.croop.cl/UI/twitter/images/up.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>One cannot simply go camping</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">4</span>
				</div>
			</div>
		  </li>
		</ul>
	</div>


	<div class="play-page pages" style="display:none">
		<h3>play</h3>
	</div>
	<div class="study-page pages" style="display:none">
		<h3>study</h3>
	</div>
	<div class="single-card-page pages" style="display:none;text-align:center;padding:20px">

		<div class="col-sm-4">
		  	<div class="item">
		  		<a href="#">
					<span class="notify-badge">1000</span>
		      		<img src="http://placehold.it/200x200"  alt="" />
				</a>
			</div>
		</div>
		<dl class="dl-horizontal" style="padding-top:10px"> 
			<dt>Games</dt> 
				<dd>150</dd> 
			<dt>Votes</dt> 
				<dd>63</dd> 
			<dt>Wins</dt> 
				<dd>12</dd> 
			<dt>Decks Added To</dt> 
				<dd>27</dd> 
			<dt>Reviews</dt> 
				<dd>209</dd> 
		</dl>
	</div>




 	<a style="position: absolute;
	    left: 10px;
	    top: 10px;
	    background: transparent;" 
	    href="#myPanel">
	    		<i style="color: white;background: transparent;font-size: 27px;" class="glyphicon glyphicon-align-justify"></i>
    </a>
@stop