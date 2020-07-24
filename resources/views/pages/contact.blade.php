@extends('layouts.app')
@section('content')
    <div class="contact">
        <div class="contact-jumbotron">
            <div class="jumbotron ml-0 text-left" style="padding-left:130px">
                <h3 class="contact-jumbotron-text"><strong>Legalmeet support</strong></h3>
                <h5 style="font-size:30px;">Need help? Select a topic below <br> for more information.</h5>
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
                            <li ><a class="text-decoration-none" href="">How do I reset my password?</a></li>
                            <li ><a class="text-decoration-none" href="">How does Legalmeet get information about lawyers?</a></li>
                            <li ><a class="text-decoration-none" href="">How do I know the reviews are from real contacts?</a></li>
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
    </div>
    {{-- <p class="text-center lead">
        If you have a question about using Legalcare, you may find the answer in the FAQ. You can also send <br> us an email to info@legalcare.com.
        Our team is able to handle inquiries <br> between the hours of 7am-4pm  Monday-Friday, and should respond within 24 hours
    </p> --}}
    {{-- <div class="contact-us mt-0 pb-5">
        <h2 class="lg-heading ml-5">
            Contact <span class="text-color">information</span> 
        </h2>
        <h3 class="sm-heading ml-5">
            This is how you can reach us
        </h3>
        <div class="boxes">
            <div class="boxes-item">
                <span class="text-color">Email:</span>info@legalcare.com
            </div>
            <div class="boxes-item">
                <span class="text-color">Phone:</span>(254) 792-685-127
            </div>
            <div class="boxes-item">
                <span class="text-color">Address:</span>Nairobi,Kenya 13602
            </div>
        </div>
    </div> --}}
@endsection