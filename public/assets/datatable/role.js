$(document).ready(function () {
    var baseUrl = APP_URL + '/';
    if ($.fn.DataTable.isDataTable('#roleTable')) {
        $('#roleTable').DataTable().destroy();
    }


    // Initialize the DataTable regardless
    $('#roleTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + 'ajax/roles/data',
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
        ]
    });
});
