@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.usernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Your Questions</h5>
            @if (count($questions)>0)
                @foreach ($questions as $question)
                    <div class="card answer-card px-2 py-1">
                        <div class="text-muted">
                            <small> <b>Q & A</b> </small>
                            <br>
                            <small> <b>Asked in  {{$question->county}} | {{ date('d M Y', strtotime($question->created_at)) }}</b> </small>
                        </div>
                        <hr class="mt-1 mb-0">
                        <p class="mb-1"><b>  {{$question->question}} </b></p>
                        <p>  {{$question->situation}} </p>
                        
                        <div class="btns">
                            {{-- <div class="float-right px-4">
                                <button class="ml-2 mb-2 py-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#deA{{$question->id}}"><span class="fa fa-trash"></span> Delete Question</button> 
                            </div> --}}
                            <div class="text-center px-4">
                            
                            <a href="/legal-answers/{{$question->id}}/{{$question->question}}" class="mr-2 mb-2 py-2 btn btn-sm btn-outline-primary"><span class="fa fa-file"></span> View Answers</a>
                            <button class="mr-2 mb-2 py-2 btn btn-sm btn-outline-success" data-toggle="modal" data-target="#eA{{$question->id}}"><span class="fa fa-pencil"></span> Edit Question</button> 
                            </div>
                        </div>
                        {{-- edit modal --}}
                        <div class="modal fade" id="eA{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="required pl-2 mb-2 text-color" style="border-left:3px solid #afa939">Required</div>

                                        <form action="{{route('question.update',$question->id)}}" method="post">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select name="category" id="category" class="form-control" style="border-left:4px solid #afa939" required >
                                                    <option value="{{$question->category}}">
                                                        {{$question->category}}
                                                    </option>
                                                    @foreach ($practiceareas as $practicearea)
                                                        <option value="{{$practicearea->area_practice}}" class="mb-0">
                                                            {{$practicearea->area_practice}}
                                                        </option>
                                                    @endforeach
                                                </select>   
                                            </div>
                                            <div class="form-group">
                                                <label for="question"><b>Your Question</b> </label>
                                                <input type="text" class="form-control" name="question" min= "10"max="128" id="question" value="{{$question->question}}" style="border-left:4px solid #afa939" required >
                                                {{-- <textarea class="form-control" name="answer" min= "10"max="128" id="answer" cols="30" rows="8" style="border-left:4px solid #afa939" required>{{$answer->answer}}</textarea> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="situation"><b>Situation</b> </label>
                                                <textarea class="form-control" name="situation" min= "40"max="1200" id="situation" cols="30" rows="8" style="border-left:4px solid #afa939" required>{{$question->situation}}</textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="county"> County</label>
                                                <select name="county" id="county" class="form-control" style="border-left:4px solid #afa939" required>
                                                    <option value="{{$question->county}}">
                                                        {{$question->county}}

                                                    </option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{$location->county}}">
                                                            {{$location->county}}
                                                        </option>
                                                    @endforeach
                                                
                                                </select>   
                                            </div>
                                            <div class="form-group">
                                                <label for="anonymous">Post your question anonymously?</label>
                                                <div class="d-flex form-check">
                                                    <input class="form-check-input" type="radio"  name="anonymous" id="yes" value="yes"  required autocomplete="anonymous" >
                                                    <label class="form-check-label" for="yes">Yes</label>
                                    
                                                    <div class="option2 pl-5">
                                                        <input class="form-check-input " type="radio" name="anonymous" id="no" value="no" required autocomplete="anonymous">
                                                        <label class="form-check-label" for="no">No, use my firstname</label>
                                                    </div>
                                                    </div>
                                                    @error('anonymous')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-success px-3" type="submit">Edit</button>
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- delete modal --}}
                        {{-- <div class="modal fade" id="deA{{$qustion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="lead">Are you sure you want to delete your Question?. This action cannot be reversed!.</p> 
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('question.destroy',$question->id)}}" method="post">
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-success px-3 py-1">Delete</button>
                                    </form>
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                @endforeach
            @else
            <div class="card answer-card p-2">
                <p>You have not asked any question yet. <br>
                    Ask a question in the Q & A forum.It's free.click <a href="/ask-lawyer" class="text-decoration-none">here</a></p>
            </div>
            @endif
            {{ $questions->links() }}
      </div>
    </div>

@endsection