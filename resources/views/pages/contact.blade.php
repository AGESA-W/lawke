@extends('layouts.app')
@section('content')
    <div class="contact">
        <div class="contact-jumbotron">
            <div class="jumbotron ml-0 text-left" style="padding-left:130px">
                <h3 class="contact-jumbotron-text"><strong>Legalmeet support</strong></h3>
                <h5 style="font-size:27px;">Need help? Select a topic below <br> for more information.</h5>
                <a href="/" class="btn bg-color"><span class="fa fa-undo"></span> Back to homepage</a>

            </div>
        </div>
    </div>
   
    <div class="text-center " style="margin-top:390px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5 style="font-weight:500">Support for Lawyers</h5></div>
                    <div class="card-body pt-1 text-left">
                        <ul class="list-unstyled" style="font-size:18px;line-height:1.9rem;">
                            <li ><a class="text-decoration-none" href="/support/lawyers/How-to-contact-legalmeet">How do I contact Legalmeet?</a></li>
                            <li ><a class="text-decoration-none" href="/support/lawyers/How-do-I-reset-my-password">How do I reset my password?</a></li>
                            <li ><a class="text-decoration-none" href="/support/lawyers/How-does-legalmeet-get-information">How does Legalmeet get information about lawyers?</a></li>
                            <li ><a class="text-decoration-none" href="/support/lawyers/How-do-I-know-the-reviews-are-real">How do I know the reviews are from real contacts?</a></li>
                        </ul>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5 style="font-weight:500">Support for Clients</h5></div>
                    <div class="card-body pt-1 text-left">
                        <ul class="list-unstyled" style="font-size:18px;line-height:1.9rem;">
                            <li ><a class="text-decoration-none" href="/support/clients/How-to-contact-legalmeet">How do I contact Legalmeet?</a></li>
                            <li ><a class="text-decoration-none" href="/support/clients/How-do-I-search-for-lawyer">How do I search for a lawyer?</a></li>
                            <li ><a class="text-decoration-none" href="/support/clients/Where-is-my-review">Where is my review?</a></li>
                            <li ><a class="text-decoration-none" href="/support/clients/How-do-I-view-and-send-message">How do I view and send messages?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <p class="lead">Can’t find what you’re looking for? <a href="/contact/support" class="text-decoration-none">Contact us here</a> .</p>
    </div>

@endsection