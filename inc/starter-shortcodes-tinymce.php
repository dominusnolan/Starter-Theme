<?php
/**
 * This file has all the main shortcode functions
 * @package Starter Shortcodes Plugin
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @License: GNU General Public License version 3.0
 * @License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 *
 * Special thank you to my buddy Syamil @ http://aquagraphite.com/
 */
 /*
class SYMPLE_TinyMCE_Buttons {
	function __construct() {
    	add_action( 'init', array($this,'init') );
    }
    function init() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;		
		if ( get_user_option('rich_editing') == 'true' ) {  
			add_filter( 'mce_external_plugins', array($this, 'add_plugin') );  
			add_filter( 'mce_buttons', array($this,'register_button') ); 
		}  
    }  
	function add_plugin($plugin_array) {  
	   $plugin_array['starter_shortcodes'] = get_template_directory_uri() .'/js/shortcodes/starter_shortcodes_tinymce.js';
	   return $plugin_array; 
	}
	function register_button($buttons) {  
	   array_push($buttons, "starter_shortcodes_button");
	   return $buttons; 
	} 	
}
$startershortcode = new SYMPLE_TinyMCE_Buttons;
*/

add_action( 'admin_head', 'fb_add_tinymce' );
function fb_add_tinymce() {
    global $typenow;

    // only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;

    add_filter( 'mce_external_plugins', 'fb_add_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'fb_add_tinymce_button' );
}

// inlcude the js for tinymce
function fb_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['starter_shortcodes'] =  get_template_directory_uri() .'/js/shortcodes/starter_shortcodes_tinymce.js';
    // Print all plugin js path
  //  var_dump( $plugin_array );
    return $plugin_array;
}

// Add the button key for address via JS
function fb_add_tinymce_button( $buttons ) {

    array_push( $buttons, 'starter_shortcodes_button' );
    // Print all buttons
   // var_dump( $buttons );
    return $buttons;
}