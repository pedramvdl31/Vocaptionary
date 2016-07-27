$(document).ready(function(){
	main.pageLoad();
	main.events();

});
main = {
	pageLoad: function() {
        if (location.hash == "#_=_") {
            removeHash();
        }
        $(document).bind('pagechange', function() {
          $('.ui-page-active .ui-listview').listview('refresh');
          $('.ui-page-active :jqmData(role=content)').trigger('create');
        });
        // loading-wrapper
        jQuery(window).load(function () {
            $('#main-overlay').fadeOut('slow');
        });

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
function removeHash() {
var scrollV, scrollH, loc = window.location;
if ('replaceState' in history) {
    history.replaceState('', document.title, loc.pathname + loc.search);
} else {
    // Prevent scrolling by storing the page's current scroll offset
    scrollV = document.body.scrollTop;
    scrollH = document.body.scrollLeft;

    loc.hash = '';

    // Restore the scroll offset, should be flicker free
    document.body.scrollTop = scrollV;
    document.body.scrollLeft = scrollH;
}
}