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
			//hide all pages
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













// $(document).ready(function(){
// 	var everythingLoaded = setInterval(function() {
// 	  if (/loaded|complete/.test(document.readyState)) {
// 	    clearInterval(everythingLoaded);
// 	    window.setTimeout(function() {
// 	    	init();
// 		}, 1000);
// 	  }
// 	}, 200);
// });
// function init(){
// 	document.getElementById("a").style.display="block";
// 	document.getElementById("l").style.display="none";
// }

// function t(){
// 	window.vt = $('#vt');
// 	vt.knob();
// 	vt.val('10').trigger("change");
// 	vt.trigger(
//         'configure',
//         {
//             "min":0,
//             "max":10
//         }
// 	);
// }
// function FakeGameStage1(){
// 	// timer for joining
// 	var s = 1;
// 	var cw = setInterval(function(){ 
// 		 	document.getElementById("js").innerHTML=s;
// 			s = s+1;
// 	}, 1000);
// 	//fill the prograss bars
// 	var b = 0;
// 	var fb = setInterval(function(){ 
// 		b = b+1;
// 		var l = document.getElementById("b"+b);
// 		l.style.opacity = 1;
// 		l.style.width = "25%";		
// 		if (b==4) {clearInterval(fb)}	
// 	}, 1000);
// 	window.setTimeout(function() {
// 		document.getElementById("b").setAttribute('class','slide-out a');
// 		// document.getElementById("c").setAttribute('class','slide-in a');
// 		window.setTimeout(function() {
// 			FakeGameStage2();
// 		}, 1000);
// 	}, 5100);
// }
// function FakeGameStage2(){
// 	var max = 10;
// 	var ktimer = setInterval(function(){ 
// 		max = max-1;
// 		vt.val(max).trigger("change");
// 		if (max == -1)
// 		{
// 		 	clearInterval(ktimer);
// 		}
// 	}, 1000);
// }


