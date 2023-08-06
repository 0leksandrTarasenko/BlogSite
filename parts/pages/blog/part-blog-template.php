<?php

$choose_header = get_field("choose_header");
get_template_part( 'parts/overall/overall-header', $choose_header );

$post_id_blog = 3411;
$banner_background_color = get_field("banner_background_color", $post_id_blog);
$banner_background_image = get_field("banner_background_image", $post_id_blog);
$banner_left_column = get_field("banner_left_column", $post_id_blog);
$banner_right_column = get_field("banner_right_column", $post_id_blog);



$blog_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if( $blog_paged == 1 ) {
    $post_per_blog_page = 4;
} else {
    $post_per_blog_page = 6;
}
$all_blog_posts = new WP_Query( array(
    'posts_per_page' => $post_per_blog_page,
    'paged' => $blog_paged,
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',   // taxonomy name
            'field' => 'slug',              // term_id, slug or name
            'terms' => 'blog',         // term id, term slug or term name
        )
    ),
    'meta_key' => 'wpb_post_views_count',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in'=> get_option('sticky_posts')
) );

if($all_blog_posts->have_posts()) : while ( $all_blog_posts->have_posts() ) : $all_blog_posts->the_post();
    wp_reset_postdata();

endwhile; else :

    status_header(404);
    nocache_headers();
    include(get_404_template());
    exit;

endif; ?>
<div class="sc_page blog-template blog-template with-filter">

    <section class="blog_section popular_posts_section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-sidebar sc_fadeIn">
                        <div>
                            <div class="top-sidebar">
                                <h1 class="page_title"><?php esc_html_e( 'Blog', 'revenuegrid' )?></h1>
                                <div class="tax-list">
                                    <?php
                                    $args = array(
                                        'show_option_all'    => '',
                                        'show_option_none'   => __('No categories'),
                                        'orderby'            => 'include',
                                        'order'              => 'ASC',
                                        'style'              => 'list',
                                        'show_count'         => 0,
                                        'hide_empty'         => 1,
                                        'use_desc_for_title' => 1,
                                        'child_of'           => 0,
                                        'feed'               => '',
                                        'feed_type'          => '',
                                        'feed_image'         => '',
                                        'exclude'            => '1',
                                        'exclude_tree'       => '',
                                        'include'            => '125,142,78,129,77,79,80,105,185',
                                        'hierarchical'       => true,
                                        'title_li'           => __( '' ),
                                        'number'             => NULL,
                                        'echo'               => 1,
                                        'depth'              => 0,
                                        'current_category'   => 0,
                                        'pad_counts'         => 0,
                                        'taxonomy'           => 'type-of-post',
                                        'walker'             => 'Walker_Category',
                                        'hide_title_if_empty' => false,
                                        'separator'          => '<br />',
                                    );


                                    echo '<ul class="sidebar-cat-list hide-ipad-v">';
                                    echo '<li class="cat-item all-cat current-cat"><a href="/blog/">All</a></li>';
                                    wp_list_categories( $args );
                                    echo '</ul>';
                                    ?>

                                    <div class="type_list">
                                        <div class="show-ipad-v">
                                            <p class="h6">Category</p>
                                            <div class="post-filter dropdown-list">
                                                <?php
                                                // Taxonomy dropdown arguments
                                                $current_category2 = get_queried_object();
                                                $args2 = array(
                                                    'show_option_all'    => 'All',
//                                                    'show_option_none'   => '',
                                                    'orderby'            => 'include',
                                                    'order'              => 'ASC',
                                                    'style'              => 'list',
                                                    'show_count'         => 0,
                                                    'hide_empty'         => 1,
                                                    'use_desc_for_title' => 1,
                                                    'child_of'           => 0,
                                                    'feed'               => '',
                                                    'feed_type'          => '',
                                                    'feed_image'         => '',
                                                    'exclude'            => '1',
                                                    'exclude_tree'       => '',
                                                    'include'            => '125,142,78,129,77,79,80,105,185',
                                                    'hierarchical'       => true,
                                                    'title_li'           => __( '' ),
                                                    'number'             => NULL,
                                                    'echo'               => 0,
                                                    'depth'              => 0,
                                                    'current_category'   => 0,
                                                    'pad_counts'         => 0,
                                                    'taxonomy'           => 'type-of-post',
                                                    'post_type'          => 'post', // filter by the post type 'position'
//                                'walker'             => 'Walker_Category',
                                                    'hide_title_if_empty' => false,
                                                    'separator'          => '<br />',
                                                    'name'              => 'type-of-post',
                                                    'value_field'       => 'slug',
                                                    'selected' => $current_category2->slug,
                                                );

                                                $select2 = wp_dropdown_categories( $args2 );
                                                $select2 = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select2);
                                                ?>
                                                <form action="<?php bloginfo('url'); ?>/" method="get">
                                                    <?php
                                                    echo $select2;
                                                    ?>
                                                    <noscript><div><input type="submit" value="View" /></div></noscript>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="h6">Type of Content</p>
                                        <div class="post-filter dropdown-list">
                                            <?php
                                            // Taxonomy dropdown arguments
                                            $current_category = get_queried_object();
                                            $args = array(
                                                'show_option_all'    => 'All',
                                                'show_option_none'   => '',
                                                'orderby'            => 'name',
                                                'order'              => 'DESC',
                                                'style'              => 'list',
                                                'show_count'         => 0,
                                                'hide_empty'         => 1,
                                                'use_desc_for_title' => 1,
                                                'child_of'           => 0,
                                                'feed'               => '',
                                                'feed_type'          => '',
                                                'feed_image'         => '',
                                                'exclude'            => '1, 99',
                                                'exclude_tree'       => '',
                                                'include'            => '',
                                                'hierarchical'       => true,
                                                'title_li'           => __( '' ),
                                                'number'             => NULL,
                                                'echo'               => 0,
                                                'depth'              => 0,
                                                'current_category'   => 0,
                                                'pad_counts'         => 0,
                                                'taxonomy'           => 'type-of-post-content',
                                                'post_type'          => 'post', // filter by the post type 'position'
//                                'walker'             => 'Walker_Category',
                                                'hide_title_if_empty' => false,
                                                'separator'          => '<br />',
                                                'name'              => 'type-of-post-content',
                                                'value_field'       => 'slug',
                                                'selected' => $current_category->slug,
                                            );

                                            $select1 = wp_dropdown_categories( $args );
                                            $select1 = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select1);
                                            ?>
                                            <form action="<?php bloginfo('url'); ?>/" method="get">
                                                <?php
                                                echo $select1;
                                                ?>
                                                <noscript><div><input type="submit" value="View" /></div></noscript>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--                            <div class="bottom-sidebar">-->
                            <!--                                <div class="blog-subscribe">-->
                            <!--                                    <div class="blog-subscribe-block">-->
                            <!--                                        --><?php //echo do_shortcode('[contact-form-7 id="577" title="Subscribe to our newsletter" html_id="subscribe-newsletter"]'); ?>
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-column-content">
                        <div class="row">
                            <?php if($banner_left_column || $banner_right_column){ ?>
                                <div class="col-lg-12">
                                    <div class="blog-banner sc_fadeIn" style="<?php if($banner_background_image){ ?>background-image:url(<?php echo $banner_background_image['url']; ?>);<?php } ?> <?php if($banner_background_color){ ?>background-color:<?php echo $banner_background_color; ?>;<?php } ?>" >
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 left_col">
                                                <div class="left_block"><?php echo csc($banner_left_column); ?></div>
                                            </div>
                                            <div class="col-lg-6 right_col">
                                                <div class="right_block"><?php echo csc($banner_right_column); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                            if( $paged == 1 ) {
                                $sticky = get_option( 'sticky_posts' );
                                if(! empty($sticky)) {
                                    $args = array(
                                        'posts_per_page' => 2,
                                        'post__in' => $sticky,
                                        'ignore_sticky_posts' => 1
                                    );
                                    $query = new WP_Query( $args );
                                    while ( $query->have_posts() ) : $query->the_post(); ?>
                                        <?php $postid = get_the_ID();
                                        if(get_field('dofollow_link', $postid)) {
                                            $dofollow = get_field('dofollow_link', $postid);
                                        } ?>
                                        <div class="col-lg-6 col-md-12 post-col">
                                            <div class="popular_post_item sc_fadeIn">
                                                <div class="post-thumbnail" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>);">
                                                    <a class="<?php if(get_field('dofollow_link', $postid)) { ?>add_dofollow<?php } ?>" href="<?php if(get_field('post_custom_link', $postid)) {
                                                        /*echo get_site_url();*/ the_field('post_custom_link', $postid);
                                                    } else
                                                        echo get_permalink();
                                                    ?>"  <?php if(get_field('open_link_in_new_tab', $postid)){ ?> target="_blank" <?php } ?> ></a>
                                                </div>
                                                <div class="post-info">
                                                    <div class="d-none"><?php echo get_post_meta( $postid = get_the_ID(), 'wpb_post_views_count', true ); ?></div>
                                                    <div class="post_category">
                                                        <?php $terms = get_the_terms( $postid , 'sub-categories' );
                                                        foreach ( $terms as $term ) {
                                                            echo $term->name;
                                                        } ?>
                                                    </div>
                                                    <p class="title-post h6"><a class="<?php if(get_field('dofollow_link', $postid)) { ?>add_dofollow<?php } ?>" href="<?php if(get_field('post_custom_link', $postid)) {
                                                            echo /*get_site_url();*/ the_field('post_custom_link', $postid);
                                                        } else
                                                            echo get_permalink();
                                                        ?>" <?php if(get_field('open_link_in_new_tab', $postid)){ ?> target="_blank" <?php } ?> <?php if(get_field('open_link_in_new_tab', $postid) && empty($dofollow)){ ?> rel="nofollow" <?php } ?> ><?php the_title(); ?></a></>
                                                    <?php if( has_excerpt() ){ ?>
                                                        <div class="post_excerpt"><?php echo the_excerpt(); ?></div>
                                                    <?php } ?>
                                                    <div class="popular_post_meta">
                                                        <?php if(get_field('post_author', $postid)){ ?>
                                                            <div class="author"><span class="icon-author"></span><span class=""><?php the_field('post_author', $postid); ?></span></div>
                                                        <?php } ?>
                                                        <?php if(get_field('minute_read', $postid)){ ?>
                                                            <div class="read"><span class="icon-clock"></span><span class=""><?php the_field('minute_read', $postid); ?></span></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php wp_reset_postdata(); ?>
                                    <?php endwhile; ?>
                                <?php } ?>
                            <?php } ?>
                            <?php
                            $pagination_sticky_posts = get_option( 'sticky_posts' );

                            if( $paged == 1 && !empty($pagination_sticky_posts)) {
                                $post_per_page = 4;
                            } else {
                                $post_per_page = 6;
                                if(empty($pagination_sticky_posts)) {
                                    $pagination_sticky_posts = '';
                                }
                            }
                            $all_posts_pages = new WP_Query( array(
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',   // taxonomy name
                                        'field' => 'slug',              // term_id, slug or name
                                        'terms' => 'blog',         // term id, term slug or term name
                                    )
                                ),
                                'meta_key' => 'wpb_post_views_count',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'post__not_in' => $pagination_sticky_posts,
                            ) );
                            $all_posts = new WP_Query( array(
                                'posts_per_page' => $post_per_page,
                                'paged' => $paged,
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',   // taxonomy name
                                        'field' => 'slug',              // term_id, slug or name
                                        'terms' => 'blog',         // term id, term slug or term name
                                    )
                                ),
                                'meta_key' => 'wpb_post_views_count',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'post__not_in'=> get_option('sticky_posts')
                            ) );
                            while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>
                                <?php $postid = get_the_ID();
                                if(get_field('dofollow_link', $postid)) {
                                    $dofollow = get_field('dofollow_link', $postid);
                                } ?>
                                <div class="col-lg-6 col-md-12 post-col">
                                    <div class="popular_post_item sc_fadeIn">
                                        <div class="post-thumbnail" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>);">
                                            <a class="<?php if(get_field('dofollow_link', $postid)) { ?>add_dofollow<?php } ?>" href="<?php if(get_field('post_custom_link', $postid)) {
                                                /*echo get_site_url();*/ the_field('post_custom_link', $postid);
                                            } else
                                                echo get_permalink();
                                            ?>"  <?php if(get_field('open_link_in_new_tab', $postid)){ ?> target="_blank" <?php } ?> ></a>
                                        </div>
                                        <div class="post-info">
                                            <div class="d-none"><?php echo get_post_meta( $postid = get_the_ID(), 'wpb_post_views_count', true ); ?></div>
                                            <div class="post_category">
                                                <?php $terms = get_the_terms( $postid , 'sub-categories' );
                                                foreach ( $terms as $term ) {
                                                    echo $term->name;
                                                } ?>
                                            </div>
                                            <p class="title-post h6"><a class="<?php if(get_field('dofollow_link', $postid)) { ?>add_dofollow<?php } ?>" href="<?php if(get_field('post_custom_link', $postid)) {
                                                    echo /*get_site_url();*/ the_field('post_custom_link', $postid);
                                                } else
                                                    echo get_permalink();
                                                ?>" <?php if(get_field('open_link_in_new_tab', $postid)){ ?> target="_blank" <?php } ?> <?php if(get_field('open_link_in_new_tab', $postid) && empty($dofollow)){ ?> rel="nofollow" <?php } ?> ><?php the_title(); ?></a></p>
                                            <?php if( has_excerpt() ){ ?>
                                                <div class="post_excerpt"><?php echo the_excerpt(); ?></div>
                                            <?php } ?>
                                            <div class="popular_post_meta">
                                                <?php if(get_field('post_author', $postid)){ ?>
                                                    <div class="author"><span class="icon-author"></span><span class=""><?php the_field('post_author', $postid); ?></span></div>
                                                <?php } ?>
                                                <?php if(get_field('minute_read', $postid)){ ?>
                                                    <div class="read"><span class="icon-clock"></span><span class=""><?php the_field('minute_read', $postid); ?></span></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php wp_reset_postdata(); ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid container-default sc_fadeIn">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8 d_hide_mobile">
                    <nav class="pagination">
                        <?php
                        $big = 999999999;
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $all_posts_pages->max_num_pages,
                            'prev_text' => 'Prev page',
                            'next_text' => 'Next page'
                        ) );
                        ?>
                    </nav>
                </div>
                <div class="col-lg-8 d_hide_desktop">
                    <nav class="pagination">
                        <?php
                        $big = 999999999;
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $all_posts_pages->max_num_pages,
                            'prev_text' => '',
                            'next_text' => ''
                        ) );
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </section>

</div>