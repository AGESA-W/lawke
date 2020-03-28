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
                                <td><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#e{{$education->id}}">Edit</button></td>
                            </tr>
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
                                        {{-- <form method="POST" action="{{ route('update.education',$education->id) }}">
                                            @method('PUT')
                                            {{ csrf_field() }}
                    
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right text-dark">{{ __('First Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$education->name}}" required autocomplete="name" autofocus>
                    
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastname" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Last Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$education->lastname}}" required autocomplete="lastname" autofocus>
                    
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
                                                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="0{{$user->mobile}}" required autocomplete="mobile" autofocus>
                    
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
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                    
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
                                        </form> --}}
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
