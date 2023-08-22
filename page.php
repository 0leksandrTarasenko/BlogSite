<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();

?>
    <div class="hy_page hy_default_page hy_fadeIn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <?php echo the_content(); ?>
                    <div class="default-page">default-page</div>
                </div>
            </div>
        </div>
    </div>

<?php

endwhile; else: endif;
get_footer();
