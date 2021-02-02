<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
 
		</div><!-- .site-content -->

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="footer-menu">
							<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
							<?php wp_nav_menu( array(
								'menu' => 'footer', 
								'theme_location' => 'footer', 
								'menu_class' => 'footer-menu',
							));?>
							</nav>
						</div>
						<div class="social-menu">
	                   <nav class="social-navigation" role="navigation" aria-label="Footer Social Links Menu">   <?php dynamic_sidebar('social-menu');?> </nav> 
	                     <?php //	 echo do_shortcode('[aps-social id="1"]')?>
						</div>
						<div class="site-info">
							<span class="site-title">	
								<?php dynamic_sidebar('footer-text'); ?>
							</span>
						</div>
					</div>
				</div>
				
				
				<div class="fotter-content">
						<?php if (is_page('6') ):

						dynamic_sidebar('sidebar-2');

						 endif; ?>
					</div>
				
			</div>

		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->
<script type="text/javascript">
	
	 $('#carouselExampleIndicators').carousel({
		    interval: 2000
		});
</script>

<?php wp_footer(); ?>
</body>
</html>