@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/static')

@section('title', 'Produk')

@section('content')

{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">
        Produk
    </a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.general-supplies.index')}}">
        Filtration
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">
        {{str_replace('-', ' ', request()->segment(3))}}
    </span>
</nav>
<section class="portfolio product">
    <div class="container" style="{{($product->isEmpty()) ? 'transform: translateY(250px);' : ''}}">

        {{-- Header --}}
        @if (!$product->isEmpty())
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7">
                <div class="section-title" data-aos="fade-up">
                    <h2>Detail Produk</h2>
                </div>
            </div>
        </div>
        @endif

        {{-- Content --}}
        <div class="row mt-3">
            <div class="col-12 align-self-center">

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="400">

                    @forelse ($product as $product)
                    <div class="col-12 col-lg-5 col-md-6 mb-4 mb-lg-0 mb-md-0 text-center">
                        <div class="slider-container mx-2">
                            <div class="slider-preview" slide-preview>
                                <div style="background-image: url({{route('productImage', $product->images[0]->image)}})"
                                    image></div>
                            </div>
                            <div class="slider slider-nav" slider-nav>
                                @foreach ($product->images as $image)
                                <div class="img"
                                    style="background-image: url({{route('admin.product.image', $image->image)}});"
                                    data-url="{{route('admin.product.image', $image->image)}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 px-3">
                        <h4 class="text-left" style="font-weight: 700;">{{$product->name}}</h4>
                        <h6 class="text-left" style="text-transform:uppercase;">{{$product->series}}</h6>
                        <div class="mb-3">
                            @foreach ($product->tags as $tag)
                            <span class="badge badge-pill badge-primary py-1"
                                style="font-weight: 200">#{{$tag->name}}</span>
                            @endforeach
                        </div>
                        <ul class="m-0 p-0" style="list-style: none;">
                            @foreach ($product->details as $desc)
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>{{$desc->description}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <h4>Maaf, produk yang kamu cari tidak kita temukan &#x1F61E;</h4>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('libs/slick/slick-theme.min.css')}}" />
<link rel="stylesheet" href="{{asset('libs/slick/slick.min.css')}}" />
<style>
    section {
        padding: 20px 0 60px;
    }

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

    .slick-slide:focus {
        outline: none;
    }

    .slider-single>div:nth-child(1n+2) {
        display: none
    }

    .slider-nav .slick-slide {
        cursor: pointer;
    }

    .img {
        background-position: center center;
        background-size: cover;
        height: 60px;
        border-radius: 5px;
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
<script src="{{asset('ext/general.js')}}"></script>
<script src="{{asset('libs/slick/slick.min.js')}}"></script>
<script>
    $(function() {

        function initSlick(){
            $('[slider-nav]').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
            });

            $('[slider-nav]').find('.img').click(function (e){
                $('[slide-preview]').find('[image]').css('background-image', `url(${$(this).data('url')})`);
            })
        }

        initSlick();
    })
</script>
@endpush
