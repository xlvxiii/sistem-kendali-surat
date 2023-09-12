<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title != null ? $title : config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- sb2admin -->
    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb2admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb2admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Mazer template --}}
    <link rel="stylesheet" href="{{ asset('mazer/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('mazer/css/shared/iconly.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/extensions/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/css/pages/simple-datatables.css') }}">
    {{-- end of mazer --}}

</head>

<body>
    <div id="app">


        <main class="">
            @include('partials.navbar')
            @yield('content')
        </main>
    </div>

    <!-- sb2admin -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb2admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb2admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb2admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb2admin/js/sb-admin-2.min.js') }}"></script>

    {{-- mazer --}}
    <script src="{{ asset('mazer/js/bootstrap.js') }}"></script>
    <script src="{{ asset('mazer/js/app.js') }}"></script>


    <script src="{{ asset('mazer/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('mazer/js/pages/sweetalert2.js') }}"></script>

    <script src="{{ asset('mazer/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/js/pages/simple-datatables.js') }}"></script>
    {{-- end of mazer --}}

</body>

</html>
