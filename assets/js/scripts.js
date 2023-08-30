/*Homepage-slider*/
jQuery(document).ready(function($) {
    jQuery('.slick-slider').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 1, 
        slidesToScroll: 1,
        infinite: true,
        adaptiveHeight: true,
        responsive: [
            {
              breakpoint: 1279,
              settings: {
                dots: true,
                arrows: false,
              }
            }
          ]
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

//Search placeholder
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById('s');
    if (searchInput) {
        searchInput.placeholder = "Search article";
    }
});

//Load more loading
document.addEventListener("DOMContentLoaded", function() {
    const loadMoreButtons = document.querySelectorAll(".load-more");
    loadMoreButtons.forEach(button => {
        button.addEventListener("click", function() {
            const loadText = button.querySelector(".load-text");
            const arrowIcon = button.querySelector(".material-icons");
            
            const originalText = loadText.textContent;
            const originalIcon = arrowIcon.textContent;

            loadText.textContent = "Loading...";
            arrowIcon.style.display = "none";

            const timeout = setTimeout(function() {
                loadText.textContent = originalText;
                arrowIcon.style.display = "inline";
            }, 3000);

            button.addEventListener("mouseup", function() {
                clearTimeout(timeout);
            });
        });
    });
});










  