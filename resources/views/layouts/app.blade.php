<!DOCTYPE html>
<html class="no-js" lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'My Store')</title>

    {{-- Google Fonts (حسب القالب) --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    {{-- CSS من القالب --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui-range-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utility.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bundle.css') }}">
    {{-- لو تحب تغيّر اللون: استبدل bundle.css بملف اللون مثل app.color3.css --}}
    @yield('styles')

    {{-- مهم لتصحيح الروابط النسبية داخل الصفحات الفرعية --}}
    <base href="{{ url('/') }}/">
</head>
<body>

<div id="app">
    @include('partials.header')
 @include('partials.head')
    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</div>

{{-- JS من القالب (رتّب: vendor/المكتبات قبل app.js) --}}
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/jquery.shopnav.js') }}"></script>
<script src="{{ asset('js/map-init.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
