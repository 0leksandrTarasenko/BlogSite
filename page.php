<?php

get_header();

$default_page_title = get_field("default_page_title");
$default_page_content = get_field("default_page_content");
$default_background_image = get_field("default_background_image");

if (have_posts()) : while (have_posts()) : the_post();

?>
    <div class="default_page">
        <section class="title-section" style="<?php if($default_background_image){ ?>background-image:url(<?php echo $default_background_image['url']; ?>);<?php } ?>">
            <div class="container-fluid container-default">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <?php if($default_page_title){ ?>
                            <div class="title">
                                <?php echo $default_page_title; ?>
                            </div>     
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-section">
            <div class="container-fluid container-default">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <?php if($default_page_content){ ?>
                            <div class="content">
                                <?php echo $default_page_content; ?>
                            </div>     
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php

endwhile; else: endif;
get_footer();



