/*
 *  Document   : portfolio.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Portfolio pages
 */

var Portfolio = function() {

    return {
        init: function() {
            var portfolioFilter = $('.portfolio-filter');
            var portfolio       = $('.portfolio');
            var showCategory;

            // When a portfolio filter link is clicked
            portfolioFilter.find('a').on('click', function() {
                // Get its data-category value
                showCategory = $(this).data('category');

                // Procceed only if the user clicked on an inactive category
                if ( ! $(this).hasClass('active')) {
                    // Remove active class from all filter links
                    portfolioFilter.find('a').removeClass('active');

                    // Add the active class to the clicked link
                    $(this).addClass('active');

                    // If the value is 'all' hide the current visible items and show them all together, else hide them all and show only from the category we need
                    if (showCategory === 'all') {
                        portfolio
                            .find('.portfolio-item')
                            .hide(0, function(){
                                $(this).show(0);
                            });
                    } else {
                        portfolio
                            .find('.portfolio-item')
                            .hide(0, function(){
                                portfolio
                                    .find('.portfolio-item[data-category="' + showCategory + '"]')
                                    .show(0);
                            });
                    }
                }
            });
        }
    };
}();