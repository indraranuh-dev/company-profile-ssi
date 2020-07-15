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
                <div class="card-body my-gallery" itemscope="" itemtype="http://schema.org/ImageGallery"
                    data-pswp-uid="1">
                    <div class="row">

                        @foreach ($products as $product)
                        <figure class="col-lg-3 col-md-6 col-12 text-center">
                            <div class="card-body text-left pl-0">
                                <h3>{{$product->name}}</h3>
                                <h5 class="text-muted">{{$product->series}}</h5>

                            </div>
                            <a href="{{route('admin.product.image', $product->product_image)}}" itemprop="contentUrl"
                                data-size="480x360">
                                <div class="btn-group" data-toggle="buttons">
                                    <a href="{{route('admin.product.edit', $product->slug_name)}}" class="btn btn-light"
                                        title="Detail data">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.product.edit', Generator::crypt($product->id, 'encrypt'))}}"
                                        class="btn btn-light" title="Ubah data">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form
                                        action="{{route('admin.product.destroy', Generator::crypt($product->id, 'encrypt'))}}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-light" title="Hapus data">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <img class="img-thumbnail img-fluid"
                                    src="{{route('admin.product.image', $product->product_image)}}"
                                    style="max-height: 174px" itemprop="thumbnail" alt="Image">
                            </a>
                        </figure>
                        @endforeach

                    </div>
                </div>

            </div>

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
<link rel="stylesheet" href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/build/toastr.min.css')}}">
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
<script src="{{Module::asset('admin:ts/product/type/app.ts')}}"></script>
@endpush
