<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard MEC</title>
    {{-- <title>{{ $pageTitle }}</title> --}}
    @vite('resources/sass/app.scss')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
</head>

<body>
    @include('layouts.nav')
    @yield('content')
    @include('sweetalert::alert')
    @vite('resources/js/app.js')
    @vite('resources/js/main.js')
    @stack('scripts')

</body>


</html>
