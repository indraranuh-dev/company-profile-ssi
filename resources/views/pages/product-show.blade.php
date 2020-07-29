@php
use App\Utilities\Generator;
@endphp

@extends('layouts/static')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: uppercase;"
        href="{{route('product.category.index', Generator::uriSegment(1))}}">{{Generator::uriSegment(1)}}</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.subCategory.index', [Generator::uriSegment(1),Generator::uriSegment(2)])}}">{{Generator::uriSegment(2)}}</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.vendor.index', [Generator::uriSegment(1),Generator::uriSegment(2), Generator::uriSegment(3)])}}">{{Generator::uriSegment(3)}}</a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">{{Generator::uriSegment(4)}}</span>
</nav>
<section class="portfolio product">
    <div class="container" style="{{($products->isEmpty()) ? 'transform: translateY(250px);' : ''}}">

        @if (!$products->isEmpty())
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7">
                <div class="section-title" data-aos="fade-up">
                    <h2>Detail Produk</h2>
                </div>
            </div>
        </div>
        @endif

        <div class="row mt-3">
            <div class="col-12 align-self-center">

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="400">

                    @forelse ($products as $product)
                    <div class="col-12 col-lg-4 col-md-6 mb-5 mb-lg-0 mb-md-0 text-center">
                        <img class="img-fluid" src="{{route('productImage', $product->product_image)}}"
                            alt="product-image">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 align-self-center">
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
                                        <a href="javascript:void(0)"
                                            onclick="fetchDescription('{{$feature->slug_name}}')">
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

                    @if ($product->spesification !== '' && $product->spesification !== null)
                    <div class="col-12 col-lg-8 col-md-8 my-3">
                        <h5 class="text-center"
                            style="font-weight: 700; text-transform:uppercase; font-size:14px; letter-spacing:2px;">
                            Spesifikasi
                        </h5>
                        <img src="{{route('productImage', $product->spesification)}}" alt="{{$product->spesification}}"
                            width="100%">
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

@endsection

@push('styles')
<style>
    section {
        padding: 20px 0 60px;
    }
</style>
@endpush

@push('scripts')
<script>
    $('[title]').tooltip();
    $(window).scroll(function (e) {
        if(window.scrollY > 5){
            $('#header').addClass('header-scrolled');
        }
        $('#header').find('li:nth-child(1)').removeClass('active');
        $('#header').find('ul:nth-child(1) > li:nth-child(3)').addClass('active');
    })
</script>
@endpush
