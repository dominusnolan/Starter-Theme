<?php
/**
 Template Name: Full Width Page Display
 *
 * @package starterTheme
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content fullwidth" role="main"><!-- fullwidth class added -->

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					// if ( comments_open() || '0' != get_comments_number() )
					//	comments_template();
				?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>