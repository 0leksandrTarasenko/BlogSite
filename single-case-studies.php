<?php
get_header();

$single_post_background = get_field("single_post_background");
$blog_content = get_field("blog_content");
?>

<div class="single-post">
    
    <section class="blog-title-section" style="<?php if($single_post_background){ ?>background-image:url(<?php echo $single_post_background['url']; ?>);<?php } ?>">
        <div class="container-fluid container-default">
            <div class="row">
                <div class="col-lg-12">

                    <div class="blog-top">
                        <div class="blog-post-title page-title">
                            <h1><?php the_title(); ?></h1>
                        </div>

                        <div class="author-block">
                            <div class="author-description">
                                <div class="author-avatar">
                                <?php 
                                    $post_author_avatar_url = get_post_meta(get_the_ID(), 'custom_author_avatar_url', true);
                                    $post_author_id = get_post_field('post_author', get_the_ID());
                                    if (!empty($post_author_avatar_url)) : ?>
                                        <img src="<?php echo esc_url($post_author_avatar_url); ?>" alt="Avatar" class="avatar">
                                    <?php else :
                                        // Display a default avatar if the user hasn't set one
                                        echo get_avatar($post_author_id, 96);
                                    endif; ?>
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
                                <?php echo get_the_date('d F'); ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="blog-content-section">
        <div class="container-fluid container-default">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($blog_content){ ?>
                            <div class="main-title">
                                <?php echo $blog_content; ?>
                            </div>     
                        <?php } ?>
                    </div>
                </div>
        </div>
    </section>

</div>


<?php get_footer(); ?>
