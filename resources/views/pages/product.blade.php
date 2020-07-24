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

        <div class="row mt-3">
            <div class="col-12 col-lg-3 col-md-3 mb-3 mb-lg-0">
                <p class="text-left" style="font-weight: 700; text-transform:uppercase; font-size:15px">Filter</p>
                <form action="" method="get">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#kategori" aria-expanded="true" aria-controls="kategori">
                                        Kategori
                                    </button>
                                </h5>
                            </div>

                            <div id="kategori" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kategori" value="all"
                                                {{(request()->kategori === 'all') ? 'checked' : ''}}>
                                            Semua kategori
                                        </label>
                                    </div>
                                    @foreach ($filters as $category)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kategori"
                                                value="{{$category->slug_name}}"
                                                {{(request()->kategori === $category->slug_name) ? 'checked' : ''}}>
                                            {{$category->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#jenis" aria-expanded="false" aria-controls="jenis">
                                        Jenis
                                    </button>
                                </h5>
                            </div>

                            <div id="jenis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jenis" value="all"
                                                {{(request()->jenis === 'all') ? 'checked' : ''}}>
                                            Semua jenis
                                        </label>
                                    </div>
                                    @foreach ($filters as $category)
                                    @foreach ($category->subTypes as $subType)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jenis"
                                                value="{{$subType->slug_name}}"
                                                {{(request()->jenis === $subType->slug_name) ? 'checked' : ''}}>
                                            {{$subType->name}}
                                        </label>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#inverter" aria-expanded="false" aria-controls="inverter">
                                        Inverter
                                    </button>
                                </h5>
                            </div>
                            <div id="inverter" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="inverter" value="all"
                                                {{(request()->inverter === 'all') ? 'checked' : ''}}>
                                            Semua
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="inverter"
                                                value="inverter"
                                                {{(request()->inverter === 'inverter') ? 'checked' : ''}}>
                                            Inverter
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="inverter"
                                                value="non-inverter"
                                                {{(request()->inverter === 'non-inverter') ? 'checked' : ''}}>
                                            Non-Inverter
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <button class="btn btn-primary">Terapkan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-9 col-md-9">

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6 portfolio-item pb-5 text-center">
                        <h4 class="text-left" style="font-weight: 700;">{{$product->name}}</h4>
                        <p class="text-left" style="text-transform:uppercase;">{{$product->series}}</p>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img class="img-fluid" src="{{route('productImage', $product->product_image)}}"
                                alt="product-image" style="height: 150px">
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
                        <a href="{{request()->url().'/'.$product->slug_name}}" class="btn btn-detail-primary mt-3">Lihat
                            detail</a>
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

    .filter-container {
        background: #e9ecef;
        padding: 10px 20px;
        width: 100%;
        box-sizing: border-box;
        border-radius: 5px;
        margin-bottom: 30px
    }

    .filter-container h4 {
        font-size: 15px;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 2px
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
</script>
@endpush
