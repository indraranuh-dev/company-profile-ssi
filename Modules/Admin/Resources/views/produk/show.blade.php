@php
use App\Utilities\Generator;
@endphp

@extends('layouts/master')

@section('content')
<x-breadcrumb title="Produk">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.index')}}"><i class="ti-home"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.product.index')}}">{{__('Produk')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail produk</h4>
                    <a href="{{route('admin.product.index')}}" class="btn btn-primary">
                        <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-12 mb-3 mb-lg-0">
                            <figure>
                                <img src="{{route('admin.product.image', $product->product_image)}}" class="img-fluid"
                                    alt="">
                            </figure>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 py-3">
                            <div class="d-flex flex-column h-100">
                                <h3 class="card-title mt-3">
                                    <span class="text-info">{{$product->suppliers[0]->name}}</span> -
                                    {{$product->name}}
                                </h3>
                                <h5 class="text-muted">{{$product->series}}</h5>
                                <p class="card-text">
                                    {{$product->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        @foreach ($featureCategories as $category)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-3">{{$category->name}}</h3>
                                    <div class="row">
                                        @foreach ($product->features as $feature)
                                        @if ($category->id === $feature->category->id)
                                        <div class="col-6 col-lg-4 col-md-4 text-center py-3">
                                            <a href="javascript:void(0)"
                                                onclick="fetchDescription('{{$feature->slug_name}}')">
                                                <img src="{{route('admin.features.icon', $feature->icon)}}" alt=""
                                                    height="60px">
                                            </a>
                                            <h5 class="card-title my-2 text-muted">{{$feature->name}}</h5>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 col-md-8 text-center">
                            <h3 class="card-title">Spesifikasi</h3>
                            <img src="{{route('admin.product.image', $product->spesification)}}"
                                alt="{{$product->spesification}}" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="spinner" role="status">
                            <svg viewBox="0 0 100 100">
                                <defs>
                                    <filter id="shadow">
                                        <feDropShadow dx="0" dy="0" stdDeviation="1.5" flood-color="#fc6767" />
                                    </filter>
                                </defs>
                                <circle id="spinner"
                                    style="fill:transparent;stroke:#fc6767;stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);"
                                    cx="50" cy="50" r="45" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text row">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2-bootstrap.min.css')}}">
<style>
    img {
        transition: .3s all;
    }

    img:hover {
        transform: scale(1.05)
    }

    .spinner {
        text-align: center;
    }

    .spinner svg {
        height: 50px;
    }

    @keyframes animation {
        0% {
            stroke-dasharray: 1 98;
            stroke-dashoffset: -105;
        }

        50% {
            stroke-dasharray: 80 10;
            stroke-dashoffset: -160;
        }

        100% {
            stroke-dasharray: 1 98;
            stroke-dashoffset: -300;
        }
    }

    #spinner {
        transform-origin: center;
        animation-name: animation;
        animation-duration: 1.2s;
        animation-timing-function: cubic-bezier;
        animation-iteration-count: infinite;
    }
</style>
@endpush

@push('scripts')
<script>
    async function fetchDescription(slug){
        $('#detail').modal('show');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `http://127.0.0.1:8000/_admin/fitur/${slug}/detail`,
            method: 'GET',
            success: function (data){
                const icon = function (icon){
                    return `<img src="http://127.0.0.1:8000/_admin/fitur/icon/${icon}" alt="" width="100%">`;
                }
                const render = function (imgTag, desc){
                    return `<div class="row"><div class="col-4">${imgTag}</div><div class="col-8">${desc}</div></div>`;
                }
                $('#detail').find('.spinner').hide();
                $('#detail').find('.modal-title').html(data.name);
                $('#detail').find('.text').html(render(icon(data.icon), data.description)).fadeIn();
            }
        });
    }
    $('#detail').on('hidden.bs.modal', function (e) {
        $('#detail').find('.spinner').show();
        $('#detail').find('.modal-title').html('');
        $('#detail').find('.text').html('');
    })
</script>
@endpush
