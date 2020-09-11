@extends('layouts/static')

@section('title', 'Hubungi Kami')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
    <span class="breadcrumb-item active">Hubungi kami</span>
</nav>

<div class="container">
    <section class="contact">
        <div class="row" data-aos="fade-down">
            <div class="col-12 mb-3">
                <div class="section-title">
                    <h2>Tentang Kami</h2>
                </div>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-12" data-aos="fade-up">
                <h2 class="content-title mb-4">
                    <strong>Seputar Perusahaan</strong>
                </h2>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6" data-aos="fade-right">
                        <img src="https://images.pexels.com/photos/7070/space-desk-workspace-coworking.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            class="img-thumbnail img-fluid mb-3" alt="">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6" data-aos="fade-left">
                        <p class="text-justify">
                            CV. Sinar Sejahtera Inti merupakan perusahaan yang bergerak pada bidang Heating, Ventilation
                            & Air Conditioning (HVAC), Filtration dan General Supplies.
                        </p>
                        <p>Kami merupakan authorized dealer dari :</p>

                        <ul class="pl-2" style="list-style: none">
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                PT. Daikin Applied Solutions Indonesia
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                PT. Daikin Air Conditioning Indonesia
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                PT. Gree Electric Indonesia Appliances
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                PT. Japan Air Filter Indonesia
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                PT. Mitsubishi Electric Indonesia
                            </li>
                        </ul>
                        <p class="text-justify">
                            Kami menyediakan layanan berupa penyediaan unit system, design, perencaan, servis dan
                            perawatan untuk kebutuhan HVAC baik untuk customer perorangan maupun korporat, baik Applied
                            Product, Unitary Product dan Filtration Product.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-12" data-aos="fade-up">
                <h2 class="content-title mb-4">
                    <strong>History Perusahaan</strong>
                </h2>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6" data-aos="fade-right" data-delay="0">
                        <p class="text-justify">
                            CV. Sinar Sejahtera Inti (d.h Purnama Jaya) sebelum berekspansi ke bidang HVAC, telah
                            bergerak di bidang General Supplies sejak tahun 1989. Kami melayani pemesanan part General
                            Supplies customized maupun produk umum (mass product).
                        </p>

                        <p>
                            Kami memiliki beberapa mesin produksi seperti :
                        </p>
                        <ul class="pl-2" style="list-style: none">
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                Stamping (Punch Press Working)
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                Injection Plastic (Nylon, PU Poly Urethane, PP, ABS, etc)
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                Lathe Machine
                            </li>
                            <li class="d-flex pt-2">
                                <i style="line-height: unset" class='bx bx-check-square mr-2'></i>
                                Milling Machine
                            </li>
                        </ul>
                        <p class="text-justify">
                            CV. Sinar Sejahtera Inti berkomitmen untuk memberikan layanan terbaik kepada seluruh mitra
                            bisnis / partner / pelanggan baik dalam hal kecepatan, kualitas layanan, waktu respon,
                            kendali mutu dan after sales / garansi layanan dari kami.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6" data-aos="fade-left" data-delay="0">
                        <img src="https://images.pexels.com/photos/48195/document-agreement-documents-sign-48195.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            class="img-thumbnail img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection

@push('scripts')
<script src="{{asset('ext/general.js')}}"></script>
@endpush
