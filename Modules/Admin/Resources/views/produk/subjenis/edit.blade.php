@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Sub Jenis Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.product.index')}}">{{__('Produk')}}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.prod.subtype.index')}}">{{__('Jenis Produk')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Ubah')}}</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('Ubah sub jenis Produk')}}</h4>
                    <a href="{{route('admin.prod.subtype.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form
                                action="{{route('admin.prod.subtype.update', Generator::crypt($subType->id, 'encrypt'))}}"
                                method="POST">
                                @csrf
                                @method('put')

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Nama sub jenis produk')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{$subType->name}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="type">{{__('Jenis produk')}}</label>
                                        <select name="type[]" multiple
                                            class="form-control @error('type'){{'is-invalid'}}@enderror">
                                            @foreach ($selects['selected'] as $type)
                                            <option value="{{Generator::crypt($type['id'], 'encrypt')}}" selected>
                                                {{$type['name']}}
                                            </option>
                                            @endforeach
                                            @foreach ($selects['notSelected'] as $type)
                                            <option value="{{Generator::crypt($type['id'], 'encrypt')}}">
                                                {{$type['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('type')<small class="text-danger">{{$message}}</small>@enderror
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
