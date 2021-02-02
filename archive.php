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
			<?php
				$object = get_queried_object();
				$post_id = $object->taxonomy.'_'.$object->term_id;
			?>
		<?php if ( have_posts() ) : ?>
		
				<?php  $inner_title = get_field('page_title_background_image' ,  $post_id)?>
						<div class="inner_banner" style="background-image:url(<?php echo $inner_title['url']; ?>)">
							<div class="container inner-pages-content-table">
								<div class="inner-pages-content-table-cell text-left">
									<h1 class="text green_inner_heading"><?php single_cat_title(); ?></h1>
								</div>
							</div>
						</div>
			<div class="container">
				<div class="row blog-list">  
					<div class="col-sm-9">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="row blog-block">
								<div class="col-sm-5">
									<?php twentysixteen_post_thumbnail(); ?>
								</div>
								<div class="col-sm-7">
									<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
									
									<span class="date"> <?php echo get_the_date('M j, Y'); ?></span>
									<?php 
									$categories_list = get_the_category_list(__('  ', 'twentysixteen'));
									if ($categories_list) {
									echo '<span class="categories-links">' . $categories_list . '</span>';
									}?>
									<div class="entry-content">
										<?php $content = get_the_content();
										$trimmed_content = wp_trim_words( $content, 50, '...<a href="'. get_permalink() .'"><br>read more </a>' ); ?>
										<p><?php echo $trimmed_content; ?></p>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="col-sm-3">
						<?php get_sidebar(); ?>
					</div>
				</div>
				<div class="nav-links">
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
<?php get_footer(); ?>
