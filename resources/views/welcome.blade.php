<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main>
            <div class="background-image">
                <nav class="navbar navbar-home navbar-expand-md ">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'LAWKE') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">Homet</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">About</a>
                                </li>  
                                <li class="nav-item">
                                       <a href="#" class="nav-link px-4">Attorneys</a>
                                </li>   
                                <li class="nav-item">
                                     <a href="#" class="nav-link px-4">Practice Areas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">Case studies</a>
                                </li>
                                <li class="nav-item">
                                     <a href="#" class="nav-link px-4">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">Contact</a>
                                </li>
                            </ul>
                
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="wrapper col-md-6">
                        <div class="showcase-heading">
                            <h5 class="text-uppercase">Welcome to lawke</h5>
                        </div>
                        <div class="showcase-text">
                            <h1>Attorneys Fighting For Your 
                                <span
                                    class="txt-type"
                                    data-wait="2000"
                                    data-words='[ "Freedom.", "Rights.", "Case.", "Custody." ]'>
                                </span>
                            </h1>
                        </div>
                        <p class="showcase-para">We have help thousands of people to get relief from national wide fights wrongfull denials. Now they trusted legalcare attorneys</p>
                        <div class="showcase-btns">
                            <button class="btn btn-1 d-inline-block px-4 py-2 text-capitalize">get started</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
