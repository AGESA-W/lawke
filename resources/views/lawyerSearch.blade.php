@extends('layouts.app')
@section('content')  
    <div class="row">
        <div class="people-saying mt-5">
                <div  style="background:#e9ecef;position: absolute;left:0;right:0;top:7%;">
                    <h1 class="about-plain-jumbotron-text text-center  "style="border-bottom:5px solid #afa939;display:inline;margin-left:560px;" ><strong>Find a lawyer</strong></h1>
                    <div class="text-center mt-3">
                        <a href="/search" class="btn btn-primary"> <span class="fa fa-undo"></span> Return Back to Search page</a> 
                        @if (count($data)>1)
                            <p class="text-muted"><b> ({{count($data)}} results)</b></p>
                        @else
                            <p class="text-muted"><b> ({{count($data)}} result)</b></p>
                        @endif
                    </div>
                </div>
        </div>
            
        <div class="col-12 col-md-10" style="margin-top:110px;">
            <div class="text-center">
              
            </div>
            
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
                            @if ($attorney->about !='')
                                <p class="attorney-county-smalltext mb-0">{{$attorney->about}} </p> 
                            @else
                                <p class="attorney-county-smalltext mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nesciunt fuga laudantium veniam est. Quisquam, modi et! Nisi, cumque earum, sapiente ut ipsa expedita Excepturi et tenetur hic quam nemo molestiae nihil sequi assumenda harum...</p>   
                            @endif
                           
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