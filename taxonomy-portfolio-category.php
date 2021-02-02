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
			<style>
 
#exTab1 .tab-content { color : white; background-color: #428bca; padding : 5px 15px;}
#exTab2 h3 {  color : white;  background-color: #428bca;  padding : 5px 15px;}
#exTab1 .nav-pills > li > a { border-radius: 0;}
#exTab3 .nav-pills > li > a { border-radius: 4px 4px 0 0 ;}
#exTab3 .tab-content {  color : white;  background-color: #428bca;  padding : 5px 15px;}
</style>

<div id="exTab2" class="container">	
	<div class="exTab3">
	<ul class="nav nav-tabs">
		<li>Filter sites by</li>	
		<li><a href="https://vidhyaarchitects.com/portfolio/">All</a> </li>
		<li><a href="#5" data-toggle="tab">Category</a>	</li>
		<li><a href="#6" data-toggle="tab">Building Types</a></li>
		<li><a href="https://vidhyaarchitects.com/portfolio-category/unbuild-concepts/">Unbuild Concepts</a></li>
	</ul>
</div>
	<div class="tab-content">
		<div class="tab-pane active" id="6">
			<?php 
			 				
			$args = array(
				'orderby' => 'name',
				'parent' => 49,
				'taxonomy' => 'portfolio-category',
				'hide_empty' => 0,
				'number' => 10
			);
			$categories = get_categories( $args );
			$curTerm = $wp_query->queried_object;
			//print_r($categories);
			$content='';
			foreach ( $categories as $category ) {
			$classes = array();
			if ( $category->name == $curTerm->name ) {
			$classes[] = 'active';
			}
			echo '<a class="' . implode( ' ', $classes ) . '" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';

			}

			?>
		</div>
		
		<div class="tab-pane" id="5">
			<?php 

			$args = array(
				'orderby' => 'name',
				'parent' => 48,
				'taxonomy' => 'portfolio-category',
				'hide_empty' => 0,
				'number' => 10
			);
			$categories = get_categories( $args );
			$curTerm = $wp_query->queried_object;
			foreach ( $categories as $category ) {
				
			$classes = array();
			if ( $category->name == $curTerm->name ) {
			$classes[] = 'active';
			}

			echo '<a class="' . implode( ' ', $classes ) . '" href="' . get_category_link( $category->term_id ) . '" >' . $category->name . '</a>';
			}
			
			?>
		</div>
	</div>
</div>

<section class="portfolio-section listing-page">
<div class="container">
<div class="clear-fix"></div>
  <div class="row">

		<?php while ( have_posts() ) : the_post(); ?>
         <div class="col-md-6 col-sm-12 col-lg-4">
            <div class="feature-box">
               <div class="image-div">
					<?php $imgID  = get_post_thumbnail_id($post->ID);
					$img    = wp_get_attachment_image_src($imgID,'full', false, ''); 
					$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true); ?>
					<a href="<?php the_permalink() ?>"><img src="<?php echo $img[0]; ?>"/></a>
               </div>
               <div class="contant-div">
                  <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                  <div class="logcation-div"><span><i class="fa fa-map-marker"></i> <?php the_field('location'); ?></span></div>
               </div>
            </div>
         </div>
	<?php endwhile; ?>
  </div>
</div>
</section>

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

<script type="text/javascript">	
jQuery('.tab-pane').removeClass('active');
jQuery('.tab-pane > a.active').parent().addClass('active');
</script>


<?php get_footer(); ?>
