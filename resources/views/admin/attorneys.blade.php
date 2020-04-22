@extends('layouts.master')

@section('title')
    LAWYERS | TABLE
@endsection

@section('content')
    <div class="row" style="font-size:14px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-primary py-2">
                    <h5> Lawyers Data</h5>
                </div>
                <div class="card-body">
                    {{-- <p class="float-sm-left">
                        <span id="total_records"></span>
                    </p> --}}
                    
                    <!-- SEARCH FORM -->
                    <form class="form-inline float-right mb-2">
                        <label class=" mr-1"> Search: </label>
                        <input style="border-radius:0;margin-top:-18px;" class="form-control border-top-0  border-left-0  border-right-0 w-75" type="text" name="search" id="lawyersearch" 
                            aria-label="Search">
                    </form>


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Certificate No</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                            </tbody>
                            {{-- @foreach ($attorneys as $attorney)
                                <tbody>
                                    <tr>
                                        <td>{{$attorney->id}}</td>
                                        <td>{{$attorney->firstname}}</td>
                                        <td>{{$attorney->lastname}}</td>
                                        <td>{{$attorney->license_no}}</td>
                                        <td>{{$attorney->email}}</td>
                                        <td>{{$attorney->mobile}}</td>
                                        <td><a href="/admin/attorneys/details/{{$attorney->id}}" class="text-decoration-none"><button class="btn btn-sm bg-primary"><span class="fa fa-eye"></span></button></a></td>
                                    </tr>
                                </tbody>
                            @endforeach --}}
                        </table>
                    </div>
                    {{ $attorneys->links() }}
                </div>
            </div>
        </div>
    </div>
  <script>
    $(document).ready(function(){
        fetch_lawyer_data();
        function fetch_lawyer_data(query = '')
        {
        $.ajax({
        url:"{{ route('lawyer.search.action') }}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
        }
        })
        }
    
        $(document).on('keyup', '#lawyersearch', function(){
        var query = $(this).val();
        fetch_lawyer_data(query);
        });
    });
   </script>
@endsection
