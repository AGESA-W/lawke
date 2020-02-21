@extends('layouts.app')
@section('content')

    {{-- <update-review-form
    :attorney="{{$review}}" 
    url="{{route('reviews.update',$review->id)}}">
    </update-review-form> --}}
    <p class="mb-2 lead" style="font-size:20px;"><b>Edit Your Review</b> </p>
    <div class="row">
        
        <div class="col-12 col-md-8">
            <form action="{{route('reviews.update',$review->id)}}" method="post">
                @method('PUT')
                {{ csrf_field() }}

                <div class="form-group">
                    <label for=""><span class="asterick"><b>*</b></span><b>Title</b> </label>
                    <input type="text" class="form-control" name= "headline" value="{{$review->headline}}" required>
                </div>

                <div class="form-group">
                    <label for=""><span class="asterick"><b>*</b></span> <b> Your review</b> </label>
                    <textarea name= "description" class="form-control" placeholder="Be specific. Explain what your lawyer did (or failed to do) with your case. Your review should clearly indicate that you contacted, consulted with, or hired the attorney." maxlength="4000" id="description" cols="30" rows="5" required>{{$review->description}}</textarea>
                </div>
                    <p><b>Note:Your review will be shared publicly.Stick to review guidelines.</b></p>
                <button type="submit" class="btn bg-color review-btn">Submit</button>
            </form>
        </div>
        <div class="col-12 col-md-4">
            <div class="review-guidelines">
                <img src="/images/arrows2.jpg" alt="" class="review-guidelines-image">
                <h5><b>Review guidelines</b> </h5>
                <div class="review-guidelines-content">
                    <ul class="list-unstyled">
                        <li><b>Lawke allows reviews for your attorney.</b>Please do not leave a review for a lawyer you did not hire or consult with.</li>
                        <li><b>Be specific.</b>Explain what your lawyer did (or failed to do) with your case. Your review should clearly indicate that you contacted, consulted with, or hired the attorney.</li>
                        <li><b>…but not too specific.</b>Leave out any sensitive information</li>
                        <li><b>Be helpful, not spiteful.</b>Do not post hostile or insulting content.</li>
                        <li><b>Stick to the facts.</b>Reviews should stick to the actual facts.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     
       
@endsection
