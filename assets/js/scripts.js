/*Homepage-slider*/
jQuery(document).ready(function($) {
    $('.slick-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false
    });
});


/*Load mode article button*/
jQuery(document).ready(function() {
    var page = 1;

    jQuery("#load-more").click(function() {
        page++;
        loadArticles(page);
    });

    function loadArticles(page) {
        jQuery.ajax({
            url: "/wp-content/themes/BlogSite/ajax/load_articles.php", // Правильний абсолютний шлях
            type: "GET",
            data: { page: page },
            success: function(data) {
                jQuery("#article-container").append(data); // Додаємо завантажені статті
            }
        });
    }
});


 // Attach a click event handler to the search submit button
jQuery(document).ready(function($) {
    $('#searchsubmit').on('click', function(event) {
      event.preventDefault();
      window.location.href = '/blog/';
    });
  });
  