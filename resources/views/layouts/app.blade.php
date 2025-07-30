<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ST5 Market</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
