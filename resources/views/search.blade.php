@extends('layouts.app')
@section('content')  
    <div class="search-lawyer">
        <div class="search-lawyer-jumbotron">
            <div class="jumbotron text-center">
                <h3 class="search-lawyer-heading">Experienced lawyers are ready to help.</h3>
                <h4 class="search-lawyer-find">Find a lawyer</h4>
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm mt-3 ml-3 w-75" type="text" name="search" id="search" placeholder="Search by name or county"
                        aria-label="Search">
                </form>
                {{-- <input type="text" name="search" id="search" class="form-control"  placeholder="Search Customer Data" /> --}}
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:250px;">
        <div class="col-md-3">
            <p class="mb-0"><strong>Filter by</strong></p>
            <div class="text-muted">REVIEWS</div>
            <input type="radio" name="lawyer-rating" id="rating-5" value="5">
            @for ($i = 0; $i < 5; $i++)
                <span class="fa fa-star"style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-4">
            @for ($i = 0; $i < 4; $i++)
                <span class="fa fa-star" style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-3">
            @for ($i = 0; $i < 3; $i++)
                <span class="fa fa-star"style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-2">
            @for ($i = 0; $i < 2; $i++)
                <span class="fa fa-star"style="color:#ffe234"></span>
            @endfor
            <br>

            <input type="radio" name="lawyer-rating" id="rating-1">
                <span class="fa fa-star"style="color:#ffe234"></span>
        </div>
        <div class="col-md-9">
            <div class="hello">

            </div>
        </div>
    </div>
    
 
   <script>
    $(document).ready(function(){

    
        function fetch_customer_data(query = '')
        {
        $.ajax({
        url:"{{ route('search.action') }}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
        $('.hello').html(data.table_data);
        $('#total_records').text(data.total_data);
        }
        })
        }
    
        $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
        });


        $('#rating-5').click( function(){

            var rating = [];
            if( $(this).is(":checked")){
                rating.push( $(this).val());
            }

            finalrating = rating.toString();
            alert(finalrating)
        });

    });
   </script>
@endsection