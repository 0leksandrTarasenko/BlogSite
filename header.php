<?php

$header_logo = get_field("header_logo", 'options');
$header_menu = get_field("header_menu", 'options');
$header_button = get_field("header_button", 'options');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>Heya</title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/x-icon">
    <link href="https://fonts.cdnfonts.com/css/gotham-6" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
        <div class="container-fluid container-default">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-3 logo-col">
                    <div class="header-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if($header_logo){ ?>
                                <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['title']; ?>" />          
                            <?php } ?>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-9 menu-col menu-items d-flex align-items-center justify-content-end">
                    <?php if($header_menu){ ?>
                        <div class="main-menu">
                        <div class="burger-menu">
                            <div class="burger-icon">
                                <div class="burger-line"></div>
                                <div class="burger-line"></div>
                                <div class="burger-line"></div>
                            </div>
                        </div>
                            <?php
                            wp_nav_menu( array(
                                'menu' => $header_menu,
                                'container' => false,
                                'depth' => 2,
                                'link_before'     => '<span class="title">',
                                'link_after'      => '</span>',
                                'fallback_cb'=> ''
                            ));
                            ?>
                        </div>
                    <?php } ?>
                    <div class="header-button">
                        <?php if(is_array($header_button)){ ?>
                                <?php foreach($header_button as $header_button_item) { ?>
                                    <a class="header-button-link" href="<?php echo $header_button_item['link']; ?>"><?php echo $header_button_item['title']; ?></a>
                                <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </header>

