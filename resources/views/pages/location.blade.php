@extends('layouts.app')
@section('content')
    @foreach ($locations->take(1) as $location)
        <div class="location">
            <div class="location-jumbotron">
            <div class="jumbotron text-center">
                <h1 class="location-jumbotron-text"><strong>Find {{$location->county}}  Attorneys</strong></h1>
            </div>
            </div>
        </div>
        <div class="location-wrapper">
            <h3 class="location-heading mb-0 mt-2"><strong>See {{$location->county}} lawyers by practice area</strong></h3>
            <p class="well">Choose an area of law to find top-rated attorneys near you.</p>
            @foreach ($practiceareas->chunk(4) as $practiceareachunk)
                <div class="row">
                    @foreach ($practiceareachunk as $practicearea)
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li> <a href="/practice-areas/{{$practicearea->area_practice}}/{{$location->county}}" class="attorney-card-link text-decoration-none">{{$practicearea->area_practice}}</a> </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach
    
   
   
@endsection
