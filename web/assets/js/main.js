var $ = require('jquery');

import 'bootstrap';
import 'bootstrap-tagsinput';
import 'formvalidation';
import 'formvalidation/dist/js/framework/bootstrap';

// bootstrap-tagsinput
$('input[data-role="tagsinput"]').tagsinput({
    confirmKeys: [13, 32],
});

// formvalidation.io
$(document).ready(function () {
    $('#productForm')
        .find('[name="product[name]"]')
            .change(function (e) {
                $('#productForm').formValidation('revalidateField', 'name');
            })
            .end()
        .formValidation({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'required field'
                        }
                    }
                }
            }
        });
});
