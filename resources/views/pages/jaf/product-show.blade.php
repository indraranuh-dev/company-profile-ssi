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
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.filtration.index')}}">
        Filtration
    </a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.filtration.supplier.index', 'japan-air-filter')}}">
        Japan Air Filter
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">
        {{str_replace('-', ' ', request()->segment(4))}}
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
                        <div class="img-container">
                            <img class="img-fluid img-thumbnail" src="{{route('productImage', $product->image)}}"
                                alt="product-image">
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
<script>
    $(function() {
        $('[title]').tooltip();
        $(window).scroll(function (e) {
            if(window.scrollY > 5){
                $('#header').addClass('header-scrolled');
            }
            $('#header').find('li:nth-child(1)').removeClass('active');
            $('#header').find('ul:nth-child(1) > li:nth-child(3)').addClass('active');
        })
        $('#detail').on('hidden.bs.modal', function (e) {
            $('#detail').find('.spinner').show();
            $('#detail').find('.modal-title').html('');
            $('#detail').find('.text').html('');
        })
    })
</script>
@endpush
