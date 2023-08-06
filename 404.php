<?php get_header(); ?>

<div class="hy_page hy_404_page">
    <section class="error404_section">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="img_block"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/404-error.svg" alt="404"/></div>
                </div>
                <div class="col-sm-12">
                    <div class="text_block">
                        <p>Sorry!</p>
                        <h2>Page not found...</h2>
                        <div class="btn_block">
                            <a class="homepage_link" href="<?php echo bloginfo('url'); ?>">Go to Main Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
