@extends('layouts/static')

@section('title', 'Produk')

@section('content')
{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">
        Produk
    </a>
    <a class="breadcrumb-item" style="text-transform: uppercase;" href="{{route('product.hvac.index')}}">
        HVAC
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">
        {{request()->segment(3)}}
    </span>
</nav>

<section class="portfolio product">
    <div class="container">

        {{-- Header --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7">
                <div class="section-title" data-aos="fade-up">
                    <h2>{{request()->segment(3)}}</h2>
                    @if(request()->segment(3) === 'applied')
                    <p>
                        Tipe <strong> Applied HVAC</strong> merupakan sistem air dingin. Efek pendinginan dari
                        refrigeran pertama-tama ditransfer ke air dingin yang kemudian digunakan untuk mendinginkan
                        udara ruangan.
                    </p>
                    @elseif(request()->segment(3) === 'unitary')
                    <p>
                        Tipe <strong>Unitary HVAC </strong>merupakan direct (DX) system. Udara yang digunakan untuk
                        mendinginkan ruangan
                        langsung didinginkan oleh refrigeran di koil pendingin unit penanganan udara tanpa perantara
                        air.
                    </p>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-3" style="min-height: 400px">

            {{-- Filter --}}
            <div class="col-12 col-lg-3 col-md-3 mb-3 mb-lg-0">
                <p class="text-left" style="font-weight: 700; text-transform:uppercase; font-size:15px">
                    Merek
                </p>
                <ul class="list-group">
                    @foreach ($suppliers as $supplier)
                    <li class="list-group-item border-0 pl-0 py-2" style="background:none">
                        <a href="{{route('product.hvac.vendor.index', [request()->segment(3), $supplier->slug_name])}}">
                            <i class='bx bxs-chevron-right mr-2'></i>{{$supplier->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Content --}}
            <div class="col-12 col-lg-9 col-md-9">

                {{-- Produk --}}
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    {{-- Jika produk ada --}}
                    @forelse ($products as $product)
                    {{-- Gambar produk --}}
                    <div class="col-6 col-lg-4 portfolio-item pb-5 text-center">
                        <h4 class="text-left text-med" style="font-weight: 700;">
                            {{$product->name}}
                        </h4>
                        <h6 class="text-left text-muted text-small" style="text-transform:uppercase; font-weight:600;">
                            <strong>{{$product->suppliers[0]->name}}</strong>
                            {{($product->series !== '' && $product->series !== null) ?' - '.$product->series : ''}}
                        </h6>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img class="img-fluid" src="{{route('productImage', $product->product_image)}}"
                                alt="product-image" style="height: 150px" loading="lazy">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{route('productImage', $product->product_image)}}" class="venobox"
                                        title="Perbesar Gambar" data-placement="bottom">
                                        <i class="bx bx-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="d-flex align-items-center justify-content-center mt-3">

                            <a href="{{route('product.hvac.show',[
                                request()->segment(3),
                                $product->suppliers[0]->slug_name,
                                $product->slug_name]
                                )}}" class="btn btn-detail-primary mr-2">
                                Lihat detail
                            </a>

                            <form action="{{route('pricing')}}" method="post">
                                @csrf
                                <input type="hidden" name="_link" value="{{route('product.hvac.show',[
                                    request()->segment(3),
                                    $product->suppliers[0]->slug_name,
                                    $product->slug_name]
                                    )}}">
                                <button class="btn btn-detail-primary rounded" title="Harga">
                                    <i class="icofont-money"></i>
                                </button>
                            </form>

                        </div>
                    </div>

                    {{-- Jika produk tidak ditemukan --}}
                    @empty
                    <div class="col-12 text-center mt4">
                        <h4 class="mt-5">Maaf, produk yang kamu cari tidak kita temukan &#x1F61E;</h4>
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
