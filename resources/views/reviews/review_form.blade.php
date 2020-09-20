@extends('layouts.app')
@section('content')
    <div class="row review">
        <div class="col-md-8">
            <h3 class="review-heading"> <b>Review your lawyer</b> </h3>
            <div class="card mb-3 review-card">
                <div class="row no-gutters">
                    <div class="col-12  col-md-2">
                        <img src="{{$attorney->image}}" class="card-img " alt="{{$attorney->firstname}}" style="width:130px;height:148px;">
                    </div>
                    <div class="col-12  col-md-10">
                        <div class="card-body ml-4 p-0">
                            <h6 class="card-title" style="color:#333333;font-size:20px;"> <b>{{$attorney->firstname}} {{$attorney->lastname}}</b> </h6>
                            <ul class="list-unstyled">
                                <li class="list-item"><span class="fa fa-map-marker"style="font-size:16px;"> @foreach ($attorney->locations as $location) {{$location->location}}@endforeach</span> </li>
                                <li class="list-item"><b class="text-color">Office:</b> @foreach ($attorney->locations as $location) {{$location->company_name}}@endforeach</li>
                                <li class="list-item"><b class="text-color">Contact:</b>{{$attorney->mobile}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/profile/{{$attorney->id}}" class="review-link text-decoration-none"><span class="fa fa-chevron-left "></span> {{$attorney->firstname}} {{$attorney->lastname}} Profile</a>
            <div>
                <review-form
                :attorney="{{$attorney}}" 
                url="{{route('reviews.store')}}">
                </review-form>
                {{-- <form action="{{route('reviews.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for=""><span class="asterick"><b>*</b></span><b> Select a rating for your lawyer</b></label>
                        <star-rating :star-size="25" :border-width="3" name= "rating" required></star-rating> 
                    </div>
        
                    <div class="form-group">
                        <label for=""><span class="asterick"><b>*</b></span><b>Add a title</b> </label>
                        <input type="text" class="form-control" name= "headline" required>
                    </div>
        
                    <div class="form-group">
                        <label for=""><span class="asterick"><b>*</b></span> <b>Write your review</b> </label>
                        <textarea name= "description" class="form-control" placeholder="Be specific. Explain what your lawyer did (or failed to do) with your case. Your review should clearly indicate that you contacted, consulted with, or hired the attorney." maxlength="4000" id="description" cols="30" rows="5" required></textarea>
                    </div>
        
                    <div class="form-group">
                        <label for="gender" class="col-form-label"> <span class="asterick"><b>*</b></span> <b>Was this just a consultation or did you hire this attorney?</b> </label>
                        <div class="form-check d-flex">
                            <input class="form-check-input" type="radio"  name= "consultation" id="consulted" value="consulted"  required >
                            <label for="consulted">Consulted</label>
        
                            <div class="option2 pl-5">
                                <input class="form-check-input " type="radio" name= "consultation" id="hired" value="hired" required>
                                <label  for="hired">Hired</label>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="recommend" class="col-form-label"> <span class="asterick"><b>*</b></span> <b> Would you recommend this lawyer?</b></label>
                        <div class="form-check d-flex">
                            <input class="form-check-input" type="radio"  name= "recommend" id="yes" value="yes"  required >
                            <label class="form-check-label" for="yes">Yes</label>
        
                            <div class="option2 pl-5">
                                <input class="form-check-input " type="radio" name= "recommend" id="no" value="no" required>
                                <label  for="no">No</label>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="attorney_id" value="{{$attorney->id}}">
                        <p><b>Note:Your review will be shared publicly.Stick to review guidelines.</b></p>
                    <button type="submit" class="btn bg-color review-btn">Submit</button>
                </form> --}}
            </div>
        </div>
        <div class="col-md-4" style="margin-top:38px">
            <div class="review-guidelines">
                <img src="/images/arrows2.jpg" alt="" class="review-guidelines-image">
                <h5><b>Review guidelines</b> </h5>
                <div class="review-guidelines-content">
                    <ul class="list-unstyled">
                        <li><b>Legalmeet allows reviews for your lawyer.</b>Please do not leave a review for a lawyer you did not hire or consult with.</li>
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
