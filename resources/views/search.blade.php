@extends('layouts.app')
@section('content')  
    <div class="search-lawyer">
        <div class="search-lawyer-jumbotron">
            <div class="jumbotron text-center">
                <h3 class="search-lawyer-heading">Experienced lawyers are ready to help.</h3>
                <h4 class="search-lawyer-find">Find a lawyer</h4>
               
                <div class="mt-3">
                    
                    <form action="/se" method="POST" class="form-inline justify-content-center md-form form-sm mt-0">
                        @csrf
                        <div class="row">

                            <div class="form-control-with-icons"><svg aria-hidden="true" class="svg-inline--fa fa-search fa-w-16 icon" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span aria-hidden="true" class="icon fas fa-search"></span> --><input class="form-control string input_with_icon optional js-search-textfield" style="border-radius: 0" name="q" placeholder="Lawyer name" type="text" id="lg_global_search"></div>

                            <div class="form-control-with-icons "><svg aria-hidden="true"   class="svg-inline--fa fa-map-marker-alt fa-w-12 icon" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <span aria-hidden="true" class="icon fas fa-map-marker-alt"></span> --><input class="form-control string input_with_icon optional js-location-textfield" style="border-radius: 0" name="l" placeholder="County" type="text" id="lg_global_search_location"></div>

                        </div>

                        <div class="input-group-append">
                        <button  type="submit" class="px-4 btn bg-color ml-4">
                           Search <span class="fa fa-search"></span>
                        </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    
    <div style="margin-bottom:680px;">
        <div class="search-user-data">
        <div class="search-legalmeet">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="h1 mt-0 pt-1 pl-5">Tips for effective searching on Legal<span class="text-color">Meet</span></h2>
                </div>
            </div>
            <div class="row" style="padding-left:350px;" >
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <ol class="ordered-list">
                        <li>
                            <h3 class="h2"> <span class="ordering">1</span> Use Specific Keywords</h3>
                            <p class="pl-5"> Keywords are the terms that you use to find content. Making your keywords as specific as possible will help our search box to track down the information that you want.
                                <br>
                                Say, for example, that you want to find a lawyer called Philip. If you type only "p" in the search box, the results will include many pages about other types of lawyers, whereas typing Philip  will return a more concise range of lawyers.
                                <br>
                               Another example would be if you want to search for lawyers in a specific county, Say, for example, that you want to find a lawyers in Vihiga County. If you type only "V" in the search box, the results will include many pages with other counties, whereas typing Vihiga  will return only lawyers in that county.

                            </p>

                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">2</span>Remove Unhelpful Words</h3>
                            <p class="pl-5"> Adding Unhelpful words may cause you to obatin wrong results or obtain no results at all.</p>
                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">3</span>Simplify your search terms</h3>
                            <p class="pl-5">strip out unnecessary stop words and avoid suffixes.</p>
                        </li>
                        
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
       
    </div>
    
 
   {{-- <script>
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
   </script> --}}
@endsection