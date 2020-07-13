const table = $("#table").DataTable({
    dom: `<'row mb-3'
                <'col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0 text-right text-sm-left'B>
                <'col-lg-6 col-md-6 col-sm-12 text-right text-sm-left'f>
            >
            <'row mb-2'
                <'col-12'<'table-responsive' t>>
            >
            <'row'
                <'col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0' i>
                <'col-lg-6 col-md-6 col-sm-12' p>
            >`,
    buttons: [
        {
            extend: "copy",
            text: '<i class="fa fa-fw fa-copy"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Copy"
        },
        {
            extend: "excel",
            text: '<i class="fa fa-fw fa-file-excel"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Export as Excell"
        },
        {
            extend: "pdfHtml5",
            download: "open",
            text: '<i class="fa fa-fw fa-file-pdf"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Export as PDF"
        },
        {
            extend: "print",
            text: '<i class="fa fa-fw fa-print"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Print"
        }
    ]
});
async function deleteConfirmation(id) {
    $("#confirm-modal").modal("show");
    $("#delete").attr(
        "action",
        `http://127.0.0.1:8000/_admin/produk/jenis/${id}`
    );
}
$("button").tooltip();
$("a").tooltip();
