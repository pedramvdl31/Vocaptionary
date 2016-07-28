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
	#rating-wrapper{
		float: left;
	    width: 100%;
	    margin: 0;
	    padding: 0;
	    margin-top: 10px;
	}
	.control-bar-v{
		margin-top: 10px;
	    float: left;
	    width: 100%;
	}
	.control-bar-vr{
		margin:10px 0 10px 0;
	    float: left;
	    width: 100%;
	    padding: 0 15px;
	}
	#main_wrap{
		float: left;
    	padding-top: 59px;
	}
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
		margin-top: 10px !important;
	    text-align: center;
	    float: left;
	    width: 100%;
	    padding: 15px;
	    background: #9e9e9e;
	}
	#card-image-holder{
		margin-top: 40px;
	    text-align: center;
	    float: left;
	    width: 100%;
	    padding: 15px;
	    background: #9e9e9e;
	    margin-top: 10px;
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
		width: 100%;
	    /* margin: 0 auto; */
	    float: left;
	    padding: 0 15px;
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
		    background-color: rgb(54, 167, 232);
		    padding: 5px 10px 5px 10px;
		    border-radius: 27px;
		}
		.control-bar{
			width: 90%;
    		margin: 0 auto 20px auto;
		}
		#cb-btn-holder{
			float: left;
			width: 100%;
			margin: 10px 0 0 0;
		}
		.left-timer-holder{
			float: left;
		}
		#captions-holder{
			float: left;
			width: 100%;
		}
		.profile-header-img > img.img-circle {
		    border: 2px solid #40abe8;
		}
	    /* Large Devices, Wide Screens */
	    @media only screen and (max-width : 1200px) {

	    }
	    /* Medium Devices, Desktops */
	    @media only screen and (max-width : 992px) {

	    }
	    /* Small Devices, Tablets */
	    @media only screen and (max-width : 768px) {
	    	.profile-header-img > img.img-circle {
			    width: calc(58% - 0px);
			}  
	    }
	    /* Extra Small Devices, Phones */ 
	    @media only screen and (max-width : 480px) {
	    	.profile-header-img > img.img-circle {
			    width: calc(68% - 0px);
			}  
	    }
	    /* Custom, iPhone Retina */ 
	    @media only screen and (max-width : 320px) {
		    .profile-header-img > img.img-circle {
			    width: calc(100% - 2px);
			}   
	    }
	</style>


	<style type="text/css">
		.profile-header-container{
			width: 25%;
		}
		.profile-header-img {
			margin-bottom: 6px;
		    padding-top: 54px;
		}
		.rank-label{
			font-size: 2vw !important;
		}
		.star-i{
			color: #FFD700;
		}
		.img-thumbnail{
		    width: 25% !important;
    		margin: 0 auto;
		}
		#caption-container{
		    width: 100%;
		    margin: 10px auto 0 auto;
		    float: left;
		    padding: 0 10px;
		}
		#profile-images{
			width: 100%;
    		overflow: hidden;
			float: left;
			height: 158px;     
		}
		.p-image-wrap{
		    position: relative;
		    float: left;
		    width: 25%;
		    height: 100%;
		    padding: 0;
		    /* border: 1px solid #3ba9e8; */
		    /* border-radius: 12px; */
		    padding: 3px;
		    overflow: hidden;			
		}
		.p-image{    
		    float: left;
		    width: 100%;
		    /* margin: 10px; */
		    border: 1px solid #3ba9e8;
		    border-radius: 10px;
		    overflow: hidden;
		}
		.fit-image-wrapper{
			float: left;
            height: 100px;
    		width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
		}
		.p-name{
			float: left;
			height: 20px;
			width: 100%;
			line-height: 20px;
			background: #9e9e9e;
			color: white;
		}
		.p-caption{
			color: white;
			line-height: 30px;
			width: 100%;
		    float: left;
		    height: 30px;
		    background: #9e9e9e;
		    position: relative;
		}
		#page-body{
			float: left;
		    width: 100%;
		    margin: 0;
		    padding: 0;
		}
		#results-bar{
		    float: right;
		    width: calc(100% - 100px);
		    padding: 38px 10px 0 10px;
		}
		.progress-bar {
		    -webkit-transition: all;
		    transition: all;
		}

		 .photo-holder{
		 	width: 100%;
			float: left;
		 }
		 #mygallery{
		 	width: 100%;
		 }
		 .images-wrapp{
		 	width: 25%;
		 	float: left;
		 }
		 .images-wrapp>img{
		 	width: 100%;
		 }
		 .timer-wrap{
		 	float: left;
		 }
		 .inner-div{

		 }
		 #vote-text{
		 	float: left;
		 	width: 100%;
		 	margin-top: 10px;
		 }
	</style>

	<div id="main_wrap">
		<div id="profile-images" style="width:100%">
			<div class="p-image-wrap">
				<div class="p-image">
					<div class="p-name"><span>Cooper</span></div>
					<div class="fit-image-wrapper" style="background-image: url('/assets/images/games/photo.jpg')"></div>
					<div class="p-caption">100 <i class="glyphicon glyphicon-star"></i></div>
				</div>				
			</div>
			<div class="p-image-wrap">
				<div class="p-image">
					<div class="p-name"><span>Cooper</span></div>
					<div class="fit-image-wrapper" style="background-image: url('/assets/images/games/photo.jpg')"></div>
					<div class="p-caption">100 <i class="glyphicon glyphicon-star"></i></div>
				</div>				
			</div>
			<div class="p-image-wrap">
				<div class="p-image">
					<div class="p-name"><span>Cooper</span></div>
					<div class="fit-image-wrapper" style="background-image: url('/assets/images/games/photo.jpg')"></div>
					<div class="p-caption">100 <i class="glyphicon glyphicon-star"></i></div>
				</div>				
			</div>
			<div class="p-image-wrap">
				<div class="p-image">
					<div class="p-name"><span>Cooper</span></div>
					<div class="fit-image-wrapper" style="background-image: url('/assets/images/games/photo.jpg')"></div>
					<div class="p-caption">100 <i class="glyphicon glyphicon-star"></i></div>
				</div>				
			</div>


		</div>
		<div id="page-body">
			<div class="control-bar-v clearfix">
				<div class="inner-div">
					<div class="timer-wrap">
						<input id="VotingTimer" data-role="none" data-width="100" data-height="100" type="text" value="0" data-linecap="round">		
					</div>
					<div id="results-bar">
						<div id="progress-wrapper" class="progress">

						</div>
					</div>	
				</div>
			</div>
			<div id="vote-text">
				<h3 style="text-transform: uppercase;margin: 0;">Vote for an image...</h3>
			</div>
			<div id="card-images">
				<div id="mygallery" >
					<div class="images-wrapp card-img">
				    	<img alt="Title 1" src="/assets/images/games/test1.jpg"/>
					</div>
					<div class="images-wrapp card-img">
				    	<img alt="Title 1" src="/assets/images/games/test2.jpg"/>
					</div>
					<div class="images-wrapp card-img">
						<img alt="Title 1" src="/assets/images/games/test4.gif"/>
					</div>
					<div class="images-wrapp card-img">
						<img alt="Title 2" src="/assets/images/games/test6.png"/>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop