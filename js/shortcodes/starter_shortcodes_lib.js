jQuery(function($){
	$(document).ready(function(){
		
		// Toggle
		$("h3.starter-toggle-trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("fast");
			return false; //Prevent the browser jump to the link anchor
		});
					
		// UI tabs
		$( ".starter-tabs" ).tabs();
		
		// UI accordion
		$(".starter-accordion").accordion({autoHeight: false});		

	}); // END doc ready
}); // END function ($)