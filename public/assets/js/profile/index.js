//Follow Button Effect

$(document).ready(

	function iniciar(){
		$('.follow').on("click", function(){
			$('.follow').css('background-color','#34CF7A');
			$('.follow').html('<div class="icon-ok"></div> Following');
		});	
		$('.btn-nxt').on("click", function(){

			$('.pages').fadeOut();
				var _this = '.'+$(this).attr('navigate-to')+'-page';
				setTimeout(function(){ 
					$(_this).fadeIn();
						$('html, body').animate({
					        scrollTop: $(_this).offset().top
					    }, 200);
			 }, 500,_this);
		});	


		$('#to-play').on("click", function(){
			window.location.href = "/play";
		});	
		$('#to-study').on("click", function(){
			window.location.href = "/study";
		});	

	}

);