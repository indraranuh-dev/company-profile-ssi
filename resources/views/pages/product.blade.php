@extends('layouts/static')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
    <span class="breadcrumb-item active">Produk</span>
</nav>

<section class="portfolio product">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Semua Produk</h2>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, provident reprehenderit aliquam veniam
                quo quibusdam nostrum rerum dolorum dolor eius mollitia praesentium sapiente, magnam expedita magni, id
                voluptates dolore ab.
            </p>
        </div>

        @if (! $products->isEmpty())
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-inverter">Inverter</li>
                    <li data-filter=".filter-non-inverter">Non Inverter</li>
                </ul>
            </div>
        </div>
        @endif

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

            @forelse ($products as $product)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$product->inverter}}">
                <div class="portfolio-wrap text-center">
                    <img class="img-fluid" src="{{route('productImage', $product->product_image)}}" alt="product-image"
                        style="max-height: 200px">
                    <div class="portfolio-info">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->series}}</p>
                        <div class="portfolio-links">
                            <a href="{{route('productImage', $product->product_image)}}" data-gall="portfolioGallery"
                                class="venobox" title="Perbesar Gambar" data-placement="bottom">
                                <i class="bx bx-zoom-in"></i>
                            </a>
                            <a href="" title="Lihat Detail" data-placement="bottom">
                                <i class="bx bx-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <h4>Maaf, produk yang kamu cari tidak kita temukan &#x1F61E;</h4>
            </div>
            @endforelse

        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    $('button').tooltip();
    $('a').tooltip();
    $(window).scroll(function (e) {
        if(window.scrollY > 5){
            $('#header').addClass('header-scrolled');
        }
        $('#header').find('li:nth-child(1)').removeClass('active');
        $('#header').find('ul:nth-child(1) > li:nth-child(3)').addClass('active');
    })
</script>
@endpush
