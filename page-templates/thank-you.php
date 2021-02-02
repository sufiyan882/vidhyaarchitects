<?php
/*
  Display Template Name: Thank You
*/
get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php  $inner_title = get_field('page_title_background_image')?>
	<div class="inner_banner" style="background-image:url(<?php echo $inner_title['url']; ?>)">
 
  <div class="container inner-pages-content-table">
 <div class="inner-pages-content-table-cell text-left">
 	<h1 class="text green_inner_heading"><?php the_title(); ?></h1>
</div>
</div>  
    
</div>


<div class="container">
	<div class="row thank-you">
		<div class="col-sm-12">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile;?>
		</div>
	</div>   
</div>

</article><!-- #post-## -->

<?php get_footer(); ?>