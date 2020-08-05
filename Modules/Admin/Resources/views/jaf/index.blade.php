@php
use App\Utilities\Converter as C;
use App\Utilities\Generator as G;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Japan Air Filter</li>
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
                    <h4 class="card-title">Daftar produk</h4>
                    <a href="{{route('admin.jaf.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i>Produk
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Series</th>
                                <th>Kategori</th>
                                <th>Dibuat Pada</th>
                                <th>Diubah Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->series}}</td>
                                <td>
                                    @foreach ($product->category as $cat)
                                    <span class="badge badge-info">{{$cat->name}}</span>
                                    @endforeach
                                </td>
                                <td>{{C::convertDate($product->created_at)}}</td>
                                <td>{{C::convertDate($product->updated_at)}}</td>
                                <td class="text-center d-flex justify-content-center">
                                    <button type="button" class="btn btn-outline-light text-secondary btn-sm"
                                        title="Detail data" onclick="showDetails('{{$product->slug_name}}')">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                    <a href="{{route('admin.jaf.edit', G::crypt($product->id, 'encrypt'))}}"
                                        class="btn btn-outline-light text-secondary btn-sm" title="Ubah data">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-outline-light text-secondary btn-sm"
                                        title="Hapus data"
                                        onclick="deleteConfirmation('{{G::crypt($product->id, 'encrypt')}}')">
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

    <x-modal headerBg="danger" modalId="confirm-modal" title="Hapus produk">
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

    <!-- Modal -->
    <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border-0" style="min-height: 80px">
                    <div class="centered">
                        <svg class="spinner" viewBox="0 0 50 50">
                            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                        </svg>
                    </div>
                    <div class="" id="detail-content">
                        <div class="row">
                            <div class="col-5 text-center">
                                <img src="" class="img-fluid" style="height:auto">
                            </div>
                            <div class="col-7">
                                <div class="header"></div>
                                <div class="tags mb-2"></div>
                                <ul class="list"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0"></div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<style>
    .img-wrapper {
        max-height: 160px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .centered {
        display: flex;
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        -webkit-animation: rotate 2s linear infinite;
        animation: rotate 2s linear infinite;
        z-index: 2;
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -25px 0 0 -25px;
        width: 50px;
        height: 50px;
    }

    .spinner .path {
        stroke: #7460ee;
        stroke-linecap: round;
        -webkit-animation: dash 1.5s ease-in-out infinite;
        animation: dash 1.5s ease-in-out infinite;
    }

    @-webkit-keyframes rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes dash {
        0% {
            stroke-dasharray: 1, 150;
            stroke-dashoffset: 0;
        }

        50% {
            stroke-dasharray: 90, 150;
            stroke-dashoffset: -35;
        }

        100% {
            stroke-dasharray: 90, 150;
            stroke-dashoffset: -124;
        }
    }

    @keyframes dash {
        0% {
            stroke-dasharray: 1, 150;
            stroke-dashoffset: 0;
        }

        50% {
            stroke-dasharray: 90, 150;
            stroke-dashoffset: -35;
        }

        100% {
            stroke-dasharray: 90, 150;
            stroke-dashoffset: -124;
        }
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js">
</script>
<script src="{{asset('libs/datatables/buttons/buttons.flash.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/pdfmake.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/vfs_fonts.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/jszip.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.html5.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.print.js')}}"></script>
<script src="{{Module::asset('admin:ts/jaf/app.ts')}}"></script>
@endpush
