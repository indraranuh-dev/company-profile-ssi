<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sinar Sejahtera Inti company profile">

    <title>{{config('app.name')}}</title>

    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet' " href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href=" {{mix('css/vendor.css')}}">

    @stack('styles')
</head>

<body class="preloader-show">

    {{-- Header --}}
    <x-static-header>
        @slot('produk')
        <ul>
            @foreach ($productCategories as $category)
            <li class="{{(! $category->subcategories->isEmpty()) ? 'drop-down' : ''}}">
                <a href="javascript:void(0)">{{$category->name}}</a>
                @if (! $category->subcategories->isEmpty())
                <ul>
                    @foreach ($category->subCategories as $sub)
                    <li class="{{(! $sub->suppliers->isEmpty()) ? 'drop-down' : ''}}">
                        <a href="javascript:void(0)">{{$sub->name}}</a>
                        <ul>
                            @foreach ($sub->suppliers as $supplier)
                            <li>
                                <a href="{{route('product.index', [$sub->slug_name, $supplier->slug_name])}}">
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
        @endslot
    </x-static-header>

    <main style="margin-top: 80px">
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-static-footer />

    <a href="javascript:void(0)" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <script src="{{mix('js/app.js')}}" `></script>
    <script src="{{mix('js/vendor.js')}}" `></script>
    <script src="{{mix('js/main.js')}}"></script>

    @stack('scripts')

</body>

</html>
