<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_blog_site";

define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$itemsPerPage = 3;
$offset = ($page - 1) * $itemsPerPage;

$merged_array = array();

// Getting the last 8 posts
$args_recent = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 7,
    'post__not_in' => $merged_array,
);

$recent_posts = new WP_Query($args_recent);

$excluded_recent_post_ids = wp_list_pluck($recent_posts->posts, 'ID');

// Receiving articles starting from the 9th post
$args = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $itemsPerPage,
    'offset' => $offset,
    'post__not_in' => array_merge($merged_array, $excluded_recent_post_ids),
);

$all_posts = new WP_Query($args);

if ($all_posts->have_posts()) {
    while ($all_posts->have_posts()) {
        $all_posts->the_post();
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
} else {
    echo "No more articles.";
}
?>
