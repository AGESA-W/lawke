@extends('layouts.master')

@section('title')
    USERS | TABLE
@endsection

@section('content')
<div class="row" style="font-size:13.5px;">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-white bg-primary py-2">
            <h5> Users Data</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-striped table-hover" id="user_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
        $('#user_table').DataTable({
        // processing: true,
        serverSide: true,
        ajax:{
        url: "{{ route('users.table') }}",
        },
        columns:[
        {
            data: 'id',
            name: 'id',
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'lastname',
            name: 'lastname'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'mobile',
            name: 'mobile'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false
        }
        ]
        });
    });
   </script>
@endsection
