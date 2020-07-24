@extends('layouts.app')
@section('content')
    <div class="search-lawyer">
        <div class="search-lawyer-jumbotron">
            <div class="jumbotron text-center">
                <h3 class="search-lawyer-heading search-lawyer-find">
                    @foreach ($topics as $topic)
                    @endforeach
                    {{$topic->category}}

                </h3>
              {{-- <h4 class="search-lawyer-find">Recently asked questions</h4> --}}
              <p class="lead" style="padding: 20px 250px 5px 250px;">Get the help you need with any legal question you might have from viewing recently asked and answered questions or you can alternatively ask any question you have and get feedback in minutes.</p>
            </div>
        </div>
    </div>
    <div class="show-questions" style="margin-top:260px;">
        <a href="/get-advice" class="text-decoration-none"> <span class="fa fa-angle-left"></span> Go Back</a>
        <h5> <b>Recently asked questions</b> </h5>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                @foreach ($topics as $topic)
                        <div class="show-questions-individual">
                            <small class="text-muted">Asked in  {{$topic->county}} | {{ date('d M Y', strtotime($topic->created_at)) }} </small>
                            <a href="/legal-answers/{{$topic->question}}" class="float-right mt-3 text-dark"> <span class="fa fa-angle-right"></span> </a>
                            <br>
                            <small class="mt-3"> <a href="/legal-answers/{{$topic->question}}" class="text-dark text-decoration-none"> <b> {{$topic->question}}</b></a></small>
                        </div>
                    @endforeach
               
            </div>
        </div> 
    </div> 
    <div class="mt-3 mb-4">
        {{ $topics->links() }}
    </div>
@endsection