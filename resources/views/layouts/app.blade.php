<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8  flex justify-between">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}

            <!-- Page Content -->
            <main class="mt-50">
                {{ $slot }}
            </main>

            <footer class="pt-14">
                @include('layouts.footer')
            </footer>

        </div>
        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.roundabout-1.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() { //Start up our Featured Project Carosuel
                $('#featured ul').roundabout({
                    easing: 'easeOutInCirc',
                    duration: 600
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>--}}
    </body>
</html>
