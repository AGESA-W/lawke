@extends('layouts.app')
@section('content')
    @foreach ($questions as $question)
        
    @endforeach
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background:#f8fafc;">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="/get-advice" class="text-decoration-none">Get Advice</a></li>
            <li class="breadcrumb-item"><a href="/topics/{{$question->category}}" class="text-decoration-none">{{$question->category}}</a></li>
            <li class="breadcrumb-item"><a href="/legal-answers/{{$question->id}}/{{$question->question}}" class="text-decoration-none">{{substr($question->question,0,45)}}{{strlen($question->question)>45 ?"...":""}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add an Answer</li>
        </ol>
    </nav>
    <div class="col-md-8 col-sm-12">
        <h5 class="mb-0 mt-0"> <b>{{$question->question}}</b></h5>
        <small class="text-muted"> <b>Asked in  {{$question->county}} | {{ date('d M Y', strtotime($question->created_at)) }}</b> </small>
        <p class="well">{{$question->situation}}</p>
        <hr>
        <div class="required pl-2 mb-2 text-color" style="border-left:3px solid #afa939">Required</div>
        <form action="{{route('attorney.answer')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="response">Your Answer</label>
                <textarea class="form-control" min= "40"max="1200" name="answer" placeholder="Please give your answer"  id="answer" cols="30" rows="6" style="border-left:4px solid #afa939" required>{{ old('answer') }}</textarea>
               
            </div>
            <div class="form-group" style="font-size:14px;">
                <p>Do you think the questioner needs to hire a lawyer to address this issue?</p>
                <div class="d-flex form-check">
                    <input class="form-check-input" type="radio"  name="need_lawyer" id="yes" value="yes" required>
                    <label class= "form-check-label" for="yes">Yes</label>

                    <div class="option2 pl-5">
                        <input class="form-check-input " type="radio" name="need_lawyer" id="no" value="no"required >
                        <label class= "form-check-label" for="no">No</label>
                    </div>

                    <div class="option2 pl-5">
                        <input class="form-check-input " type="radio" name="need_lawyer" id="notsure" value="not sure"required>
                        <label class= "form-check-label" for="not sure">Not sure</label>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" value="{{Auth::id()}}" name="attorney_id">
            <input type="hidden" class="form-control" value="{{$question->id}}" name="question_id">
            <input type="hidden" class="form-control" value="{{$question->user_id}}" name="user_id">


            <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-send"></span> Continue</button>
        </form>

    </div>
   
@endsection