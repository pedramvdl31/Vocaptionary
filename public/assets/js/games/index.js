$(document).ready(function(){
	games.pageLoad();
	games.events();

});
games = {
	pageLoad: function() {
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});
		window.mtime = 10;
		window._mtime = mtime-1;

		// start_timer(mtime);
	},
	events: function() {
        $(document).on('click','.card-img',function(){
         	$('.card-img').css('background-color','white');
         	$('.card-img').css('opacity','0.5');
         	$(this).css('background-color','green');
         	$(this).css('opacity','1');
        });
	}
}
request_games = {

};
function start_timer($tm)
{

	$('#pietimer').pietimer({
	    seconds: $tm,
	    color: 'red',
	    height: 40,
	    width: 40
	},
	function(){
	    // alert('boom');
	});

	window.count=$tm;
	window.counter = setInterval(function(){ 
		var output = timer();
		if (output==0) {
		}
	 }, 1000);
}
function timer()
{
	$('#timer').text(count+' secs');
	count = count-1;
	if (count == -1)
	{
		$('#timer').text('0 secs');
	 	clearInterval(counter);
	}
	if (count==_mtime) {
		setTimeout(function(){ $('#pietimer').pietimer('start'); }, 10);
	}
	return count;
}
