<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="login&register/css/style.css">

    <title>{{ 'HRMS' }}</title>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
