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
            <a href="{{route('admin.jaf.index')}}">{{__('Japan Air Filter')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah produk</h4>
                    <div class="btn-group">
                        <a href="{{route('admin.jaf.index')}}" class="btn btn-primary">
                            <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                        </a>
                        <a href="{{route('admin.jaf.showDescription',G::crypt($product->id, 'encrypt'))}}"
                            class="btn btn-danger" title="Ubah deskripsi">
                            <i class="fa fa-edit mr-2"></i>Deskripsi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.jaf.update', G::crypt($product->id, 'encrypt'))}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        {{-- @dump($product) --}}

                        <div class="row justify-content-center">

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="pic-container w-75 w-sm-100"
                                    style="background-image: url('{{route('admin.product.image', $product->image)}}')">
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ubah
                                        gambar
                                    </button>
                                    <div class="dropdown-menu text-center" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                        <input type="file" name="image" accept="image/*" title="Pilih icon"
                                            onchange="readURL(this)">
                                        <span>Unggah gambar <i class="mdi mdi-cloud-upload ml-2"></i></span>
                                    </div>
                                </div><br>
                                @error('image')<small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-lg-6 col-md-8 col-sm-12 mb-3 mb-lg-0">

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-12 ol-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0">
                                            <label for="name">{{__('Nama produk')}}</label>
                                            <input type="text"
                                                class="form-control @error('name'){{'is-invalid'}}@enderror" name="name"
                                                id="name" value="{{$product->name}}">
                                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                        <div class="col-12 ol-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0">
                                            <label for="series">{{__('Series produk')}}</label>
                                            <input type="text"
                                                class="form-control @error('series'){{'is-invalid'}}@enderror"
                                                name="series" id="series" value="{{$product->series}}">
                                            @error('series')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="category">{{__('Kategori produk')}}</label>
                                        <select name="category"
                                            class="form-control @error('category'){{'is-invalid'}}@enderror">
                                            <option value="" disabled
                                                {{(count($SP['selected']) === 0) ? 'selected' : ''}}>Pilih kategori
                                            </option>
                                            @foreach ($SP['selected'] as $category)
                                            <option value="{{G::crypt($category['id'])}}" selected>
                                                {{$category['name']}}
                                            </option>
                                            @endforeach
                                            @foreach ($SP['notSelected'] as $category)
                                            <option value="{{G::crypt($category['id'])}}">{{$category['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>


                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="tags">{{__('Tag produk')}}</label>
                                        <select name="tags[]" multiple
                                            class="form-control @error('tags'){{'is-invalid'}}@enderror">
                                            @foreach ($ST['selected'] as $category)
                                            <option value="{{G::crypt($category['id'])}}" selected>
                                                {{$category['name']}}
                                            </option>
                                            @endforeach
                                            @foreach ($ST['notSelected'] as $category)
                                            <option value="{{G::crypt($category['id'])}}">{{$category['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('tags')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

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
        height: 150px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        overflow: hidden;
        display: flex;
        border: 5px solid whitesmoke;
        transition: .4s all;
        border-radius: 5px;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('libs/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $('select').select2({
        theme: 'bootstrap'
    })
    if($('select').hasClass('is-invalid')){
        $('.select2-selection-single').addClass('is-invalid');
    }
    if($('select').hasClass('is-invalid')){
        $('.select2-selection-multiple').addClass('is-invalid');
    }
    $('[title]').tooltip();
    const $this = $(this);

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
