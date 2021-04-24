<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <title>@yield('title')</title>

    @yield('styles')
    @livewireStyles
</head>

<body>
    <x-navbar />
    <div class="mt-16">
        @yield('content')
    </div>

    @if (\Osiset\ShopifyApp\getShopifyConfig('appbridge_enabled'))
        <script
            src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\getShopifyConfig('appbridge_version') ? '@' . config('shopify-app.appbridge_version') : '' }}">
        </script>
        <script>
            var AppBridge = window['app-bridge'];
            var createApp = AppBridge.default;
            var app = createApp({
                apiKey: '{{ \Osiset\ShopifyApp\getShopifyConfig('api_key', Auth::user()->name) }}',
                shopOrigin: '{{ Auth::user()->name }}',
                forceRedirect: false,
            });

        </script>

        {{-- @include('shopify-app::partials.flash_messages') --}}
    @endif

    @livewireScripts
    <script src="https://unpkg.com/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

</body>

</html>

<style>
    html,
    body {
        width: 100%;
        height: 100%
    }

</style>
