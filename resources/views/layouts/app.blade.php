<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('bs/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    @yield('customcss')
</head>

<body>
    <div id="app" class="my-5 py-4">
        @include('layouts.nav')
        <main>
            @yield('content')
        </main>
        <footer id="sticky-footer" class="py-2 bg-dark text-white fixed-bottom">
            <div class="container text-center">
                <small>Copyright &copy;
                    <a href="{{ route('dashboard') }}" class="text-white">
                        Lelangin<strong>Store</strong>
                    </a>
                </small>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('bs/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    @yield('customjs')
</body>

</html>
