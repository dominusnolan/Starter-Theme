<?php
/**
 * @package starterTheme
 */
?>
	<div class="item">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php startertheme_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
    		<div id="effect" class="effects clearfix">
            	<div class="img">
    				<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
   				<div class="overlay">
                    <a href="<?php the_permalink(); ?>" class="expand" ></a>
                    <a class="close-overlay hidden">x</a>
                </div>
            </div>
        </div>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'startertheme' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'startertheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'startertheme' ) );
				if ( $categories_list && startertheme_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'startertheme' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'startertheme' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'startertheme' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'startertheme' ), __( '1 Comment', 'startertheme' ), __( '% Comments', 'startertheme' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'startertheme' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post-## -->
	</div>
