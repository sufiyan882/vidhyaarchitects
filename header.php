<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js"> 
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/css/slick-theme.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


<!-- <script src="<?php //echo site_url(); ?>/wp-content/themes/vidhyaarchitects/js/jquery.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/js/slick.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/js/main.js"></script>

<style> #carouselExampleIndicators .carousel-indicators { z-index:1;} </style>
</head>
<body <?php body_class(); ?>>
  
<script>
	function goBack() {
		window.history.go(-1); 	}
	</script>
<div id="page" class="site">
<div class="site-inner">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'twentysixteen' ); ?>
</a>
<header id="masthead" class="site-header" role="banner">
  <div class="container">
      <div class="header_warpper_logo">
        <?php // twentysixteen_the_custom_logo(); ?>
          
          <a href="<?php echo site_url(); ?>"> <img src="<?php echo site_url(); ?>/wp-content/themes/vidhyaarchitects/images/Logo-PNG-320.png"></a>
         
         
         <button id="menus-toggle" class="menus-toggle">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        </button>
      </div>
      <div class=" header_id header_warpper_menu">
        <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
        
        <div id="site-header-menu">
          <?php if ( has_nav_menu( 'primary' ) ) : ?>
          <nav id="site-navigation" class="main-navigation " role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
            <?php
											wp_nav_menu( array(
												'theme_location' => 'primary',
												'menu_class'     => 'primary-menus vidhyaarchitects-menu',
											 ) );
										?>
          </nav>
          <!-- .main-navigation -->
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
  </div>
</header>
<div class="clearfix" style="height: 1px;">&nbsp;</div>
<!-- .site-header -->
<div id="content" class="site-content">
