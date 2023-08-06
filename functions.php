<?php

add_action('wp_enqueue_scripts', 'blog_site_scripts');

function blog_site_scripts() {
    wp_enqueue_style('GothamBold', get_template_directory_uri() . '/assets/font/GothamBold.woff', array(), null);
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/font/fonts.css', array(), null);

    $add_font_Material = 'https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined';
    wp_enqueue_style('Material', $add_font_Material, array(), null);

    $add_bootstrap = get_template_directory_uri() . '/assets/css/bootstrap.min.css';
    wp_enqueue_style('bootstrap.min', $add_bootstrap, array(), null);

    wp_enqueue_style('general', get_template_directory_uri() . '/assets/css/general.css?v=' . time(), array(), false, 'all');
    wp_enqueue_style('header', get_template_directory_uri() . '/assets/css/header.css?v=' . time(), array(), false, 'all');
    wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css?v=' . time(), array(), false, 'all');
    wp_enqueue_style('single-blog-post', get_template_directory_uri() . '/assets/css/single-blog-post.css?v=' . time(), array(), false, 'all');
    wp_enqueue_style('single-case-studies-post', get_template_directory_uri() . '/assets/css/single-case-studies-post.css?v=' . time(), array(), false, 'all');
    wp_enqueue_style('homepage', get_template_directory_uri() . '/assets/css/homepage.css?v=' . time(), array(), false, 'all');
    wp_enqueue_style('blog-template', get_template_directory_uri() . '/assets/css/blog.css?v=' . time(), array(), false, 'all');

    wp_enqueue_script('bootstrap.bundle.min', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js?v=' . time(), array(), false, true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js?v=' . time(), array(), false, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick.min', get_template_directory_uri() . '/assets/js/slick.min.js?v=' . time(), array(), false, true);
}

function hide_admin_bar_for_all() {
    show_admin_bar(false);
}
add_action('after_setup_theme', 'hide_admin_bar_for_all');
