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
        <div class="single-article">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
        </div>
        <?php
    }
    wp_reset_postdata();
} else {
    echo "No more articles.";
}
?>
