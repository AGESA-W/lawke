@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.lawyernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Your Answers</h5>
            @if (count($answers)>0)
                    @foreach ($answers as $answer)
                    <div class="individual-question">
                        <div class="text-muted">
                            <small> <b>Q & A</b> </small>
                            <br>
                            <small> <b>Asked in  {{$answer->question->county}} | {{ date('d M Y', strtotime($answer->question->created_at)) }}</b> </small>
                        </div>
                        <hr class="mt-1 mb-0">
                        <p class="mb-1"><b>  {{$answer->question->question}} </b></p>
                        <p>  {{$answer->question->situation}} </p>
                        <div class="card answer-card">
                            <div class="card-body">
                                <h5><strong>Your answer</strong></h5>
                                <hr class="mt-0">
                                <h6 class="text-muted mb-0">Posted on {{ date('d M', strtotime($answer->question->created_at)) }}</h6>
                                <p class="mb-1">{{$answer->answer}}</p> 
                            </div>
                            <div class="btns">
                                <div class="float-right px-4">
                                    <button class="ml-2 mb-2 py-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#deA{{$answer->id}}"><span class="fa fa-trash"></span> Delete Answer</button> 
                                </div>
                                <div class="float-left px-4">
                                <button class="mr-2 mb-2 py-2 btn btn-sm btn-outline-success" data-toggle="modal" data-target="#eA{{$answer->id}}"><span class="fa fa-pencil"></span> Edit Answer</button> 
                                </div>
                            </div>
                            {{-- edit modal --}}
                            <div class="modal fade" id="eA{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Answer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="required pl-2 mb-2 text-color" style="border-left:3px solid #afa939">Required</div>

                                            <form action="{{route('answer.update',$answer->id)}}" method="post">
                                                @method('PUT')
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="answer"><b>Your Answer</b> </label>
                                                    <textarea class="form-control" name="answer" min= "40"max="1200" id="answer" cols="30" rows="8" style="border-left:4px solid #afa939" required>{{$answer->answer}}</textarea>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-success px-3" type="submit"><span class="fa fa-pencil"></span> Edit</button>
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><span class="fa fa-undo"></span> Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- delete modal --}}
                        <div class="modal fade" id="deA{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Answer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="lead">Are you sure you want to delete this Answer?. This action cannot be reversed!.</p> 
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('answer.destroy',$answer->id)}}" method="post">
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-success px-3 py-1"><span class="fa fa-trash"></span> Delete</button>
                                    </form>
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><span class="fa fa-undo"></span> Cancel</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="card answer-card p-2">
                <p>You have not answered any question yet. <br>
                    Answer client questions to increase your chances of drawing potential clients.</p>
            </div>
            @endif
      </div>
    </div>

@endsection