@extends('layouts.contact')
@section('content')
    <div class="container">        
        <div class="row">
            <div class="col-md-8  col-md-pull-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"  style="background:#fafafa">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="/contact" class="text-decoration-none">Support</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Where is my review</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <header class="article-header">
            <h3>
                Where is my review?
            </h3>
        </header>
        
        <div class="row">
            <div class="col-md-8">
                <article class="main-column">
                    <div class="content-body article-body">
                        <p>Every review is to adhere to Community guidelines.Reviews that are not compliant with Legalmeet's Community Guidelines will be dropped from the lawyer's profile. Ensure your review has details of personal experiences so that reviews are helpful to future users looking to hire a lawyer. Your reviews are located on your dashboard under the reviews tab, you are welcome to edit and resubmit the review. </p>
                    </div>
                </article>
                <p class="backlink"><a href="/contact" class="text-decoration-none">Return to support home</a></p>
            </div>
        
            <div class="col-md-4">
                <aside class="article-sidebar side-column">
                    <section class="related-articles">
                        <h4>Related articles</h4>
                        <ul class="list-unstyled">
                            <li class="contact-list">
                                <a href="/support/clients/How-to-contact-legalmeet" class="text-decoration-none" rel="nofollow">How do I contact Legalmeet? </a>
                            </li>
                            
                            <li  class="contact-list">
                                <a href="/support/clients/How-do-I-search-for-lawyer"class="text-decoration-none" rel="nofollow">How do I search for a lawyer?</a>
                            </li>
                            
                            <li class="contact-list">
                                <a href="/support/clients/How-do-I-view-and-send-message"  class="text-decoration-none" rel="nofollow">How do I view and send messages?</a>
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