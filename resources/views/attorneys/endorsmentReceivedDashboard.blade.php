@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.lawyernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Endorsments received</h5>
                <div class="wrapper mt-3">
                    <ul class="list-unstyled">
                        @if(count($endorsments)>0)
                            @foreach ($endorsments as $endorsment)
                                    <li> 
                                        <div class="row pt-2">
                                            <div class="float-left col-md-2">
                                                <img src="{{$endorsment->endorser->image}}" alt="" style="width:100px;height:100px;">
                                                <br>
                                            </div>
                                            <div class="float-right col-md-10 ml-0">
                                                <span> <small><b>From:</b></small> <a href="/profile/{{$endorsment->endorser->id}}">{{$endorsment->endorser->firstname}} {{$endorsment->endorser->lastname}}</a></span>
                                                <small class="text-secondary">on
                                                {{ date('d M, h:i a', strtotime($endorsment->created_at)) }}</small>
                                                <br>
                                                <small><b>Relationship:</b><span class="text-secondary"> {{$endorsment->relationship}}</span></small>
                                                <p>{{$endorsment->message}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                            @endforeach
                            @else
                            <h6> <b>No endorsments yet.</b> </h6>
                            <p>Endorsments from fellow lawyers are important consideration for many when selecting the right lawyer.None of you colleagues has endorsed you!</p>
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
      </div>
    </div>

@endsection