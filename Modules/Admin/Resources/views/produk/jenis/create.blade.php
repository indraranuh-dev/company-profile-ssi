@extends('layouts/master')

@section('content')
<x-breadcrumb>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.product.index')}}">{{__('Produk')}}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.prod.type.index')}}">{{__('Jenis Produk')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah jenis produk</h4>
                    <a href="{{route('admin.prod.type.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form action="{{route('admin.prod.type.store')}}" method="POST">
                                @csrf

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Jenis produk')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" placeholder="Nama jenis produk"
                                            value="{{old('name')}}">
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
