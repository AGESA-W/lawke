@extends('layouts.app')
@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background:#f8fafc;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="/get-advice" class="text-decoration-none">Get Advice</a></li>
                <li class="breadcrumb-item"><a href="/topics/{{$question->category}}" class="text-decoration-none">{{$question->category}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{substr($question->question,0,45)}}{{strlen($question->question)>45 ?"...":""}}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="individual-question">
                    <div class="text-muted">
                        <small> <b>Q & A</b> </small>
                        <br>
                        <small> <b>Asked in  {{$question->county}} | {{ date('d M Y', strtotime($question->created_at)) }}</b> </small>
                    </div>
                    <hr class="mt-1 mb-0">
                    <p class="mb-1"><b>  {{$question->question}} </b></p>
                    <p>  {{$question->situation}} </p>
                    <hr>
                    <div class="text-center">
                        @if(Auth::guard('attorney')->check())
                       <a href="/legal-answers/{{$question->question}}/add-answer" class="text-decoration-none btn btn-primary btn-sm px-2 mb-1"> <span class="fa fa-pencil"></span>Answer this question</a>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <a href="/ask-lawyer" class="text-center mt-2 px-4 py-2 btn btn-sm btn-outline-success">Ask a lawyer - it's free!</a> 
                    <a href="/topics/{{$question->category}}" class="text-center ml-5 mt-2 px-4 py-2 btn btn-sm btn-outline-primary">Browse related questions</a> 
                </div>
            
                <h5 class="mt-2">
                    <b>
                        @if(count($answers)>1) 
                             {{count($answers)}} lawyer answers 
                        @elseif(count($answers)<1 )
                            <div class="individual-question mt-4">
                                <p class="lead">No Lawyer has responded to this question yet, kindly have a look at similar questions <a class="text-decoration-none" href="/topics/{{$question->category}}">here.</a></p>
                            </div>
                        @else
                            {{count($answers)}} lawyer answer 
                        @endif
                    </b>
                </h5>

                @foreach ($answers as $answer)
                    <div class="card answer-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{$answer->attorney->image}}" alt="" class="img-fluid" style="width:80px;">
                                </div>
                                <div class="col-md-3">
                                    <p class="mb-0"><b>{{$answer->attorney->firstname}} {{$answer->attorney->lastname}}</b></p>
                                    <small><star-rating :star-size="19" active-color="#fc9735" :rating="{{$answer->attorney->getStarRating()}}"></star-rating><a href="/profile/{{$answer->attorney->id}}#review" class="text-decoration-none">{{$answer->attorney->reviewCount()}} review(s)</a></small>
                                </div>
                                <div class="col-md-4">
                                    @foreach ($answer->attorney->practiceareas as $practice)
                                        <p class="mb-2 text-muted">{{$practice->area_practice}}</p>
                                    @endforeach
                                    <p class="mb-0 text-muted">{{$answer->attorney->county}} County</p>
                                </div>
                                <div class="col-md-3 col-sm-12 col-12">
                                    <a href="/attorney-message/{{$answer->attorney->id}}" class="text-center mt-2 px-4 py-2 btn btn-sm btn-outline-success">
                                        <span class="fa fa-envelope"></span> Message
                                    </a>
                                    <button class="text-center mt-2 px-4 py-2 btn btn-sm btn-primary"><span class="fa fa-phone"></span> {{$answer->attorney->mobile}}</button>
                                </div>
                            </div>
                                <hr>
                                <h6 class="text-muted mb-0">Posted on {{ date('d M', strtotime($question->created_at)) }}</h6>
                                <p>{{$answer->answer}}</p> 
                        </div>
                    </div>
                @endforeach
                
            </div>
            
        </div>
@endsection