<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | UniManage SMS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="app">
    @include('layouts.header')

    @auth
        @include('layouts.nav')
    @endauth

    <main class="site-main">
        {{-- Flash messages and validation summary --}}
        @if (session('success'))
            <div class="alert alert--success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert--error">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert--error">Please fix the {{ $errors->count() }} {{ Str::plural('error', $errors->count()) }} below.</div>
        @endif

        @yield('content')
    </main>

    @include('layouts.footer')

    @stack('modals')
</div>
</body>
</html>
