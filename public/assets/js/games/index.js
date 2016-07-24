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

		window.all_voted=0;

		fake_game_wt();
		// fake_game();

		$("#CountDownTimer").TimeCircles({ 
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

		// start_pie_timer(4);
		
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
					fake_game_start();
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
function start_pie_timer(tm)
{
	window.pie_count = tm;
	window.pt_stater = tm-1;
	initiate_pietimer(tm);
	window.counter = setInterval(function(){ 
		var output = pie_timer();
		if (output==0) {
		}
	 }, 1000);
}
function initiate_pietimer(ptime){
	$('#pietimer').pietimer({
	    seconds: ptime,
	    color: 'red',
	    height: 40,
	    width: 40
	},
	function(){
	    // alert('boom');
	});
}
function pie_timer()
{
	$('#timer').text(pie_count+' secs');
	pie_count = pie_count-1;
	if (pie_count == -1)
	{
		$('#timer').text('0 secs');
	 	clearInterval(counter);
	}
	if (pie_count==pt_stater) {
		setTimeout(function(){ $('#pietimer').pietimer('start'); }, 10);
	}
	return pie_count;
}

function fake_game_wt()
{
	WaitingTimer(0);
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
					// fake_game();
			        break;
			}

		}, 1000);
	}, 2000);
}

function fake_game()
{
	// hide the waiting layer
	$('#waiting-overlay').fadeOut(400, function(){
	    $(this).remove();
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
function fake_game_start(){
	var ht = '  <div id="starting-overlay">'+
				    '<center id="loading-wrapper"><img class="loading-img" src="/assets/images/icons/gif/loading1.gif">'+
				    	'<p>&nbsp;</p>'+
				    	'<p>Game will start in</p>'+
				    	'<p><span id="start-timer">4</span></p>'+
				    '</center>'+
				'</div>';
	$('#inner-container').append(ht);
	scroll_to_ele('#starting-overlay');
	get_ready_timer(4);
	prepare_game_window();
}
function get_ready_timer(tm){
	window.ready_timer = setInterval(function(){ 
			$('#start-timer').text(tm+' Seconds');
			tm = tm-1;
			if (tm == -1)
			{
			 	clearInterval(ready_timer);
			 	fake_game_start_2();
			}
	}, 1000);
}
function fake_game_start_2(){
	// starting-overlay
	$('#starting-overlay').fadeOut(400, function(){
	    $(this).remove();

	});

}
function prepare_game_window(){
	$('#card-images').remove();
    $('#results-bar').remove();
    var caption_game_html = '<div id="card-images">'+
								'<img src = "'+chosen_one_src+'" class = "card-img img-thumbnail">'+
							'</div>';
	$('#main_wrap').append(caption_game_html);
}