(function ($) {
    'use strict';
    $(function () {
        $('#order-listing').DataTable({
            "aLengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
                search: ""
            }
        });
        $('#order-listing').each(function () {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search');
            search_input.removeClass('form-control-sm');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
    });
})(jQuery);

(function ($) {
    'use strict';

    if ($(".js-example-basic-single").length) {
        $(".js-example-basic-single").select2();
    }
    if ($(".js-example-basic-multiple").length) {
        $(".js-example-basic-multiple").select2();
    }
})(jQuery);

$(document).ready(function () {
    var table = $('#transaksi').DataTable({
        lengthChange: false,
        buttons: {
            buttons: ['excel', 'pdf'],
            dom: {
                button: {
                    tag: "button",
                    className: "btn btn-inverse-primary btn-sm"
                },
                buttonLiner: {
                    tag: null
                }
            }
        }
    });

    table.buttons().container()
        .appendTo('#transaksi_wrapper .col-md-6:eq(0)');
});