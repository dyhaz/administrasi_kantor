/**
 * Created by muhammad on 06/07/17.
 */
var Form = function() {

    "use strict";

    /* * * * * * * * * * * *
     * Validation for Ajax Form
     * * * * * * * * * * * */
    var initAjaxFormValidation = function () {
        if ($.validator) {
            $('.ajax-form').validate({
                submitHandler: function (form) {
                    waitingDialog.show();

                    var table = $('table[name=table-checkable]').DataTable();
                    var deleted_indexes = [];
                    if(table) {
                        var rows_selected = table.column(0).checkboxes.selected();

                        // Iterate over all selected checkboxes
                        $.each(rows_selected, function(index, rowId){
                            deleted_indexes.push(index);
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'id[]')
                                    .val(rowId)
                            );
                        });

                        var additionalFields = ['tanggal', 'keterangan'];
                        for(var i = 0 ; i < additionalFields.length ; i++) {
                            if($('#'+additionalFields[i]).length) {
                                $(form).append(
                                    $('<input>')
                                        .attr('type', 'hidden')
                                        .attr('name', additionalFields[i])
                                        .val($('#'+additionalFields[i]).val())
                                );
                            }
                        }
                    }

                    $.ajax({
                        type: $(form).attr('method'),
                        url: $(form).attr('action'),
                        data: $(form).serialize(),
                        cache: false,
                        processData: false,
                        success: function (data) {
                            console.log('Submission was successful.');
                            console.log(data);
                            for(var i = deleted_indexes.length-1 ; i >= 0 ; i--) {
                                table.row(deleted_indexes[i]).remove();
                            }
                            table.draw();

                            var table2 = $('#tab-penerimaan').DataTable();
                            if(table2) table2.ajax.reload();

                            waitingDialog.hide();
                        },
                        error: function (data) {
                            console.log('An error occurred.');
                            console.log(data);
                            alert('An error occurred.');
                            waitingDialog.hide();
                        }
                    });

                    return false;
                }
            });
        }
    }

    return {
        // main function to initiate all plugins
        init: function () {
            initAjaxFormValidation();
        },

    };
}();