@extends('layouts.contact')
@section('content')
    <div class="container">        
        <div class="row">
            <div class="col-md-8  col-md-pull-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"  style="background:#fafafa">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="/contact" class="text-decoration-none">Support</a></li>
                        <li class="breadcrumb-item active" aria-current="page">How do I reset my password</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <header class="article-header">
            <h3>
                How do I reset my password?
            </h3>
        </header>
        
        <div class="row">
            <div class="col-md-8">
                <article class="main-column">
                    <div class="content-body article-body">
                        <p>To reset your password, please visit <a href="/attorney/password/reset" class="text-decoration-none">this page</a> .</p>
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
                                <a href="/support/lawyers/How-does-legalmeet-get-information"  class="text-decoration-none" rel="nofollow">How does Legalmeet get information about lawyers?</a>
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