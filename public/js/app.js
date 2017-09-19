/*
 *  Document   : app.js
 *  Author     : pixelcave
 *  Description: Custom scripts and plugin initializations
 */

var App = function() {

    /* Initialization UI Code */
    var uiInit = function() {

        // Handle UI
        handleHeader();
        handleMenu();
        scrollToTop();

        // Add the correct copyright year at the footer
        var yearCopy = $('#year-copy'), d = new Date();
        if (d.getFullYear() === 2014) { yearCopy.html('2014'); } else { yearCopy.html('2014-' + d.getFullYear().toString().substr(2,2)); }

        // Initialize tabs
        $('[data-toggle="tabs"] a, .enable-tabs a').click(function(e){ e.preventDefault(); $(this).tab('show'); });

        // Initialize Tooltips
        $('[data-toggle="tooltip"], .enable-tooltip').tooltip({container: 'body', animation: false});

        // Initialize Popovers
        $('[data-toggle="popover"], .enable-popover').popover({container: 'body', animation: true});

        // Initialize single image lightbox
        $('[data-toggle="lightbox-image"]').magnificPopup({type: 'image', image: {titleSrc: 'title'}});

        // Initialize image gallery lightbox
        $('[data-toggle="lightbox-gallery"]').each(function(){
            $(this).magnificPopup({
                delegate: 'a.gallery-link',
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    arrowMarkup: '<button type="button" class="mfp-arrow mfp-arrow-%dir%" title="%title%"></button>',
                    tPrev: 'Previous',
                    tNext: 'Next',
                    tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
                },
                image: {titleSrc: 'title'}
            });
        });

        // Initialize Placeholder
        $('input, textarea').placeholder();

        // Toggle animation class when an element appears with Jquery Appear plugin
        $('[data-toggle="animation-appear"]').each(function(){
            var $this       = $(this);
            var $animClass  = $this.data('animation-class');
            var $elemOff    = $this.data('element-offset');

            $this.appear(function() {
                $this.removeClass('visibility-none').addClass($animClass);
            },{accY: $elemOff});
        });

        // With CountTo (+ help of Jquery Appear plugin), Check out examples and documentation at https://github.com/mhuggins/jquery-countTo
        $('[data-toggle="countTo"]').each(function(){
            var $this = $(this);

            $this.appear(function() {
                $this.countTo({
                    speed: 1500,
                    refreshInterval: 20,
                    onComplete: function() {
                        if($this.data('after')) {
                            $this.html($this.html() + $this.data('after'));
                        }
                    }
                });
            });
        });

        // Toggles 'open' class on store menu
        $('.store-menu .submenu').on('click', function(){
           $(this)
               .parent('li')
               .toggleClass('open');
        });
    };

    /* Handles Header */
    var handleHeader = function(){
        var header = $('header');

        $(window).scroll(function() {
            // If the user scrolled a bit (150 pixels) alter the header class to change it
            if ($(this).scrollTop() > header.outerHeight()) {
                header.addClass('header-scroll');
            } else {
                header.removeClass('header-scroll');
            }
        });
    };

    /* Handles Main Menu */
    var handleMenu = function(){
        var sideNav = $('.site-nav');

        $('.site-menu-toggle').on('click', function(){
            sideNav.toggleClass('site-nav-visible');
        });

        sideNav.on('mouseleave', function(){
            $(this).removeClass('site-nav-visible');
        });
    };

    /* Scroll to top functionality */
    var scrollToTop = function() {
        // Get link
        var link = $('#to-top');
        var windowW = window.innerWidth
                        || document.documentElement.clientWidth
                        || document.body.clientWidth;

        $(window).scroll(function() {
            // If the user scrolled a bit (150 pixels) show the link in large resolutions
            if (($(this).scrollTop() > 150) && (windowW > 991)) {
                link.fadeIn(100);
            } else {
                link.fadeOut(100);
            }
        });

        // On click get to top
        link.click(function() {
            $('html, body').animate({scrollTop: 0}, 500);
            return false;
        });
    };

    return {
        init: function() {
            uiInit(); // Initialize UI Code
        }
    };
}();

/* Initialize app when page loads */
$(function(){ App.init(); });