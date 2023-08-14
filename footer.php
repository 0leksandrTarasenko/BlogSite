<?php
$footer_menus = get_field("footer_menus", 'options');
var_dump($footer_menus);
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<footer class="footer hy_fadeIn">
    <?php if(is_array($footer_menus)){ ?>
        <div class="container-fluid footer-info-section">
            <div class="row">
                <?php foreach($footer_menus as $footer_menus_item) { ?>
                    <?php if($footer_menus_item['title']){ echo csc($footer_menus_item['title']); } ?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</footer>

<?php wp_footer(); ?>