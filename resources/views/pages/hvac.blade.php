@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/static')

@section('title', 'Produk')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;"
        href="{{route('product.index')}}">{{G::uriSegment(0)}}</a>
    <span class="breadcrumb-item active" style="text-transform: uppercase;">{{G::uriSegment(1)}}</span>
</nav>

<section class="product more-services">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7" data-aos="fade-up">
                <div class="section-title">
                    <h2>HVAC</h2>
                    <p>
                        HVAC adalah singkatan dari Heating Ventilation dan Air-Conditioning, yang umumnya terkait dengan
                        pemanasan dan pendinginan industri. HVAC adalah sistem atau mesin yang melakukan tiga fungsi
                        utama dengan tiga saluran terpisah yaitu pemanasan, pendinginan dan ventilasi udara. HVAC
                        umumnya digunakan dalam bangunan komersial atau industri.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0 d-flex align-items-stretch" data-aos="fade-right"
                data-oas-delay="300" data-aos-duration="800">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong style="text-transform: uppercase; letter-spacing:2px;">Applied</strong>
                        </h5>
                        <p class="card-text text-justify">Banyak konsumen yang tidak terbiasa dengan konsep produk yang
                            diterapkan.
                            Itu karena sebagian besar produk yang bertanggung jawab untuk pembelian bukan produk yang
                            diterapkan. Produk yang diterapkan tidak dapat digunakan sampai mereka dipasang ke suatu
                            lingkungan dan karena instalasi dan lingkungan sebagian bertanggung jawab atas penggunaan
                            dan kinerjanya, efektivitas produk akan sangat bervariasi.
                        </p>
                        <div class="read-more">
                            <a href="{{route('product.subCategory.index', ['hvac', 'applied'])}}">
                                <i class="icofont-arrow-right"></i> Baca selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0 d-flex align-items-stretch" data-aos="fade-left"
                data-oas-delay="300" data-aos-duration="800">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong style="text-transform: uppercase; letter-spacing:2px;">Unitary</strong>
                        </h5>
                        <p class="card-text text-justify">Banyak konsumen yang tidak terbiasa dengan konsep produk yang
                            diterapkan.
                            Itu karena sebagian besar produk yang bertanggung jawab untuk pembelian bukan produk yang
                            diterapkan. Produk yang diterapkan tidak dapat digunakan sampai mereka dipasang ke suatu
                            lingkungan dan karena instalasi dan lingkungan sebagian bertanggung jawab atas penggunaan
                            dan kinerjanya, efektivitas produk akan sangat bervariasi.
                        </p>
                        <div class="read-more">
                            <a href="{{route('product.subCategory.index', ['hvac', 'unitary'])}}">
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
