<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
        <script src="js/app.js"></script>
        <script src="js/plantilla.js"></script>
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="js/jquery.min.js" ></script>
        <script src="js/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
        <!-- <script src="js/Chart.min.js" ></script> -->
        <script src="js/pace.min.js" ></script>
        <script src="js/template.js" ></script>
        <!-- <script src="js/sweetalert2.all.js" ></script> -->


        <!-- <script src="{{ asset('js/popper.min.js') }}"></script> -->
</body>
</html>
