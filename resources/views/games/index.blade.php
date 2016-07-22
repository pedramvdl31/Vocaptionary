@extends($layout)
@section('stylesheets')
@stop
@section('scripts')
	<script src="/packages/pietimer/jquery.pietimer.min.js"></script>
	<script src="/assets/js/games/index.js"></script>
@stop
@section('content')
	
<!-- 	<div style="margin-top:100px;"" id="pietimer"></div>
	<span id="timer"></span> -->
	<style type="text/css">
				/**
		 * Profile image component
		 */
		.profile-header-container{
			float: left;
		    /*margin: 0 auto;*/
		    text-align: center;
		}

		.profile-header-img > img.img-circle {
		    width: calc(100% - 2px);
		    border: 2px solid #51D2B7;
		}

		.profile-header {
		    margin-top: 43px;
		}

		/**
		 * Ranking component
		 */
		.rank-label-container {
		    margin-top: -19px;
		    /* z-index: 1000; */
		    text-align: center;
		}

		.label.label-default.rank-label {
		    background-color: rgb(81, 210, 183);
		    padding: 5px 10px 5px 10px;
		    border-radius: 27px;
		}
	</style>


	<style type="text/css">
		#profile-images{
			float: left;
		}
		.profile-header-container{
			width: 25%;
		}
		.profile-header-img {
		    padding-top: 54px;
		}
		.rank-label{
			font-size: 2vw !important;
		}
		.star-i{
			color: #FFD700;
		}
		
	</style>

	<div id="main_wrap">
		<div id="profile-images" style="width:100%">




			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">100 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">100 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">100 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">100 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 





		</div>
<style type="text/css">
	#card-images{
		margin-top: 40px;
		float: left;
		text-align: left;
	}
	.card-img {
		float: left;
		margin: 0 20px 20px 10px
	  }

</style>

		<div id="card-images">

			<img src = "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" class = "card-img img-thumbnail">
			<img src = "http://www.croop.cl/UI/twitter/images/up.jpg" class = "card-img img-thumbnail">
			<img src = "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" class = "card-img img-thumbnail">
			<img src = "http://www.croop.cl/UI/twitter/images/up.jpg" class = "card-img img-thumbnail">

		</div>

		<style type="text/css">
			#results-bar{
				float: left;
				width: 100%;
				background-color: white;
				padding: 0 10px;
			}
		</style>

		<div id="results-bar">
			<div class="progress">
				<div class="progress-bar progress-bar-striped progress-bar-danger active" style="width: 25%">
					<span class="sr-only" >25% Complete (danger)</span>
				</div>
				<div class="progress-bar progress-bar-striped progress-bar-warning progress-bar-striped active" style="width: 25%">
					<span class="sr-only">25% Complete (warning)</span>
				</div>
				<div class="progress-bar progress-bar-striped progress-bar-info active" style="width: 25%">
					<span class="sr-only">25% Complete (danger)</span>
				</div>
				<div class="progress-bar progress-bar-striped progress-bar-success active" style="width: 25%">
					<span class="sr-only">25% Complete (success)</span>
				</div>
			</div>
		</div>



	</div>


@stop