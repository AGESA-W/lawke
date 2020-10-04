@extends('layouts.app')
@section('content')
<div class="row user-dashboard">
    <div class="col-12 col-md-3">
        <div class="user-nav">
            @include('partials.usernav')
        </div>
    </div>
    <div class="col-12 col-md-9">
        <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">My Reviews</h5>
        @if(count($reviews)>0)
            @foreach ($reviews as $review)
                <ul class="list-unstyled">
                <li> 
                        <div class="row">
                            <div class="float-left col-md-3">
                                <img src="{{$review->attorney->image}}" alt="" style="width:80px;height:80px;">
                                <small class="mb-0"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$review->rating}}"></star-rating></small>
                                <small class="text-secondary"><span class="text-dark">Review for</span> <a class="text-decoration-none" href="/profile/{{$review->attorney->id}}">{{$review->attorney->firstname}} {{$review->attorney->lastname}}</a></small> 
                                <small class="text-secondary"><span class="text-dark">submited on:</span> {{ date('d M, h:i a', strtotime($review->created_at)) }}</small>
                            </div>
                            <div class="float-right col-md-9">
                                <b>{{$review->headline}}</b>
                                <p>{{$review->description}}</p>
                                <div class="dropdown">
                                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    See actions
                                    </a>
                                
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <button type="button" class="btn dropdown-item dropdown-item-user px-4 py-2  btn-sm" data-review_id="{{$review->id}}" data-title="{{$review->headline}}"  data-description="{{$review->description}}"  data-toggle="modal" data-target="#editReview">
                                           <span class="fa fa-pencil"></span> Edit Review
                                        </button>
                                        <div class="dropdown-divider"></div>
                                        <button type="button" class="btn  dropdown-item dropdown-item-user px-4 btn-sm" data-toggle="modal" data-target="#deleteModal">
                                           <span class="fa fa-trash"></span> Delete
                                        </button>
                                    </div>
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <p class="lead">Are you sure you want to delete your Review?</p> 
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('reviews.destroy',$review->id)}}" method="post">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success px-4"> <span class="fa fa-trash"></span> Delete</button>
                                            </form>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <span class="fa fa-times"></span></button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('reviews.update','test')}}" method="post">
                                                    @method('PUT')
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="headline"><span class="asterick"><b>*</b></span><b>Title</b> </label>
                                                        <input type="text" class="form-control" id="headline" name= "headline" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><span class="asterick"><b>*</b></span> <b> Your review</b> </label>
                                                        <textarea name= "description" class="form-control" placeholder="Be specific. Explain what your lawyer did (or failed to do) with your case. Your review should clearly indicate that you contacted, consulted with, or hired the attorney." maxlength="4000" id="description" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" id="review_id" name= "review_id" value="" required>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success px-3" type="submit"><span class="fa fa-pencil"></span> Edit</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <span class="fa fa-times"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </li> 
                </ul>
                
            @endforeach
            @else
            <p class="lead text-center text-primary"> <b>There are no reviews in your account.</b> </p>
        @endif
        <div class="text-center mt-4">
            {{ $reviews->links() }}
    
        </div>
    </div>
   
</div>

@endsection