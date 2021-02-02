<?php
   /**
    * The template for displaying all single posts and attachments
    *
    * @package WordPress
    * @subpackage Twenty_Sixteen
    * @since Twenty Sixteen 1.0
    */
   
   get_header(); ?>
<!-- <div class="container back"> <span class="back-btn custom-closing" onclick="goBack()"> Back To Blog </span> </div> -->
<div class="blog-single-page">
    <!-- <div class="container">
      <div class="inner_banner" style="background-image:url(<?php echo site_url(); ?>/wp-content/uploads/2018/04/banner-1.jpg)">
   
      <div class="container inner-pages-content-table">
        <div class="inner-pages-content-table-cell text-left">
          <h1 class="text green_inner_heading"><?php //the_breadcrumb(); ?></h1>
        </div>
      </div>  
        
    </div>
    </div> -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="container warpper_over">
      <div class="row">
         <div class="col-md-12 blog-left">

            <div class="inner-pages-content-table-cell text-center">
              <h1 class="text green_inner_heading"><?php the_title();?></h1>
              <div class="date">
                <p><?php echo get_the_date(); ?></p>
                <p><?php echo "<span>".get_comments_number()."</span> Comments" // comments_number(); ?></p>
                <p> <?php echo "by <span>".get_author_name()."</span>" ?></p>
              </div>
            </div>

            <div class="social-div">
              <div class="social_icon float-left">
               <span>SHARE</span>
               <ul>
                  <li><a href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/images/twitter.png"></a></li>
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"> <img src="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/images/fb.png"> </a></li>
                  <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"> <img src="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/images/google plus.png"> </a></li>
               </ul>
            </div>
            <div class="categorie-tag-div tag">
               <?php $categories = get_the_category();
                  if ( ! empty( $categories ) ) : ?>
                  <span class="categorie-title">Categorie</span>
               <ul class="categorie-tag">
                  <?php foreach ($categories as $value) :?>
                  <li><?php echo '<a href="' . esc_url( get_category_link( $value->term_id ) ) . '">' . esc_html( $value->name ) . '</a>'; ?></li>
                  <?php endforeach; ?>
               </ul>
               <?php endif;?>
            </div>
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php while ( have_posts() ) : the_post();?>
         <!--  <?php //echo get_the_post_thumbnail(); ?> -->
         <?php 
            $image = get_field('blog_single_image');
            
            if( !empty($image) ): ?>
         <img class="blog-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
         <?php endif; ?>
         <?php endwhile;  ?>
          <div class="tag">
            <?php the_content(); ?>
         </div>
        </div>
      </div>
   </div>
   <div class="container">
     <div class="previous_arrow">
        <?php previous_post_link('%link', 'PREVIOUS POST'); ?>
     </div>
     <div class="next_arrow">
        <?php next_post_link('%link', 'NEXT POST'); ?>
     </div>
   </div>

  <div class="container">
  <div class="blog_text">
    <h2 class="text-left">
           More News & Events
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
      <a class="img_space" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); // the_post_thumbnail('medium');       ?></a> <a href="<?php the_permalink(); ?>">
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
</div>
<?php get_footer(); ?>