
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LEGALMEET') }}</title>

         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        {{-- <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        

        <style>
            .header {
            border-width: 0;
            border-style: solid;
            border-bottom-width: 5px;
            background-color: white;
            font-family: "Circular", Avenir Next, Avenir, Century Gothic, sans-serif;
            z-index: 1000;
            padding:5px 0px 5px 0px;
            background:#afa939
            }
            .v-border-blue {
                border-bottom-color: #afa939 !important;
            }
            .brand{
                font-weight:600;
                text-decoration: none;
                font-size:28px;
                /* color:#afa939; */
                color:#fff;

            }
            .contact-container{
                text-rendering: optimizeLegibility;
                color: #333;
                font-size: 17px;
                line-height: 1.55555556;
                font-family: "Poppins", Arial, sans-serif !important;

            }
        </style>
    </head>
    <body>
        <div id="app">
            <header class="header v-border-blue">
                <div class="container">
                  <div class="col-xs-12 text-center">
                    <a href="/" target="_blank" class="text-decoration-none">
                      <span class="brand">LEGALMEET</span>
                    </a>
                  </div>
                </div>
            </header>
            @include('partials.messages')
            <main>
                <div class="container mt-3 contact-container">
                    @yield('content')
                </div>
            </main>
            @include('partials.footer')
        </div>
    </body>
   
</html>
