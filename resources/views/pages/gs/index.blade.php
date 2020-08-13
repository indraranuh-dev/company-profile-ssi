@php
use App\Utilities\Generator;
@endphp

@extends('layouts/static')

@section('title', 'Produk')

@section('content')

{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">
        {{request()->segment(1)}}
    </a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.'.request()->segment(2).'.index')}}">
        General Supplies
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">
        {{str_replace('-',' ',request()->segment(3))}}
    </span>
</nav>

<section class="portfolio product">
    <div class="container">

        {{-- Header halaman --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-md-8">
                <div class="section-title" data-aos="fade-up">
                    <h2>Semua Produk</h2>`
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="row mt-3">

            {{-- Filter --}}
            <div class="col-12 col-lg-3 col-md-3 mb-3 mb-lg-0">
                <p class="text-left" style="font-weight: 700; text-transform:uppercase; font-size:15px">Filter</p>
                <form action="" method="get">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-target="#kategori">
                                        Kategori
                                    </button>
                                </h5>
                            </div>

                            <div id="kategori" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="c" value="all"
                                                {{(request()->c === 'all') ? 'checked' : ''}}>
                                            Semua kategori
                                        </label>
                                    </div>
                                    @foreach ($categories as $category)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="c"
                                                value="{{$category->slug_name}}"
                                                {{(request()->c === $category->slug_name) ? 'checked' : ''}}>
                                            {{$category->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <button class="btn btn-primary"><i class="icofont-filter mr-2"></i>Terapkan</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Produk --}}
            <div class="col-12 col-lg-9 col-md-9 {{(count($products) === 0) ? 'align-self-center' : ''}}">

                {{-- Daftar produk --}}
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    @forelse ($products as $product)
                    <div class="col-6 col-lg-4 col-md-6 portfolio-item pb-5 text-center">
                        <h4 class="text-left text-med" style="font-weight: 700;">{{$product->name}}</h4>
                        <h6 class="text-left text-muted text-small" style="text-transform:uppercase; font-weight:600;">
                            {{$product->series}}
                        </h6>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img class="img-fluid my-2" src="{{route('productImage', $product->images[0]->image)}}"
                                alt="product-image" style="height: 150px">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{route('productImage', $product->images[0]->image)}}"
                                        data-gall="portfolioGallery" class="venobox" title="Perbesar Gambar"
                                        data-placement="bottom">
                                        <i class="bx bx-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{route('product.general-supplies.show', $product->slug_name)}}"
                                class="btn btn-detail-primary mr-3">Lihat
                                detail</a>
                            <form action="{{route('pricing')}}" method="post">
                                @csrf
                                <input type="hidden" name="_link" value="{{route('product.'.request()->segment(2).'.show',
                                        $product->slug_name
                                        )}}">
                                <button class="btn btn-detail-primary rounded" title="Harga">
                                    <i class="icofont-money"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <h4>Maaf, produk yang kamu cari tidak kita temukan &#x1F61E;</h4>
                    </div>
                    @endforelse

                </div>

                {{-- Pagination --}}
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                        {{$products->links()}}
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection

@push('styles')
<style>
    section {
        padding: 20px 0 60px;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('ext/general.js')}}"></script>
@endpush
