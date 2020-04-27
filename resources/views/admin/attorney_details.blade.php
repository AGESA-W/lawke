@extends('layouts.master')
@section('content')
    <div class="AttorneyDetails" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Account Details</b>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <img src="{{$attorney->image}}" alt="" class="attorney-image" style="height:200px;width:200px;">
            </div>
            <div class="col-md-3" style="margin-left:-45px;">
                <ul class="list-unstyled">
                    <li class="mb-1"><h4 class="mb-0"><b>{{$attorney->firstname}} {{$attorney->lastname}}</b></h4></li>
                    <li class="mb-1">{{$attorney->email}}</li>
                    <li class="mb-1">{{$attorney->license_no}}</li>
                    <li class="mb-1">{{$attorney->mobile}}</li>
                    <li><small class="text-secondary">{{ date('d M,Y', strtotime($attorney->created_at)) }}</small></li>
                </ul>
                <div class="buttons mt-2"> 
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#u{{$attorney->id}}"><span class="fa fa-pencil"></span> Edit</button> <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#d{{$attorney->id}}"><span class="fa fa-trash"></span> Delete</button>
                </div>
                <!-- edit Modal -->
                <div class="modal fade" id="u{{$attorney->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Lawyer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('update.lawyer.account',$attorney->id) }}">
                                @method('PUT')
                                {{ csrf_field() }}
        
                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-right text-dark">{{ __('First Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{$attorney->firstname}}" required autocomplete="firstname" autofocus>
        
                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="lastname" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Last Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$attorney->lastname}}" required autocomplete="lastname" autofocus>
        
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Mobile') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$attorney->mobile}}" required autocomplete="mobile" autofocus>
        
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right text-dark">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$attorney->email}}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- delete Modal -->
                <div class="modal fade" id="d{{$attorney->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="AttorneyDetails mt-4" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Education Details</b>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="text-white"style="background:#008ecc">
                        <tr>
                            <td><b>Institution Name</b></td>
                            <td><b>Degree</b></td>
                            <td><b>Graduated</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>
                    @foreach ($educations as $education)
                        <tbody>
                            <td>{{$education->school_name}}</td>
                            <td>{{$education->degree}}</td>
                            <td>{{$education->graduation}}</td>
                            <td> <button class="btn btn-primary btn-sm"data-toggle="modal" data-target="#e{{$education->id}}"><span class="fa fa-pencil"></span> Edit</button>  <button class="btn btn-secondary btn-sm ml-2"data-toggle="modal" data-target="#del{{$education->id}}"><span class="fa fa-trash"></span> Delete</button></td>
                        </tbody>
                        <!-- edit Modal -->
                        <div class="modal fade" id="e{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Education</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.lawyer.education',$education->id) }}">
                                            @method('PUT')
                                            {{ csrf_field() }}
                    
                                            <div class="form-group row">
                                                <label for="school_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Institution') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{$education->school_name}}" required autocomplete="school_name" autofocus>
                    
                                                    @error('school_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="degree" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Degree') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{$education->degree}}" required autocomplete="degree" autofocus>
                    
                                                    @error('degree')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="graduation" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Year of graduation') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="graduation" type="text" class="form-control @error('graduation') is-invalid @enderror" name="graduation" value="{{$education->graduation}}" required autocomplete="graduation" autofocus>
                    
                                                    @error('graduation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <input type="hidden" id="education_id" name="education_id"> --}}
                    
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete Modal -->
                        <div class="modal fade" id="del{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Education Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="lead">Are you sure you want to delete this Education details?</p> 
                                    </div>
                                    <div class="modal-footer"> 
                                        <form action="{{route('education.delete',$education->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-success" type="submit">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </table>
                <div class="buttons mt-2">
                    <!-- </Modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AdminAddEducation">
                        <span class="fa fa-plus"></span> Add New
                    </button>
                    <!-- Add Education Modal -->
                    <div class="modal fade" id="AdminAddEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('add.lawyerEducation') }}">
                                    {{ csrf_field() }}
            
                                    <div class="form-group row">
                                        <label for="company_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Institution') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required autocomplete="school_name" autofocus>
            
                                            @error('school_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="degree" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Degree') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}" required autocomplete="degree" autofocus>
            
                                            @error('degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="graduation" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Year of Graduation') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="graduation" type="date" class="form-control @error('graduation') is-invalid @enderror" name="graduation" value="{{ old('graduation') }}" required autocomplete="graduation" autofocus>
            
                                            @error('graduation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group-row">
                                        <input type="hidden" name="attorney_id" value="{{$attorney->attorney_id}}">
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
                      <!-- </Modal -->
                </div>

            </div>
        </div>
    </div>
    
    {{-- work place details --}}
    <div class="AttorneyDetails mt-4" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Work Place Details</b>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @foreach ($locations as $location)
                    <div class="contact-details pl-0">
                        <ul class="list-unstyled">
                            <li class="mb-1"><strong>{{$location->company_name}}</strong></li>
                            <li class="mb-1"style="font-weight:500">{{$location->location}}</li>
                            <li class="mb-1">PO.BOX:{{$location->address}}-00200</li>
                            <li class="text-secondary">Office: <span class="text-primary">{{$attorney->mobile}}</span> </li>
                        </ul>
                    </div>
                    <div class="buttons mt-2">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#up{{$location->id}}"><span class="fa fa-pencil"></span> Edit</button>
                    </div>

                    <!-- edit Modal -->
                    <div class="modal fade" id="up{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content text-dark">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Place of Work</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('update.laywer.work',$location->id) }}">
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
            </div>
        </div>
    </div>


    <div class="AttorneyDetails mt-4 mb-4" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Endorsments</b>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @foreach ($locations as $location)
                    <div class="col-md-4 col-12 pl-0 pr-1">
                        <div class="contact-details pl-0">
                            <ul class="list-unstyled">
                                <li><strong>{{$location->company_name}}</strong></li>
                                <li style="font-weight:500">{{$location->location}}</li>
                                <li>PO.BOX:{{$location->address}}-00200</li>
                                <li class="text-secondary">Office: <span class="text-primary">{{$attorney->mobile}}</span> </li>
                            </ul>
                        </div>
                    </div>
                 @endforeach
                <div class="buttons mt-2">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#e{{$attorney->id}}">Edit</button> <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#d{{$attorney->id}}">Delete</button> 

                </div>
            </div>
        </div>
    </div>
@endsection