/*
 *  Document   : pricing.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Pricing page
 */

var Pricing = function() {

    return {
        init: function() {
            // Hover functionality on price tables (by toggling 'table-featured' class on hover)
            $('.table-pricing')
                .on('mouseenter', function(){
                    $(this).addClass('table-featured');
                })
                .on('mouseleave', function(){
                    $(this).removeClass('table-featured');
                });
        }
    };
}();