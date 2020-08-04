@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Kategori">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.jaf.index')}}">{{__('Japan Air Filter')}}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.jaf-category.index')}}">{{__('Kategori')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah kategori</h4>
                    <a href="{{route('admin.jaf-category.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form
                                action="{{route('admin.jaf-category.update', Generator::crypt($category->id, 'encrypt'))}}"
                                method="POST">
                                @csrf
                                @method('put')

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Kategori')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{$category->name}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
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
