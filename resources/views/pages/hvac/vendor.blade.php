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
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.hvac.subCategory.index', [request()->segment(3)])}}">
        {{request()->segment(3)}}
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">{{request()->segment(4)}}</span>
</nav>

<section class="portfolio product">
    <div class="container">

        {{-- Header --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7">
                <div class="section-title" data-aos="fade-up">
                    <h2>Semua Produk</h2>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, provident reprehenderit aliquam
                        veniam
                        quo quibusdam nostrum rerum dolorum dolor eius mollitia praesentium sapiente, magnam expedita
                        magni, id
                        voluptates dolore ab.
                    </p>
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

                        {{-- Kategori --}}
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
                                    @foreach ($filters as $category)
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

                        {{-- Jenis --}}
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-target="#jenis">
                                        Jenis
                                    </button>
                                </h5>
                            </div>

                            <div id="jenis" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="t" value="all"
                                                {{(request()->t === 'all') ? 'checked' : ''}}>
                                            Semua jenis
                                        </label>
                                    </div>
                                    @foreach ($filters as $category)
                                    @foreach ($category->subTypes as $subType)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="t"
                                                value="{{$subType->slug_name}}"
                                                {{(request()->t === $subType->slug_name) ? 'checked' : ''}}>
                                            {{$subType->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Inverter --}}
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-target="#inverter">
                                        Inverter
                                    </button>
                                </h5>
                            </div>
                            <div id="inverter" class="collapse show" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="i" value="all"
                                                {{(request()->i === 'all') ? 'checked' : ''}}>
                                            Semua
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="i" value="inverter"
                                                {{(request()->i === 'inverter') ? 'checked' : ''}}>
                                            Inverter
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="i" value="non-inverter"
                                                {{(request()->i === 'non-inverter') ? 'checked' : ''}}>
                                            Non-Inverter
                                        </label>
                                    </div>
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

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    {{-- Jika produk ada --}}
                    @forelse ($products as $product)

                    {{-- Gambar produk --}}
                    <div class="col-6 col-lg-4 col-md-6 portfolio-item pb-5 text-center">
                        <h4 class="text-left text-med" style="font-weight: 700;">{{$product->name}}</h4>
                        <h6 class="text-left text-muted text-small" style="text-transform:uppercase; font-weight:600;">
                            {{$product->series}}
                        </h6>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img class="img-fluid product-image"
                                src="{{route('productImage', $product->product_image)}}" alt="product-image">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{route('productImage', $product->product_image)}}"
                                        data-gall="portfolioGallery" class="venobox" title="Perbesar Gambar"
                                        data-placement="bottom">
                                        <i class="bx bx-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="d-flex align-items-center justify-content-center mt-3">

                            <a href="{{route('product.hvac.show', [
                                $product->subCategories[0]->slug_name,
                                $product->suppliers[0]->slug_name, $product->slug_name]
                                )}}" class="btn btn-detail-primary mr-3">
                                Lihat detail
                            </a>

                            <form action="{{route('pricing')}}" method="post">
                                @csrf

                                <input type="hidden" name="_link" value="{{route('product.hvac.show',[
                                        $product->subCategories[0]->slug_name,
                                        $product->suppliers[0]->slug_name,
                                        $product->slug_name]
                                        )}}">

                                <button class="btn btn-detail-primary rounded" title="Harga">
                                    <i class="icofont-money"></i>
                                </button>
                            </form>

                        </div>
                    </div>

                    {{-- Jika produk kosong --}}
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
<script>
    $('[title]').tooltip();
    $(window).scroll(function (e) {
        if(window.scrollY > 5){
            $('#header').addClass('header-scrolled');
        }
        $('#header').find('li:nth-child(1)').removeClass('active');
        $('#header').find('ul:nth-child(1) > li:nth-child(3)').addClass('active');
    })
    $(document).ready(function () {
        $('.portfolio-item').css('top', '20px !important');
    })
    $('#accordion .btn-link').click(function(){
        const target = $(this).data('target');
        $(target).toggleClass('show');
    })

</script>
@endpush
