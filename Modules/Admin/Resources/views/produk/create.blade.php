@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.product.index')}}">{{__('Produk')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah produk</h4>
                    <a href="{{route('admin.product.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="pic-container w-75 w-sm-100"></div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah
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

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Nama produk')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{old('name')}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0">
                                            <label for="supplier">{{__('Supplier (vendor)')}}</label>
                                            <select name="supplier"
                                                class="form-control @error('supplier'){{'is-invalid'}}@enderror">
                                                <option value="" disabled selected>Pilih supplier (vendor)</option>
                                                @foreach ($suppliers as $supplier)
                                                <option value="{{Generator::crypt($supplier->id, 'encrypt')}}">
                                                    {{$supplier->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('supplier')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="series">{{__('Series')}}</label>
                                            <input type="text"
                                                class="form-control @error('series'){{'is-invalid'}}@enderror"
                                                name="series" id="series" value="{{old('series')}}">
                                            @error('series')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0">
                                            <label for="type">{{__('Jenis produk')}}</label>
                                            <select name="type"
                                                class="form-control @error('type'){{'is-invalid'}}@enderror">
                                                <option value="" disabled selected>Pilih jenis produk</option>
                                                @foreach ($types as $type)
                                                <option value="{{Generator::crypt($type->id, 'encrypt')}}">
                                                    {{$type->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('type')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="subCategory">{{__('Sub kategori produk')}}</label>
                                            <select name="subCategory"
                                                class="form-control @error('subCategory'){{'is-invalid'}}@enderror">
                                                <option value="" disabled selected>Pilih kategori produk</option>
                                                @foreach ($subCategories as $subCategory)
                                                <option value="{{Generator::crypt($subCategory->id, 'encrypt')}}">
                                                    {{$subCategory->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('subCategory')<small
                                                class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="tags">{{__('Tag produk')}}</label>
                                        <select name="tags[]" id="tags" multiple
                                            class="form-control @error('tags'){{'is-invalid'}}@enderror">
                                            @foreach ($tags as $tag)
                                            <option value="{{Generator::crypt($tag->id)}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('tags')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="features">{{__('Fitur produk')}}</label>
                                        <select name="features[]" id="features" multiple
                                            class="form-control @error('features'){{'is-invalid'}}@enderror">
                                            @foreach ($featureCategories as $category)
                                            <optgroup label="{{$category->name}}">
                                                @foreach ($features as $feature)
                                                @if ($category->name === $feature->category->name)
                                                <option value="{{Generator::crypt($feature->id)}}">{{$feature->name}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                        <label class="btn btn-primary">
                                            Pilih semua fitur
                                            <input type="checkbox" name="checkAll" id="checkAll" style="mt-1">
                                        </label>
                                        @error('features')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="description">{{__('Deskripsi produk')}}</label>
                                        <textarea name="description"
                                            class="form-control
                                            @error('description'){{'is-invalid'}}@enderror">{{old('description')}}</textarea>
                                        @error('description')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="spesification"
                                                accept="image/*" onchange="readFileName(this);"
                                                title="Pilih spesifikasi">
                                            <label class="custom-file-label spesification-label" for="">Unggah
                                                spesifikasi</label>
                                        </div>
                                        @error('spesification')<small class="text-danger">{{$message}}</small>@enderror
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

    $('#checkAll').click(function () {
        if($(this).is(':checked')){
            $('#features > optgroup > option').prop("selected", true);
            $('#features').trigger("change");
        } else {
            $('#features > optgroup > option').prop("selected", false);
            $('#features').trigger("change");
        }
    })

    if($('select[name="supplier"]').hasClass('is-invalid')){
        $('select[name="supplier"]').parent().find('.select2-selection--single').addClass('is-invalid');
    }

    if($('select[name="inverter"]').hasClass('is-invalid')){
        $('select[name="inverter"]').parent().find('.select2-selection--single').addClass('is-invalid');
    }

    if($('select[name="subCategory"]').hasClass('is-invalid')){
        $('select[name="subCategory"]').parent().find('.select2-selection--single').addClass('is-invalid');
    }

    if($('select[name="type"]').hasClass('is-invalid')){
        $('select[name="type"]').parent().find('.select2-selection--single').addClass('is-invalid');
    }

    if($('select[name="tags[]"]').hasClass('is-invalid')){
        $('select[name="tags[]"]').parent().find('.select2-selection--multiple').addClass('is-invalid');
    }

    if($('select[name="features[]"]').hasClass('is-invalid')){
        $('select[name="features[]"]').find('.select2-selection--multiple').addClass('is-invalid');
    }

    async function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('.pic-container').css('background-image', `url(${e.target.result})`)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function readFileName(input){
        const fileName = input.value.substring(12);
        $('.spesification-label').text(fileName);
    }
</script>
@endpush
