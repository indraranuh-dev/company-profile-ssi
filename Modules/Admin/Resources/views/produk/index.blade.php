@php
use App\Utilities\Converter;
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
                    <a href="{{route('admin.product.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i>Produk
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-12 mb-3 mb-lg-0">
                            <div class="row">
                                <div class="col-12">
                                    <figure>
                                        <figcaption>
                                            <h3 class="card-title">
                                                <span class="text-info">{{$product->suppliers[0]->name}}</span>
                                                {{$product->name}}
                                            </h3>
                                            <h5 class="text-muted">{{$product->series}}</h5>
                                        </figcaption>
                                        <a href="{{route('admin.product.show', $product->slug_name)}}">
                                            <div class="img-wrapper">
                                                <img class="img-thumbnail img-fluid"
                                                    src="{{route('admin.product.image', $product->product_image)}}"
                                                    alt="product-image">
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group">
                                        <a href="{{route('admin.product.show', $product->slug_name)}}"
                                            class="btn btn-light" title="Detail produk">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.product.edit', Generator::crypt($product->id, 'encrypt'))}}"
                                            class="btn btn-light" title="Ubah produk">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-light" type="button" title="Hapus produk"
                                            onclick="deleteConfirmation('{{Generator::crypt($product->id, 'encrypt')}}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

    <x-modal headerBg="danger" modalId="confirm-modal" title="Hapus supplier">
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

</div>
@endsection

@push('styles')
<style>
    .img-wrapper {
        max-height: 160px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
    $('button').tooltip();
    $('a').tooltip();
    async function deleteConfirmation(id) {
        $("#confirm-modal").modal("show");
        $("#delete").attr("action", `http://127.0.0.1:8000/_admin/produk/${id}`);
    }
</script>
@endpush
