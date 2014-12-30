 (function($) {
    $(document).ready(function() {
        var images = $( "#featured-images" ).html();
        $('#cbp-bislideshow').append(images);
        $('#primary-navigation').hide();
    });
  })(jQuery);