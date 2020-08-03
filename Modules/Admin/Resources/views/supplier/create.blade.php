@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Supplier">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.supplier.index')}}">{{__('Supplier')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah supplier</h4>
                    <a href="{{route('admin.supplier.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form action="{{route('admin.supplier.store')}}" method="POST">
                                @csrf

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Nama supplier')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{old('name')}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="category">{{__('Kategori')}}</label>
                                        <select name="category"
                                            class="form-control @error('category'){{'is-invalid'}}@enderror">
                                            <option value="" disabled selected>Pilih kategori</option>
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
                                        <label for="name">
                                            {{__('Sub kategori')}}
                                            <small id="helpId" class="text-muted">(Boleh kosong)</small>
                                        </label>
                                        <select name="subCategory[]" multiple
                                            class="form-control @error('subCategory'){{'is-invalid'}}@enderror">
                                            @foreach ($subCategories as $subCategory)
                                            <option value="{{Generator::crypt($subCategory->id, 'encrypt')}}">
                                                {{$subCategory->name}}
                                            </option>
                                            @endforeach
                                        </select>
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
    if($('select').hasClass('is-invalid')){
        $('.select2-selection--multiple').addClass('is-invalid');
    }
</script>
@endpush
