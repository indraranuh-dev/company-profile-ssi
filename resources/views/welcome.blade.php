<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sinar Sejahtera Inti">
    <meta name="author" content="">

    <title>Sinar Sejahtera Inti</title>

    <link rel="icon" href="{{asset('image/ssi.svg')}}" type="image/svg">
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet' " href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{mix('css/preloader.css')}}">
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet' " href=" {{mix('css/vendor.css')}}">
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet' "
        href=" {{asset('libs/slick/slick.css')}}">
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet' "
        href=" {{asset('libs/slick/slick-theme.css')}}">

    <style>

    </style>
</head>

<body class="preloader-show">

    <div class="preloader">
        <svg class="start" height="100" viewBox="0 0 155 152" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
                <rect x="-11.4142" y="76.1629" width="123.853" height="123.392" rx="31"
                    transform="rotate(-45 -11.4142 76.1629)" fill="#fff" stroke="#fff" stroke-width="2" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.06 61.84a30.07 30.07 0 00-.8 27.08C10.1 90.17 15.9 91 21 90.06c8.8-1.6 8.67-5.33 7.5-7-.97-1.15-3.87-1.87-7.3-2.7-5.46-1.34-12.25-3-14.7-7.3-1.72-3.01-1.6-7.14-.44-11.22zm13.52 43.9l35.04 35.05a30 30 0 0042.43 0l43.74-43.74a30 30 0 000-42.43l-43.41-43.4a30 30 0 00-42.43 0l-31.3 31.3A48.74 48.74 0 0137 38.56c10-1.5 24.33.34 30 1.5l-6.5 17c-5.5-2.5-19.5-4.5-25-2.5-7.16 2.6-5.5 7.36 2.5 8.5 8.3 1.19 18 4 17 13.5s-8 20-17.5 24.5c-5.1 2.42-11.3 4.02-17.92 4.69zM52.5 86l-7 17c1 .5 4.4 1.3 14 2.5 12 1.5 24.5-.23 33.5-4.5 9.5-4.5 16.5-15 17.5-24.5s-8.7-12.31-17-13.5c-8-1.14-9.66-5.9-2.5-8.5 5.5-2 19.5 0 25 2.5l6.5-17c-5.67-1.17-20-3-30-1.5s-17.5 5.5-23 10S58 66 62 73c2.45 4.3 9.24 5.95 14.7 7.29 3.43.84 6.33 1.55 7.3 2.71 1.17 1.67 1.3 5.4-7.5 7-8.8 1.6-19.67-2-24-4z"
                    fill="#30318B" />
                <path d="M151.5 41.5H129l-25.5 63H127l24.5-63z" fill="#fff" stroke="#fff" stroke-width="2" />
                <path d="M131 38h-.69l-.24.64-6 15.5-.52 1.32 1.42.04 20.25.5.7.02.26-.66 6.25-16 .53-1.36H131z"
                    fill="#E8232A" stroke="#fff" stroke-width="2" />
            </g>
            <defs>
                <clipPath id="clip0">
                    <rect width="155" height="151.921" fill="#fff" />
                </clipPath>
            </defs>
        </svg>
    </div>

    {{-- Header --}}
    <x-static-header>
        @slot('produk')
        <ul>
            <li class="drop-down">
                <a href="{{route('product.hvac.index')}}">HVAC</a>
                <ul>
                    <li class="drop-down">
                        <a href="{{route('product.hvac.subCategory.index', 'applied')}}">Applied</a>
                        <ul>
                            <li>
                                <a href="{{route('product.hvac.vendor.index', ['applied', 'daikin'])}}">
                                    Daikin</a>
                            </li>
                            <li>
                                <a href="{{route('product.hvac.vendor.index', ['applied', 'gree'])}}">
                                    Gree</a>
                            </li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="{{route('product.hvac.subCategory.index', 'unitary')}}">Unitary</a>
                        <ul>
                            <li>
                                <a href="{{route('product.hvac.vendor.index', ['unitary', 'daikin'])}}">
                                    Daikin</a>
                            </li>
                            <li>
                                <a href="{{route('product.hvac.vendor.index', ['unitary', 'gree'])}}">
                                    Gree</a>
                            </li>
                            <li>
                                <a href="{{route('product.hvac.vendor.index', ['unitary', 'mcquay'])}}">
                                    McQuay</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('product.general-supplies.index')}}">General Supplies</a>
            </li>
            <li class="drop-down">
                <a href="{{route('product.filtration.index')}}">Filtration</a>
                <ul>
                    <li>
                        <a href="{{route('product.filtration.supplier.index', 'japan-air-filter')}}">
                            Japan Air Filter</a>
                    </li>
                </ul>
            </li>
        </ul>
        @endslot
    </x-static-header>

    {{-- Hero --}}
    <x-static-hero>
        @foreach ($banners as $banner)
        <div class="owl-wrapper hero">
            <div class="owl-items">
                <img src="{{route('bannerImage', $banner->image)}}" alt="">
            </div>
        </div>
        @endforeach
    </x-static-hero>

    <main id="main">

        {{-- Companies section --}}
        <x-static-companies />

        {{-- About us section --}}
        <x-static-about />

        {{-- Services setion --}}
        <x-static-services />

        {{-- testimonials section --}}
        <x-static-testimonials />

        {{-- Portfolio setion --}}
        <x-static-portfolio />

        {{-- Contact setion--}}
        <x-static-contact />

    </main>

    {{-- Footer --}}
    <x-static-footer />

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <script src="{{mix('js/app.js')}}" `></script>
    <script src="{{mix('js/vendor.js')}}" `></script>
    <script src="{{mix('js/main.js')}}"></script>
    <script src="{{asset('js/additional.js')}}"></script>
    <script src="{{asset('libs/slick/slick.min.js')}}"></script>
    <script>
        $(function (){
            setTimeout(() => {
                $('body').removeClass('preloader-show').fadeIn();
                $('.preloader').fadeOut();
            }, 1500);
        })
        $(document).ready(function(){
            $('.single-item').slick({
                dots: true,
                infinite: true,
                speed: 1000,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 4000,
            });
            $('.multiple-slide').slick({
                dots: true,
                infinite: true,
                speed: 1000,
                slidesToShow: 4,
                // autoplay: true,
                // autoplaySpeed: 4000,
                responsive: [
                    {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                }]
            });
        });
    </script>

</body>

</html>
