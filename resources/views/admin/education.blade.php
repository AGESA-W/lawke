@extends('layouts.master')

@section('title')
    EDUCATIONS | TABLE
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Education Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table">
                    <thead class="text-info">
                        <tr>
                            <th>Lawyer ID</th>
                            <th>Institution</th>
                            <th>Degree</th>
                            <th>Year of Graduation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($educations as $education)
                        <tbody>
                            <tr>
                                <td>{{$education->attorney_id}}</td>
                                <td>{{$education->school_name}}</td>
                                <td>{{$education->degree}}</td>
                                <td>{{$education->graduation}}</td>
                                <td><button class="btn btn-info btn-xs" data-institution="{{$education->school_name}}" data-graduation="{{$education->graduation}}" data-degree="{{$education->degree}}" data-education_id="{{$education->id}}" data-toggle="modal" data-target="#updateLawyerEducation">Edit</button></td>
                            </tr>
                        </tbody>
                            <!-- edit Modal -->
                            <div class="modal fade" id="updateLawyerEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Education</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.lawyer.education','test') }}">
                                            @method('PUT')
                                            {{ csrf_field() }}
                    
                                            <div class="form-group row">
                                                <label for="school_name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Institution') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="" required autocomplete="school_name" autofocus>
                    
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
                                                    <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="" required autocomplete="degree" autofocus>
                    
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
                                                    <input id="graduation" type="text" class="form-control @error('graduation') is-invalid @enderror" name="graduation" value="" required autocomplete="graduation" autofocus>
                    
                                                    @error('graduation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" id="education_id" name="education_id">
                    
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
            {{ $educations->links() }}
        </div>
      </div>
      
    </div>
  
  </div>
@endsection
