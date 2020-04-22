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
    <div class="hello">

    </div>
    {{-- <div class="table-responsive table-hover mt-3" >
        <table class="table table-striped table-bordered"> 
            <tbody></tbody>
        </table>
    </div> --}}
              
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
    });
   </script>
@endsection