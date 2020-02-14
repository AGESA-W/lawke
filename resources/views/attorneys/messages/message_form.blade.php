@extends('layouts.app')
@section('content')
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <h4 class=""><b>Message:{{$attorney->firstname}} {{$attorney->lastname}}</b> </h4>
            <div class="row no-gutters">
                <div class="col-12  col-md-4">
                    <img src="{{$attorney->image}}" class="card-img " alt="{{$attorney->firstname}}" style="width:130px;height:148px;">
                </div>
                <div class="col-12  col-md-8">
                    <div class="ml-4 p-0">
                        <ul class="list-unstyled" style="font-size:14px;">
                            <li class="list-item"> <p class="card-text"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$attorney->getStarRating()}}"></star-rating> <a href="#review" class="text-decoration-none">{{$attorney->reviewCount()}} reviews</a></p></li>
                            <li class="list-item"><span class="fa fa-map-marker"style="font-size:16px;"> @foreach ($attorney->locations as $location) {{$location->location}}@endforeach</span> </li>
                            <li class="list-item"><b class="text-color">Office:</b> @foreach ($attorney->locations as $location) {{$location->company_name}}@endforeach</li>
                            <li class="list-item"><b class="text-color">Contact:</b>{{$attorney->mobile}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <a class="text-decoration-none" href="/profile/{{$attorney->id}}"><span class="fa fa-chevron-left "><b>View full profile</b> </span></a>
        </div>
        <div class="col-12 col-md-8">
            <p class="text-dark mt-4" style="font-size:15px;">Provide some details about your situation, but remember not to include sensitive information. An attorney-client relationship is only formed once an attorney formally agrees to represent you.</p>
            <form action="{{route('send.message')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Here's a brief description of my case" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"  required autocomplete="description" autofocus></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="hidden" name="to" value="{{$attorney->id}}">
                <input type="hidden" name="from" value="{{Auth::id()}}">

                <button type="submit" class="btn bg-color px-4">Submit</button>
            </form>

        </div>
    </div>
@endsection