<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Dashboard MEC</title>
    {{-- <title>{{ $pageTitle }}</title> --}}
    @vite('resources/sass/app.scss')
</head>

<body>
    @yield('content')
    @include('sweetalert::alert')
    @vite('resources/js/app.js')
    @vite('resources/js/main.js')
    @stack('scripts')

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const burgerMenu = document.getElementById("burger-menu");
    const sidebar = document.getElementById("sidebar");

    burgerMenu.addEventListener("click", function() {
        sidebar.style.display = "none";
    });
});

</script>

</html>
