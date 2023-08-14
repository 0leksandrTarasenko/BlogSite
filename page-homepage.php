<?php
/*
Template name: Homepage
*/
$case_study_id = get_field("case_study");
$custom_post_excerpt = get_the_excerpt($case_study_id);
$custom_post_thumbnail = get_the_post_thumbnail($case_study_id);
$custom_post_title = get_the_title($case_study_id);
?>

<?php get_header(); ?>

<div class="homepage-template">
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
            echo '<h2>Popular Tags:</h2>';
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
    <?php if($case_study_id){ ?>
        <section class="single-case-study-section hy_fadeIn">
            <div class="container-fluid container-default">
                <div class="row">
                    <div class="col-lg-12 case-study-col">
                        <div class="case-study-block">
                            <div class="case-study-content">
                                <?php $case_study_permalink = get_permalink($case_study_id); ?>
                                <div class="case-study-thumbnail"><a href="<?php echo $case_study_permalink; ?>"><?php echo $custom_post_thumbnail; ?></a></div>
                                <div class="case-study-info">
                                    <div class="case-study-title">
                                        <a href="<?php echo $case_study_permalink; ?>"><?php echo $custom_post_title; ?></a>
                                    </div>
                                    <div class="case-study-excerpt"><?php echo $custom_post_excerpt; ?></div>
                                    <div class="case-study-content"><?php the_field('description', $case_study_id); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="single-section hy_fadeIn">
            <div class="container-fluid container-default">
                <div class="row">
                <?php
                    // Get the most popular posts based on view count (WP-PostViews plugin)
                    $popular_posts = get_posts(array(
                        'meta_key' => 'views',           // WP-PostViews uses 'views' as the meta key
                        'orderby' => 'meta_value_num',   // Order by view count
                        'order' => 'DESC',               // Descending order
                        'posts_per_page' => 2,           // Number of popular posts to display
                    ));

                    if (!empty($popular_posts)) {
                        foreach ($popular_posts as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="popular-article">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    } else {
                        // No popular posts found, display 2 random posts
                        $random_posts = get_posts(array(
                            'orderby' => 'rand',        // Order randomly
                            'posts_per_page' => 2,     // Number of random posts
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

                    // Get the link to the archive page
                    $archive_link = get_permalink(get_option('page_for_posts'));
                    ?>
                    <a href="<?php echo esc_url($archive_link); ?>" class="view-all-posts-button">View All</a>
                </div>
            </div>
        </section>

        <section class="single-section hy_fadeIn">
            <div class="container-fluid container-default">
                <div class="row">

                <?php
                    $popular_post_ids = wp_list_pluck($popular_posts, 'ID');
                    // Get the 3 most recent posts
                    $recent_posts = get_posts(array(
                        'orderby' => 'date',           // Order by date
                        'order' => 'DESC',             // Descending order
                        'posts_per_page' => 3,         // Number of recent posts to display
                        'post__not_in' => $popular_post_ids, // Exclude popular posts
                    ));

                    foreach ($recent_posts as $post) {
                        setup_postdata($post);
                        ?>
                        <div class="recent-article">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();

                    // Get the link to the archive page
                    $archive_link = get_permalink(get_option('page_for_posts'));
                    ?>
                    <a href="<?php echo esc_url($archive_link); ?>" class="view-all-posts-button">View All</a>

                </div>
            </div>
        </section>

        <section class="single-section hy_fadeIn">
            <div class="container-fluid container-default">
                <div class="row">

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
                                <div class="case-study">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                            
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                </div>
                <div class="view-all-button">
                    <a href="<?php echo get_post_type_archive_link('case-studies'); ?>" class="view-all-link">View All</a>
                </div>

                </div>
            </div>
        </section>

        <section class="single-section hy_fadeIn">
            <div class="container-fluid container-default">
                <div class="row">
                <div id="article-container">
                <?php
                    $recent_posts = get_posts(array(
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                        'post__not_in' => $popular_post_ids,
                    ));

                    $exclude_recent_posts = array(); // Initialize an array to store recent post IDs

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
                        <div class="single-article">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                ?>
 
                    </div>
                    <div class="load-more-button-container">
                        <button id="load-more" class="load-more">Load More</button>
                    </div>

                </div>
            </div>
        </section>



    <?php } ?>
</div>


<?php get_footer(); ?>