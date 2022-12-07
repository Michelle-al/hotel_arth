<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- TODO Meta descrition--}}
    <title>Hôtel Arth</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/pictures/favicon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
    </style>
</head>
<body class="antialiased">
    <div id="app" class="app"></div>
    <script src="/js/app.js"></script>
</body>
</html>
