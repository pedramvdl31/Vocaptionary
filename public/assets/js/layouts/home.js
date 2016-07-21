$(document).ready(function(){
	main.pageLoad();
	main.events();

});
main = {
	pageLoad: function() {
        $( "#myPanel" ).panel({
          beforeclose: function( event, ui ) {
            $('#overlay').fadeOut('slow');
          },
          beforeopen: function( event, ui ) {
            $(document).find('.ui-panel-dismiss').append('<div id="overlay"></div>');
            setTimeout(function(){ 
                $('#overlay').fadeIn();
            }, 100); 
          }
        });
	},
	events: function() {
	}
}
request = {
	users: function() {
    $.ajax({
        type       : "GET",
        url        : "http://192.168.0.61:8000/api/v1/users-all",
        crossDomain: true,
        dataType   : 'json',
        success    : function(response) {
            //console.error(JSON.stringify(response));
            alert(response.mydata);
        },
        error      : function() {
            //console.error("error");
        }
    }); 
}
}
function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'');
}
 