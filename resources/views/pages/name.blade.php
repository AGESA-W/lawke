@extends('layouts.app')
@section('content')
<div class="attorney-county pb-5">
   
        
        @foreach ($names as $attorney)   @endforeach
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">{{$letter}}</li>
            </ol>
        </nav>  
        <h1 class="attorney-county-text mt-0"><strong>Lawyers whose names contain "{{$letter}}"  </strong><small class="text-muted">(@if(count($names)>1){{count($names)}} results @else{{count($names)}} result @endif)</small></h1>
        <p class="text-muted">Compare lawyers whose names contain "{{$letter}}" near you. Read reviews and contact them directly.</p>
        <div class="wrapper">
           
            @if (count($names)>0)
                {{-- <div class="row">
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
                </div> --}}
                @foreach ($names as $name)
                <div class="row">
                    <div class="col-12 col-md-4">
                        <a href="/profile/{{$name->id}}"><img style="width:130px;height:140px" src="{{$name->image}}" alt="{{$name->firstname}}"></a>
                    </div>
                    <div class="col-12 col-md-8 name-county-description" style="margin-left:-240px;">
                        <p class="mb-0"><b><a href="/profile/{{$name->id}}" class="text-decoration-none">{{$name->firstname}} {{$name->lastname}}</a> </b></p>
                        <small class="text-muted mb-0">{{$name->county}} @foreach ($name->practiceareas as $area){{$area->area_practice}} Lawyer @endforeach</small>
                        <div class="row">
                            <div class="col-md-4">
                                <star-rating :star-size="17" active-color="#fc9735" :rating="{{$name->getStarRating()}}"></star-rating>
                            </div>
                            <div class="col-md-4 mt-2">
                                <small class="name-county-smalltext review-text"><a href="/profile/{{$name->id}}#review" class="text-decoration-none">
                                    @if ($name->reviewCount() > 1)
                                    {{$name->reviewCount()}} reviews
                                    @elseif ($name->reviewCount() < 1)
                                    no reviews
                                    @else
                                    {{$name->reviewCount()}} review
                                    @endif
                                </a></small>
                            </div>
                        </div>
                        <p class="attorney-county-smalltext mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nesciunt fuga laudantium veniam est. Quisquam, modi et! Nisi, cumque earum, sapiente ut ipsa expedita Excepturi et tenetur hic quam nemo molestiae nihil sequi assumenda harum...</p>
                        <div class="row text-center attorney-county-smalltext">
                            <div class="col-md-4 text-primary"><span class="fa fa-phone"></span> {{$name->mobile}}</div>
                                <div class="col-md-4 icon-center "><a class="text-decoration-none" href="/attorney-message/{{$name->id}}"><span class="fa fa-envelope"></span> Message</a></div>
                            <div class="col-md-4"><a class="text-decoration-none" href="/profile/{{$name->id}}#contact"><span class="fa fa-map-marker"></span> Location</a></div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
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
  
   </div>
@endsection
