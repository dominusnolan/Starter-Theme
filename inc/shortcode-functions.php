<?php
/**
 * This file has all the main shortcode functions
 * @package Starter Shortcodes Plugin
 * @since 1.0
 * @author AJ Clarke : http://starterplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://starterplorer.com
 * @License: GNU General Public License version 2.0
 * @License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


/*
 * Allow shortcodes in widgets

 */
add_filter('widget_text', 'do_shortcode');



/*
 * Fix Shortcodes
 */
if( !function_exists('starter_fix_shortcodes') ) {
	function starter_fix_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'starter_fix_shortcodes');
}


/*
 * Clear Floats
 */
if( !function_exists('starter_clear_floats_shortcode') ) {
	function starter_clear_floats_shortcode() {
	   return '<div class="starter-clear-floats"></div>';
	}
	add_shortcode( 'starter_clear_floats', 'starter_clear_floats_shortcode' );
}




/*
 * Spacing
 */
if( !function_exists('starter_spacing_shortcode') ) {
	function starter_spacing_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'size' => '20px',
			'class' => '',
		  ),
		  $atts ) );
	 return '<hr class="starter-spacing '. $class .'" style="height: '. $size .'" />';
	}
	add_shortcode( 'starter_spacing', 'starter_spacing_shortcode' );
}


/**


 * Buttons
 */
if( !function_exists('starter_button_shortcode') ) {
	function starter_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'blue',
			'url' => '#',
			'title' => 'Visit Site',
			'target' => 'self',
			'rel' => '',
			'border_radius' => '',
			'class' => '',
			'icon_left' => '',
			'icon_right' => ''
		), $atts ) );
		
		
		$border_radius_style = ( $border_radius ) ? 'style="border-radius:'. $border_radius .'"' : NULL;		
		$rel = ( $rel ) ? 'rel="'.$rel.'"' : NULL;
		
		$button = NULL;
		$button .= '<a href="' . $url . '" class="starter-button ' . $color . ' '. $class .'" target="_'.$target.'" title="'. $title .'" '. $border_radius_style .' '. $rel .'>';
			$button .= '<span class="starter-button-inner" '.$border_radius_style.'>';
				if ( $icon_left ) $button .= '<span class="starter-button-icon-left icon-'. $icon_left .'"></span>';
				$button .= $content;
				if ( $icon_right ) $button .= '<span class="starter-button-icon-right icon-'. $icon_right .'"></span>';
			$button .= '</span>';			
		$button .= '</a>';
		return $button;
	}
	add_shortcode('starter_button', 'starter_button_shortcode');
}



/*

 * Testimonial
 *
 */
if( !function_exists('starter_testimonial_shortcode') ) { 
	function starter_testimonial_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'by' => '',
			'class' => '',
		  ), $atts ) );
		$testimonial_content = '';
		$testimonial_content .= '<div class="starter-testimonial '. $class .'"><div class="starter-testimonial-content">';
		$testimonial_content .= $content;
		$testimonial_content .= '</div><div class="starter-testimonial-author">';
		$testimonial_content .= $by .'</div></div>';	
		return $testimonial_content;
	}
	add_shortcode( 'starter_testimonial', 'starter_testimonial_shortcode' );
}


/*
 * Rows
 *
 */
if( !function_exists('starter_row_shortcode') ) {
	function starter_row_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size' => 'fixed',
			'background_color' => '',
			'background_image_url' => '#',
			'class' => ''
			), $atts ) );
			
			$style_attr = '';
		if ( $font_size ) {
			$style_attr .= 'font-size: '. $font_size .';';
		}
		if ( $background_color ) {
			$style_attr .= 'background-color: '. $background_color .';';
		}
		if ( $background_image_url != "#") {
			$style_attr .= " background-image: url('$background_image_url');";
		}
		
			
		  return '<div class="starter-row starter-' . $size . ' starter-row-'.$position.' '. $class .'"  style="'.$style_attr.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('starter_row', 'starter_row_shortcode');
}


/*
 * Columns
 *
 */
if( !function_exists('starter_column_shortcode') ) {
	function starter_column_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size' => 'one-third',
			'position' =>'first',
			'class' => '',
		  ), $atts ) );

		if( $position == "last") { // add clear fix
			$close_tag = starter_clear_floats_shortcode();
		}
		else {
			$close_tag = "";
		}
		  return '<div class="starter-column starter-' . $size . ' starter-column-'.$position.' '. $class .'">' . do_shortcode($content) . '</div>' . $close_tag;
	}
	add_shortcode('starter_column', 'starter_column_shortcode');
}



/*
 * Toggle
 */
if( !function_exists('starter_toggle_shortcode') ) {
	function starter_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => 'Toggle Title',
			'class' => '',
		), $atts ) );
		 
		// Enque scripts
		wp_enqueue_script('starter_toggle');
		
		// Display the Toggle
		return '<div class="starter-toggle '. $class .'"><h3 class="starter-toggle-trigger">'. $title .'</h3><div class="starter-toggle-container">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('starter_toggle', 'starter_toggle_shortcode');
}


/*
 * Accordion
 *
 */

// Main
if( !function_exists('starter_accordion_main_shortcode') ) {
	function starter_accordion_main_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('starter_accordion');
		
		// Display the accordion	
		return '<div class="starter-accordion '. $class .'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'starter_accordion', 'starter_accordion_main_shortcode' );
}


// Section
if( !function_exists('starter_accordion_section_shortcode') ) {
	function starter_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title' => 'Title',
			'class' => '',
		), $atts ) );
		  
	   return '<h3 class="starter-accordion-trigger '. $class .'"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'starter_accordion_section', 'starter_accordion_section_shortcode' );
}


/*
 * Tabs
 *
 */
if (!function_exists('starter_tabgroup_shortcode')) {
	function starter_tabgroup_shortcode( $atts, $content = null ) {
		
		//Enque scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('starter_tabs');
		
		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
		    $output .= '<div id="starter-tab-'. rand(1, 100) .'" class="starter-tabs">';
			$output .= '<ul class="ui-tabs-nav starter-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#starter-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
	add_shortcode( 'starter_tabgroup', 'starter_tabgroup_shortcode' );
}
if (!function_exists('starter_tab_shortcode')) {
	function starter_tab_shortcode( $atts, $content = null ) {
		$defaults = array(
			'title' => 'Tab',
			'class' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		return '<div id="starter-tab-'. sanitize_title( $title ) .'" class="tab-content '. $class .'">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'starter_tab', 'starter_tab_shortcode' );
}




/*


/*
 * Heading
 */
if( !function_exists('starter_heading_shortcode') ) {
	function starter_heading_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'title' => 'Sample Heading',
			'type' => 'h2',
			'margin_top' => '',
			'margin_bottom' => '',
			'text_align' => '',
			'font_size' => '',
			'color' => '',
			'class' => '',
			'icon_left' => '',
			'icon_right' => ''
		  ),
		  $atts ) );
		  
		$style_attr = '';
		if ( $font_size ) {
			$style_attr .= 'font-size: '. $font_size .';';
		}
		if ( $color ) {
			$style_attr .= 'color: '. $color .';';
		}
		if( $margin_bottom ) {
			$style_attr .= 'margin-bottom: '. $margin_bottom .';';
		}
		if ( $margin_top ) {
			$style_attr .= 'margin-top: '. $margin_top .';';
		}
		
		if ( $text_align ) {
			$text_align = 'text-align-'. $text_align;
		} else {
			$text_align = 'text-align-left';
		}
		
	 	$output = '<'.$type.' class="starter-heading '. $text_align .' '. $class .'" style="'.$style_attr.'"><span>';
		if ( $icon_left ) $output .= '<i class="starter-button-icon-left icon-'. $icon_left .'"></i>';
			$output .= $title;
		if ( $icon_right ) $output .= '<i class="starter-button-icon-right icon-'. $icon_right .'"></i>';
		$output .= '</'.$type.'></span>';
		
		return $output;
	}
	add_shortcode( 'starter_heading', 'starter_heading_shortcode' );
}


/*
 * Google Maps
 */
if (! function_exists( 'starter_shortcode_googlemaps' ) ) :
	function starter_shortcode_googlemaps($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'title' => '',
				'location' => '',
				'width' => '', //leave width blank for responsive designs
				'height' => '300',
				'zoom' => 8,
				'align' => '',
				'class' => '',
		), $atts));
		
		// load scripts
		wp_enqueue_script('starter_googlemap');
		wp_enqueue_script('starter_googlemap_api');
		
		
		$output = '<div id="map_canvas_'.rand(1, 100).'" class="googlemap '. $class .'" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';
		
		return $output;
	   
	}
	add_shortcode("starter_googlemap", "starter_shortcode_googlemaps");
endif;


/*
 * Divider
 */
if( !function_exists('starter_divider_shortcode') ) {
	function starter_divider_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'style' => 'fadeout',
			'margin_top' => '20px',
			'margin_bottom' => '20px',
			'class' => '',
		  ),
		  $atts ) );
		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {  
			$style_attr = 'style="margin-top: '. $margin_top .';margin-bottom: '. $margin_bottom .';"';
		} elseif( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: '. $margin_bottom .';"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: '. $margin_top .';"';
		} else {
			$style_attr = NULL;
		}
	 return '<hr class="starter-divider '. $style .' '. $class .'" '.$style_attr.' />';
	}
	add_shortcode( 'starter_divider', 'starter_divider_shortcode' );
}

/*
 * Contact Form
 */

// function to get the IP address of the user
function starter_get_the_ip() {
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		return $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
	else {
		return $_SERVER["REMOTE_ADDR"];
	}
}

// the shortcode
function starter_contact_form($atts) {
	extract(shortcode_atts(array(
		"email" => get_bloginfo('admin_email'),
		"subject" => '',
		"label_name" => 'Your Name',
		"label_email" => 'Your E-mail Address',
		"label_subject" => 'Subject',
		"label_message" => 'Your Message',
		"label_submit" => 'Submit',
		"error_empty" => 'Please fill in all the required fields.',
		"error_noemail" => 'Please enter a valid e-mail address.',
		"success" => 'Thanks for your e-mail! We\'ll get back to you as soon as we can.'
	), $atts));

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error = false;
		$required_fields = array("your_name", "email", "message", "subject");

		foreach ($_POST as $field => $value) {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			}
			$form_data[$field] = strip_tags($value);
		}

		foreach ($required_fields as $required_field) {
			$value = trim($form_data[$required_field]);
			if(empty($value)) {
				$error = true;
				$result = $error_empty;
			}
		}

		if(!is_email($form_data['email'])) {
			$error = true;
			$result = $error_noemail;
		}

		if ($error == false) {
			$email_subject = "[" . get_bloginfo('name') . "] " . $form_data['subject'];
			$email_message = $form_data['message'] . "\n\nIP: " . starter_get_the_ip();
			$headers  = "From: ".$form_data['your_name']." <".$form_data['email'].">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			wp_mail($email, $email_subject, $email_message, $headers);
			$result = $success;
			$sent = true;
		}
	}

	if($result != "") {
		$info = '<div class="info">'.$result.'</div>';
	}
	$email_form = '<form class="contact-form" method="post" action="'.get_permalink().'">
		<div>
			<label for="cf_name">'.$label_name.':</label>
			<input type="text" name="your_name" id="cf_name" size="50" maxlength="50" value="'.$form_data['your_name'].'" />
		</div>
		<div>
			<label for="cf_email">'.$label_email.':</label>
			<input type="text" name="email" id="cf_email" size="50" maxlength="50" value="'.$form_data['email'].'" />
		</div>
		<div>
			<label for="cf_subject">'.$label_subject.':</label>
			<input type="text" name="subject" id="cf_subject" size="50" maxlength="50" value="'.$subject.$form_data['subject'].'" />
		</div>
		<div>
			<label for="cf_message">'.$label_message.':</label>
			<textarea name="message" id="cf_message" cols="50" rows="15">'.$form_data['message'].'</textarea>
		</div>
		<div>
			<input type="submit" value="'.$label_submit.'" name="send" id="cf_send" />
		</div>
	</form>';
	
	if($sent == true) {
		return $info;
	} else {
		return $info.$email_form;
	}
} add_shortcode('contact_form', 'starter_contact_form');


// recent posts

function recent_posts_function( $atts ) {
    
    extract( shortcode_atts( array(
            'excerpt' => '20',
			'category' => '',
			'posts' => 1
    ), $atts, 'recent_posts' ) );

	$args = array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts);
    if($category!='') { 
		$args['cat'] = $category;
		$catArr = get_category($category,false);
	}


   query_posts($args);

   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= ' <div id="effect" class="effects clearfix">
            					<div class="img">
                 					'.get_the_post_thumbnail($post->ID, 'medium').'
                					<div class="overlay">
                    					<a href="'.get_permalink().'" class="expand"></a>
                    					<a class="close-overlay hidden">x</a>
                					</div>
            					</div>
        					</div>
							<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>'. '' . '<p>' . get_the_excerpt() . '</p>';
		  
      endwhile;
   endif;
   
   wp_reset_query();
   
   return $return_string;
}

    add_shortcode('recent_posts', 'recent_posts_function');

/**
 * Display the current year.
 */
function shortcode_year() {   
    return '<span class="the-year">' . date('Y') . '</span>';
}
add_shortcode('starter_the_year', 'shortcode_year');
/**
 * Display link to WP.org.
 */
function starter_shortcode_wp_link() {
    return '<a class="wp-link" href="http://WordPress.org/" title="WordPress" rel="generator">WordPress</a>';
}
add_shortcode('starter_wp_link', 'starter_shortcode_wp_link');		  

/**
 * Display link to wp-admin of the site.
 */
function starter_shortcode_login_link() {
    if ( ! is_user_logged_in() )
        $link = '<a href="' . site_url('/wp_login.php') . '">' . __('Login','startertheme') . '</a>';
    else
    $link = '<a href="' . wp_logout_url() . '">' . __('Logout','startertheme') . '</a>';
    return apply_filters('loginout', $link);
}
add_shortcode('starter_loginout_link', 'starter_shortcode_login_link');		

/**
 * Display the site title.
 */
function starter_shortcode_blog_title() {
	return '<span class="blog-title">' . get_bloginfo('name', 'display') . '</span>';
}
add_shortcode('starter_blog_title', 'starter_shortcode_blog_title');


/**
 * Display the site title with a link to the site.
 */
function starter_shortcode_blog_link() {
	return '<a href="' . site_url('/') . '" title="' . esc_attr( get_bloginfo('name', 'display') ) . '" >' . get_bloginfo('name', 'display') . "</a>";
}
add_shortcode('starter_blog_link', 'starter_shortcode_blog_link');