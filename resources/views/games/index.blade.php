@extends($layout)
@section('stylesheets')
	<link rel="stylesheet" href="/packages/jQuery_Circular_Countdown/TimeCircles.css">
	<link rel="stylesheet" href="/assets/css/games/index.css">
@stop
@section('scripts')
	<script src="/packages/jQuery_Circular_Countdown/TimeCircles.js"></script>
	<script src="/assets/js/games/index.js"></script>
@stop
@section('content')

	<style type="text/css">
	#card-images{
		margin-top: 40px;
		text-align: center;
		float: none;
		width: 90%;
		margin: 0 auto;
	}
	#results-bar-wt{
		float: left;
		width: 100%;
		background-color: white;
		padding: 0 10px;
	}
	#loading-wrapper-wt{
	  position: absolute;
	  left: 50%;
	  top: 33%;
	  transform: translate(-50%, -50%);
	  width: 70%;
	  height: 50%;
	}
	.my-btn{
		width: 88px !important;
	    font-size: 12px !important;
	    height: 20px !important;
	    line-height: 0px !important;
	    padding: 11px !important;
	}
	</style>
	<div id="waiting-overlay">
		<center id="loading-wrapper-wt"><img class="loading-img" src="/assets/images/icons/gif/loading1.gif">
			<p>&nbsp;</p>
			<p>Searching for worthy players.</p>
			<p>Expected wait is < 2 minutes</p>
			<p><span id="w-t">00 Seconds</span></p>

			<div id="results-bar-wt">
				<div id="progress-wrapper-wt" class="progress">

				</div>
			</div>


			<style type="text/css">
				
				.textDiv_Seconds{
				    top: 75px !important;
				}
			</style>
            <div id="CountDownTimer" data-timer="100" style="width: 100px; height: 100px;"></div>



			<button id="cancel-btn" class="btn btn-defult btn-sm my-btn" rel="external">Cancel</button>

		</center>
	</div>

	
	
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
			margin-bottom: 35px;
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
		.img-thumbnail{
		    width: 100% !important;
		}
	</style>

	<div id="main_wrap">
		<div id="profile-images" style="width:100%">


			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">100 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">421 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">24 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">986 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 





		</div>
		<style type="text/css">

			.card-img {
				float: left;
				margin-bottom: 10px;
			  }

		</style>

		<div id="card-images">
			<h3>Pick one image</h3>
			<img src = "/assets/images/games/photo.jpg" class = "card-img img-thumbnail">
			<img src = "/assets/images/games/up.jpg" class = "card-img img-thumbnail">
			<img src = "/assets/images/games/photo.jpg" class = "card-img img-thumbnail">
			<img src = "/assets/images/games/up.jpg" class = "card-img img-thumbnail">

		</div>

		<style type="text/css">
			#results-bar{
				float: left;
				width: 100%;
				background-color: white;
				padding: 0 10px;
			}
			.progress-bar {
			    -webkit-transition: all;
			    transition: all;
			}
		</style>

		<div id="results-bar">
			<p>Waiting for votes!</p>
			<div id="progress-wrapper" class="progress">

			</div>
		</div>



	</div>


@stop