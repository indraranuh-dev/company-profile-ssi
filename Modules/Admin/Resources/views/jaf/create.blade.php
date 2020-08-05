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
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah produk</h4>
                    <a href="{{route('admin.jaf.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.jaf.store')}}" method="POST" enctype="multipart/form-data">
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

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-12 ol-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0">
                                            <label for="name">{{__('Nama produk')}}</label>
                                            <input type="text"
                                                class="form-control @error('name'){{'is-invalid'}}@enderror" name="name"
                                                id="name" value="{{old('name')}}">
                                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                        <div class="col-12 ol-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0">
                                            <label for="series">{{__('Series produk')}}</label>
                                            <input type="text"
                                                class="form-control @error('series'){{'is-invalid'}}@enderror"
                                                name="series" id="series" value="{{old('series')}}">
                                            @error('series')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="category">{{__('Kategori produk')}}</label>
                                        <select name="category"
                                            class="form-control @error('category'){{'is-invalid'}}@enderror">
                                            <option value="" disabled selected>Pilih kategori</option>
                                            @foreach ($categories as $category)
                                            <option value="{{G::crypt($category->id, 'encrypt')}}">
                                                {{$category->name}}
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
                                            @foreach ($tags as $tag)
                                            <option value="{{G::crypt($tag->id, 'encrypt')}}">
                                                {{$tag->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('tags')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label> Deskripsi</label>
                                            <div class="repeater" data-list="description">

                                                @if(is_array(old('description')))
                                                @foreach (old('description') as $description)
                                                @if(count(old('description')) === 1)
                                                <div class="row mb-3" data-item>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="description[]"
                                                            value="{{$description}}">
                                                    </div>
                                                    <div class="col-2 d-flex align-items-center">
                                                        <button type="button" class="btn btn-outline-default"
                                                            data-repeat-delete onclick="destroy(this);" disabled>
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-default"
                                                            data-repeat-add onclick="add(this);">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @else
                                                @if ($loop->last)
                                                <div class="row mb-3" data-item>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="description[]"
                                                            value="{{$description}}">
                                                    </div>
                                                    <div class="col-2 d-flex align-items-center">
                                                        <button type="button" class="btn btn-outline-default"
                                                            data-repeat-delete onclick="destroy(this);">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-default"
                                                            data-repeat-add onclick="add(this);">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="row mb-3" data-item>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="description[]"
                                                            value="{{$description}}">
                                                    </div>
                                                    <div class="col-2 d-flex align-items-center">
                                                        <button type="button" class="btn btn-outline-default"
                                                            data-repeat-delete onclick="destroy(this);">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-default"
                                                            style="display:none;" data-repeat-add onclick="add(this);">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                                @endforeach
                                                @else
                                                <div class="row mb-3" data-item>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="description[]"
                                                            value="{{old('description')}}">
                                                    </div>
                                                    <div class="col-2 d-flex align-items-center">
                                                        <button type="button" class="btn btn-outline-default" disabled
                                                            data-repeat-delete onclick="destroy(this);">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-default"
                                                            data-repeat-add onclick="add(this);">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
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


    function add(elm){
        const init = $(elm).parent().parent().prev('[data-item]').length;
        repeat();
        changePropBefore(init, elm);
    }

    async function repeat(){
        const repeat = `<div class="row mb-3" data-item>
                <div class="col-10">
                    <input type="text" class="form-control" name="description[]">
                </div>
                <div class="col-2  d-flex align-items-center">
                    <button type="button" class="btn btn-outline-default"
                        data-repeat-delete onclick="destroy(this);">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button type="button" class="btn btn-outline-default"
                        data-repeat-add onclick="add(this);">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>`;
        await $('.repeater').append(repeat);
    }

    async function changePropBefore(l, elm){
        if(l===0){
            await $(elm).parent().find('[data-repeat-delete]').prop('disabled', false);
            await $(elm).hide();
        }else{
            await $(elm).parent().parent().before().find('[data-repeat-delete]').prop('disabled', false);
            await $(elm).parent().parent().before().find('[data-repeat-add]').hide();
        }
    }

    function destroy(elm){
        const prev = $(elm).parent().parent().prev('[data-item]').length;
        const next = $(elm).parent().parent().next('[data-item]').length;
        const next2 = $(elm).parent().parent().next('[data-item]').next('[data-item]').length;
        if(next === 0){
            const allItem = $(elm).parent().parent().parent().children().length;
            if(allItem <= 2 ){
                $(elm).parent().parent().prev('[data-item]').find('[data-repeat-delete]').prop('disabled', true);
                $(elm).parent().parent().prev('[data-item]').find('[data-repeat-add]').show();
                $(elm).parent().parent().remove();
            }else{
                $(elm).parent().parent().prev('[data-item]').find('[data-repeat-delete]').prop('disabled', false);
                $(elm).parent().parent().prev('[data-item]').find('[data-repeat-add]').show();
                $(elm).parent().parent().remove();
            }
        }else{
            if(next2 == 0){
                $(elm).parent().parent().next('[data-item]').find('[data-repeat-delete]').prop('disabled', true);
                $(elm).parent().parent().next('[data-item]').find('[data-repeat-add]').show();
                $(elm).parent().parent().remove();
            }
            $(elm).parent().parent().remove();
            $(elm).parent().parent().remove();
        }
    }
</script>
@endpush
