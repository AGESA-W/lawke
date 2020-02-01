<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LAWKE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/typewriter.js') }}"></script>
    {{-- <script src="{{ asset('js/constituency.js') }}"></script> --}}

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
                        <span class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'LAWKE') }}
                        <p class="navbar-brand-logotxt">Justice.Innovation</p>
                        </span>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">Home</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">About</a>
                                </li>  
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">Attorneys</a>
                                </li>   
                                <li class="nav-item">
                                    <a href="/practice-areas" class="nav-link px-4">Practice Areas</a>
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
                                            {{ Auth::user()->firstname }} <span class="caret"></span>
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
                            <p class="text-uppercase mb-1"> <b>Welcome to lawke</b> </p>
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
                        <p class="showcase-para">We have help thousands of people to get relief from national wide fights wrongfull denials. Now they trust lawke attorneys</p>
                        <div class="showcase-btns">
                            <button class="btn btn-1 d-inline-block px-4 py-2 text-capitalize">get started <span class="fa fa-angle-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="container">
            <div class="col-12 col-md-12">
                <h2 class="text-center mt-3 mb-3"> <b> Top-rated lawyers near you</b></h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-deck">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-deck">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-deck">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="./images/profile.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Agesa Austin</h5>
                                                <p class="card-text">Reviews.</p>
                                                <p class="card-text">Location</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="text-uppercase">practice areas</h6>
                                            <p>your area</p>
                                            <h6>comment</h6>
                                            <p>one simple review</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <h2 class="text-center text-capitalize mb-3 mt-3"> <b>Browse Attorneys</b></h2>
         <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header p-0">
                  <ul class="nav nav-tabs nav-fill ml-auto pt-0">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Practice Area</a></li>
                    <li class="nav-item border-0"><a class="nav-link" href="#tab_2" data-toggle="tab">County</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Name</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      A wonderful serenity has taken possession of my entire soul,
                      like these sweet mornings of spring which I enjoy with my whole heart.
                      I am alone, and feel the charm of existence in this spot,
                      which was created for the bliss of souls like mine. I am so happy,
                      my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                      that I neglect my talents. I should be incapable of drawing a single stroke
                      at the present moment; and yet I feel that I never was a greater artist than now.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      Nairobi Mombasa
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                      <a href="#">A</a>
                      <a href="#">B</a>
                      
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
          </div>
          <div class="container">
              <div class="row mt-5">
                <div class="col-6 col-md-6">
                    <div class="mission">
   
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <h5 class="text-color font-weight-bolder">WELCOME TO LAWKE</h5>
                    <h2 class="mission-text">We always fight for your justice to win</h2>
                    <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique error quasi debitis voluptates vel perspiciatis possimus laborum! Enim, neque dolores?</p>
                    <div class="card mission-nav">
                        <div class="card-header p-0">
                          <ul class="nav nav-tabs nav-fill ml-auto pt-0">
                            <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Our Mission</a></li>
                            <li class="nav-item border"><a class="nav-link" href="#tab2" data-toggle="tab">Our Vision</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Our Values</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body text-secondary">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                                numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                                numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab3">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta tempora recusandae voluptatem
                               numquam in nobis quisquam laborum. Consectetur, nesciunt illo.
                            </div>
                            <!-- /.tab-pane -->
                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                </div>
              </div>
          </div>
          
        </div>
    </div>
    @include('partials.footer')
</body>
</html>
