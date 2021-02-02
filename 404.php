<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area1">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				 <div class="container"> 
			  <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/09/vid_page-.png "/>
				<p>It looks like nothing was found at this location...</p>

				<p><a href="<?php echo get_site_url(); ?>">To The home page</a></p>
			</div>
			</section><!-- .error-404 -->

		</main><!-- .site-main -->


	</div><!-- .content-area -->

<?php get_footer(); ?>
