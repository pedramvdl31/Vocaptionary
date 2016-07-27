$(document).ready(function(){
	studies.pageLoad();
	studies.events();

});
studies = {
	pageLoad: function() {
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});
	},
	events: function() {

	}
}
request_studies = {

};

