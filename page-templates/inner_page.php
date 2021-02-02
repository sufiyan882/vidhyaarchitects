<?php
/*
  Display Template Name: Inner Page
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

<?php if (is_page('contact-us')) : ?>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-sm-12 right_address">
			   <div class="sp_bootom"> 
            	<?php the_field('address_title') ?>
				<?php the_field('address_content') ?>
                </div>
                
                  <div class="sp_bootom">
				<?php the_field('hours_title') ?>
				<?php the_field('hours_content') ?>
                </div>
                
				<?php the_field('map') ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile;?>

			</div>
		</div>
	</div>

<?php endif;?>

<?php if (is_page('blogs')): ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-8"> 
						<?php 
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

					$args = array(
					'posts_per_page' => 4,
					'paged' => $paged
					);
					$wp_query = new WP_Query( $args ); ?>
					<?php if ( $wp_query->have_posts() ) : ?>

					<?php while ( $wp_query->have_posts() ) : ?>
					<div class="row">
						<?php $wp_query->the_post(); ?>
						<div class="col-sm-6">
							 <?php echo get_the_post_thumbnail(); ?>
						</div>
						<div class="col-sm-6">
							<h4 class="shop-tittle"> <a href="<?php the_permalink() ?>">   <?php the_title();?> </a> </h4>
							<span class="date"><?php echo get_the_date('m.j.y'); ?></span>
								<?php $categories = get_the_category();
								if ( ! empty( $categories ) ) : ?>
									<ul>
									<?php foreach ($categories as $value) :?>
										<li><?php echo $value->name; ?></li>
										<!-- echo '<a href="' . esc_url( get_category_link( $value->term_id ) ) . '">' . esc_html( $value->name ) . '</a>'; -->
									<?php endforeach; ?>
									</ul>
								<?php endif;?>
							<p><?php echo wp_trim_words( get_the_content(), 50, '...' ); ?></p>
							<a class="btn" href="<?php the_permalink() ?>">Read More</a>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				<div class="row">
					<div class="col-sm-12 text-center">
						<?php wpbeginner_numeric_posts_nav(); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
		
	</div>

<?php endif; ?>

<?php if (is_page( array( 'architecture', 'interior-design', 'landscape' ) )) : ?>
	<div class="container inner-pege-section">
		<div class="row default-margin">
			<div class="col-sm-12 Interior-Design">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile;?>
			</div>
		</div>
        
		 <div class="what-we_do">
        
        <div class="container product_list padd0 ">  
		 		<div class="row">
			<?php while ( have_rows('boxes')): the_row(); ?>
			<div class="col-lg-4 col-md-6">
            <div class="about_box_two">
            <?php $pro_banner = get_sub_field( 'box_icon' ); ?>
            <img src="<?php echo $pro_banner['url']; ?>">
			<h3><?php the_sub_field('box_title'); ?></h3>
            
			<div class="box-content">
				<?php the_sub_field('box_content'); ?>
			   <!-- <p><?php// echo wp_trim_words(get_sub_field('box_content'), 80); ?></p> -->
			  <!-- <span><a href="<?php// the_sub_field('box_more_link')?>"><?php //the_sub_field('box_more_title') ?></a></span> -->
			</div>
			</div> </div>
			<?php  endwhile; ?>
		</div>
        
        </div>
        </div>
</div>
   <!-- Recent Project  -->

		<section class="portfolio-section listing-page related-projects">
		   <div class="container">
		   	 <h2 class="section-title text-left">Related Projects </h2>
		    <div class="clear-fix"></div>
		      <div class="row">

				<?php while( have_rows('recent_project') ): the_row();            
				$image2 = get_sub_field( 'project_banner' ); ?>
		         <div class="col-md-6 col-sm-12 col-lg-4">
		            <div class="feature-box">
		               <div class="image-div">
							<a href="<?php the_sub_field('view_project_link'); ?>"><img src="<?php  echo $image2['url']; ?>"></a>
		               </div>
		               <div class="contant-div">
		                  <h2><a href="<?php the_sub_field('view_project_link'); ?>"><?php  the_sub_field('project_title'); ?></a></h2>
		                  <div class="logcation-div"><span><i class="fa fa-map-marker"></i> <?php the_sub_field('project_location'); ?></span></div>
		               </div>
		            </div>
		         </div>
		         <?php  endwhile; ?>
		      </div>
		   </div>
		</section>

   <!-- Recent Project  -->
<?php endif; ?>

<?php if (is_page('about-us')) : ?>
	<div class="about-us-page">
		<div class="container Default_Margin">
		   <div class="row">
		      <div class="col-lg-1 pos-rl col-sm-12">
		         <div class="position_left">
		            <?php $about_left = get_field( 'about_left_image' ); ?>
		            <img src="<?php echo $about_left['url']; ?>">
		         </div>
		      </div>
		      <div class="col-lg-8 offset-lg-1 col-sm-12 padd-0">
		      	<div class="text-center vidhya-devi-div">
		      		<img src="https://vidhyaarchitects.com/wp-content/uploads/2019/08/Lt-Smt-vidhya-devi.jpg">
		      		<h4>Lt. Smt. Vidhya Devi</h4>
		      		<p><strong>Our firm is dedicated to our beloved mother.</strong> <br>Their ideals, future thinking and their determination want to move forward on the path of hard work.</p>
		      	</div>
		      </div>
		      <div class="col-lg-1 offset-lg-1 pos-rl col-sm-12">
		         <div class="position_right">
		            <?php $about_right = get_field( 'about_right_image' ); ?>
		            <img src="<?php echo $about_right['url']; ?>">
		         </div>
		      </div>
		   </div>
		   <div class="row">
		   	<div class=" col-lg-10 offset-lg-1">
		   		<div class="text-center about_content">
		            <?php the_field('about_contant');?>
		         </div>
		   	</div>
		   </div>
		</div>
		<section class="founder-section">
			<div class="container">
				<div class="founder-pro-div">
					<div class="pro-img-div">
						<?php $profile_image = get_field( 'profile_image' ); ?>
		                <img src="<?php echo $profile_image['url']; ?>">	
					</div>
					<div class="pro-cont-div">
						<div class="inner-cont">
							<h2><?php the_field('profile_title'); ?></h2>
							<span><?php the_field('profile_sub_title'); ?></span>
							<p><?php the_field('profile_contant'); ?></p>
							<div class="about-social">
				               <ul>
				                  <li><a href="<?php the_field('profile_link_facebook');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				                  <li><a href="<?php the_field('profile_link_twitter');?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				                  <li><a href="<?php the_field('profile_link_instagram');?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				               </ul>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="our-team">
			<div class="container">
				<div class="row">
							<?php
							// check if the repeater field has rows of data
							if( have_rows('member_section') ):
							// loop through the rows of data
							while ( have_rows('member_section') ) : the_row();
							$member_image = get_sub_field('member_image');
							$member_name = get_sub_field('member_name');
							$member_job = get_sub_field('member_job');

								?>

			            	<div class="col-lg-3 col-md-6">
								<div class="feature-box text-center">
									<div class="image-div">
										<img src="<?php echo $member_image['url']; ?>">
									</div>
									<div class="contant-div">
										<h2><?php echo $member_name; ?></h2>
										<span><?php echo $member_job; ?></span>
									</div>
								</div>
							</div>

							<?php 
							endwhile;
							else :
							endif;

							?>
					
				</div>
			</div>
		</section>


		<!-- <div class="jumbotron about-member-bg">
		   <div class="container">
		      <div class="row ">
		         <div class="col-xs-12 col-md-12 col-lg-3">
		            
		            
		         </div>
		         <div class="col-xs-12 col-md-12 col-lg-9">
		            <div class="profile-image-color">
		               <h2><?php the_field('profile_title'); ?></h2>
		               <h5><?php the_field('profile_sub_title'); ?></h5>
		            </div>
		            <p><?php the_field('profile_contant');?></p>
		            
		         </div>
		      </div>
		   </div>
		</div> -->
		<!-- <div class="container product_list">
		   <h2><?php the_field('boxes_head_title'); ?></h2>
		   <div class="row">
		      <?php while ( have_rows('boxes')): the_row(); ?>
		      <div class="col-xs-12 col-sm-12 col-lg-4 marbottom">
		         <div class="about_box">
		            <?php $pro_banner = get_sub_field( 'box_icon' ); ?>
		            <div class="box_heading_para">
		               <img src="<?php echo $pro_banner['url']; ?>">
		               <h3><?php the_sub_field('box_title'); ?></h3>
		            </div>
		            <div class="box-content">
		               <?php the_sub_field('box_content'); ?> -->
		               <?php //echo wp_trim_words(get_sub_field('box_content'), 80); ?>
		               <!--  <span><a href="<?php //the_sub_field('box_more_link')?>"><?php //the_sub_field('box_more_title') ?></a></span> -->
		            <!-- </div>
		         </div>
		      </div>
		      <?php  endwhile; ?>
		   </div>
		</div> -->
	</div>
<?php endif; ?>


<?php if (is_page( array( 'termsconditions', 'privacy-policy' ) )) : ?>
	<div class="container">
		<div class="row">
			<div class="tag">
				<div class="col-sm-12 padd_ad">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile;?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
</article><!-- #post-## -->

<?php get_footer(); ?>