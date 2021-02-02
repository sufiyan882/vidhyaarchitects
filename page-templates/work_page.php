<?php
/*
  Display Template Name: Work Page
*/
get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php  $inner_title = get_field('page_title_background_image')?>
	<div class="container">
		<div class="inner_banner" style="background-image:url(<?php echo $inner_title['url']; ?>)">
 
		  <div class="container inner-pages-content-table">
		 <div class="inner-pages-content-table-cell text-left">
		 	<h1 class="text green_inner_heading"><?php the_title(); ?></h1>
		</div>
		</div>  
		    
		</div>
	</div>

<style type="text/css">
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
		<li > <a href="" onClick="window.location.reload();">All</a> </li>
		<li><a href="#1" data-toggle="tab">Category</a>	</li>
		<li><a href="#2" data-toggle="tab">Building Types</a></li>
		<li><a href="https://vidhyaarchitects.com/portfolio-category/unbuild-concepts/">Unbuild Concepts</a></li>
	</ul>
</div>
	<div class="tab-content">
		
		<div class="tab-pane" id="1">
			<?php 
			 				
			$args = array(
				'orderby' => 'name',
				'parent' => 49,
				'taxonomy' => 'portfolio-category',
				'hide_empty' => 0,
				'number' => 10
			);
			$categories = get_categories( $args );
			//print_r($categories);
			$content='';
			foreach ( $categories as $category ) {
			echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';

			}

			?>
		</div>
		<div class="tab-pane" id="2">
			<?php 
			$args = array(
				'orderby' => 'name',
				'parent' => 48,
				'taxonomy' => 'portfolio-category',
				'hide_empty' => 0,
				'number' => 10
			);
			$categories = get_categories( $args );
			$content='';
			foreach ( $categories as $category ) {
			echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';

			}
			?>
		</div>
	</div>
</div>


<section class="portfolio-section listing-page">
   <div class="container">
    <div class="clear-fix"></div>
<?php 				
$argss = array(
	'orderby' => 'name',
	'parent' => 49,
	'taxonomy' => 'portfolio-category',
	'hide_empty' => 0,
	'number' => 10
);
$categoriess = get_categories( $argss );

foreach ( $categoriess as $categorys ) { ?>
	<div class="row">
		<div class="col-md-12 cat-filter">
			<a href="<?php echo get_category_link( $categorys->term_id ) ?>"><?php echo $categorys->name ?></a>
		</div>
		<?php $query = array( 
			'post_type' => 'portfolios',
			'posts_per_page' => -1,
			'tax_query' => array(
		        array(
		            'taxonomy' => 'portfolio-category',
		            'field'    => 'term_id',
		            'terms'    => $categorys->term_id,
		        ),
		    ),
		) ;
		$the_query = new WP_Query( $query ); 
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		     <div class="col-md-6 col-sm-12 col-lg-4">
		     	<a href="<?php the_permalink() ?>">
		        <div class="feature-box">
		           <div class="image-div">
						<?php $imgID  = get_post_thumbnail_id($post->ID);
						$img    = wp_get_attachment_image_src($imgID,'full', false, ''); 
						$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true); ?>
						<img src="<?php echo $img[0]; ?>"/>
		           </div>
		           <div class="contant-div">
		              <h2><?php the_title(); ?></a></h2>
		              <div class="logcation-div"><span><i class="fa fa-map-marker"></i> <?php the_field('location'); ?></span></div>
		           </div>
		        </div>
		    </a>
		     </div>
		<?php endwhile; ?>
	</div>
<?php } ?>
 
   </div>
</section>

</article><!-- #post-## -->

<?php get_footer(); ?>