@extends('layouts.master')

@section('content')
<div class="content-wrapper" id="app">
    <div class="content-header row my-3">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">DataTables</a></li>
                        <li class="breadcrumb-item"><a href="#">Supplier</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Supplier</h3>
        </div>

    </div>
    <div class="content-body">
        <section>

            @if (session()->has('success'))
            <x-alert type="success">
                <strong>Sukses !</strong> {{session()->get('success')}}
            </x-alert>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Tambah supplier</h4>
                            <a href="{{route('admin.supplier.index')}}" class="btn btn-primary">
                                <i style="transform: translateY(-2px)" class="ft-arrow-left mr-2"></i>Kembali
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                        <form action="{{route('admin.supplier.store')}}" method="POST" class="w-100"
                                            id="addform" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">

                                                <x-input-group icon="truck">
                                                    <input type="text"
                                                        class="form-control @error('name') {{'is-invalid'}} @enderror"
                                                        name="name" placeholder="Nama supplier" value="{{old('name')}}">

                                                    @slot('error')
                                                    @error('name')<small
                                                        class="text-danger">{{$message}}</small>@enderror
                                                    @endslot
                                                </x-input-group>

                                                <x-input-group icon="map">
                                                    <input type="text"
                                                        class="form-control @error('address') {{'is-invalid'}} @enderror"
                                                        name="address" placeholder="Alamat supplier"
                                                        value="{{old('address')}}">

                                                    @slot('error')
                                                    @error('address')<small
                                                        class="text-danger">{{$message}}</small>@enderror
                                                    @endslot
                                                </x-input-group>

                                                <x-input-group icon="at">
                                                    <input type="text"
                                                        class="form-control @error('email') {{'is-invalid'}} @enderror"
                                                        name="email" placeholder="email@supplier.com"
                                                        value="{{old('email')}}">

                                                    @slot('error')
                                                    @error('email')<small
                                                        class="text-danger">{{$message}}</small>@enderror
                                                    @endslot
                                                </x-input-group>

                                                <x-input-group icon="phone">
                                                    <input type="text"
                                                        class="form-control @error('phone') {{'is-invalid'}} @enderror"
                                                        name="phone" placeholder="Nomor telepon"
                                                        value="{{old('phone')}}">

                                                    @slot('error')
                                                    @error('phone')<small
                                                        class="text-danger">{{$message}}</small>@enderror
                                                    @endslot
                                                </x-input-group>

                                                <x-input-group icon="phone">
                                                    <input type="text"
                                                        class="form-control @error('dealer_contact') {{'is-invalid'}} @enderror"
                                                        name="dealer_contact" placeholder="Nomor telepon dealer"
                                                        value="{{old('dealer_contact')}}">

                                                    @slot('error')
                                                    @error('dealer_contact')<small
                                                        class="text-danger">{{$message}}</small>@enderror
                                                    @endslot
                                                </x-input-group>

                                                <x-input-group icon="image">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input @error('image') {{'is-invalid'}} @enderror"
                                                            name="image" id="image" value="{{old('image')}}">
                                                        <label class="custom-file-label" for="image">Pilih
                                                            gambar</label>
                                                    </div>

                                                    @slot('error')
                                                    @error('image')<small
                                                        class="text-danger">{{$message}}</small>@enderror
                                                    @endslot
                                                </x-input-group>

                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal"
                                                    onclick="$('#addform').trigger('reset')">Batal</button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-save"></i>
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{mix('js/main/stack.js')}}" defer></script>
@endpush
