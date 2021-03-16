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



        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.roundabout-1.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="js/aos.js"></script>
        <script type="text/javascript">
            $(document).ready(function() { //Start up our Featured Project Carosuel
                $('#featured ul').roundabout({
                    easing: 'easeOutInCirc',
                    duration: 600
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8  flex justify-between">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

             <!-- Page Footer -->
            <footer class="bg-white shadow footer">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-around align-middle">
                    <a style="display: flex" class="navbar-brand" href="{{ url('/') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> &copy {{ config('app.name', 'Laravel') }}
                    </a>
                    <a href="https://www.galacentre.ru/" target="_blank" class="gc-link">
                        <svg class="gc-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 555 92.7">
                                <path d="M155.66,66.28h-6.61V61.6h18.92v4.68h-6.72v19.95h-5.59V66.28z"/>
                                <path d="M192.26,73.66c0,8.07-4.9,12.97-12.09,12.97c-7.31,0-11.58-5.52-11.58-12.53c0-7.38,4.71-12.89,11.98-12.89C188.13,61.2,192.26,66.86,192.26,73.66z M174.47,73.99c0,4.82,2.26,8.22,5.99,8.22c3.76,0,5.92-3.58,5.92-8.37c0-4.42-2.12-8.22-5.95-8.22C176.66,65.62,174.47,69.2,174.47,73.99z"/>
                                <path d="M195.92,61.93c1.72-0.29,4.13-0.51,7.53-0.51c3.43,0,5.88,0.66,7.53,1.97c1.57,1.24,2.63,3.29,2.63,5.7c0,2.41-0.8,4.46-2.26,5.84c-1.9,1.79-4.71,2.59-8,2.59c-0.73,0-1.39-0.04-1.9-0.11v8.8h-5.52V61.93z M201.43,73.11c0.48,0.11,1.06,0.15,1.86,0.15c2.96,0,4.79-1.5,4.79-4.02c0-2.27-1.57-3.62-4.35-3.62c-1.13,0-1.9,0.11-2.3,0.22V73.11z"/>
                                <path d="M232.05,61.6v4.57h-9.32v20.05h-5.59V61.6H232.05z"/>
                                <path d="M256.35,73.66c0,8.07-4.9,12.97-12.09,12.97c-7.31,0-11.58-5.52-11.58-12.53c0-7.38,4.71-12.89,11.98-12.89C252.22,61.2,256.35,66.86,256.35,73.66z M238.56,73.99c0,4.82,2.26,8.22,5.99,8.22c3.76,0,5.92-3.58,5.92-8.37c0-4.42-2.12-8.22-5.95-8.22C240.75,65.62,238.56,69.2,238.56,73.99z"/>
                                <path d="M260,61.93c1.46-0.29,4.42-0.51,7.2-0.51c3.4,0,5.48,0.33,7.27,1.39c1.72,0.91,2.96,2.59,2.96,4.82c0,2.19-1.28,4.24-4.06,5.26v0.07c2.81,0.77,4.9,2.89,4.9,6.07c0,2.23-1.02,3.98-2.56,5.22c-1.79,1.42-4.79,2.23-9.68,2.23c-2.74,0-4.79-0.18-6.03-0.37V61.93z M265.52,71.36h1.83c2.92,0,4.49-1.2,4.49-3.03c0-1.86-1.42-2.85-3.95-2.85c-1.21,0-1.9,0.07-2.38,0.15V71.36z M265.52,82.28c0.55,0.07,1.21,0.07,2.16,0.07c2.52,0,4.75-0.95,4.75-3.54c0-2.48-2.23-3.47-5.01-3.47h-1.9V82.28z"/>
                                <path d="M287.7,79.91l-1.75,6.32h-5.77l7.52-24.62H295l7.64,24.62h-5.99l-1.9-6.32H287.7z M293.94,75.74l-1.53-5.22c-0.44-1.46-0.88-3.29-1.24-4.75h-0.07c-0.37,1.46-0.73,3.32-1.13,4.75l-1.46,5.22H293.94z"/>
                                <path d="M303.81,86.22c0.51-0.8,0.91-1.75,1.24-2.78c0.99-2.81,1.57-5.7,3.43-7.49c0.55-0.55,1.28-0.95,2.05-1.28v-0.11c-2.74-0.51-5.19-2.41-5.19-5.99c0-2.3,1.02-4.05,2.56-5.22c1.9-1.46,4.9-1.94,8.04-1.94c2.7,0,5.3,0.22,7.09,0.51v24.29h-5.52v-9.68h-1.35c-1.1,0-1.97,0.33-2.63,0.95c-1.57,1.5-2.19,4.64-2.92,6.65c-0.26,0.73-0.44,1.32-0.88,2.08H303.81zM317.51,65.77c-0.4-0.07-1.13-0.22-2.27-0.22c-2.41,0-4.35,1.02-4.35,3.54c0,2.26,2.08,3.47,4.6,3.47c0.73,0,1.5-0.04,2.01-0.11V65.77z"/>
                                <path d="M355.14,61.6v24.62h-5.59V66.17h-8.73v20.05h-5.59V61.6H355.14z"/>
                                <path d="M378.67,61.6v24.62h-5.55V66.17h-5.59v5.84c0,6.32-0.8,11.18-4.53,13.37c-1.24,0.69-2.92,1.21-4.89,1.21l-0.69-4.49c1.2-0.15,2.19-0.66,2.81-1.32c1.5-1.54,1.86-4.68,1.86-8.4V61.6H378.67z"/>
                                <path d="M389.26,79.91l-1.75,6.32h-5.77l7.53-24.62h7.31l7.63,24.62h-5.99l-1.9-6.32H389.26z M395.51,75.74l-1.53-5.22c-0.44-1.46-0.88-3.29-1.24-4.75h-0.07c-0.37,1.46-0.73,3.32-1.13,4.75l-1.46,5.22H395.51z"/>
                                <path d="M409.87,66.28h-6.61V61.6h18.92v4.68h-6.72v19.95h-5.59V66.28z"/>
                                <path d="M438.33,60.58v2.15c5.22,0.37,10.48,3.43,10.48,11.11c0,7.6-5.11,10.67-10.56,11.18v2.23h-5.22v-2.23c-5.33-0.4-10.48-3.43-10.48-11c0-7.78,5.81-10.89,10.56-11.29v-2.15H438.33z M433.07,66.53c-2.15,0.29-4.93,2.19-4.93,7.38c0,4.82,2.74,6.94,4.93,7.23V66.53z M438.29,81.15c2.16-0.26,4.93-2.08,4.93-7.31c0-5.19-2.63-7.01-4.93-7.31V81.15z"/>
                                <path d="M475.05,73.66c0,8.07-4.89,12.97-12.09,12.97c-7.31,0-11.58-5.52-11.58-12.53c0-7.38,4.71-12.89,11.98-12.89C470.92,61.2,475.05,66.86,475.05,73.66z M457.26,73.99c0,4.82,2.26,8.22,5.99,8.22c3.76,0,5.92-3.58,5.92-8.37c0-4.42-2.12-8.22-5.95-8.22C459.45,65.62,457.26,69.2,457.26,73.99z"/>
                                <path d="M478.7,61.93c1.72-0.29,4.13-0.51,7.53-0.51c3.43,0,5.88,0.66,7.53,1.97c1.57,1.24,2.63,3.29,2.63,5.7c0,2.41-0.8,4.46-2.26,5.84c-1.9,1.79-4.71,2.59-8,2.59c-0.73,0-1.39-0.04-1.9-0.11v8.8h-5.52V61.93z M484.22,73.11c0.47,0.11,1.06,0.15,1.86,0.15c2.96,0,4.78-1.5,4.78-4.02c0-2.27-1.57-3.62-4.35-3.62c-1.13,0-1.9,0.11-2.3,0.22V73.11z"/>
                                <path d="M520.28,76.8c-0.11-2.96-0.22-6.54-0.22-10.12h-0.11c-0.77,3.14-1.79,6.65-2.74,9.53l-3,9.61h-4.35l-2.63-9.53c-0.8-2.89-1.64-6.39-2.23-9.61h-0.07c-0.15,3.32-0.26,7.12-0.44,10.19l-0.44,9.35h-5.15l1.57-24.62h7.42l2.41,8.22c0.77,2.85,1.53,5.92,2.08,8.8h0.11c0.69-2.85,1.53-6.1,2.34-8.84l2.63-8.18h7.27l1.35,24.62h-5.44L520.28,76.8z"/>
                                <path d="M536.1,79.91l-1.75,6.32h-5.77l7.52-24.62h7.31l7.64,24.62h-5.99l-1.9-6.32H536.1z M542.35,75.74l-1.53-5.22c-0.44-1.46-0.88-3.29-1.24-4.75h-0.07c-0.37,1.46-0.73,3.32-1.13,4.75l-1.46,5.22H542.35z"/>
                            <path d="M529.56,18.66v9.64h3.3c1.38,0,2.6-0.12,3.64-0.37c1.03-0.25,1.89-0.75,2.55-1.5c0.67-0.74,0.99-1.79,0.99-3.14c0-1.29-0.33-2.28-0.99-2.97c-0.66-0.68-1.52-1.13-2.56-1.35c-1.04-0.21-2.28-0.32-3.71-0.32H529.56z M515,48.54V9.62h25.71c1.69,0,3.36,0.22,4.98,0.66c1.64,0.44,3.16,1.17,4.58,2.18c1.41,1.02,2.56,2.41,3.42,4.15c0.86,1.76,1.3,3.88,1.3,6.38c0,3.24-0.63,5.94-1.9,8.09c-1.27,2.16-2.98,3.74-5.16,4.74c-2.17,1.01-4.6,1.52-7.29,1.52h-10.7v11.2H515z M511.66,9.62v11.5h-13.17v27.43h-14.93V21.11h-13.17V9.62H511.66z M452.11,23.05V9.62h14.95v38.92h-14.95v-14h-9.98v14h-14.96V9.62h14.96v13.43H452.11z M388.96,48.54V9.62h33.75v9.37h-19.14v5.52h18.29v9.37h-18.29v5.3h19.53v9.37H388.96z M371.24,48.54h-27.73V9.62h14.96v27.43h9.98V9.62h14.94v27.43h2.23v18.2h-14.38V48.54z M322.58,38.4v-9.71h15.62v9.71H322.58zM296.44,17.97l-4.29,12.79h8.65l-4.25-12.79H296.44z M272.8,48.54l13.66-38.92h20.6l13.88,38.92h-15.68l-2.56-8.41h-12.61l-2.4,8.41H272.8z M248.42,21.11v14.61c0,4.14-1.23,7.43-3.68,9.85c-2.44,2.43-6.39,3.63-11.82,3.63l-3.85-12.72c3.67,0,5.51-1.8,5.51-5.4V9.62h36.26v38.92h-14.95V21.11H248.42z M204.37,17.97l-4.29,12.79h8.65l-4.25-12.79H204.37zM180.72,48.54l13.66-38.92h20.6l13.88,38.92h-15.68l-2.56-8.41h-12.61l-2.4,8.41H180.72z M152.16,48.54V9.62h33.85v11.5h-18.9v27.43H152.16z"/>
                            <path d="M46.35,0c7.67,0,14.91,1.88,21.29,5.2C74.02,1.88,81.26,0,88.93,0c20.95,0,38.73,14.02,44.43,33.16h-17.39c-4.9-10-15.19-16.91-27.04-16.91c-2.32,0-4.57,0.26-6.74,0.76c3.86,4.7,6.81,10.17,8.59,16.14H73.39c-4.9-10-15.19-16.91-27.04-16.91c-16.57,0-30.09,13.52-30.09,30.09c0,16.57,13.52,30.09,30.09,30.09c11.29,0,21.16-6.28,26.31-15.52H31.62V45.13h44.79c0-0.01,0-0.02,0-0.03h16.27c0.01,0.41,0.02,0.83,0.02,1.24c0,11.11-3.95,21.33-10.51,29.33c2.17,0.5,4.43,0.76,6.74,0.76c12.8,0,23.77-8.06,28.11-19.37h16.98c-4.86,20.39-23.25,35.62-45.09,35.62c-7.67,0-14.91-1.88-21.29-5.2c-6.38,3.32-13.62,5.2-21.29,5.2C20.82,92.7,0,71.88,0,46.35C0,20.82,20.82,0,46.35,0"/>
                        </svg>
                    </a>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </body>
</html>
