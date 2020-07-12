@extends('layouts/master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tables</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar produk</h4>
                    <a href="{{route('admin.product.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i>Kategori
                    </a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <fieldset class="form-group">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                                            <div class="pic-wrapper rounded">
                                                <input type="file" name="image" id="image" accept="image/*"
                                                    title="Pilih gambar">
                                                <span id="add-pic"><i class="mdi mdi-plus"></i></span>
                                                ​<picture>
                                                    <img src="" id="preview">
                                                </picture>
                                            </div>
                                            @error('image')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12 col-sm-12 mb-3 mb-lg-0 mb-md-0 ">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-leaf"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('name'){{'is-invalid'}}@enderror"
                                                    name="name" id="name" placeholder="Nama produk"
                                                    value="{{old('name')}}">
                                            </div>
                                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-filter"></i>
                                                    </span>
                                                </div>
                                                <select
                                                    class="form-control @error('subcategory'){{'is-invalid'}}@enderror"
                                                    name="subcategory">
                                                    <option value="" disabled selected>Pilih sub kategori</option>
                                                    @foreach ($subCategories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('subcategory')<small
                                                class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <textarea class="form-control @error('description'){{'is-invalid'}}@enderror"
                                            name="description" id="description"
                                            placeholder="Deskripsi produk">{{old('description')}}</textarea>
                                        @error('description')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </fieldset>

                                <fieldset class="form-group row">
                                    <div class="col-12">
                                        <textarea class="form-control @error('spesification'){{'is-invalid'}}@enderror"
                                            name="spesification" id="spesification"
                                            placeholder="Spesifikasi produk">{{old('spesification')}}</textarea>
                                        @error('spesification')<small class="text-danger">{{$message}}</small>@enderror
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

    <x-footer />

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/toastr/build/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2-bootstrap.min.css')}}">
<style>
    textarea {
        height: 100px;
        resize: none
    }

    .input-group {
        flex-wrap: unset
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('libs/toastr/toastr.js')}}"></script>
<script src="{{Module::asset('admin:js/produk/tambah/app.js')}}"></script>
<script>
    if($('select[name=subcategory]').hasClass('is-invalid')) $('.select2-selection').addClass('border-danger');
</script>
@endpush
