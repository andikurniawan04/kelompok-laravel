{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet" />


    <!-- Datables CSS -->
    <link rel="stylesheet" href="{{ url('vendors/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ url('vendors/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ url('vendors/bootstrap-icons/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ url('css/app.css') }}" />
    <title>Inventory</title>
</head>

<body>
    <div id="app">
        @include('layouts/partials/sidebar')
        <div id="main" class="layout-navbar">
            @include('layouts/partials/header')
            <div id="main-content">
                @yield('content')
                @include('layouts/partials/footer')
            </div>

        </div>

    </div>

    <script src="{{ url('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('vendors/simple-datatables/simple-datatables.js') }}"></script>
    {{-- <script>
        // Simple Datatable
        let table1 = document.querySelector("#table1");
        let dataTable = new simpleDatatables.DataTable(table1);
    </script> --}}
    <script src="{{ url('js/main.js') }}"></script>
</body>

</html>
