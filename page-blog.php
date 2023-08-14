<?php
/*
Template Name: Blog Template
*/

get_header();


$args = array(
    'post_type' => 'post', 
    'posts_per_page' => -1, 
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
        ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo "Пости не знайдені.";
endif;
?>

<?php get_footer(); ?>
