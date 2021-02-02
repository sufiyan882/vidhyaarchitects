<?php get_header(); ?>
<article class="single-port" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php  $inner_title = get_field('page_title_background_image')?>
	<!-- <div class="container">
		<div class="inner_banner" style="background-image:url(<?php //echo $inner_title['url']; ?>)">
 
		  <div class="container inner-pages-content-table">
		 <div class="inner-pages-content-table-cell text-left">
		 	<h1 class="text green_inner_heading"><?php //the_title(); ?></h1>
		 	<a class="back" href=" " onclick="parent.history.back();return false;"> Back </a>
		</div>
		</div>  
		    
		</div>
	</div> -->
	<section class="portfolio-section single-page">
           <div class="container">
            <div class="heading-block text-center">
            	<h1 class="section-title"><?php  the_title();  ?></h1>
            	<div class="date">
	                <p><span>Location</span> <?php the_field('location'); ?></p>
	                <p><span>Status</span> <?php the_field('statius_running');  ?></p>
	            <p><span>Durration</span> <?php the_field('start_date'); ?> to <?php the_field('end_date'); ?></p>
	            </div>
	            <div class="social-div">
              <div class="social_icon float-left">
               <span>SHARE</span>
               <ul>
                  <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"><img src="https://vidhyaarchitects.com/wp-content/themes/vidhyaarchitects/images/fb.png"></a></a></li>
                  <li><a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank"><img src="https://vidhyaarchitects.com/wp-content/themes/vidhyaarchitects/images/google plus.png"></a></li>
                  <li><a href="https://twitter.com/share?url=<?php the_permalink() ?>&amp;text=<?php the_title(); ?>&amp;hashtags=vidhyaarchitects" target="_blank"><img src="https://vidhyaarchitects.com/wp-content/themes/vidhyaarchitects/images/twitter.png"></a></li>
               </ul>
            </div>
            </div>
            </div>
            <div class="clear-fix"></div>

              <div class="row">
                 <div class="col-md-12">
                    <div class="feature-box">
					<?php $images = get_field('portfolios_slider');
					if( $images ): 
						$img_arr_val = sizeof($images);
						$img_count = 1;
						?>
					<ul>
					<?php foreach( $images as $image ): 
						if ($img_count < 3) : ?>
						<li> 
							<a href="<?php echo $image['url']; ?>" data-imagelightbox="g"> 
								<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
						</li>
						<?php elseif ($img_count == 3) : ?>
						<li> 
							<a href="<?php echo $image['url']; ?>" data-imagelightbox="g"> 
								<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>  
							<span class="more-images"><a href="<?php echo $image['url']; ?>" data-imagelightbox="g"> + <?php echo $img_arr_val; ?></a></span>
						</li>
						<?php else: ?>
						<li style="display: none;"> 
							<a href="<?php echo $image['url']; ?>" data-imagelightbox="g"> 
								<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
						</li>
						<?php endif; ?>
					<?php
					$img_count++;
					 endforeach; ?>
					</ul>
					<?php endif; ?>
                    </div>
                 </div>
              </div>

              <div class="row">
              	<div class="col-md-12">
              		<div class="contant-div">
                    <?php
                    if(strlen($post->post_content) > 0){
              			    echo '<h3>CHALLENGE </h3>';
                        the_content(); 
                    }
                    
                    $terms = get_field('services');

                    if( $terms ): ?>
                    <div class="social-div width-100">
                      <div class="categorie-tag-div tag">
                        <span class="categorie-title">Services Provided</span>
                        <ul class="categorie-tag">
                        <?php foreach( $terms as $term ): ?>
                          <li><?php echo $term->name; ?></li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                    <?php endif; ?>
                    
              		</div>
              	</div>
              </div>
           </div>
        </section>

<?php 

$category = get_the_terms( $post->ID, 'portfolio-category' ); 

$cat_array = array(); 

foreach ( $category as $key =>$cat){ 
  array_push($cat_array, $cat->term_id); 
}
                        

$args = array('post_type' => 'portfolios',
	'posts_per_page'=>'3',
	'tax_query' => array(
		array(
            'taxonomy' => 'portfolio-category',
            'field'    => 'term_id',
            'terms'    => $cat_array,
        ),
    ),
);

$the_query = new WP_Query( $args ); 
?>

<section class="portfolio-section listing-page related-projects">
   <div class="container">
     <h2 class="section-title text-left">Related Projects</h2>
    <div class="clear-fix"></div>
      <div class="row">
        <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
      </div>
   </div>
</section>

</article>

<link rel="stylesheet" type="text/css" href="https://vidhyaarchitects.com/wp-content/themes/vidhyaarchitects/css/imagelightbox.css">
<script type="text/javascript" src="https://vidhyaarchitects.com/wp-content/themes/vidhyaarchitects/js/imagelightbox.js"></script>

<script type="text/javascript">
	jQuery('.more-images').click(function(e){

		e.preventDefault();

		var gallery = jQuery('a[data-imagelightbox="g"]').imageLightbox({
			activity: true,
			arrows: true,
			button: true,
			overlay: true,
			quitOnDocClick: false,
		});

		gallery.startImageLightbox();
		
	});
</script>


<?php get_footer(); ?>
