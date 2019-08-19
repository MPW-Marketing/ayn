<?php
//Register Navigations
add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
            'top-menu' => __( 'Top Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
            'community-menu' => __( 'Community Menu'),
            'families-menu' => __( 'Families Menu'),
            'professionals-menu' => __( 'Professionals Menu')
        )
    );
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );

function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	      'after_widget'  => '</li>',
	      'before_title'  => '<h2 class="widgettitle">',
	      'after_title'   => '</h2>',
    ) );
}

add_filter('show_admin_bar', '__return_false');

add_theme_support( 'post-thumbnails' ); 

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
?>