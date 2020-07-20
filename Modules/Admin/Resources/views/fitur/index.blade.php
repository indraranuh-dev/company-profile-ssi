@php
use App\Utilities\Converter;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Semua Fitur">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{__('Semua Fitur')}}</li>
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
                    <h4 class="card-title">Daftar fitur</h4>
                    <a href="{{route('admin.features.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i>Fitur
                    </a>
                </div>
                <div class="card-body">
                    <form id="filter">
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 col-sm-12 ml-auto">
                                <label for="kategori">Filter kategori</label>
                                <select name="kategori" class="form-control form-control-sm"
                                    onchange="$('#filter').submit()">
                                    <option value="all">Semua kategori</option>
                                    @foreach ($categories as $category)
                                    @if (request()->kategori === $category->slug_name)
                                    <option value="{{$category->slug_name}}" selected>{{$category->name}}</option>
                                    @endif
                                    <option value="{{$category->slug_name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">
                                    <img height="50px" width="50px"
                                        src="{{route('admin.features.icon', $feature->icon)}}" alt="">
                                </td>
                                <td>{{$feature->name}}</td>
                                <td>
                                    <span class="badge badge-info">{{$feature->category->name}}</span>
                                </td>
                                <td>{{$feature->description}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.features.edit', Generator::crypt($feature->id, 'encrypt'))}}"
                                        class="btn btn-outline-light text-secondary btn-sm" title="Ubah data">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-outline-light text-secondary btn-sm"
                                        title="Hapus data"
                                        onclick="deleteConfirmation('{{Generator::crypt($feature->id, 'encrypt')}}')">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row px-5">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                Showing 1 - {{$features->perPage()}} of {{$features->total()}}
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 text-center text-lg-center">
                                {{$features->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-modal headerBg="danger" modalId="confirm-modal" title="Hapus fitur">
    <div class="card-body">
        Anda yakin akan menghapus data ini ?
    </div>
    <div class="card-footer b-0 d-flex justify-content-end">
        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">
            <i style="font-size: 10px;" class="ti-close mr-2"></i>Batal
        </button>
        <form action="" method="POST" id="delete">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
                <i class="ti-trash mr-2"></i>Hapus
            </button>
        </form>
    </div>
</x-modal>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')
<script src="{{asset('libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('libs/datatables/buttons/buttons.flash.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/pdfmake.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/vfs_fonts.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/jszip.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.html5.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.print.js')}}"></script>
<script src="{{Module::asset('admin:ts/feature/app.ts')}}"></script>
@endpush
