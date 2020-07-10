toastr.options.closeButton = true;
toastr.options.showMethod = "slideDown";
toastr.options.hideMethod = "slideUp";
toastr.options.timeOut = 5000;

$('button').tooltip();
$('a').tooltip();

const table = $("#table").DataTable({
    dom: `<'row'<'col-sm-6 mb-3'B>
                <'col-sm-6'f>><'row'<'col-12' t>><'row'<'d-flex justify-content-start w-50' i>
                <'d-flex justify-content-end w-50'p>>`,
    buttons: [{
            extend: 'copy',
            text: '<i class="fa fa-fw fa-copy"></i>',
            className: 'btn btn-light btn-sm',
            attr: {
                title: 'Copy',
            }
        },
        {
            extend: 'excel',
            text: '<i class="fa fa-fw fa-file-excel"></i>',
            className: 'btn btn-light btn-sm',
            attr: {
                title: 'Export as Excell',
            }
        },
        {
            extend: 'pdfHtml5',
            download: 'open',
            text: '<i class="fa fa-fw fa-file-pdf"></i>',
            className: 'btn btn-light btn-sm',
            attr: {
                title: 'Export as PDF',
            }
        },
        {
            extend: 'print',
            text: '<i class="fa fa-fw fa-print"></i>',
            className: 'btn btn-light btn-sm',
            attr: {
                title: 'Print',
            }
        },
    ],
    processing: true,
    serverSide: true,
    ajax: "http://127.0.0.1:8000/api/produk/kategori",
    columns: [{
            data: "name"
        },
        {
            data: "created_at"
        },
        {
            data: "updated_at"
        },
        {
            data: "action"
        }
    ],
    columnDefs: [{
            targets: [0],
            width: '40%',
        },
        {
            targets: [1],
            width: '20%',
            render: function (data, type, row, meta) {
                return moment(data).format('LLL');
            }
        },
        {
            targets: [2],
            width: '20%',
            render: function (data, type, row, meta) {
                return moment(data).format('LLL');
            }
        },
        {
            targets: [3],
            className: "d-flex justify-content-center",
        }
    ],
    order: [
        [2, "desc"]
    ]
});

async function showDeleteModal(id) {
    $('#delete').find(`input[name="_id"]`).val(id);
    $('#delete-modal').modal('show');
}

async function showEditModal(id) {
    $('#put').find(`input[name="_id"]`).val(id);
    $.ajax({
        url: `http://127.0.0.1:8000/api/produk/kategori/${id}/edit`,
        mehtod: 'GET',
        success: function (data) {
            $('#name').val(data.data.name);
            $('#edit-modal').modal('show');
        },
        error: function (err) {
            toastr.error(err.responseJSON.message, 'Failed !');
        }
    })
}

async function ajaxProcess(uri, methods, formData, formID) {
    $.ajax({
        url: uri,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: methods,
        type: 'json',
        data: formData,
        success: function (data) {
            formatForm(formID, methods)
            table.ajax.reload();
            toastr.success(data.message, 'Sukses !');
        },
        error: function (err) {
            findError(err.responseJSON.errors, methods)
            toastr.error(err.responseJSON.message, 'Failed !');
        }
    })
}

async function findError(err, methods) {
    let prefixMeth;
    if (methods === 'POST') {
        prefixMeth = 'c';
    } else if (methods === 'PUT') {
        prefixMeth = 'u';
    } else if (methods === 'DELETE') {
        prefixMeth = 'd';
    }

    console.log(prefixMeth)

    for (const [key, value] of Object.entries(err)) {
        if (key === key) {
            $(`#error-${key}-${prefixMeth}`).html(value);
            $(`input[name="${key}"]`).addClass('is-invalid');
        } else {
            $(`#error-${key}-${prefixMeth}`).html('');
            $(`input[name="${key}"]`).removeClass('is-invalid');
        }
    }
    $(`#save-${prefixMeth}`).children().attr('class', 'fa fa-save fa-fw mr-2');
}

async function formatForm(formName, methods) {
    $(formName).trigger('reset');
    $('input').removeClass('is-invalid');
    $('small').html('');
    $('.modal').modal('hide').fadeOut();
    loadingButton(false, methods);
}

async function loadingButton(onload = true, methods) {
    let prefixMeth;
    if (methods === 'POST') prefixMeth = 'c';
    if (methods === 'PUT') prefixMeth = 'u';
    if (methods === 'DELETE') prefixMeth = 'd';

    if (onload === true) {
        $(`#save-${prefixMeth}`).children().attr('class', 'fa fa-circle-o-notch fa-spin fa-fw mr-2');
        $(`#save-${prefixMeth}`).prop('disabled', true);
    } else {
        $(`#save-${prefixMeth}`).children().attr('class', 'fa fa-save fa-fw mr-2');
        $(`#save-${prefixMeth}`).prop('disabled', false);
    }
}

$('#save-c').click(function (e) {
    e.preventDefault();
    $(this).children().attr('class', 'fa fa-circle-o-notch fa-spin fa-fw mr-2');
    const form = document.querySelector('#post'),
        formData = new FormData(form);
    ajaxProcess(
        'http://127.0.0.1:8000/_admin/produk/kategori',
        'POST', {
            name: formData.get('name')
        },
        form
    );
})

$('#save-u').click(function (e) {
    e.preventDefault();
    const id = $('#put').find(`input[name="_id"]`).val();
    loadingButton(true, 'PUT');
    const form = document.querySelector('#put'),
        formData = new FormData(form);

    ajaxProcess(
        `http://127.0.0.1:8000/_admin/produk/kategori/${id}`,
        'PUT', {
            name: formData.get('name')
        },
        form
    );
});

$('#save-d').click(function (e) {
    e.preventDefault();
    const id = $('#delete').find(`input[name="_id"]`).val();
    loadingButton(true, 'PUT');
    const form = document.querySelector('#delete');
    ajaxProcess(
        `http://127.0.0.1:8000/_admin/produk/kategori/${id}`,
        'DELETE',
        null,
        form
    );
});

$('.modal').on('hidden.bs.modal', function () {
    $('input').removeClass('is-invalid')
    $('form').trigger('reset');
    $('input').val();
    $('small').html('');
});
