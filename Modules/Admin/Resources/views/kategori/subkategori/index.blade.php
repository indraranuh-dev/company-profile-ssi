@php
use App\Utilities\Converter;
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Sub Kategori Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.category.index')}}">{{__('Kategori')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Sub Kategori Produk')}}</li>
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
                    <h4 class="card-title">Daftar sub kategori produk</h4>
                    <a href="{{route('admin.category.subcategory.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i>Sub kategori produk
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kategori Produk</th>
                                <th>Dibuat pada</th>
                                <th>Diubah pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategories as $subCategory)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>
                                    @foreach ($subCategory->categories as $category)
                                    <span class="badge badge-info">{{$category->name}}</span><br>
                                    @endforeach
                                </td>
                                <td>{{Converter::convertDate($subCategory->created_at)}}</td>
                                <td>{{Converter::convertDate($subCategory->updated_at)}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.category.subcategory.edit', Generator::crypt($subCategory->id, 'encrypt'))}}"
                                        class="btn btn-outline-light text-secondary btn-sm" title="Ubah data">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-outline-light text-secondary btn-sm"
                                        title="Hapus data"
                                        onclick="deleteConfirmation('{{Generator::crypt($subCategory->id, 'encrypt')}}')">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<x-modal headerBg="danger" modalId="confirm-modal" title="Hapus sub kategori produk">
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
                <i class="ti-trash mr-2"></i>Hapus
            </button>
        </form>
    </div>
</x-modal>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/build/toastr.min.css')}}">
@endpush

@push('scripts')
<script src="{{asset('libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('libs/toastr/toastr.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('libs/datatables/buttons/buttons.flash.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/pdfmake.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/vfs_fonts.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/jszip.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.html5.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.print.js')}}"></script>
<script src="{{Module::asset('admin:ts/category/subcategory/app.ts')}}"></script>
@endpush
