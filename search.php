<?php get_header();

// Get the search query
$search_query = get_search_query();

// Define the post types to search in
$post_types = array('post', 'case_studies');

// Define the search arguments
$search_args = array(
    'post_type' => $post_types,
    's' => $search_query,
);

// Perform the search
$search_query = new WP_Query($search_args);

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title">
                <?php printf(__('Search Results for: %s', 'blogsite'), '<span>' . get_search_query() . '</span>'); ?>
            </h1>
        </header>

        <?php if ($search_query->have_posts()) : ?>
            <div class="search-results">
                <?php while ($search_query->have_posts()) : $search_query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p><?php _e('No results found.', 'blogsite'); ?></p>
        <?php endif; ?>

    </main>
</div>

<?php
get_footer();
