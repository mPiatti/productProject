var $ = require('jquery');

import 'bootstrap-sass';
import 'bootstrap-tagsinput';
import 'formvalidation';
import 'formvalidation/dist/js/framework/bootstrap';

// bootstrap-tagsinput
$('input[data-role="tagsinput"]').tagsinput({
    confirmKeys: [13, 32],
});

// formvalidation.io
/*
$(document).ready(function () {
    $('#productForm')
        .find('[name="product[name]"]')
            .change(function (e) {
                $('#productForm').formValidation('revalidateField', 'product[name]');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'product[name]': {
                    validators: {
                        notEmpty: {
                            message: 'The name is required'
                        }
                    }
                }
            }
        });
});
*/
