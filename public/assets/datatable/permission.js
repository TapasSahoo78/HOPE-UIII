$(document).ready(function () {
    var baseUrl = APP_URL + '/';
    if ($.fn.DataTable.isDataTable('#assignUserTable')) {
        $('#assignUserTable').DataTable().destroy();
    }

    // Initialize the DataTable regardless
    $('#assignUserTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + 'ajax/assign/data',
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
            data: 'role',
            name: 'role'
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
