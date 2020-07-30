<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sinar Sejahtera Inti company profile">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} | @yield('title')</title>

    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet' " href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href=" {{mix('css/vendor.css')}}">

    @stack('styles')
</head>

<body class="preloader-show">
    @php
    use App\Utilities\Generator as G;
    @endphp

    {{-- Header --}}
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light">
                    <a href="index.html">
                        <svg id="svglogo" width="65" height="65" viewBox="0 0 97 97" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <rect x="48.9939" y="-2.5858" width="72.3974" height="72.3974" rx="10"
                                    transform="rotate(45.2456 48.9939 -2.5858)" fill="#2F308B" stroke="white"
                                    stroke-width="2" />
                                <path
                                    d="M15.96 40.34a9.76 9.76 0 011.44-4.44 9.1 9.1 0 012.9-2.84 11.8 11.8 0 013.86-1.5c1.42-.3 2.85-.45 4.3-.45 1.19 0 2.35.05 3.49.15a64.7 64.7 0 017.18 1.02c.2.05.3.14.3.27l-.06.3-.36 1.75c-.04.12-.09.19-.15.22a.46.46 0 01-.15.03c-.71 0-1.33.12-1.85.36-.52.25-.95.59-1.3 1.03-.34.44-.6.96-.78 1.56-.18.6-.3 1.25-.36 1.95L32.95 57.5c-.13 1.44-.5 2.79-1.1 4.06a10.2 10.2 0 01-2.51 3.32c-1.08.94-2.4 1.69-3.96 2.24-1.56.56-3.35.83-5.37.83a37.8 37.8 0 01-3.9-.2 50.1 50.1 0 01-7.67-1.36c-.2-.05-.3-.14-.3-.27l.06-.27L8.6 64c.03-.12.07-.18.12-.2a.4.4 0 01.17-.05c.72 0 1.38-.1 1.98-.31a3.9 3.9 0 001.61-1.05c.46-.5.83-1.13 1.13-1.9.3-.79.52-1.75.63-2.89l1.7-17.26zm7.54 25.3c1.24-.3 2.3-.73 3.2-1.3a8.98 8.98 0 004.2-6.84l1.47-17.75c.04-.65.14-1.27.29-1.85.16-.59.37-1.12.63-1.59a4.3 4.3 0 011.03-1.2c.42-.34.92-.57 1.49-.7a7.09 7.09 0 00-2.79.58c-.68.34-1.2.78-1.58 1.3-.38.5-.64 1.06-.78 1.68a14.8 14.8 0 00-.27 1.78l-1.5 17.75a9.73 9.73 0 01-1.61 4.52 10.59 10.59 0 01-3.78 3.61zm19.13-25.3a9.76 9.76 0 011.44-4.44 9.1 9.1 0 012.9-2.84 11.8 11.8 0 013.87-1.5c1.41-.3 2.84-.45 4.3-.45 1.18 0 2.34.05 3.48.15a64.69 64.69 0 017.18 1.02c.2.05.3.14.3.27l-.05.3-.37 1.75c-.03.12-.08.19-.15.22a.46.46 0 01-.14.03c-.72 0-1.34.12-1.86.36-.52.25-.95.59-1.3 1.03-.33.44-.6.96-.77 1.56-.18.6-.3 1.25-.37 1.95L59.62 57.5a11.9 11.9 0 01-1.1 4.06 10.2 10.2 0 01-2.5 3.32c-1.08.94-2.4 1.69-3.96 2.24-1.57.56-3.36.83-5.37.83a37.8 37.8 0 01-3.91-.2 50.1 50.1 0 01-7.67-1.36c-.2-.05-.29-.14-.29-.27l.05-.27.41-1.85c.04-.12.08-.18.13-.2a.4.4 0 01.17-.05c.71 0 1.37-.1 1.97-.31a3.9 3.9 0 001.62-1.05c.45-.5.83-1.13 1.12-1.9.3-.79.52-1.75.63-2.89l1.71-17.26zm7.55 25.3c1.23-.3 2.3-.73 3.2-1.3a8.98 8.98 0 004.2-6.84l1.46-17.75c.05-.65.15-1.27.3-1.85.15-.59.37-1.12.63-1.59a4.3 4.3 0 011.02-1.2c.43-.34.92-.57 1.5-.7a7.09 7.09 0 00-2.8.58c-.68.34-1.2.78-1.58 1.3-.37.5-.63 1.06-.78 1.68-.13.62-.22 1.21-.27 1.78L55.57 57.5a9.73 9.73 0 01-1.61 4.52 10.6 10.6 0 01-3.78 3.61zM67 35.35c0-.57.05-1.07.15-1.49.1-.42.28-.77.56-1.05.28-.3.66-.51 1.15-.66a6.8 6.8 0 011.9-.22h10.89c.94 0 1.66.14 2.15.42.5.27.85.62 1.05 1.05.21.4.32.84.34 1.31.02.46.02.88.02 1.27v27.05c0 .38-.03.8-.1 1.25-.06.46-.22.89-.48 1.3-.26.38-.66.72-1.2 1-.53.27-1.28.41-2.22.41H70.77a6.8 6.8 0 01-1.9-.22 2.68 2.68 0 01-1.15-.63 2.12 2.12 0 01-.56-1.05c-.1-.43-.15-.92-.15-1.5V35.37zm16.14.2c0-.36-.03-.65-.07-.86a.72.72 0 00-.3-.46 1.05 1.05 0 00-.58-.2 7.5 7.5 0 00-.95-.05v30.96c.39 0 .7 0 .95-.03.24-.03.44-.1.58-.2a.82.82 0 00.3-.45c.05-.22.07-.5.07-.88V35.55z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="97" height="97" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span style="font-size: 17px; text-transform:uppercase; font-weight: 800; letter-spacing: 2px;">
                            Sinar Sejahtera Inti
                        </span>
                    </a>
                    {{-- <a href="index.html"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a> --}}
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li>
                        <a href="{{route('index')}}">Beranda</a>
                    </li>
                    <li>
                        <a href="{{route('index')}}">Tentang Kami</a>
                    </li>
                    <li class="drop-down {{request()->routeIs('product*')? 'active' : ''}}">
                        <a href="javascript:void(0)">Produk</a>
                        <ul>
                            @foreach ($productCategories as $category)
                            <li class="{{(! $category->subcategories->isEmpty()) ? 'drop-down' : ''}}">
                                <a href="javascript:void(0)">{{$category->name}}</a>
                                @if (! $category->subcategories->isEmpty())
                                <ul>
                                    @foreach ($category->subCategories as $sub)
                                    <li class="{{(! $sub->suppliers->isEmpty()) ? 'drop-down' : ''}}">
                                        <a href="{{route('product.subCategory.index',
                                             [G::uriSegment(1), $sub->slug_name])}}">
                                            {{$sub->name}}
                                        </a>
                                        <ul>
                                            @foreach ($sub->suppliers as $supplier)
                                            <li>
                                                <a
                                                    href="{{route('product.vendor.index', [$category->slug_name, $sub->slug_name, $supplier->slug_name])}}">
                                                    {{$supplier->name}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('index')}}">Servis</a>
                    </li>
                    <li class="{{request()->routeIs('contact*')? 'active' : ''}}">
                        <a href="{{route('contact')}}">Hubungi Kami</a>
                    </li>
                    <li>
                        <label for="" class="toggle-search">
                            <i class="bx bx-search"></i>
                        </label>
                    </li>
                </ul>
            </nav>

        </div>
    </header>

    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="search-box">
                        <div class="search">
                            <i class="bx bx-search"></i>
                            <input type="text" class="form-control-sm form-control" name="search"
                                placeholder="Cari disini...">
                            <i class="bx bx-x px-2" id="reset-input" style="cursor: pointer" title="Hapus semua"></i>
                        </div>
                        <ul class="result">
                            <li id="res-not-found">Data tidak ditemukan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main style="margin-top: 80px">
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-static-footer />

    <a href="javascript:void(0)" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/vendor.js')}}"></script>
    <script src="{{mix('js/main.js')}}"></script>
    <script src="{{asset('js/additional.js')}}"></script>

    @stack('scripts')

</body>

</html>
