@php
use App\Utilities\Generator as G;
@endphp

@extends('layouts/hvac')

@section('title', 'Produk')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('index')}}">Home</a>
    <a class="breadcrumb-item" style="text-transform: capitalize;" href="{{route('product.index')}}">
        {{request()->segment(1)}}
    </a>
    <a class="breadcrumb-item" style="text-transform: uppercase;"
        href="{{route('product.'.request()->segment(2).'.index')}}">
        {{request()->segment(2)}}
    </a>
    <span class="breadcrumb-item active" style="text-transform: capitalize;">
        {{request()->segment(3)}}
    </span>
</nav>

<section class="portfolio product">
    <div class="container">

        @if(count($products) !== 0)
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-7">
                <div class="section-title" data-aos="fade-up">
                    <h2>{{request()->segment(3)}}</h2>
                    @if(request()->segment(3) === 'applied')
                    <p>Applied adalah</p>
                    @elseif(request()->segment(3) === 'unitary')
                    <p>Tipe <strong>Unitary</strong> adalah jenis ac dengan mesin yang didalamnya mengeluarkan udara
                        dingin ke dalam ruangan yang diinginkan dan mengeluarkan
                        udara panas dibagian luar ruangan. Biasanya AC Window mempunyai kapasitas dari 0,5 PK hingga 2,5
                        PK.</p>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class="row mt-3" style="min-height: 400px">

            @if(count($products) !== 0)
            <div class="col-12 col-lg-3 col-md-3 mb-3 mb-lg-0">
                <p class="text-left" style="font-weight: 700; text-transform:uppercase; font-size:15px">
                    Merek
                </p>
                <ul class="list-group">
                    @foreach ($suppliers as $supplier)
                    <li class="list-group-item border-0 pl-0 py-2" style="background:none">
                        <a
                            href="{{route('product.'.request()->segment(2).'.vendor.index', [request()->segment(3), $supplier->slug_name])}}">
                            <i class='bx bxs-chevron-right mr-2'></i>{{$supplier->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="col-12 {{(count($products) === 0) ? 'align-self-center' : 'col-lg-9 col-md-9 '}}">

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

                    @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6 portfolio-item pb-5 text-center">
                        <h4 class="text-left" style="font-weight: 700;">
                            {{$product->name}}
                        </h4>
                        <h6 class="text-left text-muted" style="text-transform:uppercase; font-weight:600;">
                            <strong>{{$product->suppliers[0]->name}}</strong> -
                            {{$product->series}}
                        </h6>
                        <div class="portfolio-wrap text-center" style="background: none;">
                            <img class="img-fluid" src="{{route('productImage', $product->product_image)}}"
                                alt="product-image" style="height: 150px">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="{{route('productImage', $product->product_image)}}" class="venobox"
                                        title="Perbesar Gambar" data-placement="bottom">
                                        <i class="bx bx-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{route('product.'.request()->segment(2).'.show',[
                                request()->segment(3),
                                $product->suppliers[0]->slug_name,
                                $product->slug_name]
                                )}}" class="btn btn-detail-primary mr-2">
                                Lihat detail
                            </a>
                            <form action="{{route('pricing')}}" method="post">
                                @csrf
                                <input type="hidden" name="_link" value="{{route('product.'.request()->segment(2).'.show',[
                                    request()->segment(3),
                                    $product->suppliers[0]->slug_name,
                                    $product->slug_name]
                                    )}}">
                                <button class="btn btn-detail-primary rounded" title="Harga">
                                    <i class='bx bx-dollar'></i>
                                </button>
                            </form>
                        </div>
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
    .rounded {
        height: 40px !important;
        width: 40px !important;
        border-radius: 50% !important;
    }

    .rounded i {
        transform: translateY(0)
    }

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

    .collapse.show {
        animation: try .5s cubic-bezier(0.23, 1, 0.320, 1) forwards;
        height: 100%;
    }

    .collapse {
        animation: try .5s cubic-bezier(0.23, 1, 0.320, 1) forwards;
        height: 0;
        overflow: hidden;
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
