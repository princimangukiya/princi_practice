$(document).ready(function() {
    DiamondTabel = $('#Diamond').DataTable({
        "autoWidth": false,
        "info": true,
        "paging": true,
        "lengthChange": false,
        "pageLength": 50,
        "sDom": 'lfrtip',
        "ordering": true,
        "searching": true,
        "order": [
            [0, "desc"]
        ]
    });
});