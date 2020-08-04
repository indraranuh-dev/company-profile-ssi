@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/static')

@section('title', 'Produk')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">{{G::uriSegment(0)}}</span>
</nav>

<section class="product more-services">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7" data-aos="fade-up">
                <div class="section-title">
                    <h2>Produk</h2>
                    <p>
                        Kami menyediakan 3 kategori produk yang biasa digunakan pada industri maupun non industri.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil nisi error molestiae mollitia
                        nesciunt, quas amet possimus quo totam repellendus iste ipsa voluptas aperiam ullam non quia
                        cum, recusandae molestias.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-lg-4 col-md-4 mb-3 mb-lg-0 mb-md-0 d-flex align-items-stretch" data-aos="fade-right"
                data-oas-delay="300" data-aos-duration="800">
                <div class="card p-0">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong style="text-transform: uppercase; letter-spacing:2px;">HVAC</strong>
                        </h5>
                        <p class="card-text text-justify">
                            HVAC adalah Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime dolores
                            reiciendis voluptatum facilis, laborum sint dicta rerum perspiciatis architecto similique.
                        </p>
                        <div class="read-more">
                            <a href="{{route('product.category.index', ['hvac'])}}">
                                <i class="icofont-arrow-right"></i> Baca selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-md-4 mb-3 mb-lg-0 mb-md-0 d-flex align-items-stretch" data-aos="fade-up"
                ata-oas-delay="300" data-aos-duration="800">
                <div class="card p-0">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong style="text-transform: uppercase; letter-spacing:2px;">General Supplies</strong>
                        </h5>
                        <p class="card-text text-justify">
                            General Supplies adalah Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                            beatae hic fugit cupiditate sequi exercitationem saepe commodi quam similique sint.
                        </p>
                        <div class="read-more">
                            <a href="{{route('product.category.index', ['general-supplies'])}}">
                                <i class="icofont-arrow-right"></i> Baca selengkapnya
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-4 col-md-4 mb-3 mb-lg-0 mb-md-0 d-flex align-items-stretch" data-aos="fade-left"
                data-oas-delay="300" data-aos-duration="800">
                <div class="card p-0">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong style="text-transform: uppercase; letter-spacing:2px;">Filtration</strong>
                        </h5>
                        <p class="card-text text-justify">
                            Filtration adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad iusto
                            laboriosam quisquam. Cum modi fuga ducimus eligendi id commodi porro.
                        </p>
                        <div class="read-more">
                            <a href="{{route('product.category.index', ['filtration'])}}">
                                <i class="icofont-arrow-right"></i> Baca selengkapnya
                            </a>
                        </div>
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

    @keyframes try {
        form {
            height: 0;
            opacity: 1;
        }

        to {
            height: 100%;
            opacity: 1;
        }
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
