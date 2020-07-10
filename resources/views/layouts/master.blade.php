<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{mix('css/main/app.css')}}">
    @stack('styles')
</head>

<body>

    {{-- preloader --}}
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <x-navbar />
        <x-sidebar />

        <div class="page-wrapper">

            @yield('content')

        </div>

        <script src="{{mix('js/main/app.js')}}"></script>
        <script src="{{asset('libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{mix('js/main/main.js')}}"></script>
        @stack('scripts')

</body>

</html>