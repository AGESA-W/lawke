@extends('layouts.app')
@section('content')
    <div class="about">
        <div class="about-jumbotron">
            <div class="jumbotron text-center">
                <h3 class="about-jumbotron-text"><strong>Changing how people <br> get legal help </strong></h3>
            </div>
        </div>
        <h1 class="text-center mt-2" ><strong>LEGALMEET</strong></h1>
        <p class="text-center well text-color" style="font-size:16px"><b>Legalmeet was founded in Kenya to aid in the process of obtainig legal services.<br> It connects clients with lawyers.</b> </p>
        
    </div>
    <div class="why"style="margin-top:530px;">
        <div class="row">
            <div class="col-12 col-md-6 mr-0">
                <img class="img-responsive" src="./images/about background.jpg" alt="" style="width:530px;height:380px;">
            </div>
            <div class="col-12 col-md-6" style=" margin-left:-40px;">
                <div class="right-side" style="">
                    <h1> <b>Why Legalmeet?</b>  </h1>
                    <p>We believe that more information helps you make better decisions. At Legalmeet, we provide you with detailed information on lawyers  so that you can make the choices that are right for you.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="people-saying mt-5">
        {{-- <p class="about-plain-jumbotron-text"><strong>What People Are Saying <br>About LegalCare </strong></p> --}}
        {{-- <h1 class="about-plain-jumbotron-text text-center" ><strong>What People Are Saying <br>About LegalCare</strong></h1> --}}
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background:#e9ecef;position: absolute;left:0;right:0;">
        <h1 class="about-plain-jumbotron-text text-center" ><strong>What People Are Saying <br>About LegalMeet</strong></h1>

            <ol class="carousel-indicators mt-4">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item text-center active">
                    <span class="fa fa-quote-left fa-3x text-color"></span>
                    <blockquote class="mb-5">I needed assistance with some legal matters and didn't know where to go <b>I found LegalCare</b> <p> and decided to give it a try <b>It was very helpful</b> am very satisfied.</p>
                    <div class="text-muted ">– Small claims client</div> </blockquote>
              </div>
              <div class="carousel-item text-center">
                    <span class="fa fa-quote-left fa-3x text-color"></span>
                    <blockquote class="mb-5">Thanks for the legal advice. I was able to get <b>clarity of my rights</b> <p> and <b>what to expect</b> during my case.</p>
                    <div class="text-muted">– Small claims client</div> </blockquote>
              </div>
              <div class="carousel-item text-center">
                    <span class="fa fa-quote-left fa-3x text-color"></span>
                    <blockquote class="mb-5">Thanks for the legal advice. I was able to get <b>clarity of my rights</b> <p> and <b>what to expect</b> during my case.</p>
                    <div class="text-muted">– Small claims client</div> </blockquote>
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

    {{-- <div class="about-plain mt-5">
        <div class="about-plain-jumbotron">
            <div class="jumbotron text-center pt-0">
                <h1 class="about-plain-jumbotron-text" ><strong>What people are saying</strong></h1>
                <span class="fa fa-quote-left fa-3x text-color"></span>
                <blockquote>Thanks for the legal advice. I was able to get <b>clarity of my rights</b> <p> and <b>what to expect</b> during my case.</p>
                   <div class="text-muted">– Small claims client</div> </blockquote>
            </div>
        </div>
        
    </div> --}}

    <div class="about-last " style="margin-top: 400px;">
        <h1 class="text-center"><b>Legal help when and how you need it</b></h1>
        <div class="row">
            <div class="col-12 col-md-6 ">
                <div class="about-last-right-side">
                    <h1> <b>95%</b>  </h1>
                    <h5><b>of lawyers in Kenya are registered on Legalmeet.</b> </h5>
                    <p class="pt-4">Imagine having nearly every licensed lawyer in Kenya right at your fingertips, the moment you need help. Legalcare has that, plus detailed profiles and reviews</p>
                    <button class="btn bg-color"><b>Find your Lawyer</b> </button>
                </div>
              
            </div>
            <div class="col-12 col-md-6" style=" margin-left:-30px;">

                <img class="img-responsive" src="./images/about.jpg" alt="" style="width:530px;height:380px;">

            </div>
        </div>

    </div>
@endsection