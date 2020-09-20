@extends('layouts.contact')
@section('content')
    <div class="container">        
        <div class="row">
            <div class="col-md-8  col-md-pull-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"  style="background:#fafafa">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="/contact" class="text-decoration-none">Support</a></li>
                        <li class="breadcrumb-item active" aria-current="page">How does Legalmeet get information about lawyers</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <header class="article-header">
            <h3>
                How does Legalmeet get information about lawyers?
            </h3>
        </header>
        
        <div class="row">
            <div class="col-md-8">
                <article class="main-column">
                    <div class="content-body article-body">
                        <p>Legalmeet uses publicly-available data to populate the basic information we have for 97% of lawyers in Kenya. Please keep in mind that we do not control the sources where we collect data, so if you come across incorrect information on a lawyer’s profile, please <a href="/contact/support">let us know</a>. Our goal at Legalmeet is to make sure that everything we have on our site is as accurate and up-to-date as possible.</p>
                        <p>Some of our sources for attorney profiles:</p>
                        <ul>
                            <li>Law society of Kenya</li>
                            <li>Court records</li>
                            <li>Lawyer websites</li>
                            <li>Information supplied by lawyers to Legalmeet</li>
                        </ul>
                    </div>
                </article>
                <p class="backlink"><a href="/contact" class="text-decoration-none">Return to support home</a></p>
            </div>
        
            <div class="col-md-4">
                <aside class="article-sidebar side-column">
                    <section class="related-articles">
                        <h4>Related articles</h4>
                        <ul class="list-unstyled">
                                                    
                            <li  class="contact-list">
                                <a href="/support/lawyers/How-to-contact-legalmeet"  class="text-decoration-none" rel="nofollow">How do I contact Legalmeet?</a>
                            </li>
                            
                            <li class="contact-list">
                                <a href="/support/lawyers/How-does-legalmeet-get-information"  class="text-decoration-none" rel="nofollow">How do I reset my password?</a>
                            </li>
                            
                            <li class="contact-list">
                                <a href="/support/lawyers/How-do-I-know-the-reviews-are-real" class="text-decoration-none" rel="nofollow">How do I know the reviews are from real contacts?</a>
                            </li>
                            
                        </ul>
                    </section>
                </aside>
                
                <aside class="article-sidebar side-column pt-3">
                <h4>Didn't find your answer?</h4>
                <p>
                    <a href="/contact/support" class="text-decoration-none">Contact our support team</a> with your inquiry</p>
                </aside>
            </div>
        </div> <!--.row-->
    </div>
@endsection