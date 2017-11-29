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

$(document).ready(function () {
    $('#productForm')
        .find('[name="product[name]"]')
            .change(function (e) {
                $('#productForm').formValidation('revalidateField', 'product[name]');
            })
            .end()
        .find('[name="product[tags]"]')
            .change(function (e) {
                $('#productForm').formValidation('revalidateField', 'product[tags]');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'product[name]': {
                    validators: {
                        notEmpty: {
                            message: 'The name field is required'
                        }
                    }
                },
                'product[tags]': {
                    validators: {
                        callback: {
                            message: 'Please enter at least one tag.',
                            callback: function (value, validator, $field) {
                                // Get the entered elements
                                var options = validator.getFieldElements('product[tags]').tagsinput('items');
                                return (options !== null && options.length >= 1);
                            }
                        }
                    }
                }
            }
        });

    $('#searchForm')
        .find('[name="product_list[tags]"]')
            .change(function (e) {
                $('#searchForm').formValidation('revalidateField', 'product_list[tags]');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'product_list[tags]': {
                    validators: {
                        callback: {
                            message: 'Please enter at least one tag.',
                            callback: function (value, validator, $field) {
                                // Get the entered elements
                                var options = validator.getFieldElements('product_list[tags]').tagsinput('items');
                                return (options !== null && options.length >= 1);
                            }
                        }
                    }
                }
            }
        });
});
