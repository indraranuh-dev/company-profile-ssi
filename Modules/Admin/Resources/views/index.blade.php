@php
use App\Utilities\Converter;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Dashboard">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="text-muted"><i class="ti-home"></i> Dashboard</a>
        </li>
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
                <div class="card-body">
                    <div class="row justify-content-around">

                        <div class="col-12 col-lg-3 col-md-4">
                            <div class="card">
                                <div class="row box bg-danger text-center" style="height: 100px">
                                    <div class="col-2 align-self-center">
                                        <h1 class="font-light text-white d-flex m-0"><i class="ti-pulse"></i></h1>
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <h5 class="text-left text-white">Pengunjung / Hari</h5>
                                        <h4 class="text-left text-white">{{$visitors['perDay']}} Orang</h4>
                                        {{-- <h4 class="text-white">50.000 Orang</h4> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 col-md-4">
                            <div class="card">
                                <div class="row box bg-info text-center" style="height: 100px">
                                    <div class="col-2 align-self-center">
                                        <h1 class="font-light text-white d-flex m-0"><i class="ti-pulse"></i></h1>
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <h5 class="text-left text-white">Pengunjung / Bulan</h5>
                                        <h4 class="text-left text-white">{{$visitors['perMonth']}} Orang</h4>
                                        {{-- <h4 class="text-white">50.000 Orang</h4> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 col-md-4">
                            <div class="card">
                                <div class="row box bg-success text-center" style="height: 100px">
                                    <div class="col-2 align-self-center">
                                        <h1 class="font-light text-white d-flex m-0"><i class="ti-pulse"></i></h1>
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <h5 class="text-left text-white">Pengunjung / Tahun</h5>
                                        <h4 class="text-left text-white">{{$visitors['all']}} Orang</h4>
                                        {{-- <h4 class="text-white">50.000 Orang</h4> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
