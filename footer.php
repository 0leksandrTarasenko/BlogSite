<?php
$footer_menus = get_field("footer_menus", 'options');
$footer_title = get_field("footer_title", 'options');
$footer_subtitle = get_field("footer_subtitle", 'options');
$footer_image = get_field("footer_image", 'options');
$footer_image_text = get_field("footer_image_text", 'options');
$footer_logo = get_field("footer_logo", 'options');
$footer_tagline = get_field("footer_tagline", 'options');
$social_twitter_link = get_field("social_twitter_link", 'options');
$social_linkedin_link = get_field("social_linkedin_link", 'options');
$social_instagram_link = get_field("social_instagramm_link", 'options');
$social_google_link = get_field("social_google_link", 'options');
$social_youtube_link = get_field("social_youtube_link", 'options');
$copyright_content = get_field("copyright_content", 'options');
$footer_background = get_field("footer_background", 'options');
?>

<footer class="footer" style="<?php if($footer_background){ ?>background-image:url(<?php echo $footer_background['url']; ?>);<?php } ?>">
    <div class="container-fluid container-default">
        <div class="row form-row">
            <div class="col-lg-6">
                <div class="footer-title">
                    <?php if($footer_title){ ?>
                        <?php echo $footer_title; ?>             
                    <?php } ?>
                </div>
                <div class="subscribe-form">
                    <div class="form-block">
                        <?php echo do_shortcode( '[contact-form-7 id="6" title="Contact form 1" html_id="subscribe-newsletter"]' ); ?>
                    </div>
                </div>
                <div class="footer-subtitle">
                    <?php if($footer_subtitle){ ?>
                        <?php echo $footer_subtitle; ?>             
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-right-side">
                    <div class="footer-image">
                        <?php if($footer_image){ ?>
                            <img src="<?php echo $footer_image['url']; ?>" alt="<?php echo $footer_image['title']; ?>" />          
                        <?php } ?>
                    </div>
                    <div class="footer-image-text">
                        <?php if($footer_image_text){ ?>
                            <?php echo $footer_image_text; ?>             
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
  

        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="footer-logo">
                    <?php if($footer_logo){ ?>
                        <a class="homepage_link" href="<?php bloginfo('url'); ?>"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['title']; ?>" /></a>          
                    <?php } ?>
                </div>
                <div class="footer-tagline">
                    <?php if($footer_tagline){ ?>
                        <?php echo $footer_tagline; ?>             
                    <?php } ?>
                </div>
                <div class="social-block">
                    <div class="socials-buttons-block">
                        <?php if($social_twitter_link){ ?>
                            <div><a href="<?php echo ($social_twitter_link); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Twitter', 'heya' )?></span></a></div>
                        <?php } ?>
                        <?php if($social_linkedin_link){ ?>
                            <div><a href="<?php echo ($social_linkedin_link); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Linkedin', 'heya' )?></span></a></div>
                        <?php } ?>
                        <?php if($social_instagram_link){ ?>
                            <div><a href="<?php echo ($social_instagram_link); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Instagram', 'heya' )?></span></a></div>
                        <?php } ?>
                        <?php if($social_google_link){ ?>
                            <div><a href="<?php echo ($social_google_link); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Google', 'heya' )?></span></a></div>
                        <?php } ?>
                        <?php if($social_youtube_link){ ?>
                            <div><a href="<?php echo ($social_youtube_link); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Youtube', 'heyad' )?></span></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-8">
                <?php if(is_array($footer_menus)){ ?>
                    <div class="container-fluid footer-menus-block">
                        <div class="row justify-content-between">
                        <?php foreach($footer_menus as $footer_menus_item) { ?>
                            <div class="col-lg-3 col-sm-6 col-6">
                                <div class="sub-menu-title">
                                    <?php echo $footer_menus_item['title']; ?>
                                </div>
                                <div class="sub-menu">
                                    <?php echo $footer_menus_item['description']; ?>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <div class="copyright-content">
                    <?php if($copyright_content){ ?>
                        <?php echo $copyright_content; ?>             
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

</footer>

<?php wp_footer(); ?>