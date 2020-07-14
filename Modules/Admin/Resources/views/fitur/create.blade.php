@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Fitur">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.features.index')}}">{{__('Fitur')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah fitur</h4>
                    <a href="{{route('admin.features.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.features.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="pic-container"></div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah
                                        icon
                                    </button>
                                    <div class="dropdown-menu text-center" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                        <input type="file" name="icon" accept="image/*" title="Pilih icon"
                                            onchange="readURL(this)">
                                        <span>Unggah icon <i class="mdi mdi-cloud-upload ml-2"></i></span>
                                    </div>
                                </div><br>
                                @error('icon')<small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-lg-6 col-md-8 col-sm-12 mb-3 mb-lg-0">

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Nama fitur')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{old('name')}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="category">{{__('Kategori fitur')}}</label>
                                        <select name="category"
                                            class="form-control @error('category'){{'is-invalid'}}@enderror">
                                            <option value="" disabled selected>Pilih kategori fitur</option>
                                            @foreach ($categories as $category)
                                            <option value="{{Generator::crypt($category->id, 'encrypt')}}">
                                                {{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="description">{{__('Deskripsi fitur')}}</label>
                                        <textarea name="description"
                                            class="form-control
                                            @error('description'){{'is-invalid'}}@enderror">{{old('description')}}</textarea>
                                        @error('description')<small class="text-danger">{{$message}}</small>@enderror
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
        width: 150px;
        background-image: url("../../image/icon.svg");
        background-size: cover;
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
        $('.select2-selection--single').addClass('is-invalid');
    }

    async function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // $('#preview').attr('src', e.target.result);
                $('.pic-container').css('background-image', `url(${e.target.result})`)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
