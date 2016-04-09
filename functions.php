<?php
/**
 * starterTheme functions and definitions
 *
 * @package starterTheme
 */

/* 	Define Constants */
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/images');

/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'startertheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function startertheme_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'startertheme', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );  
}

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'startertheme' ),
	) );
	
	function st_wp_nav_menu_args($args=''){
		$args['container']= false;
		return $args;
	}
	add_filter('wp_nav_menu_args','st_wp_nav_menu_args');
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'startertheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // startertheme_setup
add_action( 'after_setup_theme', 'startertheme_setup' );

function new_excerpt_more($more){
	global $post;
	return '<a class="post-more-link" href="'.get_permalink($post->ID).'"> ...more</a>';
}
add_filter('excerpt_more','new_excerpt_more');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function startertheme_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Top Bar', 'startertheme' ),
			'id'            => 'topbar-widget',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
		register_sidebar( array(
			'name'          => __( 'Blog Sidebar', 'startertheme' ),
			'id'            => 'sidebar-blog',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
		register_sidebar(array(
    		'name' => __('Page Sidebar', 'startertheme'),
    		'description' => __('Widget area for pages.', 'startertheme'),
    		'id' => 'sidebar-page',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget' => '</div>',
    		'before_title' => '<h1 class="widget-title">',
    		'after_title' => '</h1>',
    	));
		
    	register_sidebars(3, array(
     	   'name' => __('Footer Column %d', 'startertheme'),
		   'description' => __('3 Widget areas for the footer', 'startertheme'),
     	   'id' => "footer-column",
     	   'before_widget' => '<div id="%1$s" class="widget %2$s">',
     	   'after_widget' => '</div>',
     	   'before_title' => '<h1 class="widget-title">',
     	   'after_title' => '</h1>'
    	));		
}
add_action( 'widgets_init', 'startertheme_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function startertheme_scripts() {
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
	}
	
	wp_enqueue_script('modernizr_script', (get_bloginfo('stylesheet_directory') . "/js/modernizr.js"));
	wp_enqueue_script('modernizrTouch_script', (get_bloginfo('stylesheet_directory') . "/js/modernizr-touch.js"));
    wp_enqueue_script('prettyPhoto_script', (get_bloginfo('stylesheet_directory') . "/js/jquery.prettyPhoto.js"));
	wp_enqueue_script('stickyNav_script', (get_bloginfo('stylesheet_directory') . "/js/sticky-nav.js"));
    wp_enqueue_script('customprettyPhoto_script', (get_bloginfo('stylesheet_directory') . "/js/customprettyPhoto.js")); 
	wp_enqueue_script('backTop_script', (get_bloginfo('stylesheet_directory') . "/js/jquery.top.js"));
    wp_enqueue_script( 'startertheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'startertheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script('main_script', (get_bloginfo('stylesheet_directory') . "/js/init.js"));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'startertheme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
	wp_enqueue_style('tw-recent-posts-widget', get_bloginfo('stylesheet_directory').'/css/tw-recent-posts-widget.css');
	wp_enqueue_style('prettyPhoto', get_bloginfo('stylesheet_directory').'/css/prettyPhoto.css');
	wp_enqueue_style('linkOverlay', get_bloginfo('stylesheet_directory').'/css/overlay.css');
	 wp_enqueue_style( 'startertheme-style', get_stylesheet_uri() );
	
// shortcode srcitps	
	wp_register_script( 'starter_tabs', get_template_directory_uri() . 'js/starter_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
	wp_register_script( 'starter_toggle', get_template_directory_uri() . 'js/starter_toggle.js', 'jquery', '1.0', true );
	wp_register_script( 'starter_accordion', get_template_directory_uri() . 'js/starter_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
	wp_register_script('starter_googlemap', get_template_directory_uri() . 'js/starter_googlemap.js', array('jquery'), '1.0', true);
	wp_register_script('starter_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '1.0', true);
	wp_register_script( 'starter_skillbar', get_template_directory_uri() . 'js/starter_skillbar.js', array ( 'jquery' ), '1.0', true );

// shortcode style 
	wp_enqueue_style('starter_shortcode_styles', get_bloginfo('stylesheet_directory'). '/css/starter_shortcodes_styles.css');
}
add_action( 'wp_enqueue_scripts', 'startertheme_scripts' );

// Implement the Custom Header feature
require get_template_directory() . '/inc/custom-header.php';
// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';
// Custom functions that act independently of the theme templates
require get_template_directory() . '/inc/extras.php';
// Display Header
require get_template_directory() . '/inc/wp-display-header.php';
// Load recent-posts widget
require get_template_directory() . '/inc/widgets/starter-recent-posts-widget.php';
// Create Shortcodes
require( get_template_directory() . '/inc/shortcode-functions.php' );
// Add mce buttons to post editor
require( get_template_directory() . '/inc/starter-shortcodes-tinymce.php'); 
// Add mce buttons to post editor
require( get_template_directory() . '/inc/video-box.php'); 
// Add mce buttons to post editor
require( get_template_directory() . '/inc/widgets/starter-social-icons.php');


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'starter_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     */
    $plugins = array(
	
	// plugin pre-packaged with a theme
	
	// revolution slider
	array( 
		'name' => 'Slider Revolution', // The plugin name 
		'slug' => 'rev slider', // The plugin slug (typically the folder name) 
		'source' => get_template_directory() . '/plugins/revslider.zip', // The plugin source 
		'required' => true, // If false, the plugin is only ‘recommended’ instead of required 
		'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented 
		'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch 
		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins 
		'external_url' => '', // If set, overrides default API URL and points to an external URL.
	),
		
	// visual composer	
	 array(
            'name'			=> 'WPBakery Visual Composer', // The plugin name
            'slug'			=> 'js_composer', // The plugin slug (typically the folder name)
            'source'			=> get_stylesheet_directory() . '/plugins/js_composer.zip', // The plugin source
            'required'			=> true, // If false, the plugin is only 'recommended' instead of required
            'version'			=> '3.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		=> '', // If set, overrides default API URL and points to an external URL
        ),	
	
	// plugin from the WordPress Plugin Repository
	
	// contact form 7
    array(
            'name' => 'Contact Form 7',
            'slug' => 'Contact-Form-7',
            'required'  => false,
        ),
	);
	// Used for internationalising strings
	$theme_text_domain = 'starter';
	
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'starter-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
       
    );

    starter( $plugins, $config );

}