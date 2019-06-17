// (function ($) {
//     "use strict"; $(document).ready(function () {
//         jQuery("#load").fadeOut(); jQuery("#loading").delay(0).fadeOut("slow"); 
//         });
//         $('html, body').stop().animate({ scrollTop: $(anchor.attr('href')).offset().top - 0 }, 1500); e.preventDefault(); }); $(window).on('scroll', function () { if ($(this).scrollTop() > 100) { $('header').addClass('menu-sticky'); }
//         else { $('header').removeClass('menu-sticky'); }
// });(jQuery);
(function ($) {
    "use strict"; $(document).ready(function () {
        jQuery("#load").fadeOut(); jQuery("#loading").delay(0).fadeOut("slow"); $(".navbar a").on("click", function (event) { if (!$(event.target).closest(".nav-item.dropdown").length) { $(".navbar-collapse").collapse('hide'); } }); $('#back-to-top').fadeOut(); $(window).on("scroll", function () { if ($(this).scrollTop() > 250) { $('#back-to-top').fadeIn(1400); } else { $('#back-to-top').fadeOut(400); } }); $('#top').on('click', function () { $('top').tooltip('hide'); $('body,html').animate({ scrollTop: 0 }, 800); return false; }); $(function () { $('[data-toggle="tooltip"]').tooltip() }); $('.iq-accordion .iq-ad-block .ad-details').hide(); $('.iq-accordion .iq-ad-block:first').addClass('ad-active').children().slideDown('slow'); $('.iq-accordion .iq-ad-block').on("click", function () { if ($(this).children('div').is(':hidden')) { $('.iq-accordion .iq-ad-block').removeClass('ad-active').children('div').slideUp('slow'); $(this).toggleClass('ad-active').children('div').slideDown('slow'); } }); $('.navbar-nav li a').on('click', function (e) { var anchor = $(this); 
            $('html, body').stop().animate({ scrollTop: $(anchor.attr('href')).offset().top - 0 }, 1500); e.preventDefault(); }); $(window).on('scroll', function () { if ($(this).scrollTop() > 100) { $('header').addClass('menu-sticky'); }
             else { $('header').removeClass('menu-sticky'); } }); 
            $('.popup-gallery').magnificPopup({ delegate: 'a.popup-img', type: 'image', tLoading: 'Loading image #%curr%...', mainClass: 'mfp-img-mobile', gallery: { enabled: true, navigateByImgClick: true, preload: [0, 1] }, image: { tError: '<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc: function (item) { return item.el.attr('title') + '<small>by Marsel Van Oosten</small>'; } } }); $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({ disableOn: 700, type: 'iframe', mainClass: 'mfp-fade', removalDelay: 160, preloader: false, fixedContentPos: false }); $('#countdown').countdown({ date: '10/01/2019 23:59:59', day: 'Day', days: 'Days' }); $('.timer').countTo(); $('.owl-carousel').each(function () { var $carousel = $(this); $carousel.owlCarousel({ items: $carousel.data("items"), loop: $carousel.data("loop"), margin: $carousel.data("margin"), nav: $carousel.data("nav"), dots: $carousel.data("dots"), autoplay: $carousel.data("autoplay"), autoplayTimeout: $carousel.data("autoplay-timeout"), navText: ['<i class="fa fa-angle-left fa-2x"></i>', '<i class="fa fa-angle-right fa-2x"></i>'], responsiveClass: true, responsive: { 0: { items: $carousel.data("items-mobile-sm") }, 480: { items: $carousel.data("items-mobile") }, 786: { items: $carousel.data("items-tab") }, 1023: { items: $carousel.data("items-laptop") }, 1199: { items: $carousel.data("items") } } }); }); var wow = new WOW({ boxClass: 'wow', animateClass: 'animated', offset: 0, mobile: false, live: true }); wow.init(); $('#contact').submit(function (e) {
            var form_data = $(this).serialize(); var flag = 0; e.preventDefault(); $('.require').each(function () { if ($.trim($(this).val()) == '') { $(this).css("border", "1px solid red"); e.preventDefault(); flag = 1; } else { $(this).css("border", "1px solid grey"); flag = 0; } }); if (grecaptcha.getResponse() == "") { flag = 1; alert('Please verify Recaptch'); } else { flag = 0; }
            if (flag == 0) { console.log(form_data); $.ajax({ url: 'php/contact-form.php', type: 'POST', data: form_data, }).done(function (data) { console.log("successfully"); $("#result").html('Form was successfully submitted.'); $('#contact')[0].reset(); }).fail(function () { alert('Ajax Submit Failed ...'); console.log("fail"); }); }
        });
    }); $(window).load(function () {
        var user = getCookie("digital-marketing"); if (user == "") { $('#cookie_div').css("display", "inherit"); }
        $('#cookie').on('click', function () { checkCookie(); });
    }); function setCookie(cname, cvalue) { var d = new Date(); d.setTime(d.getTime() + (24 * 60 * 60 * 1000)); var expires = "expires=" + d.toGMTString(); document.cookie = cname + "=" + cvalue + ";" + expires + "; path=/"; $('#cookie_div').css("display", "none"); }
    function getCookie(cname) {
        var name = cname + "="; var ca = document.cookie.split(';'); for (var i = 0; i < ca.length; i++) { var c = ca[i]; var cookie_ = c.trim().split('=') || []; if (cookie_ != [] && cname == cookie_[0]) { return cookie_[1]; } }
        return "";
    }
    function checkCookie() { var user = getCookie("digital-marketing"); if (user == "") { $('#cookie_div').css("display", "none"); setCookie("digital-marketing", ""); } else { $('#cookie_div').css("display", "inherit"); } }
})(jQuery);
$(document).ready(function (e) {
	$("#form-res").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "ajaxupload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				$("#err").fadeOut();
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					// view uploaded file.
					$("#preview").html(data).fadeIn();
					$("#form-res")[0].reset();	
				}
		    },
		  	error: function(e) 
	    	{
				$("#err").html(e).fadeIn();
	    	} 	        
	   });
	}));
});
