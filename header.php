<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package starterTheme
 */
$options = get_option('starter_custom_settings'); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title>
			<?php wp_title( '|', true, 'right' ); ?>
		</title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <script src="<?php bloginfo( 'template_url' ); ?>/js/init.js" type="text/javascript"></script>
        <?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
        
        <div id="topBar" class="widget-area" role="complementary" <?php echo ( get_theme_mod( 'starter_topbar' ) ) ? "" : "style='display:none;'" ?>>
    		<ul>
      			<?php if ( ! dynamic_sidebar( 'topbar-widget' ) ) : ?>
    		</ul>
                <?php endif; // end sidebar widget area ?>
  		</div>
                
<header id="masthead" class="large" role="banner">
<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
  		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /> </a>
  		<?php } if ( ! empty( $header_image ) ) ?>
        
        <nav id="site-navigation" class="navigation-main" role="navigation">
            <?php $options['logo'] == '' ? $logo = IMAGES . '/logo.png' : $logo = $options['logo']; ?>
    			<div class="site-title"><a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" /></a> </div>
    		<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'startertheme' ); ?>">
      		<?php _e( 'Skip to content', 'startertheme' ); ?>
      		</a></div>
    		<label for="show-menu" class="show-menu"></label>
    		<input type="checkbox" id="show-menu" role="button">
   			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  		</nav>
  	<!-- #site-navigation --> 
</header>
<!-- #masthead -->

<div id="main" class="site-main">

