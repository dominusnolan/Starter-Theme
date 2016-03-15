jQuery(function($){
	$(document).ready(function(){
		$('.starter-skillbar').each(function(){
			$(this).find('.starter-skillbar-bar').animate({ width: $(this).attr('data-percent') }, 1500 );
		});
	});
});