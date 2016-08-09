$(document).ready(function(){
	games.pageLoad();
	games.events();
});
games = {
	pageLoad: function() {
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});
	    jQuery(window).load(function () {
	        $('#main-overlay').fadeOut('slow');
	    });
		window.chosen_one_src = '';
		window.answer_caption = '';
		window.all_voted=0;
		window.all_done=0;
		window.all_rank=0;
		FakeGameStage1();
	},
	events: function() {
        $('.card-img').click(function(){
        	chosen_one_src = $(this).find('.ad-image:first').attr('this-url');
        	$( ".card-img" ).unbind();
         	$('.card-img').css('background-color','white');
         	$('.card-img').css('opacity','0.3');
         	$(this).css('background-color','green');
         	$(this).css('opacity','1');
         	make_and_add_pbar_html('success');
			animate_pbar();
			scroll_to_ele('#results-bar');
			var check_votes = setInterval(function(){ 
				if (all_voted==1) {
					clearInterval(check_votes);
					setTimeout(function(){ 
						FakeGameStage3();
				 	}, 500); 
				}
			}, 500);
		});
        $('#cancel-btn').click(function(){
			// similar behavior as clicking on a link
			window.location.href = "/";
		});
	}
}
request_games = {

};

function FakeGameStage1()
{
	WaitingTimer(1);
	make_and_add_pbar_html_wt('success');
	animate_pbar_wt();
	LoadFakeJoiningBar();
}
function FakeGameStage2()
{
	// hide the waiting layer
	$('#page-overlay-notification').fadeOut(400, function(){
		$('#page-overlay-notification').html('');
		StartKnobTimer('#VotingTimer',10,0);
	});
	//proceed to voting
	LoadFakeVotingBar();
}
function scroll_to_ele(_this){
	$('html, body').animate({
        scrollTop: $(_this).offset().top
    }, 500);
}
function WaitingTimer(wc)
{
	window.coun_waiting = setInterval(function(){ 
			var wct = wc;
			if (wc<10) {
				wct = '0'+wc;
			}
			$('#w-t').text(wct+' Seconds');
			wc = wc+1;
	}, 1000);
}
function FakeGameStage3(){
	$('.other-users-profile').css('opacity','0.5');
	$('#page-overlay-notification').fadeOut(400, function(){
		prepare_game_window();
	});
}
function prepare_game_window(){
    var caption_game_html = '<div class="control-bar-v clearfix">'+
								'<div class="inner-div">'+
									'<div class="timer-wrap">'+
										'<input id="WriteCaptionTimer" data-role="none" data-width="70" data-height="70" type="text" value="0" data-linecap="round">'+		
									'</div>'+
									'<div id="results-bar">'+
										'<div id="progress-wrapper-fns" class="progress">'+
										'</div>'+
									'</div>'+	
								'</div>'+
							'</div>'+
							'<div id="card-image-holder">'+
								'<img src = "'+chosen_one_src+'" class = "card-img img-thumbnail">'+
							'</div>'+
							'<div id="caption-container">'+
								'<textarea style="resize: none;" id="caption-txtarea" placeholder="Enter caption…&#13;&#10;-or-&#13;&#10;SAY something about this picture!!&#13;&#10;'+
									'" class="form-control" rows="5" id="comment"></textarea>'+
							'</div>'+
							'<div id="cb-btn-holder">'+
								'<button id="sbmt-caption" class="btn btn-primary btn-lg">Submit</button>'+
							'</div>';
	$('#page-body').fadeOut(400, function(){
		$('#card-images').remove();
    	$('#results-bar').remove();
    	$('#page-body').html(caption_game_html);
		$('#page-body').fadeIn(10);
		StartKnobTimer('#WriteCaptionTimer',35,0);
		LoadFakeFinishedBar();
	    $(document).on('click','#sbmt-caption',function(){
		    make_and_add_pbar_html_fns('success');
			animate_pbar_fns();
	    	answer_caption = $('#caption-txtarea').val();
			var check_f = setInterval(function(){ 
				if (all_done==1) {
					clearInterval(check_f); 
					setTimeout(function(){ 
						ViewCaptionResultPage();
					 }, 500);
				}
			}, 500);
	    });
	});
}
function ViewCaptionResultPage(){
	var html = 
					'<div id="card-image-holder">'+
						'<img src = "'+chosen_one_src+'" class = "card-img img-thumbnail">'+
					'</div>'+
					'<div class="control-bar-v clearfix">'+
						'<div class="inner-div">'+
							'<div class="timer-wrap">'+
								'<input id="RankingTimer" data-role="none" data-width="70" data-height="70" type="text" value="0" data-linecap="round">'+		
							'</div>'+
							'<div id="results-bar">'+
								'<div id="progress-wrapper-rnk" class="progress">'+
								'</div>'+
							'</div>'+	
						'</div>'+
					'</div>'+
					'<h3 style="text-transform: uppercase;">Time To Vote</h3>'+
					'<div id="rating-wrapper">'+
						'<div id="captions-holder">'+
							'<div class="inner-div">'+
								'<div class="panel panel-default caption-panel">'+
								  '<div class="panel-heading clearfix" style="text-align: left;">'+
								  	'<div class="heading-wrapper clearfix">'+
								  		'<div class="heading-name">'+
								  			'<span id="name-text">Helena&nbsp;<span class="new-cap rank-cap-1"></span></span>'+
								  		'</div>'+
								  		'<div class="heading-star">'+
											'<input id="rank-1" data-size="xs" class="input-7-xs"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
								  		'</div>'+
								  	'</div>'+
								  '</div>'+
								  '<div class="panel-body cap-body">'+
										'<div class="form-group cap-fg">'+
										    '<div class="input-group">'+
										        '<div class="caption-text">'+
										        	'<p>Who needs forks & knives?</p>'+
										        '</div>'+
										    '</div>'+
										'</div>'+
								  '</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div id="captions-holder">'+
							'<div class="inner-div">'+
								'<div class="panel panel-default caption-panel">'+
								  '<div class="panel-heading clearfix" style="text-align: left;">'+
								  	'<div class="heading-wrapper clearfix">'+
								  		'<div class="heading-name">'+
								  			'<span id="name-text">Robert&nbsp;<span class="new-cap rank-cap-2"></span></span>'+
								  		'</div>'+
								  		'<div class="heading-star">'+
											'<input id="rank-2" data-size="xs" class="input-7-xs"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
								  		'</div>'+
								  	'</div>'+
								  '</div>'+
								  '<div class="panel-body cap-body">'+
										'<div class="form-group cap-fg">'+
										    '<div class="input-group">'+
										        '<div class="caption-text">'+
										        	'<p>This is how diabetes starts…</p>'+
										        '</div>'+
										    '</div>'+
										'</div>'+
								  '</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div id="captions-holder">'+
							'<div class="inner-div">'+
								'<div class="panel panel-default caption-panel"  style="margin-bottom: 0;">'+
								  '<div class="panel-heading clearfix" style="text-align: left;">'+
								  	'<div class="heading-wrapper clearfix">'+
								  		'<div class="heading-name">'+
								  			'<span id="name-text">Kim&nbsp;<span class="new-cap rank-cap-3"></span></span>'+
								  		'</div>'+
								  		'<div class="heading-star">'+
											'<input id="rank-3" data-size="xs" class="input-7-xs"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
								  		'</div>'+
								  	'</div>'+
								  '</div>'+
								  '<div class="panel-body cap-body">'+
										'<div class="form-group cap-fg">'+
										    '<div class="input-group">'+
										        '<div class="caption-text">'+
										        	'<p>Save some for me, kid!</p>'+
										        '</div>'+
										    '</div>'+
										'</div>'+
								  '</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="control-bar-vr">'+
						'<button id="see-results" class="btn btn-primary btn-sm">View Result</button>'+
					'</div>';
	$('#page-body').fadeOut(400, function(){
		$('#page-body').html(html);
		$('#page-body').fadeIn(10);
		for (var i = 1; i <= 3; i++) {
			var this_el = '#rank-'+i;
			InitiateRatingVotingPage(this_el,i);
		}
		LoadFakeRankingBar();
		StartKnobTimer('#RankingTimer',15,0);
		$(document).on('click','#see-results',function(){
		    make_and_add_pbar_html_rnk('success');
			animate_pbar_rnk();
			var check_r = setInterval(function(){ 
				if (all_rank==1) {
					clearInterval(check_r); 
					setTimeout(function(){ 
						RetriveFinalRanks();
					 }, 500);
				}
			}, 500);
	    });
	});
}
function RetriveFinalRanks(){
	var html = '<div style="float: left;width: 100%;"><h3 class="pulse">Please Wait...</h3></div>';
	$('#page-body').fadeOut(400, function(){
		$('#page-body').html(html);
		$('#page-body').fadeIn();
		setTimeout(function(){ 
			var ranks_html = 
				'<div id="card-image-holder">'+
					'<img src = "'+chosen_one_src+'" class = "card-img img-thumbnail">'+
				'</div>'+
				'<div id="rating-wrapper">'+
					'<div id="captions-holder">'+
						'<div class="inner-div">'+
							'<div class="panel panel-default caption-panel">'+
							  '<div class="panel-heading clearfix" style="text-align: left;">'+
							  	'<div class="heading-wrapper clearfix">'+
							  		'<div class="heading-name">'+
							  			'<span id="name-text">Cooper</span>'+
							  		'</div>'+
							  		'<div class="heading-star fadeIn" style="visibility: hidden;">'+
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="4.1" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>Little Girl Eating Chocolate Cake</p>'+
									        '</div>'+
									    '</div>'+
									'</div>'+
							  '</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div id="captions-holder">'+
						'<div class="inner-div">'+
							'<div class="panel panel-default caption-panel">'+
							  '<div class="panel-heading clearfix" style="text-align: left;">'+
							  	'<div class="heading-wrapper clearfix">'+
							  		'<div class="heading-name">'+
							  			'<span id="name-text">Helena</span>'+
							  		'</div>'+
							  		'<div class="heading-star fadeIn" style="visibility: hidden;">'+
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="3.0" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>Who needs forks & knives?</p>'+
									        '</div>'+
									    '</div>'+
									'</div>'+
							  '</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div id="captions-holder">'+
						'<div class="inner-div">'+
							'<div class="rp panel panel-default caption-panel">'+
							  '<div class="panel-heading clearfix" style="text-align: left;">'+
							  	'<div class="heading-wrapper clearfix">'+
							  		'<div class="heading-name">'+
							  			'<span id="name-text">Robert</span>'+
							  		'</div>'+
							  		'<div class="heading-star fadeIn" style="visibility: hidden;">'+
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="5" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>This is how diabetes starts…</p>'+
									        '</div>'+
									    '</div>'+
									'</div>'+
							  '</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div id="captions-holder">'+
						'<div class="inner-div">'+
							'<div class="panel panel-default caption-panel" style="margin-bottom: 0;">'+
							  '<div class="panel-heading clearfix" style="text-align: left;">'+
							  	'<div class="heading-wrapper clearfix">'+
							  		'<div class="heading-name">'+
							  			'<span id="name-text">Kim</span>'+
							  		'</div>'+
							  		'<div class="heading-star fadeIn" style="visibility: hidden;">'+
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="4.5" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>Save some for me, kid!</p>'+
									        '</div>'+
									    '</div>'+
									'</div>'+
							  '</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="control-bar-vr clearfix">'+
						'<button id="back-home" class="btn btn-info btn-sm pull-left">Home</button>'+
						'<button id="p-again" class="btn btn-success btn-sm pull-right">Play Again</button>'+
					'</div>'
				'</div>';
			$('#page-body').fadeOut(400, function(){
				$('#page-body').html(ranks_html);
				InitiateRatingFinal('.f-ranks');
				$('#page-body').fadeIn();
				setTimeout(function(){ 
					$(document).find('.rp').addClass('panel-big').removeClass('panel-default').addClass('panel-success');
				 }, 1000);
			});
		}, 2000);
	});
	$(document).on('click','#back-home',function(){
		window.location.href = "/";
    });
	$(document).on('click','#p-again',function(){
		window.location.href = "/play";
    });	
}
function InitiateRatingVotingPage(elem,_i){
    $(elem).rating({
    	captionElement: ".rank-cap-"+_i,
        step: 1,
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
        starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
    });
}
function InitiateRatingFinal(elem){
    $(elem).rating({
        step: 1,
		displayOnly: true,
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
        starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
    });
}
function InitiatePieTimer(elem){
	$(elem).TimeCircles({ 
		time: { 
			Hours: { show: false }, 
			Days: { show: false }, 
			Minutes: { show: false }, 
			Seconds: {
				show: true,
				text: "Seconds",
				color: "#60686F"
			}
		},
		count_past_zero: false,
		circle_bg_color: "#ababab", // determines the color of the background circle.
	});
}
function StartKnobTimer(elem,max,min){
	//init
	$(elem).knob();
	//set value
	$(elem).val(max).trigger("change");
	//configs
	$(elem).trigger(
        'configure',
        {
            "min":min,
            "max":max
        }
	);
	var ktimer = setInterval(function(){ 
		max = max-1;
		$(elem).val(max).trigger("change");
		if (max == -1)
		{
		 	clearInterval(ktimer);
		}
	}, 1000);
}

function LoadFakeJoiningBar(){
	setTimeout(function(){ 
		window.vcount_wt=1;
		var html = '';
		var count_vwt = setInterval(function(){ 
			vcount_wt = vcount_wt + 1;
			switch (vcount_wt) {
			    case 2:
		        	make_and_add_pbar_html_wt('danger');
					animate_pbar_wt();
			        break;
			    case 3:
			    	make_and_add_pbar_html_wt('warning');
					animate_pbar_wt();
			        break;
			    case 4:
					make_and_add_pbar_html_wt('info');
					animate_pbar_wt();  
					clearInterval(count_vwt);  	  
					//everyone joined the game-navigate to choosing image
					setTimeout(function(){ 
						FakeGameStage2();
				 	}, 500);
			        break;
			}

		}, 1000);
	}, 2000);
}
function LoadFakeVotingBar(){
	setTimeout(function(){ 
		window.vcount=0;
		var html = '';
		var count_v = setInterval(function(){ 
			vcount = vcount + 1;
			switch (vcount) {
			    case 1:
		        	make_and_add_pbar_html('danger');
					animate_pbar();
			        break;
			    case 2:
			    	make_and_add_pbar_html('warning');
					animate_pbar();
			        break;
			    case 3:
					make_and_add_pbar_html('info');
					animate_pbar();    
					clearInterval(count_v);	
					all_voted=1;        	
			        break;
			}

		 }, 1000);
	 }, 2000);
}
function LoadFakeFinishedBar(){
	setTimeout(function(){ 
		window.vcount=0;
		var html = '';
		var count_v = setInterval(function(){ 
			vcount = vcount + 1;
			switch (vcount) {
			    case 1:
		        	make_and_add_pbar_html_fns('danger');
					animate_pbar_fns();
			        break;
			    case 2:
			    	make_and_add_pbar_html_fns('warning');
					animate_pbar_fns();
			        break;
			    case 3:
					make_and_add_pbar_html_fns('info');
					animate_pbar_fns();    
					clearInterval(count_v);	
					all_done=1;        	
			        break;
			}

		 }, 1000);
	 }, 2000);
}
function LoadFakeRankingBar(){
	setTimeout(function(){ 
		window.vcount=0;
		var html = '';
		var count_v = setInterval(function(){ 
			vcount = vcount + 1;
			switch (vcount) {
			    case 1:
		        	make_and_add_pbar_html_rnk('danger');
					animate_pbar_rnk();
			        break;
			    case 2:
			    	make_and_add_pbar_html_rnk('warning');
					animate_pbar_rnk();
			        break;
			    case 3:
					make_and_add_pbar_html_rnk('info');
					animate_pbar_rnk();    
					clearInterval(count_v);	
					all_rank=1;        	
			        break;
			}

		 }, 1000);
	 }, 2000);
}
function make_and_add_pbar_html_rnk(kind){
	var pbar_count = ($('.pbar-uvote-rnk').length)+1;
	var html = '<div class="pbarrnk'+pbar_count+' pbar-uvote-rnk progress-bar progress-bar-striped progress-bar-'+kind+' active" style="width: 0">'+
				'<span >'+pbar_count+' Done</span>'+
				'</div>';	
	$('#progress-wrapper-rnk').append(html);
}
function animate_pbar_rnk(){
	var pbar_count = $('.pbar-uvote-rnk').length;
	$('.pbarrnk'+pbar_count).animate({
		width: "25%"
	}, 500);
}
function make_and_add_pbar_html_fns(kind){
	var pbar_count = ($('.pbar-uvote-fns').length)+1;
	var html = '<div class="pbarfns'+pbar_count+' pbar-uvote-fns progress-bar progress-bar-striped progress-bar-'+kind+' active" style="width: 0">'+
				'<span >'+pbar_count+' Done</span>'+
				'</div>';	
	$('#progress-wrapper-fns').append(html);
}
function animate_pbar_fns(){
	var pbar_count = $('.pbar-uvote-fns').length;
	$('.pbarfns'+pbar_count).animate({
		width: "25%"
	}, 500);
}
function make_and_add_pbar_html(kind){
	var pbar_count = ($('.pbar-uvote').length)+1;
	var html = '<div class="pbar'+pbar_count+' pbar-uvote progress-bar progress-bar-striped progress-bar-'+kind+' active" style="width: 0">'+
				'<span >'+pbar_count+' Voted</span>'+
				'</div>';	
	$('#progress-wrapper').append(html);
}
function animate_pbar(){
	var pbar_count = $('.pbar-uvote').length;
	$('.pbar'+pbar_count).animate({
		width: "25%"
	}, 500);
}
function make_and_add_pbar_html_wt(kind){
	var pbar_count = ($('.pbar-uvote-wt').length)+1;
	var html = '<div class="pbarwt'+pbar_count+' pbar-uvote-wt progress-bar progress-bar-striped progress-bar-'+kind+' active" style="width: 0">'+
				'<span >'+pbar_count+' Joined</span>'+
				'</div>';	
	$('#progress-wrapper-wt').append(html);
}
function animate_pbar_wt(){
	var pbar_count = $('.pbar-uvote-wt').length;
	$('.pbarwt'+pbar_count).animate({
		width: "25%"
	}, 500);
}