<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php single_tag_title(); ?></h1>
            </header>

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Display post title.
                the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );

            // End the loop.
            endwhile;

            // Pagination.
            the_posts_pagination();

        else :
            // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->


<?php get_footer(); ?>
