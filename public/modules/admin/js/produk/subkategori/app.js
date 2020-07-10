toastr.options.closeButton = true;
toastr.options.showMethod = "slideDown";
toastr.options.hideMethod = "slideUp";
toastr.options.timeOut = 5000;

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
    ajax: "http://127.0.0.1:8000/api/produk/sub-kategori",
    columns: [{
            data: "name"
        },
        {
            data: "categories_name"
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
            width: '30%'
        },
        {
            targets: [2],
            render: function (data, type, row, meta) {
                return moment(data).format('LLL');
            }
        },
        {
            targets: [3],
            render: function (data, type, row, meta) {
                return moment(data).format('LLL');
            }
        },
        {
            targets: [4],
            className: "d-flex justify-content-center",
        }
    ],
    order: [
        [2, "desc"]
    ]
});

$('.table-responsive').css('display', 'block');
table.columns.adjust().draw();

async function showDeleteModal(id) {
    $('#delete').find(`input[name="_id"]`).val(id);
    $('#delete-modal').modal('show');
}

async function showEditModal(id) {
    $('#put').find(`input[name="_id"]`).val(id);
    $.ajax({
        url: `http://127.0.0.1:8000/api/produk/sub-kategori/${id}/edit`,
        mehtod: 'GET',
        success: function (data) {
            $('#put').find('input[name="name"]').val(data.data.name);
            select2Handler(data);
            $('#edit-modal').modal('show');
        },
        error: function (err) {
            toastr.error(err.responseJSON.message, 'Failed !');
        }
    })
}

async function select2Handler(data) {
    const selected = data.category.selected;
    const notSelected = data.category.notSelected;
    let option = function (id, name, selected = '') {
        return `<option value="${id}" ${selected}>${name}</option>`;
    }
    selected.forEach(opt => {
        $('#category-u').append(option(opt.id, opt.name, 'selected'))
    });
    notSelected.forEach(opt => {
        $('#category-u').append(option(opt.id, opt.name))
    });
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
            formatForm(formID, methods);
            table.ajax.reload();
            toastr.success(data.message, 'Sukses !');
        },
        error: function (err) {
            loadingButton(false, methods)
                (methods !== 'DELETE') ?
                findError(err.responseJSON.errors, methods) :
                false;
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

    $('small').html('');
    $('.form-control').removeClass('is-invalid');
    $('.select2-selection--multiple').removeClass('is-invalid');

    for (const [key, value] of Object.entries(err)) {
        if (key === "name") {
            $(`input[name="${key}"]`).addClass('is-invalid');
        }
        if (key === "category") {
            $('.select2-selection--multiple').addClass('is-invalid');
        }
        $(`#error-${key}-${prefixMeth}`).html(value);
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
        'http://127.0.0.1:8000/_admin/produk/sub-kategori',
        'POST', {
            name: formData.get('name'),
            category: formData.getAll('category'),
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
        `http://127.0.0.1:8000/_admin/produk/sub-kategori/${id}`,
        'PUT', {
            name: formData.get('name'),
            category: formData.getAll('category'),
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
        `http://127.0.0.1:8000/_admin/produk/sub-kategori/${id}`,
        'DELETE',
        null,
        form
    );
});

$('.modal').on('hidden.bs.modal', function () {
    $('input').removeClass('is-invalid')
    $('select').val(null).trigger('change');
    $('.select2-selection--multiple').removeClass('is-invalid');
    $('form').trigger('reset');
    $('input').val();
    $('small').html('');
    $('#category-u').find('option').remove();
});

$('select').select2({
    theme: "bootstrap"
});
