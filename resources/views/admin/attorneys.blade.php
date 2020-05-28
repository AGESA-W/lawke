@extends('layouts.master')

@section('title')
   LAWYERS| TABLE
@endsection

@section('content')
<div class="row" style="font-size:13.5px;">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-white bg-primary py-2">
            <h5> Lawyers Data</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-striped table-hover" id="lawyer_table">
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
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
        $('#lawyer_table').DataTable({
        // processing: true,
        serverSide: true,
        ajax:{
        url: "{{ route('attorneys.account') }}",
        },
        columns:[
        {
            data: 'id',
            name: 'id',
        },
        {
            data: 'firstname',
            name: 'firstname'
        },
        {
            data: 'lastname',
            name: 'lastname'
        },
        {
            data: 'license_no',
            name: 'license_no'
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
