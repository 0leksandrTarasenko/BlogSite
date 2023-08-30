<?php get_header();

$background_blog = get_field("background_blog");

?>

<?php if ( have_posts() ) : ?>
    <div class="blog-page">
        <section class="blog-title-section" style="background-image: url('/wp-content/uploads/2023/08/bg-home-header.svg');">
            <div class="container-fluid container-default">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-title"><?php single_tag_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="recent-articles-section">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="recent-articles flex-wrap justify-content-start">
                        <?php
                        while ( have_posts() ) : the_post();
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
                            endwhile;
                            the_posts_pagination();
                        endif;
?>
                         </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>
