(function ($) {
    "use strict"; $(document).ready(function () {
        jQuery("#load").fadeOut(); jQuery("#loading").delay(0).fadeOut("slow"); 
        });
        $('html, body').stop().animate({ scrollTop: $(anchor.attr('href')).offset().top - 0 }, 1500); e.preventDefault(); }); $(window).on('scroll', function () { if ($(this).scrollTop() > 100) { $('header').addClass('menu-sticky'); }
        else { $('header').removeClass('menu-sticky'); }
});(jQuery);