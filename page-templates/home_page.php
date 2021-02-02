<?php
   /*
     Display Template Name: Home Page
   */
   get_header(); ?>
<div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
         <div class="container">
          <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
				<?php 
				  $i=0;            
				  while( have_rows('home_slider') ): the_row();            
				    if ($i == 0){?>
				      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <?php }else{ ?>
				      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
				    <?php }  $i++;            
				  endwhile; 
				?>
           </ol>
            <div class="carousel-inner">
            	<?php $z = 0;            
	                  while( have_rows('home_slider') ): the_row(); ?>
              <div class="carousel-item <?php if ($z == 0) { echo 'active';} ?> ">
                   <?php          
	                    $image = get_sub_field( 'banner_image' ); ?>
	               <img src="<?php echo $image['url']; ?>" />  
              </div>
              <?php $z++;  endwhile; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="fa fa-angle-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="fa fa-angle-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
         	<!-- <div class="jumbotron-fluid pos">
	            <div class="header_slider eq_height">
	               <?php $z = 0;            
	                  while( have_rows('home_slider') ): the_row();            
	                    $image = get_sub_field( 'banner_image' ); ?>
	               <img src="<?php echo $image['url']; ?>" />  
	               <?php   $z++;             
	                  endwhile; 
	                  ?>
	            </div>
	         </div> -->
         </div>
         <section class="partner-div">
          <div class="container">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="inner-div-partner">
                  <span class="float-left"><h2>Featured Clients</h2></span>
							<?php
							// check if the repeater field has rows of data
							if( have_rows('featured_clients') ):

							// loop through the rows of data
							while ( have_rows('featured_clients') ) : the_row();
							$ftclient = get_sub_field('featured_clients_images');
							$ftchurl = get_sub_field('clients_images_url');
							?>
							<a href="<?php echo $ftchurl; ?>">
							<div class="partner-div-img"><img src="<?php echo $ftclient['url'] ?>"> </div>
							</a>

							<?php 
							endwhile;
							else :
							endif;
				 		?>
                </div>
                </div>
              </div>
          </div>
        </section>
         <div class="container ome">
            <div class="what-we_do">
               <?php if(get_field('boxes_head_title')): ?>
               <h2>
                  <?php the_field('boxes_head_title') ?>
               </h2>
               <div class="row">
                  <?php while ( have_rows('boxes')): the_row(); ?>
                  <div class="col-md-6 col-lg-4">
                     <div class="about_box_two">
                        <?php $pro_banner = get_sub_field( 'box_icon' ); ?>
                        <img src="<?php echo $pro_banner['url']; ?>">
                        <h3>
                           <?php the_sub_field('box_title'); ?>
                        </h3>
                        <div class="box-content">
                           <?php the_sub_field('box_content'); ?> 
                        </div>
                     </div>
                  </div>
                  <?php  endwhile; ?>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <div class="container">
        	<div class="who_we_are">
               <?php if(get_field('who_we_are')): ?>
               <div class="row flex-row-reverse  align-items-center">
               		<div class="col-md-12 col-lg-6 img_center">
	                     <?php $who_we_are_image =  get_field('who_we_are_image') ?>
	                     <img src="<?php echo $who_we_are_image['url'] ?>"> 
	                </div>
                	<div class="col-md-12 col-lg-6">
	                     <div class="who_left">
	                        <div class="who_you">
	                           <h2>
	                              <?php the_field('who_we_are') ?>
	                           </h2>
	                           <p>
	                              <?php the_field('who_we_are_content')?>
	                           </p>
	                        </div>
	                     </div>
	                </div>
               	</div>
               <?php endif; ?>
            </div>
        </div>

        <?php 
$query = array( 
  'post_type' => 'portfolios',
  'posts_per_page' => 4,
) ;
// the query
$the_query = new WP_Query( $query ); ?>

<section class="portfolio-section">
   <div class="container">
    <h2 class="section-title">Recent projects</h2>
    <div class="clear-fix"></div>
      <div class="row">
        <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="col-md-6 col-sm-12">
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
                      <div class="services-div"><!-- <span>Service</span> -->
                        <?php
                      
                        $category = get_the_terms( $post->ID, 'portfolio-category' );     
                        foreach ( $category as $cat){
                         ?>
                        <p><a href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></p> 
                      <?php   }
                        ?>
                        
                      </div>
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

		   <div class="container">
		<div class="bg_color testimonial-section">
		      <h2 class="text-center">
		         <?php the_field('testimonial_title') ?>
		      </h2>
		      <div class="row">
		         <?php the_field('testimonial_field') ?>
		      </div>
		   </div>
		</div>
		<div class="container">
		   <div class="blog_text">
		      <h2>
		         LATEST BLOGS
		      </h2>
		   </div>
		   <div class="row">
		      <?php $args = array(
		         'post_type' => 'post',
		         'posts_per_page' => 3,
		         );
		         $the_query = new WP_Query( $args ); ?>
		      <?php if ( $the_query->have_posts() ) : ?>
		      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		      <div class="col-md-12 col-lg-4 blog_text_two bg_size">
		         <?php $categories = get_the_category();
		            if ( ! empty( $categories ) ) {
		              echo '<div class="commercial"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></div>';
		            } ?>
		         <a class="img_space" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); // the_post_thumbnail('medium');       ?></a> 
		         <a href="<?php the_permalink(); ?>">
		            <h2>
		               <?php the_title(); ?>
		            </h2>
		         </a>
		         <div class="date">
		            <p><?php echo get_the_date(); ?></p>
		            <p>
		               <?php echo "<span>".get_comments_number()."</span> Comments" // comments_number(); ?>
		            </p>
		            <p> <?php echo "by <span>".get_author_name()."</span>" ?></p>
		         </div>
		         <p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
		      </div>
		      <?php endwhile; ?>
		      <?php endif; ?>
		   </div>
		</div>
    
		</article>
	</main>
</div>
<?php get_footer(); ?>