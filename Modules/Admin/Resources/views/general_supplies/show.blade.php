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
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</x-breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail produk</h4>
                    <div class="btn-group">
                        <a href="{{route('admin.gs.index')}}" class="btn btn-primary">
                            <i class="mdi mdi-arrow-left mr-2"></i>Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="slider-container mx-2">
                                <div class="slider-preview" slide-preview>
                                    <div style="background-image: url({{route('admin.product.image', $product->images[0]->image)}})"
                                        image></div>
                                </div>
                                <div class="slider slider-nav" slider-nav>
                                    @foreach ($product->images as $image)
                                    <div>
                                        <img class="img-fluid" src="{{route('admin.product.image', $image->image)}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <h3 class="card-title mt-3">{{$product->name}}</h3>
                            <h5 class="text-muted">{{$product->series}}</h5>
                            <h5 class="text-muted mb-3">
                                @foreach ($product->tags as $tag)
                                <span class="badge badge-info"># {{$tag->name}}</span>
                                @endforeach
                            </h5>
                            <ul class="m-0 pl-2" style="list-style: none;">
                                @foreach ($product->details as $desc)
                                <li class="d-flex" style="text-transform: capitalize">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24">
                                        <path
                                            d="M7,5C5.897,5,5,5.897,5,7v10c0,1.103,0.897,2,2,2h10c1.103,0,2-0.897,2-2V7c0-1.103-0.897-2-2-2H7z M7,17V7h10l0.002,10H7z" />
                                        <path
                                            d="M10.996 12.556L9.7 11.285 8.3 12.715 11.004 15.362 15.703 10.711 14.297 9.289z" />
                                    </svg>
                                    {{$desc->description}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/slick/slick-theme.min.css')}}" />
<link rel="stylesheet" href="{{asset('libs/slick/slick.min.css')}}" />
<style>
    .slider-container {
        max-width: 300px;
        min-width: 200px;
        border-radius: 10px;
    }

    .slider-preview {
        height: 250px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .3s cubic-bezier(0.445, 0.05, 0.55, 0.95);
        border-bottom: 2px solid #e2e2e2;
        margin-bottom: 10px;
    }

    [image] {
        background-position: center;
        height: 95%;
        width: 95%;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }

    .slider-preview img {
        height: 130px;
    }

    .slick-slide {
        margin: 0 5px;
    }

    .slick-slide img {
        border-radius: 8px;
        box-shadow: 1px 0 5px rgba(0, 0, 0, 0.245);
    }

    .slider-single>div:nth-child(1n+2) {
        display: none
    }

    .slider-nav .slick-slide {
        cursor: pointer;
    }

    button {
        cursor: pointer;
        z-index: 99999;
    }

    .slick-next:before,
    .slick-prev:before {
        color: #091425;
        pointer-events: none
    }

    .slick-prev {
        left: 0;
    }

    .slick-next {
        right: 0;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('libs/slick/slick.min.js')}}"></script>
<script>
    function initSlick() {
        $('[slider-nav]').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
        });

        $('[slider-nav]').find('img').click(function (e){
            $('[slide-preview]').find('[image]').css('background-image', `url(${$(this).attr('src')})`);
        })
    }

    initSlick();
</script>
@endpush
