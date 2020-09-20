@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.lawyernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Your Reviews</h5>
            @if(count($reviews)>0)
                @foreach ($reviews as $review)
                    <ul class="list-unstyled">
                        <li> 
                            <div class="row mt-3">
                                <div class="float-left col-md-3">
                                    <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                    <small class="text-secondary"><span class="text-dark">Posted On:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                                    <br>
                                    <small class="text-secondary"><span class="text-dark">By:</span> {{ $review->user->name}} {{ $review->user->lastname}}</small>
                                </div>
                                <div class="float-right col-md-9">
                                    <b>{{$review->headline}}</b>
                                    <p>{{$review->description}}</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li> 
                    </ul>
                    
                @endforeach
                @else
                <p class="lead text-center text-primary"> <b>There are no reviews in your account.</b> </p>
            @endif
            <div class="mt-3">
                {{ $reviews->links() }}
            </div>
      </div>
    </div>

@endsection