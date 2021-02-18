<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', APP_NAME) }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

    </head>
    <body class="c-app">

    {{--include left sidebar component--}}
{{--    <x-layouts.left-sidebar/>--}}

    <div class="c-wrapper c-fixed-components">
        {{--include navbar livewire component--}}
        <livewire:layouts.navbar/>

        {{--include header component--}}
        <x-layouts.header :header="$header"/>

        <!-- Page Content -->
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        {{ $slot }}
                    </div>
                </div>
            </main>

            <!-- App Footer -->
            <x-layouts.footer/>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
    @if(\Osiset\ShopifyApp\getShopifyConfig('appbridge_enabled'))
        <script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
        <script>
            var AppBridge = window['app-bridge'];
            var createApp = AppBridge.default;
            var app = createApp({
                apiKey: '{{ \Osiset\ShopifyApp\getShopifyConfig('api_key') }}',
                shopOrigin: '{{ Auth::user()->name }}',
                forceRedirect: true,
            });
        </script>

        @include('shopify-app::partials.flash_messages')
    @endif
    </body>
</html>
