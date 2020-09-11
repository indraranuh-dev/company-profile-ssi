@extends('layouts/static')

@section('title', 'Produk')

@section('content')
{{-- Breadcrumb --}}
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">Produk</a>
    <span class="breadcrumb-item active" style="text-transform: uppercase;">HVAC</span>
</nav>

<section class="product more-services">
    <div class="container">

        {{-- Header kategori --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-md-8" data-aos="fade-up">
                <div class="section-title">
                    <h2>HVAC</h2>
                    <p>
                        HVAC (Heating, Ventilation & Air Conditioning dalam Bahasa Indonesia) berarti pemanasan,
                        ventilasi, dan ac. Ketiga fungsi tersebut saling berhubungan untuk menentukan suatu suhu dan
                        kelembaban udara dalam sebuah bangunan dan juga menyediakan kontrol asap, menjaga tekanan antar
                        ruang, dan menyediakan udara segar bagi penempat. HVAC pada dasarnya berfungsi untuk menjaga
                        kondisi udara sekitar untuk melindungi alat-alat, dan kenyamanan personal dengan cara mengatur
                        ventilasi dan pengkondisian udara. HVAC termasuk vital penggunaannya di beberapa industri,
                        terutama di gedung-gedung, perkantoran yang perlu dijaga kelembaban udaranya, serta
                        industri-industri besar yang memerlukan sistem ventilasi yang baik.
                    </p>
                </div>
            </div>
        </div>

        {{-- Sub kategori --}}
        <div class="row mt-4">

            {{-- Applied --}}
            <div class="col-12 col-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0" data-aos="fade-right" data-oas-delay="300"
                data-aos-duration="800">
                <div class="awesome-card">
                    <div class="awesome-header">
                        <h5 class="awesome-title">Applied</h5>
                    </div>
                    <div class="awesome-body">
                        <p class="content">
                            Applied HVAC merupakan sistem air dingin. Efek pendinginan dari refrigeran pertama-tama
                            ditransfer ke air dingin yang kemudian digunakan untuk mendinginkan udara ruangan.
                        </p>
                        <a href="{{route('product.hvac.subCategory.index', 'applied')}}">
                            <i class="icofont-arrow-right"></i> Baca selengkapnya
                        </a>
                    </div>
                </div>
            </div>

            {{-- Unitary --}}
            <div class="col-12 col-lg-6 col-md-6 mb-3 mb-lg-0 mb-md-0" data-aos="fade-left" data-oas-delay="300"
                data-aos-duration="800">
                <div class="awesome-card">
                    <div class="awesome-header">
                        <h5 class="awesome-title">Unitary</h5>
                    </div>
                    <div class="awesome-body">
                        <p class="content">
                            Unitary HVAC merupakan direct (DX) system. Udara yang digunakan untuk mendinginkan ruangan
                            langsung didinginkan oleh refrigeran di koil pendingin unit penanganan udara tanpa perantara
                            air.
                        </p>
                        <a href="{{route('product.hvac.subCategory.index', 'unitary')}}">
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
