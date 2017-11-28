var $ = require('jquery');

import 'bootstrap';
import 'bootstrap-tagsinput';

// bootstrap-tagsinput
$('input[data-role="tagsinput"]').tagsinput({
    confirmKeys: [13, 32],
});

// formvalidation.io
