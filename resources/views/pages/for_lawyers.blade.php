@extends('layouts.app')

@section('content')

<div class="for-lawyers">
    <div class="for-lawyer">
        <div class="for-lawyer-jumbotron">
        <div class="for-lawyer text-center">
            <h1 class="for-lawyer-jumbotron-text"><strong>Get the legal clients you <br> need now!</strong></h1>
        </div>
        </div>
    </div>
    {{-- <h4 class="mb-3" style="margin-top:216px;"> <b>Sign in to Legal<span class="text-color">Meet</span></b> </h4> --}}
    <div class="row" style="margin-top:240px;">
        <div class="col-md-6">
            <p class="mb-0"> <b>Have an account? Sign in.</b> </p>
            <hr class="mt-0">
            <div class="card"  style="height:250px;">
                <div class="card-header bg-primary">{{ __('Lawyer Login') }}</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('attorney.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-color px-5">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('attorney.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form> --}}
                    <div class="text-center">
                          <p class="pt-5">Already have an account</p>
                          <a href="/attorney_login" class="text-decoration-none btn btn-sm btn-outline-primary px-3 py-2" style="border-radius: 15px;">Sign in</a>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p class="mb-0"><b>New to Legal<span class="text-color">meet</span>? Register for free.</b> </p>
            <hr class="mt-0">
            <div class="card" style="height:250px;">
                <div class="card-header bg-success">
                    {{ __('Lawyer Register') }}
                </div>
                <div class="card-body">
                    <div class="text-center">
                            <p class="text-center pt-5">New to Legal<span class="text-color">meet</span>? Create an account.</p>
                          <a href="/attorney_register" class="text-decoration-none btn btn-sm btn-outline-success px-3 py-2" style="border-radius: 15px;">Sign up</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="why">
        <div class="why-legalmeet">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="h1 mt-0">What does Legal<span class="text-color">Meet</span> offer?</h2>
                </div>
            </div>
            <div class="row" style="padding-left:350px;" >
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <ol class="ordered-list">
                        <li>
                            <h3 class="h2"> <span class="ordering">1</span> Legalmeet profile</h3>
                            <p class="pl-5"> The profile will include your contact information, practice area, resume, peer endorsments and reviews..</p>
                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">2</span>Legal Q&A forum</h3>
                            <p class="pl-5"> Answering questions on legalmeet can increase your chances of obtaining potential clients.</p>
                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">3</span>Peer endorsements</h3>
                            <p class="pl-5">Boost your profile by requesting references from people within your network.</p>
                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">4</span>Client reviews</h3>
                            <p class="pl-5">Solicit reviews from happy clients. Lawyers with reviews are 12x more likely to be contacted.</p>
                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">5</span>Support</h3>
                            <p class="pl-5">Get answers to frequently asked questions.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center for-lawyers-container" style="margin-top:500px;">
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <h3 class=""> <b>What Lawyers are saying</b> </h3>
                <div class="v-quotation-mark">“</div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 center-block u-margin-bottom-2">
                <p>The clients generated through LegalMatch provide me a unique set of advantages, mainly because so much of the initial work is done quickly and easily via the internet</p>
                <p><strong>— Mara Hardwick, Competition lawyer, Uasin-Gishu County</strong></p>
            </div>
            <div class="col-sm-10 col-md-8 center-block u-margin-bottom-2">
                <p>I first thought of LegalMatch as a possible way of getting a client or two. I quickly found out that it is a great source of clients. These are clients who have a need and are looking for assistance.</p>
                <p><strong>— Philip Burge, Agency lawyer, Wajir County</strong></p>
            </div>
            <div class="col-sm-10 col-md-8 center-block u-margin-bottom-2">
                <p>Legalmeet is changing the lawyer marketing game. In my 25 years in the business, I have never seen a better marketing vehicle for lawyers. Period.</p>
                <p><strong>— Chester Everett, Banking lawyer, Vihiga County</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection

