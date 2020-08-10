@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.gs.index')}}">{{__('General Supplies')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Deskripsi</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    @if (session()->has('success'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sukses !</strong> {{session()->get('success')}}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deskripsi produk</h4>
                    <div class="btn-group">
                        <a href="{{route('admin.gs.edit', request()->segment(3))}}" class="btn btn-primary">
                            <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                        </a>
                        <a href="{{route('admin.gs.createDescription', request()->segment(3))}}" class="btn btn-danger"
                            title="Tambah deskripsi">
                            <i class="mdi mdi-plus mr-2"></i>Deskripsi
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row justify-content-center">

                        <div class="col-lg-8 col-md-8 col-sm-12 mb-3 mb-lg-0">

                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="repeater" data-list="description">

                                            @foreach ($details as $detail)
                                            <fieldset class="form-group" data-item>
                                                <form
                                                    action="{{route('admin.gs.updateDescription', G::crypt($detail->id, 'encrypt'))}}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="description"
                                                                value="{{$detail->description}}" disabled>
                                                        </div>
                                                        <div class="col-3 d-flex align-items-center">
                                                            <button type="button" class="btn btn-outline-default"
                                                                onclick="showElement(this)" title="Ubah Deskripsi"
                                                                data-form-edit>
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-default d-none"
                                                                onclick="cancel(this)" title="Batalkan perubahan"
                                                                data-form-cancel>
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-default"
                                                                title="Hapus Deskripsi"
                                                                onclick="deleteConfirmation('{{G::crypt($detail->id)}}');"
                                                                data-form-delete>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            <button class="btn btn-outline-default d-none"
                                                                title="Simpan perubahan" data-form-save>
                                                                <i class="fa fa-save"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </fieldset>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-modal headerBg="danger" modalId="confirm-modal" title="Hapus deskripsi">
    <div class="card-body">
        Anda yakin akan menghapus data ini ?
    </div>
    <div class="card-footer b-0 d-flex justify-content-end">
        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">
            <i style="font-size: 10px;" class="ti-close mr-2"></i>Batal
        </button>
        <form action="" method="POST" id="delete">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
                <i class="ti-trash mr-2"></i>Delete
            </button>
        </form>
    </div>
</x-modal>
@endsection

@push('scripts')
<script>
    async function deleteConfirmation(id) {
        $("#confirm-modal").modal("show");
        $("#delete").attr(
            "action",
            `http://127.0.0.1:8000/_admin/general-supplies/${id}/deskripsi`
        );
    }

    function showElement(elm){
        $(elm).parent().parent().find('input[name="description"]').prop('disabled', false);
        $(elm).addClass('d-none');
        $(elm).parent().parent().find('[data-form-delete]').addClass('d-none');
        $(elm).parent().parent().find('[data-form-cancel]').removeClass('d-none');
        $(elm).parent().parent().find('[data-form-save]').removeClass('d-none');
    }
    function cancel(elm){
        $(elm).parent().parent().find('input[name="description"]').prop('disabled', true);
        $(elm).parent().parent().find('[data-form-edit]').removeClass('d-none');
        $(elm).parent().parent().find('[data-form-delete]').removeClass('d-none');
        $(elm).addClass('d-none');
        $(elm).parent().parent().find('[data-form-save]').addClass('d-none');
    }
    $('[title]').tooltip();
</script>
@endpush
