<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LAWKE') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js')}}"defer ></script>
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
                <nav class="navbar navbar-home navbar-expand-md">
                    <div class="container">
                        <span class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'LEGALCARE') }}
                        <p class="navbar-brand-logotxt">Justice.Innovation</p>
                        </span>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="/" class="nav-link px-4">Home</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/about" class="nav-link px-4">About</a>
                                </li>  
                                  
                                <li class="nav-item">
                                    <a href="/practice-areas" class="nav-link px-4">Practice Areas</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a href="/contact" class="nav-link px-4">Contact</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link px-4">For Lawyers</a>
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
                            <p class="text-uppercase mb-1"> <b>Welcome to legalcare</b> </p>
                        </div>
                        <div class="showcase-text">
                            <h1>Lawyers Fighting For Your 
                                <span
                                    class="txt-type"
                                    data-wait="2000"
                                    data-words='[ "Freedom.", "Rights.", "Case.", "Custody." ]'>
                                </span>
                            </h1>
                        </div>
                        <p class="showcase-para">We have help thousands of people to get relief from national wide fights wrongfull denials. Now they trust lawke attorneys</p>
                        <div class="showcase-btns">
                            <a href="/search" class="text-decoration-none btn btn-1 d-inline-block px-4 py-2">Find your lawyer <span class="fa fa-angle-right"></span></a>
                            {{-- <button class="btn btn-1 d-inline-block px-4 py-2">Find your lawyer <span class="fa fa-angle-right"></span></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="container">
            <div class="col-12 col-md-12">
                <h2 class="text-center mt-3 mb-3"> <b> Top-rated lawyers near you</b></h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($attorneys->chunk(3) as $attorneychunk)
                            <div class="carousel-item  @if($loop->first)active @endif">
                                <div class="card-deck">
                                    @foreach ($attorneychunk as $attorney)
                                        <div class="card home-card mb-3 p-2">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="{{$attorney->image}}" class="card-img" alt="..." style="width:120px;height:130px;">
                                                </div>
                                                <div class="col-md-8 ">
                                                    <div class="card-body">
                                                        <ul class="list-unstyled mb-0"style="margin-top:-18px">
                                                            <li><a href="/profile/{{$attorney->id}}" class="text-decoration-none home-card-name card-title pt-0" >{{$attorney->firstname}} {{$attorney->lastname}}</a></li>
                                                            <li><star-rating :star-size="17" active-color="#fc9735" :rating="{{$attorney->getStarRating()}}"></star-rating> <a href="/profile/{{$attorney->id}}#review" class="text-decoration-none">{{$attorney->reviewCount()}} review(s)</a></li>
                                                        </ul>
                                                        <small class="text-muted mt-0"><b>LOCATION</b></small>
                                                        <p><span class="fa fa-map-marker text-secondary"style="font-size:16px;"> </span> {{$attorney->county}} County</p>
                                                    </div>
                                                </div>
                                                <div class="card-body pl-0">
                                                    <h6 class="text-uppercase text-muted mb-0" style="margin-top:-40px;font-size:12px;"><b>practice area</b></h6>
                                                    <p class="mt-0">@foreach ($attorney->practiceareas->take(1) as $area){{$area->area_practice}}@endforeach</p>
                                                    <hr class="home-card-hr">
                                                    @foreach ($attorney->reviews->take(1) as $review)
                                                        <p class="home-card-headline">{{$review->headline}} </p>
                                                        <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating><span class="text-secondary" style="">Posted by</span> {{$review->user->name}}</small>
                                                        <small class="text-secondary">{{ date('d M,Y', strtotime($review->created_at)) }}</small>
                                                        <p  class="home-card-description mb-0">{{substr($review->description,0,127)}}{{strlen($review->description)>127 ?"...":""}}</p>
                                                        <a class="text-decoration-none" href="/profile/{{$attorney->id}}#review">Read more</a>
                                                    @endforeach
                                                </div>
                                            </div>  
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <a class="carousel-control-prev mr-lg-4" style="margin-left:-100px;"  href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="fa fa-chevron-left" style="color:#333" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" style="margin-right:-100px;"  href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="fa fa-chevron-right" style="color:#333" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <h2 class="text-center text-capitalize mb-3 mt-3"> <b>Browse Lawyers</b></h2>
         <div class="col-12 col-md-12">
            <div class="attorney-card card">
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
                        @foreach ($practiceareas->chunk(4) as $practiceareachunk)
                            <div class="row">
                                @foreach ($practiceareachunk as $practicearea)
                                <div class="col-md-3">
                                    <ul class="list-unstyled">
                                         <li> <a href="/practice-areas/{{$practicearea->area_practice}}" class="attorney-card-link text-decoration-none">{{$practicearea->area_practice}}</a> </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @foreach ($locations->chunk(4) as $locationchunk)
                        <div class="row">
                            @foreach ($locationchunk as $location)
                            <div class="col-md-3">
                                <ul class="list-unstyled">
                                    <li> <a href="/all-lawyers/{{$location->county}}" class="attorney-card-link text-decoration-none">{{$location->county}} Lawyers</a> </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                      
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
                    <h5 class="text-color font-weight-bolder">WELCOME TO LEGALCARE</h5>
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
                                To provide legal service with quality member services and promote the rule of law, through advocacy and good governance.
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab2">
                                
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
