@extends('layouts.app')
@section('content')
    @foreach ($practiceareas->take(1) as $practicearea)
        <div class="search">
            <div class="search-jumbotron">
                <div class="jumbotron text-center">
                    <h1 class="search-jumbotron-text"><strong>Find {{$practicearea->area_practice}}  Lawyers</strong></h1>
                </div>
            </div>
        </div>
        <div class="wrapper" style="margin-top:260px;">
            <p class="wrapper-heading well"><strong>View {{$practicearea->area_practice}} Lawyers by County</strong></p>
            @foreach ($locations->chunk(4) as $locationchunk)
                <div class="row">
                    @foreach ($locationchunk as $location)
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li> <a href="/practice-areas/{{$practicearea->area_practice}}/{{$location->county}}" class="attorney-card-link text-decoration-none">{{$location->county}} Lawyers</a> </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach
    
   
   
@endsection
