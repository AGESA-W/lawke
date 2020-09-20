@extends('layouts.app')
@section('content')
        <div class="search">
            <div class="search-jumbotron">
                <div class="jumbotron text-center">
                    <h1 class="search-jumbotron-text"><strong>Where Name contains "{{$letter}}"</strong></h1>
                </div>
            </div>
        </div>
        <div class="wrapper" style="margin-top:260px;">
            <p class="wrapper-heading well mb-0"><strong>View Lawyers where the firstname or lastname contains alphabet "{{$letter}}"</strong></p>
            @if (count($names)>1)
                <p class="mb-0 text-muted"><b>({{count($names)}} results)</b></p>
            @else
                 <p class="mb-0 text-muted"><b>({{count($names)}} result)</b></p>
            @endif
            @if (count($names)>0)
                <div class="row">
                    @foreach ($names as $name)
                        <div class="row mt-2 justify-content-center">
                            <div class="col-12 col-md-2">
                            <a href="/profile/{{$name->id}}"><img style="width:130px;height:140px" src="{{$name->image}}" alt="{{$name->firstname}}"></a>
                            </div>
                            <div class="col-12 col-md-8" style="margin-left:-50px;">
                                <p class="mb-0"><b><a href="/profile/{{$name->id}}" class="text-decoration-none text-dark">{{$name->firstname}} {{$name->lastname}}</a></b></p>
                                <small class="text-muted mb-0">{{$name->county}} county</small>
                                <small class="card-text"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$name->getStarRating()}}"></star-rating> </small>
                                <p class="attorney-county-smalltext mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nesciunt fuga laudantium veniam est. Quisquam, modi et! Nisi, cumque earum, sapiente ut ipsa expedita Excepturi et tenetur hic quam nemo molestiae nihil sequi assumenda harum...</p>
                                <div class="row text-center attorney-county-smalltext mt-2">
                                    <div class="col-md-4 text-primary"><span class="fa fa-phone"></span> {{$name->mobile}}</div>
                                    <div class="col-md-4 icon-center "><a class="text-decoration-none" href="/attorney-message/{{$name->id}}"><span class="fa fa-envelope"></span> Message</a></div>
                                    <div class="col-md-4"><a class="text-decoration-none" href="/profile/{{$name->id}}#contact"><span class="fa fa-map-marker"></span> Location</a></div>
                                </div>
                            </div>
                        </div>
                        <hr class="text-muted">
                    @endforeach
                </div>
            @else
            <div class="text-center">
                 <p class="lead">No lawyer found whose name contains the alphabet "{{$letter}}". Try searching using a different alphabet. </p>
                <a href="/" class="btn bg-color"><span class="fa fa-undo"></span> Back to homepage</a>
            </div> 
            @endif
                
        </div>
        <div class="ml-5">
            {{ $names->links() }}
        </div>
  
   
@endsection
