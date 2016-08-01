<div id="b-a" class="cards-page pages-view">

	<div id="b-n">
		<nav class="navbar navbar-default view-nav">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
		        	<li class="active"><a class="page-back-btn" back-href="a"><i class="glyphicon glyphicon-chevron-left"></i></a></li>
		        </ul>
			</div>
		</nav>	
	</div>

	<ul class="list-group">
	  <li class="list-group-item next-view" this-page="b" view-href="b-b" style="overflow: auto;">
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
	</ul>
</div>


<!-- --SINGLE CARD VIEW-- -->
@include('pages-components.b-a')
