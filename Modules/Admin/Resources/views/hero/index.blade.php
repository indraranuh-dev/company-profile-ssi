@php
use App\Utilities\Converter as C;
use App\Utilities\Generator as G;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Banner">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Banner</li>
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
                    <h4 class="card-title">Daftar banner</h4>
                    <a href="{{route('admin.banner.create')}}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i>Banner
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Dibuat Pada</th>
                                <th>Diubah Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{route('admin.banner.image', $banner->image)}}" width="300px"
                                        alt="banner-image">
                                </td>
                                <td>{{C::convertDate($banner->created_at)}}</td>
                                <td>{{C::convertDate($banner->updated_at)}}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-outline-light text-secondary btn-sm"
                                        title="Hapus data"
                                        onclick="deleteConfirmation('{{G::crypt($banner->id, 'encrypt')}}')">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal headerBg="danger" modalId="confirm-modal" title="Hapus banner">
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
                    <i class="ti-trash mr-2"></i>Delete
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
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js">
</script>
<script src="{{asset('libs/datatables/buttons/buttons.flash.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/pdfmake.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/vfs_fonts.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/jszip.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.html5.js')}}"></script>
<script src="{{asset('libs/datatables/buttons/buttons.print.js')}}"></script>
<script src="{{Module::asset('admin:ts/banner/app.ts')}}"></script>
@endpush
