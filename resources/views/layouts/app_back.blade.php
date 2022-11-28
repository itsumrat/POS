<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sanghu Group Ltd | ERP</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}css/layout.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/color.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/master.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/modal.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/pos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    @include('partial.sidebar')
                </div>
                <div class="col-10">
                    <main class="py-4">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    @yield('scripts')
    @yield('styles')
</body>

</html>