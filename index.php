<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<?php  $inner_title = get_field('page_title_background_image' , get_option('page_for_posts'))?>
						<div class="inner_banner" style="background-image:url(<?php echo $inner_title['url']; ?>)">
							<div class="container inner-pages-content-table">
								<div class="inner-pages-content-table-cell text-left">
									<h1 class="text green_inner_heading"><?php single_post_title(); ?></h1>
									
								</div>
							</div>
						</div>
			<?php endif; ?>
			<div class="container">
				<div class="row flex-row-reverse blog-list">
					<div class="col-lg-3 col-md-12">
						<?php get_sidebar(); ?>
					</div>  
					<div class="col-lg-9 col-md-12">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="row blog-block">
								<div class=" col-lg-5 col-md-4 col-sm-12 text-left">
									<?php twentysixteen_post_thumbnail(); ?>
								</div>
								<div class=" col-lg-7 col-md-8 col-sm-12 img-text">
									<?php the_title( sprintf( '<h4 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
									
									<span class="date"> <?php echo get_the_date('F j, Y'); ?></span>
									<?php 
									$categories_list = get_the_category_list(__('  ', 'twentysixteen'));
									if ($categories_list) {
									echo '<span class="categories-links">' . $categories_list . '</span>';
									}?>
									<div class="entry-content categories-mar10">
										<?php $content = get_the_content();
										$trimmed_content = wp_trim_words( $content, 60, '...<a href="'. get_permalink() .'"><br>read more </a>' ); ?>
										<p><?php echo $trimmed_content; ?></p>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div> 
				<div class="nav-links blog-list-nav">
				<?php
					echo paginate_links( array(
						'type'      => 'post',
						'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
						'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
					) );
				?>
				</div>
			</div>
	<?php endif;?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
