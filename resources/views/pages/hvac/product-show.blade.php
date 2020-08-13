@extends('layouts/static')

@section('title', 'Produk')

@section('content')

{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">Produk</a>
    <a class="breadcrumb-item" style="text-transform: uppercase;" href="{{route('product.hvac.index')}}">HVAC</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.hvac.subCategory.index', [request()->segment(3)])}}">
        {{request()->segment(3)}}
    </a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.hvac.vendor.index', [request()->segment(3), request()->segment(4)])}}">
        {{request()->segment(4)}}
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">
        {{str_replace('-', ' ', request()->segment(5))}}
    </span>
</nav>

<section class="portfolio product">
    <div class="container" style="{{($products->isEmpty()) ? 'transform: translateY(250px);' : ''}}">

        {{-- Header --}}
        @if (!$products->isEmpty())
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

                    {{-- Deskripsi dan dambar produk --}}
                    @forelse ($products as $product)
                    <div class="col-12 col-lg-5 col-md-6 mb-3 text-center">
                        <div class="img-container">
                            <img src="{{route('productImage', $product->product_image)}}" alt="product-image">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <h4 class="text-left" style="font-weight: 700;">{{$product->name}}</h4>
                        <h6 class="text-left" style="text-transform:uppercase;">{{$product->series}}</h6>
                        <div class="mb-3">
                            @foreach ($product->tags as $tag)
                            <span class="badge badge-pill badge-primary py-1"
                                style="font-weight: 200">#{{$tag->name}}</span>
                            @endforeach
                        </div>
                        <p class="text-justify">{{$product->description}}</p>
                    </div>

                    {{-- Fitur produk --}}
                    @if(!$product->features->isEmpty())
                    @foreach ($featureCategories as $category)
                    <div class="col-12 col-lg-6 col-md-6 mb-3">
                        <div class="card border-0 h-100">
                            <div class="card-body">
                                <h5 class="text-center"
                                    style="font-weight: 700; text-transform:uppercase; font-size:14px; letter-spacing:2px;">
                                    {{$category->name}}
                                </h5>
                                <div class="row">
                                    @foreach ($product->features as $feature)
                                    @if ($category->id === $feature->category->id)
                                    <div class="col-4 text-center py-3">
                                        <a href="javascript:void(0)" data-slug="{{$feature->slug_name}}" detail-button>
                                            <img src="{{route('icon', $feature->icon)}}" alt="icon" height="60px">
                                        </a>
                                        <h6 class="my-2 text-muted">{{$feature->name}}</h6>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    {{-- Spesifikasi produk --}}
                    @if ($product->spesification !== '' && $product->spesification !== null)
                    <div class="col-12 col-lg-8 col-md-8 my-3">
                        <h5 class="text-center"
                            style="font-weight: 700; text-transform:uppercase; font-size:17px; letter-spacing:2px;">
                            Spesifikasi
                        </h5>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img src="{{route('productImage', $product->spesification)}}" alt="spesifikasi"
                                width="100%">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{route('productImage', $product->spesification)}}" class="venobox"
                                        title="Perbesar Gambar" data-placement="bottom">
                                        <i class="bx bx-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endif

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

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-0 text-center">
                <div class="spinner-border spinner text-dark mb-3" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="text text-justify"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    section {
        padding: 20px 0 60px;
    }

    .img-container {
        height: 250px;
        display: flex;
        overflow: hidden;
        width: 100%;
    }

    .img-container img {
        height: 100%;
        margin: auto
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('ext/general.js')}}"></script>
@endpush
