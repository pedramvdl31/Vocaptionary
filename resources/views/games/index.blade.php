@extends($layout)
@section('stylesheets')
	<link rel="stylesheet" href="/packages/jQuery_Circular_Countdown/TimeCircles.css">
	<link rel="stylesheet" href="/packages/bootstrap-star-rating-master/css/star-rating.css">
	<link rel="stylesheet" href="/assets/css/cheat_sheet.css">
	<link rel="stylesheet" href="/assets/css/games/index.css">
@stop
@section('scripts')
	<script src="/packages/jQuery_Circular_Countdown/TimeCircles.js"></script>
	<script src="/packages/knob/js/jquery.knob.js"></script>
	<script src="/packages/bootstrap-star-rating-master/js/star-rating.js"></script>
	<script src="/assets/js/games/index.js"></script>
@stop
@section('content')

	<style type="text/css">
	.panel-big{
		border: 6px solid #d6e9c6 !important;
	}
	.new-cap{
		font-size: 20px !important;
	}
	#pageone,body{
		background-color: white !important;
	}
	#card-images{
		margin-top: 40px;
		text-align: center;
		float: none;
		width: 90%;
		margin: 0 auto;
		margin-bottom: 35px;
	}
	#results-bar-wt{
		float: left;
		width: 100%;
		background-color: white;
		padding: 0 10px;
	}

	.my-btn{
		width: 88px !important;
	    font-size: 12px !important;
	    height: 20px !important;
	    line-height: 0px !important;
	    padding: 11px !important;
	}
	.inner-div{
		width: 90%;
		margin: 0 auto;
	}
	.input-arreglo-group{
    	padding: 0px 0px;
    	border: none
	}

	.input-arreglo-right{
	    margin-top: 0px; 
	    height: calc(100% + 28px); 
	    box-shadow: -4px 0px 10px -4px #aaaaaa;
	    border-radius: 0;
	}
	.cap-body{
		padding: 0;
		overflow: auto;
	}
	.cap-fg{
		margin-bottom: 0;
	}
	.rating-container{
		text-align: left;
		
	}
	.rating,.clear-rating,.caption{
		font-size: 23px !important;
	}
	.heading-name{
		float: left;
	}
	.heading-star{
		float: right;
	}
	.heading-wrapper{
		line-height: 24px;
	}
	.caption-text{
		height: 60px;
		text-align: left;
	    padding: 10px;
	    word-break: normal;
	}
	</style>
	<div id="page-overlay-notification" class=" ">
		<center id="loading-wrapper-wt"><img class="loading-img" src="/assets/images/icons/gif/loading1.gif">
			<p>&nbsp;</p>
			<p>Searching for worthy players.</p>
			<p>Expected wait is < 2 minutes</p>
			<p><span id="w-t">00 Seconds</span></p>
			<div id="results-bar-wt" class="hatch">
				<div id="progress-wrapper-wt" class="progress">
				</div>
			</div>
			<button id="cancel-btn" class="btn btn-defult btn-sm my-btn hatch" rel="external">Cancel</button>
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
		    width: calc(100% - 20px);
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
		.control-bar{
			width: 90%;
    		margin: 0 auto 20px auto;
		}
		#cb-btn-holder{
			line-height: 100px;
			float: right;
		}
		.left-timer-holder{
			float: left;
		}
		#captions-holder{
			float: left;
			width: 100%;
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
		    width: 50% !important;
    		margin: 0 auto;
		}
		#caption-container{
		    width: 90%;
		    margin: 0 auto 20px auto;
		}
	</style>

	<div id="main_wrap">
		<div id="profile-images" style="width:100%">
			<div class="profile-header-container this-user-profile">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">100 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container other-users-profile">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">421 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container other-users-profile">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">24 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
			<div class="profile-header-container other-users-profile">   
	    		<div class="profile-header-img">
	                <img class="img-circle" src="/assets/images/games/photo.jpg" />
	                <!-- badge -->
	                <div class="rank-label-container">
	                    <span class="label label-default rank-label">986 <i class="glyphicon glyphicon-star star-i"></i></span>
	                </div>
	            </div>
	        </div> 
		</div>
		<div id="page-body">
			<style type="text/css">
				.card-img {
					margin-bottom: 10px;
				  }
				 .photo-holder{
				 	width: 100%;
	    			float: left;
				 }
			</style>
			<div id="card-images">
				<h3 style="text-transform: uppercase;">Pick one image</h3>
				<div class="photo-holder">
					<img src = "/assets/images/games/photo.jpg" class = "card-img img-thumbnail">
				</div>
				<div class="photo-holder">
					<img src = "/assets/images/games/up.jpg" class = "card-img img-thumbnail">
				</div>
				<div class="photo-holder">
					<img src = "/assets/images/games/photo.jpg" class = "card-img img-thumbnail">
				</div>
				<div class="photo-holder">
					<img src = "/assets/images/games/up.jpg" class = "card-img img-thumbnail">
				</div>
			</div>
			<style type="text/css">
				#results-bar{
				    float: right;
				    width: calc(100% - 100px);
				    padding: 0 10px;
    				line-height: 50px;
				}
				.progress-bar {
				    -webkit-transition: all;
				    transition: all;
				}
				.control-bar-v{
				    float: left;
				    width: 100%;
				}

			</style>
			<div class="control-bar-v clearfix">
				<div class="inner-div">
					<input id="VotingTimer" data-role="none" data-width="100" type="text" value="0" data-linecap="round">
					<div id="results-bar">
						<p>Waiting for votes!</p>
						<div id="progress-wrapper" class="progress">

						</div>
					</div>	
				</div>
			</div>			
		</div>
	</div>
@stop