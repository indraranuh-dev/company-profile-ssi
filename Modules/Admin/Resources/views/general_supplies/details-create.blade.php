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
        <li class="breadcrumb-item">
            <a href="{{route('admin.gs.showDescription', request()->segment(3))}}">{{__('Deskripsi')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    @if (session()->has('success'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sukses !</strong> {{session()->get('success')}}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deskripsi produk</h4>
                    <a href="{{route('admin.gs.showDescription', request()->segment(3))}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">

                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0">
                            <form action="{{route('admin.gs.storeDescription', request()->segment(3))}}" method="POST">
                                @csrf

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="description">{{__('Deskripsi')}}</label>
                                        <input type="text"
                                            class="form-control @error('description'){{'is-invalid'}}@enderror"
                                            name="description" id="description" value="{{old('description')}}">
                                        @error('description')<small class="text-danger">{{$message}}</small>@enderror
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
