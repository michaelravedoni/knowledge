<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

        <title>{{ config('app.name') }} | @yield('title')</title>
        @if(file_exists($favIcon = storage_path('app/public/favicon.png')))
            <link href="{{ asset('storage/favicon.png') }}?v={{ md5_file($favIcon) }}" rel="icon" type="image/x-icon"/>
        @endif

        {!! $brandColors !!}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('scripts')
        <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
        @stack('head')

        @include('partials.meta')
        @if($blockRobots)
            <meta name="robots" content="noindex">
        @endif

    </head>
    <body>
        @include('partials.navigation')
        <main>
            {{ $slot }}
        </main>
        @include('partials.footer')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
        @stack('bottom')
        {!! app(\App\Settings\GeneralSettings::class)->custom_scripts !!}
    </body>
</html>
