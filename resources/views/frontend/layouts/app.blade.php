<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    
    @include('frontend.layouts.partials.styles')
    @yield('styles')
</head>
<body>

    <div id="app">
        @include('frontend.layouts.partials.header')
        @include('frontend.layouts.partials.nav')
        
        <!-- Main Content -->
        @yield('content')

        @include('frontend.layouts.partials.footer')
    </div>

    @include('frontend.layouts.partials.scripts')
    @yield('scripts')
</body>
</html>
