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
                        <a href="{{route('admin.gs.index')}}" class="btn btn-primary">
                            <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                        </a>
                        <a href="{{route('admin.gs.showImage',$product->slug_name)}}" class="btn btn-danger"
                            title="Ubah gambar">
                            <i class="fa fa-edit mr-2"></i>Gambar
                        </a>
                        <a href="{{route('admin.gs.showDescription',$product->slug_name)}}" class="btn btn-danger"
                            title="Ubah deskripsi">
                            <i class="fa fa-edit mr-2"></i>Deskripsi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.gs.update', $product->slug_name)}}" method="POST">
                        @method('put')
                        @csrf

                        <input type="hidden" name="_id" value="{{G::crypt($product->id, 'encrypt')}}">
                        <div class="row justify-content-center">

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

                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6 mb-3 mb-lg-0">
                                        <fieldset class="form-group">
                                            <label for="supplier">{{__('Vendor')}}</label>
                                            <select name="supplier"
                                                class="form-control @error('supplier'){{'is-invalid'}}@enderror">
                                                <option value="" disabled>Pilih vendor</option>
                                                @foreach ($suppliers as $supplier)
                                                @if ($supplier->id === $product->supplier_id)
                                                <option value="{{G::crypt($supplier->id, 'encrypt')}}" selected>
                                                    {{$supplier->name}}
                                                </option>
                                                @else
                                                <option value="{{G::crypt($supplier->id, 'encrypt')}}">
                                                    {{$supplier->name}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('supplier')<small class="text-danger">{{$message}}</small>@enderror
                                        </fieldset>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <fieldset>
                                            <label for="category">{{__('Kategori produk')}}</label>
                                            <select name="category"
                                                class="form-control @error('category'){{'is-invalid'}}@enderror">
                                                <option value="" disabled
                                                    {{(count($SC['selected']) === 0) ? 'selected' : ''}}>Pilih kategori
                                                </option>
                                                @foreach ($SC['selected'] as $category)
                                                <option value="{{G::crypt($category['id'])}}" selected>
                                                    {{$category['name']}}
                                                </option>
                                                @endforeach
                                                @foreach ($SC['notSelected'] as $category)
                                                <option value="{{G::crypt($category['id'])}}">{{$category['name']}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category')<small class="text-danger">{{$message}}</small>@enderror
                                        </fieldset>
                                    </div>
                                </div>


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
