$(document).ready(function(){
	games.pageLoad();
	games.events();

});
games = {
	pageLoad: function() {
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});
		window.chosen_one_src = '';
		window.answer_caption = '';
		window.all_voted=0;
		FakeGameStage1();
		// ViewCaptionResultPage();
	},
	events: function() {
        $('.card-img').click(function(){
        	chosen_one_src = $(this).attr('src'); 
        	$( ".card-img" ).unbind();
         	$('.card-img').css('background-color','white');
         	$('.card-img').css('opacity','0.5');
         	$(this).css('background-color','green');
         	$(this).css('opacity','1');
         	make_and_add_pbar_html('success');
			animate_pbar();
			scroll_to_ele('#results-bar');
			var check_votes = setInterval(function(){ 
				if (all_voted==1) {
					clearInterval(check_votes); 
					FakeGameStage3();
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
					FakeGameStage2();
			        break;
			}

		}, 1000);
	}, 2000);
}

function FakeGameStage2()
{
	// hide the waiting layer
	$('#page-overlay-notification').fadeOut(400, function(){
		$('#page-overlay-notification').html('');
		StartKnobTimer('#VotingTimer',10,0);
	});
	
	//proceed to voting
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
	var ht = '<center id="loading-wrapper-wt"><img class="loading-img" src="/assets/images/icons/gif/loading1.gif">'+
		    	'<p>&nbsp;</p>'+
		    	'<p>Game will start in</p>'+
		    	'<p class="pulse"><span id="start-timer">4 Seconds</span></p>'+
			'</center>';
	$('#page-overlay-notification').html(ht);
	$('#page-overlay-notification').fadeIn(400, function(){
		$('#page-body').html('');
		scroll_to_ele('#page-overlay-notification');
		get_ready_timer(4);
	});

}
function get_ready_timer(tm){
	window.ready_timer = setInterval(function(){ 
			$('#start-timer').text(tm+' Seconds');
			tm = tm-1;
			if (tm == -1)
			{
			 	clearInterval(ready_timer);
			 	FakeGameStage4();
			}
	}, 1000);
}
function FakeGameStage4(){
	$('.other-users-profile').css('opacity','0.5');
	$('#page-overlay-notification').fadeOut(400, function(){
		prepare_game_window();
	});
}
function prepare_game_window(){
	$('#card-images').remove();
    $('#results-bar').remove();
    var caption_game_html = '<div id="card-images">'+
								'<img src = "'+chosen_one_src+'" class = "card-img img-thumbnail">'+
							'</div>'+
							'<div id="caption-container">'+
								'<textarea style="resize: none;" id="caption-txtarea" placeholder="Enter caption…&#13;&#10;-or-&#13;&#10;SAY something about this picture?!?&#13;&#10;'+
									'" class="form-control" rows="5" id="comment"></textarea>'+
							'</div>'+
							'<div class="control-bar clearfix">'+
								'<div class="left-timer-holder">'+
									'<input id="WriteCaptionTimer" data-role="none" data-width="100" type="text" value="0" data-linecap="round">'+
								'</div>'+
								'<div id="cb-btn-holder">'+
									'<button id="sbmt-caption" class="btn btn-primary btn-sm">Submit</button>'+
								'</div>'+
							'</div>';
	$('#page-body').html(caption_game_html);
	StartKnobTimer('#WriteCaptionTimer',35,0);
    $(document).on('click','#sbmt-caption',function(){
    	answer_caption = $('#caption-txtarea').val();
     	ViewCaptionResultPage();
    });
}
function ViewCaptionResultPage(){
	var html = '<h3 style="text-transform: uppercase;">Time To Vote</h3>'+
			'<div id="rating-wrapper">'+
				'<div id="captions-holder">'+
					'<div class="inner-div">'+
						'<div class="panel panel-default caption-panel">'+
						  '<div class="panel-heading clearfix" style="text-align: left;">'+
						  	'<div class="heading-wrapper clearfix">'+
						  		'<div class="heading-name">'+
						  			'<span id="name-text">Cooper</span>'+
						  		'</div>'+
						  		'<div class="heading-star">'+
						  		'</div>'+
						  	'</div>'+
						  '</div>'+
						  '<div class="panel-body cap-body">'+
								'<div class="form-group cap-fg">'+
								    '<div class="input-group">'+
								        '<div class="caption-text">'+
								        	'<p>'+answer_caption+'</p>'+
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
						  			'<span id="name-text">Robert&nbsp;<span class="new-cap rank-cap-1"></span></span>'+
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
								        	'<p>Bootstrap makes front-end web development faster and easier. Its made for folks of all skill levels, devices of all shapes, and projects of all sizes.</p>'+
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
						  			'<span id="name-text">Cooper&nbsp;<span class="new-cap rank-cap-2"></span></span>'+
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
								        	'<p>Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors, Less and Sass. Quickly get started with precompiled CSS or build on the source.</p>'+
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
						  			'<span id="name-text">Cooper&nbsp;<span class="new-cap rank-cap-3"></span></span>'+
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
								        	'<p>Millions of amazing sites across the web are being built with Bootstrap. Get started on your own with our growing collection of examples or by exploring some of our favorites.</p>'+
								        '</div>'+
								    '</div>'+
								'</div>'+
						  '</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="control-bar-v ">'+
				'<div class="inner-div clearfix">'+
				'<div class="left-timer-holder">'+
					'<input id="RankingTimer" data-role="none" data-width="100" type="text" value="0" data-linecap="round">'+
				'</div>'+					
				'<div id="cb-btn-holder"><button id="see-results" class="btn btn-primary btn-sm">View Result</button></div>'+
				'</div>'+
			'</div>';
	$('#page-body').html(html);
	for (var i = 1; i <= 3; i++) {
		var this_el = '#rank-'+i;
		InitiateRatingVotingPage(this_el,i);
	}
	
	StartKnobTimer('#RankingTimer',15,0);
	$(document).on('click','#see-results',function(){
		RetriveFinalRanks();
    });
}
function RetriveFinalRanks(){
	var html = '<div style="float: left;width: 100%;"><h3 class="pulse">Please Wait...</h3></div>';
	$('#page-body').fadeOut(400, function(){
		$('#page-body').html(html);
		$('#page-body').fadeIn();
		setTimeout(function(){ 
			var ranks_html = 
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
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>'+answer_caption+'</p>'+
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
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>Bootstrap makes front-end web development faster and easier. Its made for folks of all skill levels, devices of all shapes, and projects of all sizes.</p>'+
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
							  			'<span id="name-text">Cooper</span>'+
							  		'</div>'+
							  		'<div class="heading-star fadeIn" style="visibility: hidden;">'+
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors, Less and Sass. Quickly get started with precompiled CSS or build on the source.</p>'+
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
							  			'<span id="name-text">Cooper</span>'+
							  		'</div>'+
							  		'<div class="heading-star fadeIn" style="visibility: hidden;">'+
										'<input data-size="xs" class="f-ranks"  name="input-7-xs" value="2.5" class="rating-loading" data-role="none">'+
							  		'</div>'+
							  	'</div>'+
							  '</div>'+
							  '<div class="panel-body cap-body">'+
									'<div class="form-group cap-fg">'+
									    '<div class="input-group">'+
									        '<div class="caption-text">'+
									        	'<p>Millions of amazing sites across the web are being built with Bootstrap. Get started on your own with our growing collection of examples or by exploring some of our favorites.</p>'+
									        '</div>'+
									    '</div>'+
									'</div>'+
							  '</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
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


