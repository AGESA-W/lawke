@extends('layouts.master')

@section('title')
    PLACE OF WORK| TABLE
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Place of Work Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table">
                    <thead class="text-info">
                        <tr>
                            <th>Lawyer ID</th>
                            <th>Company Name</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($locations as $location)
                        <tbody>
                            <tr>
                                <td>{{$location->attorney_id}}</td>
                                <td>{{$location->company_name}}</td>
                                <td>{{$location->location}}</td>
                                <td>{{$location->address}}</td>
                                <td><button class="btn btn-info btn-xs" data-work_id="{{$location->id}}" data-company_name="{{$location->company_name}}" data-location="{{$location->location}}" data-address="{{$location->address}}" data-toggle="modal" data-target="#updateLawyerWork">Edit</button></td>
                            </tr>
                        </tbody>
                            <!-- edit Modal -->
                            <div class="modal fade" id="updateLawyerWork" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Place of Work</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.laywer.work',"test") }}">
                                            @method('PUT')
                                            {{ csrf_field() }}
                    
                                            <div class="form-group row">
                                                <label for="company_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Company Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{$location->company_name}}" required autocomplete="name" autofocus>
                    
                                                    @error('company_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="location" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Location') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$location->location}}" required autocomplete="location" autofocus>
                    
                                                    @error('location')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Postal Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$location->address}}" required autocomplete="address" autofocus>
                    
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <input type="hidden" id="work_id" name="work_id">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                    @endforeach
                </table>
            </div>
            {{ $locations->links() }}
        </div>
      </div>
      
    </div>
  
  </div>
@endsection
