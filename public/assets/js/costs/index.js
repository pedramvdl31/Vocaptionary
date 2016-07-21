$(document).ready(function(){
	costsind.pageLoad();
	costsind.events();

});
costsind = {

	pageLoad: function() {
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});
		alert();
	},
	events: function() {
        $(document).on('click','.costsind',function(){
         
        });
	}
}
request_ci = {

};

