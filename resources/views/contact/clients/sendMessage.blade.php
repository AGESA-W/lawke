@extends('layouts.contact')
@section('content')
    <div class="container">        
        <div class="row">
            <div class="col-md-8  col-md-pull-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"  style="background:#fafafa">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="/contact" class="text-decoration-none">Support</a></li>
                        <li class="breadcrumb-item active" aria-current="page">How do I view and send messages</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <header class="article-header">
            <h3>
                How do I view and send messages?
            </h3>
        </header>
        
        <div class="row">
            <div class="col-md-8">
                <article class="main-column">
                    <div class="content-body article-body">
                         <h6 class="text-color"><b> Sending a message</b> </h6>

                        <p>You can send a message to any lawyer&nbsp;on Legalmeet for free.&nbsp;</p>
                        <ol>
                            <li>Click the "message" button.</li>
                            <li>Write and send your message. Do not include any sensitive&nbsp;information a lawyer-client relationship is only formed once the lawyer&nbsp;formally agrees to represent you. &nbsp;</li>
                        </ol>
                        <p>You must be signed in to your Legalmeet account to view or send messages. There is no cost to message or reply to a lawyer.&nbsp;</p>
                        <h6 class="text-color"><b>Viewing your messages</b> </h6>
                        <ol>
                            <li><a href="/login" class="text-decoration-none">Sign in</a> to your Legalmeet account.</li>
                            <li>Go to your messages. You'll see all of your message threads in your inbox.</li>
                            <li>Click on a thread to view the old messages or send a new message.</li>
                        </ol>
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
                                <a href="/support/clients/Where-is-my-review" class="text-decoration-none" rel="nofollow">Where is my review?</a>
                            </li>
                            
                            <li class="contact-list">
                                <a href="/support/clients/How-do-I-search-for-lawyer" class="text-decoration-none" rel="nofollow">How do I search for a lawyer?</a>
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