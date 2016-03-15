 var flagF = true;
function getSaveButton(){
var saveButton ='';
	 saveButton = document.getElementById('save').value;
	 return saveButton;
}
function save_favicon(){

	 var sb = getSaveButton(); 
			if(sb=='Saved' && flagF==true){
			jQuery('#save').val('Saving Favicon..');
			var data = {
				action: 'save_favicon',
				whatever: 1234
			}
			
			jQuery.post(ajaxurl,data,function(response){
				jQuery('#save').val('Saved..');
				jQuery('#customize-header-actions').append('<div class="favicon_popup">NOTE: You need to clear browser cache memory and reload to see the new favicon</div>');
					jQuery('.favicon_popup').click(function(){
							jQuery(this).hide();
					});
				clearInterval(t);
				var flagF = false;
				 
			});
			} 
 
 }

 function reset_startertheme(){
				jQuery('#customize-control-reset_button input').val('Resetting theme..');
			var data = {
				action: 'reset_startertheme',
				whatever: 1234
			}
			
			jQuery.post(ajaxurl,data,function(response){
			alert('Done');
				 
			});
 }
 
jQuery(document).ready(function(){

 	jQuery('#customize-header-actions').click(function(){
	 var flagF = true;
		var t = setInterval(function(){save_favicon()},200);	
	});
	
	
	jQuery('#customize-theme-controls').append(jQuery('#accordion-section-starter_reset'));
	jQuery('#customize-control-reset_button label span').remove();
	jQuery('#customize-control-reset_button input').attr('type','button').addClass('button button-primary');
	jQuery('#customize-control-reset_button input').click(function(){
		reset_startertheme();
	});
	
	var t = setInterval( function(){ jQuery('#accordion-section-sidebar-widgets-sidebar-page').css({'display':'list-item','height':'auto'}); },1500);
 });
 
 
 

