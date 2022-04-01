<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cofre de Poupança dos Táxista') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/datatables2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/boxicons/css/boxicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/remixicon/remixicon.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/simple-datatables/style.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{asset('material/boxicons/css/boxicons.min.css')}}" rel="stylesheet" type="text/css" />
    


</head>

<body style="background:#eaf0f7">


    <!-- Inicio da Content -->
    @yield('content')
    <script src="{{ url('datatables/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    <script src="{{ url('material/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('material/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('material/quill/quill.min.js') }}"></script>
    <script src="{{ url('material/simple-datatables/simple-datatables.js') }}"></script>
</body>
</html>
