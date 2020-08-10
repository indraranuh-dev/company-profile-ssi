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
        <li class="breadcrumb-item">
            <a href="{{route('admin.gs.showImage', request()->segment(3))}}">{{__('Gambar')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                    <h4 class="card-title">Gambar produk</h4>
                    <a href="{{route('admin.gs.showImage', request()->segment(3))}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">

                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0">
                            <form action="{{route('admin.gs.storeImage', request()->segment(3))}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <fieldset class="form-group row">
                                    <div class="col-8 text-center">
                                        <div class="pic-container m-auto">

                                        </div>
                                        <div class="btn-group mb-3">
                                            <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah
                                                gambar
                                            </button>
                                            <div class="dropdown-menu text-center" x-placement="bottom-start"
                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                <input type="file" id="image" name="image" accept="image/*"
                                                    title="Pilih gambar" onchange="readURL(this)">
                                                <span>Unggah gambar <i class="mdi mdi-cloud-upload ml-2"></i></span>
                                            </div>
                                            <h5 class="mt-1 ml-2 mb-0" files-length></h5>
                                        </div><br>
                                        @error('image')<small class="text-danger">{{$message}}</small>@enderror
                                        <div class="row" pic-container>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12 text-right">
                                        <button id="save" class="btn btn-success">
                                            <i class="fa fa-save fa-fw mr-2"></i>Simpan
                                        </button>
                                    </div>
                                </fieldset>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .dropdown-menu {
        border: none;
        box-shadow: 0 0 20px 1px #0000001a;
        box-sizing: border-box;
        width: 130px;
    }

    .dropdown-menu input {
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
        position: absolute;
        left: 0;
        top: 0;
    }

    .dropdown-menu span {
        pointer-events: none;
        cursor: pointer;
    }

    input[type=file],
    input[type=file]::-webkit-file-upload-button {
        cursor: pointer;
    }

    .pic-container {
        width: 250px;
        height: 250px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        overflow: hidden;
        display: flex;
        border: 5px solid whitesmoke;
        transition: .4s all;
        border-radius: 20px;
    }
</style>
@endpush

@push('scripts')
<script>
    async function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('.pic-container').css('background-image', `url(${e.target.result})`)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
