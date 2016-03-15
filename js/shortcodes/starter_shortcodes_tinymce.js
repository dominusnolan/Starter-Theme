
(function() {	
	tinymce.create('tinymce.plugins.starterShortcodeMce', {
		
		

		createControl : function(n, cm) {
		
		},
		init : function(ed, url){ 
			
	
					
			ed.addButton('starter_shortcodes_button',{
	            title: "Insert Shortcode",
				image: url +"/images/shortcodes.png",
				type: 'listbox',
				classes : 'widget btn starter',
				values :[
					{text:'Row Elements', 
						menu:[
							{text:'Fixed',value:'fixed',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
							tinyMCE.activeEditor.selection.setContent('[starter_row size="fixed" background_color="" background_image_url=""]<br />'+starterDummyContent+'<br />[/starter_row]');
							}},
							{text:'Full',value:'full',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_row size="full" background_color="" background_image_url=""]' + starterDummyContent + '[/starter_row]');					
							}}
						]
					},
					
					{text:'Column Elements', 
						menu:[
							{text:'One Half',value:'half',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
							tinyMCE.activeEditor.selection.setContent('[starter_column size="one-half" position="first"]<br />'+starterDummyContent+'<br />[/starter_column]');
							}},
							{text:'One Third',value:'third',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="one-third" position="first"]' + starterDummyContent + '[/starter_column]');					
							}},
							{text:'One Fourth',value:'fourth',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="one-fourth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'One Fifth',value:'fifth',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="one-fifth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'One Sixth',value:'sixth',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="one-sixth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'Two Thirds',value:'2thirds',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="two-third" position="first"]' + starterDummyContent + '[/starter_column]');				
							}},
							{text:'Three Fourths',value:'3fourths',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="three-fourth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'Two Fifths',value:'2fifths',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="two-fifth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'Three Fifths',value:'3fifths',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="three-fifth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'Fourth Fifths',value:'4fifths',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_column size="four-fifth" position="first"]' + starterDummyContent + '[/starter_column]');
							}},
							{text:'Five Sixth',value:'5sixth',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
							tinyMCE.activeEditor.selection.setContent('[starter_column size="five-sixth" position="first"]' + starterDummyContent + '[/starter_column]');
							}}
						]
					},
					{text:'Content Elements', 
						menu:[
							{text:'Button',value:'button',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_button color="blue" url="#" title="Visit Site" target="blank" border_radius=""]' + starterDummyContent + '[/starter_button]');
							}},
							{text:'Google Map',value:'googlemap',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_googlemap title="Envato Office" location="2 Elizabeth St, Melbourne Victoria 3000 Australia" zoom="10" height=250]');
							}},
							{text:'Heading',value:'heading',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_heading type="h2" title="' + starterDummyContent + '" margin_top="20px;" margin_bottom="20px" text_align="left"]');
							}},
							{text:'Testimonial',value:'testimonial',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_testimonial by="Laudo"]' + starterDummyContent + '[/starter_testimonial]');
							}},
							{text:'Recent Posts',value:'recentposts',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_recent_posts]');
							}},
							{text:'Contact Form',value:'contactform',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[contact_form]');
							}}
						]
					},
					{text:'Dividers', 
						menu:[
							{text:'Solid',value:'solid',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
						tinyMCE.activeEditor.selection.setContent('[starter_divider style="solid" margin_top="20px" margin_bottom="20px"]');
							}},
							{text:'Dashed',value:'dashed',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_divider style="dashed" margin_top="20px" margin_bottom="20px"]');
							}},
							{text:'Dotted',value:'dotted',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_divider style="dotted" margin_top="20px" margin_bottom="20px"]');
							}},
							{text:'Double',value:'double',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_divider style="double" margin_top="20px" margin_bottom="20px"]');
							}},
							{text:'FadeIn',value:'fadein',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_divider style="fadein" margin_top="20px" margin_bottom="20px"]');
							}},
							{text:'FadeOut',value:'fadeout',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_divider style="fadeout" margin_top="20px" margin_bottom="20px"]');
							}}
						]
					},
					{text:'jQuery', 
						menu:[
							{text:'Accordion',value:'accordion',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_accordion]<br />[starter_accordion_section title="Section 1"]<br />Accordion Content<br />[/starter_accordion_section]<br />[starter_accordion_section title="Section 2"]<br />Accordion Content<br />[/starter_accordion_section]<br />[/starter_accordion]');
							}},
							{text:'Tabs',value:'tabs',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_tabgroup]<br />[starter_tab title="First Tab"]<br />First tab content<br />[/starter_tab]<br />[starter_tab title="Second Tab"]<br />Third Tab Content.<br />[/starter_tab]<br />[/starter_tabgroup]');
							}},
							{text:'Toggle',value:'toggle',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_toggle title="This Is Your Toggle Title"]' + starterDummyContent + '[/starter_toggle]');
							}}
						]
					},
					{text:'Other', 
						menu:[
							{text:'Spacing',value:'spacing',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_spacing size="40px"]');
							}},
							{text:'Clear Floats',value:'clearfloats',onclick:function(){ 
								var mceSelected = tinyMCE.activeEditor.selection.getContent();if ( mceSelected ) { var starterDummyContent = mceSelected;} else {	var starterDummyContent = 'Sample Content';}
								tinyMCE.activeEditor.selection.setContent('[starter_clear_floats]');					
							}}
						]
					}
				]
			});
	
	
	
		}
	
	});
	tinymce.PluginManager.add("starter_shortcodes", tinymce.plugins.starterShortcodeMce);
	
	
})();