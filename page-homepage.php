<?php
/*
Template name: Homepage
*/
$header_title = get_field("header_title");
$case_study_id = get_field("case_study");
$custom_post_excerpt = get_the_excerpt($case_study_id);
$custom_post_thumbnail = get_the_post_thumbnail($case_study_id);
$custom_post_title = get_the_title($case_study_id);
$case_study_permalink = get_permalink($case_study_id);
$header_background_image = get_field("header_background_image");
$popular_articles_title = get_field("popular_articles_title");
$popular_articles_description = get_field("popular_articles_description");
$recent_articles_title = get_field("recent_articles_title");
$recent_articles_description = get_field("recent_articles_description");
$title_slider_section = get_field("title_slider_section");
$description_slider_section = get_field("description_slider_section");
$all_articles_title = get_field("all_articles_title");
$all_articles_description = get_field("all_articles_description");
?>

<?php get_header(); ?>

<div class="homepage-template">

    <section class="search-section" style="<?php if($header_background_image){ ?>background-image:url(<?php echo $header_background_image['url']; ?>);<?php } ?>" >
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <?php if($header_title){ ?>
                        <div class="main-title">
                            <?php echo $header_title; ?>
                        </div>     
                    <?php } ?>
                    <div class="search">
                        <?php
                        // Search
                        $args = array(
                            'post_type' => array( 'post', 'case_studies' ),
                        );
                        echo get_search_form( $args );
                        // Popular tags for filtering
                        $popular_tags = get_terms( array(
                            'taxonomy' => 'post_tag',
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'number' => 3,
                        ) );
                        if ( ! empty( $popular_tags ) && ! is_wp_error( $popular_tags ) ) {
                            echo '<div class="popular-tags">';
                            echo '<p>Popular Tags:</p>';
                            echo '<ul>';
                            foreach ( $popular_tags as $tag ) {
                                $tag_link = esc_url( get_tag_link( $tag->term_id ) );
                                echo '<li><a href="' . $tag_link . '" class="tag-link" data-tag="' . esc_attr( $tag->name ) . '">' . esc_html( $tag->name ) . '</a></li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="case-study-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($case_study_id) { ?>
                        <div class="case-study-block">
                            <div class="case-study-content">
                                <div class="case-study-thumbnail">
                                    <a href="<?php echo $case_study_permalink; ?>"><?php echo $custom_post_thumbnail; ?></a>
                                </div>
                                <div class="case-study-info">
                                    <div class="featured">FEATURED</div>
                                    <div class="case-study-title">
                                        <a href="<?php echo $case_study_permalink; ?>"><h2><?php echo $custom_post_title; ?></h2></a>
                                    </div>
                                    <div class="case-study-excerpt"><p><?php echo $custom_post_excerpt; ?></p></div>
                                    <div class="author-block">
                                        <div class="author-description">
                                            <div class="author-avatar">
                                                <?php
                                                $post_author_avatar_url = get_post_meta($case_study_id, 'custom_author_avatar_url', true);
                                                $post_author_id = get_post_field('post_author', $case_study_id);

                                                if (!empty($post_author_avatar_url)) :
                                                ?>
                                                    <img src="<?php echo esc_url($post_author_avatar_url); ?>" alt="Avatar" class="avatar">
                                                <?php else :
                                                    echo get_avatar($post_author_id, 96);
                                                endif;
                                                ?>
                                            </div>
                                            <div class="author-name">
                                                <?php
                                                $post_author_name = get_the_author_meta('display_name', $post_author_id);
                                                echo $post_author_name;
                                                ?>
                                                <div class="verified-author-mark"><span class="material-icons">done</span>Verified writer</div>
                                            </div>
                                        </div>
                                        <div class="post-date">
                                            <?php echo get_the_date('d F', $case_study_id); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-articles-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top-block">
                        <div class="section-info">
                            <?php if($popular_articles_title){ ?>
                                <div class="section-title">
                                    <?php echo $popular_articles_title; ?>
                                </div>     
                            <?php } ?>
                            <?php if($popular_articles_description){ ?>
                                <div class="section-description">
                                    <?php echo $popular_articles_description; ?>
                                </div>     
                            <?php } ?>
                        </div>
                        <div class="section-button">
                            <?php $archive_link = get_permalink(get_option('page_for_posts')); ?>
                            <a href="<?php echo esc_url($archive_link); ?>" class="view-all-posts-button">View All
                            <span class="material-icons">arrow_forward</span></a>
                        </div>
                    </div>
                    <?php
                        // Get the most popular posts based on view count
                        $popular_posts = get_posts(array(
                            'meta_key' => 'views',          
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',           
                            'posts_per_page' => 2,     
                        ));
                        ?>
                        <div class="popular-articles">
                        <?php
                        if (!empty($popular_posts)) {
                            foreach ($popular_posts as $post) {
                                setup_postdata($post);
                                ?>
                                    <div class="popular-article" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
                                        <div class="blog-post-content">
                                            <a href="<?php the_permalink(); ?>"></a>
                                            <div class="featured">FEATURED</div>
                                            <div class="blog-post-info">
                                                <div class="blog-post-title">
                                                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                                </div>
                                                <div class="author-block">
                                                    <div class="author-description">
                                                        <div class="author-avatar">
                                                            <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                                        </div>
                                                        <div class="author-name">
                                                            <?php the_author(); ?>
                                                            <div class="verified-author-mark"><span class="material-icons">done</span>Verified writer</div>
                                                        </div>
                                                    </div>
                                                    <div class="post-date">
                                                        <?php echo get_the_date('d F'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                            wp_reset_postdata();
                        } else {
                            // No popular posts found, display 2 random posts
                            $random_posts = get_posts(array(
                                'orderby' => 'rand',
                                'posts_per_page' => 2,
                            ));

                            foreach ($random_posts as $post) {
                                setup_postdata($post);
                                ?>
                                <div class="random-article">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recent-articles-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top-block">
                        <div class="section-info">
                            <?php if($recent_articles_title){ ?>
                                <div class="section-title">
                                    <?php echo $recent_articles_title; ?>
                                </div>     
                            <?php } ?>
                            <?php if($recent_articles_description){ ?>
                                <div class="section-description">
                                    <?php echo $recent_articles_description; ?>
                                </div>     
                            <?php } ?>
                        </div>
                        <div class="section-button">
                            <?php $archive_link = get_permalink(get_option('page_for_posts')); ?>
                            <a href="<?php echo esc_url($archive_link); ?>" class="view-all-posts-button">View All
                            <span class="material-icons">arrow_forward</span></a>
                        </div>
                    </div>
                    <?php
                        $popular_post_ids = wp_list_pluck($popular_posts, 'ID');
                        // Get the 3 most recent posts
                        $recent_posts = get_posts(array(
                            'orderby' => 'date',          
                            'order' => 'DESC',           
                            'posts_per_page' => 3,        
                            'post__not_in' => $popular_post_ids,
                        ));
                        ?>
                    <div class="recent-articles">
                        <?php
                        foreach ($recent_posts as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="recent-article" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
                                <div class="blog-post-content">
                                    <a href="<?php the_permalink(); ?>"></a>
                                    <div class="blog-post-info">
                                        <div class="blog-post-title">
                                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                        </div>
                                        <div class="blog-post-description">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="author-block">
                                            <div class="author-description">
                                                <div class="author-avatar">
                                                    <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                                </div>
                                                <div class="author-name">
                                                    <?php the_author(); ?>
                                                    <div class="verified-author-mark"><span class="material-icons">done</span>Verified writer</div>
                                                </div>
                                            </div>
                                            <div class="post-date">
                                                <?php echo get_the_date('d F'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="case-study-section slider-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top-block">
                        <div class="section-info">
                            <?php if($title_slider_section){ ?>
                                <div class="section-title">
                                    <?php echo $title_slider_section; ?>
                                </div>     
                            <?php } ?>
                            <?php if($description_slider_section){ ?>
                                <div class="section-description">
                                    <?php echo $description_slider_section; ?>
                                </div>     
                            <?php } ?>
                        </div>
                        <div class="section-button">
                            <?php $archive_link = get_permalink(get_option('page_for_posts')); ?>
                            <a href="<?php echo get_post_type_archive_link('case-studies'); ?>" class="view-all-posts-button">View All
                            <span class="material-icons">arrow_forward</span></a>
                        </div>
                    </div>
                    <div class="slider-block">
                        <div class="slick-slider">
                            <?php
                            $case_studies = get_posts(array(
                                'post_type' => 'case-studies',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => -1,
                            ));

                            foreach ($case_studies as $post) {
                                setup_postdata($post);
                                ?>
                                <div class="slike-slider-item">
                                    <div class="case-study-block">
                                        <div class="case-study-content">
                                            <div class="case-study-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
                                                </a>
                                            </div>
                                            <div class="case-study-info">
                                                <div class="featured">FEATURED</div>
                                                <div class="case-study-title">
                                                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                                </div>
                                                <div class="case-study-excerpt"><p><p><?php the_excerpt(); ?></p></p></div>
                                                <div class="author-block">
                                                    <div class="author-description">
                                                        <div class="author-avatar">
                                                            <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                                        </div>
                                                        <div class="author-name">
                                                            <?php the_author(); ?>
                                                            <div class="verified-author-mark"><span class="material-icons">done</span>Verified writer</div>
                                                        </div>
                                                    </div>
                                                    <div class="post-date">
                                                        <?php echo get_the_date('d F'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="all-articles-section recent-articles-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top-block">
                            <div class="section-info">
                                <?php if($all_articles_title){ ?>
                                    <div class="section-title">
                                        <?php echo $all_articles_title; ?>
                                    </div>     
                                <?php } ?>
                                <?php if($all_articles_description){ ?>
                                    <div class="section-description">
                                        <?php echo $all_articles_description; ?>
                                    </div>     
                                <?php } ?>
                            </div>
                            <div class="section-button">
                                <?php $archive_link = get_permalink(get_option('page_for_posts')); ?>
                                <a href="<?php echo esc_url($archive_link); ?>" class="view-all-posts-button">View All
                                <span class="material-icons">arrow_forward</span></a>
                            </div>
                    </div>
                    <div class="recent-articles" id="article-container">
                        <?php
                            $recent_posts = get_posts(array(
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                                'post__not_in' => $popular_post_ids,
                            ));

                            $exclude_recent_posts = array();

                            // Get the IDs of the 3 most recent posts
                            for ($i = 0; $i < 3 && isset($recent_posts[$i]); $i++) {
                                $exclude_recent_posts[] = $recent_posts[$i]->ID;
                            }

                            $all_posts = get_posts(array(
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                                'post__not_in' => array_merge($exclude_recent_posts, $popular_post_ids),
                            ));

                            foreach ($all_posts as $post) {
                                setup_postdata($post);
                                ?>
                                <div class="recent-article" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
                                    <div class="blog-post-content">
                                        <a href="<?php the_permalink(); ?>"></a>
                                        <div class="featured">FEATURED</div>
                                        <div class="blog-post-info">
                                            
                                            <div class="blog-post-title">
                                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                            </div>
                                            <div class="blog-post-description">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="author-block">
                                                <div class="author-description">
                                                    <div class="author-avatar">
                                                        <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                                    </div>
                                                    <div class="author-name">
                                                        <?php the_author(); ?>
                                                        <div class="verified-author-mark"><span class="material-icons">done</span>Verified writer</div>
                                                    </div>
                                                </div>
                                                <div class="post-date">
                                                    <?php echo get_the_date('d F'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                    <div class="load-more-button-container">
                        <button id="load-more" class="load-more view-all-posts-button"><span class="load-text">Load More</span><span class="material-icons">arrow_forward</span></a></button>
                    </div>
            </div>
        </div>
    </section>

</div>


<?php get_footer(); ?>