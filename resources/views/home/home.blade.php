@extends($layout)
@section('stylesheets')
	<link rel="stylesheet" href="/assets/css/profile/style.css">
@stop
@section('scripts')
	<script src="/assets/js/profile/index.js"></script>
@stop

@section('content')

	<div class="container">
		<header>
			<div class="bio">
        		<style type="text/css">        
			</style>
            <div class="ad-image bg" style="background-image: url('/assets/images/games/up.jpg');"></div>;
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
	<style type="text/css">
	    .emoticon {
		    width: 29px;
    		height: 19px;
            display: inline-block;
            vertical-align: top;
        }
		.flag-us {
            background-image: url(/assets/images/flag-icons-border.png);
            background-repeat: no-repeat;
            background-size: 600px;
            background-position: -435px -497px;
        }

        .btn-flag-wrapper {
        	position: relative;
        }
        .flag-wrapper{
        	position: absolute;
		    top: 11px;
		    right: 69px;
		    width: 30px;
        }
        .more-flags{
		    width: 44px;
		    left: -7px;
		    top: 2px;
		    /* margin-top: 2px; */
		    padding: 4px;
		    padding-bottom: 6px;
		    z-index: 9999999;
		    position: relative;
		    background: gainsboro;
        }
        .fbtn{
        	height: 33px;
		    width: 53px;
		    padding: 7px;
        }
        .flag-dropdown {
		    text-align: right !important;
		    width: 100% !important;
		    min-width: 20px !important;
		    padding-top: 0;
		}
		.flag-dropdown li{
			width: 40px;
			margin-top: 4px;
		}
		#page-body{
			overflow: visible;
		}
	</style>
	<div id="page-body" class="profile-page pages">

		<button type="button" class="btn btn-default btn-lg raised btn-nxt" navigate-to="cards">My Cards&nbsp;
		</button>
		<div class="btn-flag-wrapper">
			<button id="to-play" href="{!!route('game_play')!!}" class="btn btn-primary btn-lg raised">PLAY the Caption Game
			</button>
			<div class="flag-wrapper">
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle btn-xs fbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  	<i tab="1" txt="blaugh" class="ec emoticon flag-us"></i>
				  <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu flag-dropdown">
				    <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
				    <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
				    <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
				  </ul>
				</div>
			</div>	
		</div>
		<div class="btn-flag-wrapper">
			<button id="to-study" href="{!!route('game_study')!!}" class="btn btn-info btn-lg raised">STUDY Language</button>
			<div class="flag-wrapper">
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle btn-xs fbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  	<i tab="1" txt="blaugh" class="ec emoticon flag-us"></i>
				  <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu flag-dropdown">
				    <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
				    <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
				    <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
				  </ul>
				</div>
			</div>
		</div>
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
					<div class="card-image bg" style="margin: 0 auto;background-image: url('/assets/images/games/card1.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>a lion on stilts walking up to a giraffe</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">46</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card2" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('/assets/images/games/card2.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>a cat wearing circular sunglasses</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">32</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card3" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('/assets/images/games/card3.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>I don't always play games, but when i do they're Vocaptionary</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">867</span>
				</div>
			</div>
		  </li>
		  <li class="list-group-item btn-nxt" navigate-to="single-card4" style="overflow: auto;">
			<div class="cards-container">
				<div class="cards-image col-md-5 col-sm-5 col-xs-5">
					<div class="card-image bg" style="margin: 0 auto;background-image: url('/assets/images/games/card4.jpg');"></div>
				</div>
				<div class="cards-title col-md-5 col-sm-5 col-xs-5" style="overflow: auto;
    				max-height: 100px;">
					<span>a kitten nuzzling up to a puppy dog on a chair - cute</span>
				</div>
				<div class="cards-rank col-md-2 col-sm-2 col-xs-2">
					<span class="badge rank-badge">52</span>
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
	<style type="text/css">
		
		.item{
			width: 50% !important;
		}
	</style>
	<div class="single-card-page pages" style="display:none;text-align:center;padding:20px">
		<div class="col-sm-4">
		  	<div class="item" >
		  		<a href="#">
					<span class="notify-badge">46</span>
		      		<img width="100%" src="/assets/images/games/card1.jpg"  alt="" />
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
	<div class="single-card2-page pages" style="display:none;text-align:center;padding:20px">
		<div class="col-sm-4">
		  	<div class="item">
		  		<a href="#">
					<span class="notify-badge">32</span>
		      		<img width="100%" src="/assets/images/games/card2.jpg"  alt="" />
				</a>
			</div>
		</div>
		<dl class="dl-horizontal" style="padding-top:10px"> 
			<dt>Games</dt> 
				<dd>150tt</dd> 
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
	<div class="single-card3-page pages" style="display:none;text-align:center;padding:20px">
		<div class="col-sm-4">
		  	<div class="item">
		  		<a href="#">
					<span class="notify-badge">867</span>
		      		<img width="100%" src="/assets/images/games/card3.jpg"  alt="" />
				</a>
			</div>
		</div>
		<dl class="dl-horizontal" style="padding-top:10px"> 
			<dt>Games</dt> 
				<dd>867</dd> 
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
	<div class="single-card4-page pages" style="display:none;text-align:center;padding:20px">
		<div class="col-sm-4">
		  	<div class="item">
		  		<a href="#">
					<span class="notify-badge">52</span>
		      		<img width="100%" src="/assets/images/games/card4.jpg"  alt="" />
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

<div data-role="none" class="bfh-selectbox bfh-languages" data-language="en_US" data-available="en_US,fr_CA,es_MX" data-flags="true">
</div>



@stop