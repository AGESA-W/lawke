@extends('layouts.app')
@section('content')
    <div class="about">
        <div class="about-jumbotron">
            <div class="jumbotron text-center">
                <h3 class="about-jumbotron-text"><strong>Changing how people <br> get legal help </strong></h3>
            </div>
        </div>
        <h1 class="text-center mt-3"><strong>LEGALCARE</strong></h1>
        <p class="text-center well text-color"><b>Legalcare was founded in Nairobi, Kenya to make legal easier and <br> help people find a lawyer.</b> </p>
        
    </div>
    <div class="why">
        <div class="row">
            <div class="col-12 col-md-6 mr-0">
                <img class="img-responsive" src="./images/about background.jpg" alt="" style="width:530px;height:380px;">
            </div>
            <div class="col-12 col-md-6" style=" margin-left:-40px;">
                <div class="right-side" style="">
                    <h1> <b>Why Legalcare?</b>  </h1>
                    <p>We believe that more information helps you make better decisions. At Legalcare, we provide you with detailed information on lawyers  so that you can make the choices that are right for you.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-plain mt-5">
        <div class="about-plain-jumbotron">
            <div class="jumbotron text-center pt-0">
                <h1 class="about-plain-jumbotron-text" ><strong>What people are saying</strong></h1>
                <span class="fa fa-quote-left fa-3x text-color"></span>
                <blockquote>Thanks for the legal advice. I was able to get <b>clarity of my rights</b> <p> and <b>what to expect</b> during my case.</p>
                   <div class="text-muted">– Small claims client</div> </blockquote>
            </div>
        </div>
        
    </div>

    <div class="about-last mt-0">
        <h1 class="text-center"><b>Legal help when and how you need it</b></h1>
        <div class="row">
            <div class="col-12 col-md-6 ">
                <div class="about-last-right-side">
                    <h1> <b>95%</b>  </h1>
                    <h5><b>of lawyers in Kenya are registered on Legalcare.</b> </h5>
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