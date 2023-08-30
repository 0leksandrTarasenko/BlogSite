<?php
/*
Template Name: Case Studies Template
*/
get_header();
?>

<div class="blog-page">
    
    <section class="blog-title-section" style="background-image: url('/wp-content/uploads/2023/08/bg-home-header.svg');">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-title">Case Studies</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="case-study-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-studies">
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
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
