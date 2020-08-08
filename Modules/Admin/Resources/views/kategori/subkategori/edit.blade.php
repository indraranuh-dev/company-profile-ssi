@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Sub Kategori Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.category.index')}}">{{__('kategori')}}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.category.subcategory.index')}}">{{__('Kategori Produk')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Ubah')}}</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('Ubah sub kategori Produk')}}</h4>
                    <a href="{{route('admin.category.subcategory.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form
                                action="{{route('admin.category.subcategory.update', Generator::crypt($subCategory->id, 'encrypt'))}}"
                                method="POST">
                                @csrf
                                @method('put')

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Nama sub kategori produk')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{$subCategory->name}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="category">{{__('Kategori produk')}}</label>
                                        <select name="category[]" multiple
                                            class="form-control @error('category'){{'is-invalid'}}@enderror">
                                            @foreach ($selects['selected'] as $category)
                                            <option value="{{Generator::crypt($category['id'], 'encrypt')}}" selected>
                                                {{$category['name']}}
                                            </option>
                                            @endforeach
                                            @foreach ($selects['notSelected'] as $category)
                                            <option value="{{Generator::crypt($category['id'], 'encrypt')}}">
                                                {{$category['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category')<small class="text-danger">{{$message}}</small>@enderror
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
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2-bootstrap.min.css')}}">
@endpush

@push('scripts')
<script src="{{asset('libs/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $('select').select2({
        theme: 'bootstrap'
    })
</script>
@endpush
