@extends('layouts/master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tables</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar produk</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#main-modal">
                        <i class="mdi mdi-plus mr-2"></i>Kategori
                    </button>
                </div>
                <div class="card-body">
                    <x-filter title="Filter produk">
                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <select name="kategori" id="" class="form-control">
                                        <option value="all" selected>Semua kategori</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->slug_name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <select name="sub-kategori" id="" class="form-control">
                                        <option value="all" selected>Semua sub kategori</option>
                                        @foreach ($subCategories as $category)
                                        <option value="{{$category->slug_name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-1 col-md-12 col-sm-12">
                                <button class="btn btn-outline-info w-100">
                                    <i class="mdi mdi-magnify mr-1"></i> Cari
                                </button>
                            </div>
                        </div>
                    </x-filter>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Nama</th>
                                    <th>Sub kategori</th>
                                    <th>Kategori</th>
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


{{-- Modal tambah kategori --}}
<x-modal headerBg="secondary" modalId="main-modal" title="Tambah kategori">
    <form id="post">
        <div class="modal-body">
            <input type="hidden" name="_id">
            <x-input-group icon="filter">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama kategori">
                @slot('error')
                <small id="error-name-c" class="text-danger"></small>
                @endslot
            </x-input-group>
            <fieldset class="form-group row">
                <div class="col-12">
                    <label for="" class="col-form-label">Pilih sub kategori</label>
                    <select class="custom-select" name="category" multiple>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <small id="error-category-c" class="text-danger"></small>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer b-0">
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                <i style="font-size: 10px;" class="ti-close mr-2"></i>Batal
            </button>
            <button type="button" id="save-c" class="btn btn-success">
                <i class="fa fa-save fa-fw mr-2"></i>Simpan
            </button>
        </div>
    </form>
</x-modal>

{{-- Modal ubah kategori --}}
<x-modal headerBg="secondary" modalId="edit-modal" title="Ubah kategori">
    <form id="put">
        <div class="modal-body">
            <input type="hidden" name="_id">
            <x-input-group icon="filter">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama kategori">
                @slot('error')
                <small id="error-name-u" class="text-danger"></small>
                @endslot
            </x-input-group>
            <fieldset class="form-group row">
                <div class="col-12">
                    <label for="" class="col-form-label">Pilih kategori</label>
                    <select class="form-control" name="category" id="category-u" multiple></select>
                    <small id="error-category-u" class="text-danger"></small>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer b-0">
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                <i style="font-size: 10px;" class="ti-close mr-2"></i>Batal
            </button>
            <button type="button" id="save-u" class="btn btn-success">
                <i class="fa fa-save fa-fw mr-2"></i>Simpan
            </button>
        </div>
    </form>
</x-modal>

{{-- Modal hapus kategori --}}
<x-modal headerBg="danger" modalId="delete-modal" title="Hapus supplier">
    <div class="card-body">
        Anda yakin akan menghapus data ini ?
    </div>
    <div class="card-footer b-0 d-flex justify-content-end">
        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">
            <i style="font-size: 10px;" class="ti-close mr-2"></i>Batal
        </button>
        <form id="delete">
            <input type="hidden" name="_id">
            <button class="btn btn-danger" id="save-d">
                <i class="ti-trash mr-2"></i>Delete
            </button>
        </form>
    </div>
</x-modal>

<x-footer />

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/build/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2-bootstrap.min.css')}}">
<style>
    table {
        width: 1187px !important;
    }

    .select2-container--bootstrap {
        width: 100% !important;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('libs/toastr/toastr.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.flash.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/pdfmake.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/vfs_fonts.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/jszip.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.html5.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.print.js')}}"></script>
<script src="{{asset('libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{Module::asset('admin:js/produk/app.js')}}"></script>
@endpush
