@extends('layouts.app')
@section('content')
    <div class="row user-dashboard">
        <div class="col-12 col-md-3">
            <div class="user-nav">
                @include('partials.lawyernav')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h5 class="mb-2 pb-3" style="border-bottom: #afa939 solid 2px;">Education</h5>
                <div class="tab-item table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="bg-color">
                            <tr>
                                <th>Institution</th>
                                <th>Degree</th>
                                <th width="15%">Graduated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $education)
                                <tr>
                                    <td>{{$education->school_name}}</td>
                                    <td>{{$education->degree}}</td>
                                    <td>{{$education->graduation}}</td>
                                    <td>
                                    <button  class="btn btn-primary py-1" data-education_id="{{$education->id}}" data-school_name="{{$education->school_name}}" data-degree="{{$education->degree}}"  data-graduation="{{$education->graduation}}" data-attorney_id="{{$attorney->attorney_id}}"  data-toggle="modal" data-target="#edit">
                                       <span class="fa fa-pencil"></span> Edit
                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Update Education Modal -->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Education</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form method="POST" action="{{ route('edit.education','test') }}">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="school_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Institution') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name"  required autocomplete="school_name" autofocus>
                
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
                                                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree"  required autocomplete="degree" autofocus>
                
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
                                                <input id="graduation" type="date" class="form-control @error('graduation') is-invalid @enderror" name="graduation" required autocomplete="graduation" autofocus>
                
                                                @error('graduation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group-row">
                                            <input id="attorney_id" type="hidden" name="attorney_id">
                                        </div>
                                        <div class="form-group-row">
                                            <input id="education_id" type="hidden" name="education_id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save changes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- </Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEducationModal">
                       <span class="fa fa-plus"></span>  Add New
                    </button>
                    <!-- Add Education Modal -->
                    <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('add.education') }}">
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
                                        <button type="submit" class="btn btn-sm btn-success">Save changes</button>
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                        
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

@endsection