<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta name="turbo-cache-control" content="no-cache">

    <title>@yield('title', 'Hoàng Thịnh Luật')</title>

    <link rel="preload" href="{{ Vite::asset('public/assets/fonts/SVN-Poppins/SVN-Poppins-Medium.ttf') }}" as="font" type="font/ttf" crossorigin>
    @if (request()->routeIs('home'))
        <link rel="preload" href="{{ Vite::asset('public/assets/fonts/UTM Times/UTMTimesBold.ttf') }}" as="font" type="font/ttf" crossorigin>
    @endif
    {{ Vite::fonts('bebas-neue') }}
    @php
        Vite::useScriptTagAttributes(['data-turbo-track' => 'reload']);
        Vite::useStyleTagAttributes(['data-turbo-track' => 'reload']);
    @endphp
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- pop-up thông báo ở góc phải dùng chung --}}
    <div id="site-toast-region"
         class="site-toast-region"
         data-toast-region data-turbo-permanent></div>

</body>
</html>
