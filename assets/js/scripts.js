/*Homepage-slider*/
jQuery(document).ready(function($) {
    $('.slick-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false
    });
});

/*Load more article button*/
jQuery(document).ready(function() {
    var page = 1;

    jQuery("#load-more").click(function() {
        page++;
        loadArticles(page);
    });

    function loadArticles(page) {
        jQuery.ajax({
            url: "/wp-content/themes/BlogSite/ajax/load_articles.php",
            type: "GET",
            data: { page: page },
            success: function(data) {
                jQuery("#article-container").append(data);
            }
        });
    }
});


// Header-menu
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item-has-children');
    menuItems.forEach(function (menuItem) {
        const link = menuItem.querySelector('a');
        const subMenu = menuItem.querySelector('.sub-menu');
        link.addEventListener('click', function (event) {
            event.preventDefault();
            if (subMenu.style.display === 'block') {
                subMenu.style.display = 'none';
                menuItem.classList.remove('open');
            } else {
                closeOpenMenus();
                subMenu.style.display = 'block';
                menuItem.classList.add('open');
            }
        });
    });
    function closeOpenMenus() {
        menuItems.forEach(function (menuItem) {
            menuItem.querySelector('.sub-menu').style.display = 'none';
            menuItem.classList.remove('open');
        });
    }
});


// Burger menu
jQuery(document).ready(function($) {
    $('.burger-menu').click(function() {
        $('.main-menu').toggleClass('menu-open');
    });
});







  