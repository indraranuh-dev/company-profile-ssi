@php
use App\Utilities\Converter;
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
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah supplier</h4>
                    <a href="{{route('admin.supplier.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form
                                action="{{route('admin.supplier.update', Generator::crypt($supplier->id, 'encrypt'))}}"
                                method="POST">
                                @csrf
                                @method('put')

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Nama supplier')}}</label>
                                        <input type="text" class="form-control @error('name'){{'is-invalid'}}@enderror"
                                            name="name" id="name" value="{{$supplier->name}}">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="category">{{__('Kategori')}}</label>
                                        <select name="category"
                                            class="form-control @error('category'){{'is-invalid'}}@enderror">
                                            <option value="" disabled selected>Pilih kategori</option>
                                            @foreach ($sc['selected'] as $selected)
                                            <option value="{{Generator::crypt($selected['id'], 'encrypt')}}" selected>
                                                {{$selected['name']}}
                                            </option>
                                            @endforeach
                                            @foreach ($sc['notSelected'] as $notSelected)
                                            <option value="{{Generator::crypt($notSelected['id'], 'encrypt')}}">
                                                {{$notSelected['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{__('Sub kategori')}}</label>
                                        <select name="subCategory[]" multiple
                                            class="form-control @error('subCategory'){{'is-invalid'}}@enderror">
                                            @foreach ($ssc['selected'] as $selected)
                                            <option value="{{Generator::crypt($selected['id'], 'encrypt')}}" selected>
                                                {{$selected['name']}}
                                            </option>
                                            @endforeach
                                            @foreach ($ssc['notSelected'] as $notSelected)
                                            <option value="{{Generator::crypt($notSelected['id'], 'encrypt')}}">
                                                {{$notSelected['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('subCategory')<small class="text-danger">{{$message}}</small>@enderror
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
