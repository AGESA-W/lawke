@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.lawyernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Location</h5>
                  <div class="tab-item">
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Place Of Work</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    @foreach ($attorney->locations as $location)
                                         <li>{{$location->company_name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Office Location</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    @foreach ($attorney->locations as $location)
                                         <li>{{$location->location}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">County</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                  <li>{{$attorney->county}}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Address</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    <li>{{$location->address}}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sectionDetails">
                        <div class="sectionWrapper">
                            <div class="sectionTitle">Action</div>
                            <div class="sectionContent">
                                <ul class="list-unstyled" style="margin:0">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#locationModal">
                                        <span class="fa fa-pencil"></span> Edit information
                                    </button>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('location.update',$location->id) }}">
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
                                            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$location->location}}" required autocomplete="lastname" autofocus>
            
                                            @error('location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$location->address}}" required autocomplete="mobile" autofocus>
            
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
      </div>
    </div>

@endsection