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
        <b>Endorsments belonging to the lawyer</b>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper">
                    <ul class="list-unstyled">
                        @if(count($endorsments)>0)
                            @foreach ($endorsments as $endorsment)
                                    <li> 
                                        <div class="row pt-2">
                                            <div class="float-left col-md-1">
                                                <img src="{{$endorsment->endorser->image}}" alt="" style="width:80px;height:90px;">
                                                <br>
                                            </div>
                                            <div class="float-right col-md-10 ml-0">
                                                By <span><a class= "text-decoration-none" href="/admin/attorneys/details/{{$endorsment->endorser->id}}">{{$endorsment->endorser->firstname}} {{$endorsment->endorser->lastname}}</a></span>
                                                <small class="text-secondary">on
                                                {{ date('d M, h:i a', strtotime($endorsment->created_at)) }}</small>
                                                <br>
                                                <small><b>Relationship:</b><span class="text-secondary"> {{$endorsment->relationship}}</span></small>
                                                <p>{{$endorsment->message}}</p>
                                                 <div class="dropdown">
                                                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      See actions
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <button type="button" class="btn dropdown-item dropdown-item-user px-3 py-2 btn-sm" data-toggle="modal" data-target="#edE{{$endorsment->id}}">
                                                            <span class="fa fa-pencil"></span> Edit 
                                                        </button>
                                                        <div class="dropdown-divider"></div>
                                                        <button type="button" class="btn  dropdown-item dropdown-item-user px-3 py-2 btn-sm" data-toggle="modal" data-target="#deleteModal">
                                                            <span class="fa fa-trash"></span> Delete
                                                        </button>
                                                    </div>

                                                    {{-- edit modal --}}
                                                    <div class="modal fade" id="edE{{$endorsment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Endorsment</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('admin.endorsment.update',$endorsment->id)}}" method="post">
                                                                        @method('PUT')
                                                                        {{ csrf_field() }}
                                                                        <div class="form-group">
                                                                            <label for="relationship"><span class="asterick"><b>*</b></span><b>Relationship</b> </label>
                                                                            <select  class="form-control" name="relationship" id="relationship" required>
                                                                                <option value="{{$endorsment->relationship}}">{{$endorsment->relationship}}</option>
                                                                                <option value="Worked for lawyer">Worked for lawyer</option>
                                                                                <option value="Supervised lawyer">Supervised lawyer</option>
                                                                                <option value="Worked together on a matter">Worked together on a matter</option>
                                                                                <option value="Opposing counsel on a matte">Opposing counsel on a matter</option>
                                                                                <option value="Co-woker">Co-woker</option>
                                                                                <option value="Friend">Friend</option>
                                                                                <option value="Family">Family</option>
                                                                            </select>
                                                                            {{-- <input type="text" class="form-control" id="relationship" name= "relationship" value="{{$endorsment->relationship}}" required> --}}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><span class="asterick"><b>*</b></span> <b> Message</b> </label>
                                                                            <textarea name= "message" class="form-control" maxlength="4000" id="message" cols="30" rows="5" required>{{$endorsment->message}}</textarea>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-sm btn-success px-2" type="submit">Edit</button>
                                                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- delete modal --}}
                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Endorsment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <p class="lead">Are you sure you want to delete this Endorsment?</p> 
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{route('admin.endorsment.destroy',$endorsment->id)}}" method="post">
                                                                    @method('DELETE')
                                                                    {{ csrf_field() }}
                                                                    <button type="submit" class="btn btn-sm btn-success">Delete</button>
                                                              </form>
                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                            @endforeach
                            @else
                            <h6> <b>No endorsments yet.</b> </h6>
                            <p>Endorsments from fellow lawyers are important consideration for many when selecting the right lawyer.None of you colleagues has endorsed you!</p>
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Answers section --}}
    <div class="AttorneyDetails mt-4 mb-4" style="background:#fff;padding:10px 20px 10px 20px;font-size:13.5px;">
        <b>Answers for questions the lawyer answered</b>
        @if (count($answers)>0)
            @foreach ($answers as $answer)
                <div class="individual-question">
                    <div class="text-muted">
                        <small> <b>Q & A</b> </small>
                        <br>
                        <small> <b>Asked in  {{$answer->question->county}} | {{ date('d M Y', strtotime($answer->question->created_at)) }}</b> </small>
                    </div>
                    <hr class="mt-1 mb-0">
                    <p class="mb-1"><b>  {{$answer->question->question}} </b></p>
                    <p>  {{$answer->question->situation}} </p>
                    <div class="card answer-card">
                        <div class="card-body">
                            <h5><strong>Your answer</strong></h5>
                            <hr class="mt-0">
                            <h6 class="text-muted mb-0">Posted on {{ date('d M', strtotime($answer->question->created_at)) }}</h6>
                            <p class="mb-1">{{$answer->answer}}</p> 
                        </div>
                        <div class="btns">
                            <div class="float-right px-4">
                                <button class="ml-2 mb-2 py-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#deA{{$answer->id}}"><span class="fa fa-trash"></span> Delete Answer</button> 
                            </div>
                            <div class="float-left px-4">
                            <button class="mr-2 mb-2 py-2 btn btn-sm btn-outline-success" data-toggle="modal" data-target="#eA{{$answer->id}}"><span class="fa fa-pencil"></span> Edit Answer</button> 
                            </div>
                        </div>
                        {{-- edit modal --}}
                        <div class="modal fade" id="eA{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Answer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="required pl-2 mb-2 text-color" style="border-left:3px solid #afa939">Required</div>

                                        <form action="{{route('admin.answer.update',$answer->id)}}" method="post">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="answer"><b>Your Answer</b> </label>
                                                <textarea class="form-control" name="answer" min= "40"max="1200" id="answer" cols="30" rows="8" style="border-left:4px solid #afa939" required>{{$answer->answer}}</textarea>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-success px-3" type="submit"><span class="fa fa-pencil"></span> Edit</button>
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><span class="fa fa-undo"></span> Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- delete modal --}}
                        <div class="modal fade" id="deA{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Answer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <p class="lead">Are you sure you want to delete this Answer?. This action cannot be reversed!.</p> 
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('admin.answer.destroy',$answer->id)}}" method="post">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-success px-3 py-1"> <span class="fa fa-trash"></span> Delete</button>
                                </form>
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><span class="fa fa-undo"></span> Cancel</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="card answer-card p-2">
            <p>You have not answered any question yet. <br>
                Answer client questions to increase your chances of drawing potential clients.</p>
        </div>
        @endif
    </div>
@endsection