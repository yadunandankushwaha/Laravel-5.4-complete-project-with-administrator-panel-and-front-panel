/*
 *  Document   : ecomCheckout.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Checkout page
 */

var EcomCheckout = function() {

    return {
        init: function() {
            /*
             *  Jquery Wizard, Check out more examples and documentation at http://www.thecodemine.org
             */

            /* Initialize Checkout Wizard */
            var checkoutWizard  = $('#checkout-wizard');

            checkoutWizard
                .formwizard({
                    disableUIStyles: true,
                    inDuration: 0,
                    outDuration: 0,
                    textBack: 'Previous Step',
                    textNext: 'Next Step',
                    textSubmit: 'Confirm Order'
                });

            $('.checkout-steps a').on('click', function(){
                var gotostep    = $(this).data('gotostep');

                checkoutWizard
                    .formwizard('show', gotostep);
            });
        }
    };
}();