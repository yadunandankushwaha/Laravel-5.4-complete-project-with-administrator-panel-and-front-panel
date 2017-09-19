/*
 *  Document   : about.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in About page
 */

var About = function() {

    return {
        init: function() {
            /*
             * With Gmaps.js, Check out examples and documentation at http://hpneo.github.io/gmaps/examples.html
             */

            // Set top section height to Google Maps container
            $('.media-map').css('height', $('.site-section-top').outerHeight() + 50);

            // Initialize map
            new GMaps({
                div: '#gmap-top',
                lat: -33.870,
                lng: 151.22,
                zoom: 15,
                disableDefaultUI: true,
                scrollwheel: false
            }).setMapTypeId(google.maps.MapTypeId.SATELLITE);
        }
    };
}();