@extends('layouts.contact')
@section('content')

<div class="row">
    <div class="col-md-8  col-md-pull-4">
        <nav aria-label="breadcrumb" style="font-size:14px;">
            <ol class="breadcrumb"  style="background:#fafafa">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="/contact" class="text-decoration-none">Support home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Submit a request</li>
            </ol>
        </nav>

        <h4>Contact Us</h4>
        <p>If you have a question about using Legalmeet, you may find the answer in the <a href="/contact" class="text-decoration-none">FAQ</a> . You can also send us an email to info@legalmeet.com, or using the form below.</p>

        <p>Our team is able to handle inquiries between the hours of 9am-5pm PT Monday-Friday, and should respond within 24 hours.</p>
        <form action="{{route('new.request')}}" method="POST" class="form-material">
            @csrf
            <div class="form-group">
                <label for="email">Your email address</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Write your message here..." required></textarea>
            </div>
            <p>Please enter the details of your request. A member of our support staff will respond as soon as possible.</p>
            <button type="submit" class="btn bg-color px-4 py-2">Submit</button>
        </form>
    </div>
</div>
@endsection