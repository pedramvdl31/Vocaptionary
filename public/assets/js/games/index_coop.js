//APP
$(document).ready(function(){
	Component.PreLoadDom();
	Component.Initiate();
	Component.events();
});

// COMPONENTS
Component = {
	PreLoadDom: function() {
		AppFunctions.PreLoadDom();
	},
	Initiate: function() {
		AppFunctions.CacheAnimations();
		AppFunctions.PageLodeView();
	},
	events: function() {
		EventListeners.PageChangeHandler();
		EventListeners.ViewChangeHandler();
		EventListeners.BackNavigateHandler();
	}

}

EventListeners = {
	PageChangeHandler(){
		$(DomElements['next-page']).on("click", function(){
			for (var i=0;i<DomElements['pages'].length;i+=1){
			  DomElements['pages'][i].style.display = 'none';
			}
			DomElements['div-'+this.getAttribute('page-href')].style.display = 'block';
		});	
	},
	ViewChangeHandler(){
		$(DomElements['next-view']).on("click", function(){
			$(DomElements['div-'+this.getAttribute('this-page')]).find(DomElements['pages-view']).css('display','none');
			document.getElementById(this.getAttribute('view-href')).style.display = 'block';
		});	
	},
	BackNavigateHandler(){
		$(DomElements['page-back-btn']).on("click", function(){
			//hide all pages
			for (var i=0;i<DomElements['pages'].length;i+=1){
			  DomElements['pages'][i].style.display = 'none';
			}
			DomElements['div-'+this.getAttribute('back-href')].style.display = 'block';
		});	
		$(DomElements['view-back-btn']).on("click", function(){
			$(DomElements['div-'+this.getAttribute('this-page')]).find(DomElements['pages-view']).css('display','none');
			document.getElementById(this.getAttribute('back-href')).style.display = 'block';
		});	
	}
}
//FUNCTIONS
AppFunctions = {
	PreLoadDom(){
		//PRELOADED DOMELEMETS
		window.DomElements = {
			'div-a': document.getElementById("a"), 
			'div-b': document.getElementById("b"), 
			'div-c': document.getElementById("c"), 
			'div-d': document.getElementById("d"), 
			'div-l': document.getElementById("l"), 
			'page-wrapper': document.getElementById("page-wrapper"),
			'next-page': document.getElementsByClassName("next-page"),
			'pages': document.getElementsByClassName("pages"),
			'next-view': document.getElementsByClassName("next-view"),
			'pages-view': document.getElementsByClassName("pages-view"),
			'page-back-btn': document.getElementsByClassName("page-back-btn"),
			'view-back-btn': document.getElementsByClassName("view-back-btn")
		};
	},
	CacheAnimations(){
		for (var j=0;j<DomElements['pages'].length;j+=1){
			for (var i=0;i<DomElements['pages'].length;i+=1){
			  DomElements['pages'][i].style.display = 'none';
			}
			switch (j) {
			    case 0:
			    	DomElements['div-a'].style.display = 'block';
			        break;
			    case 1:
			    	DomElements['div-b'].style.display = 'block';
			        break;
			    case 2:
			    	DomElements['div-c'].style.display = 'block';
			        break;
			    case 3:
			    	DomElements['div-d'].style.display = 'block';
			        break;
			}
		}
		for (var i=0;i<DomElements['pages'].length;i+=1){
		  DomElements['pages'][i].style.display = 'none';
		}
	},
	PageLodeView(){
		var everythingLoaded = setInterval(function() {
		  if (/loaded|complete/.test(document.readyState)) {
		    clearInterval(everythingLoaded);
		    window.setTimeout(function() {
		    	AppFunctions.ClearLoading();
			}, 1000);
		  }
		}, 200);
	},
	ClearLoading(){
		DomElements['div-a'].style.display="block";
		DomElements['div-l'].style.display="none";
	}
}
