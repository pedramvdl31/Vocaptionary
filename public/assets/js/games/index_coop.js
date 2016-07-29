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
	},
	events: function() {

	}
}
request_games = {

};
