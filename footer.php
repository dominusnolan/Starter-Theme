<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package starterTheme
 */
?>

	</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">
  			<div id="subsidiary">
    
<!-- BEGIN .footer-col-1 -->
    
    		<div class="footer-col" class="widget-area" role="complementary" >
        		<?php if ( ! dynamic_sidebar( 'footer-column' ) ) : ?>
    			<?php endif; // end sidebar widget area ?>
			</div>
       
    
<!-- END .footer-col-1 -->

<!-- BEGIN .footer-col-2 -->

	 		<div class="footer-col" class="widget-area" role="complementary" >
        		<?php if ( ! dynamic_sidebar( 'footer-column-2' ) ) : ?>
    			<?php endif; // end sidebar widget area ?>
			</div>

<!-- END .footer-col-2 -->


<!-- BEGIN .footer-col-3 -->

	 		<div class="footer-col-last" class="widget-area" role="complementary" >
        		<?php if ( ! dynamic_sidebar( 'footer-column-3' ) ) : ?>
    			<?php endif; // end sidebar widget area ?>
			</div>
    
<!-- END .footer-col-3 -->
		</div>
    	
        	<div id="siteInfo-container">
				<div class="site-info">
        			<div class="copyright">
						<?php echo "\t\t" . do_shortcode (get_theme_mod ('copyright_textbox', 'No copyright information has been saved yet.')) . "\n"; ?>
					</div>
        			<div class="created">	
						<?php echo "\t\t" . do_shortcode (get_theme_mod ('created_textbox', 'No created information has been saved yet.')) . "\n"; ?>
            		</div>
				</div><!-- .site-info -->
        	</div>
		</footer><!-- #colophon -->
	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>