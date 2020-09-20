@extends('layouts.app')
@section('content')
    <div class="attorney-county pb-5">
        @if (count($attorneys)>0)
            @foreach ($attorneys as $attorney)
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
                    @foreach ($attorney->practiceareas as $area)<li class="breadcrumb-item"><a class="text-decoration-none"href="/{{$area->area_practice}}">{{$area->area_practice}} </a></li>@endforeach
                    
                    <li class="breadcrumb-item active" aria-current="page">{{$attorney->county}}</li>
                    </ol>
                </nav>  
                <h1 class="attorney-county-text mt-0"><strong>{{$attorney->county}} {{$area->area_practice}} lawyers</strong><small class="text-muted">(@if(count($attorneys)>0){{count($attorneys)}} result @else{{count($attorneys)}} results @endif)</small></h1>
                <p class="text-muted">Compare {{$area->area_practice}} attorneys near you. Read reviews and contact them directly.</p>
            @endforeach
            @foreach ($attorneys as $attorney)
                <div class="row">
                    <div class="col-12 col-md-4">
                        <a href="/profile/{{$attorney->id}}"><img style="width:130px;height:140px" src="{{$attorney->image}}" alt="{{$attorney->firstname}}"></a>
                    </div>
                    <div class="col-12 col-md-8 attorney-county-description">
                        <p class="mb-0"><b>{{$attorney->firstname}} {{$attorney->lastname}}</b></p>
                        <small class="text-muted mb-0">{{$attorney->county}} @foreach ($attorney->practiceareas as $area){{$area->area_practice}} Attorney @endforeach</small>
                        <div class="row">
                            <div class="col-md-4">
                                <star-rating :star-size="17" active-color="#fc9735" :rating="{{$attorney->getStarRating()}}"></star-rating>
                            </div>
                            <div class="col-md-4 mt-2">
                                <small class="attorney-county-smalltext review-text"><a href="/profile/{{$attorney->id}}#review" class="text-decoration-none">{{$attorney->reviewCount()}} review(s)</a></small>
                            </div>
                        </div>
                        <p class="attorney-county-smalltext mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nesciunt fuga laudantium veniam est. Quisquam, modi et! Nisi, cumque earum, sapiente ut ipsa expedita Excepturi et tenetur hic quam nemo molestiae nihil sequi assumenda harum...</p>
                        <div class="row text-center attorney-county-smalltext">
                            <div class="col-md-4 text-primary"><span class="fa fa-phone"></span> {{$attorney->mobile}}</div>
                                <div class="col-md-4 icon-center "><a class="text-decoration-none" href="/attorney-message/{{$attorney->id}}"><span class="fa fa-envelope"></span> Message</a></div>
                            <div class="col-md-4"><a class="text-decoration-none" href="/profile/{{$attorney->id}}#contact"><span class="fa fa-map-marker"></span> Location</a></div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
        <div class="county-search-user"  >
            <div class="county-legalmeet py-4 " >
                <div class="row text-center">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2 class="h1 mt-0 pt-1 pl-5">No Lawyers found in this County</h2>
                        <a href="/" class="btn bg-color"> <span class="fa fa-undo"> Back to Homepage</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom:68px;">
        </div>
       
        @endif
    </div>
@endsection
