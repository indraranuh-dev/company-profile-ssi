@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/static')

@section('title', 'Produk')

@section('content')

{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">Produk</a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">Filtration</span>
</nav>

<section class="portfolio product">
    <div class="container">

        {{-- Header --}}
        @if(count($products) !== 0)
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7">
                <div class="section-title" data-aos="fade-up">
                    <h2>FIltration</h2>
                    <p>Filtration adalah Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis suscipit,
                        doloribus quos vitae reprehenderit ex nam nostrum porro asperiores culpa?</p>
                </div>
            </div>
        </div>
        @endif

        {{-- Content --}}
        <div class="row mt-3" style="min-height: 400px">

            {{-- Filter --}}
            @if(count($products) !== 0)
            <div class="col-12 col-lg-3 col-md-3 mb-3 mb-lg-0">
                <p class="text-left" style="font-weight: 700; text-transform:uppercase; font-size:15px">
                    Merek
                </p>
                <ul class="list-group">
                    <li class="list-group-item border-0 pl-0 py-2" style="background:none">
                        <a href="{{route('product.filtration.supplier.index', 'japan-air-filter')}}">
                            <i class='bx bxs-chevron-right mr-2'></i>Japan Air Filter
                        </a>
                    </li>
                </ul>
            </div>
            @endif

            {{-- Produk --}}
            <div class="col-12 {{(count($products) === 0) ? 'align-self-center' : 'col-lg-9 col-md-9 '}}">

                {{-- Daftar Produk --}}
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    @forelse ($products as $product)
                    <div class="col-6 col-lg-4 col-md-6 portfolio-item pb-5 text-center">
                        <h4 class="text-left text-med" style="font-weight: 700;">{{$product->name}}</h4>
                        <h6 class="text-left text-muted text-small" style="text-transform:uppercase; font-weight:600;">
                            {{$product->series}}
                        </h6>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img class="img-fluid my-2" src="{{route('productImage', $product->image)}}"
                                alt="product-image" style="height: 150px">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{route('productImage', $product->image)}}" data-gall="portfolioGallery"
                                        class="venobox" title="Perbesar Gambar" data-placement="bottom">
                                        <i class="bx bx-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{route('product.filtration.show', ['japan-air-filter', $product->slug_name])}}"
                                class="btn btn-detail-primary mr-3">Lihat
                                detail</a>
                            <form action="{{route('pricing')}}" method="post">
                                @csrf
                                <input type="hidden" name="_link" value="{{route('product.'.request()->segment(2).'.show',[
                                        'japan-air-filter',
                                        $product->slug_name]
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
