/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
 function save_favicon(){
alert('saving');
 
 }
 
( function( $ ) {
	$('#save').click(function(){

		 setTimeout(save_favicon(),200);
		
	});
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	//------------- Header Options --------------//
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' == to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
	// Header Background Option.
	wp.customize( 'header_background_color', function( value ) {
    value.bind( function( to ) {
 
        if ( 'dark' === to ) {
 
            $( '#masthead' ).css({
                background: 'rgba(0, 0, 0, 0.7)',
            });
 
        } else {
 
            $( '#masthead' ).css({
                background: 'rgba(255, 255, 255, 0.7)',
            });
        }
    });
	});
	
	// Top Background Option.
	wp.customize( 'topbar_background_color', function( value ) {
    value.bind( function( to ) {
 
        if ( 'topdark' === to ) {
 
            $( '#topBar' ).css({
                background: 'rgba(0, 0, 0, 0.7)',
            });
 
        } else {
 
            $( '#topBar' ).css({
                background: 'rgba(255, 255, 255, 0.7)',
            });
        }
    });
	});
	
	//------------- Nav Menu Options Options --------------//
	
	// Nav Font Family Option.
	wp.customize( 'nav_font_family', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main a').css('font-family', to );
	});
	});
	
	// Nav Font Colour Option.
	wp.customize( 'nav_color', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main a').css('color', to );
	});
	});
	
	// Nav Font Size Option.
	wp.customize( 'nav_font_size', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main a').css('font-size', to );
	});
	});
	
	// Nav Background Colour Option.
	wp.customize( 'nav_background_color', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main li a').css('background-color', to );
	});
	});
	
	// Nav Hover Colour Option.
	wp.customize( 'nav_hover_color', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main a:hover').css('color', to );
	});
	});
	
	// Nav Hover Background Colour Option.
	wp.customize( 'nav_hover_background_color', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main li:hover a').css('background-color', to );
	});
	});
	
	// Nav Current Text Colour Option.
	wp.customize( 'nav_current_text_color', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main li.current_page_item a, .navigation-main li.current-menu-item a').css('color', to );
	});
	});
	
	// Nav Current Background Colour Option.
	wp.customize( 'nav_current_background_color', function( value ) {
		value.bind( function( to ) {
			$('.navigation-main li.current_page_item a, .navigation-main li.current-menu-item a').css('background-color', to );
	});
	});
	
	//------------- Text Options --------------//
	
	
	// Body Font Family Option.
	wp.customize( 'body_font_family', function( value ) {
		value.bind( function( to ) {
			$('body').css('font-family', to );
	});
	});
	
	// Body Font Size Option.
	wp.customize( 'font_size', function( value ) {
		value.bind( function( to ) {
			$('p').css('font-size', to );
	});
	});
	
	// Body Font Colour Option.
	wp.customize( 'body_text_color', function( value ) {
		value.bind( function( to ) {
			$('body').css('color', to );
	});
	});
	
	// Link Colour Option.
	wp.customize( 'link_color', function( value ) {
		value.bind( function( to ) {
			$('a').css('color', to );
	});
	});
	
	// Link Hover Colour Option.
	wp.customize( 'hover_link_color', function( value ) {
		value.bind( function( to ) {
			$('a').css('color', to );
	});
	});
	
	// H1 Font Family Option.
	wp.customize( 'h1_font_family', function( value ) {
		value.bind( function( to ) {
			$('h1').css('font-family', to );
	});
	});
	
	// H1 Font Colour Option.
	wp.customize( 'h1_text_color', function( value ) {
		value.bind( function( to ) {
			$('h1').css('color', to );
	});
	});
	
	// H2 Font Family Option.
	wp.customize( 'h2_font_family', function( value ) {
		value.bind( function( to ) {
			$('h2').css('font-family', to );
	});
	});
	
	// H2 Font Colour Option.
	wp.customize( 'h2_text_color', function( value ) {
		value.bind( function( to ) {
			$('h2').css('color', to );
	});
	});
	
	// H3 Font Family Option.
	wp.customize( 'h3_font_family', function( value ) {
		value.bind( function( to ) {
			$('h3').css('font-family', to );
	});
	});
	
	// H3 Font Colour Option.
	wp.customize( '31_text_color', function( value ) {
		value.bind( function( to ) {
			$('h3').css('color', to );
	});
	});
	
	// H4 Font Family Option.
	wp.customize( 'h4_font_family', function( value ) {
		value.bind( function( to ) {
			$('h4').css('font-family', to );
	});
	});
	
	// H4 Font Colour Option.
	wp.customize( 'h4_text_color', function( value ) {
		value.bind( function( to ) {
			$('h4').css('color', to );
	});
	});
	
	// H5 Font Family Option.
	wp.customize( 'h5_font_family', function( value ) {
		value.bind( function( to ) {
			$('h5').css('font-family', to );
	});
	});
	
	// H5 Font Colour Option.
	wp.customize( 'h5_text_color', function( value ) {
		value.bind( function( to ) {
			$('h5').css('color', to );
	});
	});
	
	// H6 Font Family Option.
	wp.customize( 'h6_font_family', function( value ) {
		value.bind( function( to ) {
			$('h6').css('font-family', to );
	});
	});
	
	// H6 Font Colour Option.
	wp.customize( 'h6_text_color', function( value ) {
		value.bind( function( to ) {
			$('h6').css('color', to );
	});
	});
	
	
	//------------- Sidebar Options --------------//
	
	// Sidebar Border Top Option.
	wp.customize( 'sidebar_border_top', function( value ) {
		value.bind( function( to ) {
			$('#secondary').css('border-top', to );
	});
	});
	
	// Sidebar Border Bottom Option.
	wp.customize( 'sidebar_border_bottom', function( value ) {
		value.bind( function( to ) {
			$('#secondary').css('border-bottom', to );
	});
	});
	
	// Sidebar Border Left Option.
	wp.customize( 'sidebar_border_left', function( value ) {
		value.bind( function( to ) {
			$('#secondary').css('border-left', to );
	});
	});
	
	// Sidebar Border Right Option.
	wp.customize( 'sidebar_border_right', function( value ) {
		value.bind( function( to ) {
			$('#secondary').css('border-right', to );
	});
	});
	
	// Sidebar Background Colour Option.
	wp.customize( 'sidebar_background_color', function( value ) {
		value.bind( function( to ) {
			$('#secondary').css('background-color', to );
	});
	});
	
	//------------- Footer Options --------------//
	
	// Footer Background Option.
	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( to ) {
			$('.site-footer').css('background-color', to );
	});
	});
	
	// Site Info Background Colour Option.
	wp.customize( 'bottombar_background_color', function( value ) {
		value.bind( function( to ) {
			$('#siteInfo-container').css('background-color', to );
	});
	});
	
	// Site Info Background image Option. (NOT WORKING)
	wp.customize( 'bottombar_background_image', function( value ) {
		value.bind( function( to ) {
			$('#siteInfo-container').css('background-image', to );
	});
	});
	
	// Site Info Text Colour Option.
	wp.customize( 'siteInfo_text_color', function( value ) {
		value.bind( function( to ) {
			$('.site-info').css('color', to );
	});
	});
	
	
	
// ---------------------end

})
( jQuery );