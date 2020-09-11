@extends('layouts/static')

@section('title', 'Produk')

@section('content')
{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">{{request()->segment(1)}}</span>
</nav>

<section class="product more-services">
    <div class="container">

        {{-- Header Produk--}}
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

        {{-- Kategori produk --}}
        <div class="row">

            {{-- HVAC --}}
            <div class="col-12 col-lg-6 col-md-6 mb-4" data-aos="fade-right" data-aos-duration="800">
                <div class="awesome-card">
                    <div class="awesome-header">
                        <h5 class="awesome-title">HVAC</h5>
                    </div>
                    <div class="awesome-body">
                        <p class="content">
                            HVAC (Heating, Ventilation & Air Conditioning dalam Bahasa Indonesia) berarti pemanasan,
                            ventilasi, dan ac. Ketiga fungsi tersebut saling berhubungan untuk menentukan suatu suhu dan
                            kelembaban udara dalam sebuah bangunan dan juga menyediakan kontrol asap, menjaga tekanan
                            antar ruang, dan menyediakan udara segar bagi penempat
                        </p>
                        <a href="{{route('product.hvac.index')}}">
                            <i class="icofont-arrow-right"></i> Baca selengkapnya
                        </a>
                    </div>
                </div>
            </div>

            {{-- General Supplies --}}
            <div class="col-12 col-lg-6 col-md-6 mb-4" data-aos="fade-left" data-aos-duration="800">
                <div class="awesome-card">
                    <div class="awesome-header">
                        <h5 class="awesome-title">General Supplies</h5>
                    </div>
                    <div class="awesome-body">
                        <p class="content">
                            General Supplies adalah Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                            beatae hic fugit cupiditate sequi exercitationem saepe commodi quam similique sint.
                        </p>
                        <a href="{{route('product.general-supplies.index')}}">
                            <i class="icofont-arrow-right"></i> Baca selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kategori Produk Filtration --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="800">
                <div class="awesome-card">
                    <div class="awesome-header">
                        <h5 class="awesome-title">Filtration</h5>
                    </div>
                    <div class="awesome-body">
                        <p class="content">
                            Filtration merupakan sistem penyaring udara yang bertujuan untuk menghilangkan
                            partikel-partikel tertentu dari udara seperti debu, serbuk, jamur, bau, uap air, dll.
                        </p>
                        <a href="{{route('product.filtration.index')}}">
                            <i class="icofont-arrow-right"></i> Baca selengkapnya
                        </a>
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
