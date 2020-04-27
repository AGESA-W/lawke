@extends('layouts.master')
@section('content')
    <h5 class="text-primary mt-3">Reports</h5>
    <div class=>
        <div class="row">
           <div class="col-12 col-md-12">
                <div class="reports-nav">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs nav-fill ml-auto pt-0">
                        <li class="nav-item border"><a class="nav-link active" href="#tab1" data-toggle="tab">Lawyer Rating</a></li>
                        <li class="nav-item border"><a class="nav-link" href="#tab2" data-toggle="tab">Registered Lawyers</a></li>
                        <li class="nav-item border"><a class="nav-link" href="#tab3" data-toggle="tab">Registered Users</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="reports-wrapper" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
                                <h5 class="d-inline-block" style="border-bottom:3px solid #3490dc">Choose Period</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                    Start Date: <input id="startDate" name="startDate" width="276" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        End Date: <input id="endDate" name="endDate" width="276" readonly/>

                                    </div>
                                    <div class="col-md-4">
                                        Rating
                                        <select class="form-control" name="rating" id="rating" >
                                            <option value="1">1 </option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        
                                        <button class="btn btn-md float-right btn-primary mt-2" name="fetch" id="fetch">Fetch</button>
                                        {{-- <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button> --}}
                                    </div>
                                </div> 
                            </div>  

                            <div class="reports-wrapper mt-5" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h6 class="text-primary"> <b>Ratings Report</b> </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped" id="rating-table">
                                            {{-- <div class="exports-buttons float-right mb-3 mt-3"> --}}
                                                {{-- <a href="{{route('rating.pdf')}}" class="text-decoration-none btn btn-sm btn-prima"><span class="fa fa-file"></span> Export Pdf</a> --}}
                                                {{-- <button class="btn btn-sm btn-primary"> <span class="fa fa-file"></span> Export Pdf</button> --}}
                                                {{-- <button class="btn btn-sm btn-success"> <span class="fa fa-file"></span> Export Excel</button> --}}
                                                
                                            {{-- </div> --}}
                                            <thead>
                                                <tr>
                                                    <th>Lawyer ID</th>
                                                    <th>Headline</th>
                                                    <th>Rating</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="tab2">
                            <div class="reports-wrapper" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
                                <h5 class="d-inline-block" style="border-bottom:3px solid #3490dc">Choose Period</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                    Start Date: <input id="beginDate" name="beginDate" width="276" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        End Date: <input id="lastDate" name="lastDate" width="276" readonly/>

                                    </div>
                                    <div class="col-md-4">
                                        {{-- Rating
                                        <select class="form-control" name="rating" id="rating" >
                                            <option value="1">1 </option>
                                        </select> --}}
                                        
                                        <button class="btn btn-md float-right btn-primary mt-2" name="filter" id="filter">Fetch</button>
                                        {{-- <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button> --}}
                                    </div>
                                </div> 
                            </div>  
                            
                            <div class="reports-wrapper mt-5" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h6 class="text-primary"> <b>Lawyer Registration Report</b> </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped" id="registeredLawyers-table">
                                            {{-- <div class="exports-buttons float-right mb-3 mt-3"> --}}
                                                {{-- <a href="{{route('rating.pdf')}}" class="text-decoration-none btn btn-sm btn-prima"><span class="fa fa-file"></span> Export Pdf</a> --}}
                                                {{-- <button class="btn btn-sm btn-primary"> <span class="fa fa-file"></span> Export Pdf</button> --}}
                                                {{-- <button class="btn btn-sm btn-success"> <span class="fa fa-file"></span> Export Excel</button> --}}
                                                
                                            {{-- </div> --}}
                                            <thead>
                                                <tr>
                                                    <th>Lawyer ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab3">
                            <div class="reports-wrapper" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
                                <h5 class="d-inline-block" style="border-bottom:3px solid #3490dc">Choose Period</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                    Start Date: <input id="firstDate" name="firstDate" width="276" readonly />
                                    </div>
                                    <div class="col-md-4">
                                    End Date: <input id="finalDate" name="finalDate" width="276" readonly/>

                                    </div>
                                    <div class="col-md-4">
                                        {{-- Rating
                                        <select class="form-control" name="rating" id="rating" >
                                            <option value="1">1 </option>
                                        </select> --}}
                                        
                                        <button class="btn btn-md float-right btn-primary mt-2" name="filterUsers" id="filterUsers">Fetch</button>
                                        {{-- <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button> --}}
                                    </div>
                                </div> 
                            </div>  
                            
                            <div class="reports-wrapper mt-5" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h6 class="text-primary"> <b>Users Registration Report</b> </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped" id="registeredUsers-table">
                                            {{-- <div class="exports-buttons float-right mb-3 mt-3"> --}}
                                                {{-- <a href="{{route('rating.pdf')}}" class="text-decoration-none btn btn-sm btn-prima"><span class="fa fa-file"></span> Export Pdf</a> --}}
                                                {{-- <button class="btn btn-sm btn-primary"> <span class="fa fa-file"></span> Export Pdf</button> --}}
                                                {{-- <button class="btn btn-sm btn-success"> <span class="fa fa-file"></span> Export Excel</button> --}}
                                                
                                            {{-- </div> --}}
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th width="15%">Date</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            open_data();
            function open_data()
            {
                $('#rating-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ]
                });
            }
            function load_data(startDate = '', endDate = '', rating = ''){
                $('#rating-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                    serverSide: true,
                    ajax:{
                    url: '{{ route ("rating.report") }}',
                    data:{startDate:startDate, endDate:endDate, rating:rating}
                    },
                    columns:[
                    {
                        data: 'attorney_id',
                        name: 'attorney_id',
                    },
                    {
                        data: 'headline',
                        name: 'headline'
                    },
                    {
                        data: 'rating',
                        name: 'rating'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                    ],
                });
            }
            $('#fetch').click(function(){
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();
                var rating = $('#rating').val();

                if(startDate !='' && endDate  !=''){
                    $('#rating-table').DataTable().destroy();
                    load_data(startDate, endDate, rating);
                }
                else{
                    alert('Both date must be present')
                }
            });


            // registered lawyers
            beginLawyers();
            function beginLawyers()
            {
                $('#registeredLawyers-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ]
                });
            }
            function loadLawyersData(beginDate = '', lastDate = ''){
                $('#registeredLawyers-table').DataTable({
                    serverSide: true,
                    ajax:{
                    url: '{{ route ("lawyerReg.report") }}',
                    data:{beginDate:beginDate, lastDate:lastDate}
                    },
                    columns:[
                    {
                        data: 'attorney_id',
                        name: 'attorney_id',
                    },
                    {
                        data: 'firstname',
                        name: 'firstname',
                    },
                    {
                        data: 'lastname',
                        name: 'lastname',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                    ],
                });
            }
            $('#filter').click(function(){
                var beginDate = $('#beginDate').val();
                var lastDate = $('#lastDate').val();

                if(beginDate !='' && lastDate  !=''){
                    $('#registeredLawyers-table').DataTable().destroy();
                    loadLawyersData(beginDate, lastDate);
                }
                else{
                    alert('Both date must be present')
                }
            });



             // registered users
             beginUsers();
            function beginUsers()
            {
                $('#registeredUsers-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ]
                });
            }
            function loadUsersData(firstDate = '', finalDate = ''){
                $('#registeredUsers-table').DataTable({
                    serverSide: true,
                    ajax:{
                    url: '{{ route ("userReg.report") }}',
                    data:{firstDate:firstDate, finalDate:finalDate}
                    },
                    columns:[
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'lastname',
                        name: 'lastname',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                    ],
                });
            }
            $('#filterUsers').click(function(){
                var firstDate = $('#firstDate').val();
                var finalDate = $('#finalDate').val();

                if(firstDate !='' && finalDate  !=''){
                    $('#registeredUsers-table').DataTable().destroy();
                    loadUsersData(firstDate, finalDate);
                }
                else{
                    alert('Both date must be present')
                }
            });



            
         });


         
    </script>


@endsection