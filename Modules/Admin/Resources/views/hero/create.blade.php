@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Banner">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.banner.index')}}">{{__('Banner')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah banner</h4>
                    <a href="{{route('admin.banner.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">

                            <div class="col-12">
                                <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah
                                        gambar
                                    </button>
                                    <div class="dropdown-menu text-center" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                        <input type="file" name="image" accept="image/*" title="Pilih gambar"
                                            onchange="readURL(this)">
                                        <span>Unggah gambar <i class="mdi mdi-cloud-upload ml-2"></i></span>
                                    </div>
                                </div><br>
                                @error('image')<small class="text-danger">{{$message}}</small>@enderror
                                <div class="pic-container mb-3">
                                    <img src="" alt="" img-preview>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset class="form-group row">
                                    <div class="col-12 text-right">
                                        <button id="save" class="btn btn-success">
                                            <i class="fa fa-save fa-fw mr-2"></i>Simpan
                                        </button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2-bootstrap.min.css')}}">
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
        height: auto;
    }

    .pic-container img {
        transition: .4s all;
        height: auto;
        border-radius: 10px;
        width: 100%;
    }
</style>
@endpush

@push('scripts')
<script>
    $('[title]').tooltip();
    const $this = $(this);

    async function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('[img-preview]').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
