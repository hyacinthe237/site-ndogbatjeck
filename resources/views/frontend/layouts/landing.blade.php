<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#27B086">
    <meta name="theme-color" content="#27B086">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,500,600|Roboto:300,500,600|PT+Sans:300,500,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico" >
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ mix('/assets/css/app.css') }}">
    <title>Association Ndog Batjeck</title>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ mix('/assets/js/manifest.js') }}"></script>
    <script src="{{ mix('/assets/js/vendor.js') }}"></script>
    <script src="{{ mix('/assets/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
