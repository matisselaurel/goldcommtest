 (function($) {
    $(document).ready(function() {
        var images = $( "#featured-images" ).html();
        $('#cbp-bislideshow').append(images);
        $('.page-item-5').hide();

        $('.main-nav').on('click', function(event) {
            event.preventDefault();
            $('#primary-navigation').toggleClass('hide');
        });
    });
  })(jQuery);