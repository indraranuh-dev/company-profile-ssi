@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header row my-3">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">DataTables</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Supplier</h3>
        </div>

    </div>
    <div class="content-body">
        <section>

            @if (session()->has('success'))
            <x-alert type="success">
                <strong>Sukses !</strong> {{session()->get('success')}}
            </x-alert>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Daftar supplier</h4>
                            <a href="{{route('admin.supplier.create')}}" class="btn btn-primary">
                                <i class="ft-plus mr-2"></i> Supplier
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dataex-html5-export" width="99.9%"
                                        id="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Dealer</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

<x-modal headerBg="danger" modalId="delete" title="Hapus supplier">
    <div class="card-body">
        Anda yakin akan menghapus data ini ?
    </div>
    <div class="card-footer b-0 d-flex justify-content-end">
        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">
            <i class="ft-x mr-2"></i>Batal
        </button>
        <form action="" method="POST" id="form-delete">
            @csrf
            @method('delete')
            <button class="btn btn-danger"><i class="ft-trash mr-2"></i>Delete</button>
        </form>
    </div>
</x-modal>

@endsection

@push('styles')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="{{mix('css/main/datatables.min.css')}}">
@endpush

@push('scripts')
<script src="{{mix('js/main/stack.js')}}"></script>
<script src="{{mix('js/main/dt-buttons/buttons.flash.js')}}"></script>
<script src="{{mix('js/main/dt-buttons/pdfmake.js')}}"></script>
<script src="{{mix('js/main/dt-buttons/vfs_fonts.js')}}"></script>
<script src="{{mix('js/main/dt-buttons/jszip.js')}}"></script>
<script src="{{mix('js/main/dt-buttons/buttons.html5.js')}}"></script>
<script src="{{mix('js/main/dt-buttons/buttons.print.js')}}"></script>
<script type="text/javascript">
    $("#table").DataTable({
        dom: `<'row'<'col-sm-6 mb-3'B>
                <'col-sm-6'f>><'row'<'col-12' t>><'row'<'d-flex justify-content-start w-50' i>
                <'d-flex justify-content-end w-50'p>>`,
        buttons: [{
                extend: 'copy',
                text: '<i class="fa fa-fw fa-copy"></i>',
                attr: {
                    title: 'Copy',
                    class: 'btn btn-outline-primary btn-sm',
                }
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-fw fa-file-excel-o"></i>',
                attr: {
                    title: 'Export as Excell',
                    class: 'btn btn-outline-primary btn-sm',
                }
            },
            {
                extend: 'pdfHtml5',
                download: 'open',
                text: '<i class="fa fa-fw fa-file-pdf-o"></i>',
                attr: {
                    title: 'Export as PDF',
                    class: 'btn btn-outline-primary btn-sm',
                }
            },
            {
                extend: 'print',
                text: '<i class="fa fa-fw fa-print"></i>',
                attr: {
                    title: 'Print',
                    class: 'btn btn-outline-primary btn-sm',
                }
            },
        ],
        processing: true,
        serverSide: true,
        ajax: "http://127.0.0.1:8000/api/supplier",
        columns: [
            { data: "name" },
            { data: "address" },
            { data: "email" },
            { data: "phone" },
            { data: "dealer_contact" },
            { data: "action" }
        ],
        columnDefs: [{ className: "d-flex justify-content-center", targets: [5] }]
    });
    async function showDeleteModal(secret){
        $('#form-delete').attr('action', `http://127.0.0.1:8000/_admin/supplier/${secret}`);
    }
</script>
@endpush
