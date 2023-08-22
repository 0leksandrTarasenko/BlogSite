<?php



get_header(); ?>

<div class="gfgf">single post</div>
<?php
// Get the post author's ID
$post_author_id = get_post_field('post_author');

// Get the post author's display name
$post_author_name = get_the_author_meta('display_name', $post_author_id);

// Get the post author's avatar using the "Simple User Avatar" plugin
$post_author_avatar_url = get_user_meta($post_author_id, 'simple_local_avatar', true);
?>

<div class="post-author-info">
    <div class="author-avatar">
        <?php if (!empty($post_author_avatar_url)) : ?>
            <img src="<?php echo esc_url($post_author_avatar_url); ?>" alt="Avatar" class="avatar">
        <?php else :
            // Display a default avatar if the user hasn't set one
            echo get_avatar($post_author_id, 96);
        endif; ?>
    </div>
    <div class="author-name">
        <?php echo 'Author: ' . $post_author_name; ?>
    </div>
</div>








<?php get_footer(); ?>