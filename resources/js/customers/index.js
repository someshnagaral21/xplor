import "datatables.net-bs5/css/dataTables.bootstrap5.min.css";
import DataTable from "datatables.net-bs5";

$(function () {
    let userDataUrl = $('#get-customers-data').val();

    let table = $('#customers').DataTable({
        lengthMenu: [15, 30, 50],
        pageLength: 15,
        processing: true,
        serverSide: true,
        ajax: {
            url: userDataUrl,
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
        ],
    });

    /**
     * Initialize the datatable after page load
     */
    setTimeout(function () {
        table.draw();
    }, 150);
})
