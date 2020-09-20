@extends('layouts.app')
@section('content')  
    <div class="row">
        <div class="col-12 col-md-2">
            <small>Find a lawyer</small>
            @if (count($data)>1)
                <p class="text-muted"><b> ({{count($data)}} results)</b></p>
            @else
                <p class="text-muted"><b> ({{count($data)}} result)</b></p>
            @endif
            <p class="mb-0"><b>Filter by</b></p>
            <p class="mb-0 text-muted">RATING</p>
            <input type="radio" name="lawyer-rating" id="rating-5" value="5">
            @for ($i = 0; $i < 5; $i++)
                <span class="fa fa-star"style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-4" value="4">
            @for ($i = 0; $i < 4; $i++)
                <span class="fa fa-star" style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-3" value="3">
            @for ($i = 0; $i < 3; $i++)
                <span class="fa fa-star"style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-2" value="2">
            @for ($i = 0; $i < 2; $i++)
                <span class="fa fa-star"style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-1" value="1">
                <span class="fa fa-star"style="color:#ffe234"></span>
            
        </div>
        <div class="col-12 col-md-10">
            @if(isset($data))
                @foreach ($data as $attorney)
                    <div class="row mt-2 justify-content-center">
                        <div class="col-12 col-md-4">
                        <a href="/profile/{{$attorney->id}}"><img style="width:130px;height:140px" src="{{$attorney->image}}" alt="{{$attorney->firstname}}"></a>
                        </div>
                        <div class="col-12 col-md-8" style="margin-left:-180px;">
                            <p class="mb-0"><b><a href="/profile/{{$attorney->id}}" class="text-decoration-none text-dark">{{$attorney->firstname}} {{$attorney->lastname}}</a></b></p>
                            <small class="text-muted mb-0">{{$attorney->county}} county</small>
                            <small class="card-text"><star-rating :star-size="20" active-color="#fc9735" :rating="{{$attorney->getStarRating()}}"></star-rating> </small>
                            <p class="attorney-county-smalltext mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nesciunt fuga laudantium veniam est. Quisquam, modi et! Nisi, cumque earum, sapiente ut ipsa expedita Excepturi et tenetur hic quam nemo molestiae nihil sequi assumenda harum...</p>
                            <div class="row text-center attorney-county-smalltext mt-2">
                                <div class="col-md-4 text-primary"><span class="fa fa-phone"></span> {{$attorney->mobile}}</div>
                                <div class="col-md-4 icon-center "><a class="text-decoration-none" href="/attorney-message/{{$attorney->id}}"><span class="fa fa-envelope"></span> Message</a></div>
                                <div class="col-md-4"><a class="text-decoration-none" href="/profile/{{$attorney->id}}#contact"><span class="fa fa-map-marker"></span> Location</a></div>
                            </div>
                        </div>
                    </div>
                    <hr class="text-muted">
                @endforeach
                <div class="mt-3" style="padding-left:500px;">
                    {!! $data->render() !!}
                </div>
            @endif 
        </div>
    </div>
    


     <script>
    $(document).ready(function(){

        
        $('#rating-5').click( function(){
            var rate= $('#rating-5').val();
            // var law = $data;
            // alert(law);
            $.ajax({
                type:'get',
                url:'{{url('/rating')}}',
                data:'rating='+rate,
                success:function(response){
                    console.log(response);
                }

            });
        });
     

        $('#rating-4').click( function(){
            var rate= $('#rating-4').val();
            alert(rate);
        });

    });
   </script> 
@endsection