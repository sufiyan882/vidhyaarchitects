<?php 
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() ){
        printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>') );
    }
 
    echo '</ul></div>' . "\n"; 
}



function twentythirteen_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Footer Text ', 'twentythirteen' ),
            'id'            => 'footer-text',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentythirteen' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

     register_sidebar(
        array(
            'name'          => __( 'Social Menu', 'twentythirteen' ),
            'id'            => 'social-menu',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentythirteen' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

function custom_post_type2() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Portfolios', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Portfolios', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent portfolio', 'twentythirteen' ),
        'all_items'           => __( 'All portfolios', 'twentythirteen' ),
        'view_item'           => __( 'View portfolio', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New portfolio', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit portfolio', 'twentythirteen' ),
        'update_item'         => __( 'Update portfolio', 'twentythirteen' ),
        'search_items'        => __( 'Search portfolio', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'portfolios', 'twentythirteen' ),
        'description'         => __( 'portfolio news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
         
        // This is where we add taxonomies to our CPT
        //'taxonomies'          => array('portfolios', 'portfolios-category' ),
    );
     
    // Registering your Custom Post Type
    register_post_type( 'portfolios', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type2', 0 );



if(!function_exists('business_category_taxonomies')){
    function business_category_taxonomies() {
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => esc_html__( 'Portfolio Category', 'Business' ),
            'singular_name'     => esc_html__( 'Portfolio Category', 'Business' ),
            'search_items'      => esc_html__( 'Search Portfolio Category', 'Business' ),
            'all_items'         => esc_html__( 'All Portfolio Category', 'Business' ),
            'parent_item'       => esc_html__( 'Parent Portfolio Category', 'Business' ),
            'parent_item_colon' => esc_html__( 'Parent Portfolio Business Category:', 'Business' ),
            'edit_item'         => esc_html__( 'Edit Portfolio Category', 'Business' ),
            'update_item'       => esc_html__( 'Update Portfolio Category', 'Business' ),
            'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'Business' ),
            'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'Business' ),
            'menu_name'         => esc_html__( 'Portfolio Category', 'Business' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio-category' ),
        );

        register_taxonomy( 'portfolio-category', array( 'portfolios' ), $args );
    }
}
add_action( 'init', 'business_category_taxonomies', 30 );

function the_breadcrumb() {
    $sep = ' > ';
    if (!is_front_page()) {
    
    // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
    
    // If the current page is a single post, show its title with the separator
        if (is_single()) {
            //echo $sep;
            the_title();
        }
    
    // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
    
    // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}


