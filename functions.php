<?php

add_action('wp_enqueue_scripts', 'blog_site_scripts');

function blog_site_scripts() {
    wp_enqueue_style('GothamBold', get_template_directory_uri() . '/assets/font/GothamBold.woff', array(), null);
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/font/fonts.css', array(), null);

    $add_font_Material = 'https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined';
    wp_enqueue_style('Material', $add_font_Material, array(), null);

    $add_bootstrap = get_template_directory_uri() . '/assets/css/bootstrap.min.css';
    wp_enqueue_style('bootstrap.min', $add_bootstrap, array(), null);
    
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/scss/main.css?v=' . time(), array(), false, 'all');
    wp_enqueue_script('bootstrap.bundle.min', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js?v=' . time(), array(), false, true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js?v=' . time(), array(), false, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick.min', get_template_directory_uri() . '/assets/js/slick.min.js?v=' . time(), array(), false, true);
}

function hide_admin_bar_for_all() {
    show_admin_bar(false);
}
add_action('after_setup_theme', 'hide_admin_bar_for_all');

include_once(ABSPATH . 'wp-content/plugins/advanced-custom-fields-pro/acf.php');


/**
 * Activate menus for admin
 */
add_theme_support( 'menus' );

/**
 * Option page
 */
function add_my_options_page() {
    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page();
    }
  }

$sub_page = array(
    'title' => 'Header',
    'slug' => 'header',
    'capability' => 'edit_dashboard'
);
acf_add_options_sub_page($sub_page);

$sub_page = array(
	'title' => 'Footer',
	'slug' => 'footer',
	'capability' => 'edit_dashboard'
);
acf_add_options_sub_page($sub_page);

acf_set_options_page_menu("Other");
acf_set_options_page_title("Other");

/**
 * Enable shortcodes for menu navigation.
 */
if ( ! has_filter( 'wp_nav_menu', 'do_shortcode' ) ) {
    add_filter( 'wp_nav_menu', 'shortcode_unautop' );
    add_filter( 'wp_nav_menu', 'do_shortcode', 11 );
}

/*Shortcode Menu*/
/* [menu name=menu_name] */
function print_menu_shortcode($atts) {
    $custom_menu = shortcode_atts( array(
        'name' => '',
    ), $atts, 'menu' );

//    echo $custom_menu['name'];
    return wp_nav_menu( array( 'menu' => $custom_menu['name'], 'menu_class' => 'custom_menu_shortcode', 'echo' => false ) );

}
add_shortcode ('menu', 'print_menu_shortcode');

// Add theme support for post thumbnails
add_theme_support('post-thumbnails');

/*Add CPT Case Studies*/
add_action('init', 'my_custom_init');
function my_custom_init(){

     //Case Studies
     register_post_type('case-studies', array(
        'labels'             => array(
            'name'               => 'Case Studies',
            'singular_name'      => 'Case Study',
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add a new Case Study',
            'edit_item'          => 'Edit Case Study',
            'new_item'           => 'New Case Study',
            'view_item'          => 'View Case Study',
            'search_items'       => 'Search Case Study',
            'not_found'          => 'No items found',
            'not_found_in_trash' => 'No items found',
            'parent_item_colon'  => '',
            'menu_name'          => 'Case Studies'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'has_archive'        => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-megaphone',
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );

}





